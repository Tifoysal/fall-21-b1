@extends('admin.master')


@section('content')

<h1>Create new product</h1>

@if(session()->has('success'))
    <p class="alert alert-success">
        {{session()->get('success')}}
    </p>
@endif

<form action="{{route('admin.product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Product Name</label>
        <input value="{{$product->name}}" name="name" placeholder="Enter Product Name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Product Price</label>
        <input value={{$product->price}} name="price" placeholder="Enter Product Price"  type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="form-group">
    <label for="exampleFormControlSelect1">Product Category</label>
    <select name="category" class="form-control" id="exampleFormControlSelect1">
        @foreach ($categories as $category)
           <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach

    </select>
  </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Product details</label>
        <input value={{$product->details}} name="details" placeholder="Enter Product details"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    {{-- <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Product Image</label>
        <input value={{$product->image}} name="product_image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div> --}}

    <button type="submit" class="btn btn-success">Submit</button>
</form>

@endsection
