<section id="step3" class="cus-2 custom d-none">


  <div class="upload d-flex flex-column flex-md-row justify-content-center
  justify-content-md-end
  align-items-center mt-5">
    <!--    <div class="d-flex">
          <i class='bx bx-upload me-2'></i>
          <a href="#" id="uploadText" class="text-uppercase mb-4">upload my style</a>
          <input type="file" id="uploadInput" class="d-none">
        </div>-->
    <!--    <h6 class="ff-mont text-white ls-0 text-uppercase mb-0 d-none d-md-block">Style
          recommendations</h6>-->

    <select onchange="style_filter(this.value)" name="" id="cus2_option" class="rec-type">
      {{-- <option value="TWO PIECES OUTFIT" selected>Choose Pieces</option> --}}
      <option value="2" selected>Two Pieces Outfit</option>
      <option value="3">Three Pieces Outfit</option>
      <!--      <option value="twopoutfit">Two Pieces Outfit</option>
      <option value="threepoutfit">Three Pieces Outfit</option>-->
    </select>

  </div>
  <!--
  *6767# *224#
  -->
  <div class="top-margin mt-3">
   <div class="d-none d-lg-block">
    <div id="style_nav" class="nav nav-pills text-uppercase justify-content-between">
      @foreach($style_cates as $style_cate)
        <button onclick="style_nav('{{$style_cate->name}}','{{$style_cate->id}}')"
           class="nav-link d-none d-md-none d-lg-block text-white-50 styleNav"
           data-bs-target="#style_nav_{{$style_cate->id}}"
           data-bs-toggle="pill"
           id="style_nav_check_{{$style_cate->id}}"
           href="{{$style_cate->name}}" aria-selected="true">{{$style_cate->name}}</button>
      @endforeach
      </div>
      </div>
      <div class="d-block d-lg-none">
        <div id="style_nav" class="menu-wrapper">
          <!-- Slides -->
          @foreach($style_cates as $style_cate)
            <div class="menu__item">
              <button onclick="style_nav('{{$style_cate->name}}','{{$style_cate->id}}')"
                 class="nav-link text-white-50"
                 data-bs-target="#style_nav_{{$style_cate->id}}"
                 data-bs-toggle="pill"
                 id="style_nav_check_{{$style_cate->id}}"
                 href="{{$style_cate->name}}" aria-selected="true">{{$style_cate->name}}</button>
            </div>
          @endforeach
        </div>
</div>

      </div>
    </div>
    <!-- Tab panes -->
    <div class="tab-content mt-4" style="margin-bottom: 50px;">


      <div class="tab-pane container active mx-0 px-0" id="style_nav_" aria-labelledby="style_nav_check_">

        <div id="style_card" class="row g-3 g-md-5" style="max-width:1300px">



        </div>

      </div>

    </div>
  </div>


<!--  <div class=" d-flex justify-content-center justify-content-md-end custom mb-5">
    <button class="btn p-0 px-3 mt-5" data-bs-toggle="modal" data-bs-target="#step3-unconfirm">NEXT
      STEP
    </button>
  </div>-->
  <!-- <div class=" d-flex justify-content-center justify-content-md-end custom mb-5">
    <button class="btn p-0 px-3 mt-5" data-bs-toggle="modal"
            data-bs-target="#step3-confirm">NEXT STEP
    </button>
  </div> -->

  <!-- The Modal for not choice confirmation -->
  <div class="modal fade" id="step3-unconfirm">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-navy rounded-0">
        <!-- Modal body -->
        <div class="modal-body text-center">
          <h6 class="ff-mont text-uppercase text-bold h5 mt-4 mb-3">Start your customization ?</h6>
          <span>First, you must select the style!</span>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer border-0 mx-auto mb-4">
          <button class="btn border border-1 rounded-0 p-0 px-2 py-1 text-white me-3"
                  data-bs-dismiss="modal">BACK TO STYLE
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
  <!-- The Modal for confirmation -->
  <div class="modal fade" id="step3-confirm">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-navy rounded-0">
        <!-- Modal body -->
        <div class="modal-body text-center">
          <h6 class="ff-mont text-uppercase text-bold h5 mt-4 mb-3">Start your customization ?</h6>
          <span>In next step , we are going to start detail customization for your clothing. Please
            make sure you want to start your customize.</span>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer border-0 mx-auto mb-4">
          <button class="btn border border-1 rounded-0 p-0 px-2 py-1 text-white me-3"
                  data-bs-dismiss="modal">BACK TO STYLE
          </button>

          <a type="btn"
             class="btn bg-gold rounded-0 p-0 px-2 py-1 d-flex justify-content-evenly align-items-center"
             id="next-one">
            <span class="text-navy">NEXT STEP</span>
            <i class='bx bx-chevron-right'></i>
          </a>
        </div>

      </div>
    </div>
  </div>
  {{-- style modal start --}}
  {{-- @foreach($styles as $style)
  <div class="modal fade" id="myCategory{{$style->id}}">
      <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-lg-down pop-up__modal">
        <div class="modal-content">
          <!-- Modal body -->
          <div class="modal-body">
            <div class="close-btn-wrapper">
              <button type="button" class="btn-close btn-close-white"
                      data-bs-dismiss="modal"></button>
            </div>
            <section class="pop-up">
              <div class="row g-0 g-lg-5">
                <div class="col-12 col-lg-6 order-last order-lg-first">
                  <h5 class="pop-up__title d-none d-lg-block">{{$style->category}}</h5>
                  <p class="pop-up__description">{{$style->description}}</p>
                  <div class="row pop-up__feature-list">
                    <div class="col-12 col-lg-6 row g-0 check-wrapper">
                      <div class="col-2 check-icon"><i class='bx bx-check'></i></div>
                      <div class="col-10 check-text">colour : {{$style->colour}}
                      </div>
                    </div>
                    <div class="col-12 col-lg-6 row g-0 check-wrapper">
                      <div class="col-2 check-icon"><i class='bx bx-check'></i></div>
                      <div class="col-10 check-text">Fabric :
                        {{$style->fabric}}
                      </div>
                    </div>
                    <div class="col-12 col-lg-6 row g-0 check-wrapper">
                      <div class="col-2 check-icon"><i class='bx bx-check'></i></div>
                      <div class="col-10 check-text">Fabric Type :
                        {{$style->fabric_type}}
                      </div>
                    </div>
                    <div class="col-12 col-lg-6 row g-0 check-wrapper">
                      <div class="col-2 check-icon"><i class='bx bx-check'></i></div>
                      <div class="col-10 check-text">composition : {{$style->compostition}}
                      </div>
                    </div>
                    <div class="col-12 col-lg-6 row g-0 check-wrapper">
                      <div class="col-2 check-icon"><i class='bx bx-check'></i></div>
                      <div class="col-10 check-text">softness : {{$style->softness}}
                      </div>
                    </div>
                  </div>
                  <label id="style_modal_click{{$style->id}}" class="pop-up__button"
                     for="style_check{{$style->id}}" onclick="style_rec('{{$style->id}}','{{$style->name}}')"
                           data-bs-toggle="modal" data-bs-target="#step3-confirm">
                    pick this style
                  </label>
                </div>
                <div class="col-12 col-lg-6 order-first order-lg-last swiper-container">
                  <h5 class="pop-up__title d-block d-lg-none">Business conference style 2</h5>
                  <div class="swiper mySwiper2 top-swiper" id="mySwiper2{{$style->id}}">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <img src="{{'/assets/images/categories/style/'. $style->photo_one}}"/>
                      </div>
                      <div class="swiper-slide">
                        <img src="{{'/assets/images/categories/style/'. $style->photo_two}}"/>
                      </div>
                      <div class="swiper-slide">
                        <img src="{{'/assets/images/categories/style/'. $style->photo_three}}"/>
                      </div>
                    </div>
                    <div class="swiper-pagination"></div>
                  </div>
                  <div thumbsSlider="" class="swiper thumbsSlider d-none d-md-block">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <img src="{{'/assets/images/categories/style/'. $style->photo_one}}"/>
                      </div>
                      <div class="swiper-slide">
                        <img src="{{'/assets/images/categories/style/'. $style->photo_two}}"/>
                      </div>
                      <div class="swiper-slide">
                        <img src="{{'/assets/images/categories/style/'. $style->photo_three}}"/>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </section>

          </div>
        </div>
      </div>
    </div>
  @endforeach --}}

  {{-- style modal end --}}
</section>
<script>
  $(document).ready(function () {
    // var scc = sessionStorage.getItem('style_cate_name');
    // alert(typeof(scc));
    // $('#style_nav_check_'+scc).addClass('active');
    $('.rec-type').select2({
      minimumResultsForSearch: Infinity
    });
  });

  const swiperMenu = new Swiper('.swiper-cus3-menu', {

    // Optional parameters
    loop: true,
    spaceBetween: 20,
    freeMode: {
      enabled: true,
      sticky: true,
    },
    breakpoints: {
      1000: {
        slidesPerView: 4.5,
      },
      768: {
        slidesPerView: 3.5,
      },
      480: {
        slidesPerView: 2.5,
      },
      0: {
        slidesPerView: 2.3,
      },
    }
  });


  const upload_input = $('#uploadInput')
  const upload_text = $('#uploadText')

  upload_text.click(() => {
    upload_input.click();
  })

  const modalNext = $('#next-one');
  modalNext.attr('data-bs-dismiss', 'modal')
  modalNext.click(() => {
    $('#next').click();
  });

</script>
