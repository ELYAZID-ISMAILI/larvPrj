@extends('store.storeLayout')
@section('content')
<div class="section">
    <!-- container -->
    <div class="container-fluid">
        <!-- row -->
        <div class="row">

            <!-- STORE -->
            <div id="store" class="col-md-12">
                <br>
                <!-- store products -->
                <div class="row">
                    @foreach($products as $product)
                    <!-- product -->
                    <div class="col-md-6 col-xl-3 col-lg-4">
                        <div>
                            <div >
                                <a href="{{route('user.view',['id'=>$product->id])}}">
                                    <img class="img" src="uploads/products/{{$product->id}}/{{$product->image_name}}" alt="" style="width:300px; height:300px;" >
                                    </a>
                                <div>
                                    <span  style="color:rgb(172, 10, 10);font-weight:bold">Offer!!</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:rgb(172, 10, 10);font-weight:bold"> {{$product->stock}}  In Stock!!</span>
                                </div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="product-name"><a href="{{route('user.view',['id'=>$product->id])}}">{{$product->name}}</a></h3>
                                <h4 class="product-price">{{$product->discount}} DH <del style="color:rgb(150, 8, 8);" class="product-old-price"> {{$product->price}} DH </del></h4>
                                <span><span style="color:rgb(48, 59, 216);font-weight:bold">Tags: &nbsp;</span>{{$product->tag}}</span>    
                            </div>
                            <div>
                                <a   href="{{route('user.view',['id'=>$product->id])}}"><i class="fa fa-shopping-cart"></i>Purchase</a>
                            </div>
                        </div>
                    </div>
                    <!-- /product -->
                    @endforeach
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>

    @endsection
