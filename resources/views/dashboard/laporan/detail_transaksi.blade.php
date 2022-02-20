@foreach ($transaksis as $key => $transaksi)
		<!-- Modal -->
<div class="modal fade" id="Transaksi{{ $key }}" tabindex="-1" aria-labelledby="TransaksiLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="TransaksiLabel">Detail Transaksi</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<div class="table-responsive" >
				<table class="table" >
				<thead>
					<tr>
					<th>#</th>
					<th>Nama Paket</th>
					<th>Jenis Paket</th>
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
						<td>{{ $p->qty }}</td>
						<td>{{ $p->sub_total }}</td>
						<td>
							@if ($p->keterangan == '')
							<i>Tidak Ada Keterangan</i>
							@else
							{{ $p->keterangan }}
						@endif	
						</td>
					</tr>
					@endforeach
				</tbody>
				</table>
			</div>
		</div>
	  </div>
	</div>
  </div>
@endforeach

