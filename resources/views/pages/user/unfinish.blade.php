@extends('layouts.login')

@section('content')


<section class="domain-search" id="donasi">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="content">
                    <div class="row">
                        <div class="col-12 text-center">
                            <img src="{{ url('frontend/assets/images/shapes/success_donation.png') }}" class="img-fluid"
                                alt="Sukses Donasi" width="450" height="450">
                            <h4 class="text-center ">Ooops!</h4>
                            <P>Donasi Kamu sudah kadaluarsa
                                <br>
                                Silahkan lakukan donasi baru
                            </P>
                            <a href="{{ route('home') }}" class="btn btn-primary rounded-pill mt-3">Kembali Ke Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
