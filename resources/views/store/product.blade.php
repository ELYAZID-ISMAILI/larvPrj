@extends('store.storeLayout')
@section('content')
 <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container-fluid"><br>
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-xl-5 ">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img class="img" src="../uploads/products/{{$product->id}}/{{$product->image_name}}" alt="" style="width:500px; height:500px;">
                    </div>
                </div>
            </div>
            <!-- /Product main img -->
            <!-- Product details -->
            <div class="col-xl-6 border " >
                <div class="product-details">
                    <h3 class="product-name">{{$product->name}}</h3>
                    <div>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                    </div>
                    <div>
                        <h3 style="color:rgb(3, 100, 245);font-weight:bold;font-size:20px;"> {{$product->discount}} DH <del style="color:rgb(150, 8, 8);"> {{$product->price}} DH</del></h3>
                        <span style="color:rgb(172, 10, 10);font-weight:bold"> {{$product->stock}}  In Stock!!</span> 
                    </div>
                    <p><span style="color:rgb(48, 59, 216);font-weight:bold">Description:</span> <br><span style="color: black;"> {{$product->description}} </span></p>
                    <form method="post" id="order_form">
                     {{csrf_field()}}
                        <div class="form-group row mb-3" style="padding-left: 15px;">
                           <span style="color:rgb(48, 59, 216);font-weight:bold">Quantity:&nbsp;&nbsp;</span>
                           <button type="button" id="sub" class="btn btn-secondary col-sm-1">-</button>
                           <input type="number" id="quantity" name="quantity" class=" form-control col-sm-3" value="1" min="1" max="100"  />
                           <button type="button" id="add" class="btn btn-secondary col-sm-1">+</button>&nbsp;&nbsp;
                        
                           @foreach($colors as $c)
                          <input type="radio" name="color" value="{{$c}}" checked/>
                          <div class="col-sm-1" style="height:25px;width:25px;margin:5px;display:inline-block;background-color: {{$c}}"></div>
                          @endforeach
                        </div>  
                        <div id="for_error"></div>
                         <button type="submit" name="myButton" id="myButton" class="btn btn-success"> add to cart</button>
                    </form>
                    <p>
                        <span style="color:rgb(48, 59, 216);font-weight:bold"> Category:&nbsp;&nbsp;</span>
                        <a href="{{route('user.search')}}?c={{$product->category->id}}">{{$product->category->name}}</a><br>
                        <span><span style="color:rgb(48, 59, 216);font-weight:bold">Tags: &nbsp;</span><span style="color: black;">{{$product->tag}}</span></span>
                    </p>
                </div>
            </div>
            <!-- /Product details -->

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

<!--JQUERY Validation-->
<script>
	
    //////////////////////////////////////
    $(document).ready(function() {
		
		$("#order_form").validate({
			
            submitHandler: function (form) {
            if($('input[name=color]:checked').val()==undefined)
            {
                
            document.getElementById("for_error").innerHTML = "<label class='error' style=' '>Invalid Variation Input</label>";

            }
                else
                    {
                        return true;
                    }
                
         }
		});

		
	});
	
    $('#add').click(function () {
        
        $(this).prev().val(+$(this).prev().val() + 1);
        
    });
    $('#sub').click(function () {
            if ($(this).next().val() > 1) {
            $(this).next().val(+$(this).next().val() - 1);
            }
    });
    
	
   
	</script>
<!--/JQUERY Validation-->
<!-- /SECTION -->
@endsection
