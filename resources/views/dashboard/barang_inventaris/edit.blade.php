		<!-- Button trigger modal -->
		<button type="button" class="btn btn-warning border-0" data-bs-toggle="modal" data-bs-target="#edit{{ $b->id }}">
			<i class="mdi me-2 mdi-lead-pencil">Edit</i>
		</button>

		  <!-- Modal -->
		  <div class="modal fade" id="edit{{ $b->id }}" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title" id="editLabel">Modal title</h5>
				  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="barang_inventaris/{{ $b->id }}" method="post">
						@csrf
						@method('PUT')
						<div class="mb-3">
							<label for="nama" class="form-label">Nama Barang</label>
							<input type="text" name="nama_barang" class="form-control" id="nama" placeholder="" value="{{ old('nama_barang', $b->nama_barang) }}">
						</div>
						<div class="mb-3">
							<label for="merk" class="form-label">Merk Barang</label>
							<input type="text" name="merk_barang" class="form-control" id="merk" placeholder="" value="{{ old('merk_barang', $b->merk_barang) }}">
						</div>
						<div class="col-8 mb-3">
							<label for="harga" class="form-label">Qty</label>
							<input type="number" name="qty" class="form-control" id="qty" placeholder="" value="{{ old('qty', $b->qty) }}">
						</div>
						<div class="mb-3 col-8">
							<label for="Nama Outlet">Kondisi Barang</label>
							<select class="form-control js-example-basic-single w-100" id="Nama Outlet" name="kondisi">
								<option value="" selected>-- Pilih --</option>
								<option value="layak_pakai" @if ((isset($b) && $b->kondisi == 'layak_pakai') || old('kondisi') == 'layak_pakai') selected @endif> Layak Pakai</option>
								<option value="rusak_ringan" @if ((isset($b) && $b->kondisi == 'rusak_ringan') || old('kondisi') == 'rusak_ringan') selected @endif> Rusak Ringan</option>
								<option value="rusak_berat" @if ((isset($b) && $b->kondisi == 'rusak_berat') || old('kondisi') == 'rusak_berat') selected @endif> Rusak Ringan</option>
							</select>
						</div>
						<div class="col-8 mb-3">
							<label for="tanggal" class="form-label">Tanggal Pengadaan</label>
							<input type="date" name="tanggal_pengadaan" class="form-control" id="tanggal_pengadaan" placeholder="" value="{{ old('tanggal_pengadaan', $b->tanggal_pengadaan) }}">
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