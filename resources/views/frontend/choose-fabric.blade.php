@extends('layouts.header')
@push('styles')
  <link href="{{asset('css/SelectCss/select2.min.css')}}" rel="stylesheet"/>
  <link href="{{ asset('css/fabric.css') }}" rel="stylesheet">
  <link href="{{ asset('css/customize.css') }}" rel="stylesheet">
@endpush
@section('content')
  @include('layouts/nav')
  <input type="hidden" style="color:black" id="cus_cate_id">
  <input type="hidden" style="color:black" id="package_id">
  <input type="hidden" style="color:black" id="style_id">
  <input type="hidden" style="color:black" id="hidden_total">
  <input type="hidden" style="color:black" id="measure_step_pass" value="0">
  <input type="hidden" style="color:black" id="style_rec_id">
  <input type="hidden" style="color:black" id="style_rec_cate_id">
  <input type="hidden" style="color:black" id="view_more_status">
  @if($user == null || $upper == null)
  <input type="hidden" id="upper_measure_id">
  @else
  <input type="hidden" value="{{$upper->id}}" id="upper_measure_id">
  @endif
  @if($user == null || $lower == null)
  <input type="hidden" id="lower_measure_id">
  @else
  <input type="hidden" value="{{$lower->id}}" id="lower_measure_id">
  @endif
  <input type="hidden" id="order_id" value="start">
  <section class="cus-breadcrumb py-2">
      <div class="d-flex justify-content-between align-items-center mb-0">
        <a href="#" class="pt-1" id="back"><i class='bx bx-arrow-back'></i></a>
        <a href="#" class="pt-1" id="next-arrow"><i class='bx bx-arrow-back bx-rotate-180' ></i></a>
      </div>
  </section>
  <section class="custom text-center" style="margin-bottom: 20px;">
    <span class="text-white-50">STEP <span id="step_no" class="text-gold">4</span>/7</span>
    <h4 class="text-uppercase ff-mont text-white mb-3" id="step_title">Choose The Product</h4>
    <div class="indicator d-flex justify-content-center gap-2 gap-lg-4 mx-0 mx-lg-5">
      <div class="indicator-select" id="ind1"></div>
      <div class="" id="ind2"></div>
      <div class="" id="ind3"></div>
      <div class="" id="ind4"></div>
      <div class="" id="ind5"></div>
      <div class="" id="ind6"></div>
      <div class="" id="ind7"></div>
    </div>
  </section>

  <section class="row g-0 my-5 mx-3 mx-md-5 px-0 px-md-2">
    <!-- <div class="col-1 d-flex align-items-center">
      <a href="/customize" class="me-3 pt-1"><i class='bx bx-arrow-back'></i></a>
    </div> -->
    <div class="col-7 mx-0 mx-md-auto d-flex align-items-center d-md-block">
      <h6 class="text-uppercase text-white text-start text-md-center text-wrap ff-mont mb-0
      fabric-filter-text" id="cfTitle">Fitting</h6>
    </div>
    <div class="col-4 price d-block d-md-none text-end">
      <span class="me-3 text-gold fs-5">$</span><h4
        class="d-inline ff-mont fabric-filter-text">289</h4>
    </div>
  </section>

  <section>
    <section id="fabric-filter">
      <div class="d-flex align-items-center flex-column mb-4 mx-3 mx-md-3">
        <div>
          <!--          <h6 class="text-uppercase text-white text-md-center ff-mont mb-3 fabric-filter-text
                d-none d-md-block">Fabric
                      Selection</h6>-->
          <div class="d-flex justify-content-start customize-fabric flex-wrap">
            <div class="pe-3 mb-3">
              <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle w-100 d-flex
          justify-content-center align-items-center text-uppercase"
                        data-bs-toggle="dropdown">
                  Colour
                  <i class='bx bx-chevron-down ms-3'></i>
                </button>
                <ul class="dropdown-menu text-uppercase">
                  @foreach($colors as $color)

                    <li class="dropdown-item">
                      <input type="checkbox" class="form-check-input me-3 m-0"
                             id="oncolor{{$color->id}}" name="colour" value="{{$color->id}}">
                      <label class="form-check-label"
                             for="oncolor{{$color->id}}">{{$color->name}}</label>
                    </li>

                  @endforeach
                  {{-- <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="red" name="colour">
                    <label class="form-check-label" for="red">red</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="green" name="colour">
                    <label class="form-check-label" for="green">Green</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="white" name="colour">
                    <label class="form-check-label" for="white">White</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="silver"
                           name="colour">
                    <label class="form-check-label" for="silver">Silver</label>
                  </li> --}}
                </ul>
              </div>
            </div>
            <div class="pe-3 mb-3">
              <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle w-100 d-flex
          justify-content-center align-items-center text-uppercase"
                        data-bs-toggle="dropdown">
                  Fabrics Type
                  <i class='bx bx-chevron-down ms-3'></i>
                </button>
                <ul class="dropdown-menu text-uppercase">
                  @foreach($textures as $texture)
                    <li class="dropdown-item">
                      <input type="checkbox" class="form-check-input me-3 m-0"
                             id="ontexture{{$texture->id}}" value="{{$texture->id}}">
                      <label class="form-check-label"
                             for="ontexture{{$texture->id}}">{{$texture->name}}</label>
                    </li>
                  @endforeach
                  {{-- <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="pwool"
                           name="fabrics">
                    <label class="form-check-label" for="pwool">Pure Wool</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="cashmere"
                           name="fabrics">
                    <label class="form-check-label" for="cashmere">Cashmere</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="flannel"
                           name="fabrics">
                    <label class="form-check-label" for="flannel">Flannel</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="linen"
                           name="fabrics">
                    <label class="form-check-label" for="linen">linen</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="cotton"
                           name="fabrics">
                    <label class="form-check-label" for="cotton">cotton</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="tweet"
                           name="fabrics">
                    <label class="form-check-label" for="tweet">tweet</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="velvet"
                           name="fabrics">
                    <label class="form-check-label" for="velvet">velvet</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="seesucker"
                           name="fabrics">
                    <label class="form-check-label" for="seesucker">seesucker</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="rcarpet"
                           name="fabrics">
                    <label class="form-check-label" for="rcarpet">red carpet</label>
                  </li> --}}
                </ul>
              </div>
            </div>
            <div class="pe-3 mb-3">
              <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle w-100 d-flex
          justify-content-center align-items-center text-uppercase"
                        data-bs-toggle="dropdown">
                  pattern
                  <i class='bx bx-chevron-down ms-3'></i>
                </button>
                <ul class="dropdown-menu text-uppercase">
                  @foreach($patterns as $pattern)
                    <li class="dropdown-item">
                      <input type="checkbox" class="form-check-input me-3 m-0"
                             id="onpattern{{$pattern->id}}"
                             name="fabrics" value="{{$pattern->id}}">
                      <label class="form-check-label"
                             for="onpattern{{$pattern->id}}">{{$pattern->name}}</label>
                    </li>
                  @endforeach
                  {{-- <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="plaids"
                           name="fabrics">
                    <label class="form-check-label" for="plaids">plaids</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="herringbone"
                           name="fabrics">
                    <label class="form-check-label" for="herringbone">herringbone</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="houndstooth"
                           name="fabrics">
                    <label class="form-check-label" for="houndstooth">houndstooth</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="donegal"
                           name="fabrics">
                    <label class="form-check-label" for="donegal">donegal</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="pattern"
                           name="fabrics">
                    <label class="form-check-label" for="pattern">pattern</label>
                  </li> --}}
                </ul>
              </div>
            </div>
            <div class="pe-3 mb-3">
              <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle w-100 d-flex
          justify-content-center align-items-center text-uppercase"
                        data-bs-toggle="dropdown">
                  Package
                  <i class='bx bx-chevron-down ms-3'></i>
                </button>
                <ul class="dropdown-menu text-uppercase">
                  @foreach($packages as $package)
                    <li class="dropdown-item">
                      <input type="checkbox" class="form-check-input me-3 m-0"
                             id="onpackage{{$package->id}}"
                             name="fabrics" value="{{$package->id}}">
                      <label class="form-check-label"
                             for="onpackage{{$package->id}}">{{$package->title}}</label>
                    </li>
                  @endforeach
                  {{-- <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="plaids"
                           name="fabrics">
                    <label class="form-check-label" for="plaids">plaids</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="herringbone"
                           name="fabrics">
                    <label class="form-check-label" for="herringbone">herringbone</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="houndstooth"
                           name="fabrics">
                    <label class="form-check-label" for="houndstooth">houndstooth</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="donegal"
                           name="fabrics">
                    <label class="form-check-label" for="donegal">donegal</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="pattern"
                           name="fabrics">
                    <label class="form-check-label" for="pattern">pattern</label>
                  </li> --}}
                </ul>
              </div>
            </div>
            <div class="pe-3 mb-3">
              <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle w-100 d-flex
          justify-content-center align-items-center text-uppercase"
                        data-bs-toggle="dropdown">
                  Price
                  <i class='bx bx-chevron-down ms-3'></i>
                </button>
                <ul class="dropdown-menu text-uppercase">
                  <li class="dropdown-item">
                    <input type="radio" class="form-check-input me-3 m-0" id="low"
                           name="fabrics" value="0">
                    <label class="form-check-label" for="low">lowest to highest</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="radio" class="form-check-input me-3 m-0" id="high"
                           name="fabrics" value="1">
                    <label class="form-check-label" for="high">highest to lowest</label>
                  </li>
                  {{-- <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="legacy"
                           name="fabrics">
                    <label class="form-check-label" for="legacy">legacy</label>
                  </li> --}}
                </ul>
              </div>
            </div>
            <div class="fabric-filter">
              <button class="btn bg-gold rounded-0" onclick="advance_filter()"><a
                  href="#" class="text-navy text-uppercase">Start Filter</a>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="row g-0 mb-4">
      <div
        class="col-3 col-md-2 pt-3 d-flex justify-content-between align-items-center sticky-top
        flex-column"
        style="height: 100vh;">
        <div class="box-menu">
          <a href="#fitting" class="box center-flex box-select">Fitting</a>
          <a href="#fabric" class="box center-flex">Fabric</a>
          @foreach($top_cates as $top_cate)
          <a href="#jacket" class="box center-flex">{{$top_cate->name}}</a>
          @endforeach
          <a href="#pant" class="box center-flex">Pants</a>
        </div>
        <a href="#" class="btn bg-gold lh-sm p-0 py-2 text-navy text-uppercase rounded-0
        d-block d-md-none mb-5"
           style="font-size: 10px;">Next Step</a>
      </div>
      @include('layouts/choose_fitting')
      @include('layouts/choose_fabric')
      @include('layouts/choose_jacket')
      @include('layouts/choose_vest')
      @include('layouts/choose_pants')
      <div
        class="col-md-2 pt-3 d-flex align-items-center justify-content-between sticky-top
        flex-column d-none d-md-inline-flex"
        style="height: 98vh;">
        <div class="price">
          <span class="me-3 text-gold fs-5">$</span><h4 class="d-inline ff-mont ls-0">289</h4>
        </div>
        <div class="action mb-4">
          <a href="#" class="btn bg-gold lh-sm text-navy text-uppercase rounded-0
        d-none d-md-block mb-5">Next Step</a>
        </div>
      </div>
    </div>
  </section>

  <button onclick="topFunction()" id="scrollBtn" title="Go to top" class="d-flex
    justify-content-center align-items-center">
    <i class="bx bx-arrow-back bx-rotate-90"></i>
  </button>
  @include('layouts/footer')
  {{--  @include('layouts/fabrics_popup')--}}
  {{--    @include('layouts/scrollTop')--}}
@endsection
@push('script_tag')
  <script src="{{asset('css/SelectJs/select2.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
  <script>

    /*let items = ['#fitting', '#fabric', '#jacket', '#vest', '#pant']
    let current_index = items.at(1);
    console.log(items.at(1))
    $('#next-step').attr('href', current_index);
    let i = 1;*/

    $('.content').first().show();

    $('.box-menu a').click(function (e) {
      let current_link = $(this);
      let current_link_href = current_link.attr('href');

      $('.box-menu a').removeClass('box-select');
      $(this).addClass('box-select');

      $('.content').hide();
      $(current_link_href).show();

      /*
      // current_index = items.indexOf(current_link_href);
      // $('#next-step').attr('href', items.at(current_index+1));
      console.log(i)

      if ($(this).attr('href') === '' && $('#next-one').attr('href') === '') {
        current_link_href = items.at(i);
        $(this).attr('href', current_link_href)
        console.log(current_link_href)
        $(current_link_href).show();
        $(this).addClass('box-select');
        i = 2
      } else {
        current_link_href = items.at(i);
        console.log(current_link_href)
        $(this).attr('href', current_link_href)
        $('.content').hide();
        $(current_link_href).show();
        $(this).addClass('box-select');
        i++
      }
      */
      e.preventDefault();
    });


    /*// For diff section
    $('#fabric-div').hide();
    $('#jacket-div').hide();
    $('#fabric-filter').hide();
    const fitting = $('#fitting')
    const fabric = $('#fabric')
    const jacket = $('#jacket')
    jacket.click(() => {
      fitting.removeClass('box-select')
      $('#fabric-div').hide();
      fabric.removeClass('box-select')
      $('#jacket-div').show();
      $('#cfTitle').html('')
    })

    fabric.click(() => {
      $('#fitting-div').hide();
      fitting.removeClass('box-select')
      $('#fabric-div').show();
      fabric.addClass('box-select')
      $('#fabric-filter').show();
      $('#cfTitle').html('Fabric Selection')
    })*/

    // begin  infinite scroll
    var ENDPOINT = "{{ url('/') }}";
    var page = 1;
    var start = 0;
    var pageNo = 0;
    infinteLoadMore(page)
    $(window).scroll(function () {
      // console.log("work scroll function!!");
      if ($(window).scrollTop() + $(window).height() >= ($(document).height() - 200)) {
        console.log("work scroll function inside!!page = " + page);
        page++;
        start = (page * 6) - 6;
        // console.log('Page = ' + page);
        infinteLoadMore(page);
      }
    })

    function infinteLoadMore(page) {
      alert("hello load more");
      var grand_id = $('#GrandID').val();
      var filter_key = $('#GrandID_filter_key').val();
      var mobile = $('#GrandID_mobile').val();
      var i = 0;
      // alert(filter_key);
      var colorjs = @json($colors);
      var texturejs = @json($textures);
      var patternjs = @json($patterns);
      var packagejs = @json($packages);
      var colorjs_arr = [];
      var texturejs_arr = [];
      var patternjs_arr = [];
      var pricejs_arr = [];
      var packagejs_arr = [];
      var i = 0;

      for (i = 0; i < colorjs.length; i++) {
        if ($('#oncolor' + colorjs[i].id).is(":checked")) {
          // it is checked
          colorjs_arr.push($('#oncolor' + colorjs[i].id).val());
        }
      }
      for (i = 0; i < texturejs.length; i++) {
        if ($('#ontexture' + texturejs[i].id).is(":checked")) {
          // it is checked
          texturejs_arr.push($('#ontexture' + texturejs[i].id).val());
        }
      }
      for (i = 0; i < patternjs.length; i++) {
        if ($('#onpattern' + patternjs[i].id).is(":checked")) {
          // it is checked
          patternjs_arr.push($('#onpattern' + patternjs[i].id).val());
        }
      }
      for (i = 0; i < packagejs.length; i++) {
        if ($('#onpackage' + packagejs[i].id).is(":checked")) {
          // it is checked
          packagejs_arr.push($('#onpackage' + packagejs[i].id).val());
        }
      }
      if ($('#low').is(":checked")) {
        // it is checked
        pricejs_arr.push($('#low').val());
      }
      if ($('#high').is(":checked")) {
        // it is checked
        pricejs_arr.push($('#high').val());
      }
      console.log(packagejs_arr);
      // console.log(colorjs_arr);
      // console.log(texturejs_arr);
      // console.log(patternjs_arr);
      // console.log(pricejs_arr);
      $.ajax({
        url: ENDPOINT + "/chooseFabric?page=" + page,
        datatype: "html",
        type: "get",
        history: false,
        data: {
          "_token": "{{csrf_token()}}",
          "colors": colorjs_arr,
          "types": texturejs_arr,
          "patterns": patternjs_arr,
          "prices": pricejs_arr,
          "packages": packagejs_arr,
          "start": start
        },
        beforeSend: function () {
          $('.auto-load').show();
        }

      })
        .done(function (response) {
          alert(response);
          // console.log("PAGE"+response.page_no);

          console.log(response.res.length);
          // console.log("step1");
          if (response.res.length == 0) {
            $('.auto-load').html("");
            return;
          }

          // pageNo = response.page_no;
          $('.auto-load').hide();
          $("#grand-space").append(response.res)

          // $("#myModal").modal()
        })

        .fail(function (jqXHR, ajaxOptions, thrownError) {
          console.log('Server error occured');
        });


    }

    // end infinite scroll
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function () {
      $('.sorting').select2({
        minimumResultsForSearch: Infinity
      });
      $('.sorting-nav').select2({
        minimumResultsForSearch: Infinity
      });


    });


    // scroll function
    let scrollBtn = document.getElementById("scrollBtn");
    window.onscroll = function () {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 400) {
        scrollBtn.style.display = "block";
        scrollBtn.style.opacity = "1";
        scrollBtn.style.pointerEvents = "all";
        // scrollBtn.style.transform = "scale(1)";
      } else {
        scrollBtn.style.display = "none";
        scrollBtn.style.opacity = "0";
        scrollBtn.style.pointerEvents = "none";
        // scrollBtn.style.transform = "scale(1)";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }

    // end scroll function
    // start advance filter
    function advance_filter() {
      $('#grand-space').html("");
      page = 1;
      start = 0;
      infinteLoadMore(page);
    }

    // end advance filter
  </script>
@endpush


