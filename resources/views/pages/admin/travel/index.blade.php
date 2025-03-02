@extends('layouts.admin')

@section('title')
TraExpress - Dashboard
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="font-weight: bold">Jadwal Travel</h1>
        <a href="{{ route('travel.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
        </a>
    </div>

    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tujuan</th>
                            <th>Tanggal</th>
                            <th>Waktu Keberangkatan</th>
                            <th>Kuota Penumpang</th>
                            <th>Harga</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->tujuan }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('j F Y') }}</td>
                                <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $item->waktu)->format('H:i') }}</td>
                                <td>{{ $item->kuota }}</td>
                                <td>{{ 'Rp' . number_format($item->harga, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('travel.edit', $item->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('travel.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    Data Kosong
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
</div>
<!-- /.container-fluid -->
@endsection
