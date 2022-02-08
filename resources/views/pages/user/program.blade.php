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
<section class="domain-search" id="donasi">
    <div class="container">
        <div class="inner-cotainer">
            <img class="sahpe" src="{{ url('frontend/assets/images/shapes/shape.png') }}" alt="#">
            <img class="sahpe2" src="{{ url('frontend/assets/images/shapes/shape.png') }}" alt="#">
            @if ($message = Session::get('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="content">
                        <h2 class="text-center" >Program Donasi</h2>
                        <div class="row">
                            <?php $i = 3; ?>
                            @forelse ($items as $item)
                            <div class="col-lg-4 col-md-4 col-12 mb-4 ">
                                <a href="{{ route('detail', $item->slug) }}" class="text-muted" >
                                    <div class="card card-program wow fadeInUp" data-wow-delay=".<?= $i*2; ?>s" >
                                        <img src="{{$item->galleries->count() ? Storage::url($item->galleries->first()->image) : url('frontend/assets/images/shapes/gambar-lks.png') }}" class="card-img-top" alt="LKS Al-Hikmah Majalaya">
                                        <div class="card-body">
                                          <p class="card-title fw-bold lh-1 text-dark">{{ $item->judul }}</p>
                                          <p>{{ $item->pengirim }}</p>
                                          
                                          <div class="informasi mt-4 mb-2">
                                              <div class="dibutuhkan fw-bold text-dark">Rp {{ number_format($item->dibutuhkan,0,',','.') }}</div>
                                              <div class="">Dibutuhkan</div>
                                          </div>
                                          <?php
                                                    if($item->terkumpul == 0) {
                                                        $progres = 0;
                                                    } else {
                                                        $progres = round(1 / ($item->dibutuhkan / $item->terkumpul ) * 100);
                                                    }
                                                ?>
                                          <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: {{ $progres }}%;" aria-valuenow="{{ $progres }}" aria-valuemin="0" aria-valuemax="100">{{ $progres }}%</div>
                                          </div>
                                          <div class="pendapatan-donasi mt-2">
                                              <div class="row">
                                                  <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                      <div class="terkumpul fw-bold text-dark">Rp. {{ number_format($item->terkumpul,0,',','.' )}}</div>
                                                      <div >Terkumpul</div>
                                                  </div>
                                                  <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                      <div class="jumlah-donatur fw-bold text-dark text-end">{{ $item->transaction->count() }}</div>
                                                      <div class="donatur text-end">Donatur</div>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                    </div>
                                </a>    
                            </div>
                            <?php $i++; ?>
                            @empty
                                <div class="col-12">program Donasi Belum Tersedia</div>
                            @endforelse
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Detail -->
    
@endsection