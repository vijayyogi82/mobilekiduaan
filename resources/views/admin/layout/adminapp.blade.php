<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="description" content="Dashlead -  Admin Panel HTML Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin,dashboard,panel,bootstrap admin template,bootstrap dashboard,dashboard,themeforest admin dashboard,themeforest admin,themeforest dashboard,themeforest admin panel,themeforest admin template,themeforest admin dashboard,cool admin,it dashboard,admin design,dash templates,saas dashboard,dmin ui design">
		<!-- Favicon -->
		<link rel="icon" href="{{asset('assets/admin/img/brand/favicon.ico')}}" type="image/x-icon"/>
		<!-- Title -->
		<title>Admin Dashboard</title>
		<!-- Bootstrap css-->
		<link  id="style" href="{{asset('assets/admin/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"/>
		<!-- Icons css-->
		<link href="{{asset('assets/admin/plugins/web-fonts/icons.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/admin/plugins/web-fonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
		<link href="{{asset('assets/admin/plugins/web-fonts/plugin.css')}}" rel="stylesheet"/>
		<!-- Style css-->
		<link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet">
		<link href="{{asset('assets/admin/css/boxed.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/admin/css/dark-boxed.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/admin/css/skins.css')}}" rel="stylesheet">
		<link href="{{asset('assets/admin/css/dark-style.css')}}" rel="stylesheet">
		<link href="{{asset('assets/admin/css/colors/default.css')}}" rel="stylesheet">
		<!-- Color css-->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('assets/admin/css/colors/color7.css')}}">
		<!---Select2 css-->
		<link href="{{asset('assets/admin/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
		<!-- Mutipleselect css-->
		<link rel="stylesheet" href="{{asset('assets/admin/plugins/multipleselect/multiple-select.css')}}">

		@stack('styles')
	</head>

	<body class="horizontalmenu">

		<!-- Loader -->
		<div id="global-loader">
			<img src="{{asset('assets/admin/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- End Loader -->

		<!-- Page -->
		<div class="page">

			<!-- Main Header-->
			<x-admin.mainheader />
			<!-- End Main Header-->

			<!-- Centerlogo Header-->
			<x-admin.centerlogoheader />
			<!-- End Centerlogo Header-->

			<!-- Mobile-header -->
			<x-admin.mobileheader />
			<!-- Mobile-header closed -->

			<!-- Horizonatal menu-->
			<x-admin.horizonatalmenu />
			<!--End  Horizonatal menu-->
			
			<!-- Main Content-->
			<div class="main-content pt-0">
				@yield('content')
			</div>
			<!-- End Main Content-->	

			<!-- Sidebar -->
			<x-admin.sidebar />
			<!-- End Sidebar -->

			<!-- Main Footer-->
			<x-admin.footer />
			<!--End Footer-->

		</div>
		<!-- End Page -->

		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

		<!-- Jquery js-->
		<script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
		<!-- Bootstrap js-->
		<script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<!-- Chart.Bundle js-->
		<script src="{{asset('assets/admin/plugins/chart.js/Chart.bundle.min.js')}}"></script>
		<!-- Peity js-->
		<script src="{{asset('assets/admin/plugins/peity/jquery.peity.min.js')}}"></script>
		<!-- Flot Chart js-->
		<script src="{{asset('assets/admin/plugins/jquery.flot/jquery.flot.js')}}"></script>
		<script src="{{asset('assets/admin/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
		<script src="{{asset('assets/admin/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
		<!-- Jquery-Ui js-->
		<script src="{{asset('assets/admin/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
		<!-- Select2 js-->
		<script src="{{asset('assets/admin/plugins/select2/js/select2.min.js')}}"></script>
		<script src="{{asset('assets/admin/js/select2.js')}}"></script>
		<!--MutipleSelect js-->
		<script src="{{asset('assets/admin/plugins/multipleselect/multiple-select.js')}}"></script>
		<script src="{{asset('assets/admin/plugins/multipleselect/multi-select.js')}}"></script>
		<!-- Internal Morris js -->
		<script src="{{asset('assets/admin/plugins/raphael/raphael.min.js')}}"></script>
		<script src="{{asset('assets/admin/plugins/morris.js/morris.min.js')}}"></script>
		<!-- Sidebar js-->
		<script src="{{asset('assets/admin/plugins/sidebar/sidebar.js')}}"></script>
		<!-- Perfect-scrollbar js-->
		<script src="{{asset('assets/admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
		<!-- Sticky js-->
		<script src="{{asset('assets/admin/js/sticky.js')}}"></script>
		<!-- Circle Progress js-->
		<script src="{{asset('assets/admin/js/circle-progress.min.js')}}"></script>
		<script src="{{asset('assets/admin/js/chart-circle.js')}}"></script>
		<!-- Dashboard js-->
		<script src="{{asset('assets/admin/js/index.js')}}"></script>
		<!-- Custom js-->
		<script src="{{asset('assets/admin/js/custom.js')}}"></script>
		
		@stack('scripts')
	</body>
</html>