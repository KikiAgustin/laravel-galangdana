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
        <div class="row mt-5 ">
            <h4 class="mb-4" >Blog Detail</h4>
            @if ($message = Session::get('message'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="col-lg-8 col-md-8 col-12">
                <div class="card mb-3 shadow-lg">
                    <img src="{{ Storage::url($item->gambar) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $item->judul }}</h5>
                      <p class="card-text"><small class="text-muted">{{ date('d F Y ', strtotime($item->created_at)) }}</small></p>
                      <hr>
                      <p class="card-text"><?= htmlspecialchars_decode($item->lengkap, ENT_NOQUOTES); ?></p>
                    </div>
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
<!-- End Detail -->

{{-- Komentar --}}
<section class="domain-search" id="donasi">
    <div class="container shadow-lg p-4 mb-5">
        <div class="row">
            <h5 class="mb-4" >Komentar Cerita</h5>
        </div>
        @forelse ($comment as $com)
        <div class="row">
            <div class="col-lg-1 col-md-3 col-sm-12 col-12 mb-3">
                <img width="100px" height="100px" class="img-fluid rounded-circle img-thumbnail" src="{{ $com->data_user->foto ? Storage::url($com->data_user->foto) : url('frontend/assets/images/profile/user-profile.png') }}" alt="{{ $com->data_user->name }}">
            </div>
            <div class="col-lg-11 col-md-9 col-sm-12 col-12">
                <div class="nama"> <h6>{{ $com->data_user->name }}</h6> </div>
                <div class="tanggal">{{ date('d F Y ', strtotime($com->created_at)) }}</div>
                <div class="komentar">
                    {{ $com->komentar }}
                </div>
                {{-- <a href="">Balas</a> --}}
            </div>
        </div>
        <hr>
        @empty
            <div class="row">
                <p>Komentar belum tersedia</p>
            </div>
        @endforelse
        
    </div>
</section>

<section class="domain-search" id="donasi">
    <div class="container shadow-lg p-4 mb-5">
        <div class="row">
            <h5 class="mb-4" >Masukan Komentar</h5>
        </div>
        <div class="row">
            @guest
                <a class="btn btn-primary" href="{{ route('login') }}">Silahkan Login Untuk Berkomentar</a>
            @endguest
            @auth
            <form action="{{ route('comment-blog', $item->slug ) }}" method="POST" >
                @csrf
                <div class="mb-3">
                    <label for="komentar" class="form-label">Komentar</label>
                    <textarea class="form-control" id="komentar" name="komentar" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" >Komentar</button>
            </form>
            @endauth
        </div>
    </div>
</section>
{{-- End Komentar --}}
    
@endsection