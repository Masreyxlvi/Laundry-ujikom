@extends('dashboard.layouts.main')

@section('content')
	{{-- Form Card --}}
		<div class="card">
				<div class="card-header">
					<h3 class="card-title">Simulasi Transaksi Cucian</h3>
				</div>
				<div class="card-body">
					<form id="formTransaksi">
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
									<label for="tb-fname">No Transaksi</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-floating">
									<input
									type="text"
									class="form-control"
									id="nama_member"
									name="nama_member"
									placeholder="Password"
									required
									/>
									<label for="nama_member">Nama Pelanggan</label>
								</div>
							</div>
							{{-- tgl --}}
							<div class="col-md-6">
								<div class="form-floating">
									<input
									type="text"
									class="form-control"
									id="no_hp"
									name="no_hp"
									placeholder="No Hp"
									required
									/>
									<label for="no_hp">No. HP/WA</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-floating mb-3">
									<input
									type="date"
									class="form-control"
									id="tgl_cuci"
									name="tgl_cuci"
									required
									placeholder="Enter Name here"
									/>
									<label for="tgl_cuci">Tanggal Cuci</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<select class="form-select jenis" id="jenis" name="jenis">
											<option selected disabled>---Pilih Barang----</option>
											<option value="standar">Standar</option>
											<option value="express">Express</option>
										</select>
										<label for="tb-email">Jenis Cucian</label>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-floating mb-3">
									<input
									type="text"
									class="form-control berat"
									id="berat"
									name="berat"
									required
									value="1"
									placeholder="Enter Name here"
									/>
									<label for="berat">Berat</label>
								</div>
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
				<h3 class="card-title">Data Transaksi</h3>
			</div>
			<div class="card-body">
				<div class="row mb-3">
					<div class="col-lg-2">
						<select name="sorting" id="sorting" class="form-control btn btn-outline-success">
								<option selected disabled>Sorting</option>
								<option value="id">Id</option>
								<option value="nama_member">Nama</option>
								<option value="no_hp">Kontak</option>
								<option value="tgl_cuci">Tgl Cuci</option>
								<option value="jenis">jenis</option>
								<option value="berat">Berat </option>
						</select>
					</div>
					<div class="col-lg-4">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" name="filter" value="standar"
								 id="filterPaymentstandar" checked>
							<label class="form-check-label" for="filterPaymentstandar">
								 Standar
							</label>
					  </div>
					  <div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" name="filter" value="express"
								 id="filterPaymentTransfer" checked>
							<label class="form-check-label" for="filterPaymentTransfer">
								 express
							</label>
					  </div>
					</div>
					<div class="col-lg-6 ">
						<div class="input-group">
								<input type="text" class="form-control" placeholder="Search" id="search">
								<button class="btn btn-success" type="button" id="btnSearch">Search</button>
								<button type="button" class="btn btn-danger" id="delete">Delete All</button>
						 </div>
					</div>
				</div>
			<div class="table-responsive">
				<table class="table user-table" id="tbl-Transaksi">
					<thead class="bg-success text-white">
						<tr>
							<th class="border-top-0">ID</th>
							<th class="border-top-0">Nama Pelanggan</th>
							<th class="border-top-0">No. HP/WA</th>
							<th class="border-top-0">Tanggal Cucian</th>
							<th class="border-top-0">Jenis Cucian</th>
							<th class="border-top-0">Berat/Kg</th>
							<th class="border-top-0">Diskon</th>
							<th class="border-top-0">Total Harga</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="8" align="center">Belum ada Data</td>
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
				const form = $('#formTransaksi').serializeArray()
				let dataTransaksi = JSON.parse( localStorage.getItem('dataTransaksi')) || []

				let newData = {}
				form.forEach(function(item, index) {
					let name = item['name']
					let value =(name === 'id' ||
											name === '' ? Number(item['value']):item['value'])
					newData[name] = value
				})
				// console.log(newData)
				localStorage.setItem('dataTransaksi' , JSON.stringify([ ... dataTransaksi, newData]))
				return newData
			}
			
			function showData(dataTransaksi){
				let row = ''
				let countBerat = 0;
				let countDiskon = 0;
				let countTotal = 0;

			if(dataTransaksi.length == 0){
				return row = `<tr>
						<td colspan="9" align="center">Belum ada Data</td>
					</tr>`
			}
		
			dataTransaksi.forEach(function(item, index){
				let diskon = 0;
				let harga = (item['jenis'] === 'standar' ?7500:10000);
				let subTotal = harga * item['berat']
				if(subTotal > 50000){
					 diskon = 10/100*subTotal
				}
				let totalHarga = subTotal - diskon
			
				row += `<tr>`
				row += `<td>${item['id']}</td>`
				row += `<td>${item['nama_member']}</td>`
				row += `<td>${item['no_hp']}</td>`
				row += `<td>${item['tgl_cuci']}</td>`
				row += `<td>${item['jenis']}</td>`
				row += `<td>${item['berat']}Kg</td>`
				row += `<td>${diskon}</td>`
				row += `<td>${totalHarga}</td>`
				row += `</tr>`
				
				countBerat += Number(item['berat'])
				countDiskon += Number(diskon)
				countTotal += Number(totalHarga)
			})
				row += `<tr class="text-bold bg-danger text-white">`
            row += `<td width="" colspan="5" align="center"  >Total</td>`
            row += `<td>${countBerat}</td>`
            row += `<td>${countDiskon}</td>`
            row += `<td>${countTotal}</td>`
            row += `</tr>`
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
			let buffer = []
			for(let i = 0; i < arr.length; i++)
			{
				if(arr[i][key] == text)
				buffer.push(i)
			}
			return buffer
		}


			let dataTansaksi
			let filterTransaksi
			$(function(){
				// initialize
				 dataTransaksi  = filterTransaksi = JSON.parse( localStorage.getItem('dataTransaksi')) || []		

				$('#tbl-Transaksi tbody').html(showData(dataTransaksi))
				// events
				$('#formTransaksi').on('submit', function(e){
					e.preventDefault()
					dataTransaksi.push(insert()) 
					
					$('#tbl-Transaksi tbody').html(showData(dataTransaksi))
				})

				$('#sorting').on('click', function(){
					let sorting = document.getElementById('sorting').value
					 dataTransaksi = insertionSort( dataTransaksi, sorting)
					$('#tbl-Transaksi tbody').html(showData(dataTransaksi))
				})

				$('#btnSearch').on('click', function(e){
                        let teksSearch = $('#search').val()
                        let id = searching(dataTransaksi, 'id', teksSearch)
                        let data = []
								for(let x=0; x < id.length; x ++){
									data.push(dataTransaksi[id]) 
								}
                        $('#tbl-Transaksi tbody').html(showData(data))
              })
				  $('#delete').on('click',  function(e){
						e.preventDefault()
						if(confirm('Hapus Semua Data?')) {
							dataTransaksi = filterTransaksi = []
							localStorage.removeItem('dataTransaksi')
							$('#tbl-Transaksi tbody').html(showData(dataTransaksi))
						}
						
					})   

				  $('[name="filter"]').on('change', function() {
							filter($('#search').val());
							$('#tbl-Transaksi tbody').html(showData(dataTransaksi))
                });

				  $('#search').on('change keydown', function() {
							filter($('#search').val());
							$('#tbl-Transaksi tbody').html(showData(dataTransaksi))
                });
			})

	   
			// Mendapatkan data filter metode pembayaran yang di ceklis
			const getPaymentMethodValues = () => {
				let value = $('[name="filter"]:checked').map((i, row) => $(row).val()).get()
				return value
			}
			 // Memfilter data transaksi berdasarkan kata kunci tertentu
			const filter = (keyword) => {
				    // Array untuk menampung data yang difilter
				let arr = []
				// Checkbox filter data berdasarkan metode pembayaran
				let jenis = getPaymentMethodValues()
				 // Mengecek apakah data di dalam array transactions mengandung kata kunci yang dikirim menggunakan method .includes()
            // Karena method .includes() membandingkan string secara case sensitive, maka string diubah ke huruf kecil terlebih dahulu
				keyword = keyword.toLowerCase()
				for(let i = 0;  i < filterTransaksi.length; i++ ){
					if(jenis.includes(filterTransaksi[i].jenis)) {
						if(
							filterTransaksi[i].id.toString().includes(keyword) ||
							filterTransaksi[i].nama_member.toLowerCase().includes(keyword) ||
							filterTransaksi[i].no_hp.toString().includes(keyword) ||
							filterTransaksi[i].tgl_cuci.toLowerCase().includes(keyword) ||
							filterTransaksi[i].berat.toString().includes(keyword) ||
							filterTransaksi[i].jenis.toLowerCase().includes(keyword)
						){
							 // Jika kondisi terpenuhi, maka data array dengan index ke-i dimasukan ke dalam array penampung
							arr.push(filterTransaksi[i])
						}
					}
				}
				dataTransaksi = arr
			}

			</script>
@endpush
