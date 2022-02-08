@extends('layouts.login')

@section('content')

<section class="domain-search" id="donasi">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="content">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ __('Email anda belum terverifikasi') }}</div>
                
                                <div class="card-body">
                                    @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            {{ __('verifikasi telah dikirimkan ke email anda.') }}
                                        </div>
                                    @endif
                
                                    {{ __('Sebelum melanjutkan, silahkan cek email anda untuk verifikasi') }}
                                    {{ __('Juka tidak menerima email, silahkan klik link berikut') }},
                                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('klik untuk verifikasi') }}</button>.
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
