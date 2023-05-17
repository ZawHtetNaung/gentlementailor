<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gentlemen</title>
    {{-- <link rel="shortcut icon" href=""> --}}
    {{-- bootstrap  5.2.1 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    {{-- fontawesome 6.2.0 --}}
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- public / css / app.css --}}
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/app1.css')}}" rel="stylesheet">
    <link href="{{asset('css/lightslider.css')}}" rel="stylesheet" type="text/css">
    {{-- font --}}
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<body>
<div class="wrapper">
        <div class="row login-wrapper" style="">
            <div class="col-sm mx-auto mx-md-auto" id="top" style="">
                Buy over $500 and get 20% off cupon code!
            </div>
            <div class="col-sm-2">
                <div class="row">
                    <div class="col-sm col-md">
                        <!-- zh pop up -->
                        <!-- Button trigger modal -->
                        @if(isset(Auth::guard('web')->user()->id))
                        <li class="login">
                            <a class="" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @else
                        <button type="button" class="login" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Login
                        </button>
                        @endif
                        @include('layouts.popup')
                        <!-- end zh pop up -->
                    </div>
                    <div class="col-sm col-md">
                        <div class="dropdown">
                            <a class="support dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Support
                            </a>

                            <ul class="dropdown-menu" style="width:10px">
                                <li><a class="dropdown-item" href="#" style="font-size:12px;letter-spacing:1px">Action</a></li>
                                <li><a class="dropdown-item" href="#"  style="font-size:12px;letter-spacing:1px">Another action</a></li>
                                <li><a class="dropdown-item" href="#"  style="font-size:12px;letter-spacing:1px">Something</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row app-nav-container">
            <div class="col-sm-3 col-md-3">
                <div class="contact">
                    <div class="">Contact Us<i class="fa-regular fa-heart" style="margin-left: 30px;"></i>
                    <i class="fa-solid fa-bag-shopping" style="margin-left:20px"></i></div>

                </div>
            </div>
            <div class="col-sm-5 col-md-5" style="font-size:28px;font-weight:500">
                <div class="title">Gentleman Premium Tailor</div>
            </div>
            <div class="col-sm-4 col-md-4 section-1">
                <div class="input-group mb-3">
                    <input type="text" id="search-input" style="font-size: 10px;
    letter-spacing: 1px;
    font-weight: bold;" class="form-control py-2" placeholder="SEARCH ANYTHING YOU WANT" aria-label="SEARCH ANYTHING YOU WANT" aria-describedby="button-addon2">
                    <button class="btn btn-dark px-sm-3 px-md-1" type="button" id="button-addon2" style="letter-spacing:1px;">SEARCH</button>
                </div>
            </div>
        </div>
        <div class="app-menu-container">
            <div class="menu-title">
                Home
            </div>
            <div class="menu-title" id="show-new">
                What's new
            </div>
            <div class="menu-title" id="shop">
                Shop By
            </div>
            <div class="menu-title">
                Customise
            </div>
            <div class="menu-title">
                Fabrics & Colours
            </div>
            <div class="menu-title">
                Rice List
            </div>
            <div class="menu-title">
                Size Guide
            </div>
            <div class="menu-title">
                Additional
            </div>
        </div>
        <div class="content-wrapper">
            <div id="item-show-new">
                <div class="row">
                    <div class="col-sm-3">
                        <div>what’s new</div>
                        <div>trendings</div>
                        <div>new arrivals ready to wear</div>
                    </div>
                    <div class="col-sm-9">
                        <div>trending styles</div>
                        <div class="new-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3dLX7dym9tc34Ybj6V41vU8d8OP1xoc2IvYAlvkSEcA&s" alt="">

                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3dLX7dym9tc34Ybj6V41vU8d8OP1xoc2IvYAlvkSEcA&s" alt="">

                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3dLX7dym9tc34Ybj6V41vU8d8OP1xoc2IvYAlvkSEcA&s" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div id="item-shop">
                <div class="row">
                    <div class="col-sm-2">
                        ocassions
                    </div>
                    <div class="col-sm-2">
                        styles
                    </div>
                    <div class="col-sm-3">
                        <div class="color">colors</div>
                        <div class="row color-row">
                            <div class="col-sm-3">
                                <div class="bg-black circle" style="background: #111216"></div>
                            </div>
                            <div class="col-sm-3">
                                <div class="circle" style="background: #29292A"></div>
                            </div>
                            <div class="col-sm-3">
                                <div class="circle" style="background: #102735"></div>
                            </div>
                            <div class="col-sm-3">
                                <div class="circle" style="background: #675E52"></div>
                            </div>
                            <div class="col-sm-3">
                                <div class="circle" style="background: #111216"></div>
                            </div>
                            <div class="col-sm-3">
                                <div class="circle" style="background: #403B1A"></div>
                            </div>
                            <div class="col-sm-3">
                                <div class="circle" style="background: #445270"></div>
                            </div>
                            <div class="col-sm-3">
                                <div class="circle" style="background: #050D19"></div>
                            </div>
                        </div>
                        <a href="" class="more-color">More Colors</a>
                    </div>
                    <div class="col-sm-5">
                        <div class="ocassion">ocassions</div>
                        <div class="row">
                            <div class="col-sm">
                                <div
                                    class="bg-image shadow-1-strong mb-1 text-white"
                                    style="width: 185px;
                                    height: 149px;
                                    position: relative;
                                    "
                                >
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3dLX7dym9tc34Ybj6V41vU8d8OP1xoc2IvYAlvkSEcA&s" class="rounded" alt="">
                                    <div class="o-name">Name</div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div
                                    class="bg-image shadow-1-strong mb-1 text-white"
                                    style="width: 185px;
                                    height: 149px;
                                    position: relative;
                                    "
                                >
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3dLX7dym9tc34Ybj6V41vU8d8OP1xoc2IvYAlvkSEcA&s" class="rounded" alt="">
                                    <div class="o-name">Name</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>
@yield('js')
{{-- Navbar javascript  --}}
<!-- santhida's js -->
<script>
    $(function(){
        var $allItems =  $(".content-wrapper > div");
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
