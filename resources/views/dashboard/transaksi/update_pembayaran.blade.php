@push('head')
	<link href="{{ asset('vendors') }}/css/status_pembayaran.css" rel="stylesheet">
@endpush
<button type="button" class="badge bg-danger border-0" data-bs-toggle="modal" data-bs-target="#pembayaran{{ $transaksi->id }}">
	<i class="mdi mdi-cart-off"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="pembayaran{{ $transaksi->id }}" tabindex="-1" aria-labelledby="pembayaran{{ $transaksi->id }}Label" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		 <div class="modal-header">
			<h5 class="modal-title" id="pembayaran{{ $transaksi->id }}Label">Update Pembayaran</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		 </div>
		 <div class="modal-body">
			 <form action="/transaksi/{{ $transaksi->id }}" method="post" id="UpdateTransaksi">
				@csrf
				@method('PUT')
				<div class="table-responsive " >
					<table class="table table-hover">
					<thead>
						<tr class="bg-success">
						<th>#</th>
						<th>Nama Paket</th>
						<th>Jenis Paket</th>
						<th>Harga Paket</th>
						<th>Qty</th>
						<th>Sub Total</th>
						<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($transaksi->DetailTransaksi as $p)		
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $p->paket->nama_paket }}</td>
							<td>
								@if ($p->paket->jenis == 'bed_cover')
								Bed Cover
								@else
								{{ $p->paket->jenis }}
								@endif	
							</td>
							<td>{{ number_format($p->paket->harga) }}</td>
							<td class="qty">{{ $p->qty }}</td>
							<td class="harga">{{ ($p->sub_total) }}</td>
							<td>
								@if ($p->keterangan == '')
								<i>Tidak Ada Keterangan</i>
								@else
								{{ $p->keterangan }}
							@endif	
							</td>
						</tr>
					</tbody>
					</table>
				</div>
				<div class="col-md-12">
					<div class="pull-right  text-end">
					  <hr />
					  <div class="text-end">
						  <h3>
							  <b>Total Pembayaran :</b> Rp.
							</h3>
							<div id="totalHarga" class="d-inline">
							  <input type="text" name="total" class="form-control-plaintext"  value="{{ number_format($transaksi->total ) }}"> 
							</div>
					  </div>
					</div>
					@endforeach
					<div class="clearfix"></div>    
					<hr />
				</div>
				{{-- Update Pembayaran --}}
				<div class="form-check form-check-inline">
						<input type="radio" name="dibayar" value="dibayar" id="dibayar"
						hidden >
						<label for="dibayar">
							<div class="card mb-0">
								<div class="card-body">
									<span>Bayar Sekarang</span>
									<div class="float-end">
											<i class="fas fa-check-circle"></i>
									</div>
								</div>
							</div>
					</label>
				</div>
			{{-- <div class="d-none" id="bayar-now"> --}}
				<div class="row">
					<div class="col-lg-6">
						<label for="tgl" class="col-form-label"><b>Tanggal Bayar</b>  </label>
							<input type="date" name="tgl_bayar" class="form-control @error('tgl_bayar') is-invalid @enderror"   value="{{ old('tgl_bayar') }}">
						<label for="nama" class="col-form-label"><b> Biaya Tambahan </b> </label>
							<input type="number" name="biaya_tambahan" class="form-control biayaTambahan @error('biaya_tambahan') is-invalid @enderror"  id="biayaTambahan"  value="0">					
					</div>
					<div class="col-lg-6">
						<label for="nama" class="col-form-label"><b> Diskon </b> </label>
						<div class="input-group ">
							<input type="number" class="form-control diskon" name="diskon" value="0" aria-label="diskon">
							<span class="input-group-text">%</span>
							<input type="text" class="form-control text-end" readonly id="totalDiskon" placeholder="Rp.0" aria-label="Server">
						</div>			 
						<label for="nama" class="col-form-label"><b> Pajak </b> </label>
							<div class="input-group ">
								<input type="number" class="form-control pajak" name="pajak" value="0" aria-label="pajak">
								<span class="input-group-text">%</span>
								<input type="text" class="form-control text-end" readonly id="totalPajak" placeholder="Rp.0" aria-label="Server">
						</div>
					</div>
				</div>
			{{-- </div> --}}
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Save changes</button>
		</div>
	</form>
	  </div>
	</div>
 </div>

 @push('script')
 <script>
	 $('[name="dibayar"]').on('change', function() {
		if ($(this).val() == 'dibayar') {
			$('#bayar-now').removeClass('d-none');
			$('#bayar-now').addClass('d-block');
		}else{
			$('#bayar-now').removeClass('d-block');
			$('#bayar-now').addClass('d-none');
		}
	});

	let totalHarga = 0
	// function UpdateTotal(a){
	// 				let qty = Number($('.qty').text());
	// 				// alert(qty)
	// 				let harga = Number($('.harga').text());
	// 				let pajak = Number($('.pajak').val());
	// 				let diskon = Number($('.diskon').val());
	// 				let biayaTambahan = Number($('.biayaTambahan').val());

	// 				let subTotal = qty * harga;
	// 				let total = subTotal + biayaTambahan
	// 				let totalPajak = pajak/100*total;
	// 				let totalDiskon = diskon/100*total;
	// 				// alert(harga)
	// 				// let rupiah = "RP. "
	// 				totalHarga = total - totalDiskon + totalPajak ;
	// 				// alert(totalPajak)
	// 				$('#totalPajak') .val(totalPajak);
	// 				$('#totalDiskon') .val(totalDiskon);
	// 				$('#totalHarga') .text(totalHarga);
	// 		}

	// 		$('#UpdateTransaksi').on('keyup change', '.pajak', function(){
	// 				UpdateTotal(this);
					
	// 			});
				
	// 			$('#UpdateTransaksi').on('keyup change', '.diskon', function(){
	// 				UpdateTotal(this);	
	// 			});

	// 			$('#UpdateTransaksi').on('keyup change', '.biayaTambahan', function(){
	// 				UpdateTotal(this);	
	// 			});
 </script>
 @endpush