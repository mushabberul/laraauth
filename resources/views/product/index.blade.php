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
            <div class="col-md-12">

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
                                        <button class="btn btn-danger" id="sweet_alert" type="submit">Delete</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <table class="table table-hover">
                    <thead>
                        <h3 class="cart-title">Product SoftDelete</h3>
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

                                        <button id="" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom" class="btn btn-danger" type="submit">Force Delete</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  @include('product.script')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.29/dist/sweetalert2.all.min.js"></script>
  <script>
    $('#sweet_alert').click(function(event){
        let form = $(this).closest('form')
        event.preventDefault()
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit()
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
          }
        })
    })
  </script>
</body>

</html>
