@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin List</h1>
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
            <form method="POST" action="{{ route('change_password_store') }}">
                @csrf @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
                @endforeach

                <div class="form-group row">
                    <!-- <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label> -->

                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-lock"></i></span>
                            </div>
                            <input id="password" type="password" class="form-control" name="current_password" placeholder="Current Password" autocomplete="current-password">
                            <i id="toggle_pwd" class="fa fa-fw fa-eye field_icon"></i>
                            @error('current_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        </div>
                    </div>


                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            Update Password
                        </button>
                    </div>
            </form>
            </div>
            <!-- /.content -->
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
@push('pop-up-scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            // for eye icon
            $(function () {

                $("#toggle_pwd").click(function () {
                    $(this).toggleClass("fa-eye fa-eye-slash");
                    var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
                    $("#password").attr("type", type);
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
    left: 95%;
    margin-top: 1%;
}
  
  </style>



