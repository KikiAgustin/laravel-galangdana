@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Pengurus</h1>
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

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('pengurus-yayasan.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Pengurus</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama Pengurus" value="{{ old('name') }}" required >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required >
                    </div>
                    <div class="form-group">
                        <label for="roles">Kepengurusan</label>
                        <select class="form-control" name="roles" id="roles" required>
                            @if (old('roles'))
                            <option value="{{ old('roles') }}">{{ old('roles') }}</option>
                            @else
                            <option value="">Pilih</option>
                            @endif
                            <option value="ADMIN">ADMIN</option>
                            <option value="RELAWAN">RELAWAN</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" name="foto" id="foto" value="{{ old('foto') }}" >
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" value="{{ old('password') }}" required autocomplete="current-password" >
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" value="{{ old('password_confirmation') }}" required autocomplete="new-password" >
                    </div>
                    <button type="submit" class="btn btn-primary" >Tambah Pengurus</button>
                </form>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
    
@endsection