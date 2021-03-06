@extends('admin.master')


@section('content')
<h1>Product List</h1>
@if(session()->has('success'))
<p class="alert alert-success">
    {{session()->get('success')}}
</p>
@endif
<a href="{{url('admin/product/create')}}" class="btn btn-success">Create new product</a>
<br><br>
<form action="{{route('admin.product.search')}}" method="GET">
    <div class="form-group">
        {{-- <label for="exampleInputEmail1">Email address</label> --}}
        <input name="search" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
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
