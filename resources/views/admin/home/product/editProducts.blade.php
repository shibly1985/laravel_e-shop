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
    {!! Form::open(['url' => '/product/update','method'=>'POST','name'=>'editProductForm','enctype'=>'multipart/form-data']) !!}
    <div class="container">            
        <hr>
        <div class="row ">
            <label for="email"><b>Product Name</b></label>
            <input type="text" value="{{$productById->productName}}" name="productName" class="form-control col-lg-6" >
            <input type="hidden" value="{{$productById->id}}" name="productId" class="form-control col-lg-6" >
        </div>
        <div class="row">
            <label for="psw-repeat"><b>Select Category</b></label>
            <select id="categoryId" name="categoryId" class="form-control">

                @foreach($categories as $val)
                <option value="{{$val->id}}">{{$val->categoryName}}</option>
                @endforeach                    
            </select>
        </div>

        <div class="row">
            <label for="psw-repeat"><b>Select Manufacturer</b></label>
            <select id="manufacturerId" name="manufacturerId" class="form-control">

                @foreach($manufacturer as $val)
                <option value="{{$val->id}}">{{$val->manufacturerName}}</option>
                @endforeach                    
            </select>
        </div>

        <div class="row ">
            <label for="email"><b>Product Price</b></label>
            <input type="number" value="{{$productById->productPrice}}" name="productPrice" class="form-control col-lg-6" >
        </div>

        <div class="row ">
            <label for="email"><b>Product Quantity</b></label>
            <input type="number" value="{{$productById->productQuantity}}" name="productQuantity" class="form-control col-lg-6" >
        </div>

        <div class="row">
            <label for="psw"><b>Product Long Description</b></label>                
            <textarea name="proLongDescription" id="proLongDescription" class="form-control col-lg-6" cols="45" rows="5">
             {{$productById->proLongDescription}}   
            </textarea>
        </div>

        <div class="row">
            <label for="psw"><b>Product Short Description</b></label>                                                        
            <textarea name="proShortDescription" id="proShortDescription" class="form-control col-lg-6" cols="30" rows="5">
               {{$productById->proShortDescription}}                      
            </textarea>
        </div>

        <div class="row ">
            <label for="email"><b>Product Image</b></label>
            <input type="file" placeholder="Enter Product Image" name="productImage" class="form-control col-lg-6" >
        </div>

        <div class="row ">
            <img src="{{asset($productById->productImage)}}" alt="{{$productById->productName}}">
        </div>
        <div class="row">
            <label for="psw-repeat"><b>Publication Status</b></label>
            <select id="publicationStatus" name="publicationStatus" class="form-control">
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
<script>
    // document.forms['editProductForm'].elements['publicationStatus'].value = {{$productById -> publicationStatus}}
    //document.forms['editProductForm'].elements['categoryId'].value = {{$productById -> categoryId}}
    //document.forms['editProductForm'].elements['manufacturerId'].value = {{$productById -> manufacturerId}}
</script>
@endsection