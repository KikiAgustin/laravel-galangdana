@extends('layouts.donasi')

@section('title', 'LKS Al-Hikmah Majalaya')

@push('addon-style')

@endpush

@section('content')

<!-- Start Hero Area -->
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
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="content">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-center mb-5" >Silahkan Masukan Donasi Anda Disini</h4>
                                <form action="{{ route('proseslogin', $item->slug) }}" method="POST" onsubmit="myFunction()" >
                                    @csrf
                                    <div class="mb-3">
                                        <label for="jumlahdonasi" class="form-label">Jumlah Donasi</label>
                                        <input type="number" name="jumlahdonasi" class="form-control @error('jumlahdonasi') is-invalid @enderror " placeholder="Silahkan Masukan Jumlah Donasi" id="jumlahdonasi" value="{{@old('jumlahdonasi')}}"  required>
                                        @error('jumlahdonasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                      </div>
                                    <div class="mb-3 form-check">
                                      <input {{ @old('samarkan') == 1 ? 'checked' : ''  }}  type="checkbox" name="samarkan" value="1" class="form-check-input" id="samarkan">
                                      <label class="form-check-label" for="samarkan">Samarkan Nama </label>
                                    </div>
                                    <button type="submit" id="btn-donasi" class="btn btn-primary">
                                        {{-- <span class="spinner-grow spinner-grow-sm" ></span> --}}
                                        Lanjut Ke Pembayaran
                                    </button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Domain Search -->

<script>
    function myFunction(){

        document.getElementById("btn-donasi").disabled = true;
        let data = document.querySelector("#btn-donasi");
        data.innerText = "Loading............  ";
        const span = document.createElement("span");
        span.className = "spinner-grow spinner-grow-sm";
        data.appendChild(span);
    }
</script>

@endsection
