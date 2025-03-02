<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>@yield('title')</title>

<!-- Fav Icon -->
<link rel="icon" href="{{ url('frontend/assets/images/favicon.ico') }}" type="image/x-icon">

@include('includes.app.style')

@stack('after-style')

</head>


<!-- page wrapper -->
<body>

    <div class="boxed_wrapper">
        @include('includes.app.navbar')

        @yield('content')

        @include('includes.app.footer')



        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fal fa-angle-up"></span>
        </button>
    </div>


    @include('includes.app.script')

</body><!-- End of .page_wrapper -->
</html>
