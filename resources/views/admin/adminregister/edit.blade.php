@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Admin</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-6">
                    <!-- <h3 class="card-title">Admin</h3> -->
                  </div>
                  <!-- <div class="col-sm-6" style="padding-left:29vw">
                    <a href="{{route('create_admin_register')}}" class="btn btn-warning" >Create Admin</a>
                  </div> -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form method="POST" action="{{ route('update_admin',$admins->id) }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $admins->name }}" required autocomplete="name" autofocus>

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
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $admins->email }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <h4 style="text-align: center;">Change Password</h4>
                   
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>

                        <div class="col-md-6">
                            <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" value="" name="current_password"
                            style="
                                background-image: none;
                            ">
                            <i id="toggle_current_pwd" class="fa fa-fw fa-eye field_icon"></i>
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right @error('password') is-invalid @enderror">{{ __('New Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" value="" name="password"
                            style="
                                background-image: none;
                            ">
                            <i id="toggle_pwd" class="fa fa-fw fa-eye field_icon"></i>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" value="" name="password_confirmation" 
                            style="
                                background-image: none;
                            ">
                            <i id="toggle_con-pwd_reg" class="fa fa-fw fa-eye field_icon"></i>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
        
                  </div>                             
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
{{-- edit modal --}}
@endsection

@push('datatables-scripts')
<script>
 $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush
@push('input-file-scripts')
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
@endpush
@section('js')
<script>
    function delete_banner_confirm(value){
        // alert(value);
        swal({
                title: "Are You Sure Delete",
                icon:'warning',
                buttons: ["No", "Yes"]
            })

          .then((isConfirm)=>{

            if(isConfirm){

                $.ajax({
                    type:'POST',
                    url:'delete_banner',
                    dataType:'json',
                    data:{
                      "_token": "{{ csrf_token() }}",
                      "banner_id": value,
                    },

                    success: function(){

                        swal({
                            title: "Success!",
                            text : "Successfully Deleted!",
                            icon : "success",
                        });

                        setTimeout(function(){window.location.reload()}, 1000);


                    },
                });
            }
          });
    }

    // swal({
    //     title: "Your Item was uploaded successfully!",
    //     text: "",
    //     type: "success",
    //     icon: "success"
    // })
</script>

<!-- @if (Session::has('success')) -->
<!-- @endif -->
@endsection



@push('alert-script')
@if (session('success'))
    <script>
        $( document ).ready(function(){
          swal({
        title: "Your Item was uploaded successfully!",
        text: "",
        type: "success",
        icon: "success"
       })
        });
    </script>
@endif
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
                $("#toggle_current_pwd").click(function () {
                    $(this).toggleClass("fa-eye fa-eye-slash");
                    var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
                    $("#current_password").attr("type", type);
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
@endpush
<style>
    .fa-eye,
  .fa-eye-slash {
    z-index: 9999;
    position: absolute;
    left: 90%;
    margin-top: -5%;
  }
  </style>



