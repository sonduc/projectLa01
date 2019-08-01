<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Blog</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="{{ asset('') }}">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="loginBlog_assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="loginBlog_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="loginBlog_assets/fonts/iconic/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" type="text/css" href="loginBlog_assets/vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="loginBlog_assets/vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="loginBlog_assets/vendor/animsition/css/animsition.min.css">
  <link rel="stylesheet" type="text/css" href="loginBlog_assets/vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="loginBlog_assets/vendor/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="loginBlog_assets/css/util.css">
  <link rel="stylesheet" type="text/css" href="loginBlog_assets/css/main.css">
</head>
<body>
  <div class="container-login100" style="background-image: url('loginBlog_assets/images/bg-01.jpg');">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
      <form class="login100-form validate-form" action="{{ route('loginBlog.post') }}" method="POST">
        {{csrf_field()}}

        @if (count($errors) >0)
        <div class="alert alert-danger" style="width: 280px">
          @foreach ($errors->all() as $err)
          {{$err}}<br>
          @endforeach
        </div>
        @endif

        @if (session('thongbao'))
        <div class="alert alert-danger" style="width: 280px">
          {{session('thongbao')}}
        </div>
        @endif

        <span class="login100-form-title p-b-37">
          Sign In
        </span>

        <div class="wrap-input100 validate-input m-b-20">
          <input class="input100" type="email" name="email" placeholder="Email">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-25">
          <input class="input100" type="password" name="password" placeholder="Password">
          <span class="focus-input100"></span>
        </div>
        
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember">
            Remember
          </label>
        </div>

        <div class="container-login100-form-btn">
          <button class="login100-form-btn">
            Sign In
          </button>
        </div>

        <div class="text-center p-t-57 p-b-20" style="padding-top: 10px;">
          <span class="txt1">
            Or login with
          </span>
        </div>

        <div class="flex-c p-b-112" style="padding-bottom: 20px;">
          <a href="#" class="login100-social-item">
            <i class="fa fa-facebook-f"></i>
          </a>
          <a href="{{ asset('auth/google') }}" class="login100-social-item">
            <img src="loginBlog_assets/images/icons/icon-google.png" alt="GOOGLE">
          </a>
        </div>

        <div class="text-center">
          <a href="#" class="txt2 hov1">
            Sign Up
          </a>
        </div>
      </form>
    </div>
  </div>

  <div id="dropDownSelect1"></div>



  <script src="loginBlog_assets/vendor/jquery/jquery-3.2.1.min.js"></script>

  <script src="loginBlog_assets/vendor/animsition/js/animsition.min.js"></script>

  <script src="loginBlog_assets/vendor/bootstrap/js/popper.js"></script>
  <script src="loginBlog_assets/vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="loginBlog_assets/vendor/select2/select2.min.js"></script>
  
  <script src="loginBlog_assets/vendor/daterangepicker/moment.min.js"></script>
  <script src="loginBlog_assets/vendor/daterangepicker/daterangepicker.js"></script>
  
  <script src="loginBlog_assets/vendor/countdowntime/countdowntime.js"></script>
  
  <script src="loginBlog_assets/js/main.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>

</body>
</html>
