<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/media/image/favicon.png"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="vendors/bundle.css" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="assets/css/app.min.css" type="text/css">
</head>
<body class="form-membership">

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->

<div class="form-wrapper">

    <!-- logo -->
    
    <!-- ./ logo -->

    <h5>Create account</h5>

    <!-- form -->
    <form method="post" action="/registration">


    
    @if(Session::get('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}

</div>
@endif
@if(Session::get('error'))
    <div class="alert alert-danger">
        {{Session::get('error')}}

    </div>      
@endif
    @csrf
        <div class="form-group">
            
            <input type="text" name="name" class="form-control" placeholder="Firstname" required autofocus>
        <span class="text-danger">@error('name'){{ $massage}} @enderror</span>
        </div>
        
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <span class="text-danger">@error('email'){{ $massage}} @enderror</span>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <span class="text-danger">@error('password'){{ $massage}} @enderror</span>
       
        </div>
        <button type="submit" class="btn btn-primary btn-block">Register</button>
        <hr>
        <p class="text-muted">Already have an account?</p>
        <a href="" class="btn btn-outline-light btn-sm">Sign in!</a>
    </form>
    <!-- ./ form -->

</div>

<!-- Plugin scripts -->
<script src="vendors/bundle.js"></script>

<!-- App scripts -->
<script src="assets/js/app.min.js"></script>
</body>
</html>