@extends('dashboard.layouts.main')

@section('content')
<h3>Laporan</h3>
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
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
							<th class="border-top-0">Biaya Tambahan</th>
							<th class="border-top-0">Diskon</th>
							<th class="border-top-0">Pajak</th>
							<th class="border-top-0">Status</th>
							<th class="border-top-0">Dibayar</th>
							<th class="border-top-0">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($transaksis as $key => $transaksi)
						<tr class="text-center">
							<td>{{ $transaksi->kode_invoice }}</td>
							<td>{{ $transaksi->member->nama }}</td>
							{{-- <td>{{ $transaksi->user->name }}</td>
							<td>{{ $transaksi->user->outlet->nama }}</td> --}}
							<td>{{date('d-M-Y', strtotime($transaksi->tgl) ) }}</td>
							<td>{{date('d-M-Y', strtotime($transaksi->tgl_bayar) ) }}</td>
							<td>{{date('d-M-Y', strtotime($transaksi->batas_waktu) ) }}</td>
							<td>	
								@if ($transaksi->biaya_tambahan == '0')
								-
								@else
								{{ $transaksi->biaya_tambahan }}
							@endif 
							</td>
							<td>
								@if ($transaksi->diskon == '0')
									-
									@else
									{{ $transaksi->diskon }}
								@endif	
							</td>
							<td>
								@if ($transaksi->pajak == '0')
									-
									@else
									{{ $transaksi->pajak }}
								@endif	
							</td>
							<td>{{ $transaksi->status }}</td>
							<td>
								@if ($transaksi->dibayar == 'dibayar')
								<span class="badge bg-primary px-2 py-1"
                                ><i class="mdi mdi-cart-outline"></i></span>
								@else
								<span class="badge bg-danger px-2 py-1"
                                ><i class="mdi mdi-cart-off"></i></span>
									
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
			@include('dashboard.laporan.detail_transaksi')
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