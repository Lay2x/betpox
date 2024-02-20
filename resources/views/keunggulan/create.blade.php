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
                    <form action="{{ route('keunggulan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group mb-2">
                            <label for="">Judul</label>
                            <input type="text" placeholder="Masukkan judul ...." name="judul_keunggulan" class="form-control" value="{{ old('judul_keunggulan') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Deskripsi</label>
                            <textarea name="deskripsi_keunggulan" class="form-control" id="editor" cols="30" rows="10">{{ old('deskripsi_keunggulan') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Icon</label>
                            <input type="file" class="form-control" name="icon_keunggulan" placeholder="" id="preview_gambar" />
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
@section('script')
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ),{
            ckfinder: {
                uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
    }
        })
        .catch( error => {
            console.error( error );
        } );
  </script>
  <script>
      CKEDITOR.replace( 'editor', {
          filebrowserUploadUrl: "{{route('image.upload', ['_token' => csrf_token() ])}}",
          filebrowserUploadMethod: 'form'
      });
  </script>
@endsection