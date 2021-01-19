<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    <link rel="stylesheet" href="{{mix('/css/theme.css')}}">
</head>
<body>
            <form id="loginForm" class="col-8" method="post">

                   {{csrf_field()}}
                   <div class="form-group">
                       <label for="Username" >Username</label>
                       <input type="text" class="form-control" name="Username" id="Username" placeholder="example" required/>
                    </div>
                    <div class="form-group">
                       <label for="Password" >Password</label>
                       <input type="password" class="form-control" name="Password" id="Password" placeholder="Password" required/>
                    </div>
                    <input type="submit" class="btn btn-primary" name="loginButton" id="loginButton" value="LOGIN" />
                </div>
            </form>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
            <script src="{{mix('/js/scripts.js')}}">></script>
</body>
</html>
=======

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
>>>>>>> 92e7f2710bc63be312ec8c608e5a3865be6d6f37
