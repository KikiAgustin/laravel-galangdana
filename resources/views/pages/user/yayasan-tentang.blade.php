@extends('layouts.detail')

@section('title')
    LKS Al-Hikmah Majalaya
@endsection

@section('kategori')
@forelse ($category as $cat)
<?php $idkategori = $cat->id  ?>
<li class="nav-item"><a href="{{ route('program', compact('idkategori')) }}">{{ $cat->nama_kategori }}</a></li>
@empty
<li class="nav-item"><a href="#">Kategori Masih Kosong</a></li>
@endforelse
@endsection

@push('addon-style')
    
@endpush

@section('content')

<!-- Halaman Banner -->
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
<!-- End Banner -->

<!-- Start Detail -->
<section style="margin-bottom: 200px" class="domain-search" id="donasi">
    <div class="container">
        <div class="inner-cotainer">
            <img class="sahpe" src="{{ url('frontend/assets/images/shapes/shape.png') }}" alt="#">
            <img class="sahpe2" src="{{ url('frontend/assets/images/shapes/shape.png') }}" alt="#">
            <div class="row">
                <h4 class="mb-3">Tentang LKS Al-Hikmah Majalaya</h4>
                <p>
                    <?= htmlspecialchars_decode($item->tentang, ENT_NOQUOTES); ?>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End Detail -->
    
@endsection