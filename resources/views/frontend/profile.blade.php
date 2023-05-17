@extends('layouts.header')
@push('styles')
  <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
  <link href="{{ asset('css/customize.css') }}" rel="stylesheet">
  <link href="{{ asset('css/fabric.css') }}" rel="stylesheet">
@endpush
@section('content')
  @include('layouts/nav')
  <section class="profile">
    <div class="row g-0">
      <div class="col-lg-3 left-panel sticky-lg-top">
        <h6 class="text-center mb-4 ff-mont text-white">User Profile</h6>
        <div class="d-flex flex-column gap-3 px-3 mb-lg-5 mb-1 mb-md-2">
          <img src="{{asset('/assets/images/profile/avatar.png')}}" width="80px"
               height="80px"
               alt="" class="align-self-center">
          <div class="align-self-center text-center">
            @if(!empty($user_detail))
              <p class="text-bold">{{$user_detail->name}}</p>
              <span class="text-muted">{{$user_detail->email}}</span>
            @endif
          </div>
        </div>
        <div class="px-3">
          <hr class="d-none d-lg-block text-white-50">
        </div>
        <div id="nav" class="nav-pills mt-5 d-none d-lg-block" role="tablist">
          <a class="active d-flex align-items-center mb-4" style="height: 20px;"
             data-bs-toggle="pill" href="#profile">
            <img src="{{asset('assets/images/profile/icon/profile.png')}}" width="20px"
                 alt="" class="me-3">
            Profile
          </a>
          <a class="d-flex align-items-center mb-4" style="height: 20px;"
             data-bs-toggle="pill" href="#wishlist">
            <img src="{{asset('assets/images/profile/icon/wishlist.png')}}" width="20px"
                 alt="" class="me-3">

            Wishlist
          </a>
          <a class="d-flex align-items-center mb-4" style="height: 20px;"
             data-bs-toggle="pill" href="#measurements" id="pmeasurement">
            <img src="{{asset('assets/images/profile/icon/measurement.png')}}"
                 width="20px" alt="" class="me-3">
            Measurements
          </a>
          <a class="d-flex align-items-center mb-4" style="height: 20px;"
             data-bs-toggle="pill" href="#orders">
            <img src="{{asset('assets/images/profile/icon/order.png')}}" width="20px"
                 alt=""
                 class="me-3">
            Orders
          </a>
        </div>
        <div class="bottom-logout text-end text-lg-start">
          <a href="#" onclick="logout()" style="color: red;" id="logout">Logout</a>
        </div>
      </div>
      <div class="col-lg-9 right-panel">
        <div class="mobile-nav-pill nav-pills mt-2 d-block d-lg-none d-flex
        justify-content-evenly" role="tablist">
          <a class="active"
             data-bs-toggle="pill" href="#profile">
            Profile
          </a>
          <a class=""
             data-bs-toggle="pill" href="#wishlist">
            My Wishlist
          </a>
          <a class=""
             data-bs-toggle="pill" href="#measurements" id="pmeasurement">
            My Measurements
          </a>
          <a class=""
             data-bs-toggle="pill" href="#orders">
            My Orders
          </a>
        </div>


        <div class="tab-content profile">
          <div id="profile" class="tab-pane active mx-md-5 mb-5"><br>
            <section class="mb-5">
              <h6 class="mb-4 mb-md-5 ms-4 ms-md-0 ff-mont text-white" style="">
                Profile
                Information</h6>
              <form>
                @if(!empty($user_detail))
                  <input type="hidden" style="color:black" id="user_id"
                         name="user_id" value="{{$user_detail->id}}">
                @endif
                <div class="mx-5">
                  <div class="row mb-3 g-0 g-md-5">
                    <div class="col-md-6 mb-3">
                      <label for="username" class="form-label">User
                        Name</label>
                      @if(!empty($user_detail))
                        <input type="text" class="form-control"
                               id="username" name="username"
                               placeholder="Please insert your username"
                               value="{{$user_detail->name}}"
                               autofocus>
                      @else
                        <input type="text" class="form-control"
                               id="username" name="username"
                               placeholder="Please insert your username"
                               autofocus>
                      @endif
                    </div>
                    <div class="col-md-6">
                      <label for="phone" class="form-label mt-0">Phone</label>
                      @if(!empty($user_detail))
                        <input type="text" class="form-control" id="phone"
                               name="phone" value="{{$user_detail->phone}}"
                               placeholder="+95 xxxxxxxxx">
                      @else
                        <input type="text" class="form-control" id="phone"
                               name="phone"
                               placeholder="+95 xxxxxxxxx" value="">
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3 g-0 g-md-5">
                    <div class="col-md-6 mb-3">
                      <label for="dob" class="form-label">Date of
                        Birth</label>
                      @if(!empty($user_detail))
                        <input type="date" class="form-control" id="dob"
                               name="dob" value="{{$user_detail->dob}}">
                      @else
                        <input type="date" class="form-control" id="dob"
                               name="dob">
                      @endif
                    </div>
                    <div class="col-md-6">
                      @if(!empty($user_detail))
                        <label for="gender"
                               class="form-label">Gender</label>
                        <select class="form-select" id="gender"
                                name="gender" aria-label="gender">
                          @if($user_detail->gender == 0 || $user_detail->gender == null)
                            <option selected value="0">Choose your
                              gender
                            </option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                          @elseif($user_detail->gender == 1)
                            <option selected value="1">Male</option>
                            <option value="2">Female</option>
                          @elseif($user_detail->gender == 2)
                            <option value="1">Male</option>
                            <option selected value="2">Female</option>
                          @endif
                        </select>
                      @else
                        <label for="gender"
                               class="form-label">Gender</label>
                        <select class="form-select" id="gender"
                                name="gender" aria-label="gender">
                          <option selected value="0">Choose your gender
                          </option>
                          <option value="1">Male</option>
                          <option value="2">Female</option>
                        </select>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3 g-0 g-md-5">
                    <div class="col-md-6 mb-3">
                      <label for="city" class="form-label">City</label>
                      @if(!empty($user_detail))
                        <input type="text" class="form-control" id="city"
                               name="city" value="{{$user_detail->city}}">
                      @else
                        <input type="text" class="form-control" id="city"
                               name="city">
                      @endif
                    </div>
                    <div class="col-md-6">
                      <label for="address" class="form-label">Address</label>
                      @if(!empty($user_detail))
                        {{--                    <input type="text" class="form-control" id="address" name="address" value="{{$user_detail->tsp_street}}">--}}
                        <textarea name="address" id="address"
                                  class="form-control"
                                  value="{{$user_detail->tsp_street}}">{{$user_detail->tsp_street}}</textarea>
                      @else
                        {{--                    <input type="text" class="form-control" id="address" name="address">--}}
                        <textarea name="address" id="address"
                                  class="form-control"></textarea>
                      @endif
                      <span class="text-decoration-underline tips">(Please fill detail like
                      Home Number/Room
                    Number Building
                    number etc...)</span>
                    </div>
                  </div>
                </div>

            </section>
            <section>
              <h6 class="mb-4 mb-md-5 ms-4 ms-md-0 ff-mont text-white" style="">
                Account Setting</h6>
              <div class="mx-5">
                <div class="row mb-3 g-0 g-md-5">
                  <div class="col-md-6 mb-3">
                    <label for="username" class="form-label">Password</label>
                    <input type="password" class="form-control" id="username"
                           autofocus>
                    <a href="{{route('user_change_password')}}"
                       class="text-decoration-underline">Change Password</a>
                  </div>
                  <div class="col-md-6">
                    <label for="phone" class="form-label">Email</label>
                    @if(!empty($user_detail))
                      <input type="email" class="form-control" id="email"
                             name="email"
                             value="{{$user_detail->email}}" disabled
                             readonly>
                    @else
                      <input type="email" class="form-control" id="email"
                             name="email" disabled readonly>
                    @endif
                  </div>
                </div>
              </div>
              <div class=" d-flex justify-content-center justify-content-md-end custom mb-5">
                <button class="btn p-0 px-3 mt-5" type="button"
                        onclick="save_user()">Save
                </button>
              </div>
              </form>
            </section>
            <!--            <section>
                          <h6 class="mb-4 mb-md-5 ms-4 ms-md-0 ff-mont text-white" style="">Category
                            Interests</h6>
                          <div class="mx-5 interest">
                            <div class="d-flex flex-wrap">
                              <p>Business wears</p>
                              <p>Graduation</p>
                              <p>Fabrics</p>
                              <button class="btn d-flex align-items-center justify-content-between">
                                Add<i class='bx bx-plus'></i>
                              </button>
                            </div>
                          </div>
                        </section>-->
          </div>
          <div id="wishlist" class="tab-pane fade mx-3 mx-md-5 mb-5"><br>
            <h6 class="mb-4 mb-md-5 ms-0 ff-mont text-white" style="">Wishlist</h6>
            <div id="html_wishlist" class="row g-3 g-md-5">

              <!-- <div class="col-6 col-md-4">
                <div class="text-center">
                  <div class="mb-1 position-relative">
                    <img src="{{asset('assets\images\home\img.png')}}" alt="">
                    <i class='bx bxs-heart position-absolute top-0 end-0 me-2 me-md-3 mt-2 mt-md-3
                    cursor-pointer' style='color:#0e122d'></i>
                  </div>
                  <p>Red and blue flower print tie</p>
                  <p class="text-gold">$ 30</p>
                </div>
              </div>
              <div class="col-6 col-md-4">
                <div class="text-center">
                  <div class="mb-1 position-relative">
                    <img src="{{asset('assets\images\home\img.png')}}" alt="">
                    <i class='bx bxs-heart position-absolute top-0 end-0 me-2 me-md-3 mt-2 mt-md-3
                    cursor-pointer' style='color:#0e122d'></i>
                  </div>
                  <p>Red and blue flower print tie</p>
                  <p class="text-gold">$ 30</p>
                </div>
              </div>
              <div class="col-6 col-md-4">
                <div class="text-center">
                  <div class="mb-1 position-relative">
                    <img src="{{asset('assets\images\home\img.png')}}" alt="">
                    <i class='bx bxs-heart position-absolute top-0 end-0 me-2 me-md-3 mt-2 mt-md-3
                    cursor-pointer' style='color:#0e122d'></i>
                  </div>
                  <p>Red and blue flower print tie</p>
                  <p class="text-gold">$ 30</p>
                </div>
              </div> -->
            </div>
          </div>
          <div id="measurements" class="tab-pane mx-3 mx-md-5 mb-5"><br>
            <div class="d-flex justify-content-between align-items-center">
              <h6 class="mb-4 mb-md-5 ms-4 ms-md-0 ff-mont text-white" style="">
                Measurement</h6>
              <a href="#" class="d-flex justify-content-center align-items-center">
                <i class="bx bx-plus me-3"></i>
                Add new measurement
              </a>
            </div>
            <!-- start -->
            <!-- new customize -->
            <div class="measure">
              <p class="text-decoration-underline text-center my-3" id="save_measurement">
                <a href="#">Save measurement</a></p>
              <div class="alert alert-danger d-flex justify-content-center d-none"
                   role="alert" id="info_error_alert"
                   style="background-color:red !important;color:whitesmoke !important">
                Need To Fill Info Data
              </div>
              {{-- Body Types --}}
              <div class="measure-types nav-pills" role="tablist">
                <div class="measure-type">
                  <a class="nav-link active" data-bs-toggle="tab" href="#upper"
                     id="upper_tab">UPPER</a>
                </div>
                <div class="measure-type">
                  <a class="nav-link" data-bs-toggle="tab" href="#lower"
                     id="lower_tab">LOWER</a>
                </div>
                <div class="measure-type">
                  <a class="nav-link" data-bs-toggle="tab" href="#info" id="info_tab">INFO</a>
                </div>
              </div>
              <div class="unit-wrapper">
                <input type="hidden" id="measure_type" value="in">
                <div class="unit-label-wrapper">
                  <input type="radio" id="in" name="measure_unit"
                         class="unit-check d-none" value="in"
                         checked onclick="get_measure_unit(this.value)">
                  <label for="in" class="unit-label">in</label>
                </div>
                <div class="unit-label-wrapper">
                  <input type="radio" id="cm" name="measure_unit"
                         class="unit-check d-none" value="cm"
                         onclick="get_measure_unit(this.value)">
                  <label for="cm" class="unit-label">Cm</label>
                </div>
              </div>
              {{-- content --}}
              <div class="tab-content">
                <div id="upper" class="tab-pane active">
                  <div class="measure-items">
                    <a class="measure-item circle active-link" href="#neck_upper">
                      <img src="{{asset("assets/images/customize/measurement/neck.png")}}"
                           alt="neck">
                      <p>neck</p>

                    </a>
                    <a class="measure-item circle" href="#chest_upper">
                      <img src="{{asset("assets/images/customize/measurement/chest.png")}}"
                           alt="chest">
                      <p>Chest</p>

                    </a>
                    <a class="measure-item circle" href="#waist_upper">
                      <img src="{{asset("assets/images/customize/measurement/waist.png")}}"
                           alt="waist">
                      <p>Waist (Upper Waist)</p>

                    </a>
                    <a class="measure-item circle" href="#hips_upper">
                      <img src="{{asset("assets/images/customize/measurement/hips.png")}}"
                           alt="hips">
                      <p>hips</p>

                    </a>
                    <a class="measure-item circle" href="#shoulder_upper">
                      <img src="{{asset("assets/images/customize/measurement/shoulder.png")}}"
                           alt="shoulder">
                      <p>shoulder</p>

                    </a>
                    <a class="measure-item circle" href="#sleeve_length_Right">
                      <img src="{{asset("assets/images/customize/measurement/hips.png")}}"
                           alt="sleeve_length_Right">
                      <p>Sleeve Length Right</p>

                    </a>
                    <a class="measure-item circle" href="#sleeve_length_left">
                      <img src="{{asset("assets/images/customize/measurement/shoulder.png")}}"
                           alt="sleeve_length_left">
                      <p>Sleeve Length Left</p>

                    </a>
                    <a class="measure-item circle" href="#stomach_upper">
                      <img src="{{asset("assets/images/customize/measurement/stomach.png")}}"
                           alt="stomach">
                      <p>stomach</p>

                    </a>
                    <a class="measure-item circle" href="#biceps">
                      <img src="{{asset("assets/images/customize/measurement/biceps.png")}}"
                           alt="biceps">
                      <p>biceps</p>

                    </a>
                    <a class="measure-item circle" href="#forearm">
                      <img src="{{asset("assets/images/customize/measurement/forearm.png")}}"
                           alt="forearm">
                      <p>forearm</p>

                    </a>
                    <a class="measure-item circle" href="#cuffs">
                      <img src="{{asset("assets/images/customize/measurement/stomach.png")}}"
                           alt="cuffs">
                      <p>cuffs</p>

                    </a>
                    <a class="measure-item circle" href="#chest_front">
                      <img src="{{asset("assets/images/customize/measurement/stomach.png")}}"
                           alt="chest
            front">
                      <p>chest front width</p>

                    </a>
                    <a class="measure-item circle" href="#chest_back">
                      <img src="{{asset("assets/images/customize/measurement/stomach.png")}}"
                           alt="chest
            back">
                      <p>chest Back width</p>

                    </a>
                    <a class="measure-item circle" href="#jacket_front">
                      <img src="{{asset("assets/images/customize/measurement/biceps.png")}}"
                           alt="jacket_front_length">
                      <p>Jacket Front Length</p>

                    </a>
                    <a class="measure-item circle" href="#jacket_back">
                      <img src="{{asset("assets/images/customize/measurement/biceps.png")}}"
                           alt="jacket_back_length">
                      <p>Jacket Back Length</p>

                    </a>
                    <a class="measure-item circle" href="#vest_length">
                      <img src="{{asset("assets/images/customize/measurement/biceps.png")}}"
                           alt="vest_length">
                      <p>Vest Length</p>

                    </a>
                  </div>
                  <div class="measure-item-content">
                    <div id="neck_upper" class="content">
                      <div class="measure-img-wrapper">
                        <img src="https://via.placeholder.com/1024x400?text=Visit+Blogging.com+Now"
                             alt="neck">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                        @if($upper != null && $upper->neck != null)
                          <input type="text" placeholder="0.0"
                                 id="neck_input" value="{{$upper->neck}}">
                        @else
                        <input type="text" placeholder="0.0"
                         id="neck_input">
                        @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="chest_upper" class="content">
                      <div class="measure-img-wrapper">
                        <img src="{{asset('assets/images/customize/measurement/_MG_0002.JPG')}}"
                             alt="chest">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($upper != null && $upper->chest != null)
                          <input type="text" placeholder="0.0"
                                 id="chest_input" value="{{$upper->chest}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="chest_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="waist_upper" class="content">
                      <div class="measure-img-wrapper">
                        <img src="{{asset('assets/images/customize/measurement/_MG_0003.JPG')}}"
                             alt="waist_upper">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($upper != null && $upper->waist != null)
                          <input type="text" placeholder="0.0"
                                 id="waist_upper_input" value="{{$upper->waist}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="waist_upper_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="hips_upper" class="content">
                      <div class="measure-img-wrapper">
                        <img src="{{asset('assets/images/customize/measurement/_MG_0011.JPG')}}"
                             alt="hips_upper">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($upper != null && $upper->hips != null)
                          <input type="text" placeholder="0.0"
                                 id="hips_upper_input" value="{{$upper->hips}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="hips_upper_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="shoulder_upper" class="content">
                      <div class="measure-img-wrapper">
                        <img src="{{asset('assets/images/customize/measurement/shoulder-content.jpg')}}"
                             alt="shoulder">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($upper != null && $upper->shoulder != null)
                          <input type="text" placeholder="0.0"
                                 id="shoulder_input" value="{{$upper->shoulder}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="shoulder_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="sleeve_length_Right" class="content">
                      <div class="measure-img-wrapper">
                        <img src="https://via.placeholder.com/1024x400?text=Visit+Blogging.com+Now"
                             alt="sleeve_length_Right">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($upper != null && $upper->sleeve_length_right != null)
                          <input type="text" placeholder="0.0"
                                 id="sleeve_length_Right_input" value="{{$upper->sleeve_length_right }}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="sleeve_length_Right_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="sleeve_length_left" class="content">
                      <div class="measure-img-wrapper">
                        <img src="https://via.placeholder.com/1024x400?text=Visit+Blogging.com+Now"
                             alt="sleeve_length_left">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($upper != null && $upper->sleeve_length_left != null)
                          <input type="text" placeholder="0.0"
                                 id="sleeve_length_left_input" value="{{$upper->sleeve_length_left}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="sleeve_length_left_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="stomach_upper" class="content">
                      <div class="measure-img-wrapper">
                        <img src="https://via.placeholder.com/1024x400?text=Visit+Blogging.com+Now"
                             alt="stomach_upper">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($upper != null && $upper->stomach != null)
                          <input type="text" placeholder="0.0"
                                 id="stomach_upper_input" value="{{$upper->stomach}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="stomach_upper_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="biceps" class="content">
                      <div class="measure-img-wrapper">
                        <img src="https://via.placeholder.com/1024x400?text=Visit+Blogging.com+Now"
                             alt="biceps">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($upper != null && $upper->biceps != null)
                          <input type="text" placeholder="0.0"
                                 id="biceps_input" value="{{$upper->biceps}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="biceps_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="forearm" class="content">
                      <div class="measure-img-wrapper">
                        <img src="https://via.placeholder.com/1024x400?text=Visit+Blogging.com+Now"
                             alt="forearm">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($upper != null && $upper->forearm != null)
                          <input type="text" placeholder="0.0"
                                 id="forearm_input" value="{{$upper->forearm}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="forearm_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="cuffs" class="content">
                      <div class="measure-img-wrapper">
                        <img src="https://via.placeholder.com/1024x400?text=Visit+Blogging.com+Now"
                             alt="cuffs">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($upper != null && $upper->cuffs != null)
                          <input type="text" placeholder="0.0"
                                 id="cuffs_input" value="{{$upper->cuffs}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="cuffs_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="chest_front" class="content">
                      <div class="measure-img-wrapper">
                        <img src="https://via.placeholder.com/1024x400?text=Visit+Blogging.com+Now"
                             alt="chest front">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($upper != null && $upper->chest_front_width != null)
                          <input type="text" placeholder="0.0"
                                 id="chest_front_input" value="{{$upper->chest_front_width}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="chest_front_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="chest_back" class="content">
                      <div class="measure-img-wrapper">
                        <img src="https://via.placeholder.com/1024x400?text=Visit+Blogging.com+Now"
                             alt="chest back">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($upper != null && $upper->chest_back_width != null)
                          <input type="text" placeholder="0.0"
                                 id="chest_back_input" value="{{$upper->chest_back_width}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="chest_back_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="jacket_front" class="content">
                      <div class="measure-img-wrapper">
                        <img src="https://via.placeholder.com/1024x400?text=Visit+Blogging.com+Now"
                             alt="jacket_front">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($upper != null && $upper->jacket_front_length != null)
                          <input type="text" placeholder="0.0"
                                 id="jacket_front_input" value="{{$upper->jacket_front_length}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="jacket_front_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="jacket_back" class="content">
                      <div class="measure-img-wrapper">
                        <img src="https://via.placeholder.com/1024x400?text=Visit+Blogging.com+Now"
                             alt="jacket_back">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($upper != null && $upper->jacket_back_length != null)
                          <input type="text" placeholder="0.0"
                                 id="jacket_back_input" value="{{$upper->jacket_back_length}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="jacket_back_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="vest_length" class="content">
                      <div class="measure-img-wrapper">
                        <img src="https://via.placeholder.com/1024x400?text=Visit+Blogging.com+Now"
                             alt="vest_length">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($upper != null && $upper->vest_length != null)
                          <input type="text" placeholder="0.0"
                                 id="vest_length_input" value="{{$upper->vest_length}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="vest_length_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="lower" class="tab-pane">
                  <div class="measure-items">
                    <a class="measure-item circle active-link"
                       href="#waist_lower">
                      <img src="{{asset("assets/images/customize/measurement/waist.png")}}"
                           alt="waist_lower">
                      <p>Waist (Lower Waist)</p>

                    </a>
                    <!--          <a class="measure-item" href="#stomach_lower">
            <img src="{{asset("assets/images/customize/measurement/stomach.png")}}" alt="stomach_lower">
            <p>stomach</p>
            <span class="badge text-bg-danger lower_errors d-none" id="pstomach_error">Require</span>
          </a>-->
                    <a class="measure-item circle" href="#stomach_lower">
                      <img src="{{asset("assets/images/customize/measurement/stomach.png")}}"
                           alt="stomach_lower">
                      <p>stomach</p>

                    </a>
                    <a class="measure-item circle" href="#hips_lower">
                      <img src="{{asset("assets/images/customize/measurement/hips.png")}}"
                           alt="hips_lower">
                      <p>hips</p>

                    </a>
                    <a class="measure-item circle" href="#crotch">
                      <img src="{{asset("assets/images/customize/measurement/stomach.png")}}"
                           alt="crotch">
                      <p>crotch</p>

                    </a>
                    <a class="measure-item circle" href="#thighs">
                      <img src="{{asset("assets/images/customize/measurement/thighs.png")}}"
                           alt="thighs">
                      <p>thighs</p>

                    </a>
                    <a class="measure-item circle" href="#knees">
                      <img src="{{asset("assets/images/customize/measurement/knees.png")}}"
                           alt="knees">
                      <p>knees</p>

                    </a>
                    <a class="measure-item circle" href="#calf">
                      <img src="{{asset("assets/images/customize/measurement/knees.png")}}"
                           alt="calf">
                      <p>Calf</p>

                    </a>
                    <a class="measure-item circle" href="#pants_short">
                      <img src="{{asset("assets/images/customize/measurement/neck.png")}}"
                           alt="pants_short">
                      <p>Pants Short</p>

                    </a>
                    <a class="measure-item circle" href="#pants_length">
                      <img src="{{asset("assets/images/customize/measurement/neck.png")}}"
                           alt="pants_length">
                      <p>Pants Length</p>

                    </a>
                    <a class="measure-item circle" href="#bottom_length">
                      <img src="{{asset("assets/images/customize/measurement/knees.png")}}"
                           alt="bottom_length">
                      <p>Bottom Length</p>

                    </a>
                    <!--
          <a class="measure-item circle" href="#j_length">
            <img src="{{asset("assets/images/customize/measurement/chest.png")}}"
                 alt="j_length">
            <p>Jacket Front Length</p>
          </a>
          <a class="measure-item circle" href="#jacket_shoulder_bottom">
            <img src="{{asset("assets/images/customize/measurement/waist.png")}}"
                 alt="jacket_shoulder_bottom">
            <p>Jacket Shoulder to Bottom</p>
          </a>
          <a class="measure-item" href="#shirt_length">
            <img src="{{asset("assets/images/customize/measurement/forearm.png")}}"
                 alt="shirt_length">
            <p>Shirt Length</p>
          </a>
          <a class="measure-item" href="#r_low">
            <img src="{{asset("assets/images/customize/measurement/thighs.png")}}" alt="r_low">
            <p>R.Low</p>
          </a>
          <a class="measure-item" href="#l_low">
            <img src="{{asset("assets/images/customize/measurement/thighs.png")}}" alt="l_low">
            <p>L.Low</p>
          </a>
          <a class="measure-item" href="#skirt_length">
            <img src="{{asset("assets/images/customize/measurement/thighs.png")}}"
                 alt="skirt_length">
            <p>Skirt Length</p>
          </a>-->
                  </div>
                  <div class="measure-item-content">
                    <div id="waist_lower" class="content">
                      <div class="measure-img-wrapper">
                        <img src="{{asset('assets/images/customize/measurement/_MG_0003.JPG')}}"
                             alt="waist lower">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($lower != null && $lower->waist != null)
                          <input type="text" placeholder="0.0"
                                 id="waist_lower_input" value="{{$lower->waist}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="waist_lower_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="stomach_lower" class="content">
                      <div class="measure-img-wrapper">
                        <img src="{{asset('assets/images/customize/measurement/_MG_0003.JPG')}}"
                             alt="stomach_lower">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($lower != null && $lower->stomach != null)
                          <input type="text" placeholder="0.0"
                                 id="stomach_lower_input" value="{{$lower->stomach}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="stomach_lower_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="hips_lower" class="content">
                      <div class="measure-img-wrapper">
                        <img src="{{asset('assets/images/customize/measurement/_MG_0003.JPG')}}"
                             alt="hips_lower">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($lower != null && $lower->hips != null)
                          <input type="text" placeholder="0.0"
                                 id="hips_lower_input" value="{{$lower->hips}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="hips_lower_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="crotch" class="content">
                      <div class="measure-img-wrapper">
                        <img src="https://via.placeholder.com/1024x400?text=Visit+Blogging.com+Now"
                             alt="crotch">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($lower != null && $lower->crotch != null)
                          <input type="text" placeholder="0.0"
                                 id="crotch_input" value="{{$lower->crotch}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="crotch_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="thighs" class="content">
                      <div class="measure-img-wrapper">
                        <img src="https://via.placeholder.com/1024x400?text=Visit+Blogging.com+Now"
                             alt="thighs">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($lower != null && $lower->thighs != null)
                          <input type="text" placeholder="0.0"
                                 id="thighs_input" value="{{$lower->thighs}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="thighs_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="knees" class="content">
                      <div class="measure-img-wrapper">
                        <img src="https://via.placeholder.com/1024x400?text=Visit+Blogging.com+Now"
                             alt="knees">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($lower != null && $lower->knees != null)
                          <input type="text" placeholder="0.0"
                                 id="knees_input" value="{{$lower->knees}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="knees_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="calf" class="content">
                      <div class="measure-img-wrapper">
                        <img src="https://via.placeholder.com/1024x400?text=Visit+Blogging.com+Now"
                             alt="calf">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($lower != null && $lower->calf != null)
                          <input type="text" placeholder="0.0"
                                 id="calf_input" value="{{$lower->calf}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="calf_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="pants_short" class="content">
                      <div class="measure-img-wrapper">
                        <img src="https://via.placeholder.com/1024x400?text=Visit+Blogging.com+Now"
                             alt="pants_short">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($lower != null && $lower->shorts != null)
                          <input type="text" placeholder="0.0"
                                 id="pants_short_input" value="{{$lower->shorts}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="pants_short_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="pants_length" class="content">
                      <div class="measure-img-wrapper">
                        <img src="https://via.placeholder.com/1024x400?text=Visit+Blogging.com+Now"
                             alt="pants_length">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($lower != null && $lower->length != null)
                          <input type="text" placeholder="0.0"
                                 id="pants_length_input" value="{{$lower->length}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="pants_length_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                    <div id="bottom_length" class="content">
                      <div class="measure-img-wrapper">
                        <img src="https://via.placeholder.com/1024x400?text=Visit+Blogging.com+Now"
                             alt="bottom_length">
                      </div>
                      <div class="measure-input-wrapper">
                        <div class="measure-input-group">
                          @if($lower != null && $lower->bottom != null)
                          <input type="text" placeholder="0.0"
                                 id="bottom_length_input" value="{{$lower->bottom}}">
                          @else
                          <input type="text" placeholder="0.0"
                           id="bottom_length_input">
                          @endif
                          <p class="unit">In</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="info" class="tab-pane">
                  <div class="information">
                    <div class="info-div">
                      <!--p-->
                      <div class="info-group">
                        <label for="age">Age</label>
                        <div class="info-input-group">
                          @if($user_detail->age != null)
                          <input type="text" id="age" placeholder="0" value="{{$user_detail->age}}">
                          @else
                          <input type="text" id="age" placeholder="0">
                          @endif
                          <p>Year</p>
                        </div>

                      </div>
                      <!--select-->
                      <div class="info-group">
                        <label for="age">Height</label>
                        <div class="info-input-group">
                          @if($user_detail->height != null)
                          <input type="text" id="height" placeholder="0" value="{{$user_detail->height}}">
                            @if($user_detail->height_type == 'cm')
                            <select name="age" id="height_type">
                              <option value="cm" selected>CM</option>
                              <option value="in">IN</option>
                            </select>
                            @else
                            <select name="age" id="height_type">
                              <option value="cm" >CM</option>
                              <option value="in" selected>IN</option>
                            </select>
                            @endif
                          @else
                          <input type="text" id="height" placeholder="0">
                            <select name="age" id="height_type">
                              <option value="cm" selected>CM</option>
                              <option value="in">IN</option>
                            </select>
                          @endif

                        </div>
                      </div>
                      <div class="info-group">
                        <label for="age">Weight</label>
                        <div class="info-input-group">
                          @if($user_detail->weight != null)
                          <input type="text" id="weight" placeholder="0" value="{{$user_detail->weight}}">
                            @if($user_detail->weight_type == 'kg')
                            <select name="weight" id="weight_type">
                              <option value="kg" selected>KG</option>
                              <option value="lb">LB</option>
                            </select>
                            @else
                            <select name="weight" id="weight_type">
                              <option value="kg" >KG</option>
                              <option value="lb" selected>LB</option>
                            </select>
                            @endif
                          @else
                          <input type="text" id="weight" placeholder="0">
                          <select name="weight" id="weight_type">
                            <option value="kg" selected>KG</option>
                            <option value="lb">LB</option>
                          </select>
                          @endif
                        </div>
                      </div>
                      <div class="info-group">
                        <label for="age">Shoulder Type</label>
                        <div class="info-input-group">
                          @if($user_detail->shoulder_type != null)
                            @if($user_detail->shoulder_type == 'structure')
                            <select name="shoulder_type" id="shoulder_type">
                              <option value="">Select</option>
                              <option value="structure" selected>Structure</option>
                              <option value="square">Square</option>
                              <option value="slopped">Slopped</option>
                            </select>
                            @elseif($user_detail->shoulder_type == 'square')
                            <select name="shoulder_type" id="shoulder_type">
                              <option value="">Select</option>
                              <option value="structure">Structure</option>
                              <option value="square" selected>Square</option>
                              <option value="slopped">Slopped</option>
                            </select>
                            @elseif($user_detail->shoulder_type == 'slopped')
                            <select name="shoulder_type" id="shoulder_type">
                              <option value="">Select</option>
                              <option value="structure">Structure</option>
                              <option value="square">Square</option>
                              <option value="slopped" selected>Slopped</option>
                            </select>
                            @endif
                          @else
                          <select name="shoulder_type" id="shoulder_type">
                            <option value="">Select</option>
                            <option value="structure">Structure</option>
                            <option value="square">Square</option>
                            <option value="slopped">Slopped</option>
                          </select>
                          @endif
                        </div>
                      </div>
                      <div class="info-group">
                        <label for="age">Dropped Shoulder</label>
                        <div class="info-input-group">
                          @if($user_detail->drop_shoulder != null)
                            @if($user_detail->drop_shoulder == 'left')
                            <select name="dropped_shoulder" id="dropped_shoulder">
                              <option value="">Select</option>
                              <option value="left" selected>Left</option>
                              <option value="right">Right</option>
                            </select>
                            @elseif($user_detail->drop_shoulder == 'right')
                            <select name="dropped_shoulder" id="dropped_shoulder">
                              <option value="">Select</option>
                              <option value="left">Left</option>
                              <option value="right" selected>Right</option>
                            </select>
                            @endif
                          @else
                          <select name="dropped_shoulder" id="dropped_shoulder">
                            <option value="">Select</option>
                            <option value="left">Left</option>
                            <option value="right">Right</option>
                          </select>
                          @endif
                        </div>
                      </div>
                      <div class="info-group">
                        <label for="age">Arms Position</label>
                        <div class="info-input-group">
                          @if($user_detail->arms_position != null)
                            @if($user_detail->arms_position == 'average')
                            <select name="arms_position" id="arms_position">
                              <option value="">Select</option>
                              <option value="average" selected>Average</option>
                              <option value="forward">Forward</option>
                              <option value="backward">Backward</option>
                            </select>
                            @elseif($user_detail->arms_position == 'forward')
                            <select name="arms_position" id="arms_position">
                              <option value="">Select</option>
                              <option value="average">Average</option>
                              <option value="forward" selected>Forward</option>
                              <option value="backward">Backward</option>
                            </select>
                            @elseif($user_detail->arms_position == 'backward')
                            <select name="arms_position" id="arms_position">
                              <option value="">Select</option>
                              <option value="average">Average</option>
                              <option value="forward">Forward</option>
                              <option value="backward" selected>Backward</option>
                            </select>
                            @endif
                          @else
                          <select name="arms_position" id="arms_position">
                            <option value="">Select</option>
                            <option value="average">Average</option>
                            <option value="forward">Forward</option>
                            <option value="backward">Backward</option>
                          </select>
                          @endif
                        </div>
                      </div>
                      <div class="info-group">
                        <label for="age">Body Shape</label>
                        <div class="info-input-group">
                          @if($user_detail->body_shape != null)
                            @if($user_detail->body_shape == 'average')
                            <select name="body_shape" id="body_shape">
                              <option value="">Select</option>
                              <option value="average" selected>Average</option>
                              <option value="thin">Thin</option>
                              <option value="muscular">Muscular</option>
                              <option value="fuller">Fuller</option>
                            </select>
                            @elseif($user_detail->body_shape == 'thin')
                            <select name="body_shape" id="body_shape">
                              <option value="">Select</option>
                              <option value="average">Average</option>
                              <option value="thin" selected>Thin</option>
                              <option value="muscular">Muscular</option>
                              <option value="fuller">Fuller</option>
                            </select>
                            @elseif($user_detail->body_shape == 'muscular')
                            <select name="body_shape" id="body_shape">
                              <option value="">Select</option>
                              <option value="average">Average</option>
                              <option value="thin">Thin</option>
                              <option value="muscular" selected>Muscular</option>
                              <option value="fuller">Fuller</option>
                            </select>
                            @elseif($user_detail->body_shape == 'fuller')
                            <select name="body_shape" id="body_shape">
                              <option value="">Select</option>
                              <option value="average">Average</option>
                              <option value="thin">Thin</option>
                              <option value="muscular">Muscular</option>
                              <option value="fuller" selected>Fuller</option>
                            </select>
                            @endif
                          @else
                          <select name="body_shape" id="body_shape">
                            <option value="">Select</option>
                            <option value="average">Average</option>
                            <option value="thin">Thin</option>
                            <option value="muscular">Muscular</option>
                            <option value="fuller">Fuller</option>
                          </select>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="info-div">
                      <div class="info-group">
                        <label for="age">Neck Type</label>
                        <div class="info-input-group">
                          @if($user_detail->neck_type != null)
                            @if($user_detail->neck_type != 'standard')
                            <select name="neck_type" id="neck_type">
                              <option value="">Select</option>
                              <option value="standard" selected>Standard</option>
                              <option value="short">Short</option>
                              <option value="long">Long</option>
                            </select>
                            @elseif($user_detail->neck_type != 'short')
                            <select name="neck_type" id="neck_type">
                              <option value="">Select</option>
                              <option value="standard">Standard</option>
                              <option value="short" selected>Short</option>
                              <option value="long">Long</option>
                            </select>
                            @elseif($user_detail->neck_type != 'long')
                            <select name="neck_type" id="neck_type">
                              <option value="">Select</option>
                              <option value="standard">Standard</option>
                              <option value="short">Short</option>
                              <option value="long" selected>Long</option>
                            </select>
                            @endif
                          @else
                          <select name="neck_type" id="neck_type">
                            <option value="">Select</option>
                            <option value="standard">Standard</option>
                            <option value="short">Short</option>
                            <option value="long">Long</option>
                          </select>
                          @endif
                        </div>
                      </div>
                      <div class="info-group">
                        <label for="age">Stomach Shape</label>
                        <div class="info-input-group">
                          @if($user_detail->stomach_shape != null)
                            @if($user_detail->stomach_shape == 'average')
                            <select name="stomach_shape"  id="stomach_shape">
                              <option value="">Select</option>
                              <option value="average" selected>Average</option>
                              <option value="flat">Flat</option>
                              <option value="extended">Extended</option>
                            </select>
                            @elseif($user_detail->stomach_shape == 'flat')
                            <select name="stomach_shape"  id="stomach_shape">
                              <option value="">Select</option>
                              <option value="average">Average</option>
                              <option value="flat" selected>Flat</option>
                              <option value="extended">Extended</option>
                            </select>
                            @elseif($user_detail->stomach_shape == 'extended')
                            <select name="stomach_shape"  id="stomach_shape">
                              <option value="">Select</option>
                              <option value="average">Average</option>
                              <option value="flat">Flat</option>
                              <option value="extended" selected>Extended</option>
                            </select>
                            @endif
                          @else
                          <select name="stomach_shape"  id="stomach_shape">
                            <option value="">Select</option>
                            <option value="average">Average</option>
                            <option value="flat">Flat</option>
                            <option value="extended">Extended</option>
                          </select>
                          @endif
                        </div>
                      </div>
                      <div class="info-group">
                        <label for="age">Upper Body Shape</label>
                        <div class="info-input-group">
                          @if($user_detail->upper_body_shape != null)
                            @if($user_detail->upper_body_shape == 'straight')
                            <select name="upper_body_shape" id="upper_body_shape">
                              <option value="">Select</option>
                              <option value="straight" selected>Straight</option>
                              <option value="scooped">Scooped</option>
                            </select>
                            @elseif($user_detail->upper_body_shape == 'scooped')
                            <select name="upper_body_shape" id="upper_body_shape">
                              <option value="">Select</option>
                              <option value="straight">Straight</option>
                              <option value="scooped" selected>Scooped</option>
                            </select>
                            @endif
                          @else
                          <select name="upper_body_shape" id="upper_body_shape">
                            <option value="">Select</option>
                            <option value="straight">Straight</option>
                            <option value="scooped">Scooped</option>
                          </select>
                          @endif
                        </div>
                      </div>
                      <div class="info-group">
                        <label for="age">Pant Line</label>
                        <div class="info-input-group">
                          @if($user_detail->pant_line != null)
                            @if($user_detail->pant_line == 'regular')
                            <select name="pant_line" id="pant_line">
                              <option value="">Select</option>
                              <option value="regular" selected>Regular</option>
                              <option value="low">Low</option>
                              <option value="under-belly">UnderBelly</option>
                            </select>
                            @elseif($user_detail->pant_line == 'low')
                            <select name="pant_line" id="pant_line">
                              <option value="">Select</option>
                              <option value="regular">Regular</option>
                              <option value="low" selected>Low</option>
                              <option value="under-belly">UnderBelly</option>
                            </select>
                            @elseif($user_detail->pant_line == 'under-belly')
                            <select name="pant_line" id="pant_line">
                              <option value="">Select</option>
                              <option value="regular">Regular</option>
                              <option value="low">Low</option>
                              <option value="under-belly" selected>UnderBelly</option>
                            </select>
                            @endif
                          @else
                          <select name="pant_line" id="pant_line">
                            <option value="">Select</option>
                            <option value="regular">Regular</option>
                            <option value="low">Low</option>
                            <option value="under-belly">UnderBelly</option>
                          </select>
                          @endif
                        </div>
                      </div>
                      <div class="info-group">
                        <label for="age">Seat</label>
                        <div class="info-input-group">
                          @if($user_detail->seat != null)
                            @if($user_detail->seat == 'regular')
                            <select name="seat" id="seat">
                              <option value="">Select</option>
                              <option value="regular" selected>Regular</option>
                              <option value="flat">Flat</option>
                              <option value="prominent">Prominent</option>
                            </select>
                            @elseif($user_detail->seat == 'flat')
                            <select name="seat" id="seat">
                              <option value="">Select</option>
                              <option value="regular">Regular</option>
                              <option value="flat" selected>Flat</option>
                              <option value="prominent">Prominent</option>
                            </select>
                            @elseif($user_detail->seat == 'prominent')
                            <select name="seat" id="seat">
                              <option value="">Select</option>
                              <option value="regular">Regular</option>
                              <option value="flat">Flat</option>
                              <option value="prominent" selected>Prominent</option>
                            </select>
                            @endif
                          @else
                          <select name="seat" id="seat">
                            <option value="">Select</option>
                            <option value="regular">Regular</option>
                            <option value="flat">Flat</option>
                            <option value="prominent">Prominent</option>
                          </select>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="orders" class="tab-pane fade mx-3 mx-md-5 mb-5">
            <div class="mb-4 mb-md-5 ms-0 d-flex justify-content-between align-items-center
            order-head">
              <h6 class="ff-mont text-white" style="">Orders</h6>
              <a href="#"><i class='bx bx-trash'></i></a>
            </div>
            <!--            <div class="o-filter d-flex">
                          <p class="fil-item active px-2 me-1 me-md-3">All</p>
                          <p class="fil-item px-2 me-1 me-md-3">Customize</p>
                          <p class="fil-item px-2 me-1 me-md-3">Ready To Wear</p>
                          <p class="fil-item px-2 me-1 me-md-3">Additional items</p>
                        </div>-->
            <div class="menu-wrapper">
              <div class="menu__item active">All</div>
              <div class="menu__item">Customize</div>
              <div class="menu__item">Ready To Wear</div>
              <div class="menu__item">Additional items</div>
            </div>
            <div class="customize-orders">
              {{-- <h6 class="text-white">Customize Orders</h6></br>--}}

              @foreach($cus_orders as $cus_order)
                @if($cus_order->status == 1)
                  <span><?php echo date('d M Y', strtotime($cus_order->created_at)); ?>
                at
                    <?php echo date('H:i', strtotime($cus_order->created_at))
                          ?></span>

                  <div class="d-block d-md-flex justify-content-md-around bg-navy-dark rounded-5 mx-0
               px-4 px-md-0 py-5 my-3 position-relative items cursor-pointer" data-bs-toggle="modal"
                       data-bs-target="#orderDetail{{$cus_order->id}}">
                    <div class="d-flex flex-row flex-md-column items-info">
                      <div class="text-white-50 mb-1 mb-md-2">Order Code
                      </div>
                      <div class="">#{{$cus_order->order_code}}</div>
                    </div>
                    <div class="d-flex flex-row flex-md-column items-info">
                      <div class="text-white-50 mb-1 mb-md-2">Total Cost
                      </div>
                      <div class="">${{$cus_order->total}}</div>
                    </div>
                    <div class="d-flex flex-row flex-md-column items-info">
                      <div class="text-white-50 mb-1 mb-md-2">By</div>
                      <div class="">{{$cus_order->user->name}}</div>
                    </div>
                    <div class="d-flex flex-row flex-md-column items-info">
                      <div class="text-white-50 mb-1 mb-md-2">Delivery
                        to
                      </div>
                      <div class="">{{$cus_order->address}}</div>
                    </div>

                    <div class="position-absolute top-0 end-0 mt-2 mt-md-3 mx-4 text-white-50">
                            <?php echo date('d/m/Y', strtotime($cus_order->created_at)) ?>
                    </div>
                  </div>
                @endif
              @endforeach
            </div>
            <div class="cart-orders">
              <h6 class="text-white">Cart Orders</h6></br>

              @foreach($cart_orders as $cart_order)
                <span><?php echo date('d M Y', strtotime($cart_order->created_at)); ?>
                at
                      <?php echo date('H:i', strtotime($cart_order->created_at))
                        ?>
              </span>

                <div class="d-block d-md-flex justify-content-md-around bg-navy-dark rounded-5 mx-0
                px-4 px-md-0 py-5 my-3 position-relative items cursor-pointer"
                     data-bs-toggle="modal"
                     data-bs-target="#cartorderDetail{{$cart_order->id}}"">
                <div class="d-flex flex-row flex-md-column items-info">
                  <div class="text-white-50 mb-1 mb-md-2">Order Code</div>
                  <div class="">#{{$cart_order->order_code}}</div>
                </div>
                <div class="d-flex flex-row flex-md-column items-info">
                  <div class="text-white-50 mb-1 mb-md-2">Total Cost</div>
                  <div class="">${{$cart_order->total}}</div>
                </div>
                <div class="d-flex flex-row flex-md-column items-info">
                  <div class="text-white-50 mb-1 mb-md-2">By</div>
                  <div class="">{{$cart_order->user->name}}</div>
                </div>
                <div class="d-flex flex-row flex-md-column items-info">
                  <div class="text-white-50 mb-1 mb-md-2">Delivery to</div>
                  <div class="">{{$cart_order->address}}</div>
                </div>

                <div class="position-absolute top-0 end-0 mt-2 mt-md-3 mx-4 text-white-50">
                  12/12/2022
                </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
    </div>

    {{--order detail for customize--}}
    @foreach($cus_orders as $cus_order)
      @if($cus_order->status == 1)
        <div class="modal fade" id="orderDetail{{$cus_order->id}}">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

              <div class="modal-body">
                <div class="order">
                  {{-- <table class="table table-borderless">
                    <tbody>
                    <div class="d-flex justify-content-between">
                      <h6 class="modal-title ff-mont text-white mb-3">Order Detail</h6>
                      <button type="button" class="btn-close btn-close-white"
                              data-bs-dismiss="modal"></button>
                    </div>
                    <tr>
                      <td class="text-white">Product Name :</td>
                      <td class="text-white-70">Doe</td>
                    </tr>
                    <tr>
                      <td class="text-white">Price :</td>
                      <td class="text-white-70">Doe</td>
                    </tr>
                    <tr>
                      <td class="text-white">Payment :</td>
                      <td class="text-white-70">Doe</td>
                    </tr>
                    <tr>
                      <td class="text-white">Email :</td>
                      <td class="text-white-70">Doe</td>
                    </tr>
                    <tr>
                      <td class="text-white">Date :</td>
                      <td class="text-white-70">Doe</td>
                    </tr>
                    <tr>
                      <td class="text-white">Billing Address :</td>
                      <td class="text-white-70">No.34, GH7 Building , Singapore</td>
                    </tr>
                    </tbody>
                  </table> --}}
                  <table class="table table-borderless">
                    <tbody>
                    <h6 class="modal-title ff-mont text-white mb-3">Customize
                      History</h6>
                    <tr>
                      <td class="text-white">Product :</td>
                      <td class="text-white-70">{{$cus_order->cus_category->name}}</td>
                    </tr>
                    <tr>
                      <td class="text-white">Package :</td>
                      <td class="text-white-70">{{$cus_order->package->title}}</td>
                    </tr>
                    <tr>
                      <td class="text-white">Fitting :</td>
                      @if($cus_order->fitting == 1)
                        <td class="text-white-70">EXTRA SLIM FIT</td>
                      @elseif($cus_order->fitting == 2)
                        <td class="text-white-70">SLIM FIT</td>
                      @elseif($cus_order->fitting == 3)
                        <td class="text-white-70">REGULAR FIT</td>
                      @elseif($cus_order->fitting == 4)
                        <td class="text-white-70">LOOSE FIT</td>
                      @endif
                    </tr>
                    <tr>
                      <td class="text-white">Fabric :</td>
                      @if($cus_order->texture_id != null)
                        <td class="text-white-70">{{$cus_order->texture->name}}</td>
                      @else
                        <td class="text-white-70">-</td>
                      @endif
                    </tr>
                    @if($cus_order->cus_cate_id == 9)
                      <tr>
                        <td class="text-white">Suit Pieces :</td>
                        @if($cus_order->suit_piece == 2)
                          <td class="text-white-70">Two Pieces</td>
                        @else
                          <td class="text-white-70">Three Pieces</td>
                        @endif
                      </tr>
                      @if($cus_order->texture_id != null)
                        <tr>
                          <td class="text-white">Jacket in:</td>
                          @if($cus_order->jacket_in == 'true')
                            <td class="text-white-70">Include</td>
                          @else
                            <td class="text-white-70">Not</td>
                          @endif
                        </tr>
                        <tr>
                          <td class="text-white">Vest in:</td>
                          @if($cus_order->vest_in == 'true')
                            <td class="text-white-70">Include</td>
                          @else
                            <td class="text-white-70">Not</td>
                          @endif
                        </tr>
                        <tr>
                          <td class="text-white">Pant in:</td>
                          @if($cus_order->pant_in == 'true')
                            <td class="text-white-70">Include</td>
                          @else
                            <td class="text-white-70">Not</td>
                          @endif
                        </tr>
                      @endif
                    @endif
                    @if($cus_order->jacket_id != null)
                      <tr>
                        <td class="text-white">Jacket Style :</td>
                        <td class="text-white-70">{{$cus_order->jacket->style}}</td>
                      </tr>
                    @endif
                    @if($cus_order->vest_id != null)
                      <tr>
                        <td class="text-white">Vest Style :</td>
                        <td class="text-white-70">{{$cus_order->vest->name}}</td>
                      </tr>
                    @endif
                    @if($cus_order->pant_id != null)
                      <tr>
                        <td class="text-white">Pant Style :</td>
                          <td class="text-white-70">{{$cus_order->pant->style}}</td>
                      </tr>
                    @endif
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-outline-light"
                        data-bs-dismiss="modal">Close
                </button>
              </div>

            </div>
          </div>
        </div>
      @endif
    @endforeach
    {{--order detail for cart--}}
    {{-- @foreach($cart_orders as $cart_order)
      <div class="modal fade" id="cartorderDetail{{$cart_order->id}}">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">

            <div class="modal-body">
              <div class="order">

                <table class="table table-borderless">
                  <tbody>
                  <h6 class="modal-title ff-mont text-white mb-3">Cart Order
                    History</h6>
                  @foreach($cart_order_products as $cart)
                    @if($cart_order->id == $cart->cart_order_id)
                      <tr>
                        <td class="text-white">Type :</td>
                        @if($cart->type == 'additional')
                          <td class="text-white-70">Additional</td>
                        @elseif($cart->type == 'ready')
                          <td class="text-white-70">Ready To Wear</td>
                        @endif
                      </tr>
                      <tr>
                        <td class="text-white">Product :</td>
                        @if($cart->type == 'additional')
                          <td class="text-white-70">{{$cart->additional->name}}</td>
                        @elseif($cart->type == 'ready')
                          <td class="text-white-70">{{$cart->ready->name}}</td>
                        @endif
                      </tr>
                    @endif
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-outline-light"
                      data-bs-dismiss="modal">Close
              </button>
            </div>

          </div>
        </div>
      </div>
    @endforeach --}}
  </section>
  <button onclick="topFunction()" id="scrollBtn" title="Go to top" class="d-flex
    justify-content-center align-items-center">
    <i class="bx bx-arrow-back bx-rotate-90"></i>
  </button>
  @include('layouts/footer')
@endsection
@section('js')
  <script>

      $('#info_tab').click(() => {
        $('.unit-wrapper').css("display", "none");
        $('#info').css("margin-top", "100px");
      })

      $('#upper_tab, #lower_tab').click(() => {
        $('.unit-wrapper').css("display", "flex");
          $('#info').css("margin-top", "0");
      })

      $('#pmeasurement, #upper_tab').click(() => {
          $('#upper .content').first().show();
          document.getElementById('neck_input').focus();
      });


      $/*("#pmeasurement").click(function () {
          $('#upper .measure-items .measure-item').first().click();
          document.getElementById('neck_input').focus();
      })*/

      $("#lower_tab").click(function () {
          $('#lower .measure-items .measure-item').first().click();
          document.getElementById('waist_lower_input').focus();
      })

      $('#upper .measure-items .measure-item').click(function (e) {
          let current_link = $(this);
          let current_link_href = current_link.attr('href');
          let input_id = current_link_href.substr(1) + "_input";


          $('#upper .measure-items .measure-item').removeClass('active-link');
          $(this).addClass('active-link');

          $('#upper .content').hide();
          $(current_link_href).show();
          document.getElementById(input_id).focus();

          e.preventDefault();
      });
      $('#lower .content').first().show();
      $('#lower .measure-items .measure-item').click(function (e) {
          let current_link = $(this);
          let current_link_href = current_link.attr('href');
          let input_id = current_link_href.substr(1) + "_input";

          $('#lower .measure-items .measure-item').removeClass('active-link');
          $(this).addClass('active-link');

          $('#lower .content').hide();
          $(current_link_href).show();
          document.getElementById(input_id).focus();

          e.preventDefault();
      });

      $(document).ready(() => {
          let category = "in";
          var upper = @json($upper);
          var lower = @json($lower);
          if(upper != null)
          {
            var measure_type = upper.measure_type
            if(measure_type == 'in')
            {
            $('.unit').html("In")
            $('#in').attr("checked",true);
            }
            else
            {
              $('.unit').html("Cm")
              $('#cm').attr("checked",true);
            }
          }
          else if(lower != null)
          {
            var measure_type = lower.measure_type
            $('.unit').html("In")
            if(measure_type == 'in')
            {
            $('.unit').html("In")
            $('#in').attr("checked",true);
            }
            else
            {
              $('.unit').html("Cm")
              $('#cm').attr("checked",true);
            }
          }
          else if(upper == null && lower == null)
          {
          $('.unit').html("In")
          }
          $("input[name='measure_unit']").click(function () {
              category = this.value;
              var neck = $('#neck_input').val();
              var chest = $('#chest_input').val();
              var waist = $('#waist_upper_input').val();
              var hips = $('#hips_upper_input').val();
              var shoulder = $('#shoulder_input').val();
              var sleeve_right = $('#sleeve_length_Right_input').val();
              var sleeve_left = $('#sleeve_length_left_input').val();
              var stomach = $('#stomach_upper_input').val();
              var biceps = $('#biceps_input').val();
              var forearm = $('#forearm_input').val();
              var cuffs = $('#cuffs_input').val();
              var chest_front = $('#chest_front_input').val();
              var chest_back = $('#chest_back_input').val();
              var jacket_front = $('#jacket_front_input').val();
              var jacket_back = $('#jacket_back_input').val();
              var vest_len = $('#vest_length_input').val();

              var pwaist = $('#waist_lower_input').val();
              var pstomach = $('#stomach_lower_input').val();
              var phips = $('#hips_lower_input').val();
              var pcrotch = $('#crotch_input').val();
              var pthighs = $('#thighs_input').val();
              var pknees = $('#knees_input').val();
              var pcalf = $('#calf_input').val();
              var pshort = $('#pants_short_input').val();
              var plength = $('#pants_length_input').val();
              var pbottom = $('#bottom_length_input').val();
              // alert(category);
              if (category === "in") {
                  $('.unit').html("In");
                  //start convert cm to in upper data
                  if ($.trim(neck) == '') {

                  } else {
                    $('#neck_input').val((neck / 2.54).toFixed(2));
                  }
                  if ($.trim(chest) == '') {

                  } else {
                    $('#chest_input').val((chest / 2.54).toFixed(2));
                  }
                  if ($.trim(waist) == '') {

                  } else {
                    $('#waist_upper_input').val((waist / 2.54).toFixed(2));
                  }
                  if ($.trim(hips) == '') {

                  } else {
                    $('#hips_upper_input').val((hips / 2.54).toFixed(2));
                  }
                  if ($.trim(shoulder) == '') {

                  } else {
                    $('#shoulder_input').val( (shoulder / 2.54).toFixed(2));
                  }
                  if ($.trim(sleeve_right) == '') {

                  } else {
                    $('#sleeve_length_Right_input').val( (sleeve_right / 2.54).toFixed(2));
                  }
                  if ($.trim(sleeve_left) == '') {

                  } else {
                    $('#sleeve_length_left_input').val( (sleeve_left / 2.54).toFixed(2));
                  }
                  if ($.trim(stomach) == '') {

                  } else {
                    $('#stomach_upper_input').val( (stomach / 2.54).toFixed(2));
                  }
                  if ($.trim(biceps) == '') {

                  } else {
                    $('#biceps_input').val( (biceps / 2.54).toFixed(2));
                  }
                  if ($.trim(forearm) == '') {

                  } else {
                    $('#forearm_input').val( (forearm / 2.54).toFixed(2));
                  }
                  if ($.trim(cuffs) == '') {

                  } else {
                    $('#cuffs_input').val( (cuffs / 2.54).toFixed(2));
                  }
                  if ($.trim(chest_front) == '') {

                  } else {
                    $('#chest_front_input').val( (chest_front / 2.54).toFixed(2));
                  }
                  if ($.trim(chest_back) == '') {

                  } else {
                    $('#chest_back_input').val( (chest_back / 2.54).toFixed(2));
                  }
                  if ($.trim(jacket_front) == '') {

                  } else {
                    $('#jacket_front_input').val( (jacket_front / 2.54).toFixed(2));
                  }
                  if ($.trim(jacket_back) == '') {

                  } else {
                    $('#jacket_back_input').val( (jacket_back / 2.54).toFixed(2));
                  }
                  if ($.trim(vest_len) == '') {

                  } else {
                    $('#vest_length_input').val( (vest_len / 2.54).toFixed(2) );
                  }
                  //end convert cm to in upper data


                  //start convert cm to in lower data
                  if ($.trim(pwaist) == '') {

                  } else {
                    $('#waist_lower_input').val((pwaist /2.54).toFixed(2));
                  }
                  if ($.trim(pstomach) == '') {

                  } else {
                    $('#stomach_lower_input').val((pstomach / 2.54).toFixed(2));
                  }
                  if ($.trim(phips) == '') {

                  } else {
                    $('#hips_lower_input').val((phips /2.54).toFixed(2));
                  }
                  if ($.trim(pcrotch) == '') {

                  } else {
                    $('#crotch_input').val((pcrotch / 2.54).toFixed(2));
                  }
                  if ($.trim(pthighs) == '') {

                  } else {
                    $('#thighs_input').val((pthighs / 2.54).toFixed(2));
                  }
                  if ($.trim(pknees) == '') {

                  } else {
                    $('#knees_input').val((pknees / 2.54).toFixed(2));
                  }
                  if ($.trim(pcalf) == '') {

                  } else {
                    $('#calf_input').val((pcalf / 2.54).toFixed(2));
                  }
                  if ($.trim(pshort) == '') {

                  } else {
                    $('#pants_short_input').val((pshort / 2.54).toFixed(2));
                  }
                  if ($.trim(plength) == '') {

                  } else {
                    $('#pants_length_input').val((plength / 2.54).toFixed(2));
                  }
                  if ($.trim(pbottom) == '') {

                  } else {
                    $('#bottom_length_input').val((pbottom /2.54).toFixed(2));
                  }
                //end convert cm to in lower data
              }
              if (category === "cm") {
                  $('.unit').html("Cm");
                  if ($.trim(neck) == '') {

                  } else {
                    $('#neck_input').val((neck * 2.54).toFixed(2));
                  }
                  if ($.trim(chest) == '') {

                  } else {
                    $('#chest_input').val((chest * 2.54).toFixed(2));
                  }
                  if ($.trim(waist) == '') {

                  } else {
                    $('#waist_upper_input').val((waist * 2.54).toFixed(2));
                  }
                  if ($.trim(hips) == '') {

                  } else {
                    $('#hips_upper_input').val((hips * 2.54).toFixed(2));
                  }
                  if ($.trim(shoulder) == '') {

                  } else {
                    $('#shoulder_input').val((shoulder * 2.54).toFixed(2));
                  }
                  if ($.trim(sleeve_right) == '') {

                  } else {
                    $('#sleeve_length_Right_input').val((sleeve_right * 2.54).toFixed(2));
                  }
                  if ($.trim(sleeve_left) == '') {

                  } else {
                    $('#sleeve_length_left_input').val((sleeve_left * 2.54).toFixed(2));
                  }
                  if ($.trim(stomach) == '') {

                  } else {
                    $('#stomach_upper_input').val((stomach * 2.54).toFixed(2));
                  }
                  if ($.trim(biceps) == '') {

                  } else {
                    $('#biceps_input').val((biceps * 2.54).toFixed(2));
                  }
                  if ($.trim(forearm) == '') {

                  } else {
                    $('#forearm_input').val((forearm * 2.54).toFixed(2));
                  }
                  if ($.trim(cuffs) == '') {

                  } else {
                    $('#cuffs_input').val((cuffs * 2.54).toFixed(2));
                  }
                  if ($.trim(chest_front) == '') {

                  } else {
                    $('#chest_front_input').val((chest_front * 2.54).toFixed(2));
                  }
                  if ($.trim(chest_back) == '') {

                  } else {
                    $('#chest_back_input').val((chest_back * 2.54).toFixed(2));
                  }
                  if ($.trim(jacket_front) == '') {

                  } else {
                    $('#jacket_front_input').val((jacket_front * 2.54).toFixed(2));
                  }
                  if ($.trim(jacket_back) == '') {

                  } else {
                    $('#jacket_back_input').val((jacket_back * 2.54).toFixed(2));
                  }
                  if ($.trim(vest_len) == '') {

                  } else {
                    $('#vest_length_input').val((vest_len * 2.54).toFixed(2));
                  }
                  //end convert in to cm upper data
                //start convert cm to in lower data
                if ($.trim(pwaist) == '') {

                } else {
                  $('#waist_lower_input').val((pwaist * 2.54).toFixed(2));
                }
                if ($.trim(pstomach) == '') {

                } else {
                  $('#stomach_lower_input').val((pstomach * 2.54).toFixed(2));
                }
                if ($.trim(phips) == '') {

                } else {
                  $('#hips_lower_input').val((phips *2.54).toFixed(2));
                }
                if ($.trim(pcrotch) == '') {

                } else {
                  $('#crotch_input').val((pcrotch * 2.54).toFixed(2));
                }
                if ($.trim(pthighs) == '') {

                } else {
                  $('#thighs_input').val((pthighs * 2.54).toFixed(2));
                }
                if ($.trim(pknees) == '') {

                } else {
                  $('#knees_input').val((pknees * 2.54).toFixed(2));
                }
                if ($.trim(pcalf) == '') {

                } else {
                  $('#calf_input').val((pcalf * 2.54).toFixed(2));
                }
                if ($.trim(pshort) == '') {

                } else {
                  $('#pants_short_input').val((pshort * 2.54).toFixed(2));
                }
                if ($.trim(plength) == '') {

                } else {
                  $('#pants_length_input').val((plength * 2.54).toFixed(2));
                }
                if ($.trim(pbottom) == '') {

                } else {
                  $('#bottom_length_input').val((pbottom *2.54).toFixed(2));
                }
                //end convert cm to in lower data
              }

          });
      })

      const jacket = $('#jacket');
      const pants = $('#pants');
      const pants_vessel = $('.pants-vessel');
      const jacket_vessel = $('.jacket-vessel');
      const image_vessel = $('.image-vessel');
      const measureImage = $('#measureImage');

      jacket.click(() => {
          measureImage.attr('src', '/assets/images/customize/measure-jacket.png')
          jacket_vessel.show();
          pants_vessel.hide();
          pants_vessel.addClass('d-none d-md-block')
      })
      pants.click(() => {
          measureImage.attr('src', '/assets/images/customize/measure-pant.png')
          jacket_vessel.hide()
          pants_vessel.show()
          pants_vessel.addClass('order-1 order-md-3')
          image_vessel.addClass('order-2')
          pants_vessel.removeClass('d-none d-md-block')
      })

      let inputs = $('#upper_measure_space input, #lower_measure_space input');
      inputs.click(function () {
          let current_input = $(this);
          let current_input_id = current_input.attr('id');
          measureImage.attr('src', 'assets/images/customize/cus5images/' + current_input_id + '.png')
      })

      $(document).ready(function () {
          chgImg()

      })

      $(window).resize(function () {
          chgImg()
      })

      const chgImg = () => {
          const WindowWidth = $(window).width();
          if (WindowWidth < 767) {
              measureImage.attr('src', '/assets/images/customize/measure-jacket.png')
          } else if (WindowWidth > 767) {
              jacket_vessel.show()
              measureImage.attr('src', '/assets/images/customize/measure-desktop.png')
              pants_vessel.addClass('d-block')
              pants_vessel.removeClass('order-1')
              image_vessel.removeClass('order-2')
          }
      }

      // scroll function
      let scrollBtn = document.getElementById("scrollBtn");
      window.onscroll = function () {
          scrollFunction()
      };

      function scrollFunction() {
          if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
              scrollBtn.style.display = "block";
              scrollBtn.style.opacity = "1";
              // scrollBtn.style.transform = "scale(1)";
              scrollBtn.style.pointerEvents = "all";
          } else {
              scrollBtn.style.display = "none";
              scrollBtn.style.opacity = "0";
              // scrollBtn.style.transform = "scale(1)";
              scrollBtn.style.pointerEvents = "none";
          }
      }

      // When the user clicks on the button, scroll to the top of the document
      function topFunction() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
      }

      function save_user() {
          // alert("h");
          var user_id = $('#user_id').val();
          var username = $('#username').val();
          var phone = $('#phone').val();
          var dob = $('#dob').val();
          var city = $('#city').val();
          var address = $('#address').val();
          var email = $('#email').val();
          var gender = $('#gender').val();
          $.ajax({
              type: 'POST',
              url: '/store_user_profile_ajax',
              data: {
                  "_token": "{{csrf_token()}}",
                  "user_id": user_id,
                  "username": username,
                  "phone": phone,
                  "dob": dob,
                  "city": city,
                  "address": address,
                  "email": email,
                  "gender": gender
              },
              success: function (data) {
                  console.log(data);
                  if (data.msg == "success") {
                      swal({
                          title: "Success",
                          text: "Successfully Stored User Info",
                          icon: "success",
                      }).then(function () {
                          if (data.user_info.city != null && data.user_info.tsp_street == null) {
                              var location = data.user_info.city;
                          } else if (data.user_info.city == null && data.user_info.tsp_street != null) {
                              var location = data.user_info.tsp_street;
                          } else if (data.user_info.city != null && data.user_info.tsp_street != null) {
                              var location = data.user_info.city + ' ' + data.user_info.tsp_street;
                          } else {
                              var location = '';
                          }

                          sessionStorage.setItem('address', location);

                          window.location.reload();
                      });
                  }
              }
          });
      }
  </script>
@endsection
@push('logout-script')
  <script>

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

  </script>
@endpush
@push('script_tag')
  <script>
      function get_measure_unit(value)
      {
        $('#measure_type').val(value);
      }
      $('#save_measurement').click(function () {
          var user_id = $('#user_id').val();
          // alert(user_id);
          var measure_type = $('#measure_type').val();
          // alert(measure_type);
          //start user info data
          var age = $('#age').val();
          var height = $('#height').val();
          var height_type = $('#height_type').val();
          var weight = $('#weight').val();
          var weight_type = $('#weight_type').val();
          var shoulder_type = $('#shoulder_type').val();
          var drop_shoulder = $('#dropped_shoulder').val();
          var arms_position = $('#arms_position').val();
          var body_shape = $('#body_shape').val();
          var neck_type = $('#neck_type').val();
          var stomach_shape = $('#stomach_shape').val();
          var upper_body_shape = $('#upper_body_shape').val();
          var pant_line = $('#pant_line').val();
          var seat = $('#seat').val();
          //end user info data
          //start upper data
          var neck = $('#neck_input').val();
          var chest = $('#chest_input').val();
          var waist = $('#waist_upper_input').val();
          var hips = $('#hips_upper_input').val();
          var shoulder = $('#shoulder_input').val();
          var sleeve_right = $('#sleeve_length_Right_input').val();
          var sleeve_left = $('#sleeve_length_left_input').val();
          var stomach = $('#stomach_upper_input').val();
          var biceps = $('#biceps_input').val();
          var forearm = $('#forearm_input').val();
          var cuffs = $('#cuffs_input').val();
          var chest_front = $('#chest_front_input').val();
          var chest_back = $('#chest_back_input').val();
          var jacket_front = $('#jacket_front_input').val();
          var jacket_back = $('#jacket_back_input').val();
          var vest_len = $('#vest_length_input').val();
          //end upper data
          //start lower data
          var pwaist = $('#waist_lower_input').val();
          var pstomach = $('#stomach_lower_input').val();
          var phips = $('#hips_lower_input').val();
          var pcrotch = $('#crotch_input').val();
          var pthighs = $('#thighs_input').val();
          var pknees = $('#knees_input').val();
          var pcalf = $('#calf_input').val();
          var pshort = $('#pants_short_input').val();
          var plength = $('#pants_length_input').val();
          var pbottom = $('#bottom_length_input').val();
          //end lower data
          //start store all measurement data
          $.ajax({
              type: 'POST',
              url: '/store_measure_from_profile_ajax',
              data: {
                  "_token": "{{csrf_token()}}",
                  "user_id": user_id,
                  "measure_type" : measure_type,
                  "age": age,
                  "height": height,
                  "height_type": height_type,
                  "weight": weight,
                  "weight_type": weight_type,
                  "shoulder_type": shoulder_type,
                  "drop_shoulder": drop_shoulder,
                  "arms_position": arms_position,
                  "body_shape": body_shape,
                  "neck_type": neck_type,
                  "stomach_shape": stomach_shape,
                  "upper_body_shape": upper_body_shape,
                  "pant_line": pant_line,
                  "seat": seat,


                  "neck": neck,
                  "chest": chest,
                  "waist": waist,
                  "hips": hips,
                  "shoulder": shoulder,
                  "sleeve_right": sleeve_right,
                  "sleeve_left": sleeve_left,
                  "stomach": stomach,
                  "biceps": biceps,
                  "forearm": forearm,
                  "cuffs": cuffs,
                  "chest_front": chest_front,
                  "chest_back": chest_back,
                  "jacket_front": jacket_front,
                  "jacket_back": jacket_back,
                  "vest_len": vest_len,


                  "pwaist": pwaist,
                  "pstomach": pstomach,
                  "phips": phips,
                  "pcrotch": pcrotch,
                  "pthighs": pthighs,
                  "pknees": pknees,
                  "pcalf": pcalf,
                  "pshort": pshort,
                  "plength": plength,
                  "pbottom": pbottom
              },
              success: function (data) {
                  if (data.msg == 'success') {
                      swal({
                          title: "Success",
                          text: "Successfully Save For Measurement",
                          icon: "success",
                      });
                  }

              }
          });

          //end store all measurement data
      });
  </script>
@endpush
@push('whishlist-scripts')
  <script>
      getData();


      //remove item from ls
      //  $('#tbody').on('click', '.remove', function() {

      //    var id = $(this).data('id'); //no
      //      console.log(id);
      //      var loItem = localStorage.getItem('Item');
      //      var itemArr = JSON.parse(loItem);
      //      //delete
      //      itemArr.splice(id, 1);
      //      localStorage.setItem('Item',JSON.stringify(itemArr));
      //      getData();

      //    });

      var whishlist = localStorage.getItem('Item');
      if (whishlist) {
          getData();
          // getnavData();

      }


      function deletedata(user_id, id, photo_one, name, price) {
          // alert(`user_id = ${user_id}, id = ${id}, photo = ${photo_one}, name = ${name}, price = ${price}`);
          var loItem = window.localStorage.getItem('Item');
          // var removeItem = window.localStorage.getItem('Item','id');
          // alert(removeItem);
          var itemArr = JSON.parse(loItem);
          // var id = 0;
          //delete
          // itemArr.splice(0,1);
          var total_total = itemArr.filter(total => total.id !== id);
          localStorage.setItem('Item', JSON.stringify(total_total));

          document.getElementById('fav-space').innerHTML = parseInt(document.getElementById('fav-space').innerHTML) - 1;
          $('#wishlist' + id).show();
          $('#delete' + id).hide();
          getData();
      }

      function getData() {
          var whishlist = localStorage.getItem('Item');
          console.log(whishlist);
          var whishlistobj = JSON.parse(whishlist);
          var html = '';

          if (whishlistobj != null) {
              $.each(whishlistobj, function (i, v) {

                  console.log(v);
                  user_id = `{{Auth::guard('web')->user()->id}}`;
                  if (v.user_id == user_id) {
                      html += `<div class="col-6 col-md-4">
                    <div class="text-center">
                      <div id="tbody" class="mb-1 position-relative">
                        <img src="{{'/assets/images/categories/ready/${v.photo}'}}" alt="">
                        <button class="remove position-absolute top-0 end-0 me-2 me-md-3 mt-2 mt-md-3
                        cursor-pointer"  style='all:unset'
                        onclick="deletedata('{{Auth::guard('web')->user()->id}}','${v.id}','${v.photo_one}','${v.name}','${v.price}')">
                        <i class='bx bxs-heart' style='color:#0e122d'></i>
                        </button>

                      </div>
                      <p>${v.name}</p>
                      <p class="text-gold">$'${v.price}'</p>
                  </div>
                  </div>`
                  } else {
                      html += ``
                  }

              })
          } else {


          }

          $("#html_wishlist").html(html);

      }


      if (sessionStorage.getItem('to_profile') == 1) {
          var html = "";
          var html_1 = "";
          sessionStorage.removeItem('to_profile');
          html += `
       <a class="d-flex align-items-center mb-4" style="height: 20px;" data-bs-toggle="pill" href="#profile" aria-selected="false" role="tab" tabindex="-1">
            <img src="http://localhost:8000/assets/images/profile/icon/profile.png" width="20px" alt="" class="me-3">
            Profile
          </a>
      <a class="d-flex align-items-center mb-4 active" style="height: 20px;" data-bs-toggle="pill" href="#wishlist" aria-selected="true" role="tab">
        <img src="http://localhost:8000/assets/images/profile/icon/wishlist.png" width="20px" alt="" class="me-3">

        Wishlist
      </a>
      <a class="d-flex align-items-center mb-4" style="height: 20px;"
            data-bs-toggle="pill" href="#measurements">
          <img src="{{asset('assets/images/profile/icon/measurement.png')}}" width="20px" alt="" class="me-3">
          Measurements
        </a>
        <a class="d-flex align-items-center mb-4" style="height: 20px;"
            data-bs-toggle="pill" href="#orders">
          <img src="{{asset('assets/images/profile/icon/order.png')}}" width="20px" alt=""
                class="me-3">
          Orders
        </a>
       `
          $('#nav').html(html);

          $("#wishlist").addClass("active show");
          $('#wishlist').show();
          $("#profile").removeClass("active");

      }
  </script>
@endpush
<!-- @push('whishlist-nav')
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
@endpush -->

