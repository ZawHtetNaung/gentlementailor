<div class="content" id="fabric">
  <input type="hidden" id="color_filter_status" value="oncolor">
  <input type="hidden" id="fabric_filter_status" value="ontexture">
  <input type="hidden" id="pattern_filter_status" value="onpattern">
  <input type="hidden" id="package_filter_status" value="onpackage">
  <input type="hidden" id="low_price_filter_status" value="low">
  <input type="hidden" id="high_price_filter_status" value="high">
  <div class="filter-offcanva d-lg-none">
    <button class="mb-4 filter-btn" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#sideFilter" onclick="mobile_filter_status()">
      <i class='bx bx-filter-alt'></i>Filter
    </button>
  </div>
  <div id="fabric-filter" class="d-none d-lg-block">
    <div class="d-flex align-items-center flex-column mb-4">
      <div>
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
  </div>
  <div class="fabric-wrapper" id="grand-space">

  </div>
  <div class="auto-load text-center">
    <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg"
         xmlns:xlink="http://www.w3.org/1999/xlink"
         x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0"
         xml:space="preserve" style="fill:white">
              <path fill="#000"
                    d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                                  dur="1s"
                                  from="0 50 50" to="360 50 50" repeatCount="indefinite"/>
              </path>
          </svg>
  </div>
  <div class="ajax-load text-center" style="display: none">
    <p><img src="{{asset('assets/images/load-loading.gif')}}"/> Loading More Fabrics</p>
  </div>
</div>

{{-- start popup --}}
@foreach ($grand_textures as $grand)
  <div class="modal fade addi__modal" id="myFabric{{$grand->id}}">
    <div
            class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered modal-fullscreen-lg-down">
      <div class="fabric-pop modal-content">
        <!-- Modal Header -->
        <div class="modal-header border border-0 d-flex">
          <h5 class="ff-mont text-white text-uppercase text-wrap mb-0">
            {{$grand->name}}
          </h5>
          <button type="button" class="btn-close btn-close-white"
                  data-bs-dismiss="modal"></button>

        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 order-2 order-md-1 mt-4 mt-md-0">

              <p class="small-text mb-3 mb-md-5 text-wrap">{{$grand->description}}</p>
              <div class="row mb-4 text-uppercase">
                <div class="col-md-6">
                  <div class="d-flex align-items-center mb-4">
                    <i class="bx bx-check text-gold me-3"></i>
                    <p class="smaller-text">Made in : {{$grand->made_in}}</p>
                  </div>
                  <div class="d-flex align-items-center mb-4">
                    <i class="bx bx-check text-gold me-3"></i>
                    <p class="smaller-text">colour : {{$grand->color->name}}</p>
                  </div>
                  <div class="d-flex align-items-center mb-4">
                    <i class="bx bx-check text-gold me-3"></i>
                    <p class="smaller-text">Fabric Type :
                      Warm (85%)</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex align-items-center mb-4">
                    <i class="bx bx-check text-gold me-3"></i>
                    <p class="smaller-text">composition : {{$grand->composition}}</p>
                  </div>
                  <div class="d-flex align-items-center mb-4">
                    <i class="bx bx-check text-gold me-3"></i>
                    <p class="smaller-text">softness : {{$grand->softness}}</p>
                  </div>
                  <div class="d-flex align-items-center mb-4">
                    <i class="bx bx-check text-gold me-3"></i>
                    <p class="smaller-text">Price : $ {{$grand->price}}</p>
                  </div>
                </div>
              </div>
              <!--             <div class="row mt-5">

               <div class="col-6 col-md-6">

                   <button type="button" class="btn bg-gold-0 border border-0"
                           data-bs-dismiss="modal" onclick="select_fabric('{{$grand->id}}')">Select Fabric
                   </button>

               </div>
             </div>-->
              <div class="row">
                <div class="col-10 col-md-6">
                  <label for="texture_check_{{$grand->id}}" type="button"
                         class="btn bg-gold-0 rounded-0 w-100"
                         data-bs-dismiss="modal"
                         onclick="select_fabric('{{$grand->id}}','{{$grand->price}}')">Select Fabric
                  </label>
                  <div class="border border-1 px-3 mt-3 all_in">
                    {{-- <div class="form-check mb-3">
                      <input type="checkbox" id="full-suit" name="select" class="form-check-input
                      me-3">
                      <label for="full-suit" class="form-check-label">FULL SUITS</label>
                    </div> --}}
                    <div class="form-check my-3 jacket_in" id="jacket_in">
                      {{-- <input type="checkbox" id="jacket{{$grand->id}}" name="select"
                             class="form-check-input me-3 input_jacket_in" disabled> --}}
                      <label for="jacket{{$grand->id}}" class="form-check-label">JACKET</label>
                    </div>
                    <div class="form-check vest_in my-3" id="vest_in">
                      {{-- <input type="checkbox" id="vest{{$grand->id}}" name="select"
                             class="form-check-input me-3 input_vest_in" disabled> --}}
                      <label for="vest{{$grand->id}}" class="form-check-label">VEST</label>
                    </div>
                    <div class="form-check pants_in my-3" id="pants_in">
                      {{-- <input type="checkbox" id="pants{{$grand->id}}" name="select"
                             class="form-check-input me-3 input_pants_in" disabled> --}}
                      <label for="pants{{$grand->id}}" class="form-check-label">PANTS</label>
                    </div>
                  </div>
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

@endforeach
{{-- end popup --}}
{{--side filter--}}
<section class="offcanvas offcanvas-start offcanvas-lg" id="sideFilter">
  <div class="side-filter">
    <div class="fil-header">
      <h5 class="header-title">Filter</h5>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
              aria-label="Close"></button>
    </div>
    <hr>
    <div class="fil-body">
      <div class="fil-contents">
        <div class="fil-content">
          <h6 class="content-title">Fabric Type</h6>
          <div class="content-options collapsed" id="fabric_type">
            @foreach($textures as $texture)
            <div class="content-option">
              <input class="form-check-input" type="checkbox"
                     name="type" id="ontexture_mobile{{$texture->id}}" value="{{$texture->id}}">
              <label for="ontexture_mobile{{$texture->id}}" class="form-check-label">{{$texture->name}}</label>
            </div>
            @endforeach
            {{-- <div class="content-option">
              <input class="form-check-input" type="checkbox" id="wool"
                     name="type"
                     value="">
              <label for="wool" class="form-check-label">Wool</label>
            </div>
            <div class="content-option">
              <input class="form-check-input" type="checkbox" id="polyester"
                     name="type"
                     value="">
              <label for="polyester" class="form-check-label">Polyester</label>
            </div> --}}
            <div class='list-toggle'>
              <p class="expand">See More...</p>
              <p class="collapse">See Less...</p>
            </div>
          </div>
        </div>
        <div class="fil-content">
          <h6 class="content-title">Package</h6>
          <div class="content-options packages">
            @foreach($packages as $package)
            <div class="content-option">
              <input class="form-check-input price-check d-none" type="radio" id="onpackage_mobile{{$package->id}}"
                     name="package-type" value="{{$package->id}}">
              <label for="onpackage_mobile{{$package->id}}" class="package-label">{{$package->title}}</label>
            </div>
            @endforeach
            {{-- <div class="content-option">
              <input class="form-check-input price-check d-none" type="radio" id="legacy"
                     name="package-type" value="">
              <label for="legacy" class="package-label">Legacy</label>
            </div>
            <div class="content-option">
              <input class="form-check-input price-check d-none" type="radio" id="premium"
                     name="package-type" value="">
              <label for="premium" class="package-label">Premium</label>
            </div> --}}
          </div>
        </div>
        <div class="fil-content">
          <h6 class="content-title">Colour</h6>
          <div class="content-options collapsed" id="color">
            @foreach($colors as $color)
            <div class="content-option">
              <input class="form-check-input" type="checkbox" id="oncolor_mobile{{$color->id}}"
                     name="type"
                     value="{{$color->id}}">
              <label for="oncolor_mobile{{$color->id}}" class="form-check-label">{{$color->name}}</label>
            </div>
            @endforeach
            {{-- <div class="content-option">
              <input class="form-check-input" type="checkbox" id="red"
                     name="type" value="">
              <label for="red" class="form-check-label">Red</label>
            </div>
            <div class="content-option">
              <input class="form-check-input" type="checkbox" id="grey"
                     name="type"
                     value="">
              <label for="grey" class="form-check-label">Grey</label>
            </div>
            <div class="content-option">
              <input class="form-check-input" type="checkbox" id="green"
                     name="type"
                     value="">
              <label for="green" class="form-check-label">Green</label>
            </div>
            <div class="content-option">
              <input class="form-check-input" type="checkbox" id="navy"
                     name="type"
                     value="">
              <label for="navy" class="form-check-label">Navy</label>
            </div>
            <div class="content-option">
              <input class="form-check-input" type="checkbox" id="pink"
                     name="type"
                     value="">
              <label for="pink" class="form-check-label">Pink</label>
            </div> --}}

          </div>
        </div>
        <div class="fil-content">
          <h6 class="content-title">Pattern</h6>
          <div class="content-options collapsed" id="pattern">
            @foreach($patterns as $pattern)
            <div class="content-option">
              <input class="form-check-input" type="checkbox" id="onpattern_mobile{{$pattern->id}}"
                     name="type"
                     value="{{$pattern->id}}">
              <label for="onpattern_mobile{{$pattern->id}}" class="form-check-label">{{$pattern->name}}</label>
            </div>
            @endforeach
            {{-- <div class="content-option">
              <input class="form-check-input" type="checkbox" id="pattern1"
                     name="type" value="">
              <label for="pattern1" class="form-check-label">pattern 1</label>
            </div>
            <div class="content-option">
              <input class="form-check-input" type="checkbox" id="pattern2"
                     name="type" value="">
              <label for="pattern2" class="form-check-label">pattern 2</label>
            </div>
            <div class="content-option">
              <input class="form-check-input" type="checkbox" id="pattern3"
                     name="type" value="">
              <label for="pattern3" class="form-check-label">pattern 3</label>
            </div>
            <div class="content-option">
              <input class="form-check-input" type="checkbox" id="pattern4"
                     name="type" value="">
              <label for="pattern4" class="form-check-label">pattern 4</label>
            </div>
            <div class="content-option">
              <input class="form-check-input" type="checkbox" id="pattern5"
                     name="type" value="">
              <label for="pattern5" class="form-check-label">pattern 5</label>
            </div>
            <div class='list-toggle'>
              <p class="expand">See More...</p>
              <p class="collapse">See Less...</p>
            </div> --}}
              <div class='list-toggle'>
                <p class="expand">See More...</p>
                <p class="collapse">See Less...</p>
              </div>
          </div>
        </div>
        <div class="fil-content">
          <h6 class="content-title">Price</h6>
          <div class="content-options price">
            <div class="content-option">
              <input class="form-check-input" type="radio" id="low_height"
                     name="type"
                     value="">
              <label for="low_height" class="form-check-label">Lowest to highest</label>
            </div>
            <div class="content-option">
              <input class="form-check-input" type="radio" id="height_low"
                     name="type" value="">
              <label for="height_low" class="form-check-label">Highest to lowest</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="fil-footer">
      <div class="foot-action-btns">
        <button class="action-btn" data-bs-dismiss="offcanvas"
                aria-label="Close"><a href="#">Cancel</a></button>
        <button class="action-btn apply" data-bs-dismiss="offcanvas"
                aria-label="Close" onclick="advance_mobile_filter()"><a href="#">Apply</a></button>
      </div>
    </div>
  </div>
</section>
<script>
    $(".list-toggle").click(function () {
        $(this).closest(".content-options").toggleClass("collapsed").toggleClass("expanded");
    });

    function select_fabric(value, price) {
        // alert("juju");
        var package_price = parseInt(sessionStorage.getItem('package_price'));
        var jacket_total_4 = 0;
        var vest_total_4 = 0;
        var pant_total_4 = 0;

        sessionStorage.setItem('texture_id', value);
        sessionStorage.setItem('texture_price', price);

        var html_total = "";
        if(sessionStorage.getItem('jacket_id') != null)
        {
          // alert("1");
           jacket_total_4 = parseInt(sessionStorage.getItem('jacket_price'));
        }
        if(sessionStorage.getItem('vest_id') != null)
        {
          // alert("2");
           vest_total_4 = parseInt(sessionStorage.getItem('vest_price'));
        }
        if(sessionStorage.getItem('pant_id') != null)
        {
          // alert("3");
           pant_total_4 = parseInt(sessionStorage.getItem('pant_price'));
        }

        var total4 = package_price+jacket_total_4+vest_total_4+pant_total_4+parseInt(sessionStorage.getItem('texture_price'));
        html_total += `
    <span class="me-3 text-gold fs-5">$</span><h4 class="d-inline ff-mont ls-0" id="step2_and_fabric_total">${total4}</h4>
    `;
        // alert(total4);
        $('.three_four_price').html(html_total);
        sessionStorage.setItem('cus_total_price', total4);
        //end calculate for reaching step 4
        if ($('#jacket' + value).prop("checked") == true) {
            sessionStorage.setItem('jacket_in', true);
        } else {
            sessionStorage.setItem('jacket_in', false);
        }
        if ($('#vest' + value).prop("checked") == true) {
            sessionStorage.setItem('vest_in', true);
        } else {
            sessionStorage.setItem('vest_in', false);
        }
        if ($('#pants' + value).prop("checked") == true) {
            sessionStorage.setItem('pant_in', true);
        } else {
            sessionStorage.setItem('pant_in', false);
        }
    }
</script>
@push('script_fabric_infinite')
  <script>
    function mobile_filter_status()
    {

    }
      // begin fabric  infinite scroll
      var ENDPOINT = "{{ url('/') }}";
      var page = 1;
      var start = 0;
      var pageNo = 0;

      infinteLoadMore(page)
      $(window).scroll(function () {
          console.log("dkfddfj");
          if ($(window).scrollTop() + $(window).height() >= ($(document).height() - 200)) {
              console.log("work scroll function inside!!page = " + page);
              page++;
              start = (page * 6) - 6;

              if (page <= 4) {
                  infinteLoadMore(page);
              }


          }
      })

      function infinteLoadMore(page) {
          // alert("hello load more");
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
              if ($('#'+$('#color_filter_status').val() + colorjs[i].id).is(":checked")) {
                  // it is checked
                  colorjs_arr.push($('#oncolor' + colorjs[i].id).val());
              }
          }
          for (i = 0; i < texturejs.length; i++) {
            // alert("texture loop");
              if ($('#'+$('#fabric_filter_status').val() + texturejs[i].id).is(":checked")) {
                  // alert("it is checked texture");
                  texturejs_arr.push($('#ontexture' + texturejs[i].id).val());
              }
          }
          for (i = 0; i < patternjs.length; i++) {
              if ($('#'+$('#pattern_filter_status').val() + patternjs[i].id).is(":checked")) {
                  // it is checked
                  patternjs_arr.push($('#onpattern' + patternjs[i].id).val());
              }
          }
          for (i = 0; i < packagejs.length; i++) {
              if ($('#'+$('#package_filter_status').val() + packagejs[i].id).is(":checked")) {
                  // it is checked
                  packagejs_arr.push($('#onpackage' + packagejs[i].id).val());
              }
          }
          if ($('#'+$('#low_price_filter_status').val()).is(":checked")) {
              // it is checked
              pricejs_arr.push($('#low').val());
          }
          if ($('#'+$('#high_price_filter_status').val()).is(":checked")) {
              // it is checked
              pricejs_arr.push($('#high').val());
          }
          // console.log(packagejs_arr);
          // console.log(colorjs_arr);
          console.log(texturejs_arr);
          // console.log(patternjs_arr);
          // console.log(pricejs_arr);
          var jacket_status = 0;
          var pant_status = 0;
          var vest_status = 0;
          $.ajax({
              url: ENDPOINT + "/customize?page=" + page,
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
                  "jacket_status": jacket_status,
                  "vest_status": vest_status,
                  "pant_status": pant_status,
                  "texture_id" : sessionStorage.getItem('texture_id'),
                  "start": start
              },
              beforeSend: function () {
                  $('.auto-load').show();
              }

          })
              .done(function (response) {
                  // console.log(response);
                  // console.log("PAGE"+response.page_no);

                  // console.log(response.res.length);
                  // console.log("step1");
                  if (response.res.length == 0) {
                      $('.auto-load').html("");
                      return;
                  }

                  // pageNo = response.page_no;
                  $('.auto-load').hide();
                  $("#grand-space").append(response.res)
                  // $('#texture_check_'+sessionStorage.getItem('texture_id')).attr('checked',true);
                  // alert("dkdk");
                  // $("#myModal").modal()
              })

              .fail(function (jqXHR, ajaxOptions, thrownError) {
                  console.log('Server error occured');
              });


      }

      function advance_filter() {
        alert("advance");
        $('#fabric_filter_status').val('ontexture');
        $('#color_filter_status').val('oncolor');
        $('#pattern_filter_status').val('onpattern');
        $('#package_filter_status').val('onpackage');
        $('#low_price_filter_status').val('low');
          $('#high_price_filter_status').val('high');
          $('#grand-space').html("");
          page = 1;
          start = 0;
          infinteLoadMore(page);
      }

      function advance_mobile_filter() {
      // alert("advance mobile");
      // <input type="hidden" id="color_filter_status" value="oncolor">
      //   <input type="hidden" id="fabric_filter_status" value="ontexture">
      //   <input type="hidden" id="pattern_filter_status" value="onpattern">
      //   <input type="hidden" id="package_filter_status" value="onpackage">
      //   <input type="hidden" id="low_price_filter_status" value="low">
      //   <input type="hidden" id="high_price_filter_status" value="high">
        $('#fabric_filter_status').val('ontexture_mobile');
        $('#color_filter_status').val('oncolor_mobile');
        $('#pattern_filter_status').val('onpattern_mobile');
        $('#package_filter_status').val('onpackage_mobile');
        $('#low_price_filter_status').val('low_height');
        $('#high_price_filter_status').val('height_low');

        $('#grand-space').html("");
        page = 1;
        start = 0;
        infinteLoadMore(page);
    }
  </script>

@endpush
@push('script_tag')
  <script>

      function get_texture_swiper(texture_id) {
          var html = "";
          $.ajax({
              type: 'POST',
              url: '/get_swiper_photo_texture',
              data: {
                  "_token": "{{csrf_token()}}",
                  "texture_id": texture_id
              },
              success: function (data) {
                  // start swiper
                  console.log(data.textures.photo_one);
                  if (data.textures.photo_two == null && data.textures.photo_three == null) {
                      html += `<div class="d-lg-none">
            <img src="assets/images/categories/texture/${data.textures.photo_one}"/>
            </div>
          <div class="swiper mySwiper2 mb-3 d-none d-md-block" id="mySwiper2${data.textures.id}">
              <div class="swiper-wrapper">
                  <div class="swiper-slide">
                      <img src="assets/images/categories/texture/${data.textures.photo_one}"/>
                  </div>`;
                      if (data.textures.photo_two != null) {
                          html += `
                  <div class="swiper-slide">
                      <img src="assets/images/categories/texture/${data.textures.photo_two}"/>
                  </div>`;
                      }
                      if (data.textures.photo_three != null) {
                          html += `
                  <div class="swiper-slide">
                      <img src="assets/images/categories/texture/${data.textures.photo_three}"/>
                  </div>`;
                      }
                      html += `
              </div>
          </div>

          `;
                  } else {
                      html +=
                          `
          <div class="swiper mySwiper2 mb-3" id="mySwiper2${data.textures.id}">
              <div class="swiper-wrapper">
                  <div class="swiper-slide">
                      <img src="assets/images/categories/texture/${data.textures.photo_one}"/>
                  </div>`;
                      if (data.textures.photo_two != null) {
                          html += `
                  <div class="swiper-slide">
                      <img src="assets/images/categories/texture/${data.textures.photo_two}"/>
                  </div>`;
                      }
                      if (data.textures.photo_three != null) {
                          html += `
                  <div class="swiper-slide">
                      <img src="assets/images/categories/texture/${data.textures.photo_three}"/>
                  </div>`;
                      }
                      html += `
              </div>
          </div>`
                  }
                  html += `
          <div thumbsSlider="" class="swiper mySwiper d-none d-md-block"
              id="mySwiper${data.textures.id}">
              <div class="swiper-wrapper">
                  <div class="swiper-slide">
                      <img src="assets/images/categories/texture/${data.textures.photo_one}"/>
                  </div>`;
                  if (data.textures.photo_two != null) {
                      html += `
                  <div class="swiper-slide">
                      <img src="assets/images/categories/texture/${data.textures.photo_two}"/>
                  </div>`
                  }
                  if (data.textures.photo_three != null) {
                      html += `
                  <div class="swiper-slide">
                      <img src="assets/images/categories/texture/${data.textures.photo_three}"/>
                  </div>`;
                  }
                  html += `
              </div>
          </div>
          `;
                  $('#swiper-space' + texture_id).html(html);
                  const swiper = new Swiper("#mySwiper" + texture_id, {
                      // loop: true,
                      spaceBetween: 10,
                      slidesPerView: 4,
                      freeMode: true,
                      watchSlidesProgress: true,
                  });
                  const swiper2 = new Swiper("#mySwiper2" + texture_id, {
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
  </script>
@endpush
