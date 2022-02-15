<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Document</title>
</head>
<body>
	<div class="card">
		<div class="card-body">
			<div class="invoice-124" id="printableArea">
				<div class="row pt-3 printableArea">
				  <div class="col-md-12">
					<div class="">
					  <address>
						<h3>&nbsp;From,</h3>
						<h4 class="mb-0 fw-bold">&nbsp;{{ Auth::user()->outlet->nama}}</h4>
						<span class="fw-bold ms-1">{{ $transaksi->kode_invoice }}</span>
						<div class="mb-2">
						  <span class="invoice-number ms-2"></span>
						  <h6 class="text-muted font-weight-medium">
							&nbsp;{{ Auth::user()->email }}
						  </h6>
						</div>
						<p class="text-muted ms-1">
							{{strtoupper(Auth::user()->name )}}
						</p>
					  </address>
					</div>
					<div class="text-end">
					  <address>
						<h3>To,</h3>
						<h4 class="fw-bold">{{ $transaksi->member->nama }}</h4>
						<p class="text-muted ms-4">
						  {{ $transaksi->member->alamat}} <br>
						  {{ $transaksi->member->telp}}
						</p>
						<p class="mt-4">
						  <b>Invoice Date :</b>
						  <i class="fa fa-calendar"></i> {{date('d-M-Y', strtotime($transaksi->tgl) ) }}
						</p>
						<p>
						  <b>Due Date :</b>
						  <i class="fa fa-calendar"></i> {{date('d-M-Y', strtotime($transaksi->batas_waktu) ) }}
						</p>
					  </address>
					</div>
				  </div>
				  <div class="col-md-12">
					<div
					  class="table-responsive mt-5"
					  style="clear: both"
					>
	
						<table class="table table-hover" >
							<thead>
								<tr>
								<th class="text-center">#</th>
								<th >Nama Paket</th>
								<th class="text-end">Jenis Paket</th>
								<th class="text-end">Qty</th>
								<th class="text-end">harga</th>
								<th class="text-end">Total</th>
								<th class="text-end">Keterangan</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($transaksi->DetailTransaksi as $p)		
								<tr>
									<td class="text-center">{{ $loop->iteration }}</td>
									<td>{{ $p->paket->nama_paket }}</td>
									<td class="text-end">
										@if ($p->paket->jenis == 'bed_cover')
										Bed Cover
										@else
										{{ $p->paket->jenis }}
									@endif	
									</td>
									<td class="text-end">{{ $p->qty }}</td>
									<td class="text-end">Rp. {{ number_format( $p->paket->harga) }}</td>
									<td class="text-end">Rp. {{ number_format( $p->sub_total) }}</td>
									<td class="text-end">
										@if ($p->keterangan == '')
										<i>Tidak Ada Keterangan</i>
										@else
										{{ $p->keterangan }}
									@endif	
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				  </div>
				  {{-- @php
					  $total = $p->paket->harga*$p->qty;
					$total_semua[] = $p->paket->harga*$p->qty ;	  
				  @endphp --}}
				  <div class="col-md-12">
					<div class="pull-right mt-4 text-end">
					  <p>Sub - Total : Rp. {{ number_format( $transaksi->total ) }}</p>
					  <p>Biaya Tambahan : Rp. {{ number_format( $transaksi->biaya_tambahan) }}</p>
					  <p>Pajak : Rp. {{ number_format( $transaksi->pajak) }}%</p>
					  <p>Diskon : Rp. {{ number_format( $transaksi->diskon) }}%</p>
					  <hr />
					  <h3><b>Total :</b> $26,778</h3>
					</div>
					<div class="clearfix"></div>
					<hr />
				
				  </div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>