@foreach ($grands as $grand)
  <div class="modal fade" id="myCategory{{$grand->id}}">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-lg-down">
      <div class="fabric-pop modal-content">
        <!-- Modal Header -->
        <div class="modal-header border border-0">
          <button type="button" class="btn-close center-flex pt-4" data-bs-dismiss="modal"><i
              class="bx bx-x icon"></i></button>

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
                    <p class="smaller-text">colour : {{$grand->color->name}}</p>
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
                   onclick="add_to_favourite('{{$grand->id}}')" style="cursor:pointer">
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
                <div class="col-6 col-md-6" style="padding-top:1vw">
                  @if(isset(Auth::guard('web')->user()->id))
                  <button class="btn btn-warning fw-bold" onclick="add_to_cart('{{$grand->id}}','{{$grand->price}}')">Add To Cart</button>
                  @else
                  <button type="button" class="btn btn-warning fw-bold" data-bs-toggle="modal"
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

@endforeach
@section('js')
  <script type="text/javascript">
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
@endsection

