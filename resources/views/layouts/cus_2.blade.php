<section id="step2" class="cus-2 d-none custom">
  <h5 class="mb-5 ff-mont text-white ls-0 text-uppercase text-center">Please Select a price
    package</h5>
  <!-- <div class="row g-3 g-md-5 mt-2">
    @foreach($packages as $package)
      <div class="col-md-4 col-6 mb-md-0 d-none d-md-block">
        <div class="radio-group">
          <input type="radio" name="packages" value="{{$package->id}}" id="{{$package->id}}"
                 class="form-check-input"/>
          <label class="radio-label cursor-pointer" for="{{$package->id}}">
            <img src="{{asset('/frontend/package/'.$package->photo)}}" alt=""
                 class="img-fluid mb-1">
            <span class="text-uppercase d-block cus2-title mb-2">{{$package->title}}</span>
            <span class="text-uppercase cus2-price">price start
            from :
            {{$package->price}}</span>
          </label>
        </div>
      </div>
    @endforeach
  </div> -->
  <!-- <div class="col-md-4 col-6 mb-md-0">
      <div class="radio-group ">
        <input type="radio" name="packages" id="premium" class="form-check-input" checked/>
        <label class="radio-label cursor-pointer" for="premium">
          <img src="{{asset('assets/images/home/liam.png')}}" alt="" class="img-fluid mb-1">
          <span class="ff-cinzel">premium</span>
        </label>
      </div>
    </div>
    <div class="col-md-4 col-6 mb-md-0">
      <div class="radio-group ">
        <input type="radio" name="packages" id="legacy" class="form-check-input"/>
        <label class="radio-label cursor-pointer" for="legacy">
          <img src="{{asset('assets/images/home/liam.png')}}" alt="" class="img-fluid mb-1">
          <span class="ff-cinzel">legacy</span>
        </label>
      </div>
    </div>

  </div>
  <article class="text-center center-flex">
    <div id="description" class="w-100">
      &lt;!&ndash; <p class="mb-2">The Premium Package</p>
      <p class="text-white-50 mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        Aspernatur autem consequuntur et expedita facere illo maiores mollitia nemo, omnis
        perspiciatis quam qui quia suscipit. Accusantium explicabo inventore iste itaque
        nostrum!</p>
      <div class="d-flex text-uppercase justify-content-evenly flex-wrap mb-3">
        <p  class="mb-2">Price Start From : $ 500</p>
        <p  class="mb-2">Made In : Mars</p>
        <p  class="mb-2">Suit By : Wall-e</p>
      </div> &ndash;&gt;
    </div>
  </article>-->
  <section class="suite-package text-uppercase d-none">
    <h2 class="text-center">packages</h2>
    <div class="swiper sw-2">
      <div class="swiper-wrapper">
        <!-- Slides -->
        @foreach($packages as $package)
          <div class="radio-group swiper-slide">
            <input type="radio" name="packages" value="{{$package->id}}" id="{{$package->id}}"
                   class="form-check-input"/>
            <label class="radio-label cursor-pointer" for="{{$package->id}}">
              <img src="{{asset('/frontend/package/'.$package->photo)}}" alt=""
                   class="img-fluid mb-1">
              <span class="text-uppercase d-block cus2-title mb-2">{{$package->title}}</span>
              <span class="text-uppercase cus2-price">price start
            from :
            {{$package->price}}</span>
            </label>
          </div>
        @endforeach
        <!--        <div class="swiper-slide">
          <img src="{{asset('assets/images/home/legacy.png')}}" alt="">
          <h6 class="swiper-no-swiping mt-4">Legacy Package</h6>
          <p>price start from : $300</p>
        </div>
        <div class="swiper-slide">
          <img src="{{asset('assets/images/home/classic.png')}}" alt="">
          <h6 class="swiper-no-swiping mt-4">Classic Package</h6>
          <p>price start from : $150</p>
        </div>-->
      </div>
    </div>
  </section>

  <section class="slider">
    <div class="">
      <div class="slider">
        <div class="owl-carousel">
          @foreach($packages as $package)
          <div id="{{$package->id}}" class="slider-card text-center">
            <div class="d-flex justify-content-center align-items-center mb-4 form-check">
              <img src="{{asset('/frontend/package/'.$package->photo)}}" alt="">
              {{--<input type="radio" name="option" id="classic" class="form-check-input">--}}
              <div class="selected center-flex">
                <i class='bx bx-check'></i>
              </div>
            </div>
            <p class="mb-2">{{$package->title}}</p>
            <p class="px-4">${{$package->price}}</p>
          </div>
          @endforeach


        </div>
      </div>
    </div>
  </section>

  <div class=" d-flex justify-content-center justify-content-md-end custom mb-5">
    <button class="btn p-0 px-3 mt-5" id="next">NEXT STEP</button>
  </div>
</section>

<script>

  $(document).ready(() => {

    let owl = $('.owl-carousel').owlCarousel({
      loop: true,
      responsiveClass: true,
      center: true,
      responsive: {
        0: {
          items: 1.5,
        },
        600: {
          items: 3,
        },
        1000: {
          items: 3,
        }
      }
    })

    // Listen to owl events:
    owl.on('translated.owl.carousel', function (event) {
      // if($('.slider .owl-item.active.center ')) {
      //     console.log($('.slider-card input').attr("id"))
      // }
      // let id = "classic"
      id = $('.owl-item.active.center .slider-card').attr("id")
      // let curId = parseInt(lastId) + 1
      // id.checked();
      // let currentInput = $(id)
      // let input = '#' + id;
      console.log(id)
      var packages = @json($packages);
      $.each(packages,function(i,v){
        if(v.id == id)
        {
          sessionStorage.setItem('package_price',v.price);
        }
      })
      sessionStorage.setItem('package_id',id);

    })

  })

  const mobSwiper2 = new Swiper('.sw-2', {
    // Optional parameters
    slidesPerView: "auto",
    centeredSlides: true,
    loop: true,
    clickable: true
  });

  console.log(mobSwiper2.realIndex)

</script>
