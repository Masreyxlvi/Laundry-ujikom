@extends('dashboard.layouts.main')

@section('content')
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Member  Table</h4>
			
			@if(session()->has('succes'))
			<div class="alert alert-success" id="succes-alert" role="alert">
				{{session('succes')  }}
			</div>
			@endif

			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#member">
				Tambah Data
			</button>
			<div class="table-responsive">
				<table class="table user-table" id="order-listing">
					<thead>
						<tr>
							<th class="border-top-0">#</th>
							<th class="border-top-0">Nama</th>
							<th class="border-top-0">Telp</th>
							<th class="border-top-0">Jenis Kelamin</th>
							<th class="border-top-0">Alamat</th>
							<th class="border-top-0">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($members as $member)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $member->nama }}</td>
							<td>{{ $member->telp }}</td>
							<td>@switch($member->jenis_kelamin)
								@case('L')
								<span>Laki-laki</span>
								@break
								@case('P')
								<span>Perempuan</span>
								@break
								@default
								@endswitch
							</td>
							<td>{{ $member->alamat }}</td>
							<td>
								@include('dashboard.member.edit')
								<form action="/member/{{ $member->id }}" method="POST" class="d-inline">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger border-0 delete" ><i class="mdi me-2 mdi-delete">Delete</i></button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@include('dashboard.member.create')
@endsection


  
