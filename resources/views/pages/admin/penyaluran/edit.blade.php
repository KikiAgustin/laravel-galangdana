@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Penyaluran</h1>
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
                <form action="{{ route('distribution.update', $item->id) }}" method="POST" enctype="multipart/form-data" >
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="idprogram" value="{{ $item->program_id }}" >
                    <div class="form-group">
                        <label for="judul">Judul </label>
                        <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{ $item->judul }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_penyaluran">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal_penyaluran" placeholder="tanggal_penyaluran" value="{{ $item->tanggal_penyaluran }}">
                    </div>
                    <div class="form-group">
                        <label for="detail">Detail</label>
                        <textarea name="detail" id="detail" class="form-control" cols="30" rows="10">{{ $item->penyaluran }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" name="gambar" placeholder="Gambar" value="">
                    </div>
                    <button type="submit" class="btn btn-primary" >Edit Penyaluran</button>
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