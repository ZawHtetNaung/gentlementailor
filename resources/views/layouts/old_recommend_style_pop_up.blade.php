@foreach($styles as $style)
  <div class="modal fade style_modal" id="myCategory{{$style->name}}">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-lg-down">
      <div class="fabric-pop modal-content">
        <!-- Modal Header -->
        <div class="modal-header border border-0">
          <div></div>
          <button type="button" class="btn-close btn-close-white center-flex pt-4"
                  data-bs-dismiss="modal"></button>

        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <h5 class="ff-mont text-white text-uppercase mb-5 text-wrap" style="
                margin-bottom: 0% !important;
            ">
            {{$style->category}}
          </h5>
          <h5 class="ff-mont text-white text-uppercase mb-5 text-wrap">
            {{$style->name}}
          </h5>
          <div class="row">
            <div class="col-md-6 order-2 order-md-1 mt-4 mt-md-0">

              <p class="small-text mb-3 mb-md-5 text-wrap">{{$style->description}}</p>
              <div class="row mb-4 text-uppercase">
                <div class="col-md-6">
                  <div class="d-flex align-items-center mb-2">
                    <i class="bx bx-check text-gold me-3"></i>
                    <p class="smaller-text">colour : {{$style->colour}}</p>
                  </div>
                  <div class="d-flex align-items-center mb-2">
                    <i class="bx bx-check text-gold me-3"></i>
                    <p class="smaller-text">Fabric :
                      {{$style->fabric}}</p>
                  </div>
                  <div class="d-flex align-items-center mb-2">
                    <i class="bx bx-check text-gold me-3"></i>
                    <p class="smaller-text">Fabric Type :
                      {{$style->fabric_type}}</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex align-items-center mb-2">
                    <i class="bx bx-check text-gold me-3"></i>
                    <p class="smaller-text">composition : {{$style->compostition}}</p>
                  </div>
                  <div class="d-flex align-items-center mb-2">
                    <i class="bx bx-check text-gold me-3"></i>
                    <p class="smaller-text">softness : {{$style->softness}}</p>
                  </div>
                  <!-- <div class="d-flex align-items-center mb-2">
                     <i class="bx bx-check text-gold me-3"></i>
                     <p class="smaller-text">Price : $ {{$style->price}}</p>
                   </div> -->
                </div>
              </div>
              <div class="row">
                <div class="col-6 col-md-6">

                  {{-- <form action="" method="post"> --}}
                  <input type="hidden" name="amount" value="">
                  <!--                  <button type="btn" class="btn btn-warning my-3 fw-bold"
                          onclick="style_rec('{{$style->id}}','{{$style->name}}')"
                          data-bs-toggle="modal"
                          data-bs-target="#step3-confirm"><img
                      style="display: inline!important;width:1.5vw"
                      src=""/>PICK THIS STYLE
                  </button>-->
                  <label id="style_modal_click{{$style->id}}" class="radio-label cursor-pointer btn px-3 py-1 mt-5 bg-gold rounded-0"
                         for="style_check{{$style->id}}" onclick="style_rec('{{$style->id}}','{{$style->name}}')"
                         data-bs-toggle="modal" data-bs-target="#step3-confirm">Pick This Style</label>
<!--                  <button class="btn px-3 py-1 mt-5 bg-gold rounded-0"
                          onclick="style_rec('{{$style->id}}','{{$style->name}}')"
                          data-bs-toggle="modal" data-bs-target="#step3-confirm">
                    Pick This Style
                  </button>-->
                  {{-- </form> --}}
                </div>
              </div>
            </div>
            <div class="col-md-6 order-1 order-md-2" id="swiper-space">
              <div class="d-lg-none">
                <img src="{{'/assets/images/categories/style/'. $style->photo_one}}"/>
              </div>
              <div class="swiper mySwiper2 mb-3 d-none d-md-block" id="mySwiper2">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <img src="{{'/assets/images/categories/style/'. $style->photo_one}}"/>
                    hi
                  </div>
                  ;

                </div>
              </div>
              <!-- <div thumbsSlider="" class="swiper mySwiper d-none d-md-block"
                id="mySwiper2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{'/assets/images/categories/style/'. $style->photo_one}}"/>
                    </div>
                </div>
            </div> -->
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
@endforeach


