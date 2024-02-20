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
                    <form action="{{ route('testimoni.update', $testimoni->id_testimoni) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-2">
                            <label for="">Nama Instansi</label>
                            <input type="text" placeholder="Masukkan nama instansi...." name="instansi_testimoni" class="form-control" value="{{ $testimoni->instansi_testimoni }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Logo Instansi</label>
                            <input id="inputImg" type="file" accept="image/*" name="logo_instansi_testimoni" class="form-control">
                            <img class="d-none w-25 h-25 my-2" id="previewImg" src="{{ asset('file/testimoni/'.$testimoni->logo_instansi_testimoni) }}" alt="Preview image">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Isi Testimoni</label>
                            <textarea name="isi_testimoni" class="form-control" id="editor" cols="30" rows="10">{{ $testimoni->isi_testimoni }}</textarea>
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
    document.getElementById('inputImg').addEventListener('change', function() {
        // Get the file input value and create a URL for the selected image
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImg').setAttribute('src', e.target.result);
                document.getElementById('previewImg').classList.add("d-block");
            };
            reader.readAsDataURL(input.files[0]);
        }
    });
</script>
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