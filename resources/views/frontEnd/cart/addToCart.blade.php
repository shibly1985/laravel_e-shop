@extends('frontEnd.master')
@section('body')
<div class="page-head">
    <div class="container">
        <h3>Check Out</h3>
    </div>
</div>
<!-- //banner -->
<!-- check out -->
<div class="checkout">
    <div class="container">
        <h3>My Shopping Bag</h3>
        <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
            <?php
            $cartContent=Cart::content();
           // echo "<pre/>";
           // print_r($cartContent);
            ?>
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>Remove</th>
                        <th>Image</th>
                        <th>Product Name</th>                        
                        <th>Quantity</th>                        
                        <th>Price Total</th>
                        <th>Price Total</th>
                    </tr>
                </thead>
                <?php
                $total=0;
                ?>
                @foreach($cartContent as $val)
                <tr class="rem1">
                    <td class="invert-closeb">
                        <!--<div class="rem">
                            <div class="close1"> </div>
                        </div>
                        <script>$(document).ready(function (c) {
                                $('.close1').on('click', function (c) {
                                    $('.rem1').fadeOut('slow', function (c) {
                                        $('.rem1').remove();
                                    });
                                });
                            });
                        </script>
                        <a href="{{url('delete-from-cart/'.$val->rowId)}}">Remove</a>-->
                        {!! Form::open(['url' => '/delete-from-cart','method'=>'POST']) !!}
                        <input type="hidden" value="{{$val->rowId}}" name="rowId">
                        <button type="submit" name="Submit" class="btn-success">Remove</button>
                        {!! Form::close() !!}
                    </td>
                    <td class="invert-image"><a href="#"><img src="{{$val->options->image}}" alt=" " class="img-responsive" /></a></td>
                    <td class="invert">{{$val->name}}</td>
                    <td class="invert">
                        <div class="quantity"> 
                            <div class="quantity-select"> 
                                
                                <!--<div class="entry value-minus"></div>
                                <div class="entry value"><span>{{$val->qty}}</span></div>
                                <div class="entry value-plus active"></div>-->
                                
                                {!! Form::open(['url' => '/update-cart','method'=>'POST']) !!}
                                <input type="hidden" value="{{$val->rowId}}" name="rowId">
                                <input type="text" value="{{$val->qty}}" name="qty">
                                <button type="submit" name="Submit" class="btn-success">Update</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </td>
                    
                    
                    <td class="invert">{{$val->total()}}</td>
                    <td class="invert">{{$val->price}}</td>
                </tr>
                <?php
                $total_price=$val->price*$val->qty;
                $total=$total+$total_price;
                ?>
                @endforeach

                <!--quantity-->
                <script>
                    $('.value-plus').on('click', function () {
                        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10) + 1;
                        divUpd.text(newVal);
                    });

                    $('.value-minus').on('click', function () {
                        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10) - 1;
                        if (newVal >= 1)
                            divUpd.text(newVal);
                    });
                </script>
                <!--quantity-->
            </table>
        </div>
        <div class="checkout-left">	

            <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                <a href="{{url('/')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
                <a href="{{url('/checkout')}}"><span class="glyphicon"></span>Check Out </a>
            </div>
            <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                <h4>Shopping basket</h4>
                <ul>
                    @foreach($cartContent as $val)
                    <li>{{$val->name}} <i></i> <span>{{$val->price}}</span></li>
                     @endforeach
                    <li>Total <i></i> <span>{{$total}}</span></li>
                    <?php
                      Session::put('orderTotal',$total);
                    ?>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
       
    </div>
</div>	
@endsection
