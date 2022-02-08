@extends('layouts.admin')

@push('addon-style')
	<!--Theme custom css -->
	<link href="{{ url('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        @if ($message = Session::get('message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Laporan Transaksi</h1>

        <a href="{{ route('report-transaction.create', compact('idprogram') ) }}" class="btn btn-primary mb-3" >Tambah Transaksi</a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Berikut adalah Laporan Transaksi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Transaksi</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)

                            <tr>
                                <td>{{ date('d F Y ', strtotime($item->tanggal_transaksi)) }}</td>
                                <td>{{ $item->nama_transaksi }}</td>
                                <td>Rp {{ number_format($item->jumlah,0,',','.') }}</td>
                                <td>
                                    <a href="{{route('report-transaction.edit', $item->id)}}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt" ></i>
                                    </a>
                                    <form action="{{ route('report-transaction.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('Apakah anda yakin ingin menghapus data ini!!')" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center" >Data Masih Kosong</td>
                                <tr>
                            @endforelse
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    
@endsection

@push('addon-script')
	<!-- Page level plugins -->
    <script src="{{ url('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ url('backend/js/demo/datatables-demo.js') }}"></script>
@endpush