@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Pengurus</h1>
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
                <form action="{{ route('pengurus-yayasan.update', $item->id) }}" method="POST" enctype="multipart/form-data" >
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Pengurus</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama Pengurus" value="{{ $item->name }}" required >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $item->email }}" required readonly >
                    </div>
                    <div class="form-group">
                        <label for="roles">Kepengurusan</label>
                        <select class="form-control" name="roles" id="roles" required>
                            <option value="{{$item->roles}}">{{$item->roles}}</option>
                            <option value="">Pilih</option>
                            <option value="ADMIN">ADMIN</option>
                            <option value="RELAWAN">RELAWAN</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" name="foto" id="foto" value="" >
                    </div>
                    <button type="submit" class="btn btn-primary" >Edit Profile</button>
                </form>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
    
@endsection