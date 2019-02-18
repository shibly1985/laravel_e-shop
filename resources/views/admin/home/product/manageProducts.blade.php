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
        <thead>
            <tr>
                <th>Serial</th>
                <th>Product Name</th>
                <th>Category Name</th>
                <th>Manufacturer Name</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
                <th>Product Short Description</th>
                <th>Product Long Description</th>
                <th>Product Image</th>
                <th>Publication Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php($sl = 0)
            @foreach($products as $value)
            <tr>
                <td>{{++$sl}}</td>
                <td>{{$value->productName}}</td>
                <td>{{$value->categoryName}}</td>
                <td>{{$value->manufacturerName}}</td>
                <td>{{$value->productPrice}}</td>
                <td>{{$value->productQuantity}}</td>
                <td>{{$value->proLongDescription}}</td>
                <td>{{$value->proShortDescription}}</td>
                <td>{{$value->productImage }}</td>                
                <td>{{$value->publicationStatus==1?'Published':'Un Published'}}</td>
                <td>
                    <a href="{{url('/product/view/'.$value->id)}}">View</a> |
                    <a href="{{url('/product/edits/'.$value->id)}}">EDIT</a> | 
                    <a href="{{url('/product/delete/'.$value->id)}}"  onclick="return confirm('Are you Sure to Delete This ??');">DELETE</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table
    

</div>
@endsection