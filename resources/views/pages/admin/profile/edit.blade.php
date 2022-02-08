@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Profile Yayasan</h1>
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
                <form action="{{ route('profile-yayasan.update', $item->id) }}" method="POST"  >
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="detail">Tentang Yayasan</label>
                        <textarea name="tentang" id="tentang" class="form-control ckeditor" cols="30" rows="10">{{ @old('tentang') ? @old('tentang') : $item->tentang }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="detail">Tujuan</label>
                        <textarea name="tujuan" id="detail" class="form-control ckeditor" cols="30" rows="10">{{ @old('tujuan') ? @old('tujuan') : $item->tujuan }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="detail">Visi</label>
                        <textarea name="visi" id="detail" class="form-control ckeditor" cols="30" rows="10">{{ @old('visi') ? @old('visi') : $item->visi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="detail">Misi</label>
                        <textarea name="misi" id="detail" class="form-control ckeditor" cols="30" rows="10">{{  @old('misi') ? @old('misi') :$item->misi }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" >Edit Profile</button>
                </form>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
    
@endsection

@push('addon-script')
<script src="{{ url('backend/vendor/ckeditor/ckeditor.js') }}"></script>
{{-- <script>
    var konten = document.getElementById("tentang");
      CKEDITOR.replace(konten,{
      language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
 </script> --}}
@endpush