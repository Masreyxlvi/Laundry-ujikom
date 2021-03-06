@extends('dashboard.layouts.main')

@push('head')
<link href="{{ asset('vendors') }}/css/status_pembayaran.css" rel="stylesheet">
@endpush
@section('content')
<form action="/transaksi" method="post" id="formTransaksi">
	@csrf
	<h4 class="card-title">Transaksi</h4>
	<div class="col-lg-12">
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
		@push('script')
			<script>								
					Swal.fire({
					position: 'top-end',
					icon: 'success',
					title: 'Your work has been saved',
					showConfirmButton: false,
					timer: 2000
					})
			</script>
		@endpush
		@endif
		
	
			@include('dashboard.transaksi.pilih')	
			
			
	</div>
</form>

  @include('dashboard.transaksi.paket')
  @include('dashboard.transaksi.member')
  @endsection
@push('script')
	<script>
			$('#nav-data').collapse('show');

				$('#CucianBaru').on('show.bs.collapse', function(){
					$('#Proses').collapse('hide');
					$('#nav-data').removeClass('active');
					$('#nav-pembayaran').addClass('active');	
				});

				$('#Proses').on('show.bs.collapse', function(){
					$('#CucianBaru').collapse('hide');
					$('#nav-pembayaran').removeClass('active');
					$('#nav-data').addClass('active');	
				});

	</script>
	<script>
		// memilih data member
			$(function(){
			$('#tbl-member').DataTable();
			$('#tbl-paket').DataTable();

			$('#tbl-member').on('click', '.pilih-member', function(){
				let ele = $(this).closest('tr');
				let id = ele.find('input[name=idMember]').val();
				let nama = ele.find('td:eq(0)').text();
				let telp = ele.find('td:eq(1)').text();
				let alamat = ele.find('td:eq(3)').text();
				
				$('#NamaMember').val(nama)
				$('#nama').val(nama)
				$('#telp').val(telp)
				$('input[name=member_id]').val(id)
				$('#alamat').val(alamat)
				$('#member').modal('hide')
			});
			
		})
		
		// end milih data member
		const updateRowNumber = function() {
				setTimeout(() => {
					let tr = $('#tbl-transaksi').find('tbody tr');
					tr.each((i, d) => {
							$(d).find('td:eq(0)').text(++i);
					});
				});
			}
		// memilih data Paket
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
					data += '<input type="hidden" class="harga" name="harga" value=" '+harga+' ">';
					data += '<input type="hidden" value=" '+harga*parseInt($('#qty').val())+' ">';
					data += '<td><input type="number" value="1" min="1" class="form-control-sm border-0 qty" autofocus name="qty[]" ></td>';
					data += '<td><input type="text" readonly class="subTotal form-control-plaintext" name="sub_total[]" value=" '+harga+' "></td>';
					data += '<td><input type="text" placeholder="Keterangan" class="form-control  " autofocus name="keterangan[]" ></td>';
					data += '<td><button type="button" class="hapusBarang btn btn-outline-danger"><i class="mdi  mdi-delete"></i></button></td>';
					data += '</tr>'
					if(tbody == 'Belum Ada Paket') $('#tbl-transaksi tbody tr').remove();
  
					$('#tbl-transaksi tbody').append(data);
					totalHarga += parseFloat(harga);
					$('#totalHarga').val(totalHarga);
					$('#paket').modal('hide')
				}

			function calcSubTotal(a){
				let qty = parseInt($(a).closest('tr').find('.qty').val());
				let diskon = parseInt($(a).closest('tr').find('.diskon').val());
				let harga = parseFloat($(a).closest('tr').find('td:eq(2)').text());
				let subTotalAwal = parseFloat($(a).closest('tr').find('.subTotal').val());
				let count = qty * harga;    
				totalHarga = totalHarga  - subTotalAwal + count ;    
				$(a).closest('tr').find('.subTotal').val(count);
				$('#totalHarga').val(totalHarga);
			}
			
			function UpdateTotal(a){
					let qty = Number($('.qty').val());
					let harga = Number($('.harga').val());
					let pajak = Number($('.pajak').val());
					let diskon = Number($('.diskon').val());
					let biayaTambahan = Number($('.biayaTambahan').val());

					let subTotal = qty * harga;
					let total = subTotal + biayaTambahan
					let totalPajak = pajak/100*total;
					let totalDiskon = diskon/100*total;
					totalHarga = total - totalDiskon + totalPajak ;
					$('#totalPajak') .val(totalPajak);
					$('#totalDiskon') .val(totalDiskon);
					$('#totalHarga') .val(totalHarga);
			}
			

			// event
			$(function(){
				let itemsTable = $('tbl-paket').DataTable();

				// pemilihan paket
				$('#paket').on('click', '.pilih-paket', function(){
						TambahPaket(this)
				});
				// change qty event
				$('#formTransaksi').on('keydown change', '.qty', function(){
					calcSubTotal(this);
				});

				$('#formTransaksi').on('keyup change', '.pajak', function(){
					UpdateTotal(this);
					
				});
				
				$('#formTransaksi').on('keyup change', '.diskon', function(){
					UpdateTotal(this);	
				});

				$('#formTransaksi').on('keyup change', '.biayaTambahan', function(){
					UpdateTotal(this);	
				});
				// remove barang
				$('#formTransaksi').on('click', '.hapusBarang', function(){
					let subTotalAwal = parseFloat($(this).closest('tr').find('.subTotal').val());
					let diskon = Number($('.diskon').val());
					totalHarga -= subTotalAwal;
					$currentRow = $(this).closest('tr').remove();
					$('#totalHarga') .val(totalHarga);
				});
			});
		
		// end milih paket
		
	
	</script>
@endpush