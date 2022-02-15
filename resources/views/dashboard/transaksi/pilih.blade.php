<div class="row">
	<label for="nama" class="col-lg-2 col-form-label">Tanggal Transaksi  </label>
	<div class="col-lg-3">
		<input type="date" name="tgl" class="form-control @error('tgl') is-invalid @enderror"  id="tgl"  value="{{ old('tgl') }}">
	</div>
	<label for="nama" class="col-lg-1 col-form-label"> </label>
	<label for="nama" class="col-lg-2 col-form-label">Batas Waktu </label>
	<div class="col-lg-3 text-end"> 
		{{-- @foreach ($users as $user) --}}
		<input type="date" name="batas_waktu" class="form-control @error('batas_waktu') is-invalid @enderror"  id=""  value="{{ date('Y-m-d' , strtotime(date('Y-m-d') . '+3 day')) }}">
			{{-- <input type="text" name="outlet_id" class="form-control text-center @error('outlet_id') is-invalid @enderror"  id="tgl"  value="{{ strtoupper($user->outlet->nama) }}"> --}}
		{{-- @endforeach --}}
	</div>  
</div>

{{-- pilih Paket Dan Member --}}
<div class="row mt-3">
<div class="col-lg-12">
			<button type="button" class="btn btn-outline-info mb-2" data-bs-toggle="modal" data-bs-target="#member">
				Pilih Member
			</button>
			<div class="col-lg-12">
				<div class="mb row">
					<input type="hidden" name="member_id">
					<label for="nama" class="col-sm-3 col-form-label">Nama  </label>
					<label for="nama" class="col-sm-1 col-form-label">:</label>
					<div class="col-sm-8">
						<input type="text" readonly class="form-control-plaintext" id="nama" >
					</div>
				</div>
				<div class="mb row">
					<label for="username" class="col-sm-3 col-form-label">Telp  </label>
					<label for="username" class="col-sm-1 col-form-label">:</label>
					<div class="col-sm-8">
						<input type="text" readonly name="telp" class="form-control-plaintext" id="telp">
					</div>
				</div>
				<div class="mb row">
					<label for="alamat" class="col-sm-3 col-form-label">Alamat  </label>
					<label for="alamat" class="col-sm-1 col-form-label">:</label>
					<div class="col-sm-8">
						<input type="text" readonly name="alamat" class="form-control-plaintext" id="alamat" >
					</div>
				</div>
				{{-- paket --}}
				<button type="button" class="btn btn-outline-info mt-3" data-bs-toggle="modal" data-bs-target="#paket">
					Pilih Paket
				</button>
				<div class="table-responsive">
					<table class="table " id="tbl-transaksi">
					  <thead>
							<tr>
							  <th>Nama Paket</th>
							  <th>Jenis</th>
							  <th>Harga</th>
							  <th>Qty</th>
							  <th>Total</th>
							  <th>Ket</th>
							  <th>Status</th>
							</tr>
					  </thead>
					  <tbody>
							{{-- @foreach ($produks as $produk) --}}
						<tr>
							<td colspan="6" class="text-center"><i>Belum Ada Paket</i></td>
						</tr>
							{{-- @endforeach --}}
					  </tbody>
					</table>
				</div>
					{{-- pembayaran --}}
					<button class="btn btn-outline-info mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
						Bayar Langsung
					</button>
					@include('dashboard.transaksi.pembayaran')
					
						<div class="d-grid gap-2">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
			</div>
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
				$('#batas_waktu').val(new Date().toDateInputValue());	
	</script>	
@endpush