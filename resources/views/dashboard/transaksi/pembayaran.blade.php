  {{-- <div class="collapse" id="Proses"> --}}
	  <h3>Pembayaran</h3>
	<div class="card card-body">
		<div class="row">
			<div class="col-lg-6">
				<label for="tgl" class="col-form-label"><b>Pilih Member</b>  </label>
				<div class="input-group">
					<input type="text" class="form-control " placeholder="Data Member" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly id="NamaMember" >
					<button type="button" class="btn btn-outline-info mb-2" data-bs-toggle="modal" data-bs-target="#DataMember">
						<i class="mdi mdi-eye md"></i>
					</button>
					<button type="button" class="btn btn-info mb-2" data-bs-toggle="modal" data-bs-target="#member">
						<i class="mdi mdi-arrow-right"></i>
					</button>
					<input type="hidden" name="member_id">
				</div>
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
					<div class="mb-1">
						<label for="dibayar" class="col-form-label"><b> Status Pembayaran </b></label>
					</div>
					<div class="form-check form-check-inline">
							<input type="radio" name="dibayar" value="dibayar" id="dibayar"
							hidden >
							<label for="dibayar">
								<div class="card mb-0">
									 <div class="card-body">
										  <span>Bayar Sekarang</span>
										  <div class="float-end px-1 py-1">
												<i class="fas fa-check-circle"></i>
										  </div>
									 </div>
								</div>
						  </label>
					</div>
					<div class="form-check form-check-inline">
							<input type="radio" name="dibayar" value="belum_dibayar" id="belum_dibayar"
							hidden >
							<label for="belum_dibayar">
								<div class="card mb-0">
									 <div class="card-body">
										  <span >Bayar Nanti</span>
										  <div class="float-end px-1 py-1">
												<i class="fas fa-check-circle"></i>
										  </div>
									 </div>
								</div>
						  </label>
					</div>
				</div>
				<div class="col-lg-6">
						<div class="d-none" id="bayar-now">
							<label for="tgl" class="col-form-label"><b>Tanggal Bayar</b>  </label>
								<input type="date" name="tgl_bayar" class="form-control @error('tgl_bayar') is-invalid @enderror"   value="{{ old('tgl_bayar') }}">
							<label for="nama" class="col-form-label"><b> Biaya Tambahan </b> </label>
								<input type="number" name="biaya_tambahan" class="form-control biayaTambahan @error('biaya_tambahan') is-invalid @enderror"  id="biayaTambahan"  value="0">					
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
								{{-- <input type="number" name="pajak" class="form-control pajak "  value="0">		 --}}
								<div class="mt-2">
									<div class="card">
										<div class="card-body bg-primary" >
											{{-- <h4 class="text-center" >Keterangan  </h4> --}}
											<input type="text"  id="totalHarga" name="total" style="color: white" class="form-control-plaintext  form-control-lg text-center total" value="Rp. 0" readonly>
										</div>
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
{{-- </div>    --}}

@push('script')
	<script>
		Date.prototype.toDateInputValue = (function() {
						var local = new Date(this);
						local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
						return local.toJSON().slice(0,10);
					}); 
				$('#tgl_masuk').val(new Date().toDateInputValue());	

	$('[name="dibayar"]').on('change', function() {
		if ($(this).val() == 'dibayar') {
			$('#bayar-now').removeClass('d-none');
			$('#bayar-now').addClass('d-block');
		}else{
			$('#bayar-now').removeClass('d-block');
			$('#bayar-now').addClass('d-none');
		}
	});
	</script>	
@endpush




