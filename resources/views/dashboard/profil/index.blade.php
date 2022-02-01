@extends('dashboard.layouts.main')

@section('content')
<div class="col-sm-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">User Table</h4>
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
			@if(session()->has('succes'))
			<div class="alert alert-success" id="succes-alert" role="alert">
				{{session('succes')  }}
			</div>
			@endif

			{{-- <!-- Button trigger modal -->
			<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
				Tambah Data
			</button> --}}
			<a href="register/create" class="btn btn-primary mb-2">Tambah Data</a>
			<div class="table-responsive">
				<table class="table user-table">
					<thead>
						<tr>
							<th class="border-top-0">#</th>
							<th class="border-top-0">Name Full</th>
							<th class="border-top-0">Username</th>
							<th class="border-top-0">Outlet</th>
							<th class="border-top-0">Role</th>
							{{-- <th class="border-top-0">Action</th> --}}
						</tr>
					</thead>
					<tbody>
						@foreach ($users as $user)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->username }}</td>
							<td>{{ $user->outlet->nama }}</td>
							<td>{{ $user->role }}</td>
							<td>
								{{-- @include('dashboard.paket.edit') --}}
								{{-- <form action="/paket/{{ $paket->id }}" method="POST" class="d-inline">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger border-0" onclick="return confirm('Yakin Ingin Dihapus')"><i class="mdi me-2 mdi-delete">Delete</i></button>
								</form> --}}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
{{-- @include('dashboard.register.create') --}}
@endsection


  
