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
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="content">
                        <div class="row mb-3">
                            <div class="col-lg-5 col-md-5 col-12 mb-4 ">
                                <?php if($item->galleries->count()) : ?>
                                <img src=" {{Storage::url($item->galleries->first()->image)}}" class="card-img-top isi" alt="LKS Al-Hikmah Majalaya">
                                <?php else : ?>
                                <img src="{{ url('frontend/assets/images/shapes/gambar-lks.png') }}" class="card-img-top kosong" alt="LKS Al-Hikmah Majalaya">
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-7 col-md-7 col-12">
                                <h4>{{ $item->judul }}</h4>
                                <div class="detail-donasi">
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
                                        <div class="progress-bar" role="progressbar" style="width: {{$progres}}%;"
                                            aria-valuenow="{{ $progres }}" aria-valuemin="0" aria-valuemax="100">{{ $progres }}%</div>
                                    </div>
                                    <div class="pendapatan-donasi mt-2">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                <div class="terkumpul fw-bold text-dark">Rp {{ number_format($item->terkumpul,0,',','.') }}</div>
                                                <div>Terkumpul</div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                <div class="jumlah-donatur fw-bold text-dark text-end">{{ $jumlahdonatur }}</div>
                                                <div class="donatur text-end">Donatur</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($item->dibutuhkan > $item->terkumpul)
                                    @auth
                                    <div class="d-grid gap-2 mt-3">
                                        <a href="{{ route('donasi-login', $item->slug) }}" class="btn btn-primary btn-sm" type="button">Donasi Sekarang</a>
                                    </div>
                                    @endauth
                                    
                                    @guest
                                        <div class="d-grid gap-2 mt-3">
                                            <a href="{{ route('donasi', $item->slug) }}" class="btn btn-primary btn-sm" type="button">Donasi Sekarang</a>
                                        </div>
                                    @endguest
                                @else
                                <div class="d-grid gap-2 mt-3">
                                    <a href="{{ route('program') }}" onclick="return(confirm('Alhamdulillah donasi sudah terpenuhi, silahkan memilih program yang lain'))" class="btn btn-dark btn-sm" type="button">Alhamdulillah Donasi Sudah Terkumpul</a>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row bg-light ">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#detail" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">Detail</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#donatur" type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">Para Donatur</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#penyaluran" type="button" role="tab" aria-controls="contact"
                                        aria-selected="false">Aksi Penyaluran</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#laporan" type="button" role="tab" aria-controls="laporan"
                                        aria-selected="false">Laporan</button>
                                </li>
                            </ul>
                            <div class="tab-content p-4" id="myTabContent">
                                <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="home-tab" style="text-align: justify;">
                                    <h4 class="mb-3" >{{ $item->judul }}</h4>
                                    @if ($item->detail)
                                    <?= htmlspecialchars_decode($item->detail, ENT_NOQUOTES); ?>
                                    @else
                                        <p>Detail Masih Kosong</p>
                                    @endif
                                     
                                </div>
                                <div class="tab-pane fade " id="donatur" role="tabpanel"
                                    aria-labelledby="profile-tab">
                                    <h4 class="mb-4" >Para Donatur</h4>
                                    <div class="para-donatur">

                                        @forelse ($donatur as $item)
                                        <div class="row">
                                            <div class="col-lg-1 col-md-2 col-sm-2 col-3">
                                                <img width="55px" height="55px" src="{{ url('frontend/assets/images/profile/user-profile.png') }}" class="img-thumbnail img-fluid rounded-circle" alt="LKS Al-Hikmah Majalaya">
                                            </div>
                                            <div class="col-lg-11 col-md-10 col-sm-10 col-9">
                                                <div class="nama"><span class="text-dark fw-bold" >{{ $item->samarkan == 0 ? $item->nama_lengkap : 'Anonymous' }}</span> {{ date(' h:i A d F Y ', strtotime($item->created_at)) }}</div>
                                                <div class="jumlah-donasi">Jumlah donasi <span class="text-dark fw-bold" >Rp {{ number_format($item->jumlah_donasi,0,',','.') }}</span></div>
                                            </div>
                                        </div>
                                        <hr>
                                        @empty
                                            <div class="row">
                                                <div class="col-12 text-center">Belum ada donatur</div>
                                            </div>
                                        @endforelse

                                    </div>
                                </div>
                                <div class="tab-pane fade " id="penyaluran" role="tabpanel"
                                    aria-labelledby="contact-tab" style="text-align: justify;">
                                    <h4 class="mb-4" >Aksi Penyaluran</h4>
                                    @forelse ($distribution as $dist)
                                        @if ($dist->gambar)
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-3">
                                                    <img src="{{ Storage::url($dist->gambar) }}" class="img-fluid rounded"
                                                        alt="{{ $dist->judul }}">
                                                </div>
                                                <div class="col-lg-7 col-md-7 col-12 col-12">
                                                    <h6 class="mb-2">{{ $dist->judul }}</h6>
                                                    <div class="tanggal">{{ date('d F Y ', strtotime($dist->tanggal_penyaluran)) }}</div>
                                                    <?= htmlspecialchars_decode($dist->penyaluran, ENT_NOQUOTES); ?>
                                                </div>
                                            </div>
                                            <hr>
                                        @else
                                            <div class="row">
                                                <h6 class="mb-2">{{ $dist->judul }}</h6>
                                                <div class="tanggal">{{ date('d F Y ', strtotime($dist->tanggal_penyaluran)) }}</div>
                                                <div class="penjelasan"><?= htmlspecialchars_decode($dist->penyaluran, ENT_NOQUOTES); ?></div>
                                            </div>
                                        @endif
                                    @empty
                                        <p class="text-center" >Penyaluran Belum Tersedia</p>
                                    @endforelse
                                </div>
                                <div class="tab-pane fade " id="laporan" role="tabpanel"
                                    aria-labelledby="laporan-tab" style="text-align: justify;">
                                    <h4 class="mb-4" >Laporan Donasi</h4>
                                    <table class="table table-responsive">
                                        <thead>
                                          <tr>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Nama Transaksi</th>
                                            <th scope="col">Transaksi</th>
                                            <th class="text-end" scope="col">Jumlah</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($transaction as $trn)
                                                <tr>
                                                    <td>{{ date('d F Y ', strtotime($trn->tanggal_transaksi)) }}</td>
                                                    <td>{{ $trn->nama_transaksi }}</td>
                                                    <td>Rp {{ number_format($trn->jumlah,0,',','.') }}</td>
                                                    <td class="text-end" ></td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" >Transaksi belum tersedia</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                        <tfoot >
                                            <td class="text-end" colspan="4" > <strong>Rp. {{ number_format($jumlahtransaksi,0,',','.') }}</strong></td>
                                        </tfoot>
                                      </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Detail -->
    
@endsection