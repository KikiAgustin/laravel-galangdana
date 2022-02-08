@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Penyaluran</h1>
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
                <h6 class="m-0 font-weight-bold text-primary">Berikut adalah detail Penyaluran</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <td>{{$item->judul}}</td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td>{{ date('d F Y ', strtotime($item->tanggal_penyaluran))}}</td>
                            </tr>
                            <tr>
                                <th>Detail</th>
                                <td><?= htmlspecialchars_decode($item->penyaluran, ENT_QUOTES) ?></td>
                            </tr>
                            <tr>
                                <th>Gambar</th>
                                <td>
                                    @if ($item->gambar)
                                    <img class="img-fluid rounded" src="{{Storage::url($item->gambar)}}" alt="{{ $item->judul }}">
                                    @endif
                                </td>
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