@extends('dashboard.layouts.main')

@section('content')
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-lg-6">
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
					@if(session()->has('succes'))
					<div class="alert alert-success" id="succes-alert" role="alert">
						{{session('succes')  }}
					</div>
					@endif
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-lg-10">
					<!-- Button untuk menambah Data barang -->
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Barang">
						Tambah
					 </button>
					<!-- Button untuk import data  -->
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importbarang">
						Import
					</button>
				</div>
				<div class="col-lg-2">
					{{-- link untuk download pdf data barang --}}
					<a href="/barang/cetak_pdf" target="_blank"
					title="Cetak nota" class="btn btn-outline-success"><i class="ti-printer">PDF</i>
					</a>
					{{-- link untuk download excel data barang --}}
					<a href="/barang/export_excel" class="btn btn-outline-success "><i class="fas fa-file-excel">Excel</i>
					</a>
				</div>
			</div>

			{{-- table untuk menampilkan data barang --}}
			<div class="table-responsive">
				<table class="table user-table new_table" id="order-listing">
					<thead>
						<tr>
							<th class="border-top-0">#</th>
							<th class="border-top-0">Nama Barang</th>
							<th class="border-top-0">Qty</th>
							<th class="border-top-0">Harga</th>
							<th class="border-top-0">Waktu Pembelian</th>
							<th class="border-top-0">Status</th>
							<th class="border-top-0">Update Status</th>
							<th class="border-top-0">Action</th>	
						</tr>
					</thead>
					<tbody>
						{{-- mengambil data barang dari database --}}
						@foreach ($barangs as $barang)
						<tr>
							<td >{{ $loop->iteration }} 
								<input type="hidden" class="id" value="{{ $barang->id }}">
								<input type="hidden" class="update" value="{{ date('Y-m-d H:i:s') }}">
							</td>
							<td>{{ $barang->nama_barang }}</td>
							<td>{{ $barang->qty }}</td>
							<td>{{ number_format($barang->harga) }}</td>
							<td>{{ $barang->waktu_pembelian }}</td>
							<td>
								{{-- update Status barang --}}
								<select name="status" id="status" class="form-select status" aria-label="Default select example">
									<option value="diajukan_beli" @if ((isset($barang) && $barang->status == 'diajukan_beli') || old('status') == 'diajukan_beli') selected @endif>Diajukan Beli</option>
									<option value="habis" @if ((isset($barang) && $barang->status == 'habis') || old('status') == 'habis') selected @endif>Habis</option>
									<option value="tersedia" @if ((isset($barang) && $barang->status == 'tersedia') || old('status') == 'tersedia') selected @endif>Tersedia</option>
								</select>
								@error('status')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</td>
							<td><span  id="update">{{ $barang->updated_at }}</span></td>
							<td
							{{-- tampilan edit --}}
							@include('dashboard.barang.edit')
							{{-- button untuk menghapush data --}}
								<form action="/barang/{{ $barang->id }}" method="POST" class="d-inline">
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
@include('dashboard.barang.create')
@include('dashboard.barang.import')
@endsection
@push('script')
<script>
	// js untuk mengupdate status barang
	 $(function(){
		$('.new_table').on('change', '.status' ,function(){
			let status     = $(this).closest('tr').find('.status').val()
			let id         = $(this).closest('tr').find('.id').val()
			let update        = $(this).closest('tr').find('.update').val()
			let data        = {
										id:id,
										status:status,
										update:update,
										_token: "{{csrf_token()}}"};
					$(this).closest('tr').find('#update').text(update)

			$.post('{{ route("status")}}',data,function(msg){

			})
			// alert jika status berhasil di update
			Swal.fire({
					position: 'top-end',
					icon: 'success',
					title: 'Status Has Been Change',
					showConfirmButton: false,
					timer: 2000
					})
			})
	 })

</script>
@endpush


  
