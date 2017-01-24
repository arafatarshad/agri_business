<!-- resources/views/auth/login.blade.php -->
<html>
<head>
 <link href="{{ asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
 <!-- Font Awesome Icons -->
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
 <!-- Ionicons -->
 <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/main.css')}}">
 <style>
    .login-container>.row{
        /*background: red;*/
        /*margin-top: 100px !important;*/
    }
</style>    
</head>
<body>
<div class="container">
    <div class="row"> 
        <div class="login-container">
            <form method="POST" action="/auth/login">
                {!! csrf_field() !!}
                <div class="input-group input-group-lg row">
                    <label class="col-lg-5 form-control">Email</label>
                    <input class="col-lg-7 form-control" type="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="input-group input-group-lg row">
                   <label class="col-lg-5 form-control">Password</label>
                    <input class="col-lg-7 form-control" type="password" name="password" id="password">
                </div>
                <div class="row">
                    <input type="checkbox" name="remember"> Remember Me
                </div>
                <div class="row">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script src="{{ asset ("/bower_components/admin-lte/plugins/jQuery/jQuery-2.2.3.min.js") }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 

</html> 
