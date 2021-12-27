@extends('admin.master')


@section('content')
    <h1>Product Details</h1>
    <a href="#" class="btn btn-warning" onclick="printDiv('printableArea')">Print</a>

<div class="card" id="printableArea">
    <p>
        <img style="border-radius: 4px;" width="200px;" src=" {{url('/uploads/products/'.$product->image)}}" alt="product">
    </p>
    <p>Product Name: {{$product->name}}</p>
    <p>Product Price: <h4><span style="color: orange">BDT {{$product->price}}</span></h4></p>
    <p>Product Details: {{$product->description}}</p>

    <lable>Product Name:</lable>
    <input type="text" class="form-control" value="{{$product->name}}">
    <input type="file" class="form-control">
</div>
    


    <script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

@endsection
