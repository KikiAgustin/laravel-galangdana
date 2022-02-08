@extends('layouts.detail')

@section('title')
    LKS Al-Hikmah Majalaya
@endsection

@push('addon-style')
    
@endpush

@section('content')
<section class="hero-area-detail ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="hero-content">

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Hero Area -->

<!-- Start Domain Search -->
<section class="domain-search" id="donasi">
    <div class="container">
        <div class="inner-cotainer">
            <img class="sahpe" src="{{ url('frontend/assets/images/shapes/shape.png') }}" alt="#">
            <img class="sahpe2" src="{{ url('frontend/assets/images/shapes/shape.png') }}" alt="#">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 text-center">
                    <img width="170px" height="170px" class="img-fluid rounded-circle img-thumbnail"
                        src="{{ $identitas->foto ? Storage::url($identitas->foto) : url('frontend/assets/images/profile/user-profile.png') }}" alt="{{ $identitas->name }}">
                    <br>
                    <h4 class="mt-4">{{ $identitas->name }}</h4>
                </div>
            </div>
            <div class="row bg-light mt-4 ">
                <form action="{{ route('proseseditprof', $identitas->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Nama Email</label>
                        <input type="email" class="form-control" value="{{ $identitas->email }}" id="email" placeholder="Email" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="namalengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="namalengkap" value="{{ $identitas->name }}" id="namalengkap" placeholder="namalengkap" >
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input class="form-control" type="file" name="foto" id="foto">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary" >Edit Profile</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection