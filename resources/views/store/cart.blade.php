@extends('store.storeLayout')
@section('content')
<script src="{{mix('js/app.js')}}"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container-fluid">
        <div >
            <center><h3 class="title">Your Order</h3></center>
          </div>
        <!-- row -->
        <div class="row border-bottom border-top"
          @if($all != null)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                            REMOVE
                            </th>
                            <th>
                            PRODUCT
                            </th>
                            <th>
                            QUANTITY
                            </th>
                            <th>
                            COLOR
                            </th>
                            <th>
                            PRICE
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                           @foreach($all as $c)
					      @foreach($prod as $p)
					      @if($c[0]==$p->id)
                        <tr id="deleteItem_{{$c[3]}}">
                            <td><button type="button" id="delete_item"  value={{$c[3]}} name="delete_item"  class="delete_item btn btn-danger" onClick="window.location.reload();">X</button></td>
                            <td> <img src="uploads/products/{{$p->id}}/{{$p->image_name}}" height="50px" width="50px"> {{$p->name}}
                            <td class="row">
                                <button type="button" id="sub" value={{$p->id}} class="btn btn-secondary sub col-2" data-rel={{$c[3]}} data-rel2={{$p->discount}}>-</button>
                                <input type="number" id="quantity" name={{$p->id}} class=" form-control quantity col-6" value={{$c[1]}} min="1" max="100" />
                                <button type="button" id="add" value={{$p->id}} data-rel={{$c[3]}} data-rel2={{$p->discount}} class="btn btn-secondary add col-2">+</button>  
                            </td>
                            <td>
                            <div style="height:25px;width:25px;display:inline-block;background-color: {{$c[2]}}"></div>  
                            </td>
                            <td>
                               <div id="individualPrice_{{$c[3]}}">
                                @php
                                $tot =$p->discount* $c[1];
                                echo $tot;
                                @endphp
                                
                                DH</div>
                            </td>
                        
                         @break
					      @endif
					     @endforeach 
					     @endforeach 
                       
                        </tr>
                    </tbody>
                </table>
            </div><br>
                    <span style="color:rgb(48, 59, 216);font-weight:bold">Shiping:</span><span>&nbsp;&nbsp;&nbsp;<strong>FREE</strong></span>
                    <div class="order-col">
                        <span style="color:rgb(48, 59, 216);font-weight:bold">TOTAL:</span>&nbsp;&nbsp;&nbsp;&nbsp;
                        <span style="color:rgb(172, 10, 10);font-weight:bold"  id="totalCost">{{Session::get('price')}} DH</span>
                    </div><br>
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-2" checked>
                        <label for="payment-2">
                            <span></span>
                            Cash On Delivery
                        </label>
                        <div class="caption">
                            <p>The product Will be delivered within 24 hour of confirmation. We accept only Cash on delivery at this moment.</p>
                        </div>
                    </div><br>
                    @else
                    <div class="order-col">
                        <h3  style="color:rgb(172, 10, 10);font-weight:bold; text-align: center;">Your Cart is Empty!!</h3>
                    </div><br>
                    @endif
                    
        

                @if(session('user'))
                    @if($all != null)
                   <center> <form method="post" name="cart">
                        {{csrf_field()}}
                        <input type="submit" id="confirm_order"  name="order" class="btn btn-success" value="Confirm order">
                    </form></center>

                    @else
                        <a href="{{route('user.home')}}"><input type="button"  class="btn btn-success" value="Order Now"></a>
                    @endif
                
                @else
                 @if(!session('user'))
                <div class="row   border-top ">
                    <form id="signupForm" method="post">
                        {{csrf_field()}}
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="name">Full Name</label>
                                <input class="form-control" type="text" name="name" id="name" placeholder="Full Name">
                            </div>
                                {!! $errors->first('name', '<label class="alert alert-danger" role="alert" style="list-style-type: none;">:message</label>') !!}
                            <div class="form-group col-md-10">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" onkeyup="myFunction()">
                            </div>
                            <div id="for_duplicate-email"></div>
                             {!! $errors->first('email', '<label class="alert alert-danger" role="alert" style="list-style-type: none;">:message</label>') !!}
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="address">Address</label>
                                <input class="form-control" type="text" name="address" id="address" placeholder="Address">
                            </div>
                              {!! $errors->first('address', '<label class="alert alert-danger" role="alert" style="list-style-type: none;">:message</label>') !!}
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                    <label for="city">City</label>
                                    <input class="form-control" type="text" name="city" id="city" placeholder="City">
                            </div>
                                 {!! $errors->first('city', '<label class="alert alert-danger" role="alert" style="list-style-type: none;">:message</label>') !!}
                        
                            <div class="form-group col-md-4">
                                    <label for="zip">ZIP Code</label>
                                    <input class="form-control" type="text" name="zip" id="zip" placeholder="ZIP Code">
                            </div>
                                 {!! $errors->first('zip', '<label class="alert alert-danger" role="alert" style="list-style-type: none;">:message</label>') !!}
                            <div class="form-group col-md-5">
                                    <label for="tel">Telephone</label>
                                    <input class="form-control" type="tel" name="tel" id="tel" placeholder="Telephone">
                            </div>
                                 {!! $errors->first('tel', '<label class="alert alert-danger" role="alert" style="list-style-type: none;">:message</label>') !!}
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="pass">Enter Your Password</label>
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
                          </div>
                          {!! $errors->first('pass', '<label class="alert alert-danger" role="alert" style="list-style-type: none;">:message</label>') !!}
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="confirm_password">Confirm Password</label>
                            <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                          </div>
                         {!! $errors->first('confirm_password', '<label class="alert alert-danger" role="alert" style="list-style-type: none;">:message</label>') !!}
                        </div>
                       
                        <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
                    </form>
                </div>      
                
            @endif  
                    
                @endif
                

                
           
            <!-- /Order Details -->
        
        </div>
        
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<script>
    
    //TO DO: ajax will take place
     
     $('.add').click(function () {
 
     var url="{{route('user.editCart')}}";
     var product_id= $(this).val(); 
     $(this).prev().val(+$(this).prev().val() + 1);
     var x=$(this).prev().val(); 
     var token=$("input[name=_token]").val();
     var order_serial=this.getAttribute('data-rel');
     var product_price=this.getAttribute('data-rel2');
 
 
     $.ajax({
             type:'post',
             url:url,
             dataType: "JSON",
             async: false,
             data:{pid: product_id, newQ:x, oSerial:order_serial, _token: token},
             success:function(msg)
             {
                 document.getElementById("individualPrice_"+order_serial).innerHTML=x*product_price+" DH";
                 document.getElementById("totalCost").innerHTML = msg[2]+" DH";
             }
             });
         
    
     });
     $('.sub').click(function () {
         
         var url="{{route('user.editCart')}}";
         var product_id= $(this).val();
         var order_serial=this.getAttribute('data-rel');
         var product_price=this.getAttribute('data-rel2');
         if ($(this).next().val() > 1) 
         {
             $(this).next().val(+$(this).next().val() - 1);
             var x=$(this).next().val();
             var token=$("input[name=_token]").val();
             
             
             $.ajax({
             type:'post',
             url:url,
             dataType: "JSON",
             async: false,
             data:{pid: product_id, newQ:x, oSerial:order_serial, _token: token},
             success:function(msg)
             {
                 document.getElementById("individualPrice_"+order_serial).innerHTML=x*product_price+" DH";
                 document.getElementById("totalCost").innerHTML = msg[2]+" DH";
 
             }
             });
             
         
         }
     });
     
     $('.delete_item').click(function () {
         var url="{{route('user.deleteCartItem')}}";
         var serial= $(this).val();   //serial is the forth element of sale coloumn
         var token=$("input[name=_token]").val();
         var id_holder="deleteItem_"+serial;
         $.ajax({
                 type:'post',
                 url:url,
                 dataType: "JSON",
                 async: false,
                 data:{serial:serial, _token: token},
                 success:function(msg)
                 {
                     if(msg=="Empty")
                         {
                         document.getElementById("order_summary").innerHTML = "<div class='order-col'><h1>Your Cart is Empty</h1></div>";
                         document.getElementById("confirm_order").style.visibility = "hidden";
                         }
                    
                     //$("#deleteItem_".$p->id").load(location.href+" #refresh_div","");
                     document.getElementById(id_holder).innerHTML  = "";
                     document.getElementById("totalCost").innerHTML = msg[2];
                 }
                 });
 
 
     });
     
     
     //validation
     
     $(document).ready(function() {
         // validate the comment form when it is submitted
         //$("#commentForm").validate();
 
         // validate signup form on keyup and submit
         $("#signupForm").validate({
             rules: {
                 name: "required",
                 email: {
                     required: true,
                     email: true
                 },
                 address: "required",
                 city: "required",
                 zip: {
                     required: true,
                     number: true
                 },
                 tel: "required",
                 pass: {
                     required: true,
                     minlength: 5
                 },
                 confirm_password: {
                     required: true,
                     minlength: 5,
                     equalTo: "#pass"
                 }
                 
                 
                 
             },
             messages: {
                 name: "Please enter your Fullname",
                 email: "Please enter a valid email address",
                 address: "Please enter your Address",
                 city: "Please enter your City",
                 address: "Please enter your Address",
                 zip: {
                     required: "Please enter Zipcode",
                     number: "Invalid Zipcode"
                 },
                 tel: "Please enter your Phone number",
                 pass: {
                     required: "Please provide a password",
                     minlength: "Your password must be at least 5 characters long"
                 },
                 confirm_password: {
                     required: "Please provide a password",
                     minlength: "Your password must be at least 5 characters long",
                     equalTo: "Please enter the same password as above"
                 }
                 
                 
             }
             
             
         
         });
 
         
     });
    
 </script>
 <script>
 function myFunction() {
     //var token={{ csrf_token() }};
     var email=$("#email").val();
     var token=$("input[name=_token]").val();
     var url="{{route('user.signup.check_email')}}";
     
 
             $.ajax({
                 type:'post',
                 url:url,
                 dataType: "JSON",
                 async: false,
                 data:{email: email, _token: token},
                 success:function(msg){
                         
                          
                         if(msg == "1")
                             {
                                 document.getElementById("for_duplicate-email").innerHTML = "<label class='error'>This Email Address is Already taken</label>";
                                                     
 
                             }
                     else
                         {
                             document.getElementById("for_duplicate-email").innerHTML = "";
 
                         }
                     }
              });
     
 }
 </script>
@endsection
