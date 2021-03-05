<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{mix('/css/theme.css')}}">
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    <title>Web site E-Commerce</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Neuton:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   
</head>

<body>
    
    <style>
        .img {
            border: 5px solid #ddd;
            border-radius: 5px;
          }
          
          .img:hover {
            box-shadow: 0 0 5px 5px rgba(9, 103, 211, 0.5);
          }
          
    </style>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <nav class="navbar navbar-expand-lg  navbar-dark" role="navigation" id="top-header">
            
                <div class="container-fluid " class="col-12">
                            <div class="col-lg-8">
                                <ul class="navbar-nav me-auto mb-0 mb-sm-0">
                                    <li class="nav-item active" class="col-md-2" ><a href="#"><i class="fa fa-phone"></i> +070-60-91-99</a></li>
                                    <li class="nav-item active" class="col-md-2"><a href="#"><i class="fa fa-envelope-o"></i> support@electro.com</a></li>
                                    <li class="nav-item active" class="col-md-2"><a href="#"><i class="fa fa-map-marker"></i> Meknes, Zitoune 11</a></li>
                                </ul>
                            </div>
                            
                        
                        <div class="col-lg-4">
                            <ul class="navbar-nav me-auto mb-2 mb-sm-0">
                                @if(session()->has('user'))
                                  <li class="nav-item active" class="col-md-2"><a style="color:white" href="{{route('user.history')}}">{{session()->get('user')->full_name}} </a></li>  
                                  <li class="nav-item active" class="col-md-2"><a href="{{route('user.logout')}}"><i class="fa fa-user-o"></i> Logout</a></li>
                                @else
                                <li class="nav-item active" class="col-md-2"><a href="{{route('user.login')}}"><i class="fa fa-user-o"></i> Login</a></li>
                                
                                <li class="nav-item active" class="col-md-2"><a href="{{route('user.signup')}}"><i class="fa fa-user-o"></i> SignUp</a></li>
                                @endif
                                
                            </ul>
                        </div>
                </div>
            
        </nav>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <nav class="navbar bg-dark">
           
                <!-- container -->
                <div class="container-fluid w-100">
                    <!-- row -->
                   
                        <!-- LOGO -->
                            <div class="w-25">
                                <div class="">
                                    <a class="" href="{{route('user.home')}}"><img src="img/youcan.png" alt=""></a>
                                </div>
                            </div>
                            
                            <div class="w-50">
                                    <form action="{{route('user.search')}}" method="get">
                                        <div class="input-group">
                                            <input type="search" class="form-control" placeholder="Search..." name="n" style="border-radius: 40px 0px 0px 40px;max-width: 500px;">
                                            <span class="input-group-btn">
                                            <button class="btn btn-success" type="submit">Search</button>
                                            </span>
                                       </div>
                                    </form>
                            </div>
                            <div class="w-10"></div>
                            <div class="w-15 h-100" >
                                    <div  class="navbar-nav">
                                        
                                        <a class="dropdown-toggle " id="custom_shopping_cart" href="{{route('user.cart')}}">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span>Your Cart</span>
                                        </a>
                                    </div>
                            </div>
                        
                </div>            
        </nav>
    </header>

    <!-- NAVIGATION -->
    <nav class="navbar navbar-expand-sm  ml-auto" style="background-color:#00EADF">
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
               
                <!-- /shop -->
                @endforeach
            </div>
            @endif
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- SECTION -->

     <br>
    @yield('content')
     <br><br>
    <!-- /SECTION -->
    
    <section class="home-newsletter">
        <div class="container">
        <div class="row">
        <div class="col-sm-12">
            <div class="single"><br>
                <h2>Subscribe to our Newsletter</h2>
            <div class="input-group">
                 <input type="email" class="form-control" placeholder="Enter your email">
                 <span class="input-group-btn">
                 <button class="btn btn-theme" type="submit">Subscribe</button>
                 </span>
            </div>
            </div>
        </div>
        <div class="w-35"></div>
        <div class="w-30">
            <ul class="newsletter-follow" class="">
                <li>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </li>
            </ul>
        </div>
        <div class="w-35"></div>
        </div>
        </div>
        </section>
                        
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->

    <!-- FOOTER -->
    <footer class="navbar bg-dark">
        <!-- top footer -->
        <div class="section w-100">
            <!-- container -->
            <div class="container w-100" >
                <!-- row -->
                <div class="row w-100" >
                    
                        <div class="container-fluid " class="col-12 w-100" >
                            <div class="w-25 h-100" >
                                <div class="footer w-100" >
                                    <h3 class="footer-title w-50">About Us</h3>
                                    <p class="w-75">Site For Electronic Devices and Components
                                    </p>
                                    
                                </div>
                            </div>
        
                            <div class="w-25">
                                <div class="footer">
                                    <h3 class="footer-title">Categories</h3>
                                    <ul style="list-style-type:none;" class="footer-links">
                                        <li><a href="#">Hot deals</a></li>
                                        <li><a href="#">Laptops</a></li>
                                        <li><a href="#">Smartphones</a></li>
                                        <li><a href="#">Cameras</a></li>
                                        <li><a href="#">Accessories</a></li>
                                    </ul>
                                </div>
                            </div>
        
                            
        
                            <div class="w-25">
                                <div class="footer">
                                    <h3 class="footer-title">Information</h3>
                                    <ul style="list-style-type:none;" class="footer-links">
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Orders and Returns</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                    </ul>
                                </div>
                            </div>
        
                            <div class="w-25">
                                <div class="footer">
                                    <h3 class="footer-title">Service</h3>
                                    <ul style="list-style-type:none;" class="footer-links" >
                                        <li><a href="#">My Account</a></li>
                                        <li><a href="#">View Cart</a></li>
                                        <li><a href="#">Wishlist</a></li>
                                        <li><a href="#">Track My Order</a></li>
                                        <li><a href="#">Help</a></li>
                                    </ul>
                                </div>
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
