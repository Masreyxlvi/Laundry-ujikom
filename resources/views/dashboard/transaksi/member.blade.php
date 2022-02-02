<div class="modal fade" id="member" tabindex="-1" aria-labelledby="memberLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="memberLabel">Member</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<div class="table-responsive">
				<table class="table user-table" id="tbl-member">
					<thead>
						<tr>
							{{-- <th class="border-top-0">#</th> --}}
							<th class="border-top-0">Nama</th>
							<th class="border-top-0">Telp</th>
							<th class="border-top-0">Jenis Kelamin</th>
							<th class="border-top-0">Alamat</th>
							<th class="border-top-0">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($members as $member)
						<tr>
							{{-- <td>{{ $loop->iteration }}</td> --}}
							<td>{{ $member->nama }}<input type="hidden" name="idMember" value="{{ $member->id }}"> </td>
							
							<td>{{ $member->telp }}</td>
							<td>@switch($member->jenis_kelamin)
								@case('L')
								<span>Laki-laki</span>
								@break
								@case('P')
								<span>Perempuan</span>
								@break
								@default
								@endswitch
							</td>
							<td>{{ $member->alamat }}</td>
							<td>
							  <button type="button" class=" pilih-member btn btn-primary">Pilih</button>
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