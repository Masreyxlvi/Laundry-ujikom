@extends('dashboard.layouts.main')

@section('content')
<div class="collapse" id="Proses">
	<div class="card">
		<div class="card-body">
			<!-- Button trigger modal -->
		  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Proses">
			  Pilih Data
		  </button>
		
		<!-- Modal -->
		<div class="modal fade" id="Proses" tabindex="-1" aria-labelledby="ProsesLabel" aria-hidden="true">
		  <div class="modal-dialog">
			 <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title" id="ProsesLabel">Modal title</h5>
				  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				  
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				  <button type="button" class="btn btn-primary">Save changes</button>
				</div>
			 </div>
		  </div>
		</div>
		</div>
	</div>
</div>
@endsection