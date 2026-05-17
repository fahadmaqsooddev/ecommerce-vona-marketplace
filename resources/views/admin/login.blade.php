<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login/Register</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('admin/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('admin/assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('admin/assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('admin/assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('admin/assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{ asset('admin/global_assets/js/main/jquery.min.js') }}"></script>
	<script src="{{ asset('admin/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('admin/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->

	<link href="https://fonts.googleapis.com/css2?family=Alkatra:wght@700&family=Caveat:wght@700&family=Dancing+Script&family=Libre+Baskerville:wght@700&family=Lobster&family=Merriweather:ital@1&family=Montserrat&family=Noto+Serif+Toto:wght@600&family=Pacifico&family=Poppins:ital,wght@0,400;0,500;0,600;0,800;1,400;1,500&family=Raleway&family=Roboto&family=Sacramento&family=Signika+Negative:wght@500&family=Teko:wght@400;500&family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">

	<!-- Theme JS files -->
	<script src="{{ asset('admin/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

	<script src="{{ asset('admin/assets/js/app.js') }}"></script>
	<script src="{{ asset('admin/global_assets/js/demo_pages/login.js') }}"></script>
	<!-- /theme JS files -->

    @livewireStyles

</head>

<style>
	body {
		font-family: 'Montserrat', sans-serif !important;
		background: linear-gradient(-102deg, #fc9617 0%, grey 100%) !important;
	}

	.card {
		border-radius: 20px;
	}

	.form-control {
		height: 50px;
		border: 1px solid #df00e5 !important;
	}

	.btn-primary {
		background: #df00e5 !important;
		padding: 18px !important;
	}
</style>

<body>
	<div> <!-- Root wrapper for Livewire -->
	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">
                <livewire:admin.login/>
			</div>
			<!-- /content area -->
		</div>
		<!-- /main content -->
	</div>
</div>
	<!-- /page content -->
    @livewireScripts
</body>

</html>




































