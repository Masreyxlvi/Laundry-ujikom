@extends('dashboard.layouts.main')

@section('content')
<div class="col-sm-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Paket Table</h4>
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
			<div class="row mb-2">
				<div class="col-lg-10">
					@can('management-outlet')
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
					<a href="/paket/export_excel" class="btn btn-outline-success "><i class="fas fa-file-excel">Excel</i>
					</a>
				</div>
			</div>
			<!-- Button trigger modal -->
			
			<div class="table-responsive">
				<table class="table user-table table-paket" id="order-listing">
					<thead>
						<tr>
							<th class="border-top-0">#</th>
							<th class="border-top-0">Nama Paket</th>
							<th class="border-top-0">Jenis</th>
							<th class="border-top-0">Nama Outlet</th>
							<th class="border-top-0">Harga</th>
							<th class="border-top-0">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($pakets as $paket)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $paket->nama_paket }}</td>
							<td>
								@if ($paket->jenis == 'bed_cover')
									Bed Cover
									@else
									{{ $paket->jenis }}
								@endif
							</td>
							<td>{{ $paket->outlet->nama }}</td>
							<td>{{ number_format($paket->harga) }}</td>
							<td>
								@include('dashboard.paket.edit')
								<form action="/paket/{{ $paket->id }}" method="POST" class="d-inline">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger border-0 delete"><i class="mdi me-2 mdi-delete">Delete</i></button>
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
@include('dashboard.paket.create')
@endsection


  
