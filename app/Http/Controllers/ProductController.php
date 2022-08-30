<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Mail\ProductUpload;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Mail\ProductCreateMarkdown;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::with(['category','subcategory'])->get();

        $delProducts = Product::onlyTrashed()->with(['category','subcategory'])->get();
        return view('product.index',compact('products','delProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select(['id','name'])->get();
        $subcategories = Subcategory::select('id','name')->get();
        // dd($category,$subcategory);
        return view('product.create',compact('categories','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $product = Product::find('id');
        // dd($request->all());
        $product = Product::create([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'name'=>$request->product_name,
            'slug'=>Str::slug( $request->product_name),
            'price'=>$request->product_price,
            'description'=>$request->product_description,

        ]);
        // dd($product);
        $this->imageUpload($request,$product->id);

        //mail sending
        $user = User::find(1);
        $categories = Category::find($product->category->id);
        $subcategories = Subcategory::find($product->subcategory->id);
        $productWithImg = Product::find($product->id);
        Mail::to($user)->send(
            new ProductCreateMarkdown($productWithImg,$categories,$subcategories)
        );
        Session::flash('status','Product Uploaded');
        return redirect()->route('products.index');
    }

    public function imageUpload($request,$product_id)
    {
        if($request->hasFile('product_image')){
            $photo_location = 'public/uploads/product/';
            $uploaded_photo = $request->file('product_image');
            $photo_name = $product_id.'.'.$uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_location.$photo_name;
            Image::make($uploaded_photo)->resize(600,600)->save(base_path($new_photo_location));

            $product = Product::find($product_id);
            $product->update([
                'image'=>$photo_name,
            ]);
        }else{
            back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categoies = Category::get(['id','name']);
        $subcategoies = Subcategory::select(['id','name'])->get();
        // dd($categoies);
        return view('product.edit',compact('product','categoies','subcategoies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $productUpdate = Product::find($id);
        $productUpdate->update([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'name'=>$request->product_name,
            'slug'=>Str::slug( $request->product_name),
            'price'=>$request->product_price,
            'description'=>$request->product_description,

        ]);
        // dd( $request->file('product_image'));
        $this->imageUploadEdit($request,$productUpdate->id);
        Session::flash('status','Product Updated');
        return redirect()->route('products.index');

    }
    public function imageUploadEdit($request,$product_id)
    {
        if($request->file('product_image')){
            $file = $request->file('product_image');
            $filePath = 'public/uploads/product/';
            $fileName = $product_id.'.'.$file->getClientOriginalExtension();
            $fileFullPath = $filePath.$fileName;
            Image::make($file)->resize(100,100)->save(base_path($fileFullPath));

            $product = Product::find($product_id);
            $product->update([
                'image'=>$fileName,
            ]);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $product = Product::find($id);
        $product->delete();
        Session::flash('status','Product Deleted');
        return redirect()->route('products.index');

    }
    public function restore($product_id)
    {
        Product::onlyTrashed()->find($product_id)->restore();

        return back();
    }
    public function forceDelete($product_id)
    {
        Product::onlyTrashed()->find($product_id)->forcedelete();
        return back();
    }
}
