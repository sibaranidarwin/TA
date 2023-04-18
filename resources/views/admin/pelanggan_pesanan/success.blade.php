@extends('layouts.admin')
@section('title')
    <title>Pembayaran Tiket Wisata</title>
@endsection
@section('content')
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
			margin: 0;
			padding: 0;
		}
		.container {
			max-width: 900px;
			margin: 0 auto;
			padding: 20px;
            align-content: center;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0,0,0,0.2);
		}
		h5 {
			text-align: center;
			margin-top: 0;

		}
		p {
			margin-bottom: 10px;
		}
		table {
			width: 100%;
			border-collapse: collapse;
			margin-bottom: 20px;
		}
		th, td {
			padding: 10px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #f2f2f2;
		}
        .card-header{
            background-color: #3e8e41;
            color: #fff;
        }
	</style>

	<div class="container mt-5 card col-md-10">
        <div class="card-header text-center">
            <strong>Pembayaran Sukses</strong>
          </div>
		<h5 class="mt-5">Terimakasih atas konfirmasi Pembayaran Anda</h5>
		<p class="mt-5">Berikut adalah detail pesanan Anda:</p>
		<table>
			<thead>
				<tr>
					<th>Nama Tiket</th>
					<th>Jumlah Tiket Dewasa</th>
					<th>Jumlah Tiket Anak-anak</th>
					<th>Tanggal Wisata</th>
					<th>Total Harga</th>
				</tr>
			</thead>
			@foreach ($carts as $item)
			{{-- {{ dd($carts) }} --}}
			<tbody>
				<tr>
					<td>{{ $item->nama_tiket }}</td>
					<td>{{ $item->anak }}</td>
					<td>{{ $item->dewasa }}</td>
					<td>{{ TanggalID($item->tgl_wisata) }}</td>
					<td>Rp {{ number_format($item->total_harga, 0, ".", ".") }}</td>
				</tr>
			</tbody>
			@endforeach
		</table>
		{{-- <p>Silakan cek email Anda untuk informasi lebih lanjut mengenai transaksi ini.</p> --}}
		<a href=" {{ url('pemesanan') }}" class="btn btn-danger col-md-4 mt-3">Kembali</a>
	</div>
@endsection
