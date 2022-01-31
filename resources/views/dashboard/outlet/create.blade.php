  <!-- Modal -->
  <div class="modal fade" id="Outlet" tabindex="-1" aria-labelledby="OutletLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="OutletLabel">Modal title</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form action="outlet" method="post">
				@csrf
				<div class="mb-3">
					<label for="nama" class="form-label">Nama</label>
					<input type="text" name="nama" class="form-control" id="nama" placeholder="">
				</div>
				<div class="mb-3">
					<label for="alamat" class="form-label">Alamat</label>
					<textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
				</div>
				<div class="col-8 mb-3">
					<label for="telp" class="form-label">No Telp</label>
					<input type="text" name="telp" class="form-control" id="telp" placeholder="">
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