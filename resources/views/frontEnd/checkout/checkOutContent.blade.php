@extends('frontEnd.master')
@section('body')

{!! Form::open(['url' => '/checkout/sign-up','method'=>'POST','enctype'=>'multipart/form-data','class'=>'form-inlines']) !!}
<br/>
<div class="container">
    <div class="form-group col-lg-12">
        <div class="row ">
            <label for="firstName"><b>You have to login to complete your valuable order. If you are not registered please sign up first.</b></label>

        </div>
    </div>
</div>

<div class="container">            
    <hr> 

    <div class="well col-lg-6">
        <h3>Customer Registration Form:</h3>
        <div class="row ">
            <label for="firstName"><b>First Name</b></label>
            <input type="text" placeholder="First Name" name="firstName" class="form-control col-lg-6" >
        </div>

        <div class="row ">
            <label for="email"><b>Last Name</b></label>
            <input type="text" placeholder="Last Name" name="lastName" class="form-control col-lg-6" >
        </div>

        <div class="row">
            <label for="email"><b>Email Address</b></label>
            <input type="text" placeholder="Email" name="emailAddress" class="form-control col-lg-6" >
        </div>

        <div class="row">
            <label for="email"><b>Password</b></label>
            <input type="password" placeholder="Password" name="password" class="form-control col-lg-6" >
        </div>

        <div class="row">
            <label for="email"><b>Address</b></label>           
            <textarea name="address" class="form-control" cols="5" rows="5">
                
            </textarea>
        </div>

        <div class="row">
            <label for="email"><b>Phone Number</b></label>
            <input type="number" placeholder="Phone Number" name="phoneNumber" class="form-control col-lg-6" >
        </div>

        <div class="row">
            <label for="psw-repeat"><b>District</b></label>
            <select id="districtName" name="districtName" class="form-control">                
                <option value="">-- Select A District --</option>
                <option value="dhaka">Dhaka</option>
                <option value="comilla">Comilla</option>
                <option value="khulna">Khulna</option>
            </select>
        </div>


        <div class="clearfix"><br/></div>
        <div class="form-group">
            <div class="clearfix">                
                <button type="submit" name="Submit" class="btn-success">Sign Up</button>
            </div>
        </div>
        <div class="clearfix"><br/></div>

{!! Form::close() !!} 


    </div>
{!! Form::open(['url' => '/customer/login','method'=>'POST','enctype'=>'multipart/form-data','class'=>'form-inlines']) !!}
    <div class="well col-lg-6">
        <h3>Customer Login Form:</h3>


        <div class="row">
            <label for="email"><b>Email Address</b></label>
            <input type="email" placeholder="Email" name="emailAddress" class="form-control col-lg-6" >
        </div>

        <div class="row">
            <label for="email"><b>Password</b></label>
            <input type="password" placeholder="Password" name="password" class="form-control col-lg-6" >
        </div>






        <div class="clearfix"><br/></div>
        <div class="form-group">
            <div class="clearfix">                
                <button type="submit" name="Submit" class="btn-success">Login</button>
            </div>
        </div>
        <div class="clearfix"><br/></div>








    </div>
</div>
{!! Form::close() !!} 




@endsection