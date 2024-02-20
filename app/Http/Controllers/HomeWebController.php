<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Keunggulan;
use App\Models\Lapor;
use App\Models\Lokasi;
use App\Models\Setting;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konf = Setting::first();
        $keunggulan = Keunggulan::all();
        $testimoni = DB::table('testimoni')->orderByDesc('id_testimoni')->limit(6)->get();
        $video = Video::first();
        $faq = Faq::all();
        $lokasi = DB::table('lokasi')
        ->join('provinsi', 'lokasi.id_provinsi', 'provinsi.id_provinsi')
        ->join('kota', 'lokasi.id_kota', 'kota.id_kota')
        ->get();
        return view('welcome', compact('konf', 'keunggulan', 'testimoni', 'video', 'faq', 'lokasi'));
    }

    public function lihat($qr)
    {
        $konf = Setting::first();
        $lihat = DB::table('lokasi')
        ->join('provinsi', 'lokasi.id_provinsi', 'provinsi.id_provinsi')
        ->join('kota', 'lokasi.id_kota', 'kota.id_kota')
        ->where('lokasi.qr_lokasi', $qr)
        ->first();
        return view('lihat', compact('konf', 'lihat'));
    }

    public function notif()
    {
        return view('notif');
    }

    public function laporpenuh(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal :min karakter!!!',
            'max' => ':attribute harus diisi maksimal :max karakter!!!',
        ];
        $request->validate([
            'nama_lapor' => 'required',
            'no_hp_lapor' => 'required|min:10',
            'jenis_laporan' => 'required'
        ], $messages);

        $lapor = new Lapor();
        $lapor->nama_lapor = $request->nama_lapor;
        $lapor->id_lokasi = $request->id_lokasi;
        $lapor->no_hp_lapor = $request->no_hp_lapor;
        $lapor->tanggal_lapor = date('Y-m-d H:i:s');
        if($request->jenis_laporan == 1){
            $lapor->jenis_laporan = $request->isi_keterangan;
        }
        else{
            $lapor->jenis_laporan = $request->jenis_laporan;
        }
        $lapor->save();
        return redirect('notif');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
