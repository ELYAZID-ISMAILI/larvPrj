@extends('store.storeLayout')
@section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>

    <!-- SECTION -->
<div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <form id="signupForm" method="post">
                    {{csrf_field()}}
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="name">Full Name</label>
                            <input class="form-control" type="text" name="name" id="name" placeholder="Full Name">
                        </div>
                            {!! $errors->first('name', '<label class="error">:message</label>') !!}
                        <div class="form-group col-md-10">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" onkeyup="myFunction()">
                        </div>
                        <div id="for_duplicate-email"></div>
                         {!! $errors->first('email', '<label class="error">:message</label>') !!}
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="address">Address</label>
                            <input class="form-control" type="text" name="address" id="address" placeholder="Address">
                        </div>
                          {!! $errors->first('address', '<label class="error">:message</label>') !!}
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                                <label for="city">City</label>
                                <input class="form-control" type="text" name="city" id="city" placeholder="City">
                        </div>
                             {!! $errors->first('city', '<label class="error">:message</label>') !!}
                    
                        <div class="form-group col-md-4">
                                <label for="zip">ZIP Code</label>
                                <input class="form-control" type="text" name="zip" id="zip" placeholder="ZIP Code">
                        </div>
                             {!! $errors->first('zip', '<label class="error">:message</label>') !!}
                        <div class="form-group col-md-5">
                                <label for="tel">Telephone</label>
                                <input class="form-control" type="tel" name="tel" id="tel" placeholder="Telephone">
                        </div>
                             {!! $errors->first('tel', '<label class="error">:message</label>') !!}
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="pass">Enter Your Password</label>
                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
                      </div>
                      {!! $errors->first('pass', '<label class="error">:message</label>') !!}
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="confirm_password">Confirm Password</label>
                        <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                      </div>
                     {!! $errors->first('confirm_password', '<label class="error">:message</label>') !!}
                    </div>
                   
                    <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
                </form>
    
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
</div>

<!--JQUERY Validation-->
<script>
    
    
   
    
    
    
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
<!--/JQUERY Validation-->



<!--Duplicate Email Validation-->
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
<!--/Duplicate Email Validation-->

<!-- /SECTION -->
@endsection

