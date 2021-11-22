@extends('admin.master')


@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {!! session('error') !!}
        </div>
    @endif
<h1>Product list</h1>
<a href="{{route('admin.products.create')}}" class="btn btn-success">Create new product</a>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">Category</th>
        <th scope="col">price</th>
        <th scope="col">quantity</th>
        <th scope="col">status</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $key=>$product)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td colspan="2">{{$product->name}}</td>
            <td colspan="2">{{$product->category->name}}</td>
            <td colspan="2">{{$product->price}}</td>
            <td colspan="2">{{$product->quantity}}</td>
            <td>{{$product->status}}</td>
            <td class="btn btn-primary">View</td>
        </tr>
    @endforeach
    </tbody>
</table>

{{$products->links()}}
@endsection
