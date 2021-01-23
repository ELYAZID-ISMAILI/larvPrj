<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    <link rel="stylesheet" href="{{mix('/css/theme.css')}}">
    <title>Web site E-Commerce</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
   
</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <div class="container-fluid">
                <div class="container">
                    <ul class="navbar-nav me-auto mb-2 mb-sm-0">
                        <li class="nav-item active"><a href="#"><i class="fa fa-phone"></i> +070-60-91-99</a></li><br>
                        <li class="nav-item active"><a href="#"><i class="fa fa-envelope-o"></i> support@electro.com</a></li><br>
                        <li class="nav-item active"><a href="#"><i class="fa fa-map-marker"></i> Meknes, Zitoune 11</a></li><br>
                    </ul>
                    <ul class="navbar-nav me-auto mb-2 mb-sm-0">
                        @if(session()->has('user'))
                          <li class="nav-item active"><a style="color:white" href="{{route('user.history')}}">{{session()->get('user')->full_name}} </a></li>  
                          <li class="nav-item active"><a href="{{route('user.logout')}}"><i class="fa fa-user-o"></i> Logout</a></li>
                        @else
                        <li class="nav-item active"><a href="{{route('user.login')}}"><i class="fa fa-user-o"></i> Login</a></li>
                        
                        <li class="nav-item active"><a href="{{route('user.signup')}}"><i class="fa fa-user-o"></i> SignUp</a></li>
                        @endif
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <nav class="navbar navbar-expand navbar-dark bg-light">
            <div id="header">
                <!-- container -->
                <div class="navbar-nav me-auto mb-2 mb-sm-0">
                    <!-- row -->
                    <div class="row">
                        <!-- LOGO -->
                        <div class="col-md-3">
                            <div class="header-logo">
                                <a href="{{route('user.home')}}" class="logo">
                                   
                                </a>
                            </div>
                        </div>
                        <!-- /LOGO -->
    
                        <!-- SEARCH BAR -->
                        <div class="col-md-6">
                            <div class="header-search">
                                <form action="{{route('user.search')}}" method="get">
                                    <div class="custom_search_top" >
                                        <input class="input" style="border-radius: 40px 0px 0px 40px;" name="n" placeholder="Search here">
                                        <button  class="search-btn">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /SEARCH BAR -->
    
                        <!-- ACCOUNT -->
                        <div class="col-md-3 clearfix">
                            <div class="header-ctn">
                                <!-- Cart -->
                                <div  class="dropdown">
                                    <a class="dropdown-toggle " id="custom_shopping_cart" href="{{route('user.cart')}}">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Your Cart</span>
                                    </a>
    
                                </div>
                                <!-- /Cart -->
    
                                <!-- Menu Toogle -->
                                
                                <!-- /Menu Toogle -->
                            </div>
                        </div>
                        <!-- /ACCOUNT -->
                    </div>
                    <!-- row -->
                </div>
                <!-- container -->
            </div>
        </nav>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-info">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li class="{{Route::is('user.home') ? 'active' : ''}}"><a href="{{route('user.home')}}">Home</a></li>
                    @if(Route::is('user.search'))
                        @foreach($cat as $c)
                        <li class="{{$c->id == $a ? 'active' : ''}}"><a href="{{route('user.search.cat',['id'=>$c->id])}}" >{{$c->name}}</a></li>
                        @endforeach
                        <li class="{{$a == -1  ? 'active' : ''}}"><a href="search">Browse All</a></li>
                    @else
                        @foreach($cat as $c)
                        <li ><a href="{{route('user.search.cat',['id'=>$c->id])}}" >{{$c->name}}</a></li>
                        @endforeach
                        <li ><a href="{{route('user.search')}}">Browse All</a></li>
                    @endif
                    
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            @if(Route::is('user.home'))
            <div class="row">
                <!-- shop -->
                @php
                $counter=0;
                @endphp
                @foreach($cat as $c)
                 @php
                $counter++;
                if($counter==4)
                break;
               
                @endphp
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="./img/shop0{{$index++}}.png" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>{{$c->name}}</h3>
                            <a href="search?c={{$c->id}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->
                @endforeach
            </div>
            @endif
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- SECTION -->


    @yield('content')

    <!-- /SECTION -->
    
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                        <form>
                            <input class="input" type="email" placeholder="Enter Your Email">
                            <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                        </form>
                        <ul class="newsletter-follow">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->

    <!-- FOOTER -->
    <footer id="footer" >
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row" >
                    <div class="col-md-3 col-xs-6" >
                        <div class="footer" >
                            <h3 class="footer-title">About Us</h3>
                            <p>Site Pour le Monde Eletronics Commerce</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Categories</h3>
                            <ul class="footer-links">
                                <li><a href="#">Hot deals</a></li>
                                <li><a href="#">Laptops</a></li>
                                <li><a href="#">Smartphones</a></li>
                                <li><a href="#">Cameras</a></li>
                                <li><a href="#">Accessories</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Information</h3>
                            <ul class="footer-links">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Orders and Returns</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Service</h3>
                            <ul class="footer-links">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">View Cart</a></li>
                                <li><a href="#">Wishlist</a></li>
                                <li><a href="#">Track My Order</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->


    <!-- jQuery Plugins -->
    <script src="{{mix('/js/app.js')}}">></script>
    
</body>
    

</body>

</html>
