<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{{ $page_title ?? 'Admin Panel' }}</title>
	<link rel="shortcut icon" type="image/x-icon" href="image/download5.jpg">

    <!-- ================= GOOGLE FONTS ================= -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- ================= CSS FILES ================= -->
    <link href="{{ asset('admin/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/layout.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/components.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/colors.min.css') }}" rel="stylesheet">

    <!-- ================= EXTERNAL CSS ================= -->
    <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet">


    <!-- ================= CORE JS ================= -->
    <script src="{{ asset('admin/global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>


    <!-- ================= PLUGINS ================= -->
    <script src="{{ asset('admin/global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script src="{{ asset('admin/global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>

    <script src="{{ asset('admin/global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script src="{{ asset('admin/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
    <script src="{{ asset('admin/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script src="{{ asset('admin/global_assets/js/plugins/forms/inputs/touchspin.min.js') }}"></script>

    <script src="{{ asset('admin/global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin/global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>

    <script src="{{ asset('admin/global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>


    <!-- ================= APP ================= -->
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>


    <!-- ================= DEMO ================= -->
    <script src="{{ asset('admin/global_assets/js/demo_pages/dashboard.js') }}"></script>
    <script src="{{ asset('admin/global_assets/js/demo_pages/datatables_basic.js') }}"></script>
    <script src="{{ asset('admin/global_assets/js/demo_pages/form_input_groups.js') }}"></script>


    <!-- ================= EXTRA ================= -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

	<style>
		@font-face 
		{
			font-family: 'Poppins', sans-serif;
			src: url(assets/css/font2/trebuc.ttf);
		}
		body{
			font-family: 'Poppins', sans-serif;
		}
		.myinput
		{
			border-radius: 20px;

		}

		th{
			font-size: 15px;
			text-transform: capitalize;
		}

		td{
			font-size: 16px;
			text-transform: capitalize;    
		}

		.form-control
		{
			height: 50px !important;

		}

		.black{color: black;}

		.navbar-dark{
			background:#4d2b78 !important;
		}
		.sidebar-dark{
			background:#4d2b78 !important;
		}
		.navbar-light{
			background:#4d2b78 !important;
		}
		.btn-outline-success{
			color:#4d2b78 !important;
			background-color: transparent !important;
			background-image: none !important;
			border-color:#4d2b78 !important;
		}
		.btn-outline-primary {
			color:#4d2b78 !important;
			background-color: transparent !important;
			background-image: none !important;
			border-color: #4d2b78 !important;
		}
		.btn-success {
			color: #fff !important;
			background-color: #4d2b78 !important;
		}
		.sidebar-dark .nav-sidebar .nav-link{
			font-size: 17px !important;
		}
		.btn-outline-primary:hover{
			color: #fff !important;
			background-color: #4d2b78 !important;
			border-color: #4d2b78 !important;
		}
		.sidebar-dark .nav-sidebar .nav-link:not(.disabled):hover{
			color: #fff !important;
			background-color: rgb(63 63 63) !important;
		}
		.main_card{
			box-shadow: 0px 0px 20px 0px #4d2b78b0 !important;
			border-radius: 20px;

		}
		.header-elements-md-inline{
			box-shadow: 3px 9px 20px 10px #4d2b78 !important;
		}
		.sidebar-dark .sidebar-mobile-toggler:not([class*=bg-]) {
			background-color: #4d2b78 !important;
		}
		.navbar-light .navbar-toggler {
			color: white !important;
		}
		.btn-outline-success:hover{
			color: #fff !important;
			background-color: #4d2b78 !important;
			border-color: #4d2b78 !important;
		}
        
	</style>
    @livewireStyles
    @stack('styles')

	<script>
		$(document).ready(function() {
			var maxLength = 50;
			$('textarea').keyup(function() {
				var textlen = maxLength - $(this).val().length;
				$('#rchars').text(textlen);
			});

			$('#txtDate1').change(function() {  
				if($('#txtDate').val()!=""&&$('#txtDate1').val()!="")
				{
					if($('#txtDate').val()==$('#txtDate1').val())
					{
						alert("Dates can't be same");
					}
				}
			});

		});


	</script>
</head>
<body>
    @include('admin_layouts.partials.header')
    <div class="page-content">
		@include('admin_layouts.partials.sidebar')
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light">
            <div class="page-header-content header-elements-md-inline">
                <div class="page-title d-flex">
                    <a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Admin Panel</a>
                    <span class="breadcrumb-item active">{{ $title ?? '' }}</span>
                </div>

                <div class="header-elements d-none">

                </div>
            </div>


        </div>
	    <!-- /page header -->
        <!-- Content area -->
	    <div class="content">
           {{ $slot }}
        </div>
    
    @include('admin_layouts.partials.footer')
    </div>
</div>
@livewireScripts
</body>
</html>