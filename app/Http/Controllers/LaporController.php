<?php

namespace App\Http\Controllers;

use App\Models\Lapor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lapor = DB::table('lapor')
        ->join('lokasi', 'lapor.id_lokasi', 'lokasi.id_lokasi')
        ->join('provinsi', 'lokasi.id_provinsi', 'provinsi.id_provinsi')
        ->join('kota', 'lokasi.id_kota', 'kota.id_kota')
        ->orderByDesc('lapor.id_lapor')
        ->get();
        $title = 'Data Laporan Pinbox';
        return view('lapor.index', compact('title', 'lapor'));
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
    public function show(Lapor $lapor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lapor $lapor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lapor $lapor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lapor $lapor)
    {
        //
    }
}
