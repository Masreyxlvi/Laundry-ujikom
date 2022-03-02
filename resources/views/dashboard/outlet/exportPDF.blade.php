<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<div class="table-responsive">
		<table class="table user-table" id="order-listing">
			<thead>
				<tr>
					<th class="border-top-0">#</th>
					<th class="border-top-0">Nama</th>
					<th class="border-top-0">Alamat</th>
					<th class="border-top-0">Telp</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($outlet as $o)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $o->nama }}</td>
					<td>{{ $o->alamat }}</td>
					<td>{{ $o->telp }}</td>
					{{-- @can('management-outlet')
					<td>
						@include('dashboard.outlet.edit')
						<form action="/outlet/{{ $outlet->id }}" method="POST" class="d-inline">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger border-0 delete"><i class="mdi me-2 mdi-delete">Delete</i></button>
						</form>
					</td>
					@endcan --}}
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>


  
