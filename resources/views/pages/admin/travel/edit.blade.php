@extends('layouts.admin')

@section('title')
TraExpress - Dashboard
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="font-weight: bold">Edit Jadwal Travel</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('travel.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="tujuan">Tujuan</label>
                    <input type="text" class="form-control" name="tujuan" placeholder="Tujuan" value="{{ $item->tujuan }}">
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" placeholder="Tanggal" value="{{ $item->tanggal }}">
                </div>
                <div class="form-group">
                    <label for="waktu">Waktu Keberangkatan</label>
                    <input type="time" class="form-control" name="waktu" placeholder="Waktu Keberangkatan" value="{{ \Carbon\Carbon::parse($item->waktu)->format('H:i') }}">
                </div>
                <div class="form-group">
                    <label for="kuota">Kuota</label>
                    <input type="number" class="form-control" name="kuota" placeholder="Kuota Penumpang" value="{{ $item->kuota }}">
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" name="harga" placeholder="Harga" value="{{ old('harga', $item->harga) }}" min="0">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Ubah
                </button>
            </form>
        </div>
    </div>



</div>
<!-- /.container-fluid -->
@endsection
