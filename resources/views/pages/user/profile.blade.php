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
            @if ($message = Session::get('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 text-center">
                    <img width="170px" height="170px" class="img-fluid rounded-circle img-thumbnail"
                        src="{{ $identitas->foto ? Storage::url($identitas->foto) : url('frontend/assets/images/profile/user-profile.png') }}" alt="{{ $identitas->name }}">
                    <br>
                    <h4 class="mt-4">{{ $identitas->name }}</h4>
                </div>
            </div>
            <div class="row bg-light mt-4 ">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#detail"
                            type="button" role="tab" aria-controls="home" aria-selected="true">Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#donatur"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">History
                            Donasi</button>
                    </li>
                </ul>
                <div class="tab-content p-4" id="myTabContent">
                    <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="home-tab"
                        style="text-align: justify;">
                        <div class="row mb-3">
                            <div class="col-lg-4 col-md-4 col-4">
                                Nama Lengkap
                            </div>
                            <div class="col-lg-8 col-md-4 col-8 fw-bold">
                                {{ $identitas->name }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4 col-md-4 col-4">
                                Email
                            </div>
                            <div class="col-lg-8 col-md-4 col-8 fw-bold">
                             {{ $identitas->email }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4 col-md-4 col-4">
                                Keluar Aplikasi
                            </div>
                            <div class="col-lg-8 col-md-4 col-8 fw-bold">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#logoutUser">
                                    Logout
                                </button>
                            </div>
                        </div>
                        <hr>
                        <a class="btn btn-primary" href="{{ route('edit-profile') }}">Edit Profile</a>
                        <a class="btn btn-warning" href="{{ route('password.request') }}">Ganti Password</a>
                    </div>
                    <div class="tab-pane fade " id="donatur" role="tabpanel" aria-labelledby="profile-tab">
                        <h4 class="mb-4">History Donasi</h4>
                        <div class="para-donatur">
                            @forelse ($transaction as $item)
                            <div class="row">
                                <div class="col-lg-1 col-md-2 col-sm-2 col-3">
                                    <img width="55px" height="55px" src="{{ url('frontend/assets/images/profile/user-profile.png') }}"
                                        class="img-thumbnail img-fluid rounded-circle" alt="...">
                                </div>
                                <div class="col-lg-11 col-md-10 col-sm-10 col-9">
                                    <div class="nama"> {{ date(' h:i A d F Y ', strtotime($item->created_at)) }} <span class="badge {{$item->status_transaksi == 'SUCCESS' ? "bg-success" : "bg-danger" }} ">{{ $item->status_transaksi }}</span></div>
                                    <div class="program">{{ $item->program_donation->judul }}</div>
                                    <div class="jumlah-donasi">Jumlah donasi <span class="text-dark fw-bold">Rp.
                                        {{ number_format($item->jumlah_donasi,0,',','.') }}</span></div>
                                </div>
                            </div>
                            <hr>
                            @empty
                                <p class="text-center" >Belum ada donasi</p>
                            @endforelse
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Modal --}}

<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="logoutUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="logoutUserLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutUserLabel">Keluar Aplikasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Silahkan klik tombol logout untuk keluar aplikasi
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <form action="{{ url('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection