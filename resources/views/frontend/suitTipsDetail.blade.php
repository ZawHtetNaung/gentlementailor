@extends('layouts.header')
@push('styles')
  <link href="{{ asset('css/suit-tips.css') }}" rel="stylesheet">
@endpush
@section('content')
  @include('layouts/nav')
  <section class="detail-container mx-auto">
    <div class="detail">
      <div class="detail__title"
           style='background-image: url({{asset("/assets/images/suit_tip/". $suit_tip->photo)}});'>
        <p>{{$suit_tip->title}}</p>
      </div>
      <div class="d-flex justify-content-between detail__info">
        <p class="blog__author">Author: <span>{{$suit_tip->admin}}</span></p>
        <p class="blog__date">Date: <span>{{ \Carbon\Carbon::parse($suit_tip->created_at)->format('M d Y')}}</span></p>
      </div>
      <div class="detail__description">
        <p> {{$suit_tip->description}}</p>
      </div>
    </div>
    <div class="latest-blog">
      <h1 class="latest__title">Latest Blogs</h1>
      <div class="row tips__items">
        @foreach($latest_suit_tips as $latest_suit_tip)
        <div class="col-12 col-md-6 col-lg-4 tips__item">
          <img class="item__img" src="{{'/assets/images/suit_tip/'. $latest_suit_tip->photo}}" alt="">
          <div class="item__texts">
            <span class="text-white-50">Emperor of Asia -{{ \Carbon\Carbon::parse($latest_suit_tip->created_at)->format('M d Y')}}</span>
            <h6>{{$latest_suit_tip->title}}</h6>
            <p class="more">{{$latest_suit_tip->description}}</p>
            <button class="pop-up__button mt-4">
              <a href="/suit-tips-detail/{{$latest_suit_tip->id}}">Detail</a>
            </button>
          </div>
        </div>
        @endforeach
        <!-- <div class="col-12 col-md-6 col-lg-4 tips__item">
          <img class="item__img" src="{{asset('assets/images/suitTips/img_1.png')}}" alt="">
          <div class="item__texts">
            <span class="text-white-50">Emperor of Asia - Dec 9 2022</span>
            <h6>How to Measure Upper Body</h6>
            <p class="more">adipisicing elit. Aliquid assumenda at porro reiciendis velit. Accusantium aliquam autem dicta eligendi eos fugiat illo incidunt iusto maiores molestias nisi obcaecati odio optio possimus, quam quas quasi quidem quod reprehenderit velit? Accusamus animi cumque dolore enim exercitationem in modi quisquam reprehenderit?</p>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 tips__item">
          <img class="item__img" src="{{asset('assets/images/suitTips/img_1.png')}}" alt="">
          <div class="item__texts">
            <span class="text-white-50">Emperor of Asia - Dec 9 2022</span>
            <h6>How to Measure Upper Body</h6>
            <p class="more">adipisicing elit. Aliquid assumenda at porro reiciendis velit. Accusantium aliquam autem dicta eligendi eos fugiat illo incidunt iusto maiores molestias nisi obcaecati odio optio possimus, quam quas quasi quidem quod reprehenderit velit? Accusamus animi cumque dolore enim exercitationem in modi quisquam reprehenderit?</p>
          </div>
        </div> -->
      </div>
    </div>
  </section>
  @include('layouts/footer')
@endsection
@section('js')
  <script>
    {{--read more read less--}}
    $(document).ready(function () {
      var showChar = 40;
      var ellipsestext = "...";
      var moretext = "Read More";
      var lesstext = "Read Less";
      $('.more').each(function () {
        var content = $(this).html();

        if (content.length > showChar) {

          var c = content.substr(0, showChar);
          var h = content.substr(showChar - 1, content.length - showChar);

          var html = c + '<span class="moreelipses">' + ellipsestext + '</span>&nbsp;<span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

          $(this).html(html);
        }

      });

      $(".morelink").click(function () {
        if ($(this).hasClass("less")) {
          $(this).removeClass("less");
          $(this).html(moretext);
        } else {
          $(this).addClass("less");
          $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
      });
    });
  </script>
@endsection
