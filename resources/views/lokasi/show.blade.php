@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }} {{ $lokasi->alamat_lokasi }}</h3>
                    <a href="{{ route('lokasi.index') }}" class="btn btn-warning" style="float: right;"><i class="fas fa-eye"></i>  Kembali</a>
                </div>
                <div class="card-body table table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width: 30%;">Alamat</th>
                            <th style="width: 20px;">:</th>
                            <td>{{ $lokasi->alamat_lokasi }}</td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">Kota & Provinsi</th>
                            <th style="width: 20px;">:</th>
                            <td>{{ $lokasi->nama_kota }}, {{ $lokasi->nama_provinsi }}</td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">Koordinat</th>
                            <th style="width: 20px;">:</th>
                            <td>{{ $lokasi->lat_lokasi }}, {{ $lokasi->long_lokasi }}</td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">QR Code</th>
                            <th style="width: 20px;">:</th>
                            <td>{!! QrCode::size(100)->generate($lokasi->qr_lokasi) !!}</td>
                        </tr>
                    </table>
                    <div class="row mt-3">
                        <div id="map"></div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    let mapOptions = {
    center:[{{ $lokasi->lat_lokasi }}, {{ $lokasi->long_lokasi }}],
    zoom: 20
}
let map = new L.map('map' , mapOptions);

let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
map.addLayer(layer);


// let marker = null;
let marker = L.marker([{{ $lokasi->lat_lokasi }}, {{ $lokasi->long_lokasi }}]).addTo(map);
map.on('click', (event)=> {

    // if(marker !== null){
    //     map.removeLayer(marker);
    // }
    // marker = L.marker([event.latlng.lat , event.latlng.lng]).addTo(map);
    document.getElementById('latitude').value = event.latlng.lat;
    document.getElementById('longitude').value = event.latlng.lng;
    
})
</script>
@endsection