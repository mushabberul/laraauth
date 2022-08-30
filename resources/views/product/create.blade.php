<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create form <h3>
                        <a href="{{route('products.index')}}" class="btn btn-info">Product List</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Category</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Category</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="subcategory_id">
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product name</label>
                                <input name="product_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter product name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Price</label>
                                <input name="product_price" type="number" class="form-control" id="exampleInputPassword1" placeholder="Enger product price" min="0">
                            </div>
                            <div class="form-group">
                                <label class="" for="">Description</label>
                                <textarea class="form-control" name="product_description" id="" cols="50" rows="6"></textarea>
                            </div>
                            <div class="mb-3">
                                <img width="100px" height="100px" id="output" alt="" class="pb-1">
                                <label for="formFile" class="form-label">Product Image</label>
                                <input name="product_image" class="form-control" type="file" id="formFile" onchange="loadfile(event)">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
        let loadfile = function(event){
            let output = document.getElementById("output")
            output.src = URL.createObjectURL(event.target.files[0])
            // alert(output.src)
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
