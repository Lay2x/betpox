@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                    {{-- <a href="{{ route('kota.create') }}" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus">Tambah</i></a> --}}
                </div>
                <div class="card-body table table-responsive">
                    @if ($message = Session::get('Sukses'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ $message }}
                    </div>
                    @endif
                    <table class="table table-bordered" id="example1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Laporan</th>
                                <th>Kode Pinbox</th>
                                <th>Alamat Pinbox</th>
                                <th>Pelapor</th>
                                <th>No. Hp</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lapor as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->jenis_laporan }}</td>
                                    <td>{{ $row->qr_lokasi }}</td>
                                    <td>{{ $row->nama_kota }}, {{ $row->nama_provinsi }}, {{ $row->alamat_lokasi }}</td>
                                    <td>{{ $row->nama_lapor }}</td>
                                    <td>{{ $row->no_hp_lapor }}</td>
                                    <td>{{ Carbon\Carbon::parse($row->tanggal_lapor)->isoFormat('dddd, D MMMM Y, HH:mm:s')  }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection