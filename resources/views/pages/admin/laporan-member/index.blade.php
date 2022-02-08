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
        <h1 class="h3 mb-2 text-gray-800">Laporan</h1>

        <table class="table table-striped">
            <tr>
                <th>Laporan Daftar Member</th>
                <th>
                    <a href="{{ route('laporan-member') }}" target="blank" class="btn btn-primary">
                        <i class="fas fa-print"></i>
                    </a>
                    <a href="{{ route('laporan-member-pdf') }}" target="blank" class="btn btn-info">
                        <i class="fas fa-file-pdf"></i>
                    </a>
                    <a href="{{ route('laporan-member-excel') }}" class="btn btn-warning">
                        <i class="fas fa-file-excel"></i>
                    </a>
                </th>
            </tr>
          </table>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Laporan Donasi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Program</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->judul }}</td>
                                <?php $idprogram = $item->id  ?>
                                <td>
                                    <div class="dropdown d-inline">
                                        <button class="btn btn-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-print"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                          <a class="dropdown-item" target="blank" href="{{ route('laporan-donasi', compact('idprogram') )  }}">Laporan Sukses</a>
                                          <a class="dropdown-item" target="blank" href="{{ route('laporan-donasi-gagal', compact('idprogram') )  }}">Laporan Gagal</a>
                                        </div>
                                      </div>
                                      <div class="dropdown d-inline">
                                        <button class="btn btn-info" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-file-pdf"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                          <a class="dropdown-item" target="blank" href="{{ route('laporan-donasi-pdf', compact('idprogram') )  }}">Laporan Sukses</a>
                                          <a class="dropdown-item" target="blank" href="{{ route('laporan-donasi-pdf-gagal', compact('idprogram') )  }}">Laporan Gagal</a>
                                        </div>
                                      </div>
                                      <div class="dropdown d-inline">
                                        <button class="btn btn-warning" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-file-pdf"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                          <a class="dropdown-item" target="blank" href="{{ route('laporan-donasi-excel', compact('idprogram'))  }}">Laporan Sukses</a>
                                          <a class="dropdown-item" target="blank" href="{{ route('laporan-donasi-excel-gagal', compact('idprogram') )  }}">Laporan Gagal</a>
                                        </div>
                                      </div>
                                </td>
                            </tr>
                            @empty
                                <tr>Data Masih Kosong</tr>
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