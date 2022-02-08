@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Transaksi</h1>
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
                <form action="{{ route('report-transaction.update', $item->id) }}" method="POST" >
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="idprogram" value="{{ $item->program_id }}" >
                    <div class="form-group">
                        <label for="tanggal_transaksi">Tanggal Transaksi</label>
                        <input type="date" class="form-control" name="tanggal_transaksi" placeholder="tanggal_transaksi" value="{{ $item->tanggal_transaksi }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_transaksi">Nama  Transaksi</label>
                        <input type="text" class="form-control" name="nama_transaksi" placeholder="nama transaksi" value="{{ $item->nama_transaksi }}">
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" placeholder="jumlah" value="{{ $item->jumlah }}">
                    </div>

                    <button type="submit" class="btn btn-primary" >Edit Transaksi</button>
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