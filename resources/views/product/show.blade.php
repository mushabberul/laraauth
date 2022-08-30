<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <h5>
                    Category Name: {{$product->category->name}}
                </h5>
                <h5>
                    Subategory Name: {{$product->subcategory->name}}
                </h5>
                <h5>
                    Product Name: {{$product->name}}
                </h5>
                <h5>
                    Product Price: {{$product->price}}
                </h5>
                <h5>
                    Product Description: {{$product->description}}
                </h5>
                <h5>
                    Product Image:
                </h5>
                <img width="300" src="{{asset('uploads/product/'. $product->image)}}" alt="">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
