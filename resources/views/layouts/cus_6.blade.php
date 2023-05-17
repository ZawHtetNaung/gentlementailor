<section id="step6" class="cus-2 custom d-none">
  <h5 class="mb-3 mb-md-5 ff-mont text-white ls-0 text-uppercase">Payment Info</h5>

  <div class="row">
    <div class="col-md-7">
      <p class="ff-mont text-white ls-0 text-uppercase h5 mb-4" id="te">here is your billing
      address</p>
      <div class="ms-0 ms-md-4 mb-5">
        <div class="row mb-1">
          <p class="col-md-3 mb-1"><strong>Name :</strong></p>
          @if(!empty($user_info))
          <p class="col-md-9 mb-3">{{$user_info->name}}</p>
          @else
          <p class="col-md-9 mb-3">-</p>
          @endif
        </div>
        <div class="row mb-1">
          <p class="col-md-3 mb-1"><strong>Phone No :</strong></p>
          @if(!empty($user_info))
          <p class="col-md-9 mb-3">{{$user_info->phone}}</p>
          @else
          <p class="col-md-9 mb-3">-</p>
          @endif
        </div>
        <div class="row mb-1">
          <p class="col-md-3 mb-1"><strong>Email :</strong></p>
          @if(!empty($user_info))
          <p class="col-md-9 mb-3">{{$user_info->email}}</p>
          @else
          <p class="col-md-9 mb-3">-</p>
          @endif
        </div>
        <div class="row mb-1">
          <p class="col-md-3 mb-1"><strong>Address :</strong></p>
          <!--          <p class="col-md-9">No.143, Zayyardipa 1st Street, 31 ward, North Dagon.</p>-->
          <div class="col-md-9 mb-3" id="address_space">
            <textarea type="text" class="form-control" rows="2" id="order_address" autofocus onkeydown="store_address(this.value)"></textarea>
          </div>
        </div>
      </div>
      {{-- <p class="ff-mont text-white ls-0 text-uppercase h5 ms-0 ms-md-4 mb-4">Payment detail</p> --}}
      <div class="ms-0 ms-md-5 mb-5">
        {{-- <div class="d-flex mb-3">
          <label for="visa" class="payment-label position-relative me-4">
            <img src="{{asset('assets/images/logo/visa_logo.png')}}" width="50"
                 alt="Visa"/>
            <input type="radio" id="visa" name="payment"
                   class="form-check-input position-absolute top-0 start-100 translate-middle">
          </label>
          <label for="paypal" class="payment-label position-relative">
            <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_150x38.png"
                 width="80" alt="PayPal"/>
            <input type="radio" id="paypal" name="payment"
                   class="form-check-input position-absolute top-0 start-100 translate-middle">
          </label>
        </div> --}}
        <!--        <div class="card-info mb-3">
                  <div class="mb-3">
                    <label for="name" class="form-label mb-1">Card Holder Name</label>
                    <input type="text" class="form-control bg-transparent text-white-50" id="name">
                  </div>
                  <div class="d-flex mb-3">
                    <div class="w-50 pe-3">
                      <label for="name" class="form-label mb-1">Card Number</label>
                      <input type="text" class="form-control bg-transparent text-white-50" id="name">
                    </div>
                    <div class="w-25 pe-3">
                      <label for="name" class="form-label mb-1">Date</label>
                      <input type="date" class="form-control bg-transparent text-white-50" id="name">
                    </div>
                    <div class="w-25">
                      <label for="name" class="form-label mb-1">CCV</label>
                      <input type="text" class="form-control bg-transparent text-white-50" id="name">
                    </div>
                  </div>
                </div>-->
        <!--        <div class="form-group row">
                  <div class="col-1">
                    <input class="form-check-input" type="checkbox" id="save" name="saveMyCard">
                  </div>
                  <div class="col-11">
                    <label class="form-check-label ms-2" for="save" style="font-size: 14px;">Save my card
                      information for
                      next time
                      purchasement</label>
                  </div>
                </div>-->
      </div>
      <p class="ff-mont text-white ls-0 text-uppercase h5 mb-4">Delivery Process</p>
      <div class="mb-5">
        {{--        <div class="form-check d-flex mb-2">--}}
        {{--          <input type="radio" class="form-check-input" id="pickUp" name="deliProcess">--}}
        {{--          <label class="form-check-label ms-3" for="pickUp">Store Pick Up</label>--}}
        {{--        </div>--}}
<!--        <div class="form-check d-flex mb-2">
           <input type="radio" class="form-check-input" id="delivery" name="deliProcess">
          <label class="form-check-label ms-3 text-wrap" for="delivery">
            Home Delivery
            <p class="text-white-50 smaller-text">(Delivery process will be take 5-7 days)</p>
          </label>
        </div>-->
        <div class="d-flex flex-column flex-md-row gap-3 align-items-md-center">
          <p class=""><span class="text-gold">THAILAND</span> TO:</p>
          <select name="country" id="country" class="country" onchange="get_shipping_price(this.value)">
            <option value="0" selected disabled>Select the country</option>
            @foreach($shippings as $ship)
            <option value="{{$ship->id}}">{{$ship->country}} - ${{$ship->price}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="text-center text-md-start">
        <p class="text-decoration-underline d-block d-md-none my-3" data-bs-toggle="modal"
           data-bs-target="#checkout">
          View My Order Summary
        </p>
        <hr>
        <div id="paypal-button-container" class="paypal-container"></div>
        <button class="btn bg-gold rounded-0 px-2 py-1 text-uppercase
      ls-0" onclick="available_payment()">CheckOut
          Now
        </button>

      </div>
    </div>
    <div class="col-md-5 d-none d-md-block ps-5">
      @include('layouts/checkout')
    </div>
  </div>
  <div class="small-line"></div>
  <p class="h5 mb-4 text-uppercase">Better Together With</p>
  <div class="row" id="rec_additional_space">
    @foreach($additionals as $add)
    <div class="col-6 col-md-3">
                 <div class="cursor-pointer" data-bs-toggle="modal"
                   data-bs-target="#myAdditional{{$add->id}}" onclick="increase_count('{{$add->id}}')">
                   <div class="mb-1">
                     <img src="{{asset('/assets/images/categories/additional/'.$add->photo_one)}}"
                         alt="" class="img-responsive" style="height: 300px !important">
                   </div>
                  <div class="text-center mt-4">
                    <p class="text-gold">{{$add->name}}</p>
                    <p class="text-gold">$ {{$add->price}}</p>
                  </div>
                 </div>
             </div>
    @endforeach

  </div>
  {{-- @include('layouts.recommend_style_pop_up') --}}
  {{--  model--}}
  @foreach($additionals as $grand)
  <div class="modal fade" id="myAdditional{{$grand->id}}">
    <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered modal-fullscreen-lg-down">
      <div class="fabric-pop modal-content">
        <!-- Modal Header -->
        <div class="modal-header border border-0">
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                  aria-label="Close"></button>

        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <h5 class="ff-mont text-white text-uppercase mb-5 text-wrap">
            {{$grand->name}}
          </h5>
          <div class="row">
            <div class="col-md-6 order-2 order-md-1 mt-4 mt-md-0">

              <p class="small-text mb-3 mb-md-5 text-wrap">{{$grand->description}}</p>
              <div class="row mb-4 text-uppercase">
                <div class="col-md-6">
                  <div class="d-flex align-items-center mb-2">
                    <i class="bx bx-check text-gold me-3"></i>
                    <p class="smaller-text">Made in : {{$grand->made_in}}</p>
                  </div>
                  <div class="d-flex align-items-center mb-2">
                    <i class="bx bx-check text-gold me-3"></i>
                    <p class="smaller-text">colour : {{$grand->color_id}}</p>
                  </div>
                  <div class="d-flex align-items-center mb-2">
                    <i class="bx bx-check text-gold me-3"></i>
                    <p class="smaller-text">Fabric Type :
                      Warm (85%)</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex align-items-center mb-2">
                    <i class="bx bx-check text-gold me-3"></i>
                    <p class="smaller-text">composition : {{$grand->composition}}</p>
                  </div>
                  <div class="d-flex align-items-center mb-2">
                    <i class="bx bx-check text-gold me-3"></i>
                    <p class="smaller-text">softness : {{$grand->softness}}</p>
                  </div>
                  <div class="d-flex align-items-center mb-2">
                    <i class="bx bx-check text-gold me-3"></i>
                    <p class="smaller-text">Price : $ {{$grand->price}}</p>
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
                  {{-- <form action="{{route('payment')}}" method="post">
                    @csrf
                    <input type="hidden" name="amount" value="{{$grand->price}}">
                    <button type="submit" class="btn btn-warning my-3 fw-bold"><img style="display: inline!important;width:1.5vw" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAatJREFUSEvNluExBEEQhb+LABEgAkSACBABIkAEiAARIAIyQAZEgAgQAfVV7VaNuZmdmXVVp6vuz233vOnXr7tnwpxsMidc/j3wFvBdYOephb2ajG+A/cpD74ET4K3kXwP8CGyWDgq+fwLbwPNQTA2wBy00AOtqxqt/AV4EPhpBe/eNoaxLGSuqh5HA0m2ZklYCPgYuRgKbsZRbqikrAZ8BpyOAv4CVji0v0Azcquge4Laj+RrYA2yzX1bKWKqWR2Ssor20seeAzDUBl6ZV6k6HgN3Qa6MZuFXR1lUxylLYCV7E6Ved8S5wF/l7eDyRBJJWf0cdeBi2lFL2UI1Tilah0hiWQGbWAS8amyI7aFW1StwJgsxWgNdKsfUt1dzHUroWgLj2ZKFmkr13DGQXxRDVsaKvulrlBspL910hTYmpVlxOnZhS96xUh7t5kM6hkuQyTrWSQ1+qw90s/fo2Ww44pWjbIl6R0m/vNlsO2NaID/S/GFj6L5tRoemVmaM/u3PH1DgVk9rNLoPiw651gMT+TixV3ZuDYfBBN6uMx5QyG1PaxzMFCw+bG/APw0VRH67OIJoAAAAASUVORK5CYII="/>PayPal</button>
                  </form> --}}
                </div>
                {{-- <div class="col-6 col-md-6" style="padding-top:1vw">
                  @if(isset(Auth::guard('web')->user()->id))
                  <button class="btn btn-success fw-bold" onclick="add_to_cart('{{$grand->id}}','{{$grand->price}}')">Add To Cart</button>
                  @else
                  <button type="button" class="btn btn-secondary fw-bold" data-bs-toggle="modal"
                  data-bs-target="#exampleModal">Add To Cart</button>
                  @endif
                </div> --}}
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
  <div class="text-center mb-5 mt-4">
    <button class="btn bg-gold rounded-0 px-2 py-1 text-uppercase ls-0 d-flex align-items-center"
            id="view_more_additional_page">
      <p class="me-2 text-black">view more</p>
      <i class='bx bx-chevron-right'></i>
    </button>
  </div>

  <!-- The Modal -->
  <div class="modal" id="checkout">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-navy">
        @include('layouts/checkout-mobile')
      </div>
    </div>
  </div>
  {{-- <div class=" d-flex justify-content-center justify-content-md-end custom mb-5">
    <button class="btn p-0 px-3 mt-5" id="next">NEXT STEP</button>
  </div> --}}


</section>
<script>
  $(document).ready(function () {
    // alert("hide");
    set_measure_unit();
    var user_info = @json($user_info);
    var address = '';
    if(user_info != null)
    {
      // alert("jkjjkjk");
      if(user_info.city != null && user_info.tsp_street == null)
      {
        address = user_info.city;
      }
      else if(user_info.city == null && user_info.tsp_street != null)
      {
        address = user_info.tsp_street;
      }
      else if(user_info.city != null && user_info.tsp_street != null)
      {
        address = user_info.city+' '+user_info.tsp_street;
      }
      else
      {
        address = '';
      }

      sessionStorage.setItem('address',address);
      var html = "";
      html+=`
      <textarea type="text" class="form-control" rows="2" id="order_address" autofocus onkeyup="store_address(this.value)">${address}</textarea>
      `;
      $('#address_space').html(html);
    }
    // $("#desktop_paypal_space").hide();
    $('#paypal-button-container').hide();
    // $("#mobile_paypal_space").hide();
  });

  function available_payment() {
    // alert($('#country').val());
    var user = @json($user);
    if(user != null)
    {
      if(sessionStorage.getItem('address') != null && sessionStorage.getItem('address') != '' && $('#country').val() != null)
      {
        // alert("wwwwwwwwffffffffffff");
          // $("#desktop_paypal_space").show();
          $('#paypal-button-container').show();
          // $("#mobile_paypal_space").show();
          update_temporary();
      }else if($('#country').val() == 0 || $('#country').val() == null){
        swal({
            title: "Error",
            text : "Need to Choose Shipping Country",
            icon : "error",
        }).then(function() {
        });
      }
      else
      {
        swal({
            title: "Error",
            text : "Need to fill Address",
            icon : "error",
        }).then(function() {
        });
      }
    }
    else
    {
      // alert("login");
      $('#exampleModal').modal('show');
    }

  }
  function store_address(value)
  {
    console.log("Address = "+value);
    sessionStorage.setItem('address',value);
    // $("#desktop_paypal_space").hide();
    $('#paypal-button-container').hide();
    // $("#mobile_paypal_space").hide();
  }
</script>
@push('script_tag')
<script>
function get_shipping_price(ship_id)
{

  // alert(ship_id);

  $.ajax({
    type: 'POST',
    url: '/get_shipping_ajax',
    data: {
      "_token": "{{csrf_token()}}",
      "shipping_id": ship_id,
    },
    success: function (data) {
      console.log("ajax shipping cost");
      html="";
      html2="";
      html += data.shipping.price;
      html2 += parseInt(data.shipping.price)+parseInt(sessionStorage.getItem('cus_total_price'))+2;
      $('#shipping_fee').html(html);
      $('#mobile_shipping_fee').html(html);
      $('#total').html(html2);
      $('#mobile_total').html(html2);

      console.log(data);
      sessionStorage.setItem('shipping_id',data.shipping.id);
      sessionStorage.setItem('shipping_price',data.shipping.price);

    }
  });
}
function increase_count(value) {
  var html = "";

  // alert();
  $.ajax({
    type: 'POST',
    url: '/increase_count_additional',
    data: {
      "_token": "{{csrf_token()}}",
      "grand_id": value
    },
    success: function (data) {
      // start swiper
      console.log(data.additionals.photo_one);
      if (data.additionals.photo_two == null && data.additionals.photo_three == null) {
        html += `<div class="d-lg-none">
          <img src="assets/images/categories/additional/${data.additionals.photo_one}"/>
          </div>
        <div class="swiper mySwiper2 mb-3 d-none d-md-block" id="mySwiper2${data.additionals.id}">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="assets/images/categories/additional/${data.additionals.photo_one}"/>
                </div>`;
        if (data.additionals.photo_two != null) {
          html += `
                <div class="swiper-slide">
                    <img src="assets/images/categories/additional/${data.additionals.photo_two}"/>
                </div>`;
        }
        if (data.additionals.photo_three != null) {
          html += `
                <div class="swiper-slide">
                    <img src="assets/images/categories/additional/${data.additionals.photo_three}"/>
                </div>`;
        }
        html += `
            </div>
        </div>

        `;
      } else {
        html +=
          `
        <div class="swiper mySwiper2 mb-3" id="mySwiper2${data.additionals.id}">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="assets/images/categories/additional/${data.additionals.photo_one}"/>
                </div>`;
        if (data.additionals.photo_two != null) {
          html += `
                <div class="swiper-slide">
                    <img src="assets/images/categories/additional/${data.additionals.photo_two}"/>
                </div>`;
        }
        if (data.additionals.photo_three != null) {
          html += `
                <div class="swiper-slide">
                    <img src="assets/images/categories/additional/${data.additionals.photo_three}"/>
                </div>`;
        }
        html += `
            </div>
        </div>`
      }
      html += `
        <div thumbsSlider="" class="swiper mySwiper d-none d-md-block"
            id="mySwiper${data.additionals.id}">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="assets/images/categories/additional/${data.additionals.photo_one}"/>
                </div>`;
      if (data.additionals.photo_two != null) {
        html += `
                <div class="swiper-slide">
                    <img src="assets/images/categories/additional/${data.additionals.photo_two}"/>
                </div>`
      }
      if (data.additionals.photo_three != null) {
        html += `
                <div class="swiper-slide">
                    <img src="assets/images/categories/additional/${data.additionals.photo_three}"/>
                </div>`;
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

</script>
@endpush
