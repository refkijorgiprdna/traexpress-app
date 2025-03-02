@extends('layouts.app')

@section('title')
    TraExpress - Jadwal Travel
@endsection

@section('content')


<!-- Page Title -->
<section class="page-title centred" style="background-image: url('{{ asset('frontend/assets/images/background/page-title-2.jpg') }}');">
    <div class="auto-container">
        <div class="content-box">
            <h1>Jadwal Travel</h1>
            <p>pesan perjalananmu sekarang</p>
        </div>
    </div>
</section>
<!-- End Page Title -->


<!-- tours-page-section -->
<section class="tours-page-section">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="wrapper grid">
                    <div class="tour-grid-content">
                        <div class="row clearfix">
                            @foreach ($items as $item)
                                <div class="col-lg-4 col-md-4 col-sm-12 tour-block">
                                    <div class="tour-block-one">
                                        <div class="inner-box">
                                            <div class="lower-content">
                                                <h3><a href="booking-1.html">{{ $item->tujuan }}</a></h3>
                                                <h4>{{ 'Rp' . number_format($item->harga, 0, ',', '.') }}<span> / Penumpang</span></h4>
                                                <ul class="info clearfix">
                                                    <li><i class="far fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('j F Y') }}</li>
                                                    <li><i class="far fa-clock"></i>{{ \Carbon\Carbon::createFromFormat('H:i:s', $item->waktu)->format('H:i') }}</li>
                                                </ul>
                                                <ul class="info clearfix">
                                                    <li><i class="far fa-users"></i>&nbsp Sisa Tiket</li>
                                                    <li><i class=""></i>{{ $item->kuota }}</li>
                                                </ul>
                                                <div class="btn-box">
                                                    @auth
                                                    @if ($item->kuota > 0)
                                                        <form action="{{ route('checkout-process', $item->id) }}" method="post">
                                                            @csrf
                                                            <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                                                                Pesan Sekarang
                                                            </button>
                                                        </form>
                                                    @else
                                                        <button class="btn btn-block btn-danger mt-3 py-2" disabled>
                                                            Tiket Habis
                                                        </button>
                                                    @endif
                                                        {{--  <a href="{{ route('checkout', $item->slug) }}">Pesan</a>  --}}
                                                    @endauth
                                                    @guest
                                                        <a href="{{ route('login') }}">Login</a>
                                                    @endguest
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="pagination-wrapper">
                    <ul class="pagination clearfix">
                        <li><a href="tour-1.html" class="current">1</a></li>
                        <li><a href="tour-1.html">2</a></li>
                        <li><a href="tour-1.html">3</a></li>
                        <li><a href="tour-1.html"><i class="icon-Right-Arrow"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- tours-page-section end -->




@endsection

@push('after-style')
    <style>
        .btn-join-now {
            position: relative;
            display: inline-block;
            font-size: 15px;
            line-height: 26px;
            color: #061a3a;
            font-weight: 500;
            border: 1px solid #e4e8e9;
            border-radius: 4px;
            padding: 11px 28px;
            text-align: center;
        }

        .btn-join-now:hover {
            color: #fff;
            box-shadow: 0px 15px 25px 0px rgba(255,124,91,0.3);
            background: #ff7c5b;
	        border-color: #ff7c5b;
        }
    </style>
@endpush
