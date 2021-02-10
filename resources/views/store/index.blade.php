@extends('store.storeLayout') 
@section('content')
    <div class="section">
        <!-- container -->
        <div class="container-fluid">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <br>
                    <div class="section-title">
                        <h3 style="color:rgb(4, 72, 136);font-weight:bold">New Products</h3>

                    </div><br>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
            
                <div class="col-md-12">
                    <div class="row ">


                        @foreach($products as $product)
                        <!-- product -->
                    
                        <div  class=" col-md-6 col-xl-3 col-lg-4 " id="backgr">
                            <a href="{{route('user.view',['id'=>$product->id])}}">
                            <img class="img" src="uploads/products/{{$product->id}}/{{$product->image_name}}" alt="" style="width:300px; height:300px;" >
                            </a>
                            <div class="product">
                                <div class="product-img"><br>
                                    
                                    <div class="product-label">
                                        <span  style="color:rgb(172, 10, 10);font-weight:bold">Offer!!</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:rgb(172, 10, 10);font-weight:bold"> {{$product->stock}}  In Stock!!</span> 
                                    </div>
                                </div>
                                <div class="product-body">
                                    <p style="color:rgb(48, 59, 216);font-weight:bold" class="product-category">Category:&nbsp;&nbsp;<span style="color:rgb(15, 15, 15);font-weight:bold;">{{$product->category->name}}</span></p>
                                    <h3 class="product-name"><a href="{{route('user.view',['id'=>$product->id])}}">{{$product->name}}</a></h3>
                                    <h4 style="color:rgb(3, 100, 245);font-weight:bold;font-size:15px;"> {{$product->discount}} DH <del style="color:rgb(150, 8, 8);"> {{$product->price}} DH </del></h4>
                                    <div class="product-rating">
                                    </div>
                                    
                                </div>
                                <div class="add-to-cart">
                                   <a  href="{{route('user.view',['id'=>$product->id])}}"><i class="fa fa-shopping-cart"></i>Purchase</a>
                                </div>
                            </div>
                        </div>
                        <!-- /product -->
                        @endforeach
                    </div>
                    
                </div>
        
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
    </div>
@endsection