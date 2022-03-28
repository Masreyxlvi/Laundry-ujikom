@extends('dashboard.layouts.main')

@section('content')
	{{-- Form Card --}}
		<div class="card">
				<div class="card-header">
					<h3 class="card-title">Simulasi Transaksi Barang</h3>
				</div>
				<div class="card-body">
					<form id="formBarang">
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
									<label for="tb-fname">ID Barang</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-floating">
									<input
									type="Date"
									class="form-control"
									id="tgl_beli"
									name="tgl_beli"
									placeholder="Password"
									required
									/>
									<label for="tgl_beli">Tanggal Beli</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<select class="form-select nama" id="nama" name="nama">
											<option selected disabled>---Pilih Barang----</option>
											<option value="detergent">Detergent</option>
											<option value="pewangi">Pewangi</option>
											<option value="sepatu">Detergent Sepatu</option>
	
										</select>
										<label for="tb-email">Nama Barang</label>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-floating mb-3">
									<input
									type="text"
									class="form-control"
									id="harga"
									name="harga"
									required
									readonly
									placeholder="Enter Name here"
									value="0"
									/>
									<label for="harga">harga Barang</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-floating mb-3">
									<input
									type="number"
									class="form-control qty"
									id="qty"
									name="qty"
									required
									value="1"
									placeholder="Enter Name here"
									/>
									<label for="qty">Qty</label>
								</div>
							</div>
							<div class="col-md-6">
								<label for="telp" class="form-label">Jenis Pembayaran</label>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="pembayaran" id="pembayaran" value="cash">
									<label class="form-check-label" for="pembayaran">
									Cash
									</label>
							</div>
							<div class="form-check">
									<input class="form-check-input" type="radio" name="pembayaran" id="pembayaran" checked value="e-money">
									<label class="form-check-label" for="pembayaran">
									E-money
									</label>
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
				<h3 class="card-title">Data Barang</h3>
			</div>
			<div class="card-body">
				<div class="row mb-3">
					<div class="col-lg-2">
						<select name="sorting" id="sorting" class="form-control btn btn-outline-success">
								<option selected disabled>Sorting</option>
								<option value="id">Id</option>
								<option value="nama">Nama</option>
								<option value="qty">Qty</option>
								<option value="tgl_beli">tgl-beli</option>
								<option value="harga">harga</option>
								<option value="pembayaran">Jenis Pembayaran</option>
						</select>
					</div>
					<div class="col-lg-4">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" name="filter" value="cash"
								 id="filterPaymentCash" checked>
							<label class="form-check-label" for="filterPaymentCash">
								 Cash
							</label>
					  </div>
					  <div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" name="filter" value="e-money"
								 id="filterPaymentTransfer" checked>
							<label class="form-check-label" for="filterPaymentTransfer">
								 E-Money/Transfer
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
				<table class="table user-table" id="tbl-Barang">
					<thead class="bg-success text-white">
						<tr>
							<th class="border-top-0">ID</th>
							<th class="border-top-0">Tgl Beli</th>
							<th class="border-top-0">Nama Barang</th>
							<th class="border-top-0">Harga</th>
							<th class="border-top-0">Qty</th>
							<th class="border-top-0">Diskon</th>
							<th class="border-top-0">Total Harga</th>
							<th class="border-top-0">Jenis Bayar</th>
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
				const form = $('#formBarang').serializeArray()
				let dataBarang = JSON.parse( localStorage.getItem('dataBarang')) || []
				// console.log(dataBarang)
				let newData = {}
				form.forEach(function(item, index) {
					let name = item['name']
					let value =(name === 'id' ||
											name === 'qty' ||
											name === 'harga' ? Number(item['value']):item['value'])
					newData[name] = value
				})
				// console.log(newData)
				localStorage.setItem('dataBarang' , JSON.stringify([ ... dataBarang, newData]))
				return newData
			}
			
			function showData(dataBarang){
				let row = ''
				let countHarga = 0;
				let countQty = 0;
				let countDiskon = 0;
				let countTotal = 0;

			if(dataBarang.length == 0){
				return row = `<tr>
						<td colspan="9" align="center">Belum ada Data</td>
					</tr>`
			}
		
			dataBarang.forEach(function(item, index){
				let diskon = 0;
				let subTotal = item['harga'] * item['qty']
				if(subTotal >= 50000){
					 diskon = 15/100*subTotal
				}
				let totalHarga = subTotal - diskon
			
				row += `<tr>`
				row += `<td>${item['id']}</td>`
				row += `<td>${item['tgl_beli']}</td>`
				row += `<td>${item['nama']}</td>`
				row += `<td>${item['harga']}</td>`
				row += `<td>${item['qty']}</td>`
				row += `<td>${diskon}</td>`
				row += `<td>${totalHarga}</td>`
				row += `<td>${item['pembayaran']}</td>`
				row += `</tr>`
				
				countHarga += Number(item['harga'])
				countQty += Number(item['qty'])
				countDiskon += Number(diskon)
				countTotal += Number(totalHarga)
			})
				row += `<tr class="text-bold bg-danger text-white">`
            row += `<td width="" colspan="3" align="center"  >Total</td>`
            row += `<td>${countHarga}</td>`
            row += `<td>${countQty}</td>`
            row += `<td>${countDiskon}</td>`
            row += `<td>${countTotal}</td>`
            row += `<td></td>`
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
			for(let i = 0; i < arr.length; i++)
			{
				if(arr[i][key] == text)
				return i 
			}
			return 'gagal'
		}

		

		function harga()
		{
				let nama = $('#nama').val()
				let detergent = 15000
				let pewangi = 10000
				let sepatu = 25000
					
				if( nama == 'detergent'){
					$('#harga').val(detergent)
				} else if (nama == 'pewangi'){
					$('#harga').val(pewangi)	
				} else if(nama == 'sepatu'){
					$('#harga').val(sepatu)
				}
		}


			
				let dataBarang;
				let filterBarang;
			$(function(){
				// initialize
				dataBarang = filterBarang = JSON.parse( localStorage.getItem('dataBarang')) || []		

				$('#tbl-Barang tbody').html(showData(dataBarang))
				// events
				$('#formBarang').on('submit', function(e){
					e.preventDefault()
					dataBarang.push(insert()) 
					
					$('#tbl-Barang tbody').html(showData(dataBarang))
				})

				$('#formBarang').on('change', '.nama', function(){
					harga(this);
				})

				$('#sorting').on('click', function(){
					let sorting = document.getElementById('sorting').value
					 dataBarang = insertionSort( dataBarang, sorting)
					$('#tbl-Barang tbody').html(showData(dataBarang))
				})

				$('#btnSearch').on('click', function(e){
                        let teksSearch = $('#search').val()
                        let id = searching(dataBarang, 'nama', teksSearch)
                        let data = []
                        if (id >= 0)
                        data.push(dataBarang[id]) 
                        $('#tbl-Barang tbody').html(showData(data))
							
              })
				  $('#delete').on('click',  function(e){
						e.preventDefault()
						if(confirm('Hapus Semua Data?')) {
							dataBarang = filterBarang = []
							localStorage.removeItem('dataBarang')
							$('#tbl-Barang tbody').html(showData(dataBarang))
						}
						
					})   

				  $('[name="filter"]').on('change', function() {
							filterTransaksi($('#search').val());
							$('#tbl-Barang tbody').html(showData(dataBarang))
                });

				//   $('#search').on('change keydown', function() {
				// 			filterTransaksi($('#search').val());
				// 			$('#tbl-Barang tbody').html(showData(dataBarang))
            //     });
			})

	   
			// Mendapatkan data filter metode pembayaran yang di ceklis
			const getPaymentMethodValues = () => {
				let value = $('[name="filter"]:checked').map((i, row) => $(row).val()).get()
				return value
			}
			 // Memfilter data transaksi berdasarkan kata kunci tertentu
			const filterTransaksi = (keyword) => {
				    // Array untuk menampung data yang difilter
				let arr = []
				// Checkbox filter data berdasarkan metode pembayaran
				let pembayaran = getPaymentMethodValues()
				 // Mengecek apakah data di dalam array transactions mengandung kata kunci yang dikirim menggunakan method .includes()
            // Karena method .includes() membandingkan string secara case sensitive, maka string diubah ke huruf kecil terlebih dahulu
				keyword = keyword.toLowerCase()
				for(let i = 0;  i < filterBarang.length; i++ ){
					if(pembayaran.includes(filterBarang[i].pembayaran)) {
						if(
							filterBarang[i].id.toString().includes(keyword) ||
							filterBarang[i].tgl_beli.toLowerCase().includes(keyword) ||
							filterBarang[i].nama.toLowerCase().includes(keyword) ||
							filterBarang[i].harga.toString().includes(keyword) ||
							filterBarang[i].qty.toString().includes(keyword) ||
							filterBarang[i].pembayaran.toLowerCase().includes(keyword)
						){
							 // Jika kondisi terpenuhi, maka data array dengan index ke-i dimasukan ke dalam array penampung
							arr.push(filterBarang[i])
						}
					}
				}
				dataBarang = arr
			}

			</script>
@endpush
