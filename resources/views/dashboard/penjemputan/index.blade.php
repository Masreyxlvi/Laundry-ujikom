@extends('dashboard.layouts.main')

@section('content')
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-lg-6">
					<h4 class="card-title">Penjemputan Table</h4>
					@if($errors->any())
					<div class="alert alert-danger" role="alert" id="error-alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="close">
							<span aria-hidden="true">&times;</span>
						</button>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					@if(session()->has('succes'))
					<div class="alert alert-success" id="succes-alert" role="alert">
						{{session('succes')  }}
					</div>
					@endif
				</div>
				{{-- <div class="col-lg-6">
						<select name="member_id" id="logging" class="form-control">
							@foreach($loggings as $logging)
								<option>{{ strtoupper($logging->aksi) }}</option>
							@endforeach
						</select>
					</div>
				</div> --}}
			</div>
			<div class="row ">
				<div class="col-lg-10">
					{{-- @can('management-outlet') --}}
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#penjemputan">
						Tambah Data
					</button>
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importpenjemputan">
						Import
					</button>
					{{-- @endcan --}}
				</div>
				<div class="col-lg-2">
					<a href="/penjemputan/cetak_pdf" target="_blank"
					title="Cetak nota" class="btn btn-outline-success"><i class="ti-printer">PDF</i>
					</a>
					<a href="/penjemputan/export_excel" class="btn btn-outline-success "><i class="fas fa-file-excel">Excel</i>
					</a>
				</div>
			</div>

			<div class="table-responsive">
				<table class="table user-table new_table" id="order-listing">
					<thead>
						<tr>
							<th class="border-top-0">#</th>
							<th class="border-top-0">Nama Member</th>
							<th class="border-top-0">Alamat</th>
							<th class="border-top-0">Telp</th>
							<th class="border-top-0">Petugas</th>
							<th class="border-top-0">Status</th>
							{{-- @can('management-penjemputan') --}}
							<th class="border-top-0">Action</th>	
							{{-- @endcan --}}
						</tr>
					</thead>
					<tbody>
						@foreach ($penjemputans as $penjemputan)
						<tr>
							<td >{{ $loop->iteration }} <input type="hidden" class="id" value="{{ $penjemputan->id }}"></td>
							<td>{{ $penjemputan->member->nama }}</td>
							<td>{{ $penjemputan->member->alamat }}</td>
							<td>{{ $penjemputan->member->telp }}</td>
							<td>{{ $penjemputan->petugas }}</td>
							<td>
								<select name="status" id="status" class="form-control status" aria-label="Default select example">
									{{-- <option selected disabled>-- Pilih Status --</option> --}}
									<option value="tercatat" @if ((isset($penjemputan) && $penjemputan->status == 'tercatat') || old('status') == 'tercatat') selected @endif>Tercatat</option>
									<option value="penjemputan" @if ((isset($penjemputan) && $penjemputan->status == 'penjemputan') || old('status') == 'penjemputan') selected @endif>Penjemputan</option>
									<option value="selesai" @if ((isset($penjemputan) && $penjemputan->status == 'selesai') || old('status') == 'selesai') selected @endif>Selesai</option>
									{{-- <option value="lainnya" @if ((isset($penjemputan) && $penjemputan->status == 'lainnya') || old('status') == 'lainnya') selected @endif>Lainnya</option> --}}
								</select>
								@error('status')
									<small class="text-danger">{{ $message }}</small>
								@enderror
								{{-- @include('dashboard.penjemputan.status') --}}
							</td>
							<td
								@include('dashboard.penjemputan.edit')
								<form action="/penjemputan/{{ $penjemputan->id }}" method="POST" class="d-inline">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger border-0 delete"><i class="mdi me-2 mdi-delete">Delete</i></button>
								</form>
							</td>
							{{-- @endcan --}}
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@include('dashboard.penjemputan.create')
@include('dashboard.penjemputan.import')
@endsection
@push('script')
<script>
	 $(function(){
		$('.new_table').on('change', '.status' ,function(){
			let status     = $(this).closest('tr').find('.status').val()
			let id         = $(this).closest('tr').find('.id').val()
			let data        = {
										id:id,
										status:status,
										_token: "{{csrf_token()}}"};
			$.post('{{ route("status")}}',data,function(msg){

			})
			Swal.fire({
					position: 'top-end',
					icon: 'success',
					title: 'Status Has Been Change',
					showConfirmButton: false,
					timer: 2000
					})
			})
	 })

</script>
@endpush


  
