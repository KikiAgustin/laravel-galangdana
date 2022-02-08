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
                <form action="{{ route('transaction.update', $item->id) }}" method="POST" >
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="status_transaksi">Status Transaksi</label>
                        <select name="status_transaksi" id="status_transaksi" class="form-control">
                            <option value="{{ $item->status_transaksi }}">{{ $item->status_transaksi }}</option>
                            <option value="IN_CART">In Cart</option>
                            <option value="PENDING">Pending</option>
                            <option value="SUCCESS">Success</option>
                            <option value="CANCEL">Cancel</option>
                            <option value="FAILED">Failed</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" >Edit Status</button>
                </form>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
    
@endsection