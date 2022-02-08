@extends('layouts.app')

@section('title')
    LKS Al-Hikmah Majalaya
@endsection

@push('addon-style')

@endpush

@section('kategori')

@forelse ($category as $item)
<?php $idkategori = $item->id  ?>
<li class="nav-item"><a href="{{ route('program', compact('idkategori')) }}">{{ $item->nama_kategori }}</a></li>
@empty
<li class="nav-item"><a href="#">Kategori Masih Kosong</a></li>
@endforelse
    
@endsection

@section('content')

	<!-- Halaman Banner -->
    <section class="hero-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="hero-content">

                        <h1 class="wow fadeInUp" data-wow-delay=".4s">
                            Sedekah Tidak Akan Membuat Kamu Menjadi Miskin
                        </h1>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Kekayaan sejati seseorang dinilai dari kebaikan
                            yang dilakukan didunia</p>
                        <h5 class="wow fadeInUp" data-wow-delay=".8s">Mulai untuk berdonasi</h5>
                        <div class="button wow zoomIn" data-wow-delay="1s">
                            <a href="#donasi"><i class="lni lni-arrow-down-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner-->

    <!-- Halaman Donasi-->
    <section class="domain-search" id="donasi">
        <div class="container">
            <div class="inner-cotainer">
                <img class="sahpe" src="{{ url('frontend/assets/images/shapes/shape.png') }}" alt="#">
                <img class="sahpe2" src="{{ url('frontend/assets/images/shapes/shape.png') }}" alt="#">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                        <div class="content">
                            <h2 class="text-center">Membutuhkan Secepatnya</h2>

                            <div class="row">
                                @foreach ($items as $item)
                                <div class="col-lg-6 col-md-6 col-12 mb-4 ">
                                    <a href="{{ route('detail', $item->slug) }}" class="text-muted">
                                        <div class="card card-program wow fadeInUp" data-wow-delay=".2s">
                                            <img src="{{$item->galleries->count() ? Storage::url($item->galleries->first()->image) : url('frontend/assets/images/shapes/gambar-lks.png') }}" class="card-img-top"
                                                alt="LKS Al-Hikmah Majalaya">
                                            <div class="card-body">
                                                <p class="card-title fw-bold lh-1 text-dark">{{ $item->judul }}</p>
                                                <p>{{ $item->pengirim }}</p>
                                    
                                                <div class="informasi mt-4 mb-2">
                                                    <div class="dibutuhkan fw-bold text-dark">Rp {{ number_format($item->dibutuhkan,0,',','.') }}</div>
                                                    <div class="">Dibutuhkan</div>
                                                </div>

                                                <?php
                                                    if($item->terkumpul == 0 ){
                                                        $progres = 0;
                                                    } else {
                                                        $progres = round(1 / ($item->dibutuhkan / $item->terkumpul ) * 100);
                                                    }
                                                ?>

                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ $progres }}%;"
                                                        aria-valuenow="{{ $progres }}" aria-valuemin="0" aria-valuemax="100">{{$progres}}%
                                                    </div>
                                                </div>
                                                <div class="pendapatan-donasi mt-2">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                            <div class="terkumpul fw-bold text-dark">Rp {{ number_format($item->terkumpul,0,',','.' )}}
                                                            </div>
                                                            <div>Terkumpul</div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                            <div class="jumlah-donatur fw-bold text-dark text-end">{{ $item->transaction->count() }}
                                                            </div>
                                                            <div class="donatur text-end">Donatur</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Donasi-->

    <!-- Halaman Alasan-->
    <section class="features section">
        <img class="shape" src="{{ url('frontend/assets/images/shapes/shape.png') }}" alt="#">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Mengapa Donasi Lewat Kami</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Berikut beberapa alasan untuk dijadikan
                            pertimbangan mengapa harus donasi lewat kami</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <!-- Start Single Feature -->
                    <div class="single-feature wow fadeInUp" data-wow-delay=".2s">
                        <div class="list-icon">
                            <i class="lni lni-home"></i>
                        </div>
                        <h3>Lembaga Sudah Terdaftar</h3>
                        <p>Yayasan kami sudah dapat izin operasional dari Dinas Sosial Dan Penanggulangan Kemiskinan
                            Kota Bandung, Dinas Sosial dan beberapa lembaga lainnya.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <!-- Start Single Feature -->
                    <div class="single-feature wow fadeInUp" data-wow-delay=".4s">
                        <div class="list-icon">
                            <i class="lni lni-book"></i>
                        </div>
                        <h3>Laporan Penyaluran</h3>
                        <p>Progres dari donasi yang telah disalurkan, kami akan selalu memberikan update melalui website
                        </p>
                    </div>
                    <!-- End Single Feature -->

                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <!-- End Single Feature -->
                    <!-- Start Single List -->
                    <div class="single-feature wow fadeInUp" data-wow-delay=".2s">
                        <div class="list-icon">
                            <i class="lni lni-map"></i>
                        </div>
                        <h3>Sasaran Yang Tepat</h3>
                        <p>Kami akan membeikan donasi sesui dengan program yang telah dibuat dalam website
                        </p>
                    </div>
                    <!-- End Single List -->
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <!-- Start Single Feature -->
                    <div class="single-feature wow fadeInUp" data-wow-delay=".4s">
                        <div class="list-icon">
                            <i class="lni lni-money-protection"></i>
                        </div>
                        <h3>Banyak Meotode Pembayaran</h3>
                        <p>Kami banyak menyadiakan metode pembayaran, untuk memudahkan para donatur melakukan donasi
                        </p>
                    </div>
                    <!-- End Single Feature -->
                </div>
            </div>
            <div class="row">
                <div class="col-12 align-center">
                    <div class="explore-all button">
                        <a href="#donasi" class="btn">Donasi Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Alasan-->

    <!-- Halaman Blog -->
    <div class="pricing-style2 section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Berbagi Cerita</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Berikut berbagai cerita dari yayasan yang bisa
                            kalian baca</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Pricing s-->
                    <div class="single-pricing">
                        <div class="gambar-cerita">
                            <img src="{{ Storage::url($blog->gambar) }}" class="card-img-top" alt="LKS Al-Hikmah Majalaya">
                        </div>
                        <h3 class="title">{{ $blog->judul }}</h3>
                        <p style="text-align: justify" class="des">{{ $blog->singkat }}......</p>

                        <div class="button">
                            <a class="btn" href="{{ route('detail-blog', $blog->slug) }}">Selengkapnya</a>
                        </div>
                    </div>
                    <!-- End Single Pricing s-->
                </div>
                @empty
                    <p class="text-center" >Cerita Belum Tersedia</p>
                @endforelse
            </div>
        </div>
    </div>
    <!-- End Blog -->
    
@endsection