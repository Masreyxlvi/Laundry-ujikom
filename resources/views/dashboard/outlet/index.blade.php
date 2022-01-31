@extends('dashboard.layouts.main')

@section('content')
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Outlet Table</h4>
			
			@if(session()->has('succes'))
			<div class="alert alert-success" id="succes-alert" role="alert">
				{{session('succes')  }}
			</div>
			@endif

			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#Outlet">
				Tambah Data
			</button>
			<div class="table-responsive">
				<table class="table user-table" id="order-listing">
					<thead>
						<tr>
							<th class="border-top-0">#</th>
							<th class="border-top-0">Nama</th>
							<th class="border-top-0">Alamat</th>
							<th class="border-top-0">Telp</th>
							<th class="border-top-0">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($outlets as $outlet)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $outlet->nama }}</td>
							<td>{{ $outlet->alamat }}</td>
							<td>{{ $outlet->telp }}</td>
							<td>
								{{-- @include('dashboard.outlet.edit') --}}
								{{-- <form action="/outlet/{{ $outlet->id }}" method="POST" class="d-inline">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger border-0" onclick="return confirm('Yakin Ingin Dihapus')"><i class="mdi me-2 mdi-delete">Delete</i></button>
								</form> --}}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@include('dashboard.outlet.create')
@endsection
@push('script')
<script>
	(function($) {
	'use strict';
	$(function() {
		$('#order-listing').DataTable({
		"aLengthMenu": [
			[5, 10, 15, -1],
			[5, 10, 15, "All"]
		],
		"iDisplayLength": 10,
		"language": {
			search: ""
		}
		});
		$('#order-listing').each(function() {
		var datatable = $(this);
		// SEARCH - Add the placeholder for Search and Turn this into in-line form control
		var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
		search_input.attr('placeholder', 'Search');
		search_input.removeClass('form-control-sm');
		// LENGTH - Inline-Form control
		var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
		length_sel.removeClass('form-control-sm');
		});
	});
	})(jQuery);
</script>	
@endpush


  
