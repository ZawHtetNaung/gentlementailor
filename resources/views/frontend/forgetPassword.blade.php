@extends('layouts.forgotnav')
@section('content')
    <section>
        <div id="forget-sec" class="full-height center-flex">
            <div class="px-5">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h2 class="mb-5 text-uppercase">recover password</h2>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="log-form mb-4">
                        <label for="reg_email" class="ls-0">Email address</label>
                        <input id="reg_email" type="email"
                               class="form-control mb-2 @error('email') is-invalid
                                               @enderror"
                               name="email" value="{{ old('email') }}" required
                               autocomplete="email">
                        <span>( Fill the email address to sent reset link )</span>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>
                    <button type="submit">Continue</button>
                </form>
                <div class="mt-3 w-50">
                    <p class="cursor-pointer ls-0 text-decoration-underline" onclick="history.back()">
                        Go Back</p>
                </div>

                <!-- <div class="mt-3 w-50">
                    <a href="new-password" class="cursor-pointer ls-0 text-decoration-underline">
                        Go Foward</a>
                </div> -->
            </div>
        </div>
    </section>
@endsection
