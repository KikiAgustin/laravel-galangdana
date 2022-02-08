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

<!-- Daftar Blog -->
<section class="domain-search" id="donasi">
    <div class="container">
        <div class="row mt-5 mb-5">
            <h4 class="mb-4" >Cerita Dari Kami</h4>
            <div class="col-lg-8 col-md-8 col-12">
                <div class="row">
                    @forelse ($items as $item)
                    <div class="col-lg-6 col-md-6 col-12 mb-4">
                        <div class="card" >
                            <img src="{{ Storage::url($item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}">
                            <div class="card-body">
                                <a href="{{ route('detail-blog', $item->slug) }}">
                                    <h5 class="card-title">{{ $item->judul }}</h5>
                                </a>
                              <p class="card-text">{{ $item->singkat }}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-lg-6 col-md-6 col-12 mb-4">
                        <p class="text-center" >Cerita Belum Tersedia</p>
                    </div>
                    @endforelse
                    
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="card shadow mb-5">
                    <div class="card-body">
                      <h5 class="card-title mb-4">Cerita Paling Populer</h5>
                      <div class="blog-resent">
                        @forelse ($populer as $pop)
                        <div class="row">
                          <div class="col-lg-4 col-md-4 col-4">
                            <img width="80px" height="80px" src="{{ Storage::url($pop->gambar) }}" class="img-thumbnail img-fluid " alt="{{ $pop->judul }}">
                          </div>
                          <div class="col-lg-8 col-md-8 col-8">
                              <div class="blog-resent">
                                  <div class="judul"><a href="{{ route('detail-blog', $pop->slug) }}">{{ $pop->judul }}</a></div>
                                  <div class="tanggal">{{ date('d F Y ', strtotime($pop->created_at)) }}</div>
                              </div>
                          </div>
                      </div>
                      <hr>
                        @empty
                            <p class="text-center" >Belum ada cerita populer</p>
                        @endforelse
                      </div>
                    </div>
                </div>
                <div class="card shadow mb-5">
                    <div class="card-body">
                      <h5 class="card-title mb-4">Kategori</h5>
                      <div class="kategori">
                        @forelse ($catblog as $ctg)
                            <div class="alert alert-light bg-light  " role="alert">
                                <strong  > <a href="" class="text-dark">{{ $ctg->kategori }}</a></strong> 
                            </div>
                          @empty
                              <p>Kategori Belum Tersedia</p>
                          @endforelse
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Blog -->
    
@endsection