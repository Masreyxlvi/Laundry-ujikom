  <!-- Modal -->
  <div class="modal fade" id="Barang" tabindex="-1" aria-labelledby="BarangLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="BarangLabel">Modal Barang</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form action="/barang" method="post">
				@csrf
				<div class="mb-3">
					<label for="nama" class="form-label">Nama Barang</label>
					<input type="text" name="nama_barang" class="form-control" id="nama" placeholder="">
				</div>
				<div class="mb-3">
					<label for="merk" class="form-label">Merk Barang</label>
					<input type="text" name="merk_barang" class="form-control" id="merk" placeholder="">
				</div>
				<div class="col-8 mb-3">
					<label for="harga" class="form-label">Qty</label>
					<input type="number" name="qty" class="form-control" id="qty" placeholder="">
				</div>
				<div class="mb-3 col-8">
					<label for="Nama Outlet">Kondisi Barang</label>
					<select class="form-control js-example-basic-single w-100" id="Nama Outlet" name="kondisi">
						<option value="" selected>-- Pilih --</option>
						<option value="layak_pakai"> Layak Pakai</option>
						<option value="rusak_ringan"> Rusak Ringan</option>
						<option value="rusak_berat"> Rusak Berat</option>
					</select>
				</div>
				<div class="col-8 mb-3">
					<label for="tanggal" class="form-label">Tanggal Pengadaan</label>
					<input type="date" name="tanggal_pengadaan" class="form-control" id="tanggal_pengadaan" placeholder="">
				</div>
		</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
		</form>
	  </div>
	</div>
  </div>