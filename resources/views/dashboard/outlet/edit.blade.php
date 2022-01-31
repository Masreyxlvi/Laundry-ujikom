		<!-- Button trigger modal -->
		<button type="button" class="btn btn-warning border-0" data-bs-toggle="modal" data-bs-target="#edit{{ $outlet->id }}">
			<i class="mdi me-2 mdi-lead-pencil">Edit</i>
		</button>

		  <!-- Modal -->
		  <div class="modal fade" id="edit{{ $outlet->id }}" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title" id="editLabel">Modal title</h5>
				  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="outlet/{{ $outlet->id }}" method="post">
						@csrf
						@method('PUT')
						<div class="mb-3">
							<label for="nama" class="form-label">Nama</label>
							<input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $outlet->nama) }}">
						</div>
						<div class="mb-3">
							<label for="alamat" class="form-label">Alamat</label>
							<textarea class="form-control" name="alamat" id="alamat" rows="3">{{  old('alamat', $outlet->alamat) }}</textarea>
						</div>
						<div class="col-8 mb-3">
							<label for="telp" class="form-label">No Telp</label>
							<input type="text" name="telp" class="form-control" id="telp" value="{{ old('telp', $outlet->telp) }}">
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