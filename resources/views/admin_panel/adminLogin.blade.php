<!DOCTYPE html>
<html lang="en">
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
