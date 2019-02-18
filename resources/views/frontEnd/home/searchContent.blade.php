
@extends('frontEnd.master')
@section('body')

<div class="electronicsaaa">
    <div class="container">


        <div class="ele-bottom-grid">
            <h3><span>Search </span>Products</h3>
            <hr/>
            
           
            @foreach($searchProducts as $val)

            <div class="col-md-3 product-men yes-marg">
                <div class="men-pro-item simpleCart_shelfItem">
                    <div class="men-thumb-item">
                        <img src="{{asset($val->productImage)}}" alt="" height="200" width="200" class="pro-image-front">
                        <img src="{{asset($val->productImage)}}" alt="" height="200" width="200" class="pro-image-back">
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
                            <span class="item_price">BDT-{{$val->productPrice}}</span>

                        </div>
                        <input type="hidden" name="productPrice" value="{{ $val->productPrice }}">
                        <input type="hidden" name="productId" value="{{ $val->id }}">
                        <input type="hidden" name="qty" value="1"> 
                        <button type="submit" class="item_add single-item hvr-outline-out button2">Add to cart</button>									
                    </div>
                </div>
            </div>
            @endforeach
            
            {{$searchProducts->links()}}
           
            <div class="clearfix"></div>
        </div>
        



    </div>
</div>

@endsection