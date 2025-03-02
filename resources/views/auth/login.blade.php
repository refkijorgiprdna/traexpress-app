@extends('layouts.app')

@section('content')
<!-- Page Title -->
<section class="page-title centred" style="background-image: url('{{ asset('frontend/assets/images/background/page-title-5.jpg') }}');">
    <div class="auto-container">
    </div>
</section>
<!-- End Page Title -->
<!-- register-section -->
<section class="register-section sec-pad">
    <div class="anim-icon">
        <div class="icon anim-icon-1" style="background-image: url('{{ asset('frontend/assets/images/shape/shape-16.png') }}');"></div>
        <div class="icon anim-icon-2" style="background-image: url('{{ asset('frontend/assets/images/shape/shape-17.png') }}');"></div>
    </div>
    <div class="auto-container">
        <div class="inner-box">
            <div class="sec-title centred">
                <p>Sign in</p>
                <h2>Connect with us for Better Travel</h2>
            </div>
            <div class="form-inner">
                <form action="{{ route('login') }}" method="POST" class="register-form">
                    @csrf
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 column">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 column">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 column">
                            <div class="form-group message-btn">
                                <button type="submit" class="theme-btn">Sign In</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="other-text">
                    Don't have an account? <a href="{{ route('register') }}">Register Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- register-section end -->
@endsection
