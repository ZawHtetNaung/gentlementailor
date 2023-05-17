{{--@extends('layouts.master')--}}
@extends('layouts.header')
@section('content')
@push('styles')
    <style>
        .banner{
            background-position: center  !important;
            background-repeat: no-repeat;
            background-size: 100% 100% !important;
            /* object-position: center; */
            object-fit: contain;
        }

        /* .banner-height{
            height: 800px;
        } */

    </style>
@endpush
  {{-- start banner --}}
  {{--
      <section class="carousel">
          <div class="swiper sw-1">
              <!-- Additional required wrapper -->
              <div class="swiper-wrapper text-center">
                  <!-- Slides -->

                  @foreach($banners as $banner)
                      <div class="swiper-slide pos-relative {{ $loop->first ? 'active' : '' }}">
                          <img src="{{asset('frontend/images/'.$banner->photo)}}" class="img-car">
                          <div class="inner-car center-flex px-5">
                              <h1 class="mb-5 text-uppercase">{{$banner->text}}</h1>
                              <a href="#"
                                 class="btn btn-lg btn-outline-light rounded-0
                             text-uppercase">{{$banner->button_text}}</a>
                          </div>
                      </div>
                  @endforeach
                  --}}
  {{-- <div class="swiper-slide img-group">
                      <img src="{{asset('assets/images/banner.png')}}" class="img-car">

                      <div class="inner-car">
                          <h1 class="mb-5 text-uppercase">Suits make strong impression</h1>
                          <a href="#"
                             class="btn btn-lg btn-outline-light text-uppercase">Customize</a>
                      </div>
                  </div>
                  <div class="swiper-slide img-group">
                      <img src="{{asset('assets/images/home/banner.png')}}" class="img-car">
                      <div class="inner-car">
                          <h1 class="mb-5 text-uppercase">Suits make strong impression</h1>
                          <a href="#"
                             class="btn btn-lg btn-outline-light text-uppercase">Customize</a>
                      </div>

                  </div> --}}{{--


              </div>
              <!-- If we need pagination -->
              <div class="swiper-pagination"></div>
              <!-- If we need navigation buttons -->
              <div class="swiper-button-wrapper">
                  <div class="swiper-button-prev cur-prev"></div>
                  <div class="swiper-button-next cur-next"></div>
              </div>
          </div>
      </section>
  --}}
  {{-- start second banner --}}
  {{--
      <section class="quality">
          <div class="row g-0 my-1 my-md-5 my-lg-5 mb-5">
              <div class="col-md-5 col-lg-6 center-flex
                      my-5 my-md-5 my-lg-5">
                  <div class="mob-center px-5">
                      <p class="mb-4 text-uppercase">at gentlemen premium tailor</p>
                      <h3 class="mb-4 text-capitalize">we scour the globe for you the highest quality
                          cloth and
                          trimmings</h3>
                      <a href="#" class="btn btn-outline-dark rounded-0 text-uppercase">start making
                          suits</a>
                  </div>
              </div>
              <div class="col-md-7 col-lg-6 pos-relative">
                  <div class="swiper sw-2">
                      <!-- Additional required wrapper -->
                      <div class="swiper-wrapper">
                          @foreach($category as $cate)
                              <!-- Slides -->
                              <div class="swiper-slide">
                                  <img src="{{asset('frontend/images/'.$cate->photo)}}"
                                       class="qua-img">

                                  <p class="text-uppercase p-3 text-decoration-underline mob-center">
                                      <a class="fw-bold" href="">{{$cate->category_name}}</a>
                                  </p>
                              </div>
                          @endforeach
                          --}}
  {{--<div class="swiper-slide">
                              <img src="{{asset('assets/images/home/style.png')}}" class="qua-img">

                              <p class="text-uppercase p-3 text-decoration-underline mob-center">
                                  <a class="fw-bold" href="">Explore Style</a>
                              </p>
                          </div>--}}{{--

                      </div>
                      <!-- If we need navigation buttons -->
                      <div class="swiper-button-wrapper text-black">
                          <div class="swiper-button-next qua-next "></div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  --}}
  {{-- start third section --}}
  {{--
      <section class="">
          <div class="row g-0">
              <div class="col-lg-6 position-relative">
                  <a href="#" class="text-white popular-category-name">
                      <img
                          class="img-fluid category-img"
                          src="{{asset('assets/images/home/pho_1.png')}}" alt="">
                      <span class="px-3 pb-2 bottom-left">Causal Wear</span>
                  </a>
              </div>
              <div class="col-lg-6 position-relative">
                  <a href="#" class="text-white popular-category-name">
                      <img
                          class="img-fluid category-img"
                          src="{{asset('assets/images/home/pho_2.png')}}" alt="">
                      <span class="px-3 pb-2 bottom-left">Business Meeting</span>
                  </a>

              </div>
              <div class="col-lg-6 position-relative">
                  <p>
                      <a href="#" class="text-white popular-category-name">
                          <img
                              class="img-fluid category-img"
                              src="{{asset('assets/images/home/pho_3.png')}}" alt="">
                          <span class="px-3 pb-2 bottom-left">Formal Wear</span>
                      </a>
                  </p>
              </div>
              <div class="col-lg-6 position-relative">
                  <p>
                      <a href="#" class="text-white popular-category-name">
                          <img
                              class="img-fluid category-img"
                              src="{{asset('assets/images/home/pho_4.png')}}" alt="">
                          <span class="px-3 pb-2 bottom-left">Events</span>
                      </a>
                  </p>
              </div>
          </div>
      </section>
  --}}
  {{-- start fourth section --}}
  {{--
      <section class="perfect-size p-5">
          <div class="row d-flex justify-content-center">
              <div class="col-md-6 d-none d-md-block">
                  <img src="{{asset('assets/images/home/perfect.png')}}" alt="" class="img-fluid">
              </div>
              <div class="col-md-6 col-sm-12 center-flex">
                  <div class="mob-center px-4">
                      <p class="mb-4 text-uppercase">perfect size guideline</p>
                      <h3 class="mb-5 text-uppercase">how to Get the Perfect Size</h3>
                      <p class=""><a href="#"
                                     class="text-uppercase text-decoration-underline">Explore</a>
                      </p>
                  </div>
              </div>
          </div>
      </section>
  --}}
  {{-- start fifth section --}}
  {{--
      <section class="booking">
          <div class="row g-0">
              <div class="col-md-6 col-sm-12 center-flex bg-navy py-5">
                  <div class="text-center px-4">
                      <p class="mb-5 text-uppercase text-white">made by professional premium
                          tailors</p>
                      <h4 class="mb-5 text-uppercase text-gold">at gentlemen we provide
                          finest quality & best suits ever</h4>
                      <p class=""><a href="#"
                                     class="text-uppercase text-white text-decoration-underline">book
                              with tailors</a></p>
                  </div>
              </div>
              <div class="col-md-6 d-none d-md-block">
                  <img src="{{asset('assets/images/home/booking.png')}}" alt="" class="img-car">
              </div>
          </div>
      </section>
  --}}
  {{-- start sixth section --}}
  {{--
      <section class="shop-now center-flex">
          <h1 class="text-uppercase text-white px-4 text-center w-75 mb-2 mb-md-3 mb-lg-4">Get
              Free Gifts on Legacy & Premium Purchasements</h1>
          <p class="mt-2 mt-md-3 mt-lg-5">
              <a href="#" class="text-uppercase text-white text-decoration-underline
              d-none d-lg-block">shop
                  now</a>
          </p>
      </section>
  --}}
  {{-- start seventh section --}}
  {{--
      <section class="service my-3 p-3">
          <div class="row mx-4">
              <div class="col-lg-4 my-5">
                  <div class="mb-3 text-center center-flex">
                      <img src="{{asset('assets/images/home/customization.png')}}" class="fea-icon"
                           alt="Tailor shirt">
                  </div>
                  <div class="ser-text-wrapper text-center">
                      <h4 class="mb-3 text-uppercase text-center">Customization</h4>
                      <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                          sed
                          do labore et dolore.</p>
                  </div>
              </div>
              <div class="col-lg-4 my-5">
                  <div class="mb-3 text-center center-flex">
                      <img src="{{asset('assets/images/home/addon.png')}}" class="fea-icon"
                           alt="Tailor shirt">
                  </div>
                  <div class="ser-text-wrapper text-center">
                      <h4 class="mb-3 text-uppercase">Add-Ons</h4>
                      <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                          sed
                          do labore et dolore.</p>
                  </div>
              </div>
              <div class="col-lg-4 my-5">
                  <div class="mb-3 text-center center-flex">
                      <img src="{{asset('assets/images/home/delivery.png')}}" class="fea-icon"
                           alt="Tailor shirt">
                  </div>
                  <div class="ser-text-wrapper text-center">
                      <h4 class="mb-3 text-uppercase">Delivery</h4>
                      <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                          sed
                          do labore et dolore.</p>
                  </div>
              </div>
          </div>
      </section>
  --}}
  {{-- start footer --}}
  {{--
      @include('layouts.footer')
  --}}


  <header class="position-relative">
    @include('layouts/nav')
    <!-- Carousel -->
    <div class="carousel banner-height">
      <div class="swiper sw-1 b">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper ">
          <!-- Slides -->
          @foreach($banners as $banner)
            <div class="swiper-slide banner gg-z bottom-flex {{ $loop->first ? 'active' : '' }}" style="background-image: url('{{asset('frontend/images/'.$banner->photo)}}')">
              <h2 class="banner-title text-uppercase fw-700 swiper-no-swiping">{{$banner->text}}</h2>
              <p class="banner-desc text-uppercase fw-700 swiper-no-swiping"></p>
              <button class="button-two-corner"><a href="/customize"><span>{{$banner->button_text}}</span></a>
              </button>
              {{-- <button class="btn bg-gold banner-button"><a--}}
              {{--   href="/customize" class="text-navy">{{$banner->button_text}}</a>--}}
              {{--     </button>--}}
            </div>
          @endforeach

          <!--<div class="swiper-slide bottom-flex"-->
          <!--     style="background-image: url({{asset('assets/images/home/banner.png')}})">-->
          <!--    <h2 class=" text-uppercase fw-700 swiper-no-swiping">hi</h2>-->
          <!--    <h2 class="text-uppercase fw-700 swiper-no-swiping">Now</h2>-->
          <!--    <button class="button-two-corner"><a href="#"><span>Start</span></a></button>-->
          <!--</div>-->
          <!--<div class="swiper-slide bottom-flex"-->
          <!--     style="background-image: url({{asset('assets/images/home/steve.png')}})">-->
          <!--    <h2 class=" text-uppercase fw-700 swiper-no-swiping">hi</h2>-->
          <!--    <h2 class="text-uppercase fw-700 swiper-no-swiping">Now</h2>-->
          <!--    <button class="button-two-corner"><a href="#"><span>Start</span></a></button>-->
          <!--</div>-->

        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </header>

  <section class="highest mx-auto position-relative text-center">
    <div class="position-absolute top-0 start-50 translate-middle">
      <h1 class="text-uppercase">highest</h1>
      <h1 class="text-uppercase fw-700">quality</h1>
    </div>
    <img src="{{asset('assets/images/home/quality.png')}}" alt="highest quality" data-aos="zoom-in">
  </section>
  <section class="suite-package text-uppercase">
    <!--div class="row g-5 align-items-center">
        <div class="col-md-6">
            <h4>Suite Package</h4>
            <p class="my-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet
                exercitationem nostrum odio, porro recusandae rem soluta veritatis. Alias
                consequatur cumque dolorem labore neque quam quia.</p>
            <button
                class="button-two-corner mt-3 m-0"><a
                    href="#"><span>EXPLORE DETAIL</span></a></button>
        </div>
        <div class="col-md-6 d-flex justify-content-center justify-content-lg-end my-5">
            <div class="suite-circle position-relative text-center">
                <p class="position-absolute top-0 start-50 translate-middle ff-cinzel">
                    PREMIUM</p>
                <p class="position-absolute top-50 start-100 translate-middle ff-cinzel">
                    LEGACY</p>
                <h3 class="position-absolute top-50 start-50 translate-middle">Suite
                    Package</h3>
                <p class="position-absolute top-100 start-50 translate-middle ff-cinzel">
                    PACKAGE</p>
                <p class="position-absolute top-50 start-0 translate-middle ff-cinzel">
                    CLASSIC</p>
            </div>
        </div>
    </div>-->
    <h2 class="text-center">packages</h2>
    <div class="swiper sw-2">
      <div class="swiper-wrapper">
        <!-- Slides -->
        @foreach($packages as $package)

          <div class="swiper-slide">
            <a href="{{$package->link}}">
              <!--<p>{{$package->link}}</p>-->
              <img src="{{'/frontend/package/'. $package->photo}}" alt="">
              <h6 class="swiper-no-swiping mt-4">{{$package->title}}</h6>
            </a>
          </div>

        @endforeach
        <!-- <div class="swiper-slide">
          <img src="{{asset('assets/images/home/legacy.png')}}" alt="">
          <h6 class="swiper-no-swiping mt-4">Premium</h6>
        </div>
        <div class="swiper-slide">
          <img src="{{asset('assets/images/home/classic.png')}}" alt="">
          <h6 class="swiper-no-swiping mt-4">Classic</h6>
        </div> -->
      </div>
    </div>
  </section>
  <section class="customize-step">
    <div class="text-center text-uppercase">
      <h3 class="text-white">finish your suit with </h3>
      <h3 class="fw-700">6 customization process</h3>
    </div>
    <div class="row g-0 cus-6-items">
      <div class="col-md-4 text-center p-4">
        <img src="{{asset("assets/images/logo/choose_product.png")}}" alt=""
             class="customize-step-image">
        <h6 class="my-3 my-md-4 my-lg-4" data-aos="zoom-in">CHOOSE PRODUCT</h6>
        <p data-aos="zoom-in-right">Gentlemen offer locally made (made in Myanmar) and Bangkok
          Made.
          Local-made suits: These suits may have a more traditional style that appeals to customers
          who appreciate locally-made products but locals have few fabric labels to choose from.
        </p>
        <p class="pro-sec-para">Bangkok-made suits: Bangkok is known for its high-quality
          tailoring and designer
          fashion,
          so offering suits that are made in the city. These suits may feature more contemporary
          designs and use premium materials.</p>
        <span class="see-more-index text-bold text-decoration-underline" onclick="changeText(this)"
              style="cursor: pointer;
        color:#fff">Read More</span>
      </div>
      <div class="col-md-4 text-center p-4">
        <img src="{{asset("assets/images/logo/choose_package.png")}}" alt=""
             class="customize-step-image">
        <h6 class="my-3 my-md-4 my-lg-4" data-aos="zoom-in">CHOOSE PACKAGE</h6>

        <p data-aos="zoom-in-right">As a package, For Bangkok is made (Classic, Signature, Premium)
          and locally made.</p>
      </div>
      <div class="col-md-4 text-center p-4">
        <img src="{{asset("assets/images/logo/recommendation.png")}}" alt=""
             class="customize-step-image">
        <h6 class="my-3 my-md-4 my-lg-4 text-nowrap" data-aos="zoom-in">RECOMMENDATION</h6>
        <p data-aos="zoom-in-right">You can order the design that you want.
          E.g For Dinner or a Wedding, Tuxedo is the best. (matching trousers and bow tie)</p>
      </div>
      <div class="col-md-4 text-center p-4">
        <img src="{{asset("assets/images/logo/start_customization.png")}}" alt=""
             class="customize-step-image">
        <h6 class="my-3 my-md-4 my-lg-4 text-nowrap" data-aos="zoom-in">START CUSTOMIZATION</h6>
        <p data-aos="zoom-in-right">Please select the Fitting, Fabric, and Pants that you want.
          For more detail, you can contact us and Inbox us.</p>
      </div>
      <div class="col-md-4 text-center p-4">
        <img src="{{asset("assets/images/logo/measurement.png")}}" alt=""
             class="customize-step-image">
        <h6 class="my-3 my-md-4 my-lg-4 text-nowrap" data-aos="zoom-in">MEASUREMENT</h6>
        <p data-aos="zoom-in-right">We show you how to measure your body for your perfect Suit.
          Please fill in the measurements correctly and we will give you the best perfect suit for
          you.</p>
      </div>
      <div class="col-md-4 text-center p-4">
        <img src="{{asset("assets/images/logo/payment.png")}}" alt=""
             class="customize-step-image">
        <h6 class="my-3 my-md-4 my-lg-4 text-nowrap" data-aos="zoom-in">PAYMENT</h6>
        <p data-aos="zoom-in-right">For now, Our payment is only available via Paypal</p>
      </div>
    </div>
  </section>
  <section class="explore">
    <h3 class="">explore</h3>
    <div class="row g-0">
      <!--<div class="col-md-3 position-relative explore-sec">
                <img src="{{asset('assets/images/home/fabrics.png')}}" alt="Fabrics"
                     class="img-responsive">
                <p class="position-absolute bottom-0 start-0 px-4 py-3">Fabrics</p>
            </div>-->
      <div class="col-md-3 explore-sec" data-aos="fade-up" data-aos-duration="500"
           style="line-height: 0">
        <figure class="figure">
          <img src="{{asset('assets/images/home/fabrics.png')}}" alt="Fabrics"
               class="img-responsive">
          <figcaption class="center-flex">
            <i class="fa-solid fa-magnifying-glass"></i>
            <p class="small-text">Celebrity</p>
          </figcaption>
          <a href="#"></a>
          <span class="small-text position-absolute bottom-0 start-0 text-uppercase m-3">
                        Celebrity</span>
        </figure>
      </div>
      <div class="col-md-3 explore-sec" data-aos="fade-up" data-aos-duration="1000"
           style="line-height: 0">
        <figure class="figure">
          <img src="{{asset('assets/images/home/buttons.png')}}" alt="Buttons"
               class="img-responsive">
          <figcaption class="center-flex">
            <i class="fa-solid fa-magnifying-glass"></i>
            <p class="small-text">Graduation</p>
          </figcaption>
          <a href="#"></a>
          <span class="small-text position-absolute bottom-0 start-0 text-uppercase m-3">
                        Graduation</span>
        </figure>
      </div>
      <div class="col-md-3 explore-sec" data-aos="fade-up" data-aos-duration="1500"
           style="line-height: 0">
        <figure class="figure">
          <img src="{{asset('assets/images/home/styles.png')}}" alt="Styles"
               class="img-responsive">
          <figcaption class="center-flex">
            <i class="fa-solid fa-magnifying-glass"></i>
            <p class="small-text">Wedding</p>
          </figcaption>
          <a href="#"></a>
          <span class="small-text position-absolute bottom-0 start-0 text-uppercase m-3">
                        Wedding</span>
        </figure>
      </div>
      <div class="col-md-3 explore-sec" data-aos="fade-up" data-aos-duration="3000"
           style="line-height: 0">
        <figure class="figure">
          <img src="{{asset('assets/images/home/additional.png')}}" alt="Additional"
               class="img-responsive">
          <figcaption class="center-flex text-center">
            <i class="fa-solid fa-magnifying-glass"></i>
            <p class="small-text text-center">Business Meeting</p>
          </figcaption>
          <a href="#"></a>
          <span class="small-text position-absolute bottom-0 start-0 text-uppercase m-3">
                        Business Meeting</span>
        </figure>
      </div>

      <!--            <div class="col-md-3 position-relative explore-sec">
                <img src="{{asset('assets/images/home/buttons.png')}}" alt="Fabrics"
                     class="img-responsive">
                <p class="position-absolute bottom-0 start-0 px-4 py-3">Buttons</p>
            </div>
            <div class="col-md-3 position-relative explore-sec">
                <img src="{{asset('assets/images/home/styles.png')}}" alt="Fabrics"
                     class="img-responsive">
                <p class="position-absolute bottom-0 start-0 px-4 py-3">Styles</p>
            </div>
            <div class="col-md-3 position-relative explore-sec">
                <img src="{{asset('assets/images/home/additional.png')}}" alt="Fabrics"
                     class="img-responsive">
                <p class="position-absolute bottom-0 start-0 px-4 py-3">Additional</p>
            </div>-->
    </div>

  </section>
  <section class="testimonial text-center">
    <h2 class="text-uppercase">Testimonial</h2>
    <!-- Carousel -->

    <div class="swiper sw-2">
      <div class="swiper-wrapper">
        <!-- Slides -->
        @foreach($testimonials as $test)
          <div class="swiper-slide">
            <img src="{{asset('frontend/testimonial/'.$test->photo)}}" alt="">
            <h6 class="swiper-no-swiping mt-4">{{$test->name}}</h6>
            <span class="swiper-no-swiping description">{{$test->description}}</span>

          </div>
        @endforeach

        <!-- <div class="swiper-slide">
                    <img src="{{asset('assets/images/home/liam.png')}}" alt="">
                    <h6 class="swiper-no-swiping mt-4">fda</h6>
                    <span class="swiper-no-swiping">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate fugit incidunt, minima nostrum perspiciatis quis veritatis vero? Consequuntur corporis distinctio fugit sed? Adipisci explicabo facere hic iure mollitia vero voluptatibus!</span>
                </div>-->
      </div>
    </div>

  </section>
  <section class="perfect-size center-flex text-uppercase  text-center">
    <p class="mb-2">How To Get The Perfect Size</p>
    <h2 class="mb-3" data-aos="zoom-in-up">size guideline</h2>
    <button class="button-two-corner text-uppercase"><a href="/suit-tips"><span>Explore
          Detail</span></a>
    </button>
  </section>
  <section class="highest mx-auto position-relative text-center text-uppercase">
    <div class="position-absolute top-0 start-50 translate-middle stylish">
      <h1 class="text-uppercase">talk with</h1>
      <h1 class="text-uppercase fw-700">stylish</h1>
    </div>
    <img src="{{asset('assets/images/home/stylish.png')}}" alt="highest quality" data-aos="zoom-in">
    <h6 class="mt-3 mt-lg-4 ff-mont text-white mb-4">need help for your style</h6>
    <div class="d-flex justify-content-center p-0 mb-3">
      <i class='bx bx-chat me-3'></i>
      <a href="https://www.messenger.com/t/107385955212078" target="_blank"
         class="text-white-50">Click Here To
        Talk With Stylish</a>
    </div>
    <div class="d-flex justify-content-center p-0 mb-3">
      <i class='bx bx-phone me-3'></i>
      <a href="tel:09965122877" class="text-white-50">Make a phone call</a>
    </div>
  </section>
  <section class="text-center provided-sec">
    <h5 class="lh-base" data-aos="zoom-in">at gentlemen we provide finest quality & best suits
      ever</h5>
  </section>
  <button onclick="topFunction()" id="scrollBtn" title="Go to top" class="d-flex
    justify-content-center align-items-center">
    <i class="bx bx-arrow-back bx-rotate-90"></i>
  </button>
  @include('layouts/footer')
  {{--    @include('layouts/scrollTop')--}}

@endsection
@section('js')
  <script type="text/javascript">

    {{-- for See more--}}
    let seeMore = $(".see-more-index")

    $(".pro-sec-para").hide();

    seeMore.click(function () {
        document.querySelector(".pro-sec-para").classList.toggle("d-block")
    })

    function changeText(btn) {
        btn.textContent == "Read More" ? btn.textContent = "Read Less" : btn.textContent = "Read More";
    }

    AOS.init({
        duration: 1000,
    });

    $(document).ready(function () {
        //    alert("begin");
        var len = @json($category);
        // $('.qua-prev').hide();
        console.log(len);
        // swal({
        //         icon: 'error',
        //         title: 'Pay Amount Invalid!',
        //         text: ' Pay Amount is greater than Due Amount!!!',
        //     });
    })
    const productContainers = [...document.querySelectorAll('.product-container')];
    const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
    const preBtn = [...document.querySelectorAll('.pre-btn')];
    var category = @json($category);
    var count = 1;
    var cate_len = category.length;
    // alert(cate_len);
    // var last = 0;
    productContainers.forEach((item, i) => {
        let containerDimensions = item.getBoundingClientRect();
        // alert(containerDimensions.width);
        let containerWidth = containerDimensions.width;

        nxtBtn[i].addEventListener('click', () => {
            // alert(count);
            if (count < cate_len) {
                // alert("---" + count);
                count++;
            } else {
                // last = 1;
                // alert("======10")
            }

            // alert("end" + count);
            if (count != 0) {
                $('.pre-btn').show();
            }
            item.scrollLeft += containerWidth - 300;

        })

        preBtn[i].addEventListener('click', () => {
            --count;
            // alert(count);
            $(".pre-btn").css({
                "margin-left": "auto",

            });
            if (count == 1) {
                $('.pre-btn').hide();

            }
            item.scrollLeft -= containerWidth - 300;

        })
    });
    $(document).ready(function () {
        $('.pre-btn').hide();
    })

    const swiper1 = new Swiper('.sw-1', {
        // Optional parameters
        slidesPerView: 1,
        direction: 'horizontal',
        loop: true,
        speed: 1000,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        }
    });
    const swiper2 = new Swiper('.sw-2', {
        // Optional parameters
        slidesPerView: "auto",
        centeredSlides: true,
        loop: true,
        clickable: true
    });
    // scroll function
    let scrollBtn = document.getElementById("scrollBtn");
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            scrollBtn.style.display = "block";
            scrollBtn.style.opacity = "1";
            // scrollBtn.style.transform = "scale(1)";
            scrollBtn.style.pointerEvents = "all";
        } else {
            scrollBtn.style.display = "none";
            scrollBtn.style.opacity = "0";
            // scrollBtn.style.transform = "scale(1)";
            scrollBtn.style.pointerEvents = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    // end scroll function
  </script>
@endsection
@push('whishlist-nav')
  @if(isset(Auth::guard('web')->user()->id))
    <script>
        $(document).ready(function () {
            getnavData();
            // whishlist();
            // deletedata();
        });

        function getnavData() {
            var loItem = window.localStorage.getItem('Item');
            var arrayFromStroage = JSON.parse(localStorage.getItem('Item'));
            var arrayLength = arrayFromStroage.length;
            // var count = localStorage.length('Item');
            //  alert(arrayLength);
            var html = "";
            if (loItem != null) {

                itemArr = JSON.parse(loItem);
                $.each(itemArr, function (i, v) {
                    user_id = `{{Auth::guard('web')->user()->id}}`;
                    // alert( window.userID )
                    if (v.user_id == user_id) {
                        // alert("right");
                        // html += `${arrayLength}`;
                        $('#fav-space').html(arrayLength);
                    } else {
                        html += parse('0');
                    }
                });


                // document.getElementById('fav-space').innerHTML = parseInt(document.getElementById('fav-space').innerHTML) + 1;

            } else {

            }
        }
    </script>
  @endif
@endpush
