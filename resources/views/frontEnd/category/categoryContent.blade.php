@extends('frontEnd.master')
@section('body')
<!-- Electronics -->
<div class="electronicss">
    <div class="container">        
        <!--@include('frontEnd.include.singleProductContentInfo')-->
        <div class="ele-bottom-grid">
            <h3><span>Our </span>Collections</h3>
            <!-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>-->

            @foreach($categoryWiseProducts as $val)
            
            {!! Form::open(['url' => '/add-to-cart','method'=>'POST']) !!}
            <div class="col-md-3 product-men yes-marg">
                <div class="men-pro-item simpleCart_shelfItem">
                    <div class="men-thumb-item">
                        <img src="{{asset($val->productImage)}}" alt="" class="pro-image-front" height="200" width="200">
                        <img src="{{asset($val->productImage)}}" alt="" class="pro-image-back" height="200" width="200">
                        <div class="men-cart-pro">
                            <div class="inner-men-cart-pro">
                                <a href="{{url('/product/details/'.$val->id)}}" class="link-product-add-cart">Quick View</a>
                            </div>
                        </div>
                        <!-- <span class="product-new-top">New</span> -->
                    </div>
                    <div class="item-info-product">
                        <h4><a href="{{url('/product/details/'.$val->id)}}">{{$val->productName}}</a></h4>
                        <div class="info-product-price">
                            <span class="item_price">BDT{{$val->productPrice}}</span>
                            <!-- <del>$700.71</del> -->
                        </div>
                        <input type="hidden" name="productPrice" value="{{$val->productPrice}}">
                        <input type="hidden" name="productId" value="{{$val->id}}">
                        <input type="hidden" name="qty" value="1"> 
                        <button type="submit" class="item_add single-item hvr-outline-out button2">Add to cart</button>									
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
            
            @endforeach

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- //Electronics -->
<br/><br/>
@endsection
