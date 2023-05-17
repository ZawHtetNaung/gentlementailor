@extends('layouts.header')
@push('styles')
  <link href="{{asset('css/SelectCss/select2.min.css')}}" rel="stylesheet"/>
  <link href="{{ asset('css/fabric.css') }}" rel="stylesheet">
@endpush
@section('content')
  @include('layouts/nav')
  <section class="breadcrumb py-2">
    <div style="--bs-breadcrumb-divider: '<';" aria-label="breadcrumb">
      <ol class="breadcrumb center-flex flex-row mb-0">
        <li>
          <a href="/" class="me-3 center-flex pt-1"><i class='bx bx-arrow-back'></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          <a href="/fabrics" class="text-uppercase">Fabrics</a>
        </li>
      </ol>
    </div>
  </section>

  <section class="fabrics row g-0">
    <div class="col-md-3 px-2 d-none d-md-block">
      <h6 class="mb-5 fw-700 text-white-70">category</h6>
      <input type="hidden" name="" id="grand_id">
      <div>
        <details class="mb-3 text-uppercase">
          {{--<i class="fa-thin fa-circle-0"></i>--}}
          <summary class="d-flex align-items-center justify-content-between">
            <p class="text-gold" onclick="get_all_grand()">All Categories</p>
            {{-- <i class="fa-solid fa-plus"></i> --}}
          </summary>
        </details>
        @foreach($mains as $main)
          <details class="mb-3 text-uppercase">
            {{--<i class="fa-thin fa-circle-0"></i>--}}
            <summary class="d-flex align-items-center justify-content-between">
              <p class="text-gold">{{$main->name}}</p>
              <i class='bx bx-plus'></i>
            </summary>
            <div class="cat-links">
              @foreach($subs as $sub)
                @if($sub->main_texture_id == $main->id)
                  <div class="form-check mb-2">
                    <input type="radio" class="form-check-input"
                           id="{{$sub->id}}" name="category"
                           value="{{$sub->id}}"
                           onclick="get_grand('{{$sub->id}}','{{$main->name}}')">
                    <label class="form-check-label"
                           for="{{$sub->id}}">{{$sub->name}}</label>
                  </div>
                @endif
              @endforeach
            </div>
          </details>
        @endforeach
      </div>
    </div>
    <div class="d-block d-md-none d-lg-none mb-4">
      <div class="d-flex justify-content-between">
        {{--                <select class=" text-uppercase sorting-nav"--}}
        {{--                        aria-label="Sorting" id="mobile_all" onchange="get_all_grand_mobile()">--}}
        {{--                    <option value="0" selected class="text-dark">Category</option>--}}
        {{--                    --}}{{--@foreach($mains as $main)--}}
        {{--                        <option value="{{$main->id}}" class="text-dark">{{$main->name}}</option>--}}
        {{--                    @endforeach--}}
        {{--                </select>--}}
        <div class="category dropdown position-static">
          <a class="dropdown-toggle text-uppercase" type="button"
             data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
            <span style="font-size: 13px">Category</span>
          </a>
          <div class="dropdown-menu text-uppercase rounded-0 border border-0 mt-2 px-3">
            <p class="dropdown-item-text text-white smaller-text p-0 mt-3 mb-2">
              Category
            </p>
            <details class="mb-2 text-uppercase">
              {{--<i class="fa-thin fa-circle-0"></i>--}}
              <summary class="d-flex align-items-center justify-content-between">
                <p class="text-gold" onclick="get_all_grand()">All Categories</p>
                {{-- <i class="fa-solid fa-plus"></i> --}}
              </summary>
            </details>
            @foreach($mains as $main)
              <details class="mb-2 text-uppercase">
                {{--<i class="fa-thin fa-circle-0"></i>--}}
                <summary class="d-flex align-items-center justify-content-between">
                  <p class="text-gold">{{$main->name}}</p>
                  <i class='bx bx-plus'></i>
                </summary>
                <div class="cat-links">
                  @foreach($subs as $sub)
                    @if($sub->main_texture_id == $main->id)
                      <div class="form-check mb-2 d-flex align-items-center">
                        <input type="radio" class="form-check-input"
                               id="cat-{{$sub->id}}" name="category"
                               value="{{$sub->id}}"
                               onclick="get_grand('{{$sub->id}}','{{$main->name}}')">
                        <label class="form-check-label ms-2"
                               for="cat-{{$sub->id}}">{{$sub->name}}</label>
                      </div>
                    @endif
                  @endforeach
                </div>
              </details>
            @endforeach
          </div>
        </div>
        <div class="filter dropdown">
          <a class="dropdown-toggle" type="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            <i class='bx bx-filter icon'></i>
          </a>
          <ul class="dropdown-menu text-uppercase rounded-0 border border-0 mt-2">
            <li class="dropdown-item-text text-white smaller-text">
              sorting
            </li>
            <li class="dropdown-item form-check d-flex flex-row-reverse justify-content-between"
                >
              <input class="form-check-input" type="radio" id="popular"
                     name="sorting" checked onclick="filter_grand_mobile(0)">
              <label class="form-check-label w-100" for="popular">
                popular
              </label>
            </li>
            <li class="dropdown-item form-check d-flex flex-row-reverse justify-content-between"
               >
              <input class="form-check-input" type="radio" id="latest" name="sorting"  onclick="filter_grand_mobile(1)">
              <label class="form-check-label w-100" for="latest">
                Latest
              </label>
            </li>

            <li class="dropdown-item form-check d-flex flex-row-reverse justify-content-between" >

              <input class="form-check-input" type="radio" id="lowest" name="sorting" onclick="filter_grand_mobile(2)">
              <label class="form-check-label w-100" for="lowest">
                lowest
              </label>
            </li>
            <li class="dropdown-item form-check d-flex flex-row-reverse justify-content-between"
                >
              <input class="form-check-input" type="radio" id="highest"
                     name="sorting" onclick="filter_grand_mobile(5)">
              <label class="form-check-label w-100" for="highest">
                highest
              </label>
            </li>

            <li class="dropdown-item form-check d-flex flex-row-reverse justify-content-between">
              <input class="form-check-input" type="radio" id="warm"

                     name="sorting"  onclick="filter_grand_mobile(3)">
              <label class="form-check-label w-100" for="warm">
                warm
              </label>
            </li>
            <li class="dropdown-item form-check d-flex flex-row-reverse justify-content-between">
              <input class="form-check-input" type="radio" id="cool"

                     name="sorting" onclick="filter_grand_mobile(4)">
              <label class="form-check-label w-100" for="cool">
                cool
              </label>
            </li>

          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-9 ps-0 px-0 px-lg-5 px-md-3">
      <h6 class="ff-mont mb-2 text-uppercase" id="header_space">Fabrics & Textures</h6>
      <div class="d-flex justify-content-between text-uppercase mb-3 mb-lg-5 flex-wrap">
        <p class="mb-2"> soft, warm, and strong feelings</p>
        <div class="d-none d-md-block">
          <div class="d-flex">
            <p class="me-3">Sorting: </p>
            <select class="text-uppercase text-white bg-black sorting"
                    id="filterGrand"
                    aria-label="Sorting" onchange="filter_grand()">
              <option value="0" selected class="text-dark">Popular</option>
              <option value="1" class="text-dark">Latest</option>
              <option value="2" class="text-dark">Lowest</option>
              <option value="5" class="text-dark">Highest</option>
              <option value="3" class="text-dark">Warm</option>
              <option value="4" class="text-dark">Cool</option>
            </select>
          </div>
        </div>
      </div>
      {{-- <div class="row g-3 g-md-5 mb-5" id="grand_space">
      </div> --}}
      <input type="hidden" id="GrandID">
      <input type="hidden" id="GrandID_filter_key">
      <input type="hidden" id="GrandID_mobile">
        <div class="row g-3 g-md-5 mb-5" id="grand_space" style="max-width:900px">
          {{-- @foreach($grands as $grand)
            <div class="col-6 col-lg-4 mb-0 text-uppercase cursor-pointer text-center
          card bg-transparent border border-0"
                 data-bs-toggle="modal"
                 data-bs-target="#myCategory{{$grand->id}}"
                 onclick="increase_count({{$grand->id}})">
              <img src="{{asset('/assets/images/categories/texture/'.$grand->photo_one)}}"
                   alt="" class="card-img-top">
              <div class="card-body">
                <p class="mt-2 mb-0 mb-md-2 small-text fabric-text">
                  {{$grand->name}}</p>
              </div>
              <div class="d-flex flex-column card-footer">
                <p class="small-text text-gold">$ {{$grand->price}}</p>
              </div>
            </div>

          @endforeach --}}


        </div>
        @foreach($grands_all as $grand)
        {{--start popup --}}
        <div class="modal fade" id="myCategory{{$grand->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-md-down" tabindex="-1">
              <div class="fabric-pop modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header border border-0 bg-na">
                      <button type="button" class="btn-close center-flex pt-4"
                              data-bs-dismiss="modal"><i
                              class="bx bx-x icon"></i></button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                      <h5 class="ff-mont text-white text-uppercase mb-5 text-wrap">{{$grand->name}}</h5>
                      {{-- <input type="text" name="grandID" id="grandID{{$grand->id}}">
                      <span class="text-white" onclick="alerting()">{{$grand->id}}</span> --}}
                      <div class="row">
                          <div class="col-md-6 pe-5 order-2 order-md-1">
                              <p class="small-text mb-3 mb-md-5 text-wrap">{{$grand->description}}</p>
                              <div class="row mb-4 text-uppercase">
                                  <div class="col-md-6">
                                      <div class="d-flex align-items-center mb-2">
                                          <i class="bx bx-check text-gold me-3"></i>
                                          <p class="smaller-text">Made in : {{$grand->made_in}}</p>
                                      </div>
                                      <div class="d-flex align-items-center mb-2">
                                          <i class="bx bx-check text-gold me-3"></i>
                                          <p class="smaller-text">colour : {{$grand->color->name}}</p>
                                      </div>
                                    <div class="d-flex align-items-center mb-2">
                                      <i class="bx bx-check text-gold me-3"></i>
                                      <p class="smaller-text">Fabric Type :
                                        @if($grand->warm_rating != 0)
                                        Warm ( {{$grand->warm_rating}} %)
                                        @elseif($grand->cool_rating != 0)
                                        Cool ( {{$grand->cool_rating}} %)
                                        @endif
                                      </p>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                      <i class="bx bx-check text-gold me-3"></i>
                                      <p class="smaller-text">Price :
                                        $ {{$grand->price}}</p>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="d-flex align-items-center mb-2">
                                          <i class="bx bx-check text-gold me-3"></i>
                                          <p class="smaller-text">composition
                                              : {{$grand->composition}}</p>
                                      </div>
                                      <div class="d-flex align-items-center mb-2">
                                          <i class="bx bx-check text-gold me-3"></i>
                                          <p class="smaller-text">softness : {{$grand->softness}}</p>

                                      </div>
                                    <div class="d-flex align-items-center mb-2">
                                      <i class="bx bx-check text-gold me-3"></i>
                                      <p class="smaller-text">Threating : {{$grand->threating}}
                                        Sq.ft</p>
                                    </div>
                                  </div>
                              </div>
                              @if(isset(Auth::guard('web')->user()->id))
                              <div class="d-flex align-items-center text-uppercase lh-0 mb-4"
                                   onclick="add_to_favourite('{{$grand->id}}')" style="cursor:pointer">
                                  <i class="bx bx-heart me-3"></i>
                                  <p class="small-text">Add to favourite fabric list</p>
                              </div>
                              @else
                              <a type="button"  data-bs-toggle="modal"
                              data-bs-target="#exampleModal">
                              <div class="d-flex align-items-center text-uppercase lh-0 mb-4"
                                    style="cursor:pointer">
                                  <i class="bx bx-heart me-3"></i>
                                  <p class="small-text">Add to favourite fabric list</p>
                              </div>
                              </a>
                              @endif
                              <div class="row">
                                <div class="col-6 col-md-6">
                                  <form action="{{route('payment')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="amount" value="{{$grand->price}}">
                                    <button type="submit" class="btn btn-warning my-3 fw-bold"><img style="display: inline!important;width:1.5vw" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAatJREFUSEvNluExBEEQhb+LABEgAkSACBABIkAEiAARIAIyQAZEgAgQAfVV7VaNuZmdmXVVp6vuz233vOnXr7tnwpxsMidc/j3wFvBdYOephb2ajG+A/cpD74ET4K3kXwP8CGyWDgq+fwLbwPNQTA2wBy00AOtqxqt/AV4EPhpBe/eNoaxLGSuqh5HA0m2ZklYCPgYuRgKbsZRbqikrAZ8BpyOAv4CVji0v0Azcquge4Laj+RrYA2yzX1bKWKqWR2Ssor20seeAzDUBl6ZV6k6HgN3Qa6MZuFXR1lUxylLYCV7E6Ved8S5wF/l7eDyRBJJWf0cdeBi2lFL2UI1Tilah0hiWQGbWAS8amyI7aFW1StwJgsxWgNdKsfUt1dzHUroWgLj2ZKFmkr13DGQXxRDVsaKvulrlBspL910hTYmpVlxOnZhS96xUh7t5kM6hkuQyTrWSQ1+qw90s/fo2Ww44pWjbIl6R0m/vNlsO2NaID/S/GFj6L5tRoemVmaM/u3PH1DgVk9rNLoPiw651gMT+TixV3ZuDYfBBN6uMx5QyG1PaxzMFCw+bG/APw0VRH67OIJoAAAAASUVORK5CYII="/>PayPal</button>
                                    </form>
                                </div>
                                <div class="col-6 col-md-6" style="padding-top:1vw">
                                  @if(isset(Auth::guard('web')->user()->id))
                                  <button class="btn btn-success fw-bold" onclick="add_to_cart('{{$grand->id}}','{{$grand->price}}')">Add To Cart</button>
                                  @else
                                  <button type="button" class="btn btn-secondary fw-bold" data-bs-toggle="modal"
                                  data-bs-target="#exampleModal">Add To Cart</button>
                                  @endif
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6 order-1 order-md-2" id="swiper-space{{$grand->id}}">
                    </div>
                </div>

            </div>
        </div>
    </div>
  </div>
        {{-- end popup --}}
        @endforeach
        <div class="auto-load text-center">
            <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                <path fill="#000"
                    d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                        from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                </path>
            </svg>
        </div>
      <div class="ajax-load text-center" style="display: none">
        <p><img src="{{asset('assets/images/load-loading.gif')}}"/> Loading More Fabrics</p>
      </div>
    </div>
  </section>

  <button onclick="topFunction()" id="scrollBtn" title="Go to top" class="d-flex
    justify-content-center align-items-center">
    <i class="bx bx-arrow-back bx-rotate-90"></i>
  </button>
  {{-- @include('layouts/fabrics_popup') --}}
  @include('layouts/footer')
  {{--    @include('layouts/scrollTop')--}}
@endsection
@push('script_tag')
  <script src="{{asset('css/SelectJs/select2.min.js')}}"></script>
  <script>
  var ENDPOINT = "{{ url('/') }}";
    var page = 1;
    var pageNo = 0;
    infinteLoadMore(page)
    $(window).scroll(function(){
      if($(window).scrollTop() + $(window).height() >= ($(document).height()-500)){
        page++;


        console.log('Page = '+ page);
        // if(page <= pageNo)
        // {
        //   infinteLoadMore(page);
        // }
        if(pageNo != null)
        {
          console.log("trueeeee");
          if(page <= pageNo)
          {
          infinteLoadMore(page);
          }
        }
        else{
          console.log("saut");
          infinteLoadMore(page);
        }
      }
    })
    function infinteLoadMore(page) {
      // alert("nononono");

      var grand_id = $('#GrandID').val();
      var filter_key = $('#GrandID_filter_key').val();
      var mobile = $('#GrandID_mobile').val();
      var i=0;
      // alert(filter_key);


        $.ajax({
                url: ENDPOINT + "/fabrics?page=" + page,
                datatype: "html",
                type: "get",
                history:false,
                data: {
                  "_token": "{{csrf_token()}}",
                  "grand_id":grand_id,
                  "filter_key":filter_key,
                  "mobile": mobile
                },
                beforeSend: function () {
                    $('.auto-load').show();
                }

            })
            .done(function (response) {
              // alert(response.length);
                // console.log("PAGE"+response.page_no);
                if(response.page_no != null)
                {
                  console.log("page from controller = "+response.page_no);
                  pageNo = response.page_no;
                  page = response.page_no;
                }
                else
                {
                  console.log("Opposite page is null");
                  pageNo = null;
                }
                console.log(response.res.length);
                // console.log("step1");
                  if (response.res.length == 0) {
                      $('.auto-load').html("");
                      return;
                  }

              // pageNo = response.page_no;
              $('.auto-load').hide();
              $("#grand_space").append(response.res)

                // $("#myModal").modal()
            })

            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });


    }
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function () {
      $('.sorting').select2({
        minimumResultsForSearch: Infinity
      });
      $('.sorting-nav').select2({
        minimumResultsForSearch: Infinity
      });


    });
    function get_all_grand() {
      window.location.reload();
    }

    function get_all_grand_mobile() {
      var type = $('#mobile_all').val();
      // alert($('#mobile_all').val());
      if (type == 0) {
        window.location.reload();
      }
    }

    function get_grand(value, name) {
      // $('.scrolling-pagination').hide();
      // alert(value);
      $('#grand_space').html("");
      page = 1;
      var htmlheader = "";
      htmlheader = `${name}`;
      $('#GrandID').val(value);
      $('#header_space').html(htmlheader);
      infinteLoadMore(page)

      // $('#grand_id').val(value);
      // $.ajax({
      //   type: 'post',
      //   url: '/get_grand_data_ajax',
      //   data: {
      //     "_token": "{{csrf_token()}}",
      //     "grand_id": value,
      //   },
      //   success: function (data) {

      //     console.log(data.grands);
      //     var html = "";
      //     var i = 0;
      //     if (data.grands.length == 0) {
      //       html += `<span class="fw-bold text-white text-center">***No Data Available!!***</span>`
      //     } else {
      //       for (i = 0; i < data.grands.length; i++) {
      //         console.log(data.grands[i].photo_one);
      //         html += `
      //               <div class="col-6 col-lg-4 mb-5 text-uppercase cursor-pointer text-center
      //               card bg-transparent border border-0"
      //               data-bs-toggle="modal"
      //                    data-bs-target="#myCategory${data.grands[i].id}" id="#myCategory${data.grands[i].id}" onclick="increase_count('${data.grands[i].id}')">
      //                   <img src="{{asset('/assets/images/categories/texture/${data.grands[i]
      //                   .photo_one}')}}" alt="" class="card-img-top">
      //                   <div class="card-body">
      //                   <p class="mt-3 mb-2 small-text fabric-text">
      //                       ${data.grands[i].name}</p>
      //                       </div>
      //                   <div class="d-flex justify-content-evenly card-footer">
      //                       <p class="small-text text-gold">$ ${data.grands[i].price}</p>

      //                   </div>
      //               </div>
      //               `
      //       }
      //     }
      //     $('#grand_space').html(html);

      //   }
      // });
    }

    function filter_grand_mobile(value)
    {
      // alert(value);

      var html = "";
      var filter_key = $('#grand_id').val();
      if (value == 0) {
        var filter = 0;
      } else if (value == 1) {
        var filter = 1;
      } else if (value == 2) {
        var filter = 2;
      } else if (value == 3) {
        var filter = 3;
      } else if (value == 4) {
        var filter = 4;
      } else if (value == 5) {
        var filter = 5;
      }
      // alert($('#filterGrand').val());
      if ($.trim(filter_key) == '') {
        $('#GrandID_filter_key').val(filter);
        $('#grand_space').html("");
        page=1;
        infinteLoadMore(page);
        // $.ajax({
        //   type: 'POST',
        //   url: '/get_filter_grand_data_ajax',
        //   data: {
        //     "_token": "{{csrf_token()}}",
        //     "filter_id": filter,
        //   },
        //   success: function (data) {
        //     for (i = 0; i < data.grands.length; i++) {
        //       console.log(data.grands[i].photo_one);
        //       html += `
        //                 <div class="col-6 col-md-4 mb-5 text-uppercase cursor-pointer text-center
        //                  card bg-transparent border border-0"
        //                 data-bs-toggle="modal"
        //                      data-bs-target="#myCategory${data.grands[i].id}" onclick="increase_count('${data.grands[i].id}')">
        //                     <img src="{{asset('/assets/images/categories/texture/${data.grands[i]
        //                     .photo_one}')}}" alt="" class="card-img-top">
        //                     <div class="card-body">
        //                     <p class="mt-3 mb-2 small-text fabric-text">
        //                         ${data.grands[i].name}</p>
        //                         </div>
        //                     <div class="d-flex justify-content-evenly card-footer">
        //                         <p class="small-text text-gold">$ ${data.grands[i].price}</p>

        //                     </div>
        //                 </div>
        //                 `
        //     }
        //     $('#grand_space').html(html);
        //   }
        // })
      } else {
        $('#GrandID_filter_key').val(filter);
        $('#GrandID_mobile').val(filter);
        $('#grand_space').html("");
        page=1;
        infinteLoadMore(page);
        // $.ajax({
        //   type: 'POST',
        //   url: '/get_filter_grand_key_data_ajax',
        //   data: {
        //     "_token": "{{csrf_token()}}",
        //     "filter_id": filter,
        //     "grand_id": filter_key
        //   },
        //   success: function (data) {
        //     for (i = 0; i < data.grands.length; i++) {
        //       console.log(data.grands[i].photo_one);
        //       html += `
        //                 <div class="col-6 col-md-4 mb-5 text-uppercase cursor-pointer text-center
        //                  card bg-transparent border border-0"
        //                 data-bs-toggle="modal"
        //                      data-bs-target="#myCategory${data.grands[i].id}" onclick="increase_count('${data.grands[i].id}')">
        //                     <img src="{{asset('/assets/images/categories/texture/${data.grands[i]
        //                     .photo_one}')}}" alt="" class="card-img-top">
        //                     <div class="card-body">
        //                     <p class="mt-3 mb-2 small-text fabric-text">
        //                         ${data.grands[i].name}</p>
        //                         </div>
        //                     <div class="d-flex justify-content-evenly card-footer">
        //                         <p class="small-text text-gold">$ ${data.grands[i].price}</p>
        //                     </div>
        //                 </div>
        //                 `
        //     }
        //     $('#grand_space').html(html);
        //   }
        // })
      }
    }

    function filter_grand() {
      // alert("filter_grand_desktop");
      var html = "";
      var filter_key = $('#grand_id').val();
      if ($('#filterGrand').val() == 0) {
        var filter = 0;
      } else if ($('#filterGrand').val() == 1) {
        var filter = 1;
      } else if ($('#filterGrand').val() == 2) {
        var filter = 2;
      } else if ($('#filterGrand').val() == 3) {
        var filter = 3;
      } else if ($('#filterGrand').val() == 4) {
        var filter = 4;
      } else if ($('#filterGrand').val() == 5) {
        var filter = 5;
      }
      // alert($('#filterGrand').val());
      if ($.trim(filter_key) == '') {
        // alert("function filter");
        $('#GrandID_filter_key').val(filter);
        $('#grand_space').html("");
        page=1;
        infinteLoadMore(page);
        // $.ajax({
        //   type: 'POST',
        //   url: '/get_filter_grand_data_ajax',
        //   data: {
        //     "_token": "{{csrf_token()}}",
        //     "filter_id": filter,
        //   },
        //   success: function (data) {
        //     for (i = 0; i < data.grands.length; i++) {
        //       console.log(data.grands[i].photo_one);
        //       html += `
        //                 <div class="col-6 col-lg-4 mb-5 text-uppercase cursor-pointer text-center
        //                  card bg-transparent border border-0"
        //                 data-bs-toggle="modal"
        //                      data-bs-target="#myCategory${data.grands[i].id}" onclick="increase_count('${data.grands[i].id}')">
        //                     <img src="{{asset('/assets/images/categories/texture/${data.grands[i]
        //                     .photo_one}')}}" alt="" class="card-img-top">
        //                     <div class="card-body">
        //                     <p class="mt-3 mb-2 small-text fabric-text">
        //                         ${data.grands[i].name}</p>
        //                         </div>
        //                     <div class="d-flex justify-content-evenly card-footer">
        //                         <p class="small-text text-gold">$ ${data.grands[i].price}</p>

        //                     </div>
        //                 </div>
        //                 `
        //     }
        //     $('#grand_space').html(html);
        //   }
        // })
      } else {
        $('#GrandID_filter_key').val(filter);
        $('#grand_space').html("");
        page=1;
        infinteLoadMore(page);


        // $.ajax({
        //   type: 'POST',
        //   url: '/get_filter_grand_key_data_ajax',
        //   data: {
        //     "_token": "{{csrf_token()}}",
        //     "filter_id": filter,
        //     "grand_id": filter_key
        //   },
        //   success: function (data) {
        //     for (i = 0; i < data.grands.length; i++) {
        //       console.log(data.grands[i].photo_one);
        //       html += `
        //                 <div class="col-6 col-lg-4 mb-5 text-uppercase cursor-pointer text-center
        //                  card bg-transparent border border-0"
        //                 data-bs-toggle="modal"
        //                      data-bs-target="#myCategory${data.grands[i].id}" onclick="increase_count('${data.grands[i].id}')">
        //                     <img src="{{asset('/assets/images/categories/texture/${data.grands[i]
        //                     .photo_one}')}}" alt="" class="card-img-top">
        //                     <div class="card-body">
        //                     <p class="mt-3 mb-2 small-text fabric-text">
        //                         ${data.grands[i].name}</p>
        //                         </div>
        //                     <div class="d-flex justify-content-evenly card-footer">
        //                         <p class="small-text text-gold">$ ${data.grands[i].price}</p>
        //                     </div>
        //                 </div>
        //                 `
        //     }
        //     $('#grand_space').html(html);
        //   }
        // })
      }

    }

    // scroll function
    let scrollBtn = document.getElementById("scrollBtn");
    window.onscroll = function () {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
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
    $(document).ready(function () {

    })

    function increase_count(value) {
      // alert();
      //start swiper
      var html = "";

      //end swiper
      $('#grandID' + value).val(value);
      $.ajax({
        type: 'POST',
        url: '/increase_count_texture',
        data: {
          "_token": "{{csrf_token()}}",
          "grand_id": value
        },
        success: function (data) {
          // start swiper
          console.log(data.textures.photo_one);
          html += `
                <div class="swiper mySwiper2 mb-3" id="mySwiper2${data.textures.id}">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="assets/images/categories/texture/${data.textures
            .photo_one}" class="card-img-top"/>
                        </div>`;
                        if(data.textures.photo_two != null)
                        {
                          html+=`
                        <div class="swiper-slide">
                            <img src="assets/images/categories/texture/${data.textures
            .photo_two}" class="card-img-top"/>
                        </div>`;
                      }
                      if(data.textures.photo_two != null)
                        {
                          html+=`
                        <div class="swiper-slide">
                            <img src="assets/images/categories/texture/${data.textures
            .photo_three} class="card-img-top""/>
                        </div>`
                      }
                      html+=`
                    </div>
                </div>
                <div thumbsSlider="" class="swiper mySwiper d-none d-md-block"
                        id="mySwiper${data.textures.id}">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="assets/images/categories/texture/${data.textures
            .photo_one}" />
                        </div>`;
          if (data.textures.photo_two != null) {
            html += `
                        <div class="swiper-slide">
                            <img src="assets/images/categories/texture/${data.textures
              .photo_two}" />
                        </div>`
          }
          if (data.textures.photo_three != null) {
            html += `<div class="swiper-slide">
                            <img src="assets/images/categories/texture/${data.textures
              .photo_three}" />
                        </div>`
          }
          html += `
                    </div>
                </div>
                `;
          $('#swiper-space' + value).html(html);
          const swiper = new Swiper("#mySwiper" + value, {
            // loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
          });
          const swiper2 = new Swiper("#mySwiper2" + value, {
            loop: true,

            spaceBetween: 10,
            thumbs: {
              swiper: swiper,
            },
            breakpoints: {
              // when window width is >= 320px
              0: {
                slidesPerView: 1.7,
                spaceBetween: 15
              },
              769: {
                slidesPerView: 1,
                spaceBetween: 15
              },
            }
          });
          //end swiper
        }
      });
    }
    function add_to_favourite(value) {
      $.ajax({
        type: 'POST',
        url: '/add_to_favourite_grand',
        data: {
          "_token": "{{csrf_token()}}",
          "status": 2,
          "grand_id": value,
        },
        success: function (data) {
          console.log(data.qty);
          var html = "";
          html += `${data.qty}`;
          $('#fav-space').html(html);
          swal({
            title: "Successfully Added To Your Favourite List!",
            text: "",
            type: "success",
            icon: "success"
          }).then(function () {
            $('#myCategory' + value).modal('hide');
            ;
          });
        }
      });
    }
    function add_to_cart(value,price)
    {
      // alert(value);
      $.ajax({
      type: 'POST',
      url: '/add_to_cart_grand',
      data: {
          "_token": "{{csrf_token()}}",
          "status":2,
          "grand_id": value,
          "price" : price
      },
      success: function (data) {
        console.log(data.qty);
        var html = "";
        html+=`${data.cartqty}`;
        $('#cart-space').html(html);

        swal({
            title: "Successfully Added To Your Cart List!",
            text: "",
            type: "success",
            icon: "success"
        }).then(function() {
            $('#myCategory'+value).modal('hide');;
        });
      }
    });
    }
  </script>
@endpush


