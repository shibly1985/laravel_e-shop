@extends('admin.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Product Entry Form : {{Session::get('message')}}</h3>
        </div>

        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    {!! Form::open(['url' => '/product/save','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="container">            
        <hr>
        <div class="row ">
            <label for="email"><b>Product Name</b></label>
            <input type="text" placeholder="Enter Product Name" name="productName" class="form-control col-lg-6" >
        </div>
        <div class="row">
            <label for="psw-repeat"><b>Select Category</b></label>
            <select id="productCategory" name="categoryId" class="form-control">
                <option>Select A Category</option>
                @foreach($categories as $val)
                <option value="{{$val->id}}">{{$val->categoryName}}</option>
                @endforeach                    
            </select>
        </div>
        
        <div class="row">
            <label for="psw-repeat"><b>Select Sub Category</b></label>
            <select id="productSubCategory" name="subCategoryId" class="form-control">
                <option>Select A Sub Category</option>
                @foreach($subCategories as $val)
                <option value="{{$val->id}}">{{$val->subCategoryName}}</option>
                @endforeach                    
            </select>
        </div>

        <div class="row">
            <label for="psw-repeat"><b>Select Manufacturer</b></label>
            <select id="manufacturerId" name="manufacturerId" class="form-control">
                <option>Select A Category</option>
                @foreach($manufacturer as $val)
                <option value="{{$val->id}}">{{$val->manufacturerName}}</option>
                @endforeach                    
            </select>
        </div>

        <div class="row ">
            <label for="email"><b>Product Price</b></label>
            <input type="number" placeholder="Enter Product Price" name="productPrice" class="form-control col-lg-6" >
        </div>
        
        <div class="row ">
            <label for="email"><b>Product Quantity</b></label>
            <input type="number" placeholder="Enter Product Quantity" name="productQuantity" class="form-control col-lg-6" >
        </div>

        <div class="row">
            <label for="psw"><b>Product Long Description</b></label>                
            <textarea name="proLongDescription" id="proLongDescription" class="form-control col-lg-6" cols="45" rows="5"></textarea>
        </div>
        
        <div class="row">
            <label for="psw"><b>Product Short Description</b></label>                
            <textarea name="proShortDescription" id="proShortDescription" class="form-control col-lg-6" cols="30" rows="5"></textarea>
        </div>
        
        <div class="row ">
            <label for="email"><b>Product Image</b></label>
            <input type="file" placeholder="Enter Product Image" name="productImage" class="form-control col-lg-6" >
        </div>
        
        
        <div class="row">
            <label for="psw-repeat"><b>Publication Status</b></label>
            <select id="publicationStatus" name="publicationStatus" class="form-control">
                <option>Select A Status</option>
                <option value="1">Publish</option>
                <option value="0">Un Publish</option>
            </select>
        </div>
        <div class="clearfix"><br/></div>
        <div class="row">
            <div class="clearfix">                
                <button type="submit" name="Submit" class="btn-success">Save Product</button>
            </div>
        </div>
        <div class="clearfix"><br/></div>
    </div>
    {!! Form::close() !!} 

</div>
@endsection