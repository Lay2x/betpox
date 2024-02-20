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
                    <form action="{{ route('lokasi.update', $lokasi->id_lokasi) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="">Provinsi</label>
                        <select name="id_provinsi" id="provinsi-dd" class="form-control">
                            <option value=""></option>
                            @foreach ($provinsi as $row)
                                <option @if ($lokasi->id_provinsi == $row->id_provinsi)
                                    selected
                                @endif value="{{ $row->id_provinsi }}">{{ $row->nama_provinsi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Kota</label>
                        <select name="id_kota" id="kota-dd" class="form-control">
                            <option value=""></option>
                            @foreach ($kota as $row)
                                <option @if ($lokasi->id_kota == $row->id_kota)
                                    selected
                                @endif value="{{ $row->id_kota }}">{{ $row->nama_kota }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat_lokasi" class="form-control" value="{{ $lokasi->alamat_lokasi }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Maps</label>
                        <div id="map">
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Long</label>
                        <input type="text" name="long_lokasi" class="form-control" id="longitude" value="{{ $lokasi->long_lokasi }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Latitude</label>
                        <input type="text" name="lat_lokasi" id="latitude" class="form-control" value="{{ $lokasi->lat_lokasi }}">
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
@section('script')
<script>
    let mapOptions = {
    center:[{{ $lokasi->lat_lokasi }}, {{ $lokasi->long_lokasi }}],
    zoom: 16
}
let map = new L.map('map' , mapOptions);

let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
map.addLayer(layer);


// let marker = null;
let marker = L.marker([{{ $lokasi->lat_lokasi }}, {{ $lokasi->long_lokasi }}]).addTo(map);
map.on('click', (event)=> {

    if(marker !== null){
        map.removeLayer(marker);
    }
    marker = L.marker([event.latlng.lat , event.latlng.lng]).addTo(map);
    document.getElementById('latitude').value = event.latlng.lat;
    document.getElementById('longitude').value = event.latlng.lng;
    
})
</script>
@endsection