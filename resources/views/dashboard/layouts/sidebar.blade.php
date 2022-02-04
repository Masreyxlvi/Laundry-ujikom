<aside class="left-sidebar" data-sidebarbg="skin6">
	<!-- Sidebar scroll-->
	<div class="scroll-sidebar">
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav">
			<ul id="sidebarnav">
				<!-- User Profile-->
				<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request ::is('dashboard') ? 'active' : ' ' }}"
						href="/dashboard" aria-expanded="false"><i class="mdi me-2 mdi-gauge"></i><span
							class="hide-menu">Dashboard</span></a>
				</li>
				@can('management-outlet')
				<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
						href="/outlet" aria-expanded="false">
						<i class="mdi me-2 mdi-home-modern"></i><span class="hide-menu">Outlet</span></a>
				</li>
				

				<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
						href="/paket" aria-expanded="false"><i class="mdi me-2 mdi-book-open-page-variant"></i><span
							class="hide-menu">Paket</span></a>
				</li>
				@endcan
				<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
						href="/member" aria-expanded="false"><i
							class="mdi me-2 mdi-account-box"></i><span class="hide-menu">Member</span></a>
				</li>
				@can('management-outlet')
				<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link  {{ Request ::is('register*') ? 'active' : ' ' }}"
						href="/register" aria-expanded="false"><i
							class="mdi me-2 mdi-account"></i><span class="hide-menu">User</span></a>
				</li>
				@endcan
				<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
						href="/transaksi" aria-expanded="false"><i
							class="mdi me-2 mdi-cart"></i><span class="hide-menu">Transaksi</span></a>
				</li>
				<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
						href="/laporan" aria-expanded="false"><i
							class="mdi me-2 mdi-book"></i><span class="hide-menu">Laporan</span></a>
				</li>
			</ul>

		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
	<div class="sidebar-footer">
		<div class="row">
			<div class="col-4 link-wrap">
				<!-- item-->
				<a href="" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i
						class="ti-settings"></i></a>
			</div>
			<div class="col-4 link-wrap">
				<!-- item-->
				<a href="" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
						class="mdi mdi-gmail"></i></a>
			</div>
			<div class="col-4 link-wrap">
				<!-- item-->
				<form action="/logout" method="post" >
					@csrf
					  <button type="submit" class="link border-0 logout" data-toggle="tooltip" title="" data-original-title="Logout"> 
						<i class="mdi mdi-power"></i>
					  </button>
				  </form>
				{{-- <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
						class="mdi mdi-power"></i></a> --}}
			</div>
		</div>
	</div>
</aside>
@push('script')
	<script>
		$('.logout').click(function(e){
            e.preventDefault()
            let data = $(this).closest('form').find('buttom').text()
            swal({
                title: "Apakah Kamu Yakin?", 
                text: "Yakin Anda Ingin Logout?",
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
@endpush




