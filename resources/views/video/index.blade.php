@extends('layouts.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('Sukses'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ $message }}
                            </div>
                        @endif
                        @if ($message = Session::get('Delete'))
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <table class="table">
                            <tr>
                                <td class="text-center">
                                    <iframe width="560" height="315"
                                        src="https://www.youtube.com/embed/{{ $video->link_video }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                </td>
                            </tr>
                            <form action="{{ route('video.update', $video->id_video) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <tr>
                                    <td>
                                        <div class="form-group mb-2">
                                            <label for="">Judul Video <abbr title=""
                                                    style="color: black">*</abbr></label>
                                            <input type="text" class="form-control"
                                                placeholder="Masukkan Judul Video disini...." name="judul_video"
                                                value="{{ $video->judul_video }}">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Link Video <abbr title=""
                                                    style="color: black">*</abbr></label>
                                            <input type="text" class="form-control"
                                                placeholder="Masukkan Embed Video disini...." name="link_video"
                                                value="{{ $video->link_video }}">
                                        </div>
                                        <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i>
                                            Save</button>
                                    </td>
                            </form>
                            </tr>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
