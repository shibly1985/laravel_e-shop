@extends('frontEnd.master')
@section('body')
<div class="page-head">
    <div class="container">
        <h3>Single</h3>
    </div>
</div>
<div class="single">
    <div class="container">
        <div class="col-md-6 single-right-left animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
            <div class="grid {{asset('public/frontEnd/')}}/images_3_of_2">
                <div class="flexslider">
                    <!-- FlexSlider -->
                    <script>
                        // Can also be used with $(document).ready()
                        $(window).load(function () {
                            $('.flexslider').flexslider({
                                animation: "slide",
                                controlNav: "thumbnails"
                            });
                        });
                    </script>
                    <!-- //FlexSlider-->
                    <ul class="slides">
                        <li data-thumb="{{asset($detailsIndividualProducts->productImage)}}">
                            <div class="thumb-image"> <img src="{{asset($detailsIndividualProducts->productImage)}}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        <li data-thumb="{{asset($detailsIndividualProducts->productImage)}}">
                            <div class="thumb-image"> <img src="{{asset($detailsIndividualProducts->productImage)}}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>	
                        <li data-thumb="{{asset($detailsIndividualProducts->productImage)}}">
                            <div class="thumb-image"> <img src="{{asset($detailsIndividualProducts->productImage)}}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        <li data-thumb="{{asset($detailsIndividualProducts->productImage)}}">
                            <div class="thumb-image"> <img src="{{asset($detailsIndividualProducts->productImage)}}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>	
                    </ul>
                    <div class="clearfix"></div>
                </div>	
            </div>
        </div>
        {!! Form::open(['url' => '/add-to-cart','method'=>'POST']) !!}
        <div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
            <h3>{{ $detailsIndividualProducts->productName }}</h3>
            <p><span class="item_price">BDT{{ $detailsIndividualProducts->productPrice }}</span> <!--<del>- $900</del>--></p>
            <div class="rating1">
                <!--<span class="starRating">
                    <input id="rating5" type="radio" name="rating" value="5">
                    <label for="rating5">5</label>
                    <input id="rating4" type="radio" name="rating" value="4">
                    <label for="rating4">4</label>
                    <input id="rating3" type="radio" name="rating" value="3" checked="">
                    <label for="rating3">3</label>
                    <input id="rating2" type="radio" name="rating" value="2">
                    <label for="rating2">2</label>
                    <input id="rating1" type="radio" name="rating" value="1">
                    <label for="rating1">1</label>
                </span>-->
            </div>
            <br/><br/><br/>
            <div class="description">
                <!--<h5>Check delivery, payment options and charges at your location</h5>
                <input type="text" value="Enter pincode" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                            this.value = 'Enter pincode';}" required="">
                <input type="submit" value="Check">-->
            </div>
            <br/><br/><br/>
            <div class="color-quality">
                <div class="color-quality-right">
                    <h5>Quantity :</h5>
                    <!--<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
                        <option value="5">5 Qty</option>
                        <option value="5">5 Qty</option>
                        <option value="5">5 Qty</option>
                        <option value="5">5 Qty</option>
                        <option value="5">5 Qty</option>
                        <option value="6">6 Qty</option> 
                        <option value="7">7 Qty</option>					
                        <option value="10">10 Qty</option>								
                    </select>-->
                   <input type="number" name="qty" value="1"> 
                </div>
            </div>
            <div class="occasional">
                
                <!--<h5>Types :</h5>
                <div class="colr ert">
                    <label class="radio"><input type="radio" name="radio" checked=""><i></i>Casual Shoes</label>
                </div>
                <div class="colr">
                    <label class="radio"><input type="radio" name="radio"><i></i>Sports Shoes</label>
                </div>
                <div class="colr">
                    <label class="radio"><input type="radio" name="radio"><i></i>Formal Shoes</label>
                </div>-->
                
                <div class="clearfix"> </div>
            </div>
            
            
            <div class="occasion-cart">                
                <input type="hidden" name="productPrice" value="{{ $detailsIndividualProducts->productPrice }}">
                <input type="hidden" name="productId" value="{{ $detailsIndividualProducts->id }}">
                
                <button type="submit" class="btn btn-success cart">Add to cart</button>
            </div>
           
            
        </div>
         {!! Form::close() !!}
        <div class="clearfix"> </div>

        <div class="bootstrap-tab animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
                    
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
                        <h5>Product Brief Description</h5>
                        <p>
                        {{$detailsIndividualProducts->proLongDescription }}
                                </p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection