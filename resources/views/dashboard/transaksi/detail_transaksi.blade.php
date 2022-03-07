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
			<div class="col-lg-12">
				<h4>Data User</h4>
				<div class="mb row">
					<label for="nama" class="col-sm-2 col-form-label">Nama User</label>
					<label for="nama" class="col-sm-1 col-form-label">:</label>
					<div class="col-sm-8">
						<input type="text" readonly class="form-control-plaintext" value="{{ $transaksi->user->name }}">
					</div>
				</div>
				<div class="mb row">
					<label for="username" class="col-sm-2 col-form-label">Email  </label>
					<label for="username" class="col-sm-1 col-form-label">:</label>
					<div class="col-sm-8">
						<input type="text" readonly name="telp" class="form-control-plaintext" value="{{ $transaksi->user->email }}" >
					</div>
				</div>
				<div class="mb row">
					<label for="alamat" class="col-sm-2 col-form-label">Role  </label>
					<label for="alamat" class="col-sm-1 col-form-label">:</label>
					<div class="col-sm-6">
						<textarea type="text" readonly name="alamat" class="form-control-plaintext" value="" >{{ $transaksi->user->role }}</textarea>
					</div>
				</div>
				<h4>Data Member</h4>
				<div class="mb row">
					<label for="nama" class="col-sm-2 col-form-label">Nama  </label>
					<label for="nama" class="col-sm-1 col-form-label">:</label>
					<div class="col-sm-8">
						<input type="text" readonly class="form-control-plaintext" value="{{ $transaksi->member->nama }}">
					</div>
				</div>
				<div class="mb row">
					<label for="username" class="col-sm-2 col-form-label">Telp  </label>
					<label for="username" class="col-sm-1 col-form-label">:</label>
					<div class="col-sm-8">
						<input type="text" readonly name="telp" class="form-control-plaintext" value="{{ $transaksi->member->telp }}" >
					</div>
				</div>
				<div class="mb row">
					<label for="alamat" class="col-sm-2 col-form-label">Alamat  </label>
					<label for="alamat" class="col-sm-1 col-form-label">:</label>
					<div class="col-sm-6">
						<textarea type="text" readonly name="alamat" class="form-control-plaintext" value="" >{{ $transaksi->member->alamat }}</textarea>
					</div>
				</div>
			</div>

			<div class="table-responsive " >
				<table class="table table-hover">
				<thead>
					<tr class="bg-success">
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
			<div class="col-md-12">
				<div class="pull-right mt-2 text-end">
				  {{-- <p>Sub - Total : Rp. {{ number_format( $p->sub_total ) }}</p>  --}}
				  <p>Biaya Tambahan : Rp. {{ number_format( $transaksi->biaya_tambahan) }}</p>
				  <p>Pajak : Rp. {{ number_format( $transaksi->pajak) }}%</p>
				  <p>Diskon : Rp. {{ number_format( $transaksi->diskon) }}%</p>
				  <hr />
				  <div class="text-center">
					  <h3><b>Total :</b> Rp. {{ number_format($transaksi->total ) }}</h3>
				  </div>
				</div>
				<div class="clearfix"></div>    
				<hr />
			</div>
		</div>
	  </div>
	</div>
  </div>
@endforeach

