<!-- Halaman Header -->
<header class="header navbar-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="nav-inner">
                    <!-- Start Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ url('frontend/assets/images/logo/logo-animasi.gif') }}" alt="Logo">
                        </a>
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="{{ route('home') }}" class="" aria-label="Toggle navigation">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                        data-bs-target="#submenu-1-1" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">Tentang Kami</a>
                                    <ul class="sub-menu collapse" id="submenu-1-1">
                                        <li class="nav-item"><a href="{{ route('yayasan-tentang', 1) }}">LKS Al-Hikmah Majalaya</a></li>
                                        <li class="nav-item"><a href="{{ route('yayasan-tujuan', 1) }}">Tujuan, Visi & Misi</a></li>
                                        <li class="nav-item"><a href="{{ route('struktur-organisasi') }}">Struktur Organisasi</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                        data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">Program Donasi</a>
                                    <ul class="sub-menu collapse" id="submenu-1-2">
                                        @yield('kategori')
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('daftar-blog') }}" aria-label="Toggle navigation">Blog</a>
                                </li>
                            </ul>
                        </div> <!-- navbar collapse -->
                        <div class="button">
                            @guest
                            <a href="{{ url('login') }}" class="btn">Login</a>
                            @endguest

                            @auth
                            <a href="{{ route('profile') }}" class="btn">Akun</a>
                            @endauth
                        </div>
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</header>
<!-- End Header -->





