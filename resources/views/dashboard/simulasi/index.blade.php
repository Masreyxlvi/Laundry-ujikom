@extends('dashboard.layouts.main')

@section('content')
<div class="card">
	<div class="card-header">
	  <h5>Simulasi</h5> 
	</div>
	<div class="card-body">
		<form id="paket">
			<div class="row">
				<div class="col-lg-4">
					<div class="">
						<label for="id" class="form-label"><b>ID</b> </label>
						<input type="number" class="form-control" name="id" id="id" placeholder="ID">
					</div>
					<div class="mb-3">
						<label for="nama" class="form-label"><b>Nama</b> </label>
						<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
					</div>
					<div class="mb-3">
						<label for="telp" class="form-label"><b>Jenis Kelamin</b> </label>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="jk" id="jk" value="L">
							<label class="form-check-label" for="jk">
							  Laki - Laki
							</label>
						 </div>
						 <div class="form-check">
							<input class="form-check-input" type="radio" name="jk" id="jk" checked value="P">
							<label class="form-check-label" for="jk">
								Perempuan
							</label>
						 </div>
					</div>
					<button type="submit" class="btn btn-primary" id="submit-id">Submit</button>
					<button type="reset" class="btn btn-outline-danger" id="reset-id">Reset</button>
				</div>
			</div>
		</form>
	</div>
 </div>
 <div class="card">
	 <div class="card-header">
		 <h5>Data</h5>
	 </div>
	 <div class="card-body">
		 <button type="button" class="btn btn-success" id="sorting">Sorting</button>
		<div class="table-responsive">
			<table class="table user-table" id="tbl-paket">
				<thead>
					<tr>
						<th class="border-top-0">#</th>
						<th class="border-top-0">Nama</th>
						<th class="border-top-0">Jenis Kelamin</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="3" align="center">Belum ada Data</td>
					</tr>
				</tbody>
			</table>
		</div>
	 </div>
 </div>
@endsection
@push('script')
	 <script>
		//  Insert Data
		 function insert(){
			 const data = $('#paket').serializeArray()
			 let newData = {}
			 data.forEach(function(item, index) {
				 let name = item['name']
				 let value =(name === 'id' ? Number(item['value']):item['value'])
				 newData[name] = value
			 })
			 return newData
		 }
		//  Show Data
		 function showData(arr){
			let row = ''
			if(arr.length == null){
				return row = `<tr>
						<td colspan="3" align="center">Belum ada Data</td>
					</tr>`
			}
			arr.forEach(function(item, index){
				row += `<tr>`
				row += `<td>${item['id']}</td>`
				row += `<td>${item['nama']}</td>`
				row += `<td>${item['jk']}</td>`
				row += `</tr>`
			})
			return row
		 }
		//  end Show Data
		function selectionSort(arr,key) { 
			// console.log()
			let n = arr.length;
			// alert(arr)
				
			for(let i = 0; i < n; i++) {
				// Finding the smallest number in the subarray
				let min = i[key];
				for(let j = i+1; j < n; j++){
						if(arr[j] < arr[min]) {
							min=j; 
						}
					}
					if (min != i) {
						// Swapping the elements
						let tmp = arr[i][key]; 
						arr[i] = arr[min];
						arr[min] = tmp;      
				}
			}
			return arr;
		}
		// SORTING
		// function insertionSort(arr, key)
		// {
		// 	let i, j, id, value;
		// 	for(i = 1; i < arr.length; i++)
		// 	{
		// 		value = arr[i];
		// 		id = arr[i][key]
		// 		j = i -1;
		// 		while (j >= 0 && arr[j][key] > id)
		// 		{
		// 			arr[j + 1] = arr[j];
		// 			j = j-1;
		// 		}
		// 		arr[j + 1] = value;
		// 	}
		// 	return arr
		// }

		 $(function(){
			//  property
			 let dataKaryawan = []

			//  event
			$('#paket').on('submit', function(e){
				e.preventDefault()
				dataKaryawan.push(insert())
				// console.log(dataKaryawan)
				$('#tbl-paket tbody').html(showData(dataKaryawan))
				// console.log(dataKaryawan)
			})
			$('#sorting').on('click', function(){
					// console.log(test)
					 dataKaryawan = selectionSort( dataKaryawan, 'id')
					// console.log(dataKaryawan)
					$('#tbl-paket tbody').html(showData())
					// console.log(dataKaryawan)
			})
		 })




	 </script>
@endpush