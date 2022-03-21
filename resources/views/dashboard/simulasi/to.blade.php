@extends('dashboard.layouts.main')

@section('content')
	{{-- Form Card --}}
		<div class="card">
				<div class="card-header">
					<h3 class="card-title">Form Gaji Karyawan</h3>
				</div>
				<div class="card-body">
					<form id="formKaryawan">
						<div class="row">
						<div class="col-md-6">
							<div class="form-floating mb-3">
								<input
								type="number"
								class="form-control"
								id="id"
								name="id"
								required
								placeholder="Enter Name here"
								/>
								<label for="tb-fname">ID Karyawan</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating mb-3">
								<input
								type="text"
								class="form-control"
								id="nama"
								name="nama"
								required
								placeholder="Enter Name here"
								/>
								<label for="judul">Nama Karyawan</label>
							</div>
						</div>
						<div class="col-md-6">
							<label for="telp" class="form-label">Jenis Kelamin</label>
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
						<div class="col-md-6">
							<div class="form-floating">
								<div class="form-floating mb-3">
									<select class="form-select" id="status" name="status">
										{{-- <option selected disabled>Status</option> --}}
										<option value="single">Single</option>
										<option value="couple">Couple</option>

									</select>
									<label for="tb-email">Status</label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating mb-3">
								<input
								type="number"
								class="form-control"
								id="jumlah"
								name="jumlah"
								required
								readonly
								value="0"
								placeholder="Enter Name here"
								/>
								<label for="jumlah">Jumlah Anak</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating">
								<input
								type="Date"
								class="form-control"
								id="tgl_masuk"
								name="tgl_masuk"
								placeholder="Password"
								required
								/>
								<label for="tgl_masuk">Mulai Bekerja</label>
							</div>
						</div>
						<div class="col-12">
							<div class="d-md-flex align-items-center mt-3">
								<div class="ms-auto mt-3 mt-md-0">
								<button
									type="reset"
									class="
										btn btn-danger
										font-weight-medium
										rounded-pill
										px-4
									"
								>
									<div class="d-flex align-items-center">
										<i
										data-feather="send"
										class="feather-sm fill-white me-2"
										></i>
										Reset
									</div>
								</button>
								<button
									type="submit"
									class="
										btn btn-info
										font-weight-medium
										rounded-pill
										px-4
									"
								>
									<div class="d-flex align-items-center">
										<i
										data-feather="send"
										class="feather-sm fill-white me-2"
										></i>
										Submit
									</div>
								</button>
								</div>
							</div>
						</div>
						</div>
					</form>
				</div>
		</div>
		{{-- End From Card --}}

	{{-- Data Card --}}
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Data Karyawan</h3>
			</div>
			<div class="card-body">
				<div class="row mb-3">
					<div class="col-lg-2">
						<select name="sorting" id="sorting" class="form-control btn btn-outline-success">
								<option selected disabled>Sorting</option>
								<option value="id">Id</option>
								<option value="nama">Nama</option>
								<option value="jk">Jenis-Kelamin</option>
								<option value="status">status</option>
								<option value="jumlah">jumlah</option>
								<option value="tgl-masuk">Mulai Bekerja</option>
						</select>
					</div>
					<div class="col-lg-4">
						<button type="button" class="btn btn-danger" id="delete">Delete All</button>
					</div>
					<div class="col-lg-6 ">
						<div class="input-group">
								{{-- <button type="button" class="btn btn-outline-success" id="sorting">Sorting</button> --}}
								{{-- <label for="status" class="form-label">Status</label> --}}
								<input type="text" class="form-control" placeholder="" id="search">
								<button class="btn btn-outline-danger" type="button" id="btnSearch">Search</button>
						 </div>
					</div>
				</div>
			<div class="table-responsive">
				<table class="table user-table" id="tbl-karyawan">
					<thead class="bg-success text-white">
						<tr>
							<th class="border-top-0">ID</th>
							<th class="border-top-0">Nama Karyawan</th>
							<th class="border-top-0">JK</th>
							<th class="border-top-0">Status</th>
							<th class="border-top-0">Jumlah Anak</th>
							<th class="border-top-0">Mulai Bekerja</th>
							<th class="border-top-0">Gaji Awal</th>
							<th class="border-top-0">Tunjakan</th>
							<th class="border-top-0">Total Gaji</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="9" align="center">Belum ada Data</td>
						</tr>
						<tfoot>
							<tr class="text-bold bg-danger text-white">
								<td colspan="6" align="center">Total</td>
								<td id="totalGajiAwal"></td>
								<td id="totalTunjangan"></td>
								<td id="totalGaji"></td>						
							</tr>
						</tfoot>
					</tbody>
				</table>
			</div>
			</div>
		</div>
		{{-- End Data Card --}}
@endsection

@push('script')
		<script>  
			// method
			function insert(){
				const form = $('#formKaryawan').serializeArray()
				let dataKaryawan = JSON.parse( localStorage.getItem('dataKaryawan')) || []
				// console.log(dataKaryawan)
				let newData = {}
				form.forEach(function(item, index) {
					let name = item['name']
					let value =(name === 'id' ||
											name === 'tunjangan' ||
											name === 'gajiAwal' ||
											name === 'jumlah' ? Number(item['value']):item['value'])
					newData[name] = value
				})
				// console.log(newData)
				localStorage.setItem('dataKaryawan' , JSON.stringify([ ... dataKaryawan, newData]))
				return newData

			}
			
			function showData(dataKaryawan){
				let row = ''
				let totalGajiAwal = 0;
				let totalTunjangan = 0;
				let totalGaji = 0;
				let awal = 2000000;
				let tunjangan = 0 
				let total = 0 

			if(dataKaryawan.length == 0){
				return row = `<tr>
						<td colspan="9" align="center">Belum ada Data</td>
					</tr>`
			}
		
			dataKaryawan.forEach(function(item, index){
		
					dan = new Date(item['tgl_masuk'])
					// console.log(dan)
					var ageDifMs    = Date.now() - dan.getTime();
					if (ageDifMs > 0) {
							var ageDate     = new Date(ageDifMs)
							var newAge      = Math.abs(ageDate.getUTCFullYear() - 1970)
							var tahun       = newAge*150000
					} else {
							var tahun       = 0
					}

				if(item['jumlah'] >= 2){
           var child = 2
					} else if (item['jumlah'] != 1){
						var child = 0
					} else {
						var child = 1
					}

     		   let anak = 150000*child

				let status      = (item['status'] === 'couple' ?250000:0)
				 tunjangan   = anak + status + tahun
				 total       = tunjangan + awal

				row += `<tr>`
				row += `<td>${item['id']}</td>`
				row += `<td>${item['nama']}</td>`
				row += `<td>${item['jk']}</td>`
				row += `<td>${item['status']}</td>`
				row += `<td>${item['jumlah']}</td>`
				row += `<td>${item['tgl_masuk']}</td>`
				row += `<td>${awal}</td>`
				row += `<td>${tunjangan}</td>`
       	   row += `<td>${total}</td>`
				row += `</tr>`
				totalGajiAwal += Number(awal)
				totalTunjangan += Number(tunjangan)
				totalGaji += Number(total)
				// alert(awal)
			})
			
			$('#totalGajiAwal').text(totalGajiAwal)
			$('#totalTunjangan').text(totalTunjangan)
			$('#totalGaji').text(totalGaji)
			return row

		 }


		 function insertionSort(arr,key)
		{
			let i, j, id, value;
			for(i = 1; i < arr.length; i++)
			{
				value = arr[i];
				id = arr[i][key]
				j = i -1;
				// console.log()
				while ( j >= 0 && arr[j][key] > id)
				{
					arr[j+1] = arr[j];
					j = j-1;
				}
				arr[j + 1] = value;
			}
			return arr
		}
		
		function searching(arr, key, text)
		{
			for(let i = 0; i < arr.length; i++)
			{
				if(arr[i][key] == text)
				return i 
			}
			return 'gagal'
		}

		function _calculateAge(birthday)
		{
			birthday = new Date(birthday)
			var ageDifMs = Date.now() - birthday.getTime();
			var ageDate = new Date(ageDifMs);
			return Math.abs(ageDate.getUTCFullYear() - 1970);
		}


			
				let dataKaryawan = JSON.parse( localStorage.getItem('dataKaryawan')) || []		
			$(function(){
					// initialize

				$('#tbl-karyawan tbody').html(showData(dataKaryawan))
				// console.log()
				// events
				$('#formKaryawan').on('submit', function(e){
					// console.log()
					e.preventDefault()
					dataKaryawan.push(insert()) 
					
					$('#tbl-karyawan tbody').html(showData(dataKaryawan))
				})

				$('#status').on('change' , function(){
					let value = $('#status').val()
					console.log(value)
					if (value == 'couple') {
						$('#jumlah').attr('readonly', false)
					} else {
						$('#jumlah').val(0)
						$('#jumlah').attr('readonly', true)

					}
				})

				$('#sorting').on('click', function(){
					// console.log(arr)
					let sorting = document.getElementById('sorting').value
					 dataKaryawan = insertionSort( dataKaryawan, sorting)
					// console.log(dataKaryawan)
					$('#tbl-karyawan tbody').html(showData(dataKaryawan))
					// console.log(arr)
				})
				$('#btnSearch').on('click', function(e){
                        let teksSearch = $('#search').val()
                        // console.log(teksSearch)
                        let id = searching(dataKaryawan, 'id', teksSearch)
                        let data = []
                        if (id >= 0)
                        data.push(dataKaryawan[id])
                        console.log(id)
                        console.log(data) 
                        $('#tbl-karyawan tbody').html(showData(data))
              })
			})

			$('#delete').on('click',  function(e){
				e.preventDefault()
				dataKaryawan = []
				localStorage.removeItem('dataKaryawan')
				$('#tbl-karyawan tbody').html(showData(dataKaryawan))
				
			})      
		</script>
@endpush
