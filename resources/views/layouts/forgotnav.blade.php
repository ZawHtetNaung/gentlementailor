<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gentlemen</title>
    {{-- <link rel="shortcut icon" href=""> --}}
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/home/mob-logo.png')}}">
    {{-- bootstrap  5.2.1 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
          crossorigin="anonymous">
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    {{-- fontawesome 6.2.0 --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
          integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"></link> -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    {{-- public / css / app.css --}}
    <link href="{{asset('css/style-old.css')}}" rel="stylesheet">
    <link href="{{asset('css/lightslider.css')}}" rel="stylesheet" type="text/css">
    {{-- font --}}
</head>
<body>


@yield('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>
@yield('js')
{{-- Navbar javascript  --}}
<!-- santhida's js -->
<script>
    $(function () {
        var $allItems = $(".content-wrapper > div");
        $(document.body).on("click", ".menu-title", function () {
            var id = this.id, itemId = "#item-" + id;
            $allItems.not($(itemId).toggle('slow')).hide('slow');
        });

        // $(".menu-title").mouseenter(function() {
        //     var id = this.id, itemId = "#item-" + id;
        //     $allItems.not($(itemId).show('slow'));
        // }).mouseleave(function() {
        //     var id = this.id, itemId = "#item-" + id;
        //     $allItems.not($(itemId).hide('slow'));
        // });
    });
</script>
<!-- zh-script -->
@stack('pop-up-scripts')
@stack('reset-pass-scripts')
