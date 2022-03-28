	<div class="card">
		<div class="card-body">
			<div class="row">

				<label for="nama" class="col-lg-2 col-form-label">Tanggal Transaksi  </label>
				<div class="col-lg-3">
				<input type="date" name="tgl" class="form-control @error('tgl') is-invalid @enderror"  id="tgl"  value="{{ old('tgl') }}">
			</div>
			<label for="nama" class="col-lg-1 col-form-label"> </label>
			<label for="nama" class="col-lg-2 col-form-label">Batas Waktu </label>
			<div class="col-lg-3 text-end"> 
				<input type="date" name="batas_waktu" class="form-control @error('batas_waktu') is-invalid @enderror"  id=""  value="{{ date('Y-m-d' , strtotime(date('Y-m-d') . '+3 day')) }}">
			</div>  
		</div>
	</div>
		<div class="card card-body">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Pilih Paket" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly id="namamember" >
						<button type="button" class="btn btn-outline-info mb-2" data-bs-toggle="modal" data-bs-target="#paket">
							<i class="mdi mdi-arrow-right"></i>
						</button>
						<input type="hidden" name="member_id">
					</div>
				
				</div>
				<div class="row">
					<div class="col-lg-12">
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
								<tr>
									<td colspan="6" class="text-center"><i>Belum Ada Paket</i></td>
								</tr>
								<tr>
								</tr>
							</tbody>
							</table>
						</div>
					</div>
				</div>
		</div>
		
			{{-- pilih Paket Dan Member --}}
				<div class="row mt-3">
					<div class="col-lg-12">
										@include('dashboard.transaksi.pembayaran')	
									<div class="d-grid gap-2">
										<button type="submit" class="btn btn-primary">Check Out</button>
									</div>
								</div>
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