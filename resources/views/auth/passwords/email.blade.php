<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-body p-0">

                <div id="forget-sec" class="full-height center-flex d-none">
                    <div class="px-5">
                        <h2 class="mb-5 text-uppercase">recover password</h2>
                        <form method="POST"
                              action="route('password.email')">
                            @csrf
                            <div class="log-form mb-4">
                                <label for="reg_email" class="ls-0">Email address</label>
                                <input id="reg_email" type="email"
                                       class="form-control mb-2 @error('email') is-invalid
                                               @enderror"
                                       name="email" value="{{ old('email') }}" required
                                       autocomplete="email">
                                <span>( Fill the email address to sent recover code )</span>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <button type="submit">Continue</button>
                        </form>
                        <div class="mt-3 w-50">
                            <p id="go-back" class="cursor-pointer ls-0
                            text-decoration-underline">Go Back</p>
                        </div>
                        <div class="mt-3 w-75">
                            <p id="go-second-form" class="cursor-pointer ls-0
                            text-decoration-underline">Go To Second Form</p>
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