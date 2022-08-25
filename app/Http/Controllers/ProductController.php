<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'index';
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
        // $product = Product::find('id');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
