@extends('layouts.header')
@push('styles')
  <link href="{{ asset('css/suit-tips.css') }}" rel="stylesheet">
@endpush
@section('content')
  @include('layouts/nav')
  <section class="detail-container mx-auto">
    <div class="detail">
      <div class="detail__title"
           style='background-image: url({{asset("assets/images/suitTips/mesh-715.png")}});'>
        <p>Package Detail #1 Title</p>
      </div>
<!--      <div class="d-flex justify-content-between detail__info">
        <p class="blog__author">Author: <span>Shoung Gyi</span></p>
        <p class="blog__date">Date: <span>12 Dec 2022</span></p>
      </div>-->
      <div class="detail__description">
        <p>&nbsp;&nbsp;&nbsp;&nbsp; Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab
          accusantium
          blanditiis
          est
          explicabo in itaque, natus necessitatibus nobis, omnis pariatur perspiciatis praesentium
          quia recusandae tempora temporibus. Dolores eius ex itaque possimus quam repudiandae totam
          ut voluptate! Accusamus aut consectetur consequatur, delectus dicta dignissimos dolorem
          dolores doloribus eius error eveniet fugit hic impedit ipsum, iusto labore laboriosam
          maxime
          nisi nobis non nostrum officiis porro praesentium quam quidem quisquam quod ratione rem
          repudiandae sint, suscipit vel vitae voluptatem! Accusantium beatae commodi id incidunt
          quas. Ab accusamus aliquam, cupiditate eius eum fugit in iste molestiae nostrum quo
          reiciendis tempora totam voluptatem. Aut, vel!</p>
      </div>
    </div>
    <div class="latest-blog">
      <h1 class="latest__title">Latest Blogs</h1>
      <div class="row tips__items">
        <div class="col-12 col-md-6 col-lg-4 tips__item">
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
        </div>
        <div class="col-12 col-md-6 col-lg-4 tips__item">
          <img class="item__img" src="{{asset('assets/images/suitTips/img_1.png')}}" alt="">
          <div class="item__texts">
            <span class="text-white-50">Emperor of Asia - Dec 9 2022</span>
            <h6>How to Measure Upper Body</h6>
            <p class="more">adipisicing elit. Aliquid assumenda at porro reiciendis velit. Accusantium aliquam autem dicta eligendi eos fugiat illo incidunt iusto maiores molestias nisi obcaecati odio optio possimus, quam quas quasi quidem quod reprehenderit velit? Accusamus animi cumque dolore enim exercitationem in modi quisquam reprehenderit?</p>
          </div>
        </div>
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
