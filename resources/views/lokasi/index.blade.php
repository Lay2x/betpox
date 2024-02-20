@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                    <a href="{{ route('lokasi.create') }}" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus">Tambah</i></a>
                </div>
                <div class="card-body table table-responsive">
                    @if ($message = Session::get('Sukses'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ $message }}
                    </div>
                    @endif
                    <table class="table table-bordered" id="example2">
                        <thead>
                            <tr>
                                <th colspan="col-md-3">No</th>
                                <th colspan="col-md-3">ID</th>
                                <th colspan="col-md-3">Provinsi & Kota</th>
                                <th colspan="col-md-3">Lokasi</th>
                                <th colspan="col-md-3">Koordinat (Lat & Long)</th>
                                <th colspan="col-md-3">QR Code</th>
                                <th colspan="col-md-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lokasi as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->qr_lokasi }}</td>
                                    <td>{{ $row->nama_provinsi }}, {{ $row->nama_kota }}</td>
                                    <td>{{ $row->alamat_lokasi }}</td>
                                    <td>{{ $row->lat_lokasi }}, {{ $row->long_lokasi }}</td>
                                    <td>{!! QrCode::size(100)->generate(url('lihat', $row->qr_lokasi)) !!}</td>
                                    <td>
                                        <a href="{{ url('lihat', $row->qr_lokasi) }}" style="display: inline-block">Buat Laporan</a>
                                        <a href="{{ route('lokasi.edit', $row->id_lokasi) }}" class="btn btn-primary btn-xs" style="display: inline-block"><i class="fas fa-edit">Edit</i></a>
                                        <a href="{{ route('lokasi.show', $row->id_lokasi) }}" class="btn btn-warning btn-xs" style="display: inline-block"> <i class="fas fa-eye"> Detail</i></a>
                                        <form action="{{ route('lokasi.destroy', $row->id_lokasi) }}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs btn-flat show_confirm"><i class="fas fa-trash">Destroy</i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection