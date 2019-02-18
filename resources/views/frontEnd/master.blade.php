
<!DOCTYPE html>
<html>
    <head>
        <title>{{$title}}</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Smart Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //for-mobile-apps -->
        <link href="{{asset('public/frontEnd/')}}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="{{asset('public/frontEnd/')}}/css/jquery-ui.css">
        <!-- pignose css -->
        <link href="{{asset('public/frontEnd/')}}/css/pignose.layerslider.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="{{asset('public/frontEnd/')}}/css/flexslider.css" type="text/css" media="screen" />

        <!-- //pignose css -->
        <link href="{{asset('public/frontEnd/')}}/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!-- js -->
        <script type="text/javascript" src="{{asset('public/frontEnd/')}}/js/jquery-2.1.4.min.js"></script>
        <!-- //js -->

        <!-- single -->
        <script src="{{asset('public/frontEnd/')}}/js/imagezoom.js"></script>
        <script src="{{asset('public/frontEnd/')}}/js/jquery.flexslider.js"></script>
        <!-- single -->
        <!-- cart -->
        <script src="{{asset('public/frontEnd/')}}/js/simpleCart.min.js"></script>
        <!-- cart -->
        <!-- for bootstrap working -->
        <script type="text/javascript" src="{{asset('public/frontEnd/')}}/js/bootstrap-3.1.1.min.js"></script>
        <!-- //for bootstrap working -->
        <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
        <script src="{{asset('public/frontEnd/')}}/js/jquery.easing.min.js"></script>
    </head>
    <body>
        <!-- header -->
        @include('frontEnd.include.header')
        <!-- //header-bot -->
        <!-- banner -->
        <div class="ban-top">
            @include('frontEnd.include.menu')	

        </div>
        <!-- //banner-top -->
        <!-- banner -->
        @yield('body')
        <!-- //product-nav -->
        @include('frontEnd.include.cupon')

        <!-- footer -->
        @include('frontEnd.include.footer')
        <!-- //login -->
        @include('frontEnd.include.modalLoginLogout')
    </body>
</html>
