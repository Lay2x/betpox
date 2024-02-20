@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                    <a href="{{ route('galeri.index') }}" class="btn btn-warning btn-sm" style="float: right"><i class="fas fa-eye"> </i> Kembali</a>
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
                    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group mb-2">
                            <label for="">Judul Galeri</label>
                            <input type="text" placeholder="Masukkan judul ...." name="judul_galeri" class="form-control" value="{{ old('judul_galeri') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Gambar</label>
                            <input type="file" class="form-control" name="gambar_galeri" placeholder="" id="preview_gambar" />
                        </div>
                        <div class="form-group">
                            <label for="">Preview Icon</label>
                            <img src="#" alt="" style="width: 30%; height: 30%" id="gambar_nodin">
                        </div>      
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
