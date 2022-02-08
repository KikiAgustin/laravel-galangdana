@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data Program</h1>
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
                <form action="{{ route('program-donation.update', $item->id) }}" method="POST" >
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul Program</label>
                        <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{ $item->judul }}">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori Program</label>
                        <select name="kategori" id="kategori" class="form-control" >
                            <option value="{{ $item->category->id }}">{{ $item->category->nama_kategori }}</option>
                            @forelse ($category_donations as $cate)
                                <option value="{{ $cate->id }}">{{ $cate->nama_kategori }}</option>
                            @empty
                                <option value="" >Kategori Masih Kosong</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dibutuhkan">Jumlah Uang yang dibutuhkan</label>
                        <input type="number" class="form-control" name="dibutuhkan" placeholder="dibutuhkan" value="{{ $item->dibutuhkan }}">
                    </div>
                    <div class="form-group">
                        <label for="detail">Detail Program</label>
                        <textarea name="detail" id="detail" class="form-control" cols="30" rows="10">{{ $item->detail }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="pengirim">Nama Orang yang mengajukan</label>
                        <input readonly type="text" class="form-control" name="pengirim" placeholder="Nama Pengirim" value="{{ $item->pengirim }}">
                    </div>
                    <button type="submit" class="btn btn-primary" >Edit Program</button>
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