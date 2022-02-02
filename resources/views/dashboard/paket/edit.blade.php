		<!-- Button trigger modal -->
		<button type="button" class="btn btn-warning border-0" data-bs-toggle="modal" data-bs-target="#edit{{ $paket->id }}">
			<i class="mdi me-2 mdi-lead-pencil">Edit</i>
		</button>

		  <!-- Modal -->
		  <div class="modal fade" id="edit{{ $paket->id }}" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title" id="editLabel">Modal title</h5>
				  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="paket/{{ $paket->id }}" method="post">
						@csrf
						@method('PUT')
						<div class="mb-3">
							<label for="nama" class="form-label">Nama Paket</label>
							<input type="text" name="nama_paket" class="form-control" id="nama" placeholder="" value="{{ old('nama_paket', $paket->nama_paket) }}">
						</div>
						<div class="mb-3 col-8">
							<label for="jenis">Jenis</label>
							<select name="jenis" id="jenis" class="form-control">
								<option selected disabled>-- Pilih jenis --</option>
								<option value="kaos" @if ((isset($paket) && $paket->jenis == 'kaos') || old('jenis') == 'kaos') selected @endif>Kaos</option>
								<option value="selimut" @if ((isset($paket) && $paket->jenis == 'selimut') || old('jenis') == 'selimut') selected @endif>Selimut</option>
								<option value="bed_cover" @if ((isset($paket) && $paket->jenis == 'bed_cover') || old('jenis') == 'bed_cover') selected @endif>Bed Cover</option>
								<option value="lainnya" @if ((isset($paket) && $paket->jenis == 'lainnya') || old('jenis') == 'lainnya') selected @endif>Lainnya</option>
							</select>
							@error('jenis')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>
						<div class="mb-3 col-8">
							<label for="Nama Outlet">Nama Outlet</label>
							<select class="form-control js-example-basic-single w-100" id="Nama Outlet" name="outlet_id">
								{{-- @foreach ($outlets as $outlet) --}}
								@foreach ($users as $user)
								<option value="{{ $user->outlet->id }}">{{ $user->outlet->nama }}</option>
								@endforeach
							{{-- @endforeach --}}
							</select>
						</div>
						<div class="col-8 mb-3">
							<label for="harga" class="form-label">Harga</label>
							<input type="number" name="harga" class="form-control" id="harga" placeholder="" value="{{ old('harga', $paket->harga) }}">
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