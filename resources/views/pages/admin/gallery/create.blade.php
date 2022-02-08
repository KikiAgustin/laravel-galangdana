@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Gambar</h1>
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
                <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    
                    <div class="form-group">
                        <label for="program_donations_id">Nama Program</label>
                        <select name="program_donations_id" required class="form-control" >
                            <option value="">Pilih</option>
                            @foreach ($program_donations as $program_donation)
                                <option value="{{ $program_donation->id }}">
                                    {{ $program_donation->judul }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" name="image" class="form-control" placeholder="Pilih Gambar">
                    </div>

                    <button type="submit" class="btn btn-primary" >Tambah Gambar</button>
                </form>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
    
@endsection