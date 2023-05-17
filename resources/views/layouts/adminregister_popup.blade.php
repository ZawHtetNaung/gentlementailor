 <!-- /.modal -->
 @foreach ($admins as $admin)
    <div class="modal fade" id="modal-primary{{$admin->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Edit Admin</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('update_admin',$admin->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- <input type="hidden" name="photo" value="{{$admin->photo}}"> -->
                <div class="modal-body">
                <!-- <form method="POST" action="{{ route('backside.admin.registered') }}"> -->
                    

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $admin->name }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $admin->email }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ $admin->password }}" name="password" required autocomplete="new-password">
                            <i id="toggle_pwd" class="fa fa-fw fa-eye field_icon"></i>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" value="{{ $admin->password }}" name="password_confirmation" required autocomplete="new-password">
                            <i id="toggle_con-pwd_reg" class="fa fa-fw fa-eye field_icon"></i>
                        </div>
                    </div>

                    <!-- <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div> -->
                <!-- </form> -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-light">Save changes</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endforeach
    <!-- /.modal -->
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
                // $("#toggle_pwd_reg").click(function () {
                //     $(this).toggleClass("fa-eye fa-eye-slash");
                //     var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
                //     $("#reg_password").attr("type", type);
                // });
                $("#toggle_con-pwd_reg").click(function () {
                    $(this).toggleClass("fa-eye fa-eye-slash");
                    var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
                    $("#password-confirm").attr("type", type);
                });
            });

        });


    </script>
@endpush
<style>
    .fa-eye,
  .fa-eye-slash {
    z-index: 9999;
    position: absolute;
    left: 96%;
    margin-top: -11%;
  }
  </style>
