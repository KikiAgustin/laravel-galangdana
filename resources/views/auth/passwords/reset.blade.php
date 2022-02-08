@extends('layouts.login')

@section('content')

<section class="domain-search" id="donasi">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="card p-5 mt-5 shadow-lg rounded-3">
                                <h4 class="text-center mb-5" >{{ __('Reset Password') }}</h4>
                                <form method="POST" action="{{ route('password.update') }}" onsubmit="myFunction()">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('Alamat Email') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">{{ __('Konfirmasi Password') }}</label>

                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>


                                      <div class="d-grid gap-2">
                                        <button id="btn-reset"type="submit" class="btn btn-primary">
                                            {{ __('Reset Password') }}
                                        </button>
                                      </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function myFunction(){
        
        document.getElementById("btn-reset").disabled = true;
        let data = document.querySelector("#btn-reset");
        data.innerText = "Loading............  ";
        const span = document.createElement("span");
        span.className = "spinner-grow spinner-grow-sm";
        data.appendChild(span);
    }
</script>

@endsection
