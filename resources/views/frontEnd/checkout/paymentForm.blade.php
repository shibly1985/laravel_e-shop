@extends('frontEnd.master')
@section('body')
<br/>
{!! Form::open(['url' => '/checkout/save-order','method'=>'POST','enctype'=>'multipart/form-data','class'=>'form-inlines','name'=>'shippingForm']) !!}
<div class="container">
    <div class="form-group col-lg-12">
        <div class="row ">
            <label for="firstName"><b>
                </b></label>

        </div>
    </div>
</div>
<div class="container">
    <div class="well col-lg-6">
        <h3>Shipping Form:</h3>
        <hr/>

        <div class="row">           
            <input type="radio" value="cashOnDelivery" name="paymentType">
            <label for="cashOnDelivery"><b>Cash On Delivery</b></label>        
        </div>
        <div class="row">           
            <input type="radio" value="bkash" name="paymentType">
            <label for="bkash"><b>Bkash</b></label>        
        </div>
        <div class="row">           
            <input type="radio" value="paypal" name="paymentType">
            <label for="paypal"><b>Paypal</b></label>        
        </div>

        <div class="clearfix"><br/></div>
        <div class="form-group">
            <div class="clearfix">                
                <button type="submit" name="Submit" class="btn-success">Continue Shipping</button>
            </div>
        </div>
        <div class="clearfix"><br/></div>

    </div>
</div>
{!! Form::close() !!}
@endsection

