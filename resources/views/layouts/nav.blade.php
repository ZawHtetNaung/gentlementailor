<nav class="mx-3 mx-md-3 mx-lg-5 my-1 my-md-0">
  @include('layouts.popup')
  @include('flash-message')
  <div class="row g-0 align-items-center">
    <div class="col-4 order-1 order-lg-3 d-flex justify-content-start justify-content-lg-end">
      <form action="{{route('search')}}" method="get"  id="searchForm" class="d-none d-lg-block">
        <div class="input-group" id="search">
          <span class="input-group-text" id="basic-addon1">
            <i class='bx bx-search'></i>
          </span>
          <input name="gg" type="text" class="form-control form-control-sm"
                 placeholder="search anything you want. . ." id="search-input">
          <button class="btn rounded-0 text-uppercase"
                  type="submit">Search
          </button>
        </div>

      </form>

      <div
        class="d-lg-none d-flex justify-content-center justify-content-md-start justify-content-lg-end">
        <a href="#" type="button" data-bs-toggle="offcanvas"
           data-bs-target="#burger" class="me-2 me-md-3 center-flex">
          <i class='bx bx-menu icon'></i>
        </a>
        <a href="#" class="center-flex"><i class='bx bx-search icon mob-search-icon'></i></a>
      </div>
    </div>
    <div class="col-4 order-2">
      <a href="/" class="center-flex">
        <img src="{{asset('assets/images/home/logo.png')}}" alt="" class="logo">
      </a>
    </div>
    <div class="col-4 order-3 order-lg-1
                    d-flex justify-content-end justify-content-md-end justify-content-lg-start">

      <div class="d-flex menu-title">
        <p class="me-4 text-uppercase my-auto d-none d-lg-block "><a
            href="#">Contact Us</a></p>
        {{-- <a href="#" class="me-2 me-md-3 center-flex"><i class='bx bx-heart icon'></i></a>
        <a href="#" class="me-2 me-md-3 center-flex"><i class='bx bx-shopping-bag icon'
            ></i></a> --}}
        @if(isset(Auth::guard('web')->user()->id))
        <input type="hidden" style="color:black" value="{{Auth::guard('web')->user()->id}}" id="hidden_user_id">
          <a onclick="profile()" href="{{route('profile')}}" class="position-relative me-2 me-md-3 center-flex">
            <i class='bx bx-heart icon text-danger'></i>
            <span
              class="position-absolute top-0 start-100 translate-middle badge rounded-pill">
                        <span class="smallest-text" style="font-size:9px;"
                              id="fav-space">0</span>
                      <span class="visually-hidden">unread messages</span>
                    </span>
          </a>
          <a href="{{url('cart')}}" class="position-relative me-2 me-md-3 center-flex">
            <i class='bx bx-shopping-bag icon text-warning'
            ></i>
            <span
              class="position-absolute top-0 start-100 translate-middle badge rounded-pill">
                        <span class="smallest-text" style="font-size:9px;"
                              id=""><span id="total_cart_qty">0</span></span>
                      <span class="visually-hidden">unread messages</span>
                    </span>
          </a>
          {{-- <p class="text-danger">{{Session::get('user_id')}}</p> --}}
                              <a class="me-2 me-md-3 center-flex"
                       onclick="logout()">
                        <i class='bx bx-log-out bx-flip-horizontal icon' ></i>
                    </a>
          <a class="me-2 me-md-3 center-flex" href="/profile">
            <i class='bx bx-user-circle icon'><!--<span id="total_qty"></span>--></i>
          </a>
          <!-- <form id="logout-form" action="{{ route('.logout') }}" method="POST"
                          class="d-none">
                        @csrf
          </form> -->

        @else
          <a type="button" data-bs-toggle="modal"
             data-bs-target="#exampleModal" class="me-2 me-md-3 center-flex"><i
              class='bx bx-heart icon'></i></a>
          <a type="button" data-bs-toggle="modal"
             data-bs-target="#exampleModal" class="me-2 me-md-3 center-flex"><i
              class='bx bx-shopping-bag icon'
            ></i></a>
          <a type="button" class="center-flex" data-bs-toggle="modal"
             data-bs-target="#exampleModal">
            <i class='bx bx-user icon'></i>

          </a>
        @endif
        {{--                <a href="#"><i class="fa-regular fa-user icon"></i></a>--}}
      </div>
    </div>
  </div>
  <div class="d-none d-lg-block py-2">
    <div class="d-flex justify-content-center py-2">
      <div class="menu-title me-5">
        <p class="ls-0 text-uppercase"><a href="/">Home</a></p>
      </div>
      <!--<div class="menu-title me-5" id="what-new">
          <p class="ls-0">What's new</p>
      </div>-->
      <!--<div class="menu-title me-5" id="shop-by">
          <p class="ls-0">Shop By</p>
      </div>-->
      <div class="menu-title me-5">
        <p class="ls-0 text-uppercase"><a href="/customize" onclick="check_temporary()">Shop Now
          </a></p>
      </div>
      <!--      <div class="menu-title me-5" id="fabric">
              <p class="ls-0"><a href="/fabrics">Fabrics & Textures</a></p>
            </div>-->
      <div class="menu-title me-5" id="fix-price">
        <p class="ls-0 text-uppercase"><a href="/ready-to-wear">Ready to Wear</a></p>
      </div>
      <div class="menu-title me-5" id="size-guide">
        <p class="ls-0 text-uppercase"><a href="/suit-tips">Suit tips</a></p>
      </div>
      <div class="menu-title me-5" id="add-on">
        <p class="ls-0 text-uppercase"><a href="/additional">Additional</a></p>
      </div>
    </div>
    <!--
        <div class="content-wrapper">
            &lt;!&ndash; what news &ndash;&gt;
            <div id="item-what-new">
                <div class="row g-0">
                    <div class="col-md-4 px-5 py-4">
                        <div class="text-uppercase">
                            <p class="fw-bolder mb-4">What's News</p>
                            <p>Trending</p>
                        </div>
                    </div>
                    <div class="col-md-8 d-flex flex-column align-items-end px-5 py-4">
                        <div class="">
                            <div class="text-uppercase mb-5">
                                <p class="fw-bolder">trending style</p>
                            </div>
                            <div class="d-flex gap-3">
                                <div class="news-img ">
                                    <img
                                        src="{{asset('assets/images/home/trend-1.png')}}"
                                        class="img-fluid" alt="">
                                </div>
                                <div class="news-img ">
                                    <img
                                        src="{{asset('assets/images/home/trend-2.png')}}"
                                        class="img-fluid" alt="">
                                </div>
                                <div class="news-img ">
                                    <img
                                        src="{{asset('assets/images/home/trend-3.png')}}"
                                        class="img-fluid" alt="">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            &lt;!&ndash; shop by &ndash;&gt;
            <div id="item-shop-by">
                <div class="row g-0">
                    <div class="col-md-2 ps-4 py-4">
                        <div class="text-uppercase">
                            <p class="fw-bolder mb-4">OCCASIONS</p>
                            <p class="mb-2">VACATION</p>
                            <p class="mb-2">WEDDING</p>
                            <p class="mb-2">BUSINESS MEETING</p>
                            <p class="mb-2">DINNER</p>
                            <p class="mb-2">EVENTS</p>
                        </div>
                    </div>
                    <div class="col-md-2 px-3 py-4">
                        <div class="text-uppercase">
                            <p class="fw-bolder mb-4">STYLES</p>
                            <p class="mb-2">WEDDING GUEST</p>
                            <p class="mb-2">BRIDE</p>
                            <p class="mb-2">WORK</p>
                            <p class="mb-2">FORMAL WEAR</p>
                            <p class="mb-2">OUTDOOR</p>
                            <p class="mb-2">CASUAL WEAR</p>
                        </div>
                    </div>
                    <div class="col-md-3 ps-5 py-4">
                        <div class="text-uppercase">
                            <p class="fw-bolder mb-4">Colors</p>
                            <div class="d-flex gap-2 mb-3">
                                <div class="circle" style="background: #111216"></div>
                                <div class="circle" style="background: #29292A"></div>
                                <div class="circle" style="background: #102735"></div>
                                <div class="circle" style="background: #675E52"></div>
                            </div>
                            <div class="d-flex gap-2 mb-5">
                                <div class="circle" style="background: #8F503E"></div>
                                <div class="circle" style="background: #403B1A"></div>
                                <div class="circle" style="background: #445270"></div>
                                <div class="circle" style="background: #050D19"></div>
                            </div>
                            <a href="" class="text-decoration-underline">More Colors</a>
                        </div>
                    </div>
                    <div class="col-md-5 px-5 py-4">
                        <div class="text-uppercase mb-4">
                            <p class="fw-bolder">ocassions</p>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="position-relative news-img">
                                <img class="img-fluid"
                                     src="{{asset('assets/images/home/occ-1.png')}}"
                                     alt="">
                                <div class="card-img-overlay ms-3 text-white" style="top: 80%">
                                    <p class="text-uppercase">shirts</p>
                                </div>
                            </div>
                            <div class="position-relative news-img">
                                <img class="img-fluid"
                                     src="{{asset('assets/images/home/occ-2.png')}}"
                                     alt="">
                                <div class="card-img-overlay ms-3 text-white" style="top: 80%">
                                    <p class="text-uppercase">belts</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            &lt;!&ndash; Fabric &ndash;&gt;
            <div id="item-fabric">
                <div class="row g-0 ">
                    <div class="col-md-4 px-5 py-4">
                        <div class="text-uppercase">
                            <p class="fw-bolder mb-4">fabrics & colours</p>
                            <ul class="nav-pills" role="tablist">
                                <li class="nav-item mb-2 w-50">
                                    <p><a class="nav-link m-0 p-0 active" data-bs-toggle="pill"
                                          href="#fabrics">fabrics
                                        </a></p>
                                </li>
                                <li class="nav-item mb-2 w-50">
                                    <p><a class="nav-link m-0 p-0" data-bs-toggle="pill"
                                          href="#colours">Colours</a></p>
                                </li>
                                <li class="nav-item mb-2 w-50">
                                    <p><a class="nav-link m-0 p-0" data-bs-toggle="pill"
                                          href="#buttons">Buttons</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 d-flex flex-column align-items-end px-5 py-4">
                        <div class="">
                            <div class="tab-content">
                                <div id="fabrics" class="container tab-pane active">
                                    <div class="text-uppercase mb-5">
                                        <p class="fw-bolder">fabrics</p>
                                    </div>
                                    <div class="gap-3 center-flex flex-row">
                                        <div class="news-img w-50 me-5">
                                            <img
                                                src="{{asset('assets/images/home/fabric.png')}}"
                                                class="img-fluid" alt="">
                                        </div>
                                        <div class="text-uppercase">
                                            <p class="mb-3">you can see all the frabrics we have
                                                and
                                                can use at your customizarion</p>
                                            <p><a href="#" class="text-decoration-underline">see
                                                    fabrics</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div id="colours" class="container tab-pane fade">
                                    <div class="text-uppercase mb-5">
                                        <p class="fw-bolder">Colours</p>
                                    </div>
                                    <div class="gap-3 center-flex flex-row">
                                        <div class="news-img w-50 me-5">
                                            <img
                                                src="{{asset('frontend/images/sunset-8k-forest-4k-wallpaper-preview.jpg')}}"
                                                class="img-fluid" alt="">
                                        </div>
                                        <div class="text-uppercase">
                                            <p class="mb-3">you can see all the frabrics we have
                                                and
                                                can use at your customizarion</p>
                                            <p><a href="#" class="text-decoration-underline">see
                                                    Colours</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div id="buttons" class="container tab-pane fade">
                                    <div class="text-uppercase mb-5">
                                        <p class="fw-bolder">Buttons</p>
                                    </div>
                                    <div class="gap-3 center-flex flex-row">
                                        <div class="news-img w-50 me-5">
                                            <img
                                                src="{{asset('assets/images/home/trend-1.png')}}"
                                                class="img-fluid" alt="">
                                        </div>
                                        <div class="text-uppercase">
                                            <p class="mb-3">you can see all the frabrics we have
                                                and
                                                can use at your customizarion</p>
                                            <p><a href="#" class="text-decoration-underline">see
                                                    buttons</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            &lt;!&ndash; Price List&ndash;&gt;
            <div id="item-price-list">
                <div class="row g-0">
                    <div class="col-md-4 px-5 py-4">
                        <div class="text-uppercase">
                            <p class="fw-bolder mb-4">price list</p>
                            <p class="mb-2">classic</p>
                            <p class="mb-2">legacy</p>
                            <p>premium</p>
                        </div>
                    </div>
                    <div class="col-md-8 d-flex flex-column align-items-end px-5 py-4">
                        <div class="">
                            <div class="text-uppercase mb-5">
                                <p class="fw-bolder">Plans</p>
                            </div>
                            <div class="d-flex gap-3">
                                <div class="position-relative news-img">
                                    <img class="img-fluid"
                                         src="{{asset('assets/images/home/classic.png')}}"
                                         alt="">
                                    <div class="card-img-overlay ms-3 text-white"
                                         style="top: 80%">
                                        <p class="text-uppercase">classic</p>
                                    </div>
                                </div>
                                <div class="position-relative border news-img">
                                    <img class="img-fluid"
                                         src="{{asset('assets/images/home/legacy.png')}}"
                                         alt="">
                                    <div class="card-img-overlay ms-3 text-white"
                                         style="top: 80%">
                                        <p class="text-uppercase">legacy</p>
                                    </div>
                                </div>
                                <div class="position-relative news-img">
                                    <img class="img-fluid"
                                         src="{{asset('assets/images/home/premium.png')}}"
                                         alt="">
                                    <div class="card-img-overlay ms-3 text-white"
                                         style="top: 80%">
                                        <p class="text-uppercase">premium</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            &lt;!&ndash; Size Guide &ndash;&gt;
            <div id="item-size-guide">
                <div class="row g-0">
                    <div class="col-md-4 px-5 py-4">
                        <div class="text-uppercase">
                            <p class="fw-bolder mb-4">Size Guides</p>
                            <p class="mb-2">Eu Size Guides</p>
                            <p class="mb-2">AC Size Guides</p>
                            <p>how to get perfect sizes</p>
                        </div>
                    </div>
                    <div class="col-md-8 d-flex flex-column align-items-end px-5 py-4">
                        <div class="">
                            <div class="text-uppercase mb-5">
                                <p class="fw-bolder">Size Guides</p>
                            </div>
                            <div class="gap-3 center-flex flex-row">
                                <div class="news-img w-50 me-5">
                                    <img
                                        src="{{asset('assets/images/home/pho_1.png')}}"
                                        class="img-fluid" alt="">
                                </div>
                                <div class="text-uppercase">
                                    <p class="mb-3">you can find out how to get the perfect size
                                        guides for the
                                        suit</p>
                                    <p><a href="#" class="text-decoration-underline">See
                                            guides</a>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            &lt;!&ndash; Add on &ndash;&gt;
            <div id="item-add-on">
                <div class="row g-0">
                    <div class="col-md-4 px-5 py-4">
                        <div class="text-uppercase">
                            <p class="fw-bolder mb-4">additionals</p>
                            <p class="mb-2">what add-ons available</p>
                            <p class="mb-2">services we offers</p>
                            <p>shops & get gifts</p>
                        </div>
                    </div>
                    <div class="col-md-8 d-flex flex-column align-items-end px-5 py-4">
                        <div class="">
                            <div class="text-uppercase mb-5">
                                <p class="fw-bolder">add-ons</p>
                            </div>
                            <div class="d-flex gap-3">
                                <div class="position-relative news-img">
                                    <img class="img-fluid"
                                         src="{{asset('assets/images/home/shirts.png')}}"
                                         alt="">
                                    <div class="card-img-overlay ms-3 text-white"
                                         style="top: 80%">
                                        <p class="text-uppercase">shirts</p>
                                    </div>
                                </div>
                                <div class="position-relative news-img">
                                    <img class="img-fluid"
                                         src="{{asset('assets/images/home/neckties.png')}}"
                                         alt="">
                                    <div class="card-img-overlay ms-3 text-white"
                                         style="top: 80%">
                                        <p class="text-uppercase">belts</p>
                                    </div>
                                </div>
                                <div class="position-relative news-img">
                                    <img class="img-fluid"
                                         src="{{asset('assets/images/home/belts.png')}}"
                                         alt="">
                                    <div class="card-img-overlay ms-3 text-white"
                                         style="top: 80%">
                                        <p class="text-uppercase">shirts</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
-->
  </div>
  <!-- MOb Menu -->
  <div class="offcanvas offcanvas-start offcanvas-lg" id="burger">
    <div class="offcanvas-header center-flex flex-row p-4">
      <div class="mob-logo me-3">
        <a href="/">
          <img src="{{asset('assets/images/home/mob-logo.png')}}" alt="logo">
        </a>
      </div>
      <p class="text-uppercase me-3">gentlemen premium tailor</p>

      <button type="button" class="btn-close center-flex" data-bs-dismiss="offcanvas">
        <i class='bx bx-x icon-lg'></i></button>
    </div>
    <hr class="m-0">
    <div class="offcanvas-body m-4">
      <!--            <div class="accordion accordion-flush" id="mob-menu">
                      &lt;!&ndash;Home&ndash;&gt;
                      <p class="stand-alone-menu">
                          <a href="#"
                             class="accordion-button collapsed text-uppercase fw-bold">home</a>
                      </p>
                      &lt;!&ndash;What's new&ndash;&gt;
                      <div class="accordion-item border border-0">
                          <p class="accordion-header " id="whatNew">
                              <button class="accordion-button collapsed text-uppercase fw-bold"
                                      type="button"
                                      data-bs-toggle="collapse"
                                      data-bs-target="#new" aria-expanded="false"
                                      aria-controls="flush-collapseOne">
                                  what's new
                              </button>
                          </p>
                          <div id="new" class="accordion-collapse collapse"
                               aria-labelledby="whatNew" data-bs-parent="#mob-menu">
                              <div class="accordion-body">
                                  <p><a href="#" class="text-uppercase">Trending</a></p>
                              </div>
                          </div>
                      </div>
                      &lt;!&ndash;shop by&ndash;&gt;
                      <div class="accordion-item border border-0">
                          <p class="accordion-header" id="shopBy">
                              <button class="accordion-button collapsed text-uppercase fw-bold"
                                      type="button"
                                      data-bs-toggle="collapse"
                                      data-bs-target="#shop" aria-expanded="false"
                                      aria-controls="flush-collapseOne">
                                  shop by
                              </button>
                          </p>
                          <div id="shop" class="accordion-collapse collapse"
                               aria-labelledby="shopBy" data-bs-parent="#mob-menu">
                              <div class="accordion-body mob-shop-body">
                                  <div class="accordion-item border border-0">
                                      <p class="accordion-header" id="occasions">
                                          <button class="accordion-button text-uppercase fw-bold"
                                                  type="button"
                                                  data-bs-toggle="collapse"
                                                  data-bs-target="#occ" aria-expanded="true"
                                                  aria-controls="panelsStayOpen-collapseOne">
                                              Occasions
                                          </button>
                                      </p>
                                      <div id="occ" class="accordion-collapse collapse"
                                           aria-labelledby="occasions">
                                          <div class="accordion-body">
                                              <p class="mb-2"><a href="#"
                                                                 class="text-uppercase">vacation</a>
                                              </p>
                                              <p class="mb-2"><a href="#"
                                                                 class="text-uppercase">wedding</a>
                                              </p>
                                              <p class="mb-2"><a href="#" class="text-uppercase">business
                                                      meetings</a>
                                              </p>
                                              <p class="mb-2"><a href="#"
                                                                 class="text-uppercase">dinner</a>
                                              </p>
                                              <p class="mb-2"><a href="#"
                                                                 class="text-uppercase">events</a>
                                              </p>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="accordion-item border border-0">
                                      <p class="accordion-header" id="styles">
                                          <button
                                              class="accordion-button collapsed text-uppercase fw-bold"
                                              type="button"
                                              data-bs-toggle="collapse"
                                              data-bs-target="#style" aria-expanded="false"
                                              aria-controls="panelsStayOpen-collapseTwo">
                                              styles
                                          </button>
                                      </p>
                                      <div id="style" class="accordion-collapse collapse"
                                           aria-labelledby="styles">
                                          <div class="accordion-body">
                                              <p class="mb-2"><a href="#" class="text-uppercase">wedding
                                                      guest</a></p>
                                              <p class="mb-2"><a href="#"
                                                                 class="text-uppercase">bride</a>
                                              </p>
                                              <p class="mb-2"><a href="#"
                                                                 class="text-uppercase">work</a>
                                              </p>
                                              <p class="mb-2"><a href="#" class="text-uppercase">formal
                                                      wear</a></p>
                                              <p class="mb-2"><a href="#" class="text-uppercase">causal
                                                      wear</a></p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      &lt;!&ndash;Customize&ndash;&gt;
                      <p class="stand-alone-menu">
                          <a href="#"
                             class="accordion-button collapsed text-uppercase fw-bold">Customize</a>
                      </p>
                      &lt;!&ndash;Fabric&ndash;&gt;
                      <div class="accordion-item border border-0">
                          <p class="accordion-header " id="fab&col">
                              <button class="accordion-button collapsed text-uppercase fw-bold"
                                      type="button"
                                      data-bs-toggle="collapse"
                                      data-bs-target="#fabric" aria-expanded="false"
                                      aria-controls="flush-collapseOne">
                                  Fabrics & colours
                              </button>
                          </p>
                          <div id="fabric" class="accordion-collapse collapse"
                               aria-labelledby="fab&col" data-bs-parent="#mob-menu">
                              <div class="accordion-body">
                                  <p class="mb-2"><a href="#" class="text-uppercase">fabrics</a></p>
                                  <p class="mb-2"><a href="#" class="text-uppercase">colours</a></p>
                                  <p class="mb-2"><a href="#" class="text-uppercase">buttons</a></p>
                              </div>
                          </div>
                      </div>
                      &lt;!&ndash;Price List&ndash;&gt;
                      <div class="accordion-item border border-0">
                          <p class="accordion-header " id="priceList">
                              <button class="accordion-button collapsed text-uppercase fw-bold"
                                      type="button"
                                      data-bs-toggle="collapse"
                                      data-bs-target="#price" aria-expanded="false"
                                      aria-controls="flush-collapseOne">
                                  Price List
                              </button>
                          </p>
                          <div id="price" class="accordion-collapse collapse"
                               aria-labelledby="priceList" data-bs-parent="#mob-menu">
                              <div class="accordion-body">
                                  <p class="mb-2"><a href="#" class="text-uppercase">classic</a></p>
                                  <p class="mb-2"><a href="#" class="text-uppercase">legacy</a></p>
                                  <p class="mb-2"><a href="#" class="text-uppercase">premium</a></p>
                              </div>
                          </div>
                      </div>
                      &lt;!&ndash;Size Guides&ndash;&gt;
                      <div class="accordion-item border border-0">
                          <p class="accordion-header " id="sizeGuide">
                              <button class="accordion-button collapsed text-uppercase fw-bold"
                                      type="button"
                                      data-bs-toggle="collapse"
                                      data-bs-target="#size" aria-expanded="false"
                                      aria-controls="flush-collapseOne">
                                  Size Guides
                              </button>
                          </p>
                          <div id="size" class="accordion-collapse collapse"
                               aria-labelledby="sizeGuide" data-bs-parent="#mob-menu">
                              <div class="accordion-body">
                                  <p class="mb-2"><a href="#" class="text-uppercase">EU size
                                          guides</a>
                                  </p>
                                  <p class="mb-2"><a href="#" class="text-uppercase">ac size
                                          guides</a>
                                  </p>
                                  <p class="mb-2"><a href="#" class="text-uppercase">how to get
                                          prefect
                                          sizes</a></p>
                              </div>
                          </div>
                      </div>
                      &lt;!&ndash;Add On&ndash;&gt;
                      <div class="accordion-item border border-0">
                          <p class="accordion-header " id="additional">
                              <button class="accordion-button collapsed text-uppercase fw-bold"
                                      type="button"
                                      data-bs-toggle="collapse"
                                      data-bs-target="#addOn" aria-expanded="false"
                                      aria-controls="flush-collapseOne">
                                  additional
                              </button>
                          </p>
                          <div id="addOn" class="accordion-collapse collapse"
                               aria-labelledby="additional" data-bs-parent="#mob-menu">
                              <div class="accordion-body">
                                  <p class="mb-2"><a href="#" class="text-uppercase">what add-ons
                                          available</a></p>
                                  <p class="mb-2"><a href="#" class="text-uppercase">services we
                                          offers</a>
                                  </p>
                                  <p class="mb-2"><a href="#" class="text-uppercase">shops & get
                                          gifts</a>
                                  </p>
                              </div>
                          </div>
                      </div>
                  </div>-->
      <!--            <div class="mb-3">
                      <p class="ls-0"><a href="#">Home</a></p>
                  </div>-->
      <div class="mb-3">
        <p class="ls-0"><a href="/customize">Shop Now</a></p>
      </div>
      <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item bg-main border border-0">
          <div class="collapsed p-0 bg-main"
               data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne"
               aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
            <p class="accordion-header mb-3 d-flex align-items-center
                        justify-content-between text-gold"
               id="panelsStayOpen-headingOne">
              Other<i class='bx bx-chevron-down icon'></i>
            </p>
          </div>
          <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse"
               aria-labelledby="panelsStayOpen-headingOne" style="">
            <div class="accordion-body p-0 m-0">
              <!--              <div class="mb-3" id="fabric">
                              <p class="ls-0"><a href="/fabrics">Fabrics & Colours</a></p>
                            </div>-->
              <div class="mb-3" id="fix-price">
                <p class="ls-0"><a href="/ready-to-wear">Ready To Wear</a></p>
              </div>
              <div class="mb-3" id="size-guide">
                <p class="ls-0"><a href="/suit-tips">Suit Tips</a></p>
              </div>
              <div class="mb-3" id="add-on">
                <p class="ls-0"><a href="/additional">Additional</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="offcanvas-footer py-2 px-4">
      <a href="/contact" type="button" class="text-gold">Contact</a>
    </div>
  </div>
  <div class="mob-search-btn-wrapper d-block d-lg-none">
    <div class="mob-search-group">
    <div class="input-group mb-3" id="search">
          <span class="input-group-text" id="basic-addon1">
            <i class='bx bx-search'></i>
          </span>
       <input type="text" class="form-control form-control-sm"
             placeholder="search anything you want. . ." id="search-input">
      <button class="btn rounded-0 text-uppercase"
              type="submit">Search
      </button>
    </div>
    </div>
  </div>
</nav>


@yield('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


@yield('js')
{{-- Navbar javascript  --}}
<!-- santhida's js -->
<script>
  $(function () {
    var $allItems = $(".content-wrapper > div");
    $(document.body).on("click", ".menu-title", function () {
      var id = this.id, itemId = "#item-" + id;
      $allItems.not($(itemId).toggle('slow')).hide('slow');
    });

    // $(".menu-title").mouseenter(function() {
    //     var id = this.id, itemId = "#item-" + id;
    //     $allItems.not($(itemId).show('slow'));
    // }).mouseleave(function() {
    //     var id = this.id, itemId = "#item-" + id;
    //     $allItems.not($(itemId).hide('slow'));
    // });
  });
  $(document).ready(function () {
    const searchGroup = $('.mob-search-group')
    const searchIcon = $('.mob-search-icon')
    searchIcon.click(() => {
      console.log(searchGroup)
      searchGroup.slideToggle("slow")
    });
    // alert("heo");
    // start cart qty total to nav
    var user_id = $('#hidden_user_id').val();
    var grand_total = localStorage.getItem('grandTotal');
    var grand_total_obj = JSON.parse(grand_total);
    $.each(grand_total_obj,function(i,v){
      if(v.id == user_id)
      {
        $('#total_cart_qty').html(v.total_qty);
      }
    });
    // end cart qty total to nav
  });
</script>
<script>
  function check_temporary()
  {
    // alert("check");

  }
  function logout() {
    // alert(value);
    swal({
      title: "Are You Sure You want to Logout",
      icon: 'warning',
      buttons: ["No", "Yes"]
    })

      .then((isConfirm) => {

        if (isConfirm) {

          $.ajax({
            type: 'POST',
            url: 'logout',
            dataType: 'json',
            data: {
              "_token": "{{ csrf_token() }}",
            },

            success: function () {
              sessionStorage.clear();
              swal({
                title: "Success!",
                text: "Successfully Logout!",
                icon: "success",
              }).then(function () {
                window.location = '/'
              });


            },
          });
        }
      });
  }

  function profile(){
    // alert('hello');
    sessionStorage.setItem('to_profile',1);
  }
</script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<!-- zh-script -->
@stack('pop-up-scripts')
@stack('alert-scripts')
@stack('login-validate-scripts')
@stack('logout-script')


