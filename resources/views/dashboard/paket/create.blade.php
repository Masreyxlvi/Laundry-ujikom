  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form action="/paket" method="post">
				@csrf
				<div class="mb-3">
					<label for="nama" class="form-label">Nama Paket</label>
					<input type="text" name="nama_paket" class="form-control" id="nama" placeholder="">
				</div>
				<div class="mb-3 col-8">
					<label for="Jenis">Jenis</label>
					<select class="form-control js-example-basic-single w-100" id="Jenis" name="jenis">
						<option value="" disabled selected>-- Pilih --</option>
						<option value="kiloan">Kiloan</option>
						<option value="selimut">Selimut</option>
						<option value="bed_cover">Bed Cover</option>
						<option value="kaos">Kaos</option>
					</select>
				</div>
				<div class="mb-3 col-8">
					<label for="Nama Outlet">Nama Outlet</label>
					<select class="form-control js-example-basic-single w-100" id="Nama Outlet" name="outlet_id">
						{{-- <option value="" selected>-- Pilih --</option> --}}
						{{-- @foreach ($users as $user) --}}
						<option value="{{ Auth::user()->outlet->id }}">{{ Auth::user()->outlet->nama }}</option>
						{{-- @endforeach --}}
					</select>
				</div>
				<div class="col-8 mb-3">
					<label for="harga" class="form-label">Harga</label>
					<input type="number" name="harga" class="form-control" id="harga" placeholder="">
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