<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Kota';
        $kota = DB::table('kota')
        ->join('provinsi', 'kota.id_provinsi', 'provinsi.id_provinsi')
        ->orderBy('provinsi.nama_provinsi')
        ->get();
        return view('kota.index', compact('title', 'kota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Kota';
        $provinsi = DB::table('provinsi')->orderBy('nama_provinsi')->get();
        return view('kota.create', compact('title', 'provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'required',
        ];
        $request->validate([
            'nama_kota' => 'required',
            'kode_kota' => 'required',
            'id_provinsi' => 'required',
        ], $messages);
        Kota::create($request->all());
        return redirect()->route('kota.index')->with('Sukses', 'Berhasil Tambah Kota');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kota $kota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kota = Kota::find($id);
        $provinsi = DB::table('provinsi')->orderBy('nama_provinsi')->get();
        $title = 'Edit Kota';
        return view('kota.edit', compact('title', 'provinsi', 'kota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'required',
        ];
        $request->validate([
            'nama_kota' => 'required',
            'kode_kota' => 'required',
            'id_provinsi' => 'required',
        ], $messages);
        $kota = Kota::findorfail($id);
        $kota->update($request->all());
        return redirect()->route('kota.index')->with('Sukses', 'Berhasil Edit Kota');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kota $kota)
    {
        $kota->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Kota');
    }
}
