@extends('layouts.app')

@section('title')
    TraExpress - Beranda
@endsection

@section('content')
    <!-- banner-section -->
    <section class="banner-section" style="background-image: url('{{ asset('frontend/assets/images/banner/banner-1.jpg') }}');">
        <div class="pattern-layer" style="background-image: url('{{ asset('frontend/assets/images/shape/shape-1.png') }}');"></div>
        <div class="auto-container">
            <div class="content-box">
                <h2>Book <br />Your Travel</h2>
                <p>Temukan tujuan seru berikutnya, pesan perjalananmu sekarang</p>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 column">
                <div class="form-group">
                    <a href="tour-1.html" class="theme-btn">Book Now</i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->


    <!-- feature-section -->
    <section class="feature-section centred bg-color-1 sec-pad">
        <div class="auto-container">
            <div class="sec-title text-center">
                <p>Specials for You</p>
                <h2>Mengapa harus TraExpress?</h2>
            </div>
            <div class="row clearfix justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{ url('frontend/assets/images/resource/feature-2.jpg') }}" alt=""></figure>
                            <div class="lower-content">
                                <div class="icon-box"><i class="icon-2"></i></div>
                                <h4>100% Trusted Travel Agency</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated animated" data-wow-delay="400ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{ url('frontend/assets/images/resource/feature-3.jpg') }}" alt=""></figure>
                            <div class="lower-content">
                                <div class="icon-box"><i class="icon-3"></i></div>
                                <h4>12+ Years of Travel Experience</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{ url('frontend/assets/images/resource/feature-4.jpg') }}" alt=""></figure>
                            <div class="lower-content">
                                <div class="icon-box"><i class="icon-4"></i></div>
                                <h4>98% of Our Travelers are Happy</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature-section end -->

@endsection
