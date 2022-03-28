		<!-- Button untuk mengedit data barang -->
		<button type="button" class="btn btn-warning border-0" data-bs-toggle="modal" data-bs-target="#edit{{ $barang->id }}">
			<i class="mdi me-2 mdi-lead-pencil">Edit</i>
		</button>

		  <!-- Modal untuk mengupdate data branag-->
		  <div class="modal fade" id="edit{{ $barang->id }}" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title" id="editLabel">Modal title</h5>
				  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="barang/{{ $barang->id }}" method="post">
						@csrf
						@method('PUT')
						<div class="mb-3">
							<label for="barang" class="form-label">Nama Barang</label>
							<input class="form-control" name="nama_barang" id="barang" value="{{ old('nama_barang', $barang->nama_barang) }}">
						</div>
						<div class="mb-3">
							<label for="qty" class="form-label">Qty</label>
							<input type="number" value="{{ old('qty', $barang->qty) }}" class="form-control" name="qty" id="qty" >
						</div>
						<div class="mb-3">
							<label for="harga" class="form-label">Harga</label>
							<input type="number" value="{{ old('harga', $barang->harga) }}" class="form-control" name="harga" id="harga" >
						</div>
						<div class="mb-3">
							<label for="waktu_pembelian" class="form-label">Waktu Pembelian</label>
							<input type="date" class="form-control" name="waktu_pembelian" value="{{ old('waktu_pembelian', $barang->waktu_pembelian) }}" id="waktu_pembelian" >
						</div>
						<div class="mb-3">
							<select name="status" id="status" class="form-control status" aria-label="Default select example">
								<option value="diajukan_beli" @if ((isset($barang) && $barang->status == 'diajukan_beli') || old('status') == 'diajukan_beli') selected @endif>Diajukan Beli</option>
								<option value="habis" @if ((isset($habis) && $habis->status == 'habis') || old('status') == 'habis') selected @endif>Habis</option>
								<option value="tersedia" @if ((isset($barang) && $barang->status == 'tersedia') || old('status') == 'tersedia') selected @endif>Tersedia</option>
							</select>
							@error('status')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>
						<div class="mb-3">
							<label for="supplier" class="form-label">Supplier</label>
							<input type="text" class="form-control" name="supplier" id="supplier" value="{{ old('supplier', $barang->supplier) }}">
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