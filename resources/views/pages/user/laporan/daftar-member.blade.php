<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Laporan Daftar Member</title>
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
                <div class="col-lg-2">
                    <img width="100px" height="65px" src="{{ url('frontend/assets/images/logo/logo.png') }}" alt="Logo Kabupaten">
                </div>
                <div class="col-lg-8">
                    <h5 class="text-bold text-center">Lembaga Kesejahteraan Sosial Al-Hikmah</h5>
                    <h5 class="text-bold text-center ">Kantor Cabang Majalaya</h5>
                </div>
            </div>
            <div class="row">
                <p class="text-center">Jl. Cibodas Rt. 03 Rw. 01 Desa Cibodas Kecamatan Solokan Jeruk Kabupaten
                    Bandung 40376</p>
            </div>
            <hr>

            <div class="row">

                <div class="col-xs-12">
                    <h5 class="text-center">Laporan Daftar Donatur</h5>
                </div>

                <table class="table table-hover">
                    <tr>
                        <th>No</th>
                        <th>Nama Donatur</th>
                        <th>Email</th>
                    </tr>
                    <?php $i = 1;  ?>
                    @forelse ($items as $item)
                    <tr>
                        <td><?= $i++;  ?></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
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
    <script type="text/javascript">
        window.onload = function() { window.print(); }
   </script>
</body>

</html>