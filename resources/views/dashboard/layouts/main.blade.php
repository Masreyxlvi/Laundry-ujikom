<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, materialpro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>GHS Laundry  | {{ $title }}</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('vendors') }}/assets/images/ghs.png">
    {{-- Icon Boostrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- chartist CSS -->
    <link href="{{ asset('vendors') }}/assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendors') }}/assets/plugins/dataTables.net-bs4/dataTables.bootstrap4.css">
    <link href="{{ asset('vendors') }}/assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="{{ asset('vendors') }}/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="{{ asset('vendors') }}/assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('vendors') }}/css/style.min.css" rel="stylesheet">
    @stack('head')
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
			@include('dashboard.layouts.navbar')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
			@include('dashboard.layouts.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">{{ $title }}</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
					@yield('content')
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->

                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2021 Material Pro Admin by <a href="https://www.wrappixel.com/">wrappixel.com </a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('vendors') }}/assets/plugins/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('vendors') }}/assets/sweetalert/sweetalert.min.js"></script>
    <script src="{{ asset('vendors') }}/assets/datatables.net/jquery.dataTables.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('vendors') }}/assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('vendors') }}/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="{{ asset('vendors') }}/js/waves.js"></script>
    <script src="{{ asset('vendors') }}/js/dataTables.select.min.js"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('vendors') }}/js/sidebarmenu.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="{{ asset('vendors') }}/assets/plugins/dataTables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('vendors') }}/assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="{{ asset('vendors') }}/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="{{ asset('vendors') }}/assets/plugins/d3/d3.min.js"></script>
    <script src="{{ asset('vendors') }}/assets/plugins/c3-master/c3.min.js"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('vendors') }}/js/pages/dashboards/dashboard1.js"></script>
    <script src="{{ asset('vendors') }}/js/custom.js"></script>

    <script>
        	Date.prototype.toDateInputValue = (function() {
						var local = new Date(this);
						local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
						return local.toJSON().slice(0,10);
					}); 
				$('#tgl').val(new Date().toDateInputValue());
	
    </script>
    <script>
        $(function(){
          $('#succes-alert').fadeTo(2000, 500).slideUp(500, function(){
            $('#succes->alert').slideUp(500)
          });
        })
      </script>
      <script>
	(function($) {
	'use strict';
	$(function() {
		$('#order-listing').DataTable({
		"aLengthMenu": [
			[5, 10, 15, -1],
			[5, 10, 15, "All"]
		],
		"iDisplayLength": 10,
		"language": {
			search: ""
		}
		});
		$('#order-listing').each(function() {
		var datatable = $(this);
		// SEARCH - Add the placeholder for Search and Turn this into in-line form control
		var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
		search_input.attr('placeholder', 'Search');
		search_input.removeClass('form-control-sm');
		// LENGTH - Inline-Form control
		var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
		length_sel.removeClass('form-control-sm');
		});
	});
	})(jQuery);
</script>	
<script>
	$('.delete').click(function(e){
		e.preventDefault()
		let data = $(this).closest('form').find('buttom').text()
		swal({
			title: "Apakah Kamu Yakin?", 
			text: "Data ini Ingin Dihapus?",
			icon: "warning",
			buttons:true,
			dangerMode: true,
		})
		.then((req) => {
			if(req) $(e.target).closest('form').submit()
			else swal.close()
		})
	})
</script>
      @stack('script')
</body>

</html>