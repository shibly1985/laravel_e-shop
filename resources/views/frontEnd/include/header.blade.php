<div class="header">
    <div class="container">
        <ul>
            <li><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Fast Delivery</li>
            <li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Shipping On all orders</li>
            <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@example.com">info@example.com</a></li>
        </ul>
    </div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
    <div class="container">
        <div class="col-md-3 header-left">
            <h1><a href="{{url('/')}}"><img src="{{asset('public/frontEnd')}}/images/logo3.jpg"></a></h1>
        </div>
        <div class="col-md-6 header-middle">



            {!! Form::open(['url' => '/product/search','method'=>'POST']) !!}
            <div class="search">
                <input type="search" class="frm-field required" value="" name="searchValue" required="">
            </div>
            <div class="section_room">
                <select id="categoryId" name="categoryId" class="frm-field required">
                    <option>All categories</option>
                    @foreach($categories as $val)
                    <option value="{{$val->id}}">{{$val->categoryName}}</option>
                    @endforeach
                </select>
            </div>
            <div class="sear-sub">
                <input type="submit" value=" ">
            </div>
            <div class="clearfix"></div>

            {!! Form::close() !!} 



        </div>
        <div class="col-md-3 header-right footer-bottom">
            <ul>
                <li><a href="#" class="use1" data-toggle="modal" data-target="#myModal4"><span>Login</span></a>

                </li>
                <li><a class="fb" href="#"></a></li>
                <li><a class="twi" href="#"></a></li>
                <li><a class="insta" href="#"></a></li>
                <li><a class="you" href="#"></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>