<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="description" content="Spruha -  Admin Panel HTML Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin,dashboard,panel,bootstrap admin template,bootstrap dashboard,dashboard,themeforest admin dashboard,themeforest admin,themeforest dashboard,themeforest admin panel,themeforest admin template,themeforest admin dashboard,cool admin,it dashboard,admin design,dash templates,saas dashboard,dmin ui design">

		<!-- Favicon -->
		<link rel="icon" href="{{ asset('assets/admin/img/brand/favicon.ico') }}" type="image/x-icon"/>
		
		<!-- Title -->
		<title>Admin Login</title>

		<!-- Bootstrap css-->
		<link  id="style" href="{{ asset('assets/admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>

		<!-- Icons css-->
		<link href="{{ asset('assets/admin/plugins/web-fonts/icons.css') }}" rel="stylesheet"/>
		<link href="{{ asset('assets/admin/plugins/web-fonts/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/admin/plugins/web-fonts/plugin.css') }}" rel="stylesheet"/>

		<!-- Style css-->
		<link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/admin/css/boxed.css') }}" rel="stylesheet" />
		<link href="{{ asset('assets/admin/css/dark-boxed.css') }}" rel="stylesheet" />
		<link href="{{ asset('assets/admin/css/skins.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/admin/css/dark-style.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/admin/css/colors/default.css') }}" rel="stylesheet">

		<!-- Color css-->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/admin/css/colors/color5.css') }}">

	</head>

	<body class="main-body leftmenu">

		<!-- Loader -->
		<div id="global-loader">
			<img src="{{ asset('assets/admin/img/loader.svg') }}" class="loader-img" alt="Loader">
		</div>
		<!-- End Loader -->

		<!-- Page -->
		<div class="page main-signin-wrapper">

			<!-- Row -->
			<div class="row signpages text-center">
				<div class="col-md-12">
					<div class="card">
						<div class="row row-sm">
							<div class="col-lg-6 col-xl-5 d-none d-lg-block text-center bg-primary details">
								<div class="mt-5 pt-4 p-2 pos-absolute">
									<img src="{{ asset('assets/admin/img/brand/mkd logo final-06.png') }}" class="header-brand-img mb-4" alt="logo">
									<div class="clearfix"></div>
									<img src="{{ asset('assets/admin/img/svgs/user.svg') }}" class="ht-100 mb-0" alt="user">
									<h5 class="mt-4 text-white">Create Your Account</h5>
									<span class="tx-white-6 tx-13 mb-5 mt-xl-0">Signup to create, discover and connect with the global community</span>
								</div>
							</div>
							<div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form ">
								<div class="container-fluid">
									<div class="row row-sm">
										<div class="card-body mt-2 mb-2">
											<img src="{{ asset('assets/admin/img/brand/logo.png') }}" class=" d-lg-none header-brand-img text-start float-start mb-4" alt="logo">
											<div class="clearfix"></div>
											<form  action="{{ route('adminlogin') }}" method ="POST">
												@csrf
												<h5 class="text-start mb-2">Signin to Your Account</h5>
												<p class="mb-4 text-muted tx-13 ms-0 text-start">Signin to create, discover and connect with the global community</p>
												<div class="form-group text-start">
													<label>Email</label>
													<input class="form-control" name="email" placeholder="Enter your email" type="text">
												</div>
												<div class="form-group text-start">
													<label>Password</label>
													<input class="form-control" name="password" placeholder="Enter your password" type="password">
												</div>
												<button type="submit" class="btn ripple btn-main-primary btn-block">Sign In</button>
											</form>
											<div class="text-start mt-5 ms-0">
												<div class="mb-1"><a href="">Forgot password?</a></div>
												<div>Don't have an account? <a href="#">Register Here</a></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Row -->

		</div>
		<!-- End Page -->

		<!-- Jquery js-->
		<script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>

		<!-- Bootstrap js-->
		<script src="{{ asset('assets/admin/plugins/bootstrap/js/popper.min.js') }}"></script>
		<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

		<!-- Select2 js-->
		<script src="{{ asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
		<script src="{{ asset('assets/admin/js/select2.js') }}"></script>

		<!-- Custom js -->
		<script src="{{ asset('assets/admin/js/custom.js') }}"></script>

	</body>
</html>