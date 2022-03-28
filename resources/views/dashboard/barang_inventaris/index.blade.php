@extends('dashboard.layouts.main')

@section('content')
<div class="col-sm-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Barang Table</h4>
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
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#Barang_inventaris">
				Tambah Data
			</button>
			@if(session()->has('succes'))
			<div class="alert alert-success" id="succes-alert" role="alert">
				{{session('succes')  }}
			</div>
			@endif
			<div class="table-responsive">
				<table class="table user-table" id="order-listing">
					<thead>
						<tr>
							<th class="border-top-0">#</th>
							<th class="border-top-0">Nama Barang</th>
							<th class="border-top-0">Merk</th>
							<th class="border-top-0">Qty</th>
							<th class="border-top-0">Tanggal</th>
							<th class="border-top-0">Kondisi</th>
							<th class="border-top-0">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($barang_inventaris as $b)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $b->nama_barang }}</td>
							<td>{{ $b->merk_barang }}</td>
							<td>{{ $b->qty }}</td>
							<td>{{ $b->tanggal_pengadaan }}</td>
							<td>
								@switch( $b->kondisi)
								@case('layak_pakai')
								<span>Layak Pakai</span>
								@break
								@case('rusak_ringan')
								<span>Rusak Ringan</span>
								@break
								@case('rusak_berat')
								<span>Rusak Berat</span>
								@break
								@default
								@endswitch
							</td>
							{{-- <td>{{ number_format($barang->harga) }}</td> --}}
							<td>
								@include('dashboard.barang_inventaris.edit')
								<form action="/barang_inventaris/{{ $b->id }}" method="POST" class="d-inline">
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
@include('dashboard.barang_inventaris.create')
@endsection


  
