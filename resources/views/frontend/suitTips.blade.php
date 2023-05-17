@extends('layouts.header')
@push('styles')
  <link href="{{ asset('css/suit-tips.css') }}" rel="stylesheet">
@endpush
@section('content')
  @include('layouts/nav')

  <section class="tips">
    <div class="tips__wrapper">
      <h5 class="tips__title">Featured posts</h5>
      <div class="row tips__items">

        @foreach($features as $feature)
          <div class="col-12 col-md-6 col-lg-4 tips__item">
            <img class="item__img" src="{{'/assets/images/suit_tip/'. $feature->photo}}" alt="">
            <div class="item__texts">
              <span>{{$feature->brand}} - {{ \Carbon\Carbon::parse($feature->created_at)->format('M d Y')}}</span>
              <h6>{{$feature->title}}</h6>
              <p class="item__texts-desc">{{$feature->description}}.</p>
              <button class="pop-up__button mt-4">
                <a href="/suit-tips-detail/{{$feature->id}}">Detail</a>
              </button>
            </div>
          </div>
        @endforeach

        <!-- <div class="col-12 col-md-6 col-lg-4 tips__item">
          <img class="item__img" src="{{asset('assets/images/suitTips/img_1.png')}}" alt="">
          <div class="item__texts">
            <span class="text-white-50">Emperor of Asia - Dec 9 2022</span>
            <h6>How to Measure Upper Body</h6>
            <p class="item__texts-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Nunc vulputate libero et
              velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora
              torquent per conubia nostra, per inceptos himenaeos.</p>
            <button class="pop-up__button mt-4">
              <a href="/suit-tips-detail">Detail</a>
            </button>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 tips__item">
          <img class="item__img" src="{{asset('assets/images/suitTips/img_2.png')}}" alt="">
          <div class="item__texts">
            <span class="text-white-50">Emperor of Asia - Dec 9 2022</span>
            <h6>How to Measure Upper Body</h6>
            <p class="item__texts-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Nunc vulputate libero et
              velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora
              torquent per conubia nostra, per inceptos himenaeos.</p>
            <button class="pop-up__button mt-4">
              <a href="/suit-tips-detail">Detail</a>
            </button>
          </div>
        </div> -->
      </div>
    </div>
    <div class="tips__wrapper">
      <h5 class="tips__title">Suit Tips</h5>
      <div class="row tips__items" id="tip_space">
        {{-- @foreach($suit_tips as $suit_tip)
          <div class="col-12 col-md-6 col-lg-4 tips__item">
            <img class="item__img" src="{{'/assets/images/suit_tip/'. $suit_tip->photo}}" alt="">
            <div class="item__texts">
              <span>{{$suit_tip->brand}} -{{ \Carbon\Carbon::parse($suit_tip->created_at)->format('M d Y')}}</span>
              <h6>{{$suit_tip->title}}</h6>
              <p class="item__texts-desc">{{$suit_tip->description}}.</p>
              <button class="pop-up__button mt-4">
                <a href="/suit-tips-detail/{{$feature->id}}">Detail</a>
              </button>
            </div>
          </div>
        @endforeach --}}

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
    </div>


  </section>

  @include('layouts/footer')
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
@push('script_suit_tip_infinite')
<script>
  //start infinite scroll
  var ENDPOINT = "{{ url('/') }}";
  var page = 1;
  var start = 0;
  var pageNo = 0;
  infinteLoadMore(page)
  $(window).scroll(function () {
    // alert("jfdkdf");
    if ($(window).scrollTop() + $(window).height() >= ($(document).height() - 300)) {
      page++;
      start = (page * 6) - 6;
      // console.log('Page = ' + page);
      if (page <= 6) {
        infinteLoadMore(page);
      }
    }
  })
  function infinteLoadMore(page) {
    // alert("kfdjfdk");
    $.ajax({
      url: ENDPOINT + "/suit-tips?page=" + page,
      datatype: "html",
      type: "get",
      history: false,
      data: {
        "_token": "{{csrf_token()}}",

        "start" : start
      },
      beforeSend: function () {
        $('.auto-load').show();
      }
    })
      .done(function (response) {
        console.log(response.length);
        if (response.res.length == 0) {
          $('.auto-load').html("");
          return;
        }
        $('.auto-load').hide();

        $("#tip_space").append(response.res);
        // $("#grand_space").fadeIn(3000);
        // console.log("fade")
        // $("#myModal").modal()
      })
      .fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log('Server error occured');
      });
  }
  //end infinite scroll

</script>
@endpush
