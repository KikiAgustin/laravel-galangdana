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
        <h1 class="h3 mb-2 text-gray-800">Daftar Pengurus</h1>

        <a href="{{ route('pengurus-yayasan.create') }}" class="btn btn-primary mb-3" >Tambah Pengurus</a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Berikut adalah para pengurus di yayasan Al-Hikmah Majalaya</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama Pengurus</th>
                                <th>Email</th>
                                <th>Kepengurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @forelse ($items as $item)
                            <tr>
                                <td><?= $i;  ?></td>
                                <td><img width="75px" height="75px" class="img-thumbnail rounded mx-auto d-block img-fluid " src="{{ $item->foto ? Storage::url($item->foto) : url('frontend/assets/images/profile/user-profile.png') }}" alt="{{ $item->name }}"></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->roles }}</td>
                                <td>
                                    <a href="{{route('pengurus-yayasan.edit', $item->id)}}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt" ></i>
                                    </a>
                                    <form action="{{route('pengurus-yayasan.destroy', $item->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('Apakah anda yakin ingin menghapus data ini!!')" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++; ?>
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