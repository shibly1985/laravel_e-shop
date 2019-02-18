@extends('admin.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Manufacturer Entry Form : {{Session::get('message')}}</h3>
        </div>
       
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
   {!! Form::open(['url' => '/manufacturer/save','method'=>'POST']) !!}
        <div class="container">            
            <hr>
            <div class="row ">
                <label for="email"><b>Manufacturer Name</b></label>
                <input type="text" placeholder="Enter Manufacturer" name="manufacturerName" class="form-control col-lg-6" required>
            </div>

            <div class="row">
                <label for="psw"><b>Manufacturer Description</b></label>                
                <textarea name="manufacturerDescription" id="manufacturerDescription" class="form-control col-lg-6" cols="45" rows="5"></textarea>
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
                <button type="submit" name="Submit" class="btn-success">Save Manufacturer</button>
            </div>
        </div>
        <div class="clearfix"><br/></div>
    </div>
{!! Form::close() !!} 

</div>
@endsection