<?php
$headerCSP = "Content-Security-Policy:".
    "base-uri 'self';".
    "default-src 'self';".
    "script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net/npm/vue@2.7.10/dist/vue.runtime.min.js http://localhost/moe/public/js/app.js https://stats.pusher.com/timeline/v2/jsonp/1 https://www.googletagmanager.com/gtag/js;".
    "style-src 'self' 'unsafe-inline' ;".
    "object-src 'none';".
    "connect-src 'self' https://fcmregistrations.googleapis.com https://firebaseinstallations.googleapis.com".
    " wss://localhost:6001 https://www.google-analytics.com wss://test.gentlementailor.shop:6001;".
    "font-src 'self';".
    "frame-src 'self';".
    "img-src 'self';".
    "manifest-src 'self';".
    "media-src 'self';".
    "report-uri https://63d22e9c1110c9e871bfc411.endpoint.csper.io/?v=1;".
    "worker-src 'self';";
header('X-Frame-Options: DENY');
//header($headerCSP);
header('X-XSS-Protection: 1; mode=block');
header('X-Content-Type-Options: nosniff');
?>


<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gentlemen Premium Tailor</title>
    <!-- fav icon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/home/mob-logo.png')}}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    {{--Icons--}}
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{--Swiper--}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    {{--Axios--}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Default Style -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">

    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="{{ asset('js/front.js') }}"></script>
    @stack('styles')
</head>
<body>
@yield('content')
@stack('script_tag')
@stack('script_fabric_infinite')
@stack('script_jacket_infinite')
@stack('script_pant_infinite')
@stack('script_vest_infinite')
@stack('script_suit_tip_infinite')
</body>

</html>
@yield('js')
@stack('zh-js')

@stack('whishlist-scripts')
@stack('whishlist-scripts-ready-to-wear')
@stack('whishlist-scripts-additional')
@stack('whishlist-nav')

@stack('desktop-paypal')
@stack('mobile-paypal')


