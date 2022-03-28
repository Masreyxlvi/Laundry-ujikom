@extends('dashboard.layouts.main')

@section('content')
<h3>Laporan</h3>
	<div class="card">
		<div class="card-body">
			<form action="/laporan">
				{{-- @csrf --}}
				<div class="row mb-5 ">
					<label for="nama" class="col-lg-2 col-form-label"><b>DARI TANGGAL</b>  </label>
					<div class="col-lg-4">
						<input type="date" name="start_date" class="form-control @error('search') is-invalid @enderror"  value="">
					</div>
					{{-- <label for="nama" class="col-lg-1 col-form-label"> </label> --}}
					<label for="nama" class="col-lg-1 col-form-label"><b>SAMPAI</b> </label>
					<div class="col-lg-4 text-end"> 
						{{-- @foreach ($users as $user) --}}
						<input type="date" name="end_date" class="form-control @error('search') is-invalid @enderror"  id=""  value="">
							{{-- <input type="text" name="outlet_id" class="form-control text-center @error('outlet_id') is-invalid @enderror"  id="tgl"  value="{{ strtoupper($user->outlet->nama) }}"> --}}
						{{-- @endforeach --}}
					</div>  
					<div class="col-lg-1">
						<button type="submit" class="btn btn-primary">Search</button>
					</div>
				</div>
			</form>
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
							<th class="border-top-0">Status</th>
							<th class="border-top-0">Dibayar</th>
							<th class="border-top-0">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($transaksis as $key => $transaksi)
						<tr class="text-center">
							<td>{{ $transaksi->kode_invoice }}</td>
							<td>{{ $transaksi->member->nama}}</td>
							{{-- <td>{{ $transaksi->user->name }}</td>
							<td>{{ $transaksi->user->outlet->nama }}</td> --}}
							<td class="text-center">
								@if ($transaksi->tgl == null)
									 -
								@else
								{{date('d-M-Y', strtotime($transaksi->tgl) ) }}
								@endif
							</td>
							<td class="text-center">{{date('d-M-Y', strtotime($transaksi->tgl_bayar) ) }}</td>
							<td class="text-center">{{date('d-M-Y', strtotime($transaksi->batas_waktu) ) }}</td>
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
			<div class="col-md-12">
				<div class="pull-right mt-2 text-end">
				  <hr /> 
				  <div class="text-end">
					  <h3><b>Total Pendapatan :</b> Rp. {{ number_format($total ) }}</h3>
				  </div>
				</div>
				<div class="clearfix"></div>    
				<hr />
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