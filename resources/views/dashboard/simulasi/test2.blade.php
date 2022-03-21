@extends('dashboard.layouts.main')

@section('content')
	{{-- Form Card --}}
		<div class="card">
				<div class="card-header">
					<h3 class="card-title">Form Buku</h3>
				</div>
				<div class="card-body">
					<form id="formBuku">
						<div class="row">
						<div class="col-md-6">
							<div class="form-floating mb-3">
								<input
								type="number"
								class="form-control"
								id="id_buku"
								name="id_buku"
								placeholder="Enter Name here"
								/>
								<label for="tb-fname">ID Buku</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating mb-3">
								<input
								type="text"
								class="form-control"
								id="judul"
								name="judul"
								placeholder="Enter Name here"
								/>
								<label for="judul">Judul Buku</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating mb-3">
								<select class="form-select" id="tahun_terbit" name="tahun_terbit">
									<option selected disabled>Tahun Terbit</option>
									@for ($i=date('Y'); $i > 1900; $i--)
										<option value="{{ $i }}">{{ $i }}</option>
									@endfor
								</select>
								<label for="tb-email">Select</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating">
								<input
								type="text"
								class="form-control"
								id="pengarang"
								name="pengarang"
								placeholder="pengarang"
								/>
								<label for="tb-pwd">Pengarang</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating mb-3">
								<input
								type="number"
								class="form-control"
								id="qty"
								name="qty"
								placeholder="Enter Name here"
								/>
								<label for="qty">Qty</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating">
								<input
								type="number"
								class="form-control"
								id="harga"
								name="harga"
								placeholder="Password"
								/>
								<label for="harga">Harga</label>
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
				<h3 class="card-title">Data Buku</h3>
			</div>
			<div class="card-body">
				<div class="input-group mb-3">
					<button type="button" class="btn btn-outline-success" id="sorting">Sorting</button>
					<button class="btn btn-outline-danger" type="button" id="btnSearch">Search</button>
					<input type="text" class="form-control" placeholder="" id="search">
				 </div>
			<div class="table-responsive">
				<table class="table user-table" id="tbl-buku">
					<thead class="bg-success text-white">
						<tr>
							<th class="border-top-0">ID</th>
							<th class="border-top-0">Judul Buku</th>
							<th class="border-top-0">Pengarang</th>
							<th class="border-top-0">Tahun Terbit</th>
							<th class="border-top-0">Qty</th>
							<th class="border-top-0">Harga</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="6" align="center">Belum ada Data</td>
						</tr>
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
				const form = $('#formBuku').serializeArray()
				let dataBuku = JSON.parse( localStorage.getItem('dataBuku')) || []
				let newData = {}
				form.forEach(function(item, index) {
					let name = item['name']
					let value =(name === 'id_buku' ||
											name === 'qty' ||
											name === 'harga' ? Number(item['value']):item['value'])
					newData[name] = value
				})
				// console.log(newData)
				localStorage.setItem('dataBuku' , JSON.stringify([ ... dataBuku, newData]))
				return newData
			}

		function showData(dataBuku){
			let row = ''
			// let arr = JSON.parse( localStorage.getItem('dataBuku')) || []
			if(dataBuku.length == 0){
				return row = `<tr>
						<td colspan="6" align="center">Belum ada Data</td>
					</tr>`
			}
			dataBuku.forEach(function(item, index){
				row += `<tr>`
				row += `<td>${item['id_buku']}</td>`
				row += `<td>${item['judul']}</td>`
				row += `<td>${item['pengarang']}</td>`
				row += `<td>${item['tahun_terbit']}</td>`
				row += `<td>${item['qty']}</td>`
				row += `<td>${item['harga']}</td>`
				row += `</tr>`
			})
			return row
		 }

		 function insertionSort(arr,key)
		{
			// let arr = JSON.parse( localStorage.getItem('dataBuku')) || []
			let i, j, id, value;
			for(i = 1; i < arr.length; i++)
			{
				value = arr[i];
				id = arr[i][key]
				j = i -1;
				console.log()
				while ( j >= 0 && arr[j][key] > id)
				{
					arr[j+1] = arr[j];
					j = j-1;
				}
				arr[j + 1] = value;
			}
			// console.log(arr)
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
			
				// console.log(newData)
				// after Load
			$(function(){
					// initialize
				let dataBuku = JSON.parse( localStorage.getItem('dataBuku')) || []		
				$('#tbl-buku tbody').html(showData(dataBuku))
				// console.log()
				// events
				$('#formBuku').on('submit', function(e){
					e.preventDefault()
					insert()
					$('#tbl-buku tbody').html(showData(dataBuku))
				})

				$('#sorting').on('click', function(){
					// console.log(arr)
					 dataBuku = insertionSort( dataBuku, 'id_buku')
					// console.log(dataBuku)
					$('#tbl-buku tbody').html(showData(dataBuku))
					// console.log(arr)
				})
				$('#btnSearch').on('click', function(e) {
                        let teksSearch = $('#search').val()
                        // console.log(teksSearch)
                        let id = searching(dataBuku, 'id_buku', teksSearch)
                        let data = []
                        if (id >= 0)
                        data.push(dataBuku[id])
                        console.log(id)
                        console.log(data) 
                        $('#tbl-buku tbody').html(showData(data))
              })
			})
		</script>
@endpush
