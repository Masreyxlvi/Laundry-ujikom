<div class="modal fade" id="paket" tabindex="-1" aria-labelledby="paketLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="paketLabel">Paket</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<div class="table-responsive">
				<table class="table user-table" id="tbl-paket">
					<thead>
						<tr>
							{{-- <th class="border-top-0">#</th> --}}
							<th class="border-top-0">Nama Paket</th>
							<th class="border-top-0">Jenis</th>
							{{-- <th class="border-top-0">Nama Outlet</th> --}}
							<th class="border-top-0">Harga</th>
							<th class="border-top-0">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($pakets as $paket)
						<tr>
							{{-- <td>{{ $loop->iteration }}</td> --}}
							<td>{{ $paket->nama_paket }}<input type="hidden" class="idPaket"  value="{{ $paket->id }}"></td>
							<td>{{ $paket->jenis }}</td>
							<td>{{ $paket->harga }}</td>
							{{-- <td>{{ $paket->alamat }}</td> --}}
							<td>
							  <button type="button" class=" pilih-paket btn btn-primary" data-service-id="${id}">Pilih</button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	  </div>
	</div>
  </div>