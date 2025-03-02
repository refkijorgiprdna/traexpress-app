@extends('layouts.app')

@section('title')
    TraExpress - Sukses
@endsection

@section('content')

<!-- Page Title -->
<section class="page-title centred" style="background-image: url('{{ asset('frontend/assets/images/background/page-title-5.jpg') }}');">
    <div class="auto-container"> 
    </div>
</section>
<!-- End Page Title -->

<!-- booking-section -->
<section class="booking-section booking-process-1">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                <div class="booking-process-content mr-20">
                    <div class="confirm-box">
                        <div class="inner-box centred">
                            <div class="icon-box"><i class="icon-Check-4"></i></div>
                            <h3>Thanks for your order!</h3>
                            <p>You'll receive an email confirmation shortly at<br /><a href="mailto:info@example.com">info@example.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- booking-section end -->

@endsection
