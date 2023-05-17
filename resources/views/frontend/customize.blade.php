@extends('layouts.header')
@push('styles')
  <link href="{{asset('css/SelectCss/select2.min.css')}}" rel="stylesheet"/>
  <link href="{{ asset('css/customize.css') }}" rel="stylesheet">
  <link href="{{ asset('css/fabric.css') }}" rel="stylesheet">
  <link href="{{ asset('css/owl/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/owl/owl.theme.default.min.css') }}" rel="stylesheet">
@endpush
@section('content')
  @include('layouts/nav')
  <input type="hidden" style="color:black" id="cus_cate_id">
  <input type="hidden" style="color:black" id="package_id">
  <input type="hidden" style="color:black" id="style_id">
  <input type="hidden" style="color:black" id="hidden_total">
  <input type="hidden" style="color:black" id="measure_step_pass" value="0">
  <input type="hidden" style="color:black" id="style_rec_name">
  <input type="hidden" style="color:black" id="style_rec_id">
  <input type="hidden" style="color:black" id="style_rec_cate_id">
  <input type="hidden" style="color:black" id="view_more_status">
  <input type="hidden" style="color:black" id="has_session_jacketvest" value="0">
  <input type="hidden" style="color:black" id="has_session_pant" value="0">
  @if($user == null || $upper == null)
    <input type="hidden" style="color:black" value="0" id="upper_measure_id">
  @else
    <input type="hidden" style="color:black" value="{{$upper->id}}" id="upper_measure_id">
  @endif
  @if($user == null || $lower == null)
    <input type="hidden" style="color:black" value="0" id="lower_measure_id">
  @else
    <input type="hidden" style="color:black" value="{{$lower->id}}" id="lower_measure_id">
  @endif
  <input type="hidden" style="color:black" id="order_id" value="start">
  <input type="hidden" style="color:black" id="suit_code" value="start">
  <section class="cus-breadcrumb py-2">
    <div class="d-flex justify-content-between align-items-center mb-0">
      <a href="#" class="pt-1" id="back"><i class='bx bx-arrow-back'></i></a>
      <a href="#" class="pt-1" id="next-arrow"><i class='bx bx-arrow-back bx-rotate-180'></i></a>
         <a href="#" class="pt-1" id="next-unconfirm"><i class='bx bx-arrow-back bx-rotate-180'></i></a>
    </div>
  </section>
  <section class="custom text-center" style="margin-bottom: 20px;">
    <span class="text-white-50">STEP <span id="step_no" class="text-gold">1</span>/7</span>
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
  @include('layouts/cus_1')
  @include('layouts/cus_2')
  @include('layouts/cus_3')
  @include('layouts/cus_4')
  @include('layouts/cus_5')
  @include('layouts/cus_6')
  @include('layouts/cus_7')
  @include('layouts.popup')
  {{-- @include('layouts/recommend_style_pop_up'); --}}
  {{-- confirm modal start --}}
  <div class="modal fade" id="confirm">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-navy rounded-0">
        <!-- Modal body -->
        <div class="modal-body text-center">
          <h6 class="ff-mont text-uppercase text-bold h5 mt-4 mb-3">Start your customization ?</h6>
          <span>First, you must select the <span id="vtext1"></span> !</span>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer border-0 mx-auto mb-4">
          <button class="btn border border-1 rounded-0 p-0 px-2 py-1 text-white me-3"
                  data-bs-dismiss="modal">BACK TO <span id="vtext2"></span>
          </button>

          <!-- <a type="btn"
            class="btn bg-gold rounded-0 p-0 px-2 py-1 d-flex justify-content-evenly align-items-center"
            id="next-one">
            <span class="text-navy">NEXT STEP</span>
            <i class='bx bx-chevron-right'></i>
          </a> -->
        </div>

      </div>
    </div>
  </div>

  {{-- end confirm modal --}}
  <button onclick="topFunction()" id="scrollBtn" title="Go to top" class="d-flex
    justify-content-center align-items-center">
    <i class='bx bx-arrow-back bx-rotate-90'></i>
  </button>
  {{--  model--}}

  @include('layouts/footer')
  {{--    @include('layouts/scrollTop')--}}
  @include('layouts.recommend_style_pop_up')
@endsection

@section('js')
  <script src="{{asset('css/owl/owl.carousel.min.js')}}"></script>
  <script src="{{asset('css/SelectJs/select2.min.js')}}"></script>


  <script>
      let noOfCharac = 50;
      let contents = document.querySelectorAll(".description");
      contents.forEach(content => {
          //If text length is less that noOfCharac... then hide the read more button
          if (content.textContent.length < noOfCharac) {
              content.nextElementSibling.style.display = "none";
          } else {
              let displayText = content.textContent.slice(0, noOfCharac);
              let moreText = content.textContent.slice(noOfCharac);
              content.innerHTML = `${displayText}<span class="dots">...</span><span class="hide
              more-text">${moreText}</span>`;
          }
      });

      function readMore(btn) {
          console.log('hi')
          let post = btn.parentElement;
          post.querySelector(".dots").classList.toggle("hide");
          post.querySelector(".more-text").classList.toggle("hide");
          btn.textContent == "Read More" ? btn.textContent = "Read Less" : btn.textContent = "Read More";
      }


    $(document).ready(function() {
      if(sessionStorage.getItem('customize_category_id') == null)
      {
        // alert("yes");
        if(@json($temporary) != null)
        {
          var from = @json(Session::get('from_reset'));
        }
        else
        {
          var from = 0;
        }


      }
      else if(sessionStorage.getItem('customize_category_id') != null)
      {
        // alert("no");
        var from = 0;
      }
      // alert(from);
      // var from = @json(Session::get('from_reset'));
      var has_step = @json(Session::get('has_step'));
      var user_id = @json(Session::get('user_id'));
      // alert(has_step);
      if(from == 1)
      {
        sessionStorage.setItem('has_step',has_step);
      if(has_step == null)
      {
        // alert("do store temporary when no old");
        $.ajax({
          type: 'POST',
          url: '/store_customize_step_data',
          data: {
            "_token": "{{csrf_token()}}",
            "user_id":user_id,
            "cus_cate_id": sessionStorage.getItem('customize_category_id'),
            "package_id" : sessionStorage.getItem('package_id'),
            "style_id" : sessionStorage.getItem('style_id'),
            "style_name" : sessionStorage.getItem('style_name'),
            "style_cate_name" : sessionStorage.getItem('style_cate_name'),
            "style_cate_id" : sessionStorage.getItem('style_cate_id'),
            "fitting" : sessionStorage.getItem('fitting'),
            "texture_id" : sessionStorage.getItem('texture_id'),
            "jacket_id" : sessionStorage.getItem('jacket_id'),
            "jacket_price" : sessionStorage.getItem('jacket_price'),
            "vest_id" : sessionStorage.getItem('vest_id'),
            "vest_price" : sessionStorage.getItem('vest_price'),
            "pant_id" : sessionStorage.getItem('pant_id'),
            "pant_price" : sessionStorage.getItem('pant_price'),
            "upper_id" : sessionStorage.getItem('upper_id'),
            "lower_id" : sessionStorage.getItem('lower_id'),
            "order_id" : sessionStorage.getItem('order_id'),
            "step_no" : sessionStorage.getItem('step_no'),
            "measured" : sessionStorage.getItem('measure_step'),
            "suit_piece" : sessionStorage.getItem('suit_piece'),
            "jacket_in" :sessionStorage.getItem('jacket_in'),
            "vest_in" : sessionStorage.getItem('vest_in'),
            "pant_in" : sessionStorage.getItem('pant_in'),
            "package_price" : sessionStorage.getItem('package_price'),
            "texture_price" : sessionStorage.getItem('texture_price'),
            "cus_total_price" : sessionStorage.getItem('cus_total_price'),
            "measure_type" : sessionStorage.getItem('measure_unit'),
            "suit_code" : sessionStorage.getItem('suit_code'),
            "shipping_id" : sessionStorage.getItem('shipping_id'),
            "shipping_price" : sessionStorage.getItem('shipping_price'),

            "upper_measure_unit" : sessionStorage.getItem('upper_measure_unit'),
            "lower_measure_unit" : sessionStorage.getItem('lower_measure_unit'),
            },
          success: function (data) {
            sessionStorage.setItem('has_step',data.has_step);
          }
        });
      }
      //store temporary data for user end
      //get temporary data for user start
      if(has_step != null)
      {
        // alert("do get temporary");
        $.ajax({
          type: 'POST',
          url: '/get_customize_step_data',
          data: {
            "_token": "{{csrf_token()}}",
            "user_id":user_id,
            "has_step" : has_step
          },
          success: function (data) {
            swal({
              title: "Customize Selected Data Alert!",
              text: "And Do you delete your previous customize session data?",
              icon: "warning",
              buttons: [
                'No, cancel it!',
                'Yes, I am sure!'
              ],
              dangerMode: true,
            }).then(function(isConfirm) {
              if (isConfirm) {
                swal({
                  title: 'Sucessful!',
                  text: 'Your previous customize session data are successfully deleted!',
                  icon: 'success'
                }).then(function() {
                  //delete temporary start
                  $.ajax({
                    type: 'POST',
                    url: '/delete_customize_step_data',
                    data: {
                      "_token": "{{csrf_token()}}",
                      "temporary_id": has_step,
                    },
                    success: function (data) {
                      sessionStorage.clear();
                      // store new temprary start
                      // $.ajax({
                      //   type: 'POST',
                      //   url: '/store_customize_step_data',
                      //   data: {
                      //     "_token": "{{csrf_token()}}",
                      //     "user_id":response.data.user_id,
                      //     "cus_cate_id": sessionStorage.getItem('customize_category_id'),
                      //     "package_id" : sessionStorage.getItem('package_id'),
                      //     "style_id" : sessionStorage.getItem('style_id'),
                      //     "style_name" : sessionStorage.getItem('style_name'),
                      //     "style_cate_name" : sessionStorage.getItem('style_cate_name'),
                      //     "style_cate_id" : sessionStorage.getItem('style_cate_id'),
                      //     "fitting" : sessionStorage.getItem('fitting'),
                      //     "texture_id" : sessionStorage.getItem('texture_id'),
                      //     "jacket_id" : sessionStorage.getItem('jacket_id'),
                      //     "vest_id" : sessionStorage.getItem('vest_id'),
                      //     "pant_id" : sessionStorage.getItem('pant_id'),
                      //     "upper_id" : sessionStorage.getItem('upper_id'),
                      //     "lower_id" : sessionStorage.getItem('lower_id'),
                      //     "order_id" : sessionStorage.getItem('order_id'),
                      //     "step_no" : sessionStorage.getItem('step_no'),
                      //     "measured" : sessionStorage.getItem('measure_step'),
                      //     "suit_piece" : sessionStorage.getItem('suit_piece'),
                      //     "jacket_in" :sessionStorage.getItem('jacket_in'),
                      //     "vest_in" : sessionStorage.getItem('vest_in'),
                      //     "pant_in" : sessionStorage.getItem('pants_in'),
                      //     },
                      //   success: function (data) {
                      //     sessionStorage.setItem('has_step',data.has_step);
                      //   }
                      // });

                      // end new temporary
                      window.location.reload();

                    }
                  });
                    //delete temporary end
                });
              } else {
                swal("Cancelled", "Your previous customize session data are successfully recover :)", "success");
                //get start --
                console.log(data.get_step_data);
                if(data.get_step_data.texture_id == null)
                  {
                      var texture_id = ''
                  }
                  else
                  {
                    var texture_id = data.get_step_data.texture_id;
                    sessionStorage.setItem('texture_id',texture_id);
                  }
                  if(data.get_step_data.customize_category_id == null)
                  {
                    var cus_cate_id = ''
                  }
                  else
                  {
                    var cus_cate_id = data.get_step_data.customize_category_id;
                    sessionStorage.setItem('customize_category_id',cus_cate_id);
                  }
                  if(data.get_step_data.package_id == null)
                  {
                    var package_id = ''
                  }
                  else
                  {
                    var package_id = data.get_step_data.package_id;
                    sessionStorage.setItem('package_id',package_id);
                  }
                  if(data.get_step_data.style_id == null)
                  {
                    var style_id = ''
                  }
                  else
                  {
                    var style_id = data.get_step_data.style_id;

                    sessionStorage.setItem('style_id',style_id);
                  }
                  if(data.get_step_data.style_name == null)
                  {
                    var style_name = ''
                  }
                  else
                  {
                    var style_name = data.get_step_data.style_name;
                    sessionStorage.setItem('style_name',style_name);
                  }
                  if(data.get_step_data.style_cate_name == null)
                  {
                    var style_cate_name = ''
                  }
                  else
                  {
                    var style_cate_name = data.get_step_data.style_cate_name;
                    sessionStorage.setItem('style_cate_name',style_cate_name);
                  }
                  if(data.get_step_data.style_cate_id == null)
                  {
                    var style_cate_id = ''
                  }
                  else
                  {
                    var style_cate_id = data.get_step_data.style_cate_id;
                    sessionStorage.setItem('style_cate_id',style_cate_id);
                  }
                  if(data.get_step_data.fitting == null)
                  {
                    var fitting = ''
                  }
                  else
                  {
                    var fitting = data.get_step_data.fitting;
                    sessionStorage.setItem('fitting',fitting);
                  }
                  if(data.get_step_data.jacket_id == null)
                  {
                    var jacket_id = ''
                  }
                  else
                  {
                    var jacket_id = data.get_step_data.jacket_id;
                    sessionStorage.setItem('jacket_id',jacket_id);
                  }
                  if(data.get_step_data.jacket_price == null)
                  {
                    var jacket_price = 0
                  }
                  else
                  {
                    var jacket_price = data.get_step_data.jacket_price;
                    sessionStorage.setItem('jacket_price',jacket_price);
                  }
                  if(data.get_step_data.vest_id == null)
                  {
                    var vest_id = ''
                  }
                  else
                  {
                    var vest_id = data.get_step_data.vest_id
                    sessionStorage.setItem('vest_id',vest_id);
                  }
                  if(data.get_step_data.vest_price == null)
                  {
                    var vest_price = 0
                  }
                  else
                  {
                    var vest_price = data.get_step_data.vest_price;
                    sessionStorage.setItem('vest_price',vest_price);
                  }
                  if(data.get_step_data.pant_id == null)
                  {
                    var pant_id = ''
                  }
                  else
                  {
                    var pant_id = data.get_step_data.pant_id;
                    sessionStorage.setItem('pant_id',pant_id);
                  }
                  if(data.get_step_data.pant_price == null)
                  {
                    var pant_price = 0
                  }
                  else
                  {
                    var pant_price = data.get_step_data.pant_price;
                    sessionStorage.setItem('pant_price',pant_price);
                  }

                  if(data.get_step_data.shipping_id == null)
                  {
                    var shipping_id = 0
                    sessionStorage.setItem('shipping_id',shipping_id);
                  }
                  else
                  {
                    var shipping_id = data.get_step_data.shipping_id;
                    sessionStorage.setItem('shipping_id',shipping_id);
                  }
                  if(data.get_step_data.shipping_price == null)
                  {
                    var shipping_price = ''
                  }
                  else
                  {
                    var shipping_price = data.get_step_data.shipping_price;
                    sessionStorage.setItem('shipping_price',shipping_price);
                  }
                  if(data.get_step_data.measured == null)
                  {
                    var measured = ''
                  }
                  else
                  {
                    var measured = data.get_step_data.measured
                    sessionStorage.setItem('measure_step',measured);
                  }
                  if(data.get_step_data.suit_piece == null)
                  {
                    var suit_piece = ''
                  }
                  else
                  {
                    var suit_piece = data.get_step_data.suit_piece
                    sessionStorage.setItem('suit_piece',suit_piece);
                  }
                  if(data.get_step_data.jacket_in == null)
                  {
                    var jacket_in = false
                  }
                  else
                  {
                    var jacket_in = data.get_step_data.jacket_in
                    sessionStorage.setItem('jacket_in',jacket_in);
                  }
                  if(data.get_step_data.vest_in == null)
                  {
                    var vest_in = false
                  }
                  else
                  {
                    var vest_in = data.get_step_data.vest_in
                    sessionStorage.setItem('vest_in',vest_in);
                  }
                  if(data.get_step_data.pant_in == null)
                  {
                    var pant_in = false
                  }
                  else
                  {
                    var pant_in = data.get_step_data.pant_in
                    sessionStorage.setItem('pant_in',pant_in);
                  }
                  if(data.get_step_data.package_price == null)
                  {
                    var package_price = 0;
                  }
                  else
                  {
                    var package_price = data.get_step_data.package_price
                    sessionStorage.setItem('package_price',package_price);
                  }
                  if(data.get_step_data.texture_price == null)
                  {
                    var texture_price = 0;
                  }
                  else
                  {
                    var texture_price = data.get_step_data.texture_price
                    sessionStorage.setItem('texture_price',texture_price);
                  }
                  // if(data.get_step_data.suit_code == null)
                  // {
                  //   var suit_code = "start";
                  // }
                  // else
                  // {
                  //   var suit_code = data.get_step_data.suit_code;
                  //   // alert(data.get_step_data.suit_code);
                  //   sessionStorage.setItem('suit_code',suit_code);
                  // }
                  if(data.get_step_data.cus_total_price == null)
                  {
                    // alert("ctp-0");
                    var cus_total_price = 0;
                    sessionStorage.setItem('cus_total_price',cus_total_price);
                  }
                  else
                  {
                    // alert("ctp-have");
                    var cus_total_price = data.get_step_data.cus_total_price
                    sessionStorage.setItem('cus_total_price',cus_total_price);
                  }
                  if(data.get_step_data.upper_measure_unit == null && data.get_step_data.lower_measure_unit == null)
                  {
                    // alert("ctp-0");
                    var measure_unit = 'in';
                    if(sessionStorage.getItem('customize_category_id') == 1 || sessionStorage.getItem('customize_category_id') == 2)
                    {
                      sessionStorage.setItem('upper_measure_unit',measure_unit);
                    }
                    else if(sessionStorage.getItem('customize_category_id') == 3)
                    {
                      sessionStorage.setItem('lower_measure_unit',measure_unit);
                    }
                    else if(sessionStorage.getItem('customize_category_id') == 9)
                    {
                      sessionStorage.setItem('upper_measure_unit',measure_unit);
                      sessionStorage.setItem('lower_measure_unit',measure_unit);
                    }

                  }
                  else if(data.get_step_data.upper_measure_unit != null && data.get_step_data.lower_measure_unit == null)
                  {
                    // alert("ctp-have");
                    var measure_unit = data.get_step_data.upper_measure_unit;
                    sessionStorage.setItem('upper_measure_unit',measure_unit);
                  }
                  else if(data.get_step_data.upper_measure_unit == null && data.get_step_data.lower_measure_unit != null)
                  {
                    // alert("ctp-have");
                    var measure_unit = data.get_step_data.lower_measure_unit;
                    sessionStorage.setItem('lower_measure_unit',measure_unit);
                  }
                  else if(data.get_step_data.upper_measure_unit != null && data.get_step_data.lower_measure_unit != null)
                  {
                    // alert("ctp-have");
                    var upper_measure_unit = data.get_step_data.upper_measure_unit;
                    var lower_measure_unit = data.get_step_data.lower_measure_unit;
                    if(sessionStorage.getItem('customize_category_id') == 1 || sessionStorage.getItem('customize_category_id') == 2)
                    {
                      sessionStorage.setItem('upper_measure_unit',upper_measure_unit);
                    }
                    else if(sessionStorage.getItem('customize_category_id') == 3)
                    {
                      sessionStorage.setItem('lower_measure_unit',lower_measure_unit);
                    }
                    else if(sessionStorage.getItem('customize_category_id') == 9)
                    {
                      sessionStorage.setItem('upper_measure_unit',upper_measure_unit);
                      sessionStorage.setItem('lower_measure_unit',lower_measure_unit);
                    }
                  }
                  if(data.get_step_data.suit_code == null)
                  {
                    // alert("ctp-0");
                    var suit_code = 0;

                  }
                  else
                  {
                    // alert("ctp-have");
                    var suit_code = data.get_step_data.suit_code
                    sessionStorage.setItem('suit_code',suit_code);
                  }
                  // if(data.get_step_data.measure_unit == null)
                  // {
                  //   // alert("ctp-0");
                  //   var measure_unit = 'in';
                  //   sessionStorage.setItem('measure_unit',measure_unit);
                  // }
                  // else
                  // {
                  //   // alert("ctp-have");
                  //   var measure_unit = data.get_step_data.measure_unit;
                  //   sessionStorage.setItem('measure_unit',measure_unit);
                  // }

                  if(data.user == null)
                  {
                    var address = ''
                  }
                  else
                  {

                    if(data.user.city != null && data.user.tsp_street == null)
                    {
                      var address = data.user.city
                    }
                    else if (data.user.city == null && data.user.tsp_street != null)
                    {
                      var address = data.user.tsp_street;
                    }
                    else if (data.user.city != null && data.user.tsp_street != null)
                    {
                      var address = data.user.city+' '+data.user.tsp_street;
                    }
                    else
                    {
                      var address = '';
                    }
                    sessionStorage.setItem('address',address);
                  }
                   sessionStorage.setItem('step_no',data.get_step.step);
                   window.location.reload();
                  //get end --
                }
                });
              }
            })

      }
      //get temporary data for user end
    }
    });


    $('#cus2_option').hide();
    $('.select2').hide();
    $('#fabric-filter').hide();
    $('.content').first().show();
    $('#next-unconfirm').hide();

    $('.circle-wrapper a').click(function (e) {
      if(sessionStorage.getItem('fitting') != null && sessionStorage.getItem('fitting') != '')
      {
      let current_link = $(this);
      // alert(current_link);
      let current_link_href = current_link.attr('href');
      // alert(current_link_href);
      let cfTitle = $('#cfTitle')
      console.log(current_link_href)
      if (current_link_href === '#fitting') {
        cfTitle.html('Fitting')
          window.scrollTo({ top: 0, behavior: 'smooth' })
      }
      if (current_link_href === '#fabric') {
        // alert("ffaa");
        $('#fabric-filter').show();
        cfTitle.html('Fabric')
          window.scrollTo({ top: 0, behavior: 'smooth' })
      } else {
        $('#fabric-filter').hide();
      }
      if (current_link_href === '#jacket') {
        jacket_infinite_scroll_start(null);
        cfTitle.html('Jacket')
          window.scrollTo({ top: 0, behavior: 'smooth' })
      }
      if (current_link_href === '#vest') {
        vest_infinite_scroll_start(null);
        cfTitle.html('Vest')
          window.scrollTo({ top: 0, behavior: 'smooth' })
      }
      if (current_link_href === '#pant') {
        pant_infinite_scroll_start(null);
        cfTitle.html('Pant')
          window.scrollTo({ top: 0, behavior: 'smooth' })
      }
      console.log(current_link)
      console.log(current_link_href)
      $('.circle-wrapper a').removeClass('box-select');
      $(this).addClass('box-select');

      $('.content').hide();
      $(current_link_href).show();
    }
    else
    {
      swal({
          title: "Error",
          text : "Need to choose Fitting!",
          icon : "error",
      })
    }
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

    AOS.init({
      duration: 1000,
    });
    // var count = 1;
    var user = @json($user);

    if (sessionStorage.getItem('step6') == 0) {
      var count = 6;
      $('#step_title').html('Payment For Your Suit')
      var prev = count - 1;
      $('#step5').addClass('d-none');
      $('#step4').addClass('d-none');
      $('#step3').addClass('d-none');
      $('#step2').addClass('d-none');
      $('#step1').addClass('d-none');
      $('#ind1').addClass('indicator-select');
      $('#ind2').addClass('indicator-select');
      $('#ind3').addClass('indicator-select');
      $('#ind4').addClass('indicator-select');
      $('#ind5').addClass('indicator-select');
      $('#ind' + count).addClass('indicator-select');
      $('#step' + count).removeClass('d-none');
      $('#step' + count).addClass('d-block');
      $('#step_no').html(count);
      window.scrollTo(0, 0);
      if(sessionStorage.getItem('address') != null && sessionStorage.getItem('address') != '')
        {
          $('#order_address').val(sessionStorage.getItem('address'));
        }
      set_measure_unit();
      update_temporary();
      // alert(user);
      if(user != null)
      {

        if(sessionStorage.getItem('suit_code') == null || sessionStorage.getItem('suit_code') == '')
        {

          store_suit_code();
        }
        else
        {
          var html = "";
          html+=sessionStorage.getItem('suit_code');
          $('#suitCode').html(html);
          $('#mobile_suitCode').html(html);
          $('#suit_code').val(sessionStorage.getItem('suit_code'));
        }
      }
      else
      {
        // alert("store_suit_code_for_guest");
        if(sessionStorage.getItem('suit_code') == null || sessionStorage.getItem('suit_code') == '')
        {
          store_suit_code_for_guest();
        }
        else
        {
          var html = "";
          var html2 = "";
          var html3 = "";
          html+=sessionStorage.getItem('suit_code');
          $('#suit_code').val(sessionStorage.getItem('suit_code'));
          $('#suitCode').html(html);
          $('#mobile_suitCode').html(html);
          html2 += sessionStorage.getItem('cus_total_price');
          html3 += parseInt(sessionStorage.getItem('cus_total_price'))+2;
          $('#suitTotal').html(html2);
          $('#mobile_suitTotal').html(html2);
          $('#total').html(html3);
          // alert("mobile_total 762");
          $('#mobile_total').html(html3);
        }
      }
      //if shipping fee start
      if(sessionStorage.getItem('shipping_id') != null || sessionStorage.getItem('shipping_id') != '')
      {
        // alert("shipping cost");
        get_shipping_price(sessionStorage.getItem('shipping_id'));
        $('#country').val(sessionStorage.getItem('shipping_id'));
      }
      //end shipping fee end
    }
    else if(sessionStorage.getItem('customize_category_id') != null && sessionStorage.getItem('package_id') != null && sessionStorage.getItem('style_id') == null && sessionStorage.getItem('fitting') == null && sessionStorage.getItem('measure_step') == null && sessionStorage.getItem('before_checkout') == null && sessionStorage.getItem('suit_code') == null)
    {
      var count = 2;
      $('#step_title').html('Choose the package');
      var prev = count - 1;
      $('#step5').addClass('d-none');
      $('#step4').addClass('d-none');
      $('#step3').addClass('d-none');
      $('#step2').removeClass('d-none');
      $('#step1').addClass('d-none');
      $('#ind1').addClass('indicator-select');
      $('#ind' + count).addClass('indicator-select');
      $('#step' + count).removeClass('d-none');
      $('#step' + count).addClass('d-block');
      $('#step_no').html(count);
      window.scrollTo(0, 0);
      sessionStorage.setItem('cus_total_price',sessionStorage.getItem('package_price'));
    }
    else if(sessionStorage.getItem('customize_category_id') != null && sessionStorage.getItem('package_id') != null && sessionStorage.getItem('style_id') != null && sessionStorage.getItem('fitting') == null && sessionStorage.getItem('measure_step') == null && sessionStorage.getItem('before_chekout') == null && sessionStorage.getItem('suit_code') == null)
    {
      var count = 3;
      $('#step_title').html('STYLE RECOMMENDATIONS');
      var prev = count - 1;
      $('#step5').addClass('d-none');
      $('#step4').addClass('d-none');
      $('#step3').removeClass('d-none');
      $('#step2').addClass('d-none');
      $('#step1').addClass('d-none');
      $('#ind' + count).addClass('indicator-select');
      $('#ind1').addClass('indicator-select');
      $('#ind2').addClass('indicator-select');
      $('#step' + count).removeClass('d-none');
      $('#step' + count).addClass('d-block');
      $('#step_no').html(count);
      // $('#style_nav_check_'+sessionStorage.getItem('style_cate_id')).addClass('active');
      // $('#style_nav_check_'+sessionStorage.getItem('style_cate_id')).click();
      window.scrollTo(0, 0);
      // step3_selected();
      // style_nav_reload();
    }
    else if(sessionStorage.getItem('customize_category_id') != null && sessionStorage.getItem('package_id') != null && sessionStorage.getItem('style_id') != null && sessionStorage.getItem('fitting') != null && sessionStorage.getItem('measure_step') == null && sessionStorage.getItem('before_checkout') == null && sessionStorage.getItem('suit_code') == null)
    {
      if(sessionStorage.getItem('measure_step') != null && sessionStorage.getItem('measure_step') != '' && sessionStorage.getItem('measure_step') != null)
      {
        // alert("reload step 5 arrive");
        var count = 5
        $('#step_title').html('GET MEASUREMENTS')
        var prev = count - 1;
        $('#step5').addClass('d-none');
        $('#step5').removeClass('get measurements');
        $('#step4').addClass('d-none');
        $('#step3').addClass('d-none');
        $('#step2').addClass('d-none');
        $('#step1').addClass('d-none');
        $('#ind1').addClass('indicator-select');
        $('#ind2').addClass('indicator-select');
        $('#ind3').addClass('indicator-select');
        $('#ind4').addClass('indicator-select');
        $('#ind5').addClass('indicator-select');
        $('#ind' + count).addClass('indicator-select');
        $('#step' + count).removeClass('d-none');
        $('#step' + count).addClass('d-block');
        $('#step_no').html(count);
        window.scrollTo(0, 0);
        show_measure_data();
        //choosed fitting
        $('#step_title').html('style customization');

        step4_selected();
        set_measure_unit();
        //end choosed fitting
      }
      else
      {
        // alert("44--44");
      var count = 4;
      calculate_step4();
      $('#step_title').html('style customization');
      if(sessionStorage.getItem('fitting') != '' && sessionStorage.getItem('fitting') != null)
      {
        if(sessionStorage.getItem('fitting') == 1)
        {
          $('#esf').attr('checked',true);
        }
        else if(sessionStorage.getItem('fitting') == 2)
        {
          $('#sf').attr('checked',true);
        }
        else if(sessionStorage.getItem('fitting') == 3)
        {
          $('#rf').attr('checked',true);
        }
        else if(sessionStorage.getItem('fitting') == 4)
        {
          $('#lf').attr('checked',true);
        }
        if(sessionStorage.getItem('suit_piece') == 3)
        {
          $('.jacket_in').show();
          $('.pants_in').show();
          $('.vest_in').show();
        }
        else if(sessionStorage.getItem('suit_piece') == 2)
        {
            $('.vest_in').hide();
            $('.jacket_in').show();
          $('.pants_in').show();
        }
        else
        {
          $('.all_in').hide();
          $('.jacket_in').hide();
          $('.pants_in').hide();
          $('.vest_in').hide();
        }
        if(sessionStorage.getItem('jacket_in') == 'true')
        {
          $('#jacket'+sessionStorage.getItem('texture_id')).attr('checked',true);
        }
        if(sessionStorage.getItem('vest_in') == 'true')
        {
          $('#vest'+sessionStorage.getItem('texture_id')).attr('checked',true);
        }
        if(sessionStorage.getItem('pants_in') == 'true')
        {
          $('#pants'+sessionStorage.getItem('texture_id')).attr('checked',true);
        }
        if(sessionStorage.getItem('pant_id') != '' && sessionStorage.getItem('pant_id') != null)
        {
          $('#choose_pant'+sessionStorage.getItem('pant_id')).attr('checked',true);
        }
      }
      var prev = count - 1;
      $('#step5').addClass('d-none');
      $('#step4').removeClass('d-none');
      $('#step3').addClass('d-none');
      $('#step2').addClass('d-none');
      $('#step1').addClass('d-none');
      $('#ind1').addClass('indicator-select');
      $('#ind2').addClass('indicator-select');
      $('#ind3').addClass('indicator-select');
      $('#ind4').addClass('indicator-select');
      $('#ind' + count).addClass('indicator-select');
      $('#step' + count).removeClass('d-none');
      $('#step' + count).addClass('d-block');
      $('#step_no').html(count);
    }
    }
    else if(sessionStorage.getItem('customize_category_id') != null && sessionStorage.getItem('package_id') != null && sessionStorage.getItem('style_id') != null && sessionStorage.getItem('fitting') != null && sessionStorage.getItem('measure_step') != null && sessionStorage.getItem('before_checkout') == null && sessionStorage.getItem('suit_code') == null)
    {
      // alert("reload step 5 arrive 2");
      var count = 5
      $('#step_title').html('GET MEASUREMENTS')
      var prev = count - 1;
      $('#step5').addClass('d-none');
      $('#step5').removeClass('get measurements');
      $('#step4').addClass('d-none');
      $('#step3').addClass('d-none');
      $('#step2').addClass('d-none');
      $('#step1').addClass('d-none');
      $('#ind1').addClass('indicator-select');
      $('#ind2').addClass('indicator-select');
      $('#ind3').addClass('indicator-select');
      $('#ind4').addClass('indicator-select');
      $('#ind5').addClass('indicator-select');
      $('#ind' + count).addClass('indicator-select');
      $('#step' + count).removeClass('d-none');
      $('#step' + count).addClass('d-block');
      $('#step_no').html(count);
      window.scrollTo(0, 0);
      show_measure_data();

      step4_selected();
      set_measure_unit();

    }
    else if(sessionStorage.getItem('customize_category_id') != null && sessionStorage.getItem('package_id') != null && sessionStorage.getItem('style_id') != null && sessionStorage.getItem('fitting') != null && sessionStorage.getItem('measure_step') != null && sessionStorage.getItem('suit_code') != null)
    {
        // alert("reload payment step 6");
        // $("#paypal-button-container").hide();
        // $("#mobile-paypal-button-container").hide();
        var count = 6;
        $('#step_title').html('Payment For Your Suit')
        var prev = count - 1;
        $('#step6').removeClass('d-none');
        $('#step5').addClass('d-none');
        $('#step4').addClass('d-none');
        $('#step3').addClass('d-none');
        $('#step2').addClass('d-none');
        $('#step1').addClass('d-none');
        $('#ind1').addClass('indicator-select');
        $('#ind2').addClass('indicator-select');
        $('#ind3').addClass('indicator-select');
        $('#ind4').addClass('indicator-select');
        $('#ind5').addClass('indicator-select');
        $('#ind' + count).addClass('indicator-select');
        $('#step' + count).removeClass('d-none');
        $('#step' + count).addClass('d-block');
        $('#step_no').html(count);
        window.scrollTo(0, 0);

        if(sessionStorage.getItem('address') != null && sessionStorage.getItem('address') != '')
        {
          $('#order_address').val(sessionStorage.getItem('address'));
        }
      set_measure_unit();
      update_temporary();
      // alert(user);
      if(user != null)
      {

        if(sessionStorage.getItem('suit_code') == null || sessionStorage.getItem('suit_code') == '')
        {
          // alert("ok one");
          store_suit_code();
        }
        else
        {
          // alert("ok two");
          var html = "";
          var html1 = "";
          html+=sessionStorage.getItem('suit_code');
          html1+= sessionStorage.getItem('cus_total_price');
          $('#suitTotal').html(html1);
          $('#suitCode').html(html);
          $('#mobile_suitCode').html(html);
          $('#mobile_suitTotal').html(html1);
          $('#suit_code').val(sessionStorage.getItem('suit_code'));
          // alert('dkdkdk');
        }
      }
      else
      {
        // alert("store_suit_code_for_guest");
        if(sessionStorage.getItem('suit_code') == null || sessionStorage.getItem('suit_code') == '')
        {
          store_suit_code_for_guest();
        }
        else
        {
          var html = "";
          var html2 = "";
          var html3 = "";
          html+=sessionStorage.getItem('suit_code');
          $('#suit_code').val(sessionStorage.getItem('suit_code'));
          $('#suitCode').html(html);
          $('#mobile_suitCode').html(html);
          html2 += sessionStorage.getItem('cus_total_price');
          html3 += parseInt(sessionStorage.getItem('cus_total_price'))+2;
          $('#suitTotal').html(html2);
          $('#mobile_suitTotal').html(html2);
          $('#total').html(html3);
          // alert("mobile_total 1023");
          $('#mobile_total').html(html3);
        }
      }
      //if shipping fee start
      if(sessionStorage.getItem('shipping_id') != null || sessionStorage.getItem('shipping_id') != '')
      {
        get_shipping_price(sessionStorage.getItem('shipping_id'))
        $('#country').val(sessionStorage.getItem('shipping_id'));
      }
      //end shipping fee end

    }
    else {
      // alert(sessionStorage.getItem('suit_code'));
      var count = 1
    }
    $(document).ready(function () {
      if(count != 6)
      {
        // alert("6");
        $('#step6').addClass('d-none');
      }
      $('#cus1').prop("checked");
      $('#next, #next-arrow,#next-unconfirm').click(function () {
        // alert("count"+count);

        sessionStorage.setItem('step_no',count);
        var msp = $('#measure_step_pass').val();
        var html = "";
        var cus_cate_id = $('input[name="customize_category"]:checked').val();
        console.log(cus_cate_id);
        console.log(package_id);
        var package_id = $('input[name="packages"]:checked').val();
        console.log(package_id);
        if (count < 6) {
          if (typeof (cus_cate_id) != "undefined" || sessionStorage.getItem('customize_category_id') != null) {
            if(count == 1 || count == 2)
            {
            sessionStorage.setItem('customize_category_id',cus_cate_id);
            if(sessionStorage.getItem('customize_category_id') != 9)
            {
              // alert("fuckkker");
              sessionStorage.removeItem('suit_piece');
              if(sessionStorage.getItem('texture_id') != null && sessionStorage.getItem('texture_id') != '')
              {
                sessionStorage.removeItem('jacket_in');
                sessionStorage.removeItem('vest_in');
                sessionStorage.removeItem('pant_in');
              }
              // sessionStorage.removeItem('style_id');
              // sessionStorage.removeItem('style_name');
              // sessionStorage.removeItem('style_cate_id');
              // sessionStorage.removeItem('style_cate_name');
            }
            //Re select check step1 to step 4 jacket,vest,pant start
            if(sessionStorage.getItem('customize_category_id') == 1)
            {
              sessionStorage.removeItem('vest_id');
              sessionStorage.removeItem('pant_id');
              $('#choose_vest'+sessionStorage.getItem('vest_id')).attr('checked',false);
              $('#choose_pant'+sessionStorage.getItem('pant_id')).attr('checked',false);
            }
            else if(sessionStorage.getItem('customize_category_id') == 2)
            {
              sessionStorage.removeItem('jacket_id');
              sessionStorage.removeItem('pant_id');
              $('#choose_jacket'+sessionStorage.getItem('jacket_id')).attr('checked',false);
              $('#choose_pant'+sessionStorage.getItem('pant_id')).attr('checked',false);
            }
            else if(sessionStorage.getItem('customize_category_id') == 3)
            {
              sessionStorage.removeItem('jacket_id');
              sessionStorage.removeItem('vest_id');
              $('#choose_jacket'+sessionStorage.getItem('jacket_id')).attr('checked',false);
              $('#choose_vest'+sessionStorage.getItem('vest_id')).attr('checked',false);
            }
            else if(sessionStorage.getItem('customize_category_id') == 9)
            {
              if(sessionStorage.getItem('suit_piece') == 3)
              {

              }
              else if(sessionStorage.getItem('suit_piece') == 2)
              {
                sessionStorage.removeItem('vest_id');
                $('#choose_vest'+sessionStorage.getItem('vest_id')).attr('checked',false);
              }
            }
            //Re select check step1 to step 4 jacket,vest,pant end
            // Re select check step1 to step 3 star
            // alert("check do");
              if(sessionStorage.getItem('style_id') != null && sessionStorage.getItem('style_id') != '')
              {
                $.ajax({
                  type: 'POST',
                  url: '/check_style_in_step1_ajax',
                  data: {
                    "_token": "{{csrf_token()}}",
                    "style_id": sessionStorage.getItem('style_id'),
                    "cus_cate_id" : sessionStorage.getItem('customize_category_id')
                  },
                  success: function (data) {
                    console.log("ajax check do!!!");
                    console.log(data);
                    if(data == false)
                    {
                      sessionStorage.removeItem('style_id');
                      sessionStorage.removeItem('style_name');
                      sessionStorage.removeItem('style_cate_name');
                      sessionStorage.removeItem('style_cate_id');
                      $('.styleNav').removeClass('active');

                    }
                  }
                });
              }
            // Re select check step1 to step 3 end
            }
            // count++;
            //not check data testing
            if (sessionStorage.getItem('package_id') == null) {
              if(count == 1)
              {
                // alert("only 1");
                var packages = @json($packages);

                sessionStorage.setItem('package_id',packages[0].id);
                sessionStorage.setItem('package_price',packages[0].price);

                count++;
              }
            } else if (sessionStorage.getItem('package_id') != null) {
              if (count >= 1 && count <= 6) {
                count++;
                // if(sessionStorage.getItem('package_id') != null && sessionStorage.getItem('package_id') != '')
                // {
                //   calculate_step4();
                // }

                if(count == 3)
                {
                  // alert(sessionStorage.getItem('suit_piece'));
                  if(sessionStorage.getItem('customize_category_id') == 9)
                  {


                      // alert("wtf");
                      // alert(sessionStorage.getItem('suit_piece'));
                      if(sessionStorage.getItem('suit_piece') == 2)
                      {
                        // alert("222");
                        sessionStorage.setItem('suit_piece',2);
                      }
                      else if(sessionStorage.getItem('suit_piece') == 3)
                      {
                        // alert("333")
                        sessionStorage.setItem('suit_piece',3);
                      }
                      else
                      {
                        sessionStorage.setItem('suit_piece',2);
                      }


                  }
                  step3_selected();
                  // style_filter(sessionStorage.getItem('suit_piece'));
                }
                if (count == 4) {
                  // alert("step 4 no reload");
                  if(sessionStorage.getItem('package_id') != null && sessionStorage.getItem('package_id') != '')
                  {
                    if(sessionStorage.getItem('cus_total_price') != null)
                    {
                      if(parseInt(sessionStorage.getItem('cus_total_price')) <= parseInt(sessionStorage.getItem('package_price')))
                      {
                        // alert("equal");
                        sessionStorage.setItem('cus_total_price',sessionStorage.getItem('package_price'));
                      }
                    }
                    else
                    {
                      // alert("null qual");
                      sessionStorage.setItem('cus_total_price',sessionStorage.getItem('package_price'));
                    }


                    calculate_step4();
                  }
                  if(sessionStorage.getItem('style_id') == null || sessionStorage.getItem('style_id') == '')
                  {
                    // alert("in444");
                    count--;
                    $('#step3-unconfirm').modal('show');
                  }
                  else
                  {
                    // count++;
                    // $('#step3-confirm').modal('show');
                  }
                  if(sessionStorage.getItem('suit_piece') == 3)
                  {
                    // alert("radio 3 show");
                    sessionStorage.setItem('jacket_in',true);
                    $('.input_jacket_in').attr('checked',true);
                    sessionStorage.setItem('vest_in',true);
                    $('.input_vest_in').attr('checked',true);
                    sessionStorage.setItem('pant_in',true);
                    $('.input_pants_in').attr('checked',true);
                    // alert("all show ccc");
                    $('.jacket_in').show();
                    $('.pants_in').show();
                    $('.vest_in').show();
                  }
                  else if(sessionStorage.getItem('suit_piece') == 2)
                  {
                    sessionStorage.setItem('jacket_in',true);
                      $('.input_jacket_in').attr('checked',true);
                      sessionStorage.setItem('pant_in',true);
                      $('.input_pants_in').attr('checked',true);
                      sessionStorage.setItem('vest_in',false);
                    $('.input_vest_in').attr('checked',false);
                    // alert("radio 2 show");
                    // alert("j p show");
                      $('.vest_in').hide();
                      $('.jacket_in').show();
                    $('.pants_in').show();
                  }
                  else
                  {
                    // alert("bmbm");
                    // alert("all hide ccc");
                    $('.all_in').hide();
                    $('.jacket_in').hide();
                    $('.pants_in').hide();
                    $('.vest_in').hide();
                  }
                  calculate_step4();
                }
                if (count == 5) {
                  // alert("five 5555");
                    sessionStorage.setItem('measure_step',1);
                      if(sessionStorage.getItem('customize_category_id') != 9)
                      {
                        $('.upper_show_cm').addClass('d-none');
                        $('.upper_show_in').addClass('d-none');
                        $('.lower_show_in').addClass('d-none');
                        $('.lower_show_cm').addClass('d-none');
                      }
                      if(sessionStorage.getItem('customize_category_id') == 1 || sessionStorage.getItem('customize_category_id') == 2 || sessionStorage.getItem('customize_category_id') == 9)
                      {
                        if(sessionStorage.getItem('upper_measure_unit') == null)
                        {
                        sessionStorage.setItem('upper_measure_unit','in');
                            if(sessionStorage.getItem('customize_category_id') == 9)
                            {
                              sessionStorage.setItem('lower_measure_unit','in');
                            }
                        }
                        else
                        {
                          if(sessionStorage.getItem('upper_measure_unit') == "in")
                          {
                            $('.unit').html("In");
                            $('#in').prop('checked',true);
                          }
                          else if(sessionStorage.getItem('upper_measure_unit') == "cm")
                          {
                            $('.unit').html("Cm");
                            $('#cm').prop('checked',true);
                          }
                        }

                      }
                      else if(sessionStorage.getItem('customize_category_id') == 3)
                      {
                        if(sessionStorage.getItem('lower_measure_unit') == null)
                        {
                        sessionStorage.setItem('lower_measure_unit','in');
                        }
                        else
                        {
                          if(sessionStorage.getItem('lower_measure_unit') == "in")
                          {
                            $('.unit').html("In");
                            $('#in').prop('checked',true);
                          }
                          else if(sessionStorage.getItem('lower_measure_unit') == "cm")
                          {
                            $('.unit').html("Cm");
                            $('#cm').prop('checked',true);
                          }
                        }
                      }
                      if(sessionStorage.getItem('customize_category_id') == 9)
                      {
                        // alert("nn");
                        // //START
                        // if(sessionStorage.getItem('upper_measure_unit') == null)
                        // {
                        //   $('.unit').html("In");
                        //   $('#in').prop('checked',true);
                        // }
                        // else
                        // {
                        //   if(sessionStorage.getItem('upper_measure_id') != null)
                        //   {
                        //     if(sessionStorage.getItem('upper_measure_unit') == "in")
                        //     {
                        //       $('.unit').html("In");
                        //       $('#in').prop('checked',true);
                        //     }
                        //     else if(sessionStorage.getItem('upper_measure_unit') == "cm")
                        //     {
                        //       $('.unit').html("Cm");
                        //       $('#cm').prop('checked',true);
                        //     }
                        //   }
                        // }

                        // //END
                        // if(sessionStorage.getItem('pass_measure') != null)
                        // {
                          if(sessionStorage.getItem('upper_measure_unit') != null && sessionStorage.getItem('lower_measure_unit') != null)
                          {
                            if(sessionStorage.getItem('upper_measure_unit') != sessionStorage.getItem('lower_measure_unit'))
                            {
                              $('.unit').html(sessionStorage.getItem('upper_measure_unit'));
                              if(sessionStorage.getItem('lower_measure_unit') == 'cm')
                              {
                                $('.upper_show_cm').removeClass('d-none');
                                upper_change_cm();
                              }
                              else if(sessionStorage.getItem('lower_measure_unit') == 'in')
                              {
                                $('.upper_show_in').removeClass('d-none');
                                upper_change_in();
                              }
                              if(sessionStorage.getItem('upper_measure_unit') == 'cm')
                              {
                                $('.lower_show_cm').removeClass('d-none');
                                lower_change_cm();
                              }
                              else if(sessionStorage.getItem('upper_measure_unit') == 'in')
                              {
                                $('.lower_show_in').removeClass('d-none');
                                lower_change_in();
                              }
                            }
                          }
                        // }
                      }

                    if(sessionStorage.getItem('fitting') == null)
                    {

                      $('#vtext1').html("style recommendations");
                      $('#vtext2').html("Step 4");
                      $('#confirm').modal('show');
                      count--;
                    }
                  show_measure_data();

                }
                if (count == 6) {
                  if(sessionStorage.getItem('pass_measure') == null)
                  {
                    $('#vtext1').html("Get Measurements (need to click save measurement)");
                    $('#vtext2').html("Step 5");
                    $('#confirm').modal('show');
                    count--;
                  }
                  else
                  {
                    choosen_order();
                    // $("#paypal-button-container").addClass('d-none');
                    sessionStorage.setItem('before_checkout',1);
                    // alert("klklkl");
                    var user = @json($user);
                    if(user == null)
                    {
                      // alert("store_suit_code_for_guest in arrow");
                      if(sessionStorage.getItem('suit_code') == null || sessionStorage.getItem('suit_code') == '')
                      {
                        // alert("store_suit_code_for_guest in arrow and calculate total")
                        store_suit_code_for_guest();
                      }
                      else
                      {
                        // alert("store_suit_code_for_guest in arrow and calculate total 2")
                        var html2 = "";
                        var html3 = "";
                        var html = "";
                        html+=sessionStorage.getItem('suit_code');
                        $('#suit_code').val(sessionStorage.getItem('suit_code'));
                        $('#suitCode').html(html);
                        $('#mobile_suitCode').html(html);
                        html2 += sessionStorage.getItem('cus_total_price');
                        html3 += parseInt(sessionStorage.getItem('cus_total_price'))+2;
                        $('#suitTotal').html(html2);
                        $('#mobile_suitTotal').html(html2);
                        $('#total').html(html3);
                        // alert("mobile_total 1318");
                        $('#mobile_total').html(html3);
                      }

                    }
                  }
                  //default set measure unit when session is null start
                  // if(sessionStorage.getItem('measure_unit') == null && sessionStorage.getItem('measure_unit') == '')
                  // {
                  //   // alert("null so fill cm");
                  //   sessionStorage.setItem('measure_unit','in');
                  // }
                  //default set measure unit when session is null end

                  var address = $('#order_address').val();


                  if($.trim('address') != null)
                  {
                    // alert("what loca");
                    sessionStorage.setItem('address',address);
                  }

                  var cus_cate_id = sessionStorage.getItem('customize_category_id');
                  var correct = true;

                }
              }
            }
          } else {
            var html = "";
            if (count == 1) {
              $('#vtext1').html("product");
              $('#vtext2').html("PRODUCT");
              $('#confirm').modal('show');
            }
          }

          // alert(count);
          if (count === 1) {
            $('#step_title').html('Choose the Product');

          }
          if(count === 2) {
            $('#next-unconfirm').hide();
            $('#step_title').html('Choose the package');
            $('#cus_cate_id').val(cus_cate_id);
            $('#next-unconfirm').hide();
          }
          if (count === 3) {

            $('#step_title').html('style recommendations');
            $('#next-arrow').hide();
            $('#next-unconfirm').show();
            $('#package_id').val(package_id);

          }
          if (count === 4) {
            $('#step_title').html('style customization');
            // $('#style_id').val(1);
            $('#next-arrow').show();
            $('#next-unconfirm').hide();

          }
          if (count === 5) {

            $('#step_title').html('get measurements');

          }
          if (count === 6) {

            var user = @json($user);
            // alert(user);
            if(user != null)
            {
              // alert("st-6 has user store suit code");
              store_suit_code();
            }

            // store_order();
            $('#step_title').html('Payment For Your Suit')
          }
          // if(count === 7) {
          //   $('#step_title').html('Order confirmed')
          // }

          var prev = count - 1;
          $('#step' + prev).addClass('d-none');
          $('#ind' + count).addClass('indicator-select')
          $('#step' + count).removeClass('d-none');
          $('#step' + count).addClass('d-block');
          $('#step_no').html(count);
          window.scrollTo(0, 0);
          var user = @json($user);
          if(sessionStorage.getItem('has_step') != null && sessionStorage.getItem('has_step') != '' && sessionStorage.getItem('has_step') != 'null')
          {
            if(user != null)
            {
              // alert("update temporary");
              update_temporary();
            }
          }
          else
          {
            if(user != null)
            {
              // alert("store temporary");
              store_temporary();
            }

          }
        }
      })

      $('#back').click(function () {
        $("#desktop_paypal_space").hide();
        $("#mobile_paypal_space").hide();
        $('#next-arrow').show();
        // alert(count);
        if (count != 1) {
          count--;
          if (count === 1) {
            $('#step_title').html('Choose the Product')
          }
          if(count === 2) {
            $('#next-unconfirm').hide();
            $('#step_title').html('Choose the package')
            $('#next-unconfirm').hide();
            // alert(sessionStorage.getItem('suit_piece'));
          }
          if (count === 3) {
            $('#next-arrow').hide();
            $('#next-unconfirm').show();
            $('#step_title').html('style recommendations');
            $('#package_id').val(package_id);
            // alert(sessionStorage.getItem('suit_piece'));
            step3_selected();
            }
            if(count === 4) {
            $('#next-unconfirm').hide();
            $('#step_title').html('style customization');
            $('#style_id').val(1);
            $('#next-unconfirm').hide();
          }
          if (count === 5) {

            $('#step_title').html('get measurements');
            show_measure_data();
          }
          if (count === 6) {
            // alert("st-6");
            if(user != null)
            {
              // alert("suit code");

              store_suit_code();
            }

            $('#step_title').html('Payment For Your Suit')
          }
          var next = count + 1;
          $('#step' + next).addClass('d-none');
          $('#ind' + (count + 1)).removeClass('indicator-select')
          $('#step' + count).removeClass('d-none');
          $('#step' + count).addClass('d-block');
          $('#step_no').html(count);
          // alert(count);
        }
      })
    });

    $(document).ready(function () {
      // alert(count);
      if(count != 6)
      {
        $('#step6').addClass('d-none');
      }
      if(count == 1)
      {
        $('#step1').removeClass('d-none');
      }
      // sessionStorage.setItem('measure_unit',"cm");
      // $('#style_nav_check_BUSINESS CONFERENCE').tab('show');
      step1_selected();
      step3_selected();
      step4_selected();
      step5_selected();

      // $('.type').select2({
      //   minimumResultsForSearch: Infinity
      // });
      // $('.htype').select2({
      //   minimumResultsForSearch: Infinity
      // });
    });
    $(document).ready(function () {
      $('.height-type').select2({
        minimumResultsForSearch: Infinity
      });
    });


    /*Dropdown Menu*/
    $('.dropdown').click(function () {
      $(this).attr('tabindex', 1).focus();
      $(this).toggleClass('active');
      // $(this).find('.dropdown-menu').slideToggle();
    });
    $('.dropdown').focusout(function () {
      $(this).removeClass('active');
      // $(this).find('.dropdown-menu').slideUp();
    });
    $('.dropdown .dropdown-menu li').click(function () {
      $(this).parents('.dropdown').find('span').text($(this).text());
      $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
    });
    /*End Dropdown Menu*/


    // $('.dropdown-menu li').click(function () {
    //     var input = '<strong>' + $(this).parents('.dropdown').find('input').val() + '</strong>',
    //         msg = '<span class="msg">Hidden input value: ';
    //     $('.msg').html(msg + input + '</span>');
    // });

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

    // function radio(id) {
    //     $.ajax({
    //         method: "Get",
    //         url: "{{ route('ajex_package') }}",
    //         cache: false,
    //         dataType: "json",
    //         data: {
    //             id: id,
    //         },
    //         success: function (data) {
    //           console.log(data.title);
    //           document.getElementById("description").innerHTML = `<p class="mb-2 h5">`+data
    //             .title+`</p>
    //           <p class="text-white-50 mb-3">`+data.description+`</p>
    //           <div class="d-flex text-uppercase justify-content-evenly flex-column flex-lg-row
    //           mb-3">
    //             <p  class="mb-2">Price Start From : `+data.price+`</p>
    //             <p  class="mb-2">Made In : `+data.made_in+`</p>
    //             <p  class="mb-2">Suit By : `+data.tailor+`</p>
    //           </div>`;
    //         },
    //         error: function (err) {
    //             console.log(err);
    //         }

    //     })
    // }

    function cus2_option(id) {
      // alert("helllllll");
        $.ajax({
            method: "Get",
            url: "{{ route('get_filter_recomment_style') }}",
            cache: false,
            dataType: "json",
            data: {
                id: id,
            },
            success: function (data) {

              $(document).ready(function(){
                var style_n = '';
                var style_nav = '';
                // var j_data = JSON.parse(data);
                $.each(data, function(i,v){

                  var id = v.id;
                  // alert(id);
                  var name = v.name;
                  var photo = v.photo_one;
                  var category = v.category;
                  var type = v.type;
                  console.log(v.type);
                  style_n += `<div onclick="style_popup${v.id}" class="col-6 col-md-4">
                  <div for="style_nav_check_${v.category}" class="radio-group ">`;
                    if(v.id == sessionStorage.getItem('style_id'))
                    {
                      style_n+=`<input type="radio" name="test" id="style_check${v.id}" class="form-check-input"/>`
                    }
                    style_n+=`
                  <div class="cursor-pointer" data-bs-toggle="modal"
                      data-bs-target="#myCategory${id}">
                    <img src="{{'/assets/images/categories/style/${photo}'}}" alt=""
                        class="cus-img-res">
                    <p class="text-center mt-2" id="style_data${v.id}">${name}/${type}</p>
                  </div>
                  </div>
                </div>`

                })

                $('#style_card').html(style_n);
                   if(id == 1){
                    $('#cus1_jacket').show();
                    $('#cus2_option').hide();
                    $('.select2').hide();
                    $('#cus1_vest').hide();
                    $('#cus1_pant').hide();
                  }else if(id == 2){
                    $('#cus1_jacket').hide();
                    $('#cus2_option').hide();
                    $('.select2').hide();
                    $('#cus1_pant').hide();
                    $('#cus1_vest').show();
                  }else if(id == 3){
                    $('#cus1_jacket').hide();
                    $('#cus2_option').hide();
                    $('.select2').hide();
                    $('#cus1_pant').show();
                    $('#cus1_vest').hide();
                  }else {
                    $('#cus1_jacket').show();
                    $('#cus2_option').show();
                    $('.select2').show();
                    $('#cus1_pant').show();
                    $('#cus1_vest').show();

                  };
              });

            },
            error: function (err) {
                console.log(err);

            }

        })

    }

    function get_style_pop_up(id){
      $.ajax({
            method: "Get",
            url: "{{ route('get_style_pop_up') }}",
            cache: false,
            dataType: "json",
            data: {
                id: id,
            },
            success: function (data) {

              $(document).ready(function(){
                var style_n = '';
                var style_nav = '';
                // var j_data = JSON.parse(data);
                $.each(data, function(i,v){

                  var id = v.id;
                  // alert(id);
                  var name = v.name;
                  var photo = v.photo_one;
                  var category = v.category;
                  var type = v.type;
                  console.log(v.type);
                  style_photo += ``

                })

                $('#style_card').html(style_n);
              });

            },
            error: function (err) {
                console.log(err);

            }

        })
    }

    // function jacket_button(style) {
    //   $.ajax({
    //     method: "Get",
    //     url: "{{ route('get_jacket_button') }}",
    //     cache: false,
    //     dataType: "json",
    //     data: {
    //       style: style,
    //     },
    //     success: function (data) {
    //       console.log(data.style);
    //       $(document).ready(function () {
    //         var style_n = '';
    //         // var j_data = JSON.parse(data);
    //         $.each(data, function (i, v) {


    //           var color = v.color;
    //           var style = v.style;
    //           var photo = v.photo_one;
    //           var description = v.description;
    //           console.log(name);
    //           style_n += `<label class="row cursor-pointer mb-5" for="sb1">
    //                                   <span class="col-md-6 mb-2 d-flex flex-column justify-content-center">
    //                                     <span class="row g-0 mb-2">
    //                                       <span class="col-1 mt-1">
    //                                         <input type="radio" name="jacket" id="sb1"
    //                                                 class="form-check-input me-2 mb-1"/>
    //                                       </span>
    //                                       <span class="col-11 ps-2">
    //                                         <span class="title">${color}</span>
    //                                       </span>
    //                                     </span>
    //                                     <span class="text-white-50 d-block">
    //                                      ${description}
    //                                     </span>
    //                                   </span>
    //                               <span class="col-md-6 jacket">
    //                                   <span class="fit-img-container">
    //                                     <img src="{{'/assets/images/customize/top/${photo}'}}" alt="" class="">
    //                                   </span>
    //                                 </span>
    //                             </label>`

    //         })
    //         $('#jacket-style').html(style_n);
    //       });

    //     },
    //     error: function (err) {
    //       console.log(err);
    //     }

    //   })

    // }

    // function vest_lapel(style) {
    //   $.ajax({
    //     method: "Get",
    //     url: "{{ route('get_vest_lapel') }}",
    //     cache: false,
    //     dataType: "json",
    //     data: {
    //       style: style,
    //     },
    //     success: function (data) {
    //       console.log(data.style);
    //       $(document).ready(function () {
    //         var style_n = '';
    //         // var j_data = JSON.parse(data);
    //         $.each(data, function (i, v) {


    //           var color = v.color;
    //           var style = v.style;
    //           var photo = v.photo_one;
    //           var description = v.description;
    //           console.log(name);
    //           style_n += `<label class="row cursor-pointer mb-5" for="sb1">
    //                                   <span class="col-md-6 mb-2 d-flex flex-column justify-content-center">
    //                                     <span class="row g-0 mb-2">
    //                                       <span class="col-1 mt-1">
    //                                         <input type="radio" name="jacket" id="sb1"
    //                                                 class="form-check-input me-2 mb-1"/>
    //                                       </span>
    //                                       <span class="col-11 ps-2">
    //                                         <span class="title">${color}</span>
    //                                       </span>
    //                                     </span>
    //                                     <span class="text-white-50 d-block">
    //                                      ${description}
    //                                     </span>
    //                                   </span>
    //                               <span class="col-md-6 jacket">
    //                                   <span class="fit-img-container">
    //                                     <img src="{{'/assets/images/customize/shirt_button/${photo}'}}" alt="" class="">
    //                                   </span>
    //                                 </span>
    //                             </label>`

    //         })
    //         $('#vest-lapel').html(style_n);
    //       });

    //     },
    //     error: function (err) {
    //       console.log(err);
    //     }

    //   })

    // }

    // function pant_pleat(style) {
    //   $.ajax({
    //     method: "Get",
    //     url: "{{ route('get_pant_pleat') }}",
    //     cache: false,
    //     dataType: "json",
    //     data: {
    //       style: style,
    //     },
    //     success: function (data) {
    //       console.log(data.style);
    //       $(document).ready(function () {
    //         var style_n = '';
    //         // var j_data = JSON.parse(data);
    //         $.each(data, function (i, v) {
    //           var color = v.color;
    //           var style = v.style;
    //           var photo = v.photo_one;
    //           var description = v.description;
    //           console.log(name);
    //           style_n += `<label class="row cursor-pointer mb-5" for="sb1">
    //                                   <span class="col-md-6 mb-2 d-flex flex-column justify-content-center">
    //                                     <span class="row g-0 mb-2">
    //                                       <span class="col-1 mt-1">
    //                                         <input type="radio" name="jacket" id="sb1"
    //                                                 class="form-check-input me-2 mb-1"/>
    //                                       </span>
    //                                       <span class="col-11 ps-2">
    //                                         <span class="title">${color}</span>
    //                                       </span>
    //                                     </span>
    //                                     <span class="text-white-50 d-block">
    //                                       ${description}
    //                                     </span>
    //                                   </span>
    //                               <span class="col-md-6 jacket">
    //                                   <span class="fit-img-container">
    //                                     <img src="{{'/assets/images/customize/pant/${photo}'}}" alt="" class="">
    //                                   </span>
    //                                 </span>
    //                             </label>`

    //         })
    //         $('#pleat-selection').html(style_n);
    //       });

    //     },
    //     error: function (err) {
    //       console.log(err);
    //     }

    //   })

    // }
    function style_filter_reload()
    {
      // alert("style_filter_reload");
      $.ajax({
        method: "Get",
        url: "{{ route('get_filter_recomment_style') }}",
        cache: false,
        dataType: "json",
        data: {
          name: sessionStorage.getItem('suit_piece'),

          cus_cate_id : sessionStorage.getItem('customize_category_id')
        },
        success: function (data) {
          console.log(data);
          $(document).ready(function () {
            var style_n = '';
            // var j_data = JSON.parse(data);
            $.each(data, function (i, v) {


              var name = v.name;
              var photo = v.photo_one;
              var pieces = v.pieces;
              console.log(pieces);
              style_n += `<div class="col-6 col-md-4">
              <div class="radio-group">`;
              if(v.id == sessionStorage.getItem('style_id'))
              {
                style_n +=`<input type="radio" name="test" id="style_check${v.id}" class="form-check-input" checked/>`;
              }
              else
              {
                style_n +=`<input type="radio" name="test" id="style_check${v.id}" class="form-check-input"/>`;
              }

                 style_n+=` <div class="cursor-pointer" data-bs-toggle="modal"
                      data-bs-target="#myCategory${v.id}" onclick="get_swiper(${v.id})">
                    <img src="{{'/assets/images/categories/style/${photo}'}}" alt=""
                        class="cus-img-res">
                    <p class="text-center mt-2" id="style_data${v.id}">${name}</p>
                  </div>
                  </div>
                </div>`

            })
            $('#style_card').html(style_n);
            // $('#style_check'+sessionStorage.getItem('style_id')).prop("checked",true);
            // alert("dodo");
            if(name == 2){
              // alert("2two");
              $('#cus1_jacket').show();
              $('#cus1_vest').hide();
              $('#cus1_pant').show();
            }else if(name == 3)
            {
              // alert("3three");
              $('#cus1_jacket').show();
              $('#cus1_vest').show();
              $('#cus1_pant').show();
            }
          });

        },
        error: function (err) {
          console.log(err);
        }

      })
    }
    function style_filter(name) {
      // alert("style filter");
      // alert(name);
      if(count == 3)
      {
        if(sessionStorage.getItem('style_id') != null && sessionStorage.getItem('style_id') != '')
        {
          if(sessionStorage.getItem('suit_piece') != name)
          {
            sessionStorage.removeItem('style_id');
            sessionStorage.removeItem('style_name');
            sessionStorage.removeItem('style_cate_id');
            sessionStorage.removeItem('style_cate_name');
          }
        }
        sessionStorage.setItem('suit_piece',name);

      }
      $.ajax({
        method: "Get",
        url: "{{ route('get_filter_recomment_style') }}",
        cache: false,
        dataType: "json",
        data: {
          name: name,
          piece:sessionStorage.getItem('suit_piece'),
          cus_cate_id : sessionStorage.getItem('customize_category_id'),
          style_cate_id : sessionStorage.getItem('style_cate_id'),
        },
        success: function (data) {
          console.log(data);
          $(document).ready(function () {
            var style_n = '';
            // var j_data = JSON.parse(data);
            $.each(data, function (i, v) {


              var name = v.name;
              var photo = v.photo_one;
              var pieces = v.pieces;
              console.log(pieces);
              style_n += `<div class="col-6 col-md-4">
              <div class="radio-group ">`;
                if(v.id == sessionStorage.getItem('style_id'))
                {
                  style_n+=`<input type="radio" name="test" id="style_check${v.id}" class="form-check-input" checked/>`;
                }
                else
                {
                  style_n+=`<input type="radio" name="test" id="style_check${v.id}" class="form-check-input"/>`;
                }
              style_n+=`
                  <div class="cursor-pointer" data-bs-toggle="modal"
                      data-bs-target="#myCategory${v.id}" onclick="get_swiper(${v.id})">
                    <img src="{{'/assets/images/categories/style/${photo}'}}" alt=""
                        class="cus-img-res">
                    <p class="text-center mt-2" id="style_data${v.id}">${name}</p>
                  </div>
                  </div>
                </div>`

            })
            $('#style_card').html(style_n);
            if(name == 2){
              // alert("2two");
              $('#cus1_jacket').show();
              $('#cus1_vest').hide();
              $('#cus1_pant').show();
            }else if(name == 3)
            {
              // alert("3three");
              $('#cus1_jacket').show();
              $('#cus1_vest').show();
              $('#cus1_pant').show();
            }
          });

        },
        error: function (err) {
          console.log(err);
        }

      })

    }
    function style_nav_reload()
    {
      // alert("style nav reload");

      // alert("hello");
      $.ajax({
        method: "Get",
        url: "{{ route('ajex_get_style') }}",
        cache: false,
        dataType: "json",
        data: {
          piece:sessionStorage.getItem('suit_piece'),
          id: sessionStorage.getItem('style_cate_id'),
          cus_cate_id: sessionStorage.getItem('customize_category_id'),
        },
        success: function (data) {
          console.log("nav reload");
          console.log(data);
            var style_n = '';
            // var j_data = JSON.parse(data);
            $.each(data, function (i, v) {
              var name = v.name;
              var photo = v.photo_one;
              console.log(name);
              style_n += ` <div class="col-md-4">
              <div class="radio-group ">`;
              if(v.id == sessionStorage.getItem('style_id'))
              {
                style_n+=`<input type="radio" name="test" id="style_check${v.id}" class="form-check-input" checked/>`;
              }
              else
              {
                style_n+=`<input type="radio" name="test" id="style_check${v.id}" class="form-check-input"/>`;
              }
              style_n+=`
                  <div class="cursor-pointer" data-bs-toggle="modal"
                      data-bs-target="#myCategory${v.id}" onclick="get_swiper(${v.id})">
                    <img src="{{'/assets/images/categories/style/${photo}'}}" alt=""
                        class="cus-img-res">
                    <p class="text-center mt-2" id="style_data${v.id}">${name}</p>
                  </div>
                  </div>
                </div>`
            })
            $('#style_card').html(style_n);


        },
        error: function (err) {
          console.log(err);
        }


        })

    }
    function style_nav(name,id) {
      // alert("style nav");
      $('#style_rec_cate_id').val(id);
      sessionStorage.setItem('style_cate_name',name);
      sessionStorage.setItem('style_cate_id',id);
      // alert("hello");
      $.ajax({
        method: "Get",
        url: "{{ route('ajex_get_style') }}",
        cache: false,
        dataType: "json",
        data: {
          name: name,
          piece:sessionStorage.getItem('suit_piece'),
          id: id,
          cus_cate_id: sessionStorage.getItem('customize_category_id'),
        },
        success: function (data) {
          $(document).ready(function () {
            var style_n = '';
            // var j_data = JSON.parse(data);
            $.each(data, function (i, v) {
              var name = v.name;
              var photo = v.photo_one;
              console.log(name);
              style_n += ` <div class="col-md-4">
              <div class="radio-group ">
              <input type="radio" name="test" id="style_check${v.id}" class="form-check-input"/>
                  <div class="cursor-pointer" data-bs-toggle="modal"
                      data-bs-target="#myCategory${v.id}" onclick="get_swiper(${v.id})">
                    <img src="{{'/assets/images/categories/style/${photo}'}}" alt=""
                        class="cus-img-res">
                    <p class="text-center mt-2" id="style_data${v.id}">${name}</p>
                  </div>
                  </div>
                </div>`
            })
            $('#style_card').html(style_n);
          });

        },
        error: function (err) {
          console.log(err);
        }


                      })
                    }





    function style_rec(id, name) {
      // alert("ooo"+name);
      $('#style_rec_name').val(name);
      // alert("successfully added style");
      $('#style_rec_id').val(id);
      sessionStorage.setItem('style_id',id);
      sessionStorage.setItem('style_name',name);
    }

    function get_style_st6() {
      var style_cate_id = $('#style_rec_cate_id').val();
      // alert(style_id);
      $.ajax({
        type: 'POST',
        url: '/get_style_ajax',
        data: {
          "_token": "{{csrf_token()}}",
          "style_cate_id": style_cate_id,
        },
        success: function (data) {
          console.log(data.styles.data);
          var html = "";
          $.each(data.styles.data, function (i, v) {
            html += `
            <div class="col-6 col-md-3">
              <div class="cursor-pointer" data-bs-toggle="modal"
                data-bs-target="#myCategory${v.name}">
                <div class="mb-1">
                  <img src="{{asset('/assets/images/categories/style/${v.photo_one}')}}"
                       alt="" class="">
                </div>
                <div class="text-center mt-4">
                  <p class="text-gold">${v.name}</p>
                </div>
              </div>
            </div>
            `;
          });
          $('#rec_style_space').html(html);
        }
      });
    }

    $('#view_more_style_to3').click(function () {
      var style_rec_name = $('#style_rec_name').val();
      // alert(style_rec_name);
      count = 3;
      var prev = count - 1;
      $('#step_title').html('Payment For Your Suit');
      $('#step6').addClass('d-none');
      $('#step3').removeClass('d-none');
      $('#step_no').html(count);
      $('#next-arrow').show();
      window.scrollTo(0, 0);
      // alert("view more");
      var style_cate_id = $('#style_rec_cate_id').val();
      // alert(style_cate_id);
      $.ajax({
        type: 'POST',
        url: '/get_style_view_more_ajax',
        data: {
          "_token": "{{csrf_token()}}",
          "style_cate_id": style_cate_id,
        },
        success: function (data) {
          console.log(data);
          $('#view_more_status').val(1);
          var style_n = '';
          // var j_data = JSON.parse(data);
          $.each(data, function (i, v) {


            var name = v.name;
            var photo = v.photo_one;
            console.log(name);
            style_n += ` <div class="col-md-4" onclick="style_rec(${v.id})">
                <div class="radio-group ">
                  <input type="radio" name="test" id="style_check${v.id}" class="form-check-input"/>
              <div class="cursor-pointer" data-bs-toggle="modal"
                  data-bs-target="#myCategory${style_rec_name}">
                <img src="{{'/assets/images/categories/style/${photo}'}}" alt=""
                    class="cus-img-res">
                <p class="text-center mt-2" id="style_data${v.id}">${name}</p>
              </div>
              </div>
            </div>`

          })
          $('#style_card').html(style_n);
        }
      });
    })

    function store_measure() {
      // alert("store_measure");
      var cus_cate_id = sessionStorage.getItem('customize_category_id');
      var correct = true;

      var upperID = $('#upper_measure_id').val();
      var lowerID = $('#lower_measure_id').val();

      var user = @json($user);
      var age = $('#age').val();
      var weight = $('#weight').val();
      var weight_type = $('#weight_type').val();
      var height = $('#height_value').val();
      var height_type = $('#height_type').val();
      //jacket and vest
      var chest = $('#chest').val();
      var waist = $('#waist').val();
      var hips = $('#hips').val();
      var shoulder = $('#shoulder').val();
      var sleeve = $('#sleeve').val();
      var front = $('#front').val();
      var back = $('#back_back').val();
      var neck = $('#neck').val();
      var jlength = $('#jlength').val();
      sessionStorage.setItem('age',age);
      sessionStorage.setItem('weight',weight);
      sessionStorage.setItem('weight_type',weight_type);
      sessionStorage.setItem('height',height);
      sessionStorage.setItem('height_type',height_type);

      sessionStorage.setItem('chest',chest);
      sessionStorage.setItem('waist',waist);
      sessionStorage.setItem('hips',hips);
      sessionStorage.setItem('shoulder',shoulder);
      sessionStorage.setItem('sleeve',sleeve);
      sessionStorage.setItem('front',front);
      sessionStorage.setItem('back',back);
      sessionStorage.setItem('neck',neck);
      sessionStorage.setItem('jlength',jlength);
      //pant
      var pcrotch = $('#pcrotch').val();
      var pthighs = $('#pthighs').val();
      var plength = $('#plength').val();
      var pbottom = $('#pbottom').val();
      var pknee = $('#pknee').val();
      var pstomach = $('#pstomach').val();
      sessionStorage.setItem('pcrotch',pcrotch);
      sessionStorage.setItem('pthighs',pthighs);
      sessionStorage.setItem('plength',plength);
      sessionStorage.setItem('pbottom',pbottom);
      sessionStorage.setItem('pknee',pknee);

      sessionStorage.setItem('pstomach',pstomach);


      $.ajax({
        type: 'POST',
        url: '/store_measure_ajax',
        data: {
          "_token": "{{csrf_token()}}",
          "cus_cate_id": cus_cate_id,
          "upper_id": upperID,
          "lower_id": lowerID,
          "age": sessionStorage.getItem('age'),
          "height": sessionStorage.getItem('height'),
          "height_type": sessionStorage.getItem('height_type'),
          "weight": sessionStorage.getItem('weight'),
          "weight_type": sessionStorage.getItem('weight_type'),

          "chest": sessionStorage.getItem('chest'),
          "waist": sessionStorage.getItem('waist'),
          "hips": sessionStorage.getItem('hips'),
          "shoulder": sessionStorage.getItem('shoulder'),
          "sleeve": sessionStorage.getItem('sleeve'),
          "front": sessionStorage.getItem('front'),
          "back": sessionStorage.getItem('back'),
          "neck": sessionStorage.getItem('neck'),
          "jlength": sessionStorage.getItem('jlength'),

          "measure_type" : sessionStorage.getItem('measure_unit'),

          "pcrotch": sessionStorage.getItem('pcrotch'),
          "pthighs": sessionStorage.getItem('pthighs'),
          "plength": sessionStorage.getItem('plength'),
          "pbottom": sessionStorage.getItem('pbottom'),
          "pknee": sessionStorage.getItem('pknee'),
          "pstomach": sessionStorage.getItem('pstomach'),
        },
        success: function (data) {
          console.log(data);
          if (data.msg == "success") {
            $('#upper_measure_id').val(data.upper_id);
            $('#lower_measure_id').val(data.lower_id);
            sessionStorage.setItem('upper_id',data.upper_id);
            sessionStorage.setItem('lower_id',data.lower_id);
            sessionStorage.getItem('measured',1);
            update_temporary();
            $('#measure_step_pass').val(1);
            swal({
              title: "Success!",
              text: "Successfully Saved Measurement!",
              icon: "success",
            }).then(function () {

              if(user != null)
              {

                store_suit_code();
              }
              $('#next-arrow').hide();
            });
          }
        }

      });
    }

    function change_text() {
      var user = @json($user);
      if(user == null)
      {
        $('#exampleModal').modal('show');
        $('#login_error').removeClass('d-none');
      }

      $('#alertnone').addClass('d-none');
    }

    // function store_order() {
    //   var addr = $('#order_address').val();
    //   var user = @json($user);
    //   console.log("User = "+user);
    //   var cus_cate_id = sessionStorage.getItem('customize_category_id');
    //   var package_id = sessionStorage.getItem('package_id');
    //   var style_id = sessionStorage.getItem('style_id');
    //   var upper_id = $('#upper_measure_id').val();
    //   var lower_id = $('#lower_measure_id').val();
    //   var order_id = $('#order_id').val();
    //   // if(sessionStorage.getItem('suit_piece') == null && sessionStorage.getItem('suit_piece') == '')
    //   // {
    //   //   var suit_piece = ''
    //   // }
    //   // else
    //   // {
    //   //   var suit_piece = sessionStorage.getItem('suit_piece')
    //   // }

    //   $.ajax({
    //     type: 'POST',
    //     url: 'ajax_store_order',
    //     dataType: 'json',
    //     data: {
    //       "_token": "{{ csrf_token() }}",
    //       "cus_cate_id": cus_cate_id,
    //       "package_id": package_id,
    //       "total_price":sessionStorage.getItem('cus_total_price'),
    //       "style_id": style_id,
    //       "upper_id": upper_id,
    //       "lower_id": lower_id,
    //       "order_id": order_id,
    //       "jacket_id":sessionStorage.getItem('jacket_id'),
    //       "pant_id":sessionStorage.getItem('pant_id'),
    //       "fitting":sessionStorage.getItem('fitting'),
    //       "texture_id" : sessionStorage.getItem('texture_id'),
    //       "user_id" : user,
    //       "address" : sessionStorage.getItem('address'),
    //       "suit_code":sessionStorage.getItem('suit_code'),
    //       "vest_id":sessionStorage.getItem('vest_id'),
    //       "suit_piece" : sessionStorage.getItem('suit_piece'),
    //       "jacket_in" : sessionStorage.getItem('jacket_in'),
    //       "vest_in" : sessionStorage.getItem('vest_in'),
    //       "pant_in" : sessionStorage.getItem('pant_in'),
    //       "measure_type" : sessionStorage.getItem('measure_unit'),
    //       "suit_piece" : sessionStorage.getItem('suit_piece')
    //     },
    //     success: function (data) {
    //       console.log("Order_id-"+data.order.id);
    //       $('#hidden_total').val(data.order.total);
    //       console.log(data);
    //       var html1 = "";
    //       var html2 = "";
    //       var html3 = "";

    //       html1 += data.order.order_code;
    //       html2 += data.order.suit_total;
    //       html3 += data.order.total;

    //       $('#order_id').val(data.order.id);
    //       sessionStorage.setItem('order_id',data.order.id);
    //       $('#orderCode').html(html1);
    //       $('#suitTotal').html(html2);
    //       $('#total').html(html3);
    //       update_temporary();
    //     }
    //   });
    // }
    function store_suit_code()
    {
      var user_id = @json($user);

      $.ajax({
        type: 'POST',
        url: '/store_suit_code_step6_ajax',
        data: {
          "_token": "{{csrf_token()}}",
          "suit_code": $('#suit_code').val(),
          "user_id" : user_id
        },
        success: function (data) {
          console.log("ajax check do!!!");
          console.log(data.suit_code);
          if(data.suit_code == null)
          {
            var hsc = sessionStorage.getItem('suit_code');
            $('#suit_code').val(hsc);
          }
          else
          {
            var hsc = data.suit_code
            $('#suit_code').val(hsc);
          }
          html="";
          html2 = "";
          html3 = "";
          html5 = ""
          html += hsc;
          html2 += data.suit_total;
          html3 += data.suit_total;
          html5+=sessionStorage.getItem('cus_total_price');
          $('#suitCode').html(html);
          $('#mobile_suitCode').html(html);
          $('#suitTotal').html(html5);
          $('#mobile_suitTotal').html(html5);
          console.log(data);
          sessionStorage.setItem('suit_code',hsc);
        }
      });
      // store_suit code end
    }
    function store_suit_code_for_guest()
    {
      $.ajax({
        type: 'POST',
        url: '/store_suit_code_step6_for_guest_ajax',
        data: {
          "_token": "{{csrf_token()}}",
        },
        success: function (data) {
          console.log("ajax check do!!!");
          html="";
          html2 = "";
          html3 = "";
          html += data.suit_code;

          $('#suitCode').html(html);
          $('#mobile_suitCode').html(html);
          html2 += sessionStorage.getItem('cus_total_price');
          html3 += parseInt(sessionStorage.getItem('cus_total_price'))+2;
          $('#suitTotal').html(html2);
          $('#total').html(html3);
       
          $('#mobile_total').html(html3);
          console.log(data);
          sessionStorage.setItem('suit_code',data.suit_code);
          $('#suit_code').val(sessionStorage.getItem('suit_code'));
        }
      });
      // store_suit code end
    }
    function show_measure_data() {
      var cus_cate_id = sessionStorage.getItem('customize_category_id');
      if (cus_cate_id == 1 || cus_cate_id == 2) {
        $('#lower_tab').addClass('d-none');
        $('#upper_tab').removeClass('d-none');

        $('#upper').addClass('active');
        $('#lower').removeClass('active');

        $('#upper_tab').addClass('active');
        $('#lower_tab').removeClass('active');

        $('#info_tab').removeClass('active');
        $('#info').removeClass('active');
      } else if (cus_cate_id == 3) {
        $('#upper_tab').addClass('d-none');
        $('#lower_tab').removeClass('d-none');

        $('#upper_tab').removeClass('active');
        $('#lower_tab').addClass('active');

        $('#upper').removeClass('active');
        $('#lower').addClass('active');

        $('#info_tab').removeClass('active');
        $('#info').removeClass('active');
      }
      else if(cus_cate_id == 9)
      {
        $('#lower_tab').removeClass('d-none');
        $('#upper_tab').removeClass('d-none');

        $('#upper').addClass('active');
        $('#lower').removeClass('active');

        $('#upper_tab').addClass('active');
        $('#lower_tab').removeClass('active');

        $('#info_tab').removeClass('active');
        $('#info').removeClass('active');
      }
    }



    $('#view_more_additional_page').click(function () {
      sessionStorage.setItem('step6', '1');
      window.location.href = "additional";
    })
    $('#esf').click(function(){
      sessionStorage.setItem('fitting',1)
    })
    $('#sf').click(function(){
      sessionStorage.setItem('fitting',2)
    })
    $('#rf').click(function(){
      sessionStorage.setItem('fitting',3)
    })
    $('#lf').click(function(){
      sessionStorage.setItem('fitting',4)
    })
    function getvest(value,price)
    {

      var package_price = parseInt(sessionStorage.getItem('package_price'));
      var texture_total_4 = 0;
      var jacket_total_4 = 0;
      var pant_total_4 = 0;
      sessionStorage.setItem('vest_id',value);
      sessionStorage.setItem('vest_price',price);
      //total
      var html_total = "";
      if(sessionStorage.getItem('texture_id') != null)
      {
         texture_total_4 = parseInt(sessionStorage.getItem('texture_price'));
      }
      if(sessionStorage.getItem('jacket_id') != null)
      {
         jacket_total_4 = parseInt(sessionStorage.getItem('jacket_price'));
      }
      if(sessionStorage.getItem('pant_id') != null)
      {
  
         pant_total_4 = parseInt(sessionStorage.getItem('pant_price'));
      }

      var total4 = package_price+texture_total_4+jacket_total_4+pant_total_4+parseInt(sessionStorage.getItem('vest_price'));
      html_total +=`
      <span class="me-3 text-gold fs-5">$</span><h4 class="d-inline ff-mont ls-0" id="step2_and_fabric_total">${total4}</h4>
      `;
      $('.three_four_price').html(html_total);
      sessionStorage.setItem('cus_total_price',total4);

      //end total
    }
    function getjacket(value,price)
    {
      var package_price = parseInt(sessionStorage.getItem('package_price'));
      var texture_total_4 = 0;
      var vest_total_4 = 0;
      var pant_total_4 = 0;
      sessionStorage.setItem('jacket_id',value);
      sessionStorage.setItem('jacket_price',price);
      //total
      var html_total = "";



        if(sessionStorage.getItem('texture_id') != null)
        {
          // alert("1");
           texture_total_4 = parseInt(sessionStorage.getItem('texture_price'));
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

        var total4 = package_price+texture_total_4+vest_total_4+pant_total_4+parseInt(sessionStorage.getItem('jacket_price'));

      html_total +=`
      <span class="me-3 text-gold fs-5">$</span><h4 class="d-inline ff-mont ls-0" id="step2_and_fabric_total">${total4}</h4>
      `;
      // alert(total4);
      $('.three_four_price').html(html_total);
      sessionStorage.setItem('cus_total_price',total4);

      //end total
    }
    function getpant(value,price)
    {
      // alert(price);
      var package_price = parseInt(sessionStorage.getItem('package_price'));
      var texture_total_4 = 0;
      var vest_total_4 = 0;
      var jacket_total_4 = 0;
      sessionStorage.setItem('pant_id',value);
      sessionStorage.setItem('pant_price',price);
      //total
      var html_total = "";
      if(sessionStorage.getItem('texture_id') != null)
      {
         texture_total_4 = parseInt(sessionStorage.getItem('texture_price'));
      }
      if(sessionStorage.getItem('vest_id') != null)
      {
         vest_total_4 = parseInt(sessionStorage.getItem('vest_price'));
      }
      if(sessionStorage.getItem('jacket_id') != null)
      {
         jacket_total_4 = parseInt(sessionStorage.getItem('jacket_price'));
      }

      var total4 = package_price+texture_total_4+vest_total_4+jacket_total_4+parseInt(sessionStorage.getItem('pant_price'));
      html_total +=`
      <span class="me-3 text-gold fs-5">$</span><h4 class="d-inline ff-mont ls-0" id="step2_and_fabric_total">${total4}</h4>
      `;
      // alert(total4);
      $('.three_four_price').html(html_total);
      sessionStorage.setItem('cus_total_price',total4);

      //end total


    }
    function update_temporary()
    {
      // alert("update temporary");
      // sessionStorage.setItem('has_step',response.data.has_step);
      $.ajax({
        type: 'POST',
        url: '/update_customize_step_data',
        data: {
          "_token": "{{csrf_token()}}",
          "user_id":1,
          "cus_cate_id": sessionStorage.getItem('customize_category_id'),
          "package_id" : sessionStorage.getItem('package_id'),
          "style_id" : sessionStorage.getItem('style_id'),
          "style_name" : sessionStorage.getItem('style_name'),
          "style_cate_name" : sessionStorage.getItem('style_cate_name'),
          "style_cate_id" : sessionStorage.getItem('style_cate_id'),
          "fitting" : sessionStorage.getItem('fitting'),
          "texture_id" : sessionStorage.getItem('texture_id'),
          "jacket_id" : sessionStorage.getItem('jacket_id'),
          "vest_id" : sessionStorage.getItem('vest_id'),
          "pant_id" : sessionStorage.getItem('pant_id'),
          "upper_id" : sessionStorage.getItem('upper_has_id'),
          "lower_id" : sessionStorage.getItem('lower_has_id'),
          "order_id" : sessionStorage.getItem('order_id'),
          "step_no" : sessionStorage.getItem('step_no'),
          "has_step" : sessionStorage.getItem('has_step'),
          "measured" : sessionStorage.getItem('measure_step'),
          "suit_piece" : sessionStorage.getItem('suit_piece'),
          "jacket_in" : sessionStorage.getItem('jacket_in'),
          "vest_in" : sessionStorage.getItem('vest_in'),
          "pant_in" : sessionStorage.getItem('pant_in'),
          "cus_total_price" : sessionStorage.getItem('cus_total_price'),
          "package_price" : sessionStorage.getItem('package_price'),
          "texture_price" : sessionStorage.getItem('texture_price'),
          "measure_type" : sessionStorage.getItem('measure_unit'),
          "suit_code" : sessionStorage.getItem('suit_code'),
          "jacket_price" : sessionStorage.getItem('jacket_price'),
          "vest_price" : sessionStorage.getItem('vest_price'),
          "pant_price" : sessionStorage.getItem('pant_price'),
          "shipping_id" : sessionStorage.getItem('shipping_id'),
          "shipping_price" : sessionStorage.getItem('shipping_price'),

          "upper_measure_unit" : sessionStorage.getItem('upper_measure_unit'),
          "lower_measure_unit" : sessionStorage.getItem('lower_measure_unit'),
        },
        success: function (data) {
          var html1 = "";
          var html2 = "";
          var html3 = "";
          // if(sessionStorage.getItem('shipping_id') != null)
          // {
          //   var all_total = data.total
          // }
          html2 += data.suit_total;
          html3 += data.total;
          $('#suitTotal').html(html2);
          $('#total').html(html3);
          $('#mobile_suitTotal').html(html2);
          $('#mobile_total').html(html3);
        }
      });
    }
    function store_temporary()
    {
      // alert("forget store temporary");
      var user = @json($user);
      $.ajax({
        type: 'POST',
        url: '/store_customize_step_data',
        data: {
          "_token": "{{csrf_token()}}",
          "user_id":user,
          "cus_cate_id": sessionStorage.getItem('customize_category_id'),
          "package_id" : sessionStorage.getItem('package_id'),
          "package_price" : sessionStorage.getItem('package_price'),
          "style_id" : sessionStorage.getItem('style_id'),
          "style_name" : sessionStorage.getItem('style_name'),
          "style_cate_name" : sessionStorage.getItem('style_cate_name'),
          "style_cate_id" : sessionStorage.getItem('style_cate_id'),
          "fitting" : sessionStorage.getItem('fitting'),
          "texture_id" : sessionStorage.getItem('texture_id'),
          "jacket_id" : sessionStorage.getItem('jacket_id'),
          "vest_id" : sessionStorage.getItem('vest_id'),
          "pant_id" : sessionStorage.getItem('pant_id'),
          "upper_id" : sessionStorage.getItem('upper_id'),
          "lower_id" : sessionStorage.getItem('lower_id'),
          "order_id" : sessionStorage.getItem('order_id'),
          "step_no" : sessionStorage.getItem('step_no'),
          "measured" : sessionStorage.getItem('measure_step'),
          "cus_total_price" : sessionStorage.getItem('package_price'),
          "upper_measure_unit" : sessionStorage.getItem('upper_measure_unit'),
          "lower_measure_unit" : sessionStorage.getItem('lower_measure_unit'),
        },
        success: function (data) {
          sessionStorage.setItem('has_step',data.has_step);
        }
      });
    }
    function step1_selected()
    {
      // alert("work step1 selected");
      $("#cus_checked"+sessionStorage.getItem('customize_category_id')).click();
    }
    function step2_selected()
    {
      // alert("work step2 selected");
    }
    function step3_selected()
    {
      // alert(sessionStorage.getItem('suit_piece'));
      $('#style_nav_check_'+sessionStorage.getItem('style_cate_id')).addClass('active');
      // start

      //end
      // $('#style_modal_click'+parseInt(sessionStorage.getItem('style_id'))).trigger('click');
      // $('#style_check'+parseInt(sessionStorage.getItem('style_id'))).prop("checked",true).trigger("click");
      // alert("new click");
      // alert("work step3 selected"+sessionStorage.getItem('style_cate_id'));
      if(sessionStorage.getItem('suit_piece') != null && sessionStorage.getItem('suit_piece') != '')
      {
        // alert("customize category is 9 and do suit pieces");
        if(count == 3)
        {
        // style_filter(sessionStorage.getItem('suit_piece'));
        var suit_piece = sessionStorage.getItem('suit_piece');
        $('#myCategory'+sessionStorage.getItem('style_name')).modal('show');
        }

      }
      else
      {
        if(count == 3)
        {
        $('#myCategory'+sessionStorage.getItem('style_name')).modal('show');
        }
      }
      if(sessionStorage.getItem('style_cate_id') != null && sessionStorage.getItem('style_cate_id') != '')
      {
        style_nav_reload();
      }
      else
      {
        style_filter_reload();
      }
      // alert(sessionStorage.getItem('customize_category_id'));
      if(sessionStorage.getItem('customize_category_id') == 9)
      {
        // alert("kotin");
        if(sessionStorage.getItem('suit_piece') == 2)
        {
          $('.rec-type').val(2).change();
        }
        else if(sessionStorage.getItem('suit_piece') == 3)
        {
          $('.rec-type').val(3).change();
        }

      }
      // $("#cus2_option option[value=3]").attr('selected','selected');
      // id="style_check${v.id}"
      // alert("check");

    }
    function step4_selected()
    {
      // alert("work step4 selected");
      //step 4 sessiondata selected start
      if(sessionStorage.getItem('fitting') != '' && sessionStorage.getItem('fitting') != null)
      {
        // alert("4in");
        if(sessionStorage.getItem('fitting') == 1)
        {
          $('#esf').attr('checked',true);
        }
        else if(sessionStorage.getItem('fitting') == 2)
        {
          $('#sf').attr('checked',true);
        }
        else if(sessionStorage.getItem('fitting') == 3)
        {
          $('#rf').attr('checked',true);
        }
        else if(sessionStorage.getItem('fitting') == 4)
        {
          $('#lf').attr('checked',true);
        }
        if(sessionStorage.getItem('suit_piece') == 3)
        {
          $('.jacket_in').show();
          $('.pants_in').show();
          $('.vest_in').show();
        }
        else if(sessionStorage.getItem('suit_piece') == 2)
        {
            $('.vest_in').hide();
            $('.jacket_in').show();
          $('.pants_in').show();
        }
        else
        {
          $('.all_in').hide();
          $('.jacket_in').hide();
          $('.pants_in').hide();
          $('.vest_in').hide();
        }
        if(sessionStorage.getItem('jacket_in') == 'true')
        {
          $('#jacket'+sessionStorage.getItem('texture_id')).attr('checked',true);
        }
        if(sessionStorage.getItem('vest_in') == 'true')
        {
          $('#vest'+sessionStorage.getItem('texture_id')).attr('checked',true);
        }
        if(sessionStorage.getItem('pant_in') == 'true')
        {
          $('#pants'+sessionStorage.getItem('texture_id')).attr('checked',true);
        }


        if(sessionStorage.getItem('jacket_id') != '' && sessionStorage.getItem('jacket_id') != null)
        {
          // alert("choose jacket done");
          $('#choose_jacket'+sessionStorage.getItem('jacket_id')).attr('checked',true);
        }
        if(sessionStorage.getItem('vest_id') != '' && sessionStorage.getItem('vest_id') != null)
        {
          $('#choose_vest'+sessionStorage.getItem('vest_id')).attr('checked',true);
        }
        if(sessionStorage.getItem('pant_id') != '' && sessionStorage.getItem('pant_id') != null)
        {
          // alert("choose pant done");
          $('#choose_pant'+sessionStorage.getItem('pant_id')).attr('checked',true);
        }
      }

      if(sessionStorage.getItem('customize_category_id') == 9)
      {
        if(sessionStorage.getItem('suit_piece') == 2){
          // alert("2two");
          $('#cus1_jacket').show();
          $('#cus1_vest').hide();
          $('#cus1_pant').show();
        }else if(sessionStorage.getItem('suit_piece') == 3)
        {
          // alert("3three");
          $('#cus1_jacket').show();
          $('#cus1_vest').show();
          $('#cus1_pant').show();
        }
      }
      //step 4 sessiondata selected end
      // alert("count4four");
      // if(count == 4)
      // {
      //   // alert("count4modal pupup");
      //   $('#myFabric'+sessionStorage.getItem('texture_id')).modal('show');
      // }
      if(sessionStorage.getItem('package_id') != null && sessionStorage.getItem('package_id') != '')
      {
        calculate_step4();
      }

    }
    function calculate_step4()
    {
      // alert("cal444");
      //start calculate step2 and if choose fabric
      var html_total = "";
      var total4 = sessionStorage.getItem('cus_total_price');
      html_total +=`
      <span class="me-3 text-gold fs-5">$</span><h4 class="d-inline ff-mont ls-0" id="step2_and_fabric_total">${total4}</h4>
      `;
      // alert(total4);
      $('.three_four_price').html(html_total);
      sessionStorage.setItem('cus_total_price',total4);


    }
    function step5_selected()
    {
      // alert("auto checked");
      if(sessionStorage.getItem('measure_unit') == 'cm')
      {
        // alert("cm");
        $("#cm").prop('checked', true);
        $("#in").prop('checked', false);

      }
      else if(sessionStorage.getItem('measure_unit') == 'in')
      {
        // alert("in");
        $("#in").prop('checked',true);
        $("#cm").prop('checked', false);
      }
    }
    function get_measure_unit(unit)
    {
      // alert(unit);
      if(sessionStorage.getItem('customize_category_id') == 1 || sessionStorage.getItem('customize_category_id') == 2)
      {
        sessionStorage.setItem('upper_measure_unit',unit);
      }
      else if(sessionStorage.getItem('customize_category_id') == 3)
      {
        sessionStorage.setItem('lower_measure_unit',unit);
      }
      else if(sessionStorage.getItem('customize_category_id') == 9)
      {
        sessionStorage.setItem('upper_measure_unit',unit);
        sessionStorage.setItem('lower_measure_unit',unit);
      }
    }
    function set_measure_unit()
    {
      // alert("set m u");
      if(sessionStorage.getItem('customize_category_id') == 1 || sessionStorage.getItem('customize_category_id') == 2)
      {
        if(sessionStorage.getItem('upper_measure_unit') === 'cm')
        {
          $('.unit').html("Cm");
          $('#cm').attr('checked',true);
        }
        else if(sessionStorage.getItem('upper_measure_unit') === 'in')
        {
          $('.unit').html("In");
          $('#in').attr('checked',true);
        }
      }
      else if(sessionStorage.getItem('customize_category_id') == 3)
      {
        if(sessionStorage.getItem('lower_measure_unit') === 'cm')
        {
          $('.unit').html("Cm");
          $('#cm').attr('checked',true);
        }
        else if(sessionStorage.getItem('lower_measure_unit') === 'in')
        {
          $('.unit').html("In");
          $('#in').attr('checked',true);
        }
      }
      else if(sessionStorage.getItem('customize_category_id') == 9)
      {
        if(sessionStorage.getItem('upper_measure_unit') != null)
        {
          if(sessionStorage.getItem('upper_measure_unit') == 'in')
          {
            $('.unit').html("In");
            $('#in').prop('checked',true);
          }
          else if(sessionStorage.getItem('upper_measure_unit') == 'cm')
          {
            $('.unit').html("Cm");
            $('#cm').prop('checked',true);
          }
        }
        else if(sessionStorage.getItem('lower_measure_unit') != null)
        {
          if(sessionStorage.getItem('lower_measure_unit') == 'in')
          {
            $('.unit').html("In");
            $('#in').prop('checked',true);
          }
          else if(sessionStorage.getItem('lower_measure_unit') == 'cm')
          {
            $('.unit').html("Cm");
            $('#cm').prop('checked',true);
          }
        }
        else
        {
          // alert("jjkk");
          $('.unit').html("In");
          $('#in').prop('checked',true);
        }
      }
      // else if(sessionStorage.getItem('lower_measure_unit') === 'cm')
      // {
      //   $('.unit').html("Cm");
      //   $('#cm').attr('checked',true);
      // }
      // else if(sessionStorage.getItem('lower_measure_unit') === 'in')
      // {
      //   $('.unit').html("In");
      //   $('#in').attr('checked',true);
      // }
      // else
      // {
      //   // alert("fuckk");
      //   $('.unit').html("In");
      //   $('#in').attr('checked',true);
      // }
    }
    function upper_change_cm()
    {
      // alert("lower is cm and so upper (cm)");
      var neck = $('#neck_input').val();
      var chest = $('#chest_input').val();
      var waist = $('#waist_upper_input').val();
      var hips = $('#hips_upper_input').val();
      var shoulder = $('#shoulder_input').val();
      var sleeve_right = $('#sleeve_length_Right_input').val();
      var sleeve_left = $('#sleeve_length_left_input').val();
      var stomach = $('#stomach_upper_input').val();
      var biceps = $('#biceps_input').val();
      var forearm = $('#forearm_input').val();
      var cuffs = $('#cuffs_input').val();
      var chest_front = $('#chest_front_input').val();
      var chest_back = $('#chest_back_input').val();
      var jacket_front = $('#jacket_front_input').val();
      var jacket_back = $('#jacket_back_input').val();
      var vest_len = $('#vest_length_input').val();

      if ($.trim(neck) == '') {

      } else {
        $('#neck_input_cm').val((neck * 2.54).toFixed(2));
      }
      if ($.trim(chest) == '') {

      } else {
        $('#chest_input_cm').val((chest * 2.54).toFixed(2));
      }
      if ($.trim(waist) == '') {

      } else {
        $('#waist_upper_input_cm').val((waist * 2.54).toFixed(2));
      }
      if ($.trim(hips) == '') {

      } else {
        $('#hips_upper_input_cm').val((hips * 2.54).toFixed(2));
      }
      if ($.trim(shoulder) == '') {

      } else {
        $('#shoulder_input_cm').val((shoulder * 2.54).toFixed(2));
      }
      if ($.trim(sleeve_right) == '') {

      } else {
        $('#sleeve_length_Right_input_cm').val((sleeve_right * 2.54).toFixed(2));
      }
      if ($.trim(sleeve_left) == '') {

      } else {
        $('#sleeve_length_left_input_cm').val((sleeve_left * 2.54).toFixed(2));
      }
      if ($.trim(stomach) == '') {

      } else {
        $('#stomach_upper_input_cm').val((stomach * 2.54).toFixed(2));
      }
      if ($.trim(biceps) == '') {

      } else {
        $('#biceps_input_cm').val((biceps * 2.54).toFixed(2));
      }
      if ($.trim(forearm) == '') {

      } else {
        $('#forearm_input_cm').val((forearm * 2.54).toFixed(2));
      }
      if ($.trim(cuffs) == '') {

      } else {
        $('#cuffs_input_cm').val((cuffs * 2.54).toFixed(2));
      }
      if ($.trim(chest_front) == '') {

      } else {
        $('#chest_front_input_cm').val((chest_front * 2.54).toFixed(2));
      }
      if ($.trim(chest_back) == '') {

      } else {
        $('#chest_back_input_cm').val((chest_back * 2.54).toFixed(2));
      }
      if ($.trim(jacket_front) == '') {

      } else {
        $('#jacket_front_input_cm').val((jacket_front * 2.54).toFixed(2));
      }
      if ($.trim(jacket_back) == '') {

      } else {
        $('#jacket_back_input_cm').val((jacket_back * 2.54).toFixed(2));
      }
      if ($.trim(vest_len) == '') {

      } else {
        $('#vest_length_input_cm').val((vest_len * 2.54).toFixed(2));
      }
      //end convert in to cm upper data
    }
    function upper_change_in()
    {
      // alert("lower is in and so upper (in)");
      var neck = $('#neck_input').val();
      var chest = $('#chest_input').val();
      var waist = $('#waist_upper_input').val();
      var hips = $('#hips_upper_input').val();
      var shoulder = $('#shoulder_input').val();
      var sleeve_right = $('#sleeve_length_Right_input').val();
      var sleeve_left = $('#sleeve_length_left_input').val();
      var stomach = $('#stomach_upper_input').val();
      var biceps = $('#biceps_input').val();
      var forearm = $('#forearm_input').val();
      var cuffs = $('#cuffs_input').val();
      var chest_front = $('#chest_front_input').val();
      var chest_back = $('#chest_back_input').val();
      var jacket_front = $('#jacket_front_input').val();
      var jacket_back = $('#jacket_back_input').val();
      var vest_len = $('#vest_length_input').val();

      if ($.trim(neck) == '') {

      } else {
        $('#neck_input_in').val((neck / 2.54).toFixed(2));
      }
      if ($.trim(chest) == '') {

      } else {
        $('#chest_input_in').val((chest / 2.54).toFixed(2));
      }
      if ($.trim(waist) == '') {

      } else {
        $('#waist_upper_input_in').val((waist / 2.54).toFixed(2));
      }
      if ($.trim(hips) == '') {

      } else {
        $('#hips_upper_input_in').val((hips / 2.54).toFixed(2));
      }
      if ($.trim(shoulder) == '') {

      } else {
        $('#shoulder_input_in').val( (shoulder / 2.54).toFixed(2));
      }
      if ($.trim(sleeve_right) == '') {

      } else {
        $('#sleeve_length_Right_input_in').val( (sleeve_right / 2.54).toFixed(2));
      }
      if ($.trim(sleeve_left) == '') {

      } else {
        $('#sleeve_length_left_input_in').val( (sleeve_left / 2.54).toFixed(2));
      }
      if ($.trim(stomach) == '') {

      } else {
        $('#stomach_upper_input_in').val( (stomach / 2.54).toFixed(2));
      }
      if ($.trim(biceps) == '') {

      } else {
        $('#biceps_input_in').val( (biceps / 2.54).toFixed(2));
      }
      if ($.trim(forearm) == '') {

      } else {
        $('#forearm_input_in').val( (forearm / 2.54).toFixed(2));
      }
      if ($.trim(cuffs) == '') {

      } else {
        $('#cuffs_input_in').val( (cuffs / 2.54).toFixed(2));
      }
      if ($.trim(chest_front) == '') {

      } else {
        $('#chest_front_input_in').val( (chest_front / 2.54).toFixed(2));
      }
      if ($.trim(chest_back) == '') {

      } else {
        $('#chest_back_input_in').val( (chest_back / 2.54).toFixed(2));
      }
      if ($.trim(jacket_front) == '') {

      } else {
        $('#jacket_front_input_in').val( (jacket_front / 2.54).toFixed(2));
      }
      if ($.trim(jacket_back) == '') {

      } else {
        $('#jacket_back_input_in').val( (jacket_back / 2.54).toFixed(2));
      }
      if ($.trim(vest_len) == '') {

      } else {
        $('#vest_length_input_in').val( (vest_len / 2.54).toFixed(2) );
      }
      //end convert cm to in upper data
    }
    function lower_change_cm()
    {
      // alert("upper is cm and so lower (cm)");
      var pwaist = $('#waist_lower_input').val();
      var pstomach = $('#stomach_lower_input').val();
      var phips = $('#hips_lower_input').val();
      var pcrotch = $('#crotch_input').val();
      var pthighs = $('#thighs_input').val();
      var pknees = $('#knees_input').val();
      var pcalf = $('#calf_input').val();
      var pshort = $('#pants_short_input').val();
      var plength = $('#pants_length_input').val();
      var pbottom = $('#bottom_length_input').val();

      if ($.trim(pwaist) == '') {

      } else {
        $('#waist_lower_input_cm').val((pwaist * 2.54).toFixed(2));
      }
      if ($.trim(pstomach) == '') {

      } else {
        $('#stomach_lower_input_cm').val((pstomach * 2.54).toFixed(2));
      }
      if ($.trim(phips) == '') {

      } else {
        $('#hips_lower_input_cm').val((phips *2.54).toFixed(2));
      }
      if ($.trim(pcrotch) == '') {

      } else {
        $('#crotch_input_cm').val((pcrotch * 2.54).toFixed(2));
      }
      if ($.trim(pthighs) == '') {

      } else {
        $('#thighs_input_cm').val((pthighs * 2.54).toFixed(2));
      }
      if ($.trim(pknees) == '') {

      } else {
        $('#knees_input_cm').val((pknees * 2.54).toFixed(2));
      }
      if ($.trim(pcalf) == '') {

      } else {
        $('#calf_input_cm').val((pcalf * 2.54).toFixed(2));
      }
      if ($.trim(pshort) == '') {

      } else {
        $('#pants_short_input_cm').val((pshort * 2.54).toFixed(2));
      }
      if ($.trim(plength) == '') {

      } else {
        $('#pants_length_input_cm').val((plength * 2.54).toFixed(2));
      }
      if ($.trim(pbottom) == '') {

      } else {
        $('#bottom_length_input_cm').val((pbottom *2.54).toFixed(2));
      }
    }
    function lower_change_in()
    {
      //alert("upper is in and so lower (in)");
      var pwaist = $('#waist_lower_input').val();
      var pstomach = $('#stomach_lower_input').val();
      var phips = $('#hips_lower_input').val();
      var pcrotch = $('#crotch_input').val();
      var pthighs = $('#thighs_input').val();
      var pknees = $('#knees_input').val();
      var pcalf = $('#calf_input').val();
      var pshort = $('#pants_short_input').val();
      var plength = $('#pants_length_input').val();
      var pbottom = $('#bottom_length_input').val();

      //start convert cm to in lower data
      if ($.trim(pwaist) == '') {

      } else {
        $('#waist_lower_input_in').val((pwaist /2.54).toFixed(2));
      }
      if ($.trim(pstomach) == '') {

      } else {
        $('#stomach_lower_input_in').val((pstomach / 2.54).toFixed(2));
      }
      if ($.trim(phips) == '') {

      } else {
        $('#hips_lower_input_in').val((phips /2.54).toFixed(2));
      }
      if ($.trim(pcrotch) == '') {

      } else {
        $('#crotch_input_in').val((pcrotch / 2.54).toFixed(2));
      }
      if ($.trim(pthighs) == '') {

      } else {
        $('#thighs_input_in').val((pthighs / 2.54).toFixed(2));
      }
      if ($.trim(pknees) == '') {

      } else {
        $('#knees_input_in').val((pknees / 2.54).toFixed(2));
      }
      if ($.trim(pcalf) == '') {

      } else {
        $('#calf_input_in').val((pcalf / 2.54).toFixed(2));
      }
      if ($.trim(pshort) == '') {

      } else {
        $('#pants_short_input_in').val((pshort / 2.54).toFixed(2));
      }
      if ($.trim(plength) == '') {

      } else {
        $('#pants_length_input_in').val((plength / 2.54).toFixed(2));
      }
      if ($.trim(pbottom) == '') {

      } else {
        $('#bottom_length_input_in').val((pbottom /2.54).toFixed(2));
      }
      //end convert cm to in lower data
    }
    // function available_payment()
    // {
    //   if(sessionStorage.getItem('address') == null && sessionStorage.getItem('address') == '')
    //   {
    //       $('#paypal-button-container').hide();
    //   }
    //   else
    //   {
    //     $('#paypal-button-container').show();
    //   }
    // }



  </script>
@endsection
@push('whishlist-nav')
@if(isset(Auth::guard('web')->user()->id))
<script>
    $(document).ready(function(){
      getnavData();
      // whishlist();
      // deletedata();
    });
    function getnavData(){
        var loItem = window.localStorage.getItem('Item');
        var arrayFromStroage = JSON.parse(localStorage.getItem('Item'));
        var arrayLength = arrayFromStroage.length;
        // var count = localStorage.length('Item');
        //  alert(arrayLength);
        var html = "";
        if (loItem != null) {


          itemArr = JSON.parse(loItem);

          $.each(itemArr,function(i,v){
            user_id = `{{Auth::guard('web')->user()->id}}`;
            // alert( window.userID )
          if(v.user_id == user_id)
          {
            // alert("right");
            // html += `${arrayLength}`;
            $('#fav-space').html(arrayLength);
          }else{
            html += parse('0');
          }
        });
          // document.getElementById('fav-space').innerHTML = parseInt(document.getElementById('fav-space').innerHTML) + 1;

				}else{

				}
    }

</script>
@endif
@endpush

