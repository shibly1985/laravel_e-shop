@extends('frontEnd.master')
@section('body')

@foreach($products as $val)

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
            <span class="product-new-top">New</span>

        </div>
        <div class="item-info-product ">
            <h4><a href="single.html">{{$val->productName}}</a></h4>
            <div class="info-product-price">
                <span class="item_price">${{$val->productPrice}}</span>
                <del>$69.71</del>
            </div>
            <a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
        </div>
    </div>

</div>

@endforeach


@endsection