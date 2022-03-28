<div class="modal fade" id="Barang" tabindex="-1" aria-labelledby="BarangLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		 <div class="modal-header">
			<h5 class="modal-title" id="BarangLabel">Modal title</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		 </div>
		 <div class="modal-body">
			<form action="barang" method="post">
				@csrf
				<div class="mb-3">
					<label for="barang" class="form-label">Nama Barang</label>
					<input class="form-control" name="nama_barang" id="barang" >
				</div>
				<div class="mb-3">
					<label for="qty" class="form-label">Qty</label>
					<input type="number" value="1" class="form-control" name="qty" id="qty" >
				</div>
				<div class="mb-3">
					<label for="harga" class="form-label">Harga</label>
					<input type="number" value="1" class="form-control" name="harga" id="harga" >
				</div>
				<div class="mb-3">
					<label for="waktu_pembelian" class="form-label">Waktu Pembelian</label>
					<input type="date" class="form-control" name="waktu_pembelian" value="{{ date('Y-m-d') }}" id="waktu_pembelian" >
				</div>
				<div class="mb-3">
					<label for="status" class="form-label">Status</label>
					<select name="status" id="status" class="form-control">
						<option value="diajukan_beli">Diajukan Beli</option>
						<option value="habis">Habis</option>
						<option value="tersedia">Tersedia</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="supplier" class="form-label">Supplier</label>
					<input type="text" class="form-control" name="supplier" id="supplier" >
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