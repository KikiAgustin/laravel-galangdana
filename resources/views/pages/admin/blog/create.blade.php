@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah blog</h1>
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
                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul Blog</label>
                        <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{ old('judul') }}">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori Blog</label>
                        <select name="kategori" id="kategori" class="form-control" required>
                            <option value="">Pilih</option>
                            @forelse ($items as $item)
                            <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                            @empty
                            <option value="">Kategori Belum ada</option>
                            @endforelse
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="lengkap">Deskripsi</label>
                        <textarea name="lengkap" id="detail" class="form-control" cols="30" rows="10">{{ old('lengkap') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" name="gambar" placeholder="gambar" value="{{ old('gambar') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulist</label>
                        <input type="text" class="form-control" name="penulis" placeholder="penulis" value="{{ $pengirim }}" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary" >Tambah Blog</button>
                </form>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
    
@endsection

@push('addon-script')
<script src="{{ url('backend/vendor/ckeditor/ckeditor.js') }}"></script>
<script>
    var konten = document.getElementById("detail");
      CKEDITOR.replace(konten,{
      language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
 </script>
@endpush