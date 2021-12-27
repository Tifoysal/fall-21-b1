@extends('admin.master')


@section('content')
<h1>Searched Product List</h1>

<br><br>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Details</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach ($products as $key=>$product)
        <tr>
            <th>{{$key+1}}</th>
            <th>
                <img style="border-radius: 4px;" width="100px;" src=" {{url('/uploads/products/'.$product->image)}}" alt="product">
                
            </th>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->details}}</td>
            <td>{{$product->category->name}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('admin.product.details',$product->id)}}">View</a>
                <a class="btn btn-danger" href="{{route('admin.product.delete',$product->id)}}">Delete</a>
                <a class="btn btn-info" href="{{route('admin.product.edit',$product->id)}}">Edit</a>
            </td>
        </tr>
        
        @endforeach
    </tbody>
</table>
@endsection
