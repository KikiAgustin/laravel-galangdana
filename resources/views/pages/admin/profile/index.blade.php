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
        <h1 class="h3 mb-2 text-gray-800">Profile Yayasan</h1>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Berikut adalah informasi seputar yayasan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered"  width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <td> <strong>Tentang Yayasan</strong></td>
                                <td><?= htmlspecialchars_decode($item->tentang, ENT_NOQUOTES); ?></td>
                            </tr>
                            <tr>
                                <td> <strong>Tujuan</strong></td>
                                <td><?= htmlspecialchars_decode($item->tujuan, ENT_NOQUOTES); ?></td>
                            </tr>
                            <tr>
                                <td> <strong>Visi</strong> </td>
                                <td><?= htmlspecialchars_decode($item->visi, ENT_NOQUOTES); ?></td>
                            </tr>
                            <tr>
                                <td> <strong>Misi</strong></td>
                                <td><?= htmlspecialchars_decode($item->misi, ENT_NOQUOTES); ?></td>
                            </tr>
                        </thead>
                        <tbody>
                            
                            
                        </tbody>
                        
                    </table>
                    <a href="{{ route('profile-yayasan.edit', $item->id) }}" class="btn btn-primary" >Edit Profile</a>
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