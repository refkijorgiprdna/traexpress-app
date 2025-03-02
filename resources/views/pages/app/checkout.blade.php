@extends('layouts.app')

@section('title')
    TraExpress - Checkout
@endsection

@section('content')
<!-- Page Title -->
<section class="page-title centred" style="background-image: url('{{ asset('frontend/assets/images/background/page-title-2.jpg') }}');">
    <div class="auto-container">
        <div class="content-box">
            <h1>Checkout</h1>
            <p>Ayo selesaikan transaksimu</p>
        </div>
    </div>
</section>
<!-- End Page Title -->

<!-- booking-section -->
<section class="booking-section booking-process-1">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="booking-process-content mr-20">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <h3>Daftar Penumpang</h3>
                    <div class="attendee">
                        <table class="table table-responsive-sm text-center">
                            <thead>
                                <tr>
                                    <td>No.</td>
                                    <td>Nama</td>
                                    <td>No. Handphone</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($item->detail as $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="align-middle">
                                        {{ $detail->nama }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $detail->no_hp }}
                                    </td>
                                    <td class="align-middle">
                                        <form action="{{ route('checkout-remove', $detail->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link p-0 border-0 bg-transparent">
                                                <img src="{{ url('frontend/assets/images/ic_remove.png') }}" alt="">
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        Tambahkan Data Penumpang
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="member mt-3">
                        <h3>Tambah Penumpang</h3>
                        <form action="{{ route('checkout-create', $item->id) }}" method="POST" class="form-inline">
                            @csrf
                            <label for="inputNama" class="sr-only">Nama</label>
                            <input type="text" class="form-control mb-2 mr-sm-2" name="nama" id="inputNama" placeholder="Nama" required="">

                            <label for="inputNoHandphone" class="sr-only">No. Handphone</label>
                            <input type="text" class="form-control mb-2 mr-sm-2" name="no_hp" id="inputNoHandphone" placeholder="No. Handphone" required="">

                            <button type="submit" class="btn btn-box px-4 mb-2 mr-sm-2" style="background-color: #061A3A; color: #fff;">
                                Tambah
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card card-detail card-right">
                    <h4 class="">DETAIL PEMESANAN</h4>
                    <table class="trip-informations">
                        <tr>
                            <th width="50%" style="font-weight: normal;">Tujuan</th>
                            <td width="50%" class="text-right" style="font-weight: bold;">{{ $item->travel->tujuan }}</td>
                        </tr>
                        <tr>
                            <th width="50%" style="font-weight: normal;">Tanggal</th>
                            <td width="50%" class="text-right">{{ \Carbon\Carbon::parse($item->travel->tanggal)->translatedFormat('j F Y') }}</td>
                        </tr>
                        <tr>
                            <th width="50%" style="font-weight: normal;">Pukul</th>
                            <td width="50%" class="text-right">{{ \Carbon\Carbon::createFromFormat('H:i:s', $item->travel->waktu)->format('H:i') }}</td>
                        </tr>
                        <tr>
                            <th width="50%" style="font-weight: normal;">Kapasitas</th>
                            <td width="50%" class="text-right">{{ $item->travel->kuota ?? 'Tidak tersedia' }}</td>
                        </tr>
                        <tr>
                            <th width="50%" style="font-weight: normal;">Sisa Kursi</th>
                            <td width="50%" class="text-right">{{ ($item->travel->kuota ?? 0) - $item->detail->count() }}</td>
                        </tr>
                        <tr>
                            <th width="50%" style="font-weight: normal;">Jumlah Penumpang</th>
                            <td width="50%" class="text-right">{{ $item->detail->count() }}</td>
                        </tr>

                        <tr>
                            <th width="50%" style="font-weight: normal;">Harga \ Penumpang</th>
                            <td width="50%" class="text-right">{{ 'Rp' . number_format($item->travel->harga, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th width="50%" style="font-weight: normal;">Sub Total</th>
                            <td width="50%" class="text-right">{{ 'Rp' . number_format($item->total_harga, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th width="50%">Total (+UniqueCode)</th>
                            <td width="50%" class="text-right">
                                <span class="text-blue">{{ 'Rp' . number_format($item->total_harga, 0, ',', '.') }},{{ mt_rand(0,99) }}</span>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <h4>Instruksi Pembayaran</h4>
                    <div class="bank">
                        <p class="text-center">Harap lakukan pembayaran dengan transfer ke rekening di bawah ini</p>
                        <hr>
                        <div class="bank-item pb-3">
                            <img src="{{ url('frontend/assets/images/ic_bank.png') }}" alt="" class="bank-image">
                            <div class="description">
                                <h3>PT Travel Express</h3>
                                <p>
                                    0881 8829 8800
                                    <br>
                                    Bank Central Asia
                                </p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="bank-item pb-3">
                            <img src="{{ url('frontend/assets/images/ic_bank.png') }}" alt="" class="bank-image">
                            <div class="description">
                                <h3>PT Travel Express</h3>
                                <p>
                                    0771 8779 8770
                                    <br>
                                    Bank Mandiri
                                </p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="join-container">
                    <a href="{{ route('checkout-success', $item->id) }}" class="btn btn-block btn-join-now mt-3 py-3">
                        Saya sudah melakukan pembayaran
                    </a>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('jadwal-travel') }}" class="text-muted">
                        Batalkan Pesanan
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- booking-section end -->
@endsection

@push('after-style')
<style>
    .card-detail {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        background: #f9f9f9;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
    }

    .card-detail h4 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 15px;
        text-transform: uppercase;
        border-bottom: 2px solid #ff6b6b;
        padding-bottom: 5px;
        text-align: center;
    }

    .trip-informations {
        width: 100%;
        table-layout: fixed;
        border-collapse: collapse;
    }

    .trip-informations th,
    .trip-informations td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        font-size: 14px;
    }

    .trip-informations th {
        font-weight: bold;
        text-align: left;
        color: #333;
    }

    .trip-informations td {
        text-align: right;
        color: #555;
    }

    .trip-informations tr:last-child td {
        font-weight: bold;
        color: #e74c3c;
    }

    .bank .bank-item h3 {
        font-size: 16px;
        font-weight: 500;
        color: #333;
        margin-bottom: 0;
    }

    .bank .bank-item .description {
        margin-left: 10px;
        overflow: hidden;
        float: left;
    }

    .bank .bank-item .description p {
        font-weight: 500;
        font-size: 14px;
        color: #333;
    }

    .bank .bank-image {
        width: 45px;
        height: 45px;
        float: left;
    }

    .bank p {
        font-weight: 500;
        font-size: 14px;
        color: #333;
    }

    .join-container {
        margin-top: -22px;
    }

    .btn-join-now {
        background-color: #FF7C5B;
        color: #fff;
        border-radius: 0;
    }

    .btn-join-now:hover {
        background-color: #061A3A;
        color: #fff;
    }
</style>
@endpush
