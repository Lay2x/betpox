@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Error!</strong> 
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('kota.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group mb-2">
                        <label for="">Provinsi</label>
                        <select name="id_provinsi" id="dropdown" class="form-control">
                            <option value=""></option>
                            @foreach ($provinsi as $row)
                                <option value="{{ $row->id_provinsi }}">{{ $row->nama_provinsi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Nama Kota</label>
                        <input type="text" name="nama_kota" class="form-control" value="{{ old('nama_kota') }}">
                    </div> 
                    <div class="form-group mb-2">
                        <label for="">Kode Kota</label>
                        <input type="text" class="form-control" name="kode_kota" value="{{ old('kode_kota') }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark"><i class="fas fa-save fa-pulse"> </i> Save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
