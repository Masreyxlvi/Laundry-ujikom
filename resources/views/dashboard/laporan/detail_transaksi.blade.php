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
					<th>Kode Invoice</th>
					<th>Nama Paket</th>
					<th>Qty</th>
					<th>Keterangan</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($transaksi->DetailTransaksi as $p)		
					<tr>
						<td>{{ $p->transaksi->kode_invoice }}</td>
						<td>{{ $p->paket->nama_paket }}</td>
						<td>{{ $p->qty }}</td>
						<td>{{ $p->keterangan }}</td>
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

