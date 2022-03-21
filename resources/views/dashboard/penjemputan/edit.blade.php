		<!-- Button trigger modal -->
		<button type="button" class="btn btn-warning border-0" data-bs-toggle="modal" data-bs-target="#edit{{ $penjemputan->id }}">
			<i class="mdi me-2 mdi-lead-pencil">Edit</i>
		</button>

		  <!-- Modal -->
		  <div class="modal fade" id="edit{{ $penjemputan->id }}" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title" id="editLabel">Modal title</h5>
				  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="penjemputan/{{ $penjemputan->id }}" method="post">
						@csrf
						@method('PUT')
						<div class="mb-3">
							<label for="Nama Outlet">Nama Outlet</label>
							<select class="form-control js-example-basic-single w-100" id="Nama Outlet" name="member_id">
								@foreach ($members as $member)
								@if(old('member_id') == $member->id)
									<option value="{{ $member->id }}" selected>{{ $member->nama }}</option>
								@else
									<option value="{{ $member->id }}">{{ $member->nama }}</option>
								@endif
							@endforeach
							</select>
						</div>
						<div class="mb-3">
							<label for="petugas" class="form-label">Nama Petugas</label>
							<input class="form-control" name="petugas" id="petugas" value="{{ old('petugas', $penjemputan->petugas) }}">
						</div>
						<div class="mb-3">
							<label for="status">Status</label>
							<select name="status" id="status" class="form-control">
								{{-- <option selected disabled>-- Pilih Status --</option> --}}
								<option value="tercatat" @if ((isset($penjemputan) && $penjemputan->status == 'tercatat') || old('status') == 'tercatat') selected @endif>Tercatat</option>
								<option value="penjemputan" @if ((isset($penjemputan) && $penjemputan->status == 'penjemputan') || old('status') == 'penjemputan') selected @endif>Penjemputan</option>
								<option value="selesai" @if ((isset($penjemputan) && $penjemputan->status == 'selesai') || old('status') == 'selesai') selected @endif>Selesai</option>
								{{-- <option value="lainnya" @if ((isset($penjemputan) && $penjemputan->status == 'lainnya') || old('status') == 'lainnya') selected @endif>Lainnya</option> --}}
							</select>
							@error('status')
								<small class="text-danger">{{ $message }}</small>
							@enderror
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