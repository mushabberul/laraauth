<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class='card-title'>Product Update </h3>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{route('products.update',['product'=>$product->id])}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="">Category Name</label>
                                <select class="form-control" name="category_id" id="">
                                    @foreach ($categoies as $category)
                                    <option value="{{$category->id}}" @if ($category->id == $product->category->id)
                                        selected
                                    @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="text" value="{{$product->category->id}}"> --}}
                                @error('category_id')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Subcategory Name</label>
                                <select class="form-control" name="subcategory_id" id="">
                                    @foreach ($subcategoies as $subcategory)
                                    <option value="{{$subcategory->id}}" @if ($subcategory->id == $product->subcategory->id)
                                        selected
                                    @endif>{{$subcategory->name}}</option>
                                    @endforeach
                                </select>
                                @error('subcategory_id')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Product Name</label>
                                <input value="{{$product->name}}" class="form-control"type="text" name="product_name" id="">
                                @error('product_name')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Product Price</label>
                                <input value="{{$product->price}}"class="form-control" type="text" name="product_price" id="">
                                @error('product_price')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Product Description</label>
                                <textarea class="form-control" name="product_description" id="" cols="30" rows="5">{{$product->description}}</textarea>
                                @error('product_description')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <img width="100px" height="100px" src="{{asset('uploads/product/'.$product->image)}}" id="output" alt="" class="pb-1">
                                <label for="formFile" class="form-label">Product Image</label>
                                <input name="product_image" class="form-control" type="file" id="formFile" onchange="loadfile(event)">
                                @error('product_image')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let loadfile = function(event){
            let output = document.getElementById('output')
            output.src = URL.createObjectURL(event.target.files[0])
            // alert(output.src)
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>

