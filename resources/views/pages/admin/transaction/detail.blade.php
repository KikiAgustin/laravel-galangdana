@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Donasi</h1>
        </div>

        @if ($errors->any())
            <div class="aler alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Berikut adalah detail donasi dari {{ $item->nama_lengkap }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Program</th>
                                <td>{{$item->program_donation->judul}}</td>
                            </tr>
                            <tr>
                                <th>Kategori Donasi</th>
                                <td>{{$item->category_program->nama_kategori}}</td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>{{$item->nama_lengkap}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$item->email}}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Donasi</th>
                                <td>{{ number_format($item->jumlah_donasi,'0','.','.') }}</td>
                            </tr>
                            <tr>
                                <th>Status Transaksi</th>
                                <td>{{$item->status_transaksi}}</td>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        
                    </table>
                </div>
            </div>
        </div>
        


    </div>
    <!-- /.container-fluid -->
    
@endsection