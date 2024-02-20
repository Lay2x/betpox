<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Lokasi;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Lokasi';
        $lokasi = DB::table('lokasi')
        ->join('kota', 'lokasi.id_kota', 'kota.id_kota')
        ->join('provinsi', 'lokasi.id_provinsi', 'provinsi.id_provinsi')
        ->orderBy('provinsi.nama_provinsi')
        ->get();
        return view('lokasi.index', compact('title', 'lokasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Lokasi';
        $provinsi = Provinsi::all();
        $kota = Kota::all();
        return view('lokasi.create', compact('title', 'provinsi', 'kota'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Atribut wajib diisi',
        ];
        $request->validate([
            'alamat_lokasi' => 'required',
            'long_lokasi' => 'required',
            'lat_lokasi' => 'required',
            'id_kota' => 'required',
            'id_provinsi' => 'required',
        ], $messages);
        $randomNumber = random_int(10000, 99999);
        $kota = Kota::find($request->id_kota);
        $kode = $kota->kode_kota. $randomNumber;

        $data = new Lokasi();
        $data->alamat_lokasi = $request->alamat_lokasi;
        $data->qr_lokasi = $kode;
        $data->long_lokasi = $request->long_lokasi;
        $data->lat_lokasi = $request->lat_lokasi;
        $data->id_kota = $request->id_kota;
        $data->id_provinsi = $request->id_provinsi;
        $data->save();

        return redirect()->route('lokasi.index')->with('Sukses', 'Berhasil Tambah Lokasi');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $lokasi = DB::table('lokasi')
        ->join('kota', 'lokasi.id_kota', 'kota.id_kota')
        ->join('provinsi', 'lokasi.id_provinsi', 'provinsi.id_provinsi')
        ->where('id_lokasi', $id)
        ->first();
        $title = 'Detail Lokasi';
        return view('lokasi.show', compact('title', 'lokasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $provinsi = Provinsi::all();
        $kota = Kota::all();
        $lokasi = Lokasi::find($id);
        $title = 'Edit Lokasi';
        return view('lokasi.edit', compact('lokasi', 'title', 'provinsi', 'kota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        $update = [
            'alamat_lokasi' => $request->alamat_lokasi,
            'long_lokasi' => $request->long_lokasi,
            'lat_lokasi' => $request->lat_lokasi,
            'id_provinsi' => $request->id_provinsi,
        ];
        $lokasi->update($update);
        return redirect()->route('lokasi.index')->with('Sukses', 'Berhasil Update Lokasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Lokasi');
    }

    public function fetchCity(Request $request)
    {
        $data['kota'] = Kota::where("id_provinsi",$request->id_provinsi)->get(["nama_kota", "id_kota"]);
        return response()->json($data);
    }
}
