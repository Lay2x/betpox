<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Galeri';
        $galeri = DB::table('galeri')
        ->orderByDesc('id_galeri')
        ->get();
        return view('galeri.index', compact('title', 'galeri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Galeri';
        return view('galeri.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = [
            'required' => 'Atribut Wajib Diisi'
        ];
        $request->validate([
            'judul_galeri' => 'required',
            'gambar_galeri' => 'required'
        ], $message);
        
        $gambar_galeri = $request->file('gambar_galeri');
        $namagambar = 'Galeri'.date('Ymdhis').'.'.$request->file('gambar_galeri')->getClientOriginalExtension();
        $gambar_galeri->move('file/galeri/',$namagambar);

        $data = new Galeri();
        $data->judul_galeri = $request->judul_galeri;
        $data->jenis_galeri = 'Galeri';
        $data->gambar_galeri = $namagambar;
        $data->save();

        return redirect()->route('galeri.index')->with('Sukses', 'Berhasil Tambah Galeri');
    }

    /**
     * Display the specified resource.
     */
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $galeri = Galeri::find($id);
        $title = 'Edit Data Galeri';
        return view('galeri.edit', compact('title', 'galeri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $galeri = Galeri::findorfail($id);
        $namagambar = $galeri->gambar_galeri;
        $update = [
            'judul_galeri' => $request->judul_galeri,
            'jenis_galeri' => 'Galeri',
            'gambar_galeri' => $namagambar
        ];
        if ($request->gambar_galeri != ""){
            $request->gambar_galeri->move(public_path('file/galeri/'), $namagambar);
        } 
        $galeri->update($update);
        return redirect()->route('galeri.index')->with('Sukses', 'Berhasil Edit Galeri');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $galeri = Galeri::find($id);
        $namagambar = $galeri->gambar_galeri;
        $file_galeri = ('file/galeri/').$namagambar;
        if(file_exists($file_galeri)){
            @unlink($file_galeri);
        }
        $galeri->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Galeri');
    }
}
