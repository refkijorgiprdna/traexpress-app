@extends('layouts.app')

@section('title')
    TraExpress - Kontak
@endsection

@section('content')

<!-- Page Title -->
<section class="page-title centred" style="background-image: url('{{ asset('frontend/assets/images/background/page-title-5.jpg') }}');">
    <div class="auto-container">
        <div class="content-box">
            <h1>Kontak</h1>
        </div>
    </div>
</section>
<!-- End Page Title -->


<!-- contact-info-section -->
<section class="contact-info-section bg-color-1">
    <div class="anim-icon">
        <div class="icon anim-icon-1" style="background-image: url('{{ asset('frontend/assets/images/shape/shape-3.png') }}');"></div>
        <div class="icon anim-icon-2" style="background-image: url('{{ asset('frontend/assets/images/shape/shape-3.png') }}');"></div>
    </div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                <div class="single-info-box wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box"><i class="icon-Location"></i></div>
                        <h3>Alamat</h3>
                        <p>Jl. Manggis, Kota Bengkulu</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                <div class="single-info-box wow fadeInUp animated animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box"><i class="icon-Phone"></i></div>
                        <h3>Phone</h3>
                        <p><a href="tel:6285368999909">+62 8 5368 9999 09</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                <div class="single-info-box wow fadeInUp animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box"><i class="icon-Envelope"></i></div>
                        <h3>Email</h3>
                        <p><a href="mailto:info@example.com">refki.jorgipradana@gmail.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-info-section end -->



@endsection
