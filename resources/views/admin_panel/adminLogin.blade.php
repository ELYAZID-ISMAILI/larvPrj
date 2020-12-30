<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('js/lib/jquery.js')}}"></script>
    <script src="{{asset('js/dist/jquery.validate.js')}}"></script>
    <title>Admin Login</title>
</head>

<body>
    <div class="login-page">
        <div class="form" >
            <form class="login-form" id="loginForm" method="post">
            {{csrf_field()}}
                <input type="text" name="Username" id="Username" placeholder="username" value="admin"/>
                <input type="password" name="Password" id="Password" placeholder="password" value="12345" />
                <input type="submit" name="loginButton" id="loginButton" value="LOGIN" />
            </form>
        </div>
    </div>
</body>
</html>


<!--JQUERY Validation-->
<script>
	
	$(document).ready(function() {
		// validate the comment form when it is submitted
		//$("#commentForm").validate();

		// validate signup form on keyup and submit
		$("#loginForm").validate({
			rules: {
				Username: "required",
                Password: "required"

				
				
			},
			messages: {
				Username: "No Input Entered",
				Password: "No Input Entered",
                
				
				
			}
		});

		
	});
	</script>
<!--/JQUERY Validation-->
