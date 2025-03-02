@extends('layouts.admin')

@section('title')
TraExpress - Dashboard
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="font-weight: bold">Detail Transaksi {{ $item->user->name }}</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $item->id }}</td>
                </tr>
                <tr>
                    <th>Tujuan</th>
                    <td>{{ $item->travel->tujuan }}</td>
                </tr>
                <tr>
                    <th>Tanggal Keberangkatan</th>
                    <td>{{ \Carbon\Carbon::parse($item->travel->tanggal)->translatedFormat('j F Y') }}</td>
                </tr>
                <tr>
                    <th>Waktu</th>
                    <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $item->travel->waktu)->format('H:i') }}</td>
                </tr>
                <tr>
                    <th>Pemesan</th>
                    <td>{{ $item->user->name }}</td>
                </tr>
                <tr>
                    <th>Total Harga</th>
                    <td>{{ 'Rp' . number_format($item->total_harga, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Status Transaksi</th>
                    <td>{{ $item->status_transaksi }}</td>
                </tr>
                <tr>
                    <th>Detail Penumpang</th>
                    <td>
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>No Handphone</th>
                            </tr>
                            @foreach ($item->detail as $detail)
                                <tr>
                                    <td>{{ $detail->id }}</td>
                                    <td>{{ $detail->nama }}</td>
                                    <td>{{ $detail->no_hp }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>



</div>
<!-- /.container-fluid -->
@endsection
