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
					<th class="border-top-0">Nama Member</th>
					<th class="border-top-0">Alamat</th>
					<th class="border-top-0">Telp</th>
					<th class="border-top-0">Petugas</th>
					<th class="border-top-0">Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($penjemputan as $p)
				<tr>
					<td >{{ $loop->iteration }}</td>
					<td>{{ $p->member->nama }}</td>
					<td>{{ $p->member->alamat }}</td>
					<td>{{ $p->member->telp }}</td>
					<td>{{ $p->petugas }}</td>
					<td>{{ $p->status }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>


  
