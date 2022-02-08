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
<link rel="stylesheet" href="{{ url('frontend/assets/lib/tree_maker-min.css') }}">
<script type="text/javascript" src="{{ url('frontend/assets/lib/tree_maker-min.js') }}"></script>
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
                <h4 class="mb-3">Struktur Organisasi</h4>
                <p>
                    <div id="my_tree"></div>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End Detail -->

<script type="text/javascript">
    let tree = {
        1: {
            2: '',
            3: {
                6: '',
                7: '',
                8: '',
                11: '',
            },
            4: ''
        },
    };

    let treeParams = {
        1: { trad: 'Ketua Cabang <br><img width="70px" height="70px" class="img-fluid rounded-circle" src="{{ url('frontend/assets/images/profile/user-profile.png') }}" alt=""> <br> <strong>Tasdik Saeful Zaman</strong>' },
        2: { trad: 'Sekertaris <br><img width="70px" height="70px" class="img-fluid rounded-circle" src="{{ url('frontend/assets/images/profile/user-profile.png') }}" alt=""> <br> <strong>Kabul Santosa</strong>' },
        3: { trad: 'Divisi' },
        4: { trad: 'Bendahara <br><img width="70px" height="70px" class="img-fluid rounded-circle" src="{{ url('frontend/assets/images/profile/user-profile.png') }}" alt=""> <br> <strong>Abdul Hakim</strong>' },
        6: { trad: 'Pendidikan <br><img width="70px" height="70px" class="img-fluid rounded-circle" src="{{ url('frontend/assets/images/profile/user-profile.png') }}" alt=""> <br> <strong>Ridho Fadillah Akbar</strong>' },
        7: { trad: 'Sosial <br><img width="70px" height="70px" class="img-fluid rounded-circle" src="{{ url('frontend/assets/images/profile/user-profile.png') }}" alt=""> <br> <strong>Darwis Subakti</strong>' },
        8: { trad: 'Keagamaan <br><img width="70px" height="70px" class="img-fluid rounded-circle" src="{{ url('frontend/assets/images/profile/user-profile.png') }}" alt=""> <br> <strong>Udin June</strong>' },
        11: { trad: 'Rebbana <br><img width="70px" height="70px" class="img-fluid rounded-circle" src="{{ url('frontend/assets/images/profile/user-profile.png') }}" alt=""> <br> <strong>Handi Saputra</strong>' },
    };

    treeMaker(tree, {
        id: 'my_tree', card_click: function (element) {
            console.log(element);
        },
        treeParams: treeParams,
        'link_width': '4px',
        'link_color': '#2199e8',
    });
</script>
    
@endsection