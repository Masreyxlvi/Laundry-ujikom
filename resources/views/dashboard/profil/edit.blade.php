@extends('dashboard.layouts.main')

@section('content')
@if(session()->has('succes'))
<div class="alert alert-success" id="succes-alert" role="alert">
	{{session('succes')  }}
</div>
@endif

{{-- @foreach ($users as $user) --}}
	
<div class="col-lg-4 col-xlg-3 col-md-5">
	<div class="card">
		<div class="card-body profile-card">
			<center class="mt-4"> <img src="{{ asset('vendors') }}/assets/images/users/5.jpg"
				class="rounded-circle" width="150" />
				<h4 class="card-title mt-2">{{ strtoupper( Auth::user()->role) }}</h4>
				<h6 class="card-subtitle">{{ strtoupper(Auth::user()->outlet->nama) }}</h6>
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
			<form class="form-horizontal form-material mx-2" action="/register/{{ Auth::user()->id }}" method="post">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label class="col-md-12 mb-0">Full Name</label>
					<div class="col-md-12">
						<input type="text" name="name" value="{{ Auth::user()->name }}"
							class="form-control ps-0 form-control-line">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-12 mb-0">Username</label>
					<div class="col-md-12">
						<input type="text" name="username" value="{{ old('username',Auth::user()->username ) }}"
							class="form-control ps-0 form-control-line">
					</div>
				</div>
				<div class="form-group">
					<label for="example-email" class="col-md-12">Email</label>
					<div class="col-md-12">
						<input type="email"  value="{{old('email', Auth::user()->email) }}"
							class="form-control ps-0 form-control-line" name="email"
							id="example-email">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-12 mb-0">Password</label>
					<div class="col-md-12">
						<input type="password" name="password" value=""
							class="form-control ps-0 form-control-line">
					</div>
				</div>
				{{-- <div class="form-group">
					<label class="col-sm-12">Select Outlet</label>
					<div class="col-sm-12 border-bottom">
						<select class="form-select shadow-none ps-0 border-0 form-control-line">
							<option value="">{{ Auth::user()->outlet->nama }}</option>
						</select>
					</div>
				</div> --}}
				<div class="form-group">
					<div class="col-sm-12 d-flex">
						<button class="btn btn-success mx-auto mx-md-0 text-white" type="submit">Update
							Profile</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
{{-- @endforeach  --}}
@endsection