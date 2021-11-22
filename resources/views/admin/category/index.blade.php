@extends('admin.master')


@section('content')

    <h1>Category list</h1>
    <a href="{{route('admin.category.create')}}" class="btn btn-success">Create new product</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">status</th>
        </tr>
        </thead>
        <tbody>
            @foreach($categories as $key=>$category)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->status}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$categories->links()}}
@endsection
