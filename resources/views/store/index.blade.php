@extends('store.storeLayout') 
@section('content')
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">New Products</h3>

                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
            
                <div class="col-md-12">
                    <div class="row">


                        @foreach($products as $product)
                        <!-- product -->
                    
                        <div  class="col-sm-6 col-md-4 col-lg-3" id="backgr">
                            <img  src="uploads/products/{{$product->id}}/{{$product->image_name}}" alt="" style="width:100%; height:100%;" >
                            <div class="product">
                                <div class="product-img">
                                    
                                    <div class="product-label">
                                        <span class="sale" style="color:rgb(172, 10, 10);font-weight:bold">Offer!!</span>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <p style="color:rgb(48, 59, 216);font-weight:bold" class="product-category">{{$product->category->name}}</p>
                                    <h3 class="product-name"><a href="{{route('user.view',['id'=>$product->id])}}">{{$product->name}}</a></h3>
                                    <h4 style="color:rgb(3, 100, 245);font-weight:bold;font-size:15px;"> {{$product->discount}} DH <del style="color:rgb(150, 8, 8);"> {{$product->price}} DH </del></h4>
                                    <div class="product-rating">
                                    </div>
                                    
                                </div>
                                <div class="add-to-cart">
                                   <a class="" href="{{route('user.view',['id'=>$product->id])}}"><i class="fa fa-shopping-cart"></i>Purchase</a>
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