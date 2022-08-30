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
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-danger" role="alert">
                         {{session('status')}}
                  </div>
                @endif

                <table class="table table-hover">
                    <thead>
                        <h3 class="cart-title">Product Normal Delete</h3>
                        <a href="{{route('products.create')}}" class="btn btn-primary">Create Product</a>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Subcategory Name</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Product Description</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->subcategory->name }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->description }}</td>
                                <td><img width="100px" height="100px" src="{{ asset('uploads/product/' . $product->image) }}" alt="Not Found" /></td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('products.edit',['product'=>$product->id])}}">Edit</a>
                                    <a class="btn btn-info" href="{{route('products.show',['product'=>$product->id])}}">Show</a>
                                    <form class="d-inline" action="{{route('products.destroy',['product'=>$product->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <table class="table table-hover">
                    <thead>
                        <h3 class="cart-title">Product SoftDelete</h3>
                        <a href="{{route('products.create')}}" class="btn btn-primary">Create Product</a>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Subcategory Name</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Product Description</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($delProducts as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->subcategory->name }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->description }}</td>
                                <td><img width="100px" height="100px" src="{{ asset('uploads/product/' . $product->image) }}" alt="Not Found" /></td>
                                <td>
                                    <a class="btn btn-info" href="{{route('products.restore',['product_id'=>$product->id])}}">Restore</a>
                                    <form class="d-inline" action="{{route('products.forcedelete',['product_id'=>$product->id])}}" method="post">
                                        @csrf
                                        @method('GET')
                                        <button class="btn btn-danger" type="submit">Force Delete</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
