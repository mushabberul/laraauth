<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    @include('product.style')
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <h5>
                    Category Name: {{ $product->category->name }}
                </h5>
                <h5>
                    Subategory Name: {{ $product->subcategory->name }}
                </h5>
                <h5>
                    Product Name: {{ $product->name }}
                </h5>
                <h5>
                    Product Price: {{ $product->price }}
                </h5>
                <h5>
                    Product Description: {{ $product->description }}
                </h5>
                <h5>
                    Product Image:
                </h5>
                <img width="300" src="{{ asset('uploads/product/' . $product->image) }}" alt="">
            </div>
        </div>
    </div>
    @include('product.script')
</body>

</html>
