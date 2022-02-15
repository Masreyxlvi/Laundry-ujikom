  <div class="collapse" id="collapseExample">
	<div class="">
		<div class="row">
			<div class="col-lg-5">
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
			<div class="col-lg-7">
				<label for="tgl" class="col-form-label"><b>Tanggal Bayar</b>  </label>
					<input type="date" name="tgl_bayar" class="form-control @error('tgl_bayar') is-invalid @enderror"  id="tgl_masuk"  value="{{ old('tgl_bayar') }}">
				<label for="tgl" class="col-form-label"><b>Outlet</b>  </label>
				<select class="form-control js-example-basic-single w-100" id="outlet_id" name="outlet_id">
					<option value="{{ Auth::user()->outlet->id }}">{{ strtoupper(Auth::user()->outlet->nama) }}</option>
				</select>
				<label for="status" class="col-form-label"><b> Status </b></label>
					<select class="form-control js-example-basic-single w-100" id="status" name="status">
						{{-- <option value="" disabled selected>-- Pilih --</option> --}}
						<option value="baru">Baru</option>
						{{-- <option value="proses">Proses</option>
						<option value="selesai">Selesai</option>
						<option value="diambil">Diambil</option> --}}
					</select>
					<div class="mt-2">
						<div class="card">
							<div class="card-body bg-primary" >
								{{-- <h4 class="text-center" >Keterangan  </h4> --}}
								<input type="text"  id="totalHarga" name="total" style="color: white" class="form-control-plaintext  form-control-lg text-center" value="Rp. 0" readonly>
							</div>
						</div>
					</div>
				</div>
				{{-- <div class="row justify-content-end"> --}}
					{{-- <div class="col-lg-10"> --}}
					{{-- </div> --}}
				{{-- </div> --}}
			</div>
		</div>
	</div>
</div>

@push('script')
	<script>
		Date.prototype.toDateInputValue = (function() {
						var local = new Date(this);
						local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
						return local.toJSON().slice(0,10);
					}); 
				$('#tgl_masuk').val(new Date().toDateInputValue());	
	</script>	
@endpush




