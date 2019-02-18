@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Manage Products || {{Session::get('message')}}</h3>
        </div>
        <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->

    <table class="table table-bordered">
        <tr>
            <th>Product Name</th>
             <td>{{$products->productName}}</td>
        </tr>
        <tr>
            <th>Category Name</th>
           <td>{{$products->categoryName}}</td>
        </tr>
        <tr>
            <th>Manufacturer Name</th>
            <td>{{$products->manufacturerName}}</td>
        </tr>
        <tr>
            <th>Product Price</th>
             <td>{{$products->productPrice}}</td>
        </tr>
        <tr>
            <th>Product Quantity</th>
           <td>{{$products->productQuantity}}</td>
        </tr>
        <tr>
            <th>Product Short Description</th>
           <td>{{$products->proLongDescription}}</td>
        </tr>
        <tr>
            <th>Product Long Description</th>
           <td>{{$products->proShortDescription}}</td>
        </tr>
        <tr>
            <th>Product Image</th>
            <td><img src="{{asset($products->productImage) }}" alt="{{$products->productName}}"></td> 
        </tr>
        <tr>
            <th>Publication Status</th>
            <td>{{$products->productImage }}</td> 
        </tr>



    </table


</div>
@endsection