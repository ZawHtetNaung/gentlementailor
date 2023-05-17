<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div id="signInReg-sec" class="row g-0 full-height">
                    <div class="col-md-6 sign-bg ">
                        <div class="black-overlay center-flex">
                            <img src="{{asset('assets/images/home/logo.png')}}" alt=""
                                 class="sign-logo ">
                        </div>
                    </div>
                    <!-- Sign In -->
                    <div id="signIn-sec"
                         class="col-md-6 px-5 d-flex flex-column justify-content-around bg-main d-none">
                        <div class="text-end mt-4">
{{--                            <button type="button" class="btn-close"--}}
{{--                                    data-bs-dismiss="modal"--}}
{{--                                    aria-label="Close"></button>--}}
                            <button type="button" class="btn-close btn-close-white pt-4"
                                    data-bs-dismiss="modal"></button>
                        </div>
                        <div class="w-100 px-0 px-md-4 px-lg-5 py-4">
                            <h4 class="mb-5 text-uppercase ls-0">Sign In</h4>
                            <form method="POST" action="{{ route('.login') }}" class="modal-form">
                                @csrf
                                <div class="mb-4 log-form">
                                    <label for="email" class="ls-0 mb-2">Email address</label>
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid
                                               @enderror"
                                           name="email" value="{{ old('email') }}" required
                                           autocomplete="email" autofocus onkeyup="">
                                    <!-- <div id="email-require" class="alert alert-danger d-none"
                                         role="alert">
                                        The email field is required!
                                    </div> -->
                                    <span id="email-require" class="invalid-zh d-none" role="alert">
                                        <strong>The email field is required!</strong>
                                    </span>
                                    <span id="email-valid" class="invalid-zh d-none" role="alert">
                                        <strong> The email must be a valid email address!</strong>
                                    </span>
                                    <span id="email-fail" class="invalid-zh d-none" role="alert">
                                        <strong> The email or password is not match in our record!</strong>
                                    </span>
                                </div>
                                <div class="mb-5 log-form">
                                    <label for="password" class="ls-0 mb-2">Password</label>
                                    <input id="password" type="password"
                                           class="form-control @error('password')
                                               is-invalid
                                                @enderror"
                                           name="password" required
                                           autocomplete="current-password" onkeyup="">
                                    <i id="toggle_pwd" class="fa fa-fw fa-eye field_icon" style="
                                        color: #fff;
                                    "></i>
                                    <!-- <span id="toggle_pwd" class="fa-solid fa-eye"></span> -->
                                    <span id="password-require" class="invalid-zh d-none" role="alert">
                                        <strong> The password field is required!</strong>
                                    </span>
                                    <span id="password-valid" class="invalid-zh d-none" role="alert">
                                        <strong> The password must be at least 8 characters!</strong>
                                    </span>
                                    <span id="password-fail" class="invalid-zh d-none" role="alert">
                                        <strong> The password is not match in our record!</strong>
                                    </span>
                                </div>
                                <!-- <button id="login" type="button">Continue</button> -->
                                <input id="login" type="button" value="Continue" class="btn mb-4
                                w-100">
                            </form>
                            <p class="my-2 text-center">
                                <a href="forget-password" class="small-text
                                text-decoration-underline">Forgot
                                    Password?</a>
                            </p>
                        </div>
                        <div class="text-center">
                            <a type="button" id="register" class="ls-0">
                                <h6 class="mb-5">
                                    Register
                                </h6>
                            </a>
                        </div>
                    </div>
                    <!-- Reg -->
                    <div id="reg-sec"
                         class="col-md-6 px-5 d-flex flex-column justify-content-around bg-main">
                        <div class="text-end mt-4">
<!--                            <button type="button" class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close">

                            </button>-->
                            <button type="button" class="btn-close btn-close-white pt-4"
                                    data-bs-dismiss="modal"></button>
                        </div>
                        <div class="w-100 px-0 px-md-4 px-lg-5 py-4">
                            <h4 class="mb-5 text-uppercase ls-0">Register</h4>
                            <form method="POST"
                                  action="{{ route('.register') }}" class="modal-form">
                                @csrf
                                <div class="log-form mb-4">
                                    <label for="reg_name" class="ls-0">User Name</label>
                                    <input id="reg_name" type="text"
                                           class="form-control @error('name') is-invalid
                                               @enderror"
                                           name="name" value="{{ old('name') }}" required
                                           autocomplete="name" autofocus>
                                    <!-- @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror -->
                                    <span id="name-require" class="invalid-zh d-none" role="alert">
                                        <strong> The name field is required!</strong>
                                    </span>
                                    <span id="name-valid" class="invalid-zh d-none" role="alert">
                                        <strong> The name must be at least 50 characters!</strong>
                                    </span>
                                </div>
                                <div class="log-form mb-4">
                                    <label for="reg_email" class="ls-0">Email address</label>
                                    <input id="reg_email" type="email"
                                           class="form-control @error('email') is-invalid
                                               @enderror"
                                           name="email" value="{{ old('email') }}" required
                                           autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span id="reg-email-require" class="invalid-zh d-none" role="alert">
                                        <strong>  The email field is required!</strong>
                                    </span>
                                    <span id="reg-email-valid" class="invalid-zh d-none" role="alert">
                                        <strong> The email must be a valid email address!</strong>
                                    </span>
                                    <span id="reg-email-already" class="invalid-zh d-none" role="alert">
                                        <strong> The email has already been taken!</strong>
                                    </span>
                                </div>
                                <div class="log-form mb-4">
                                    <label for="password" class="ls-0">Password</label>
                                    <input id="reg-password" type="password"
                                           class="form-control @error('password')
                                               is-invalid
                                                @enderror"
                                           name="password" required autocomplete="new-password">
                                    <i id="toggle_pwd_reg" class="fa fa-fw fa-eye field_icon"></i>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span id="reg-password-require" class="invalid-zh d-none" role="alert">
                                        <strong>  The password field is required!</strong>
                                    </span>
                                    <span id="reg-password-valid" class="invalid-zh d-none" role="alert">
                                        <strong>  The password must be at least 8 characters!</strong>
                                    </span>
                                    <span id="reg-password-confirm" class="invalid-zh d-none" role="alert">
                                        <strong> The password confirmation does not match!</strong>
                                    </span>
                                </div>
                                <div class="log-form mb-5">
                                    <label for="password" class="ls-0">Confirm Password</label>
                                    <input id="password-confirm" type="password"
                                           class="form-control"
                                           name="password_confirmation" required
                                           autocomplete="new-password">
                                  <i id="toggle_con-pwd_reg" class="fa fa-fw fa-eye field_icon"></i>
                                </div>
                                <input type="button" id="register-valid" class="btn text-white mb-4 w-100"
                                       value="Continue">
                            </form>
                            <a id="login-sec" type="button" class="">
                                <h6 class="my-3 text-center">
                                    Already have user account?
                                </h6>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>
@push('pop-up-scripts')
    <script type="text/javascript">
        /*$(document).ready(function () {
            $("#register").click(function () {
                $("#login-form").addClass("d-none");
                $("#register-form").removeClass("d-none");
            });
            $("#login").click(function () {
                $("#login-form").removeClass("d-none");
                $("#register-form").addClass("d-none");
            });
        });*/

        $(document).ready(function () {
            $("#register").click(function () {
                $("#signIn-sec").addClass("d-none");
                $("#reg-sec").removeClass("d-none");
            });
            $("#login-sec").click(function () {
                $("#signIn-sec").removeClass("d-none");
                $("#reg-sec").addClass("d-none");
            });

            // for eye icon
            $(function () {
                $("#toggle_pwd").click(function () {
                    $(this).toggleClass("fa-eye fa-eye-slash");
                    var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
                    $("#password").attr("type", type);
                });
                $("#toggle_pwd_reg").click(function () {
                    $(this).toggleClass("fa-eye fa-eye-slash");
                    var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
                    $("#reg-password").attr("type", type);
                });
                $("#toggle_con-pwd_reg").click(function () {
                    $(this).toggleClass("fa-eye fa-eye-slash");
                    var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
                    $("#password-confirm").attr("type", type);
                });
            });

        });


    </script>
@endpush
@push('login-validate-scripts')
    <script>
        // Login
        function userlogin() {
            axios.post(`{!! url('login') !!}`, {
                'email': $("#email").val(),
                'password': $("#password").val(),
            }).then(response => {
                // if user validate fail
                // email
                if (response.data.email == 'The email field is required.') {
                    // alert("need");
                    $("#email-require").removeClass("d-none");
                    $("#email-valid").addClass("d-none");
                } else if(response.data.email == 'The email must be a valid email address.'){
                    // alert("valid");
                    $("#email-require").addClass("d-none");
                    $("#email-valid").removeClass("d-none");
                } else {
                    // alert("pass");
                    $("#email-require").addClass("d-none");
                    $("#email-valid").addClass("d-none");
                }

                // password
                if (response.data.password == 'The password field is required.') {
                    // alert("need");
                    $("#password-require").removeClass("d-none");
                    $("#password-valid").addClass("d-none");
                } else if(response.data.password == 'The password must be at least 8 characters.'){
                    // alert("valid");
                    $("#password-require").addClass("d-none");
                    $("#password-valid").removeClass("d-none");
                } else {
                    // alert("pass");
                    $("#password-require").addClass("d-none");
                    $("#password-valid").addClass("d-none");
                }

                // if user login fail
                console.log(response.data);

                console.log("-----------------------")
                // console.log(response.data.password);
                if(response.data['status'] == 'fail'){
                    // alert("login fail");
                    $("#email-require").addClass("d-none");
                    $("#email-valid").addClass("d-none");
                    $("#password-require").addClass("d-none");
                    $("#password-valid").addClass("d-none");
                    $("#email-fail").removeClass("d-none");
                    // if(response.data.email){
                    //     $("#email-fail").removeClass("d-none");
                    // }else if(response.data.password){
                    //     $("#password-fail").removeClass("d-none");
                    // }

                }else if(response.data['status'] == 'success'){
                    console.log(response.data['has_step']);
                    sessionStorage.setItem('has_step',response.data.has_step);
                    // alert("login success");
                    //store temporary data for user start
                    if(response.data.has_step == null){

                      $.ajax({
                        type: 'POST',
                        url: '/store_customize_step_data',
                        data: {
                          "_token": "{{csrf_token()}}",
                          "user_id":response.data.user_id,
                          "cus_cate_id": sessionStorage.getItem('customize_category_id'),
                          "package_id" : sessionStorage.getItem('package_id'),
                          "style_id" : sessionStorage.getItem('style_id'),
                          "style_name" : sessionStorage.getItem('style_name'),
                          "style_cate_name" : sessionStorage.getItem('style_cate_name'),
                          "style_cate_id" : sessionStorage.getItem('style_cate_id'),
                          "fitting" : sessionStorage.getItem('fitting'),
                          "texture_id" : sessionStorage.getItem('texture_id'),
                          "jacket_id" : sessionStorage.getItem('jacket_id'),
                          "jacket_price" : sessionStorage.getItem('jacket_price'),
                          "vest_id" : sessionStorage.getItem('vest_id'),
                          "vest_price" : sessionStorage.getItem('vest_price'),
                          "pant_id" : sessionStorage.getItem('pant_id'),
                          "pant_price" : sessionStorage.getItem('pant_price'),

                          "step_no" : sessionStorage.getItem('step_no'),
                          "measured" : sessionStorage.getItem('measure_step'),
                          "suit_piece" : sessionStorage.getItem('suit_piece'),
                          "jacket_in" :sessionStorage.getItem('jacket_in'),
                          "vest_in" : sessionStorage.getItem('vest_in'),
                          "pant_in" : sessionStorage.getItem('pant_in'),
                          "package_price" : sessionStorage.getItem('package_price'),
                          "texture_price" : sessionStorage.getItem('texture_price'),
                          "cus_total_price" : sessionStorage.getItem('cus_total_price'),

                          "suit_code" : sessionStorage.getItem('suit_code'),
                          "shipping_id" : sessionStorage.getItem('shipping_id'),
                          "shipping_price" : sessionStorage.getItem('shipping_price'),

                          "upper_measure_unit" : sessionStorage.getItem('upper_measure_unit'),
                          "lower_measure_unit" : sessionStorage.getItem('lower_measure_unit'),
                          },
                        success: function (data) {
                          sessionStorage.setItem('has_step',data.has_step);
                          if(sessionStorage.getItem('store_m_status') != null || sessionStorage.getItem('store_m_status') != '')
                          {
                            sessionStorage.setItem('from_store_temporary_user',response.data.user_id)
                              store_measurement_overall();
                              window.location.reload();
                          }

                        }
                      });
                    }
                    //store temporary data for user end
                    //get temporary data for user start
                    if(response.data.has_step != null){
                      // alert("do get temporary");
                      $.ajax({
                        type: 'POST',
                        url: '/get_customize_step_data',
                        data: {
                          "_token": "{{csrf_token()}}",
                          "user_id":response.data.user_id,
                          "has_step" : sessionStorage.getItem('has_step')
                        },
                        success: function (data) {
                          swal({
                              title: "Your Login was successfully",
                              text: "And Do you delete your previous customize session data?",
                              icon: "warning",
                              buttons: [
                                'No, cancel it!',
                                'Yes, I am sure!'
                              ],
                              dangerMode: true,
                          }).then(function(isConfirm) {
                            if (isConfirm) {
                              swal({
                                title: 'Sucessful!',
                                text: 'Your previous customize session data are successfully deleted!',
                                icon: 'success'
                              }).then(function() {
                                //delete temporary start
                                $.ajax({
                                  type: 'POST',
                                  url: '/delete_customize_step_data',
                                  data: {
                                    "_token": "{{csrf_token()}}",
                                    "temporary_id": sessionStorage.getItem('has_step'),
                                  },
                                  success: function (data) {
                                    // sessionStorage.clear();
                                    // store new temprary start
                                    // $.ajax({
                                    //   type: 'POST',
                                    //   url: '/store_customize_step_data',
                                    //   data: {
                                    //     "_token": "{{csrf_token()}}",
                                    //     "user_id":response.data.user_id,
                                    //     "cus_cate_id": sessionStorage.getItem('customize_category_id'),
                                    //     "package_id" : sessionStorage.getItem('package_id'),
                                    //     "style_id" : sessionStorage.getItem('style_id'),
                                    //     "style_name" : sessionStorage.getItem('style_name'),
                                    //     "style_cate_name" : sessionStorage.getItem('style_cate_name'),
                                    //     "style_cate_id" : sessionStorage.getItem('style_cate_id'),
                                    //     "fitting" : sessionStorage.getItem('fitting'),
                                    //     "texture_id" : sessionStorage.getItem('texture_id'),
                                    //     "jacket_id" : sessionStorage.getItem('jacket_id'),
                                    //     "vest_id" : sessionStorage.getItem('vest_id'),
                                    //     "pant_id" : sessionStorage.getItem('pant_id'),
                                    //     "upper_id" : sessionStorage.getItem('upper_id'),
                                    //     "lower_id" : sessionStorage.getItem('lower_id'),
                                    //     "order_id" : sessionStorage.getItem('order_id'),
                                    //     "step_no" : sessionStorage.getItem('step_no'),
                                    //     "measured" : sessionStorage.getItem('measure_step'),
                                    //     "suit_piece" : sessionStorage.getItem('suit_piece'),
                                    //     "jacket_in" :sessionStorage.getItem('jacket_in'),
                                    //     "vest_in" : sessionStorage.getItem('vest_in'),
                                    //     "pant_in" : sessionStorage.getItem('pants_in'),
                                    //     },
                                    //   success: function (data) {
                                    //     sessionStorage.setItem('has_step',data.has_step);
                                    //   }
                                    // });

                                    // end new temporary
                                    window.location.reload();

                                  }
                                });
                                  //delete temporary end
                              });
                            } else {
                              swal("Cancelled", "Your previous customize session data are successfully recover :)", "success");
                              //get start --
                                  console.log(data.get_step_data);
                                  if(data.get_step_data.texture_id == null)
                                  {
                                      var texture_id = ''
                                  }
                                  else
                                  {
                                    var texture_id = data.get_step_data.texture_id;
                                    sessionStorage.setItem('texture_id',texture_id);
                                  }
                                  if(data.get_step_data.customize_category_id == null)
                                  {
                                    var cus_cate_id = ''
                                  }
                                  else
                                  {
                                    var cus_cate_id = data.get_step_data.customize_category_id;
                                    sessionStorage.setItem('customize_category_id',cus_cate_id);
                                  }
                                  if(data.get_step_data.package_id == null)
                                  {
                                    var package_id = ''
                                  }
                                  else
                                  {
                                    var package_id = data.get_step_data.package_id;
                                    sessionStorage.setItem('package_id',package_id);
                                  }
                                  if(data.get_step_data.style_id == null)
                                  {
                                    var style_id = ''
                                  }
                                  else
                                  {
                                    var style_id = data.get_step_data.style_id;

                                    sessionStorage.setItem('style_id',style_id);
                                  }
                                  if(data.get_step_data.style_name == null)
                                  {
                                    var style_name = ''
                                  }
                                  else
                                  {
                                    var style_name = data.get_step_data.style_name;
                                    sessionStorage.setItem('style_name',style_name);
                                  }
                                  if(data.get_step_data.style_cate_name == null)
                                  {
                                    var style_cate_name = ''
                                  }
                                  else
                                  {
                                    var style_cate_name = data.get_step_data.style_cate_name;
                                    sessionStorage.setItem('style_cate_name',style_cate_name);
                                  }
                                  if(data.get_step_data.style_cate_id == null)
                                  {
                                    var style_cate_id = ''
                                  }
                                  else
                                  {
                                    var style_cate_id = data.get_step_data.style_cate_id;
                                    sessionStorage.setItem('style_cate_id',style_cate_id);
                                  }
                                  if(data.get_step_data.fitting == null)
                                  {
                                    var fitting = ''
                                  }
                                  else
                                  {
                                    var fitting = data.get_step_data.fitting;
                                    sessionStorage.setItem('fitting',fitting);
                                  }
                                  if(data.get_step_data.jacket_id == null)
                                  {
                                    var jacket_id = ''
                                  }
                                  else
                                  {
                                    var jacket_id = data.get_step_data.jacket_id;
                                    sessionStorage.setItem('jacket_id',jacket_id);
                                  }
                                  if(data.get_step_data.jacket_price == null)
                                  {
                                    var jacket_price = 0
                                  }
                                  else
                                  {
                                    var jacket_price = data.get_step_data.jacket_price;
                                    sessionStorage.setItem('jacket_price',jacket_price);
                                  }
                                  if(data.get_step_data.vest_id == null)
                                  {
                                    var vest_id = ''
                                  }
                                  else
                                  {
                                    var vest_id = data.get_step_data.vest_id
                                    sessionStorage.setItem('vest_id',vest_id);
                                  }
                                  if(data.get_step_data.vest_price == null)
                                  {
                                    var vest_price = 0
                                  }
                                  else
                                  {
                                    var vest_price = data.get_step_data.vest_price;
                                    sessionStorage.setItem('vest_price',vest_price);
                                  }
                                  if(data.get_step_data.pant_id == null)
                                  {
                                    var pant_id = ''
                                  }
                                  else
                                  {
                                    var pant_id = data.get_step_data.pant_id;
                                    sessionStorage.setItem('pant_id',pant_id);
                                  }
                                  if(data.get_step_data.pant_price == null)
                                  {
                                    var pant_price = 0
                                  }
                                  else
                                  {
                                    var pant_price = data.get_step_data.pant_price;
                                    sessionStorage.setItem('pant_price',pant_price);
                                  }

                                  if(data.get_step_data.shipping_id == null)
                                  {
                                    var shipping_id = 0
                                    sessionStorage.setItem('shipping_id',shipping_id);
                                  }
                                  else
                                  {
                                    var shipping_id = data.get_step_data.shipping_id;
                                    sessionStorage.setItem('shipping_id',shipping_id);
                                  }
                                  if(data.get_step_data.shipping_price == null)
                                  {
                                    var shipping_price = ''
                                  }
                                  else
                                  {
                                    var shipping_price = data.get_step_data.shipping_price;
                                    sessionStorage.setItem('shipping_price',shipping_price);
                                  }
                                  if(data.get_step_data.measured == null)
                                  {
                                    var measured = ''
                                  }
                                  else
                                  {
                                    var measured = data.get_step_data.measured
                                    sessionStorage.setItem('measure_step',measured);
                                  }
                                  if(data.get_step_data.suit_piece == null)
                                  {
                                    var suit_piece = ''
                                  }
                                  else
                                  {
                                    var suit_piece = data.get_step_data.suit_piece
                                    sessionStorage.setItem('suit_piece',suit_piece);
                                  }
                                  if(data.get_step_data.jacket_in == null)
                                  {
                                    var jacket_in = false
                                  }
                                  else
                                  {
                                    var jacket_in = data.get_step_data.jacket_in
                                    sessionStorage.setItem('jacket_in',jacket_in);
                                  }
                                  if(data.get_step_data.vest_in == null)
                                  {
                                    var vest_in = false
                                  }
                                  else
                                  {
                                    var vest_in = data.get_step_data.vest_in
                                    sessionStorage.setItem('vest_in',vest_in);
                                  }
                                  if(data.get_step_data.pant_in == null)
                                  {
                                    var pant_in = false
                                  }
                                  else
                                  {
                                    var pant_in = data.get_step_data.pant_in
                                    sessionStorage.setItem('pant_in',pant_in);
                                  }
                                  if(data.get_step_data.package_price == null)
                                  {
                                    var package_price = 0;
                                  }
                                  else
                                  {
                                    var package_price = data.get_step_data.package_price
                                    sessionStorage.setItem('package_price',package_price);
                                  }
                                  if(data.get_step_data.texture_price == null)
                                  {
                                    var texture_price = 0;
                                  }
                                  else
                                  {
                                    var texture_price = data.get_step_data.texture_price
                                    sessionStorage.setItem('texture_price',texture_price);
                                  }
                                  // if(data.get_step_data.suit_code == null)
                                  // {
                                  //   var suit_code = "start";
                                  // }
                                  // else
                                  // {
                                  //   var suit_code = data.get_step_data.suit_code;
                                  //   // alert(data.get_step_data.suit_code);
                                  //   sessionStorage.setItem('suit_code',suit_code);
                                  // }
                                  if(data.get_step_data.cus_total_price == null)
                                  {
                                    // alert("ctp-0");
                                    var cus_total_price = 0;
                                    sessionStorage.setItem('cus_total_price',cus_total_price);
                                  }
                                  else
                                  {
                                    // alert("ctp-have");
                                    var cus_total_price = data.get_step_data.cus_total_price
                                    sessionStorage.setItem('cus_total_price',cus_total_price);
                                  }
                                  // if(data.get_step_data.measure_type == 'cm')
                                  // {
                                  //   // alert("in cm");
                                  //   var measure_unit = "cm";
                                  //   sessionStorage.setItem('measure_unit',measure_unit);
                                  // }
                                  // else if(data.get_step_data.measure_type == 'in')
                                  // {
                                  //   // alert("in in");
                                  //   var measure_unit = "in";
                                  //   sessionStorage.setItem('measure_unit',measure_unit);
                                  // }
                                  // else
                                  // {
                                  //   // alert("null unit");
                                  //   sessionStorage.setItem('measure_unit','cm');

                                  // }
                                  if(data.get_step_data.suit_code == null)
                                  {
                                    // alert("ctp-0");
                                    var suit_code = 0;

                                  }
                                  else
                                  {
                                    // alert("ctp-have");
                                    var suit_code = data.get_step_data.suit_code
                                    sessionStorage.setItem('suit_code',suit_code);
                                  }
                                  if(data.get_step_data.upper_measure_unit == null && data.get_step_data.lower_measure_unit == null)
                                  {
                                    // alert("ctp-0");
                                    var measure_unit = 'in';
                                    if(sessionStorage.getItem('customize_category_id') == 1 || sessionStorage.getItem('customize_category_id') == 2)
                                    {
                                      sessionStorage.setItem('upper_measure_unit',measure_unit);
                                    }
                                    else if(sessionStorage.getItem('customize_category_id') == 3)
                                    {
                                      sessionStorage.setItem('lower_measure_unit',measure_unit);
                                    }
                                    else if(sessionStorage.getItem('customize_category_id') == 9)
                                    {
                                      sessionStorage.setItem('upper_measure_unit',measure_unit);
                                      sessionStorage.setItem('lower_measure_unit',measure_unit);
                                    }

                                  }
                                  else if(data.get_step_data.upper_measure_unit != null && data.get_step_data.lower_measure_unit == null)
                                  {
                                    // alert("ctp-have");
                                    var measure_unit = data.get_step_data.upper_measure_unit;
                                    sessionStorage.setItem('upper_measure_unit',measure_unit);
                                  }
                                  else if(data.get_step_data.upper_measure_unit == null && data.get_step_data.lower_measure_unit != null)
                                  {
                                    // alert("ctp-have");
                                    var measure_unit = data.get_step_data.lower_measure_unit;
                                    sessionStorage.setItem('lower_measure_unit',measure_unit);
                                  }
                                  else if(data.get_step_data.upper_measure_unit != null && data.get_step_data.lower_measure_unit != null)
                                  {
                                    // alert("ctp-have");
                                    var upper_measure_unit = data.get_step_data.upper_measure_unit;
                                    var lower_measure_unit = data.get_step_data.lower_measure_unit;
                                    if(sessionStorage.getItem('customize_category_id') == 1 || sessionStorage.getItem('customize_category_id') == 2)
                                    {
                                      sessionStorage.setItem('upper_measure_unit',upper_measure_unit);
                                    }
                                    else if(sessionStorage.getItem('customize_category_id') == 3)
                                    {
                                      sessionStorage.setItem('lower_measure_unit',lower_measure_unit);
                                    }
                                    else if(sessionStorage.getItem('customize_category_id') == 9)
                                    {
                                      sessionStorage.setItem('upper_measure_unit',upper_measure_unit);
                                      sessionStorage.setItem('lower_measure_unit',lower_measure_unit);
                                    }
                                  }
                                  if(data.user == null)
                                  {
                                    var address = ''
                                  }
                                  else
                                  {
                                    if(data.user.city != null && data.user.tsp_street == null)
                                    {
                                      var address = data.user.city
                                    }
                                    else if (data.user.city == null && data.user.tsp_street != null)
                                    {
                                      var address = data.user.tsp_street;
                                    }
                                    else if (data.user.city != null && data.user.tsp_street != null)
                                    {
                                      var address = data.user.city+' '+data.user.tsp_street;
                                    }
                                    else
                                    {
                                      var address = '';
                                    }
                                    sessionStorage.setItem('address',address);
                                  }
                                   sessionStorage.setItem('step_no',data.get_step.step);
                                   window.location.reload();
                                }
                                //get end --
                              });
                            }
                          })

                    }
                    //get temporary data for user end
                    //
                    if(response.data.has_step == null)
                    {
                      swal({
                          title: "Your Login was successfull!",
                          text: "",
                          type: "success",
                          icon: "success"
                      }).then(function() {
                          window.location.reload();
                      });
                    }
                }



            });
        }

          $("#login").click(function () {
            userlogin();
        });

        // Register
        function userregister() {
            axios.post(`{!! url('register') !!}`, {
                'name' : $("#reg_name").val(),
                'email': $("#reg_email").val(),
                'password': $("#reg-password").val(),
                'password_confirmation': $("#password-confirm").val(),
            }).then(response => {
                // alert("register");
                console.log(response.data);

                // if user validate fail
                // name
                if (response.data.name == 'The name field is required.') {
                    // alert("need");
                    $("#name-require").removeClass("d-none");
                    $("#name-valid").addClass("d-none");
                } else if(response.data.name == ' The name must be at least 50 characters.'){
                    // alert("valid");
                    $("#name-require").addClass("d-none");
                    $("#name-valid").removeClass("d-none");
                } else {
                    // alert("pass");
                    $("#name-require").addClass("d-none");
                    $("#name-valid").addClass("d-none");
                }
                // email
                if (response.data.email == 'The email field is required.') {
                    // alert("need");
                    $("#reg-email-require").removeClass("d-none");
                    $("#reg-email-valid").addClass("d-none");
                    $("#reg-email-already").addClass("d-none");
                } else if(response.data.email == 'The email must be a valid email address.'){
                    // alert("valid");
                    $("#reg-email-require").addClass("d-none");
                    $("#reg-email-valid").removeClass("d-none");
                    $("#reg-email-already").addClass("d-none");
                } else if(response.data.email == 'The email has already been taken.'){
                    // alert("already");
                    $("#reg-email-require").addClass("d-none");
                    $("#reg-email-valid").addClass("d-none");
                    $("#reg-email-already").removeClass("d-none");
                }else {
                    // alert("pass");
                    $("#reg-email-require").addClass("d-none");
                    $("#reg-email-valid").addClass("d-none");
                    $("#reg-email-already").addClass("d-none");
                }
                var password = $("#reg-password").val();
                var confirmPassword = $("#password-confirm").val();
                console.log(password);
                console.log(confirmPassword);
                // password
                if (response.data.password == 'The password field is required.') {
                    // alert("need");
                    $("#reg-password-require").removeClass("d-none");
                    $("#reg-password-valid").addClass("d-none");
                    $("#reg-password-confirm").addClass("d-none");
                }   else if(response.data.password == 'The password must be at least 8 characters.'){
                    // alert("valid");
                    $("#reg-password-require").addClass("d-none");
                    $("#reg-password-valid").removeClass("d-none");
                    $("#reg-password-confirm").addClass("d-none");
                }   else if(response.data.password == 'The password must be at least 8 characters.'){
                    // alert("valid");
                    $("#reg-password-require").addClass("d-none");
                    $("#reg-password-valid").removeClass("d-none");
                    $("#reg-password-confirm").addClass("d-none");
                } else if(response.data.password == 'The password confirmation does not match.'){
                    // alert("confirm");
                    $("#reg-password-require").addClass("d-none");
                    $("#reg-password-valid").addClass("d-none");
                    $("#reg-password-confirm").removeClass("d-none");
                } else {
                    // alert("pass");
                    $("#reg-password-require").addClass("d-none");
                    $("#reg-password-valid").addClass("d-none");
                    $("#reg-password-confirm").addClass("d-none");
                }

                // if(password == confirmPassword){
                //     response.data['status'] == 'success';
                //     alert('right');
                // }else if(password !== confirmPassword){
                //     alert('nope');
                //     response.data['status'] == 'fail';
                // }

                // if user register fail
                console.log(response.data);
                // console.log(response.data.password);
                if(response.data['status'] == 'fail'){
                    // alert("login fail");
                    $("#reg-email-require").addClass("d-none");
                    $("#reg-email-valid").addClass("d-none");
                    $("#reg-password-require").addClass("d-none");
                    $("#reg-password-valid").addClass("d-none");
                    $("#reg-email-fail").removeClass("d-none");
                    // if(response.data.email){
                    //     $("#email-fail").removeClass("d-none");
                    // }else if(response.data.password){
                    //     $("#password-fail").removeClass("d-none");
                    // }

                }else if(response.data['status'] == 'success'){

                    // alert(response.data['user_id']);

                    if(sessionStorage.getItem('measure_unit') != null)
                    {
                      // alert("suit code is not null and so store measure");
                      store_measurement_overall();
                    }
                    swal({
                        title: "Your Register was successfull!",
                        text: "",
                        type: "success",
                        icon: "success"
                    }).then(function() {
                      if(sessionStorage.getItem('measure_unit') != null)
                      {
                        alert("suit code is not null and so store measure on ajax");
                        store_measurement_overall();
                      }
                      $.ajax({
                          type: 'POST',
                          url: '/store_customize_step_data',
                          data: {
                            "_token": "{{csrf_token()}}",
                            "user_id":response.data['user_id'],
                            "cus_cate_id": sessionStorage.getItem('customize_category_id'),
                            "package_id" : sessionStorage.getItem('package_id'),
                            "style_id" : sessionStorage.getItem('style_id'),
                            "style_name" : sessionStorage.getItem('style_name'),
                            "style_cate_name" : sessionStorage.getItem('style_cate_name'),
                            "style_cate_id" : sessionStorage.getItem('style_cate_id'),
                            "fitting" : sessionStorage.getItem('fitting'),
                            "texture_id" : sessionStorage.getItem('texture_id'),
                            "jacket_id" : sessionStorage.getItem('jacket_id'),
                            "jacket_price" : sessionStorage.getItem('jacket_price'),
                            "vest_id" : sessionStorage.getItem('vest_id'),
                            "vest_price" : sessionStorage.getItem('vest_price'),
                            "pant_id" : sessionStorage.getItem('pant_id'),
                            "pant_price" : sessionStorage.getItem('pant_price'),

                            "step_no" : sessionStorage.getItem('step_no'),
                            "measured" : sessionStorage.getItem('measure_step'),
                            "suit_piece" : sessionStorage.getItem('suit_piece'),
                            "jacket_in" :sessionStorage.getItem('jacket_in'),
                            "vest_in" : sessionStorage.getItem('vest_in'),
                            "pant_in" : sessionStorage.getItem('pant_in'),
                            "package_price" : sessionStorage.getItem('package_price'),
                            "texture_price" : sessionStorage.getItem('texture_price'),
                            "cus_total_price" : sessionStorage.getItem('cus_total_price'),

                            "suit_code" : sessionStorage.getItem('suit_code'),
                            "shipping_id" : sessionStorage.getItem('shipping_id'),
                            "shipping_price" : sessionStorage.getItem('shipping_price'),

                            "measure_unit" : sessionStorage.getItem('measure_unit'),
                            },
                          success: function (data) {
                            // alert("registerd and go 1");
                            sessionStorage.setItem('has_step',data.has_step);
                            if(sessionStorage.getItem('measure_unit') != null)
                            {
                              // alert("gogo user_id"+response.data['user_id']);
                              // alert("suit code is not null and so store measure in ajax");
                              sessionStorage.setItem('from_store_temporary_user',response.data['user_id'])
                              store_measurement_overall();
                            }
                            if(sessionStorage.getItem('suit_code') != null)
                            {
                              // alert("suit code is not null and so store measure");
                              store_measurement_overall();
                            }
                            if(sessionStorage.getItem('store_m_status') != null || sessionStorage.getItem('store_m_status') != '')
                            {
                              // alert("registerd and go 2");
                              // alert("User ID = "+response.data['user_id']);
                              sessionStorage.setItem('from_store_temporary_user',response.data['user_id'])
                                store_measurement_overall();
                                window.location.reload();
                            }

                          }
                        });
                        window.location.reload();
                        if(sessionStorage.getItem('measure_unit') != null)
                      {
                        // alert("gogo user_id"+response.data['user_id']);
                        // alert("suit code is not null and so store measure in ajax");
                        sessionStorage.setItem('from_store_temporary_user',response.data['user_id'])
                        store_measurement_overall();
                      }
                      if(sessionStorage.getItem('suit_code') != null)
                      {
                        // alert("suit code is not null and so store measure");
                        store_measurement_overall();
                      }
                      if(sessionStorage.getItem('store_m_status') != null || sessionStorage.getItem('store_m_status') != '')
                      {
                        // alert("registerd and go 2");
                        // alert("User ID = "+response.data['user_id']);
                        sessionStorage.setItem('from_store_temporary_user',response.data['user_id'])
                          store_measurement_overall();
                          window.location.reload();
                      }
                    });
                }



            });
            if(sessionStorage.getItem('measure_unit') != null)
          {
            // alert("outside1");
            // alert("gogo user_id"+response.data['user_id']);
            // alert("suit code is not null and so store measure in ajax");
            sessionStorage.setItem('from_store_temporary_user',response.data['user_id'])
            store_measurement_overall();
          }
          if(sessionStorage.getItem('suit_code') != null)
          {
            // alert("suit code is not null and so store measure");
            // alert("outside2");
            store_measurement_overall();
          }
          if(sessionStorage.getItem('store_m_status') != null || sessionStorage.getItem('store_m_status') != '')
          {
            // alert("registerd and go 2 outside");
            // alert("User ID = "+response.data['user_id']);
            sessionStorage.setItem('from_store_temporary_user',response.data['user_id'])
              store_measurement_overall();
              window.location.reload();
          }
        }

          $("#register-valid").click(function () {
            userregister();
        });

    </script>




@endpush
<style>
    .invalid-zh{
        color:#dc3545;
    }
</style>
