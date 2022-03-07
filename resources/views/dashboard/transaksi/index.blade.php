@extends('dashboard.layouts.main')

@section('content')
{{-- <h3>Laporan</h3> --}}
	<div class="card">
		<div class="card-title mt-3">
			<h3>Data Cucian Baru</h3>
		</div>
		<div class="card-body">
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
			<div class="row">
				<div class="col-lg-10">
					@can('management-outlet')
					<!-- Button trigger modal -->
					<a href="/transaksi/create" class="btn btn-primary">New Transaksi</a>
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
			<div class="table-responsive mt-3">
				<table class="table user-table" id="order-listing">
					<thead>
						<tr>
							<th class="border-top-0">Kode Invoice</th>
							<th class="border-top-0">Nama Member</th>
							{{-- <th class="border-top-0">Nama User</th>
							<th class="border-top-0">Outlet</th> --}}
							<th class="border-top-0">Tgl Transaksi</th>
							<th class="border-top-0">Tgl bayar</th>
							<th class="border-top-0">Batas Waktu</th>
							<th class="border-top-0">Status</th>
							<th class="border-top-0">Dibayar</th>
							<th class="border-top-0">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($transaksis as $key => $transaksi)
						<tr class="">
							<td>{{ $transaksi->kode_invoice }}</td>
							<td>{{ $transaksi->member->nama}}</td>
							{{-- <td>{{ $transaksi->user->name }}</td>
							<td>{{ $transaksi->user->outlet->nama }}</td> --}}
							<td class="text-center">{{date('d-M-Y', strtotime($transaksi->tgl) ) }}</td>
							<td class="text-center">{{date('d-M-Y', strtotime($transaksi->tgl_bayar) ) }}</td>
							<td class="text-center">{{date('d-M-Y', strtotime($transaksi->batas_waktu) ) }}</td>
							<td>{{ $transaksi->status }}</td>
							<td>
								@if ($transaksi->dibayar == 'dibayar')
								<span class="badge bg-primary px-2 py-1"
                                ><i class="mdi mdi-cart-outline"></i></span>
								@else
									@include('dashboard.transaksi.update_pembayaran')
								@endif
							</td>
							<td>	
							<button type="button" class="btn btn-outline-primary  px-2 py-1" data-bs-toggle="modal" data-bs-target="#Transaksi{{ $key }}">
								<i class="mdi mdi-eye"></i>
							  </button>
						</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			
			@include('dashboard.transaksi.detail_transaksi')
		</div>
	</div>
@endsection
@push('script')
	<script>
			$('#order-listing').on('click' , '.dibayar' , function(){
			let no = $(this).closest('tr').find('td:eq(0)').text()
			let checked = ($(this).closest('tr').find('.dibayar').is(':checked')?'dibayar':'belum_dibayar')
			let data = {
								kode_invoice:no,
								status: checked,
								_token: "{{ csrf_token() }}"
								};
			$.post('{{ route("dipenuhi") }}', data, function(msg){
				alert(msg)
			})
		})	
	</script>
@endpush