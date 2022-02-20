@extends('dashboard.layouts.main')

@section('content')
<div class="col-lg-3 col-md-6">
	<div class="card">
	  <div class="card-body">
		 
		<div class="d-flex flex-row">
		  <div
			class="
			  round round-lg
			  text-white
			  d-flex
			  align-items-center
			  justify-content-center
			  rounded-circle
			  bg-info
			"
		  >
			<i
			  data-feather="credit-card"
			  class="bi bi-cart-check"
			></i>
		  </div>
		  <div class="ms-2 align-self-center">
			<h3 class="mb-0">Rp . {{  number_format($total) }}</h3>
			<h6 class="text-muted mb-0">Total Penghasilan</h6>
		  </div>
		</div>
	  </div>
	</div>
  </div>
  <!-- Column -->
  <!-- Column -->
  <div class="col-lg-3 col-md-6">
	<div class="card">
	  <div class="card-body">
		<div class="d-flex flex-row">
		  <div
			class="
			  round round-lg
			  text-white
			  d-flex
			  align-items-center
			  justify-content-center
			  rounded-circle
			  bg-warning
			"
		  >
			<i
			  data-feather="monitor"
			  class="bi bi-cart-plus"
			></i>
		  </div>
		  <div class="ms-2 align-self-center">
			<h3 class="mb-0">{{ $transaksi }}</h3>
			<h6 class="text-muted mb-0">Total Transaksi</h6>
		  </div>
		</div>
	  </div>
	</div>
  </div>
  <!-- Column -->
  <!-- Column -->
  <div class="col-lg-3 col-md-6">
	<div class="card">
	  <div class="card-body">
		<div class="d-flex flex-row">
		  <div
			class="
			  round round-lg
			  text-white
			  d-flex
			  align-items-center
			  justify-content-center
			  rounded-circle
			  bg-primary
			"
		  >
			<i
			  data-feather="shopping-bag"
			  class=" bi bi-people"
			></i>
		  </div>
		  <div class="ms-2 align-self-center">
			<h3 class="mb-0">{{ $member }}</h3>
			<h6 class="text-muted mb-0">Total Member</h6>
		  </div>
		</div>
	  </div>
	</div>
  </div>
  <!-- Column -->
  <!-- Column -->
  <div class="col-lg-3 col-md-6">
	<div class="card">
	  <div class="card-body">
		<div class="d-flex flex-row">
		  <div
			class="
			  round round-lg
			  text-white
			  d-flex
			  justify-content-center
			  align-items-center
			  rounded-circle
			  bg-danger
			"
		  >
			<i
			  data-feather="shield"
			  class="bi bi-book-half"
			></i>
		  </div>
		  <div class="ms-2 align-self-center">
			<h3 class="mb-0">{{ $paket }}</h3>
			<h6 class="text-muted mb-0">Total Paket</h6>
		  </div>
		</div>
	  </div>
	</div>
  </div>
  <!-- Column -->

<div class="col-lg-8">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-12">
					<div class="d-flex flex-wrap align-items-center">
						<div>
							<h3 class="card-title">Sales Overview</h3>
							<h6 class="card-subtitle">Ample Admin Vs Pixel Admin</h6>
						</div>
						<div class="ms-lg-auto mx-sm-auto mx-lg-0">
							<ul class="list-inline d-flex">
								<li class="me-4">
									<h6 class="text-success"><i
											class="fa fa-circle font-10 me-2 "></i>Ample</h6>
								</li>
								<li>
									<h6 class="text-info"><i
											class="fa fa-circle font-10 me-2"></i>Pixel</h6>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="amp-pxl" style="height: 360px;">
						<div class="chartist-tooltip"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-4">
	<div class="card">
		<div class="card-body">
			<h3 class="card-title">Our Visitors </h3>
			<h6 class="card-subtitle">Different Devices Used to Visit</h6>
			<div id="visitor"
				style="height: 290px; width: 100%; max-height: 290px; position: relative;"
				class="c3">
				<div class="c3-tooltip-container"
					style="position: absolute; pointer-events: none; display: none;">
				</div>
			</div>
		</div>
		<div>
			<hr class="mt-0 mb-0">
		</div>
		<div class="card-body text-center ">
			<ul class="list-inline d-flex justify-content-center align-items-center mb-0">
				<li class="me-4">
					<h6 class="text-info"><i class="fa fa-circle font-10 me-2 "></i>Mobile</h6>
				</li>
				<li class="me-4">
					<h6 class=" text-primary"><i class="fa fa-circle font-10 me-2"></i>Desktop</h6>
				</li>
				<li class="me-4">
					<h6 class=" text-success"><i class="fa fa-circle font-10 me-2"></i>Tablet</h6>
				</li>
			</ul>
		</div>
	</div>
</div>
@endsection