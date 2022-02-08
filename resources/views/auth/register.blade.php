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
                                    <h4 class="text-center mb-5" >Registrasi</h4>
                                    <form method="POST" action="{{ route('register') }}" onsubmit="myFunction()">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama Lengkap</label>
                                            <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Silahkan Masukan Nama Lengkap" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Alamat Email</label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror " id="email" value="{{ old('email') }}" placeholder="Silahkan Masukan Alamat Email" required autocomplete="email" autofocus >
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">{{ __('Password') }}</label>
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Silahkan Masukan Password" id="password"  required autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                                            <input type="password" name="password_confirmation" class="form-control"  placeholder="Konfirmasi Password" id="password-confirm"  required autocomplete="new-password">
                                        </div>
                                          <div class="d-grid gap-2">
                                            <button id="btn-register"type="submit" class="btn btn-primary">{{ __('Registrasi') }}</button>
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
            
            document.getElementById("btn-register").disabled = true;
            let data = document.querySelector("#btn-register");
            data.innerText = "Loading............  ";
            const span = document.createElement("span");
            span.className = "spinner-grow spinner-grow-sm";
            data.appendChild(span);
        }
    </script>

@endsection
