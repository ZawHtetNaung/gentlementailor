@foreach($grands as $grand)
    <div class="modal fade" id="myCategory{{$grand->id}}">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-md-down">
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
                                 onclick="add_to_favourite('{{$grand->id}}')" style="cursor:pointer">
                                <i class="bx bx-heart me-3"></i>
                                <p class="small-text">Add to favourite fabric list</p>
                            </div>
                            </a>
                            @endif
{{--                            <div class="row mt-5">--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <label><u>Warm Rating</u></label>--}}
{{--                                    @if($grand->warm_rating != 0)--}}
{{--                                        <div class="star-rating">--}}
{{--                                            --}}{{-- {{$grand->warm_rating}} --}}
{{--                                            @if($grand->warm_rating == 1)--}}
{{--                                                <input type="radio" style="color:#f90;" id="5-stars"--}}
{{--                                                       name="rating" value="5"/>--}}
{{--                                                <label for="5-stars" class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="4-stars" name="rating"--}}
{{--                                                       value="4"/>--}}
{{--                                                <label for="4-stars" class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="3-stars" name="rating"--}}
{{--                                                       value="3"/>--}}
{{--                                                <label for="3-stars" class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="2-stars" name="rating"--}}
{{--                                                       value="2"/>--}}
{{--                                                <label for="2-stars" class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="1-star" name="rating"--}}
{{--                                                       value="1"/>--}}
{{--                                                <label for="1-star" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                            @endif--}}
{{--                                            @if($grand->warm_rating == 2)--}}
{{--                                                <input type="radio" style="color:#f90;" id="5-stars"--}}
{{--                                                       name="rating" value="5" checked/>--}}
{{--                                                <label for="5-stars" class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="4-stars" name="rating"--}}
{{--                                                       value="4"/>--}}
{{--                                                <label for="4-stars" class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="3-stars" name="rating"--}}
{{--                                                       value="3"/>--}}
{{--                                                <label for="3-stars" class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="2-stars" name="rating"--}}
{{--                                                       value="2"/>--}}
{{--                                                <label for="2-stars" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="1-star" name="rating"--}}
{{--                                                       value="1"/>--}}
{{--                                                <label for="1-star" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                            @endif--}}
{{--                                            @if($grand->warm_rating == 3)--}}
{{--                                                <input type="radio" id="5-stars" name="rating"--}}
{{--                                                       value="5" checked/>--}}
{{--                                                <label for="5-stars" class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="4-stars" name="rating"--}}
{{--                                                       value="4"/>--}}
{{--                                                <label for="4-stars" class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="3-stars" name="rating"--}}
{{--                                                       value="3"/>--}}
{{--                                                <label for="3-stars" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="2-stars" name="rating"--}}
{{--                                                       value="2"/>--}}
{{--                                                <label for="2-stars" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="1-star" name="rating"--}}
{{--                                                       value="1"/>--}}
{{--                                                <label for="1-star" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                            @endif--}}
{{--                                            @if($grand->warm_rating == 4)--}}
{{--                                                <input type="radio" id="5-stars" name="rating"--}}
{{--                                                       value="5"/>--}}
{{--                                                <label for="5-stars" class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="4-stars" name="rating"--}}
{{--                                                       value="4"/>--}}
{{--                                                <label for="4-stars" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="3-stars" name="rating"--}}
{{--                                                       value="3"/>--}}
{{--                                                <label for="3-stars" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="2-stars" name="rating"--}}
{{--                                                       value="2"/>--}}
{{--                                                <label for="2-stars" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="1-star" name="rating"--}}
{{--                                                       value="1"/>--}}
{{--                                                <label for="1-star" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                            @endif--}}
{{--                                            @if($grand->warm_rating == 5)--}}
{{--                                                <input type="radio" id="5-stars" name="rating"--}}
{{--                                                       value="5"/>--}}
{{--                                                <label for="5-stars" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="4-stars" name="rating"--}}
{{--                                                       value="4"/>--}}
{{--                                                <label for="4-stars" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="3-stars" name="rating"--}}
{{--                                                       value="3"/>--}}
{{--                                                <label for="3-stars" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="2-stars" name="rating"--}}
{{--                                                       value="2"/>--}}
{{--                                                <label for="2-stars" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="1-star" name="rating"--}}
{{--                                                       value="1"/>--}}
{{--                                                <label for="1-star" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    @else--}}
{{--                                        <div class="star-rating">--}}
{{--                                            <input type="radio" id="5-stars" name="rating"--}}
{{--                                                   value="5"/>--}}
{{--                                            <label for="5-stars" class="star">&#9733;</label>--}}
{{--                                            <input type="radio" id="4-stars" name="rating"--}}
{{--                                                   value="4"/>--}}
{{--                                            <label for="4-stars" class="star">&#9733;</label>--}}
{{--                                            <input type="radio" id="3-stars" name="rating"--}}
{{--                                                   value="3"/>--}}
{{--                                            <label for="3-stars" class="star">&#9733;</label>--}}
{{--                                            <input type="radio" id="2-stars" name="rating"--}}
{{--                                                   value="2"/>--}}
{{--                                            <label for="2-stars" class="star">&#9733;</label>--}}
{{--                                            <input type="radio" id="1-star" name="rating"--}}
{{--                                                   value="1"/>--}}
{{--                                            <label for="1-star" class="star">&#9733;</label>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <label><u>Cool Rating</u></label>--}}
{{--                                    @if($grand->cool_rating != 0)--}}
{{--                                        <div class="star-rating">--}}
{{--                                            --}}{{-- {{$grand->hot_rating}} --}}
{{--                                            @if($grand->cool_rating == 1)--}}
{{--                                                <input type="radio" style="color:#f90;" id="5-stars"--}}
{{--                                                       name="rating" value="5"/>--}}
{{--                                                <label for="5-stars" class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="4-stars" name="rating"--}}
{{--                                                       value="4"/>--}}
{{--                                                <label for="4-stars" class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="3-stars" name="rating"--}}
{{--                                                       value="3"/>--}}
{{--                                                <label for="3-stars" class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="2-stars" name="rating"--}}
{{--                                                       value="2"/>--}}
{{--                                                <label for="2-stars" class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="1-star" name="rating"--}}
{{--                                                       value="1"/>--}}
{{--                                                <label for="1-star" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                            @endif--}}
{{--                                            @if($grand->cool_rating == 2)--}}
{{--                                                <input type="radio" style="color:#f90;" id="5-stars"--}}
{{--                                                       name="rating" value="5" checked/>--}}
{{--                                                <label for="5-stars" class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="4-stars" name="rating"--}}
{{--                                                       value="4"/>--}}
{{--                                                <label for="4-stars" class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="3-stars" name="rating"--}}
{{--                                                       value="3"/>--}}
{{--                                                <label for="3-stars" class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="2-stars" name="rating"--}}
{{--                                                       value="2"/>--}}
{{--                                                <label for="2-stars" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="1-star" name="rating"--}}
{{--                                                       value="1"/>--}}
{{--                                                <label for="1-star" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                            @endif--}}
{{--                                            @if($grand->cool_rating == 3)--}}
{{--                                                <input type="radio" id="5-stars" name="rating"--}}
{{--                                                       value="5" checked/>--}}
{{--                                                <label for="5-stars" class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="4-stars" name="rating"--}}
{{--                                                       value="4"/>--}}
{{--                                                <label for="4-stars" class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="3-stars" name="rating"--}}
{{--                                                       value="3"/>--}}
{{--                                                <label for="3-stars" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="2-stars" name="rating"--}}
{{--                                                       value="2"/>--}}
{{--                                                <label for="2-stars" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="1-star" name="rating"--}}
{{--                                                       value="1"/>--}}
{{--                                                <label for="1-star" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                            @endif--}}
{{--                                            @if($grand->cool_rating == 4)--}}
{{--                                                <input type="radio" id="5-stars" name="rating"--}}
{{--                                                       value="5"/>--}}
{{--                                                <label for="5-stars" class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="4-stars" name="rating"--}}
{{--                                                       value="4"/>--}}
{{--                                                <label for="4-stars" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="3-stars" name="rating"--}}
{{--                                                       value="3"/>--}}
{{--                                                <label for="3-stars" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="2-stars" name="rating"--}}
{{--                                                       value="2"/>--}}
{{--                                                <label for="2-stars" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="1-star" name="rating"--}}
{{--                                                       value="1"/>--}}
{{--                                                <label for="1-star" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                            @endif--}}
{{--                                            @if($grand->cool_rating == 5)--}}
{{--                                                <input type="radio" id="5-stars" name="rating"--}}
{{--                                                       value="5"/>--}}
{{--                                                <label for="5-stars" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="4-stars" name="rating"--}}
{{--                                                       value="4"/>--}}
{{--                                                <label for="4-stars" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="3-stars" name="rating"--}}
{{--                                                       value="3"/>--}}
{{--                                                <label for="3-stars" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="2-stars" name="rating"--}}
{{--                                                       value="2"/>--}}
{{--                                                <label for="2-stars" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                                <input type="radio" id="1-star" name="rating"--}}
{{--                                                       value="1"/>--}}
{{--                                                <label for="1-star" style="color:#f90;"--}}
{{--                                                       class="star">&#9733;</label>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    @else--}}
{{--                                        <div class="star-rating">--}}
{{--                                            <input type="radio" id="5-stars" name="rating"--}}
{{--                                                   value="5"/>--}}
{{--                                            <label for="5-stars" class="star">&#9733;</label>--}}
{{--                                            <input type="radio" id="4-stars" name="rating"--}}
{{--                                                   value="4"/>--}}
{{--                                            <label for="4-stars" class="star">&#9733;</label>--}}
{{--                                            <input type="radio" id="3-stars" name="rating"--}}
{{--                                                   value="3"/>--}}
{{--                                            <label for="3-stars" class="star">&#9733;</label>--}}
{{--                                            <input type="radio" id="2-stars" name="rating"--}}
{{--                                                   value="2"/>--}}
{{--                                            <label for="2-stars" class="star">&#9733;</label>--}}
{{--                                            <input type="radio" id="1-star" name="rating"--}}
{{--                                                   value="1"/>--}}
{{--                                            <label for="1-star" class="star">&#9733;</label>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}

{{--                                </div>--}}
{{--                            </div>--}}
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
@endforeach

@section('js')
    <script type="text/javascript">
        function add_to_favourite(value){
            // alert(value);
            $.ajax({
            type: 'POST',
            url: '/add_to_favourite_grand',
            data: {
                "_token": "{{csrf_token()}}",
                "status":1,
                "grand_id": value,
            },
            success: function (data) {
                console.log(data.qty);
                var html = "";
                html+=`${data.qty}`;
                $('#fav-space').html(html);

                swal({
                    title: "Successfully Added To Your Favourite List!",
                    text: "",
                    type: "success",
                    icon: "success"
                }).then(function() {
                    $('#myCategory'+value).modal('hide');;
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
              "status":1,
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
<style>
    .star-rating {
        /* border:solid 1px #ccc; */
        display: flex;
        flex-direction: row-reverse;
        font-size: 1.5em;
        justify-content: space-around;
        /* padding:0 .2em; */
        text-align: center;
        width: 5em;
    }

    .star-rating input {
        display: none;
    }

    .star-rating label {
        color: #ccc;
        cursor: pointer;
    }

    /* .star-rating :checked ~ label {
      color:#f90;
    } */

    /* .star-rating label:hover,
    .star-rating label:hover ~ label {
      color:#fc0;
    } */

    /* explanation */

    article {
        background-color: #ffe;
        box-shadow: 0 0 1em 1px rgba(0, 0, 0, .25);
        color: #006;
        font-family: cursive;
        font-style: italic;
        margin: 4em;
        max-width: 30em;
        padding: 2em;
    }
</style>

