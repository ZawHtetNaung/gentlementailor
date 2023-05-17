@foreach($styles as $style)
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
              <div class="col-md-6 order-1 order-md-2" id="style-swiper-space{{$style->id}}">

              </div>
            </div>
          </section>

        </div>
      </div>
    </div>
  </div>
@endforeach
@push('zh-js')
  <script>
    function get_swiper(value) {
      // alert("style =-- "+value);
      var html = "";

      // alert();
      $.ajax({
        type: 'POST',
        url: '/get_swiper_style_ajax',
        data: {
          "_token": "{{csrf_token()}}",
          "style_id": value
        },
        success: function (data) {
          // start swiper
          console.log(data.styles.photo_one);
          if (data.styles.photo_two == null && data.styles.photo_three == null) {
            html += `<div class="d-lg-none">
              <img src="assets/images/categories/style/${data.styles.photo_one}"/>
              </div>
            <div class="swiper mySwiper2 mb-3 d-none d-md-block" id="mySwiper2${data.styles.id}">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="assets/images/categories/style/${data.styles.photo_one}"/>
                    </div>`;
            if (data.styles.photo_two != null) {
              html += `
                    <div class="swiper-slide">
                        <img src="assets/images/categories/style/${data.styles.photo_two}"/>
                    </div>`;
            }
            if (data.styles.photo_three != null) {
              html += `
                    <div class="swiper-slide">
                        <img src="assets/images/categories/style/${data.styles.photo_three}"/>
                    </div>`;
            }
            html += `
                </div>
            </div>

            `;
          } else {
            html +=
              `
            <div class="swiper mySwiper2 mb-3" id="mySwiper2${data.styles.id}">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="assets/images/categories/style/${data.styles.photo_one}"/>
                    </div>`;
            if (data.styles.photo_two != null) {
              html += `
                    <div class="swiper-slide">
                        <img src="assets/images/categories/style/${data.styles.photo_two}"/>
                    </div>`;
            }
            if (data.styles.photo_three != null) {
              html += `
                    <div class="swiper-slide">
                        <img src="assets/images/categories/style/${data.styles.photo_three}"/>
                    </div>`;
            }
            html += `
                </div>
            </div>`
          }
          html += `
            <div thumbsSlider="" class="swiper mySwiper d-none d-md-block"
                id="mySwiper${data.styles.id}">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="assets/images/categories/style/${data.styles.photo_one}"/>
                    </div>`;
          if (data.styles.photo_two != null) {
            html += `
                    <div class="swiper-slide">
                        <img src="assets/images/categories/style/${data.styles.photo_two}"/>
                    </div>`
          }
          if (data.styles.photo_three != null) {
            html += `
                    <div class="swiper-slide">
                        <img src="assets/images/categories/style/${data.styles.photo_three}"/>
                    </div>`;
          }
          html += `
                </div>
            </div>
            `;
          $('#style-swiper-space'+value).html(html);
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
      // alert(value);
    }
    // For pop up modal
    // var swiper = new Swiper(".thumbsSlider", {
    //   loop: true,
    //   spaceBetween: 10,
    //   slidesPerView: 5,
    //   watchSlidesProgress: true,
    //   pagination: {
    //     el: '.swiper-pagination',
    //   },
    // });
    // var swiper2 = new Swiper(".top-swiper", {
    //   loop: true,
    //   spaceBetween: 10,
    //   pagination: {
    //     el: '.swiper-pagination',
    //   },
    //   thumbs: {
    //     swiper: swiper,
    //   },
    // });

    // For see more see less
    $(document).ready(function () {
      var showChar = 100;
      var ellipsestext = "...";
      var moretext = "more";
      var lesstext = "less";
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

    // swipe menu

  </script>
@endpush
