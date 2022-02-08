<!-- Sidebar -->

@if ($cekroles == 'ADMIN')
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">LKS Al-Hikmah</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Yayasan
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('pengurus-yayasan.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Pengurus</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('profile-yayasan.index') }}">
            <i class="fas fa-fw fa-id-card"></i>
            <span>profile Yayasan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Donasi
    </div>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-hand-holding-usd"></i>
            <span>Program Donasi</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Program Donasi</h6>
                <a class="collapse-item" href="{{ route('program-donation.index') }}">Daftar Program</a>
                <a class="collapse-item" href="{{ route('gallery.index') }}">Gambar</a>
                <a class="collapse-item" href="{{ route('category-donation.index') }}">Kategori Program</a>
                <a class="collapse-item" href="{{ route('transaction.index') }}">Daftar Donasi</a>
                <a class="collapse-item" href="{{ route('distribution.index') }}">Penyaluran</a>
                <a class="collapse-item" href="{{ route('report-transaction.index') }}">Transaksi</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Blog
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('blog.index') }}">
            <i class="fab fa-fw fa-blogger"></i>
            <span>Blog</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Report
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('report.index') }}">
            <i class="fas fa-fw fa-database"></i>
            <span>Laporan</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal" >
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>
    

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Transaksi
    </div> --}}

    <!-- Nav Item - Charts -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('transaction.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Transaksi</span></a>
    </li> --}}


    <!-- Divider -->
    {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->

</ul>
<!-- End of Sidebar -->
@else
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">LKS Al-Hikmah</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Donasi
    </div>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-hand-holding-usd"></i>
            <span>Program Donasi</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Program Donasi</h6>
                <a class="collapse-item" href="{{ route('program-donation.index') }}">Daftar Program</a>
                <a class="collapse-item" href="{{ route('gallery.index') }}">Gambar</a>
                <a class="collapse-item" href="{{ route('category-donation.index') }}">Kategori Program</a>
                <a class="collapse-item" href="{{ route('transaction.index') }}">Daftar Donasi</a>
                <a class="collapse-item" href="{{ route('distribution.index') }}">Penyaluran</a>
                <a class="collapse-item" href="{{ route('report-transaction.index') }}">Transaksi</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Blog
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('blog.index') }}">
            <i class="fab fa-fw fa-blogger"></i>
            <span>Blog</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal" >
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>
    

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Transaksi
    </div> --}}

    <!-- Nav Item - Charts -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('transaction.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Transaksi</span></a>
    </li> --}}


    <!-- Divider -->
    {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->

</ul>
<!-- End of Sidebar -->
@endif

