<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng Nhập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="{{ asset('') }}">
	<link rel="icon" type="image/png" href="login_assets/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="login_assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="login_assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="login_assets/css/main.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('login_assets/images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					account login
				</span>
				@if (count($errors) >0)
				<div class="alert alert-danger" style="width: 500px">
					@foreach ($errors->all() as $err)
					{{$err}}<br>
					@endforeach
				</div>
				@endif

				@if (session('thongbao'))
				<div class="alert alert-danger" style="width: 411px">
					{{session('thongbao')}}
				</div>
				@endif
				<form class="login100-form validate-form p-b-33 p-t-5" action="{{ route('login.post') }}" method="POST">
					{{csrf_field()}}
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="Email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							login
						</button>
					</div>
					<div class="text-center p-t-15 p-b-15">
						<span>
							Or Sign Up Using
						</span>
					</div>
					<div class="flex-c-m">
						<a href="#" style="font-size: 25px;color: #fff;text-align: center;width: 50px;height: 50px;border-radius: 50%;margin: 5px;background-color: #3b5998;padding-top: 4px;">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#"  style="font-size: 25px;color: #fff;text-align: center;width: 50px;height: 50px;border-radius: 50%;margin: 5px;background-color: #ea4335;padding-top: 4px;">
							<i class="fa fa-google"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<script src="login_assets/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="login_assets/vendor/animsition/js/animsition.min.js"></script>
	<script src="login_assets/vendor/bootstrap/js/popper.js"></script>
	<script src="login_assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="login_assets/vendor/select2/select2.min.js"></script>
	<script src="login_assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="login_assets/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="login_assets/vendor/countdowntime/countdowntime.js"></script>
	<script src="login_assets/js/main.js"></script>
</body>
</html>