@extends('store.storeLayout')
@section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>
<link rel="stylesheet" href="{{mix('/css/app.css')}}">
<link rel="stylesheet" href="{{mix('/css/theme.css')}}">
<!-- SECTION -->
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form method="post" id="loginForm">
                    {{csrf_field()}}
                    <div class="col-md-6" style="float: none;">
                        <!-- Billing Details -->
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">User Login</h3>
                            </div>
                        <div class="form-group">
                            <input class="input" type="email" name="email" id="email" placeholder="Email" value="john@examle.com">
                        </div>
                        <div class="form-group">
                            <input class="input" type="password" name="pass" id="pass" placeholder="Password" value="12345">
                        </div>
                            <input type="submit"  name="signin" class="primary-btn order-submit" value="Sign In">
                </form>
                        @if(session('message'))
                    
                    
                        <tr>
                            <td>
                                <li> {{session('message')}}</li>
                            </td>
                        </tr>
                        
                        
                        
                        
                         
                        @endif   
                        
                        @if($errors->any())
        
                                            <ul>
                                                @foreach($errors->all() as $err)
                                                <tr>
                                                    <td>
                                                        <li>{{$err}}</li>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </ul>
                                            @endif
                            
                    </div>
                        <!-- /Billing Details -->
            </div>
        
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
    </div>
    <!--JQUERY Validation-->
    <script>
        
        $(document).ready(function() {
            // validate the comment form when it is submitted
            //$("#commentForm").validate();
    
            // validate signup form on keyup and submit
            $("#loginForm").validate({
                rules: {
                    
                    email: {
                        required: true,
                        email: true
                    },
                    pass: {
                        required: true,
                        minlength: 5
                    }
                },
                messages: {
                    
                    email: "Please enter a valid email address",
                    
                    
                    pass: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    }
                    
                    
                }
            });
    
            
        });
    </script>
    <!--/JQUERY Validation-->
    <!-- /SECTION -->
    @endsection
    