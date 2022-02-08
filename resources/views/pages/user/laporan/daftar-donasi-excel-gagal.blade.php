<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=>Data_donasi.xls");
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Laporan Daftar Donasi</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('frontend/assets/images/favicon.svg') }}" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ url('frontend/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ url('frontend/assets/css/LineIcons.3.0.css') }}" />
    <link rel="stylesheet" href="{{ url('frontend/assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ url('frontend/assets/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ url('frontend/assets/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ url('frontend/assets/css/main.css') }}" />

</head>

<body >

    <section>
        <div class="container">

            <div class="row">

                <div class="col-xs-12">
                    <h5 class="text-center">Laporan Daftar Donasi</h5>
                    <p class="text-center" >{{ $namaprogram }}</p>
                </div>

                <table class="table table-hover">
                    <tr>
                        <th>No</th>
                        <th>Nama Donatur</th>
                        <th>Email</th>
                        <th>Jumlah Donasi</th>
                        <th>Status Donasi</th>
                    </tr>
                    <?php $i = 1;  ?>
                    @forelse ($items as $item)
                    <tr>
                        <td><?= $i++;  ?></td>
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>{{ $item->email }}</td>
                        <td>Rp. {{ number_format($item->jumlah_donasi,0,',','.') }}</td>
                        <td>{{ $item->status_transaksi }}</td>
                    </tr>
                    @empty
                        <tr>
                            <td>Data belum tersedia</td>
                        </tr>
                    @endforelse
                </table>

            </div>
        </div>
    </section>


    <!-- ========================= JS here ========================= -->
    <script src="{{ url('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/tiny-slider.js') }}"></script>
    <script src="{{ url('frontend/assets/js/glightbox.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/count-up.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/main.js') }}"></script>
</body>

</html>