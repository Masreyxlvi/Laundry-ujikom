  <div class="collapse" id="collapseExample">
	<div class="card card-body">
		<div class="row">
			<div class="col-lg-6">
				<label for="nama" class="col-form-label"><b> Biaya Tambahan </b> </label>
					<input type="number" name="biaya_tambahan" class="form-control @error('biaya_tambahan') is-invalid @enderror"  id="tgl"  value="0">					
				<label for="nama" class="col-form-label"><b> Diskon </b> </label>
					<input type="number" name="diskon" class="form-control @error('diskon') is-invalid @enderror"  id="tgl"  value="0">					
				<label for="nama" class="col-form-label"><b> Pajak </b> </label>
					<input type="number" name="pajak" class="form-control @error('pajak') is-invalid @enderror"  id="tgl"  value="0">					
					<div class="mb-1">
						<label for="dibayar" class="col-form-label"><b> Status Pembayaran </b></label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="dibayar" id="dibayar" value="dibayar"
							@if ((isset($transaksi) && $transaksi->dibayar == 'dibayar') || old('dibayar') == 'dibayar') checked @endif>
						<label class="form-check-label" for="dibayar">
							Dibayar
						</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="dibayar" id="belum_dibayar" value="belum_dibayar"
							@if ((isset($transaksi) && $transaksi->dibayar == 'belum_dibayar') || old('dibayar') == 'belum_dibayar') checked @endif>
						<label class="form-check-label" for="belum_dibayar">
							Belum Dibayar
						</label>
					</div>
			</div>
			<div class="col-lg-6">
				<label for="nama" class="col-form-label"><b>Batas Waktu</b>  </label>
					<input type="date" name="batas_waktu" class="form-control @error('batas_waktu') is-invalid @enderror"  id="tgl"  value="{{ old('batas_waktu') }}">
				<label for="nama" class="col-form-label"><b>Tanggal Bayar</b>  </label>
					<input type="date" name="tgl_bayar" class="form-control @error('tgl_bayar') is-invalid @enderror"  id="tgl"  value="{{ old('tgl_bayar') }}">
				<label for="status" class="col-form-label"><b> Status </b></label>
					<select class="form-control js-example-basic-single w-100" id="status" name="status">
						<option value="" disabled selected>-- Pilih --</option>
						<option value="baru">Baru</option>
						<option value="proses">Proses</option>
						<option value="selesai">Selesai</option>
						<option value="diambil">Diambil</option>
					</select>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="mt-1">
						<div class="card">
							<div class="card-body bg-info" >
								{{-- <h4 class="text-center" >Keterangan  </h4> --}}
								<input type="text"  id="total-harga" name="total" style="color: white" class="form-control-plaintext  form-control-lg text-center" value="Rp. 0" readonly>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>






