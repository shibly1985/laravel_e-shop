@extends('frontEnd.master')
@section('body')
<br/>
{!! Form::open(['url' => '/checkout/save-shipping','method'=>'POST','enctype'=>'multipart/form-data','class'=>'form-inlines','name'=>'shippingForm']) !!}
<div class="container">
    <div class="form-group col-lg-12">
        <div class="row ">
            <label for="firstName"><b>Hello {{$customerByID->firstName}}.You have to give product shipping information to complete your valuable order.
                If your information has already saved, please click the save shipping info button.
                </b></label>

        </div>
    </div>
</div>
<div class="container">
<div class="well col-lg-6">
        <h3>Shipping Form:</h3>

        
        <div class="row">
            <label for="email"><b>Full Name</b></label>
            <input type="text" placeholder="Full Name" value="{{$customerByID->firstName}}" name="fullName" class="form-control col-lg-6" >
        </div>
        
        <div class="row">
            <label for="email"><b>Email Address</b></label>
            <input type="email" placeholder="Email" name="emailAddress" value="{{$customerByID->emailAddress}}" class="form-control col-lg-6" >
        </div>

        <div class="row">
            <label for="email"><b>Address</b></label>           
            <textarea name="address" class="form-control" cols="5" rows="5">
              {{$customerByID->address}}  
            </textarea>
        </div>
        
        <div class="row">
            <label for="email"><b>Phone Number</b></label>
            <input type="number" placeholder="Phone Number" name="phoneNumber" value="{{$customerByID->phoneNumber}}" class="form-control col-lg-6" >
        </div>

        <div class="row">
            <label for="psw-repeat"><b>District</b></label>
            <select id="districtName" name="districtName" class="form-control">                
               <option >Select one</option>
                <option value="dhaka">Dhaka</option>
                <option value="comilla">Comilla</option>
                <option value="khulna">Khulna</option>
            </select>
        </div>

        <div class="clearfix"><br/></div>
        <div class="form-group">
            <div class="clearfix">                
                <button type="submit" name="Submit" class="btn-success">Save Shipping Info Button</button>
            </div>
        </div>
        <div class="clearfix"><br/></div>

    </div>
</div>
{!! Form::close() !!} 


<script>
    document.forms['shippingForm'].elements['districtName'].value = {{$customerByID -> districtName}}
</script>
@endsection

