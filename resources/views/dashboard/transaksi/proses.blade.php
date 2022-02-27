@extends('dashboard.layouts.main')

@section('content')
{{-- <div class="collapse" id="Proses">
	<div class="card">
		<div class="card-body">
			<!-- Button trigger modal -->
		  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Proses">
			  Pilih Data
		  </button>
		
		<!-- Modal -->
		<div class="modal fade" id="Proses" tabindex="-1" aria-labelledby="ProsesLabel" aria-hidden="true">
		  <div class="modal-dialog">
			 <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title" id="ProsesLabel">Modal title</h5>
				  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				  
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				  <button type="button" class="btn btn-primary">Save changes</button>
				</div>
			 </div>
		  </div>
		</div>
		</div>
	</div>
</div> --}}
<!-- Button trigger modal -->

 {{-- <div class="collapse" id="Proses"> --}}
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
		Pilih Data
	 </button>
{{-- </div>	 --}}
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		 <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		 </div>
		 <div class="modal-body">
			<div class="table-responsive">
				<table class="table user-table" id="tbl-t">
					<thead>
						<tr>
							{{-- <th class="border-top-0">#</th> --}}
							<th class="border-top-0">Nama</th>
							<th class="border-top-0">Telp</th>
							<th class="border-top-0">Jenis Kelamin</th>
							<th class="border-top-0">Alamat</th>
							<th class="border-top-0">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($transaksis as $transaksi)
						<tr>
							<td>{{ $transaksi->kode_invoice }}</td>
							<td>
							  <button type="button" class=" pilih-t btn btn-primary">Pilih</button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		 </div>
		 <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Save changes</button>
		 </div>
	  </div>
	</div>
 </div>
@endsection