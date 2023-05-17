<div class="content" id="vest">
  <div class="row g-0 g-md-5">
    <div class="col-md-4 sticky-md-top sticky-height pt-3">
      <div class="nav flex-column text-uppercase">
        <h6 class="ff-mont text-white mb-3">customize</h6>
        @foreach($vests as $vest)
        <a onclick="vest_lapel('{{$vest->style}}')" class="pill-menu-cus-link py-2 active" data-bs-toggle="pill"
           href="#vest-lapel">
          <span>{{$vest->style}}</span>
          <i class='bx bx-plus'></i>
        </a>
        @endforeach

      </div>
    </div>
    <div class="col-md-8">
      <div class="tab-content">
        <div class="tab-pane active" id="vest-lapel">
          {{-- @foreach($not_unique_vests as $not_unique_vest)
          <label class="row cursor-pointer mb-5" for="sb1">
                <span class="col-md-6 mb-2 d-flex flex-column justify-content-center">
                  <span class="row g-0 mb-2">
                    <span class="col-1 mt-1">
                       <input type="radio" name="vest" id="choose_vest{{$not_unique_vest->id}}" value="{{$not_unique_vest->id}}"
                              class="form-check-input me-2 mb-1" onclick="getvest(this.value)"/>
                    </span>
                    <span class="col-11 ps-2">
                      <span class="title">{{$not_unique_vest->color}}</span>
                    </span>
                  </span>
                  <span class="text-white-50 d-block">
                    {{$not_unique_vest->description}}
                  </span>
                </span>
            <span class="col-md-6 jacket">
                <span class="fit-img-container">
                  <img src="{{'/assets/images/customize/shirt_button/'. $not_unique_vest->photo_one}}" alt="" class="">
                </span>
              </span>
          </label>
          @endforeach --}}
          <!-- <label class="row cursor-pointer mb-5" for="sb2">
                <span class="col-md-6 mb-2 d-flex flex-column justify-content-center">
                  <span class="row g-0 mb-2">
                    <span class="col-1 mt-1">
                       <input type="radio" name="jacket" id="sb2"
                              class="form-check-input me-2 mb-1"/>
                    </span>
                    <span class="col-11 ps-2">
                      <span class="title">Single Breasted two Button</span>
                    </span>
                  </span>
                  <span class="text-white-50 d-block">
                    Lorem ipsum dolor sit amet, consectetur
                    adipisicing
                    elit.
                  </span>
                </span>
            <span class="col-md-6 jacket">
                <span class="fit-img-container">
                  <img src="{{asset('/assets/images/fabrics/img_1.png')}}" alt="" class="">
                </span>
              </span>
          </label>
          <label class="row cursor-pointer mb-5" for="sb3">
                <span class="col-md-6 mb-2 d-flex flex-column justify-content-center">
                  <span class="row g-0 mb-2">
                    <span class="col-1 mt-1">
                       <input type="radio" name="jacket" id="sb3"
                              class="form-check-input me-2 mb-1"/>
                    </span>
                    <span class="col-11 ps-2">
                      <span class="title">Single Breasted three Button</span>
                    </span>
                  </span>
                  <span class="text-white-50 d-block">
                    Lorem ipsum dolor sit amet, consectetur
                    adipisicing
                    elit.
                  </span>
                </span>
            <span class="col-md-6 jacket">
                <span class="fit-img-container">
                  <img src="{{asset('/assets/images/fabrics/img_1.png')}}" alt="" class="">
                </span>
              </span>
          </label> -->
        </div>
        <div class="auto-load text-center">
          <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg"
               xmlns:xlink="http://www.w3.org/1999/xlink"
               x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0"
               xml:space="preserve">
                    <path fill="#000"
                          d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                      <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                                        dur="1s"
                                        from="0 50 50" to="360 50 50" repeatCount="indefinite"/>
                    </path>
                </svg>
        </div>
        <div class="tab-pane fade" id="lapels">Menu1</div>
        <div class="tab-pane fade" id="lapel-hole">Menu2</div>
      </div>
    </div>
  </div>
</div>
@push('script_vest_infinite')
<script>
// infinteLoadMoreJacket(page);
function vest_infinite_scroll_start(style)
{
  //start jacket infinite scroll
  var ENDPOINT = "{{ url('/') }}";
  var page = 1;
  var start = 0;
  var pageNo = 0;
  var style = style;
    infinteLoadMoreVest(page,style)


  $(window).scroll(function () {
    // alert($('#jacket_box').val());
    if ($(window).scrollTop() + $(window).height() >= ($(document).height() - 300)) {
      page++;
      start = (page * 6) - 6;
      // console.log('Page = ' + page);
      if (page <= 4) {

        infinteLoadMoreVest(page,style);

      }
    }
  })
  function infinteLoadMoreVest(page,style) {
    // alert("kfdjfdk");
    var jacket_status = 0;
    var pant_status = 0;
    var vest_status = 1;
    $.ajax({
      url: ENDPOINT + "/customize?page=" + page,
      datatype: "html",
      type: "get",
      history: false,
      data: {
        "_token": "{{csrf_token()}}",
        "jacket_status" : jacket_status,
        "pant_status" : pant_status,
        "vest_status" : vest_status,
        "style" : style,
        "start" : start
      },
      beforeSend: function () {
        $('.auto-load').show();
      }
    })
      .done(function (response) {
        // console.log(response.length);
        if (response.res.length == 0) {
          $('.auto-load').html("");
          return;
        }
        $('.auto-load').hide();

        $("#vest-lapel").append(response.res);
        //checked if vest is checked start
        if(sessionStorage.getItem('vest_id') != '' && sessionStorage.getItem('vest_id') != null)
        {
          $('#choose_vest'+sessionStorage.getItem('vest_id')).attr('checked',true);
        }
        //checked if vest is checked end
        // $("#grand_space").fadeIn(3000);
        // console.log("fade")
        // $("#myModal").modal()
      })
      .fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log('Server error occured');
      });
  }
  //end infinite scroll

}
function vest_lapel(style) {
  // alert(style);
  $('#vest-lapel').html("");
    page = 1;
    start = 0;
    vest_infinite_scroll_start(style)

  }
</script>
@endpush
