  <!-- Modal -->
  <div class="modal fade" id="penjemputan" tabindex="-1" aria-labelledby="penjemputanLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="penjemputanLabel">Modal Penjemputan</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form action="penjemputan" method="post">
				@csrf
				<div class="mb-3">
					<label for="member" class="form-label">Pilih Member</label>
					<select name="member_id" id="member" class="form-control">
						@foreach($members as $member)
							<option value="{{ $member->id }}">{{ strtoupper($member->nama) }}</option>
						@endforeach
					</select>
				</div>
				<div class="mb-3">
					<label for="petugas" class="form-label">Nama Petugas</label>
					<input class="form-control" name="petugas" id="petugas" >
				</div>
				<div class="mb-3">
					<label for="status" class="form-label">Status</label>
					<select name="status" id="status" class="form-control">
							<option value="tercatat">Tercatat</option>
							<option value="penjemputan">Penjemputan</option>
							<option value="selesai">Selesai</option>
					</select>
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