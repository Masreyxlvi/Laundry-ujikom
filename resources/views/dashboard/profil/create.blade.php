@extends('dashboard.layouts.main')

@section('content')
	@if($errors->any())
			<div class="alert alert-danger" role="alert" id="error-alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
<div class="col-lg-4 col-xlg-3 col-md-5">
	<div class="card">
		<div class="card-body profile-card">
			<center class="mt-4"> <img src="{{ asset('vendors') }}/assets/images/users/5.jpg"
					class="rounded-circle" width="150" />
				<h4 class="card-title mt-2">Hanna Gover</h4>
				<h6 class="card-subtitle">Admin</h6>
				<div class="row text-center justify-content-center">
				
			</center>
		</div>
	</div>
</div>
<!-- Column -->
<!-- Column -->
<div class="col-lg-8 col-xlg-9 col-md-7">
	<div class="card">
		<div class="card-body">
			<form  method="post" action="/register" class="form-horizontal form-material mx-2">
				@csrf
				<div class="form-group">
					<label class="col-md-12 mb-0">Full Name</label>
					<div class="col-md-12">
						<input type="text" name="name" placeholder=""
							class="form-control ps-0 form-control-line">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-12 mb-0">Username</label>
					<div class="col-md-12">
						<input type="text" name="username"
							class="form-control ps-0 form-control-line">
					</div>
				</div>
				<div class="form-group">
					<label for="example-email" class="col-md-12">Email</label>
					<div class="col-md-12">
						<input type="email" name="email"
							class="form-control ps-0 form-control-line" name="example-email"
							id="example-email">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-12 mb-0">Password</label>
					<div class="col-md-12">
						<input type="password" name="password"
							class="form-control ps-0 form-control-line">
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-12">Select Role</label>
					<div class="col-sm-12 border-bottom">
						<select class="form-select shadow-none ps-0 border-0 form-control-line" name="role">
							<option value="admin">Admin</option>
							<option value="kasir">Kasir</option>
							<option value="owner">owner</option>
						</select>
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-12">Select Outlet</label>
					<div class="col-sm-12 border-bottom">
						<select class="form-select shadow-none ps-0 border-0 form-control-line" name="outlet_id">
							{{-- <option value="" disabled selected>-- Pilih --</option> --}}
						@foreach ($outlets as $outlet)
						<option value="{{ $outlet->id }}">{{ $outlet->nama }}</option>
						@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12 d-flex">
						<button class="btn btn-success mx-auto mx-md-0 text-white" type="submit">Create
							User</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection