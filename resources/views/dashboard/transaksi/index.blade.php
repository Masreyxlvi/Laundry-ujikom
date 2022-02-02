@extends('dashboard.layouts.main')

@section('content')

<form action="/transaksi" method="post" id="formTransaksi">
	@csrf
	<div class="col-lg-12">
		<h4 class="card-title">Transaksi</h4>
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
		<div class="card">
			<div class="card-body">
					<div class="row">
						<label for="nama" class="col-lg-2 col-form-label">Tanggal Transaksi  </label>
						<div class="col-lg-3">
							<input type="date" name="tgl" class="form-control @error('tgl') is-invalid @enderror"  id="tgl"  value="{{ old('tgl') }}">
						</div>
						<label for="nama" class="col-lg-3 col-form-label"></label>
						<div class="col-lg-4"> 
							@foreach ($users as $user)
							<select class="form-control js-example-basic-single w-100 text-center" id="outlet_id" name="outlet_id">
								<option value="{{ $user->outlet->id }}">{{ strtoupper($user->outlet->nama) }}</option>
				
							</select>
								{{-- <input type="text" name="outlet_id" class="form-control text-center @error('outlet_id') is-invalid @enderror"  id="tgl"  value="{{ strtoupper($user->outlet->nama) }}"> --}}
							@endforeach
						</div>
					</div>
		
				{{-- pilih Paket Dan Member --}}
				<div class="row mt-3">
					<div class="col-lg-12">
								<button type="button" class="btn btn-outline-info mb-2" data-bs-toggle="modal" data-bs-target="#member">
									Pilih Member
								</button>
								<div class="col-lg-12">
									<div class="mb row">
										<input type="hidden" name="member_id">
										<label for="nama" class="col-sm-3 col-form-label">Nama  </label>
										<label for="nama" class="col-sm-1 col-form-label">:</label>
										<div class="col-sm-8">
											<input type="text" readonly class="form-control-plaintext" id="nama" >
										</div>
									</div>
									<div class="mb row">
										<label for="username" class="col-sm-3 col-form-label">Telp  </label>
										<label for="username" class="col-sm-1 col-form-label">:</label>
										<div class="col-sm-8">
											<input type="text" readonly name="telp" class="form-control-plaintext" id="telp">
										</div>
									</div>
									<div class="mb row">
										<label for="alamat" class="col-sm-3 col-form-label">Alamat  </label>
										<label for="alamat" class="col-sm-1 col-form-label">:</label>
										<div class="col-sm-8">
											<input type="text" readonly name="alamat" class="form-control-plaintext" id="alamat" >
										</div>
									</div>
									{{-- paket --}}
									<button type="button" class="btn btn-outline-info mt-3" data-bs-toggle="modal" data-bs-target="#paket">
										Pilih Paket
									</button>
									<div class="table-responsive">
										<table class="table " id="tbl-transaksi">
										  <thead>
												<tr>
												  <th>Nama Paket</th>
												  <th>Jenis</th>
												  <th>Harga</th>
												  <th>Qty</th>
												  {{-- <th>Diskon</th> --}}
												  <th>Total</th>
												  <th>Status</th>
												</tr>
										  </thead>
										  <tbody>
												{{-- @foreach ($produks as $produk) --}}
											<tr>
												<td colspan="6" class="text-center"><i>Belum Ada Paket</i></td>
											</tr>
												{{-- @endforeach --}}
										  </tbody>
										</table>
									</div>
									<div class="row mt-5 ">
										<div class="col-lg-8 p-1">
											<div class="card">
												<div class="card-body bg-info" >
													<input type="text"  id="total-harga" name="total" style="color: white" class="form-control-plaintext  form-control-lg text-center" value="Rp. 0" readonly>
													{{-- <h4 class="text-center display-4" style="color: white" id="total-harga" name="total" >Rp . 0</h4> --}}
												</div>
											</div>
										</div>		
									</div>
								</div>
							</div>
						</div>				
					</div>
				</div>
				{{-- pembayaran --}}
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-6">
								<label for="nama" class="col-form-label"><b> Biaya Tambahan </b> </label>
									<input type="number" name="biaya_tambahan" class="form-control @error('biaya_tambahan') is-invalid @enderror"  id="tgl"  value="0">					
								<label for="nama" class="col-form-label"><b> Diskon </b> </label>
									<input type="number" name="diskon" class="form-control @error('diskon') is-invalid @enderror"  id="tgl"  value="0">					
								<label for="nama" class="col-form-label"><b> Pajak </b> </label>
									<input type="number" name="pajak" class="form-control @error('pajak') is-invalid @enderror"  id="tgl"  value="0">					
									<div class="mb-1">
										<label for="dibayar" class="col-form-label"><b> Status Pembayaran </b></label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="dibayar" id="dibayar" value="dibayar"
											@if ((isset($transaksi) && $transaksi->dibayar == 'dibayar') || old('dibayar') == 'dibayar') checked @endif>
										<label class="form-check-label" for="dibayar">
											Dibayar
										</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="dibayar" id="belum_dibayar" value="belum_dibayar"
											@if ((isset($transaksi) && $transaksi->dibayar == 'belum_dibayar') || old('dibayar') == 'belum_dibayar') checked @endif>
										<label class="form-check-label" for="belum_dibayar">
											Belum Dibayar
										</label>
									</div>
							</div>
							<div class="col-lg-6">
								<label for="nama" class="col-form-label"><b>Batas Waktu</b>  </label>
									<input type="date" name="batas_waktu" class="form-control @error('batas_waktu') is-invalid @enderror"  id="tgl"  value="{{ old('batas_waktu') }}">
								<label for="nama" class="col-form-label"><b>Tanggal Bayar</b>  </label>
									<input type="date" name="tgl_bayar" class="form-control @error('tgl_bayar') is-invalid @enderror"  id="tgl"  value="{{ old('tgl_bayar') }}">
								<label for="status" class="col-form-label"><b> Status </b></label>
									<select class="form-control js-example-basic-single w-100" id="status" name="status">
										<option value="" disabled selected>-- Pilih --</option>
										<option value="baru">Baru</option>
										<option value="proses">Proses</option>
										<option value="selesai">Selesai</option>
										<option value="diambil">Diambil</option>
									</select>
								</div>
							</div>
							<div class="row justify-content-center">
								<div class="col-lg-12">
									<div class="mt-4">
										<h4 class="text-center" >Keterangan  </h4>
										<textarea type="text" name="keterangan" style="height: 100px" class="form-control @error('keterangan') is-invalid @enderror"  id="tgl"  value="{{ old('keterangan') }}"></textarea>
									</div>
								</div>
							</div>
							<div class="mt-3">
								<div class="d-grid gap-2">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</div>
	</div>
</form>

  
  <!-- Modal -->
  @endsection
  @include('dashboard.transaksi.member')
@include('dashboard.transaksi.paket')
@push('script')
	<script>
			$(function(){
			$('#tbl-member').DataTable();
			$('#tbl-paket').DataTable();

			$('#tbl-member').on('click', '.pilih-member', function(){
				let ele = $(this).closest('tr');
				let id = ele.find('input[name=idMember]').val();
				let nama = ele.find('td:eq(0)').text();
				let telp = ele.find('td:eq(1)').text();
				// let jenis = ele.find('td:eq(2)').text();
				let alamat = ele.find('td:eq(3)').text();
				
				$('#nama').val(nama)
				$('#telp').val(telp)
				$('input[name=member_id]').val(id)
				// $('#JK').val(jenis)
				$('#alamat').val(alamat)
				$('#member').modal('hide')
			});

				let totalHarga = 0;
				function TambahPaket(a){
					let d = $(a).closest('tr');
					let namaPaket = d.find('td:eq(0)').text();
					let jenis = d.find('td:eq(1)').text();
					let harga = d.find('td:eq(2)').text();
					let idPaket = d.find('.idPaket').val();
					let data = '';
					let tbody = $('#tbl-transaksi tbody tr td').text();
					data += '<tr>';
					data += '<td>' +namaPaket+ '</td>';
					data += '<td>' +jenis+ '</td>';
					data += '<td>' +harga+ '</td>';
					data += '<input type="hidden" name="paket_id[]" value=" '+idPaket+' ">';
					data += '<input type="hidden" name="harga" value=" '+harga+' ">';
					// data += '<input type="hidden" name="sub_total[]" value=" '+hargaBarang*parseInt($('#qty_barang').val())+' ">';
					data += '<td><input type="number" value="1" min="1" class="form-control-sm border-0 qty" autofocus name="qty[]" ></td>';
					// data += '<td><input type="text" value="0"  class="diskon" name="diskon[]" ></td>';
					data += '<td><input type="text" readonly class="subTotal form-control-plaintext" name="sub_total" value=" '+harga+' "></td>';
					data += '<td><button type="button" class="hapusBarang btn btn-outline-danger"><i class="mdi  mdi-delete"></i></button></td>';
					data += '</tr>'
					if(tbody == 'Belum Ada Paket') $('#tbl-transaksi tbody tr').remove();

					$('#tbl-transaksi tbody').append(data);
					totalHarga += parseFloat(harga);
					$('#total-harga').val(totalHarga);
					$('#paket').modal('hide')
				}

			function calcSubTotal(a){
				let qty = parseInt($(a).closest('tr').find('.qty').val());
				let diskon = parseInt($(a).closest('tr').find('.diskon').val());
				let harga = parseFloat($(a).closest('tr').find('td:eq(2)').text());
				let subTotalAwal = parseFloat($(a).closest('tr').find('.subTotal').val());
				let subTotal = qty * harga;
				// let subTotal2 =harga-diskon/100 * harga;
				totalHarga += subTotal - subTotalAwal;
				$(a).closest('tr').find('.subTotal').val(subTotal);
				$('#total-harga').val(totalHarga);
			}

			// function calcDiskon(a){
			// 	let diskon = parseInt($(a).closest('tr').find('.diskon').val());
			// 	let harga = parseFloat($(a).closest('tr').find('td:eq(2)').text());
			// 	let subTotalAwal = parseFloat($(a).closest('tr').find('.subTotal').val());
			// 	let subTotal =harga-diskon/100 * harga;
			// 	totalHarga = subTotal - subTotalAwal;
			// 	$(a).closest('tr').find('.subTotal').val(subTotal);
			// 	$('#total-harga').val(totalHarga);
			// }

			

			// event
			$(function(){
				$('tbl-paket').DataTable();

				// pemilihan paket
				$('#paket').on('click', '.pilih-paket', function(){
					TambahPaket(this);
				
				// change qty event
				$('#formTransaksi').on('change', '.qty', function(){
					calcSubTotal(this);
				})

				// $('#formTransaksi').on('change', '.diskon', function(){
				// 	calcDiskon(this);
				// })

				// remove barang
				$('#formTransaksi').on('click', '.hapusBarang', function(){
					let subTotalAwal = parseFloat($(this).closest('tr').find('.subTotal').val());
					totalHarga -= subTotalAwal;

					$currentRow = $(this).closest('tr').remove();
					$('#total-harga') .val(totalHarga);
				})
			})
		})
		
			Date.prototype.toDateInputValue = (function() {
						var local = new Date(this);
						local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
						return local.toJSON().slice(0,10);
					}); 
				$('#tgl').val(new Date().toDateInputValue());
		})
	</script>
@endpush