@extends('layouts.nav')
@section('content')
    <section>
        <div id="addNewPass-sec" class="full-height center-flex">
            <div class="">
                <h2 class="mb-5 text-uppercase">Reset password</h2>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
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
                    </div>
                    <div class="log-form mb-4">
                        <label for="password" class="ls-0">Password</label>
                        <input id="reg_password" type="password"
                               class="form-control @error('password')
                                               is-invalid
                                                @enderror"
                               name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>
                    <div class="log-form mb-5">
                        <label for="password" class="ls-0">Confirm Password</label>
                        <input id="reg_password-confirm" type="password"
                               class="form-control"
                               name="password_confirmation" required
                               autocomplete="new-password">
                    </div>
                    <button type="submit">Continue</button>
                </form>
                <div class="mt-3 w-50">
                    <a class="cursor-pointer ls-0 text-decoration-underline"
                       onclick="history.go(-2)">Cancel?</a>
                </div>
            </div>
        </div>
    </section>
@endsection
