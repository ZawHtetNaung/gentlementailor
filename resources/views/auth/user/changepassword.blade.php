@extends('layouts.forgotnav')
@section('content')
    <section>
        <div id="addNewPass-sec" class="full-height center-flex">
            <div class="">
                <h2 class="mb-5 text-uppercase">Change password</h2>
                <form method="POST" action="{{ route('user_change_password_store') }}">
                    @csrf
                    <div class="log-form mb-5">
                        <label for="password" class="ls-0">Current Password</label>
                        <input id="reg_password-confirm" type="password"
                               class="form-control"
                               name="current_password" required
                               autocomplete="new-password">
                        <i id="toggle_pwd_con" class="fa-solid fa-eye"></i>
                        @error('current_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit">Continue</button>
                </form>
                <div class="mt-3 w-50">
                    <a class="cursor-pointer ls-0 text-decoration-underline"
                       href="{{route('index_page')}}">Cancel?</a>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('reset-pass-scripts')
<script>
     $(document).ready(function () {
        // for eye icon
        $(function () {
                $("#toggle_pwd_reg").click(function () {
                    $(this).toggleClass("fa-eye fa-eye-slash");
                var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
                    $("#reg_password").attr("type", type);
                });
                $("#toggle_pwd_con").click(function () {
                    $(this).toggleClass("fa-eye fa-eye-slash");
                var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
                    $("#reg_password-confirm").attr("type", type);
                });
            });
    });

    
</script>
@endpush