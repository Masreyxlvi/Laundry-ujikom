@extends('dashboard.layouts.main')

@section('content')
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Outlet Table</h4>
			
			@if(session()->has('succes'))
			<div class="alert alert-success" id="succes-alert" role="alert">
				{{session('succes')  }}
			</div>
			@endif
			<div class="row mb-2">
				<div class="col-lg-10">
					@can('management-outlet')
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Outlet">
						Tambah Data
					</button>
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importOutlet">
						Import
					</button>
					@endcan
				</div>
				<div class="col-lg-2">
					<a href="/outlet/cetak_pdf" target="_blank"
					title="Cetak nota" class="btn btn-outline-success"><i class="ti-printer">PDF</i>
					</a>
					<a href="/outlet/export_excel" class="btn btn-outline-success "><i class="fas fa-file-excel">Excel</i>
					</a>
				</div>
			</div>

			<div class="table-responsive">
				<table class="table user-table" id="order-listing">
					<thead>
						<tr>
							<th class="border-top-0">#</th>
							<th class="border-top-0">Nama</th>
							<th class="border-top-0">Alamat</th>
							<th class="border-top-0">Telp</th>
							@can('management-outlet')
							<th class="border-top-0">Action</th>	
							@endcan
						</tr>
					</thead>
					<tbody>
						@foreach ($outlets as $outlet)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $outlet->nama }}</td>
							<td>{{ $outlet->alamat }}</td>
							<td>{{ $outlet->telp }}</td>
							@can('management-outlet')
							<td>
								@include('dashboard.outlet.edit')
								<form action="/outlet/{{ $outlet->id }}" method="POST" class="d-inline">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger border-0 delete"><i class="mdi me-2 mdi-delete">Delete</i></button>
								</form>
							</td>
							@endcan
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@include('dashboard.outlet.create')
@include('dashboard.outlet.import')
@endsection
{{-- @push('script')

@endpush --}}


  
