<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Product</h1>
    <div>
        <a href="{{route('products.create')}}">Create New Product</a>
    </div>
    <div>
        @if (session()->has('success'))
            <div>
                {{session('success')}}
            </div>
            
        @endif
    </div>
    <div >
        <table border="2">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            @foreach ($products as $product)
                <tr>
                    <th>{{$product->id}}</th>
                    <th>{{$product->name}}</th>
                    <th>{{$product->qty}}</th>
                    <th>{{$product->price}}</th>
                    <th>{{$product->description}}</th>
                    <th>
                        <a href="{{route('products.edit',['product' => $product])}}">Edit</a>
                    </th>
                    <th>
                        <form action="{{route('products.destory',['product'=> $product])}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete">
                        </form>
                    </th>

                </tr>
                
            @endforeach
        </table>
    </div>
</body>
</html>