<?php

namespace App\Http\Controllers;

use App\Models\KategoriPinbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriPinboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Kategori Pinbox';
        $kategori_pinbox = DB::table('kategori_pinbox')->orderByDesc('id_kategori_pinbox')->get();
        return view('kategori_pinbox.index', compact('title', 'kategori_pinbox'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Kategori Pinbox';
        return view('kategori_pinbox.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' =>'Atribut Wajib Diisi',
        ];
        $request->validate([
            'nama_kategori_pinbox' => 'required',
            'ukuran_kategori_pinbox' => 'required'
        ], $messages);
        KategoriPinbox::create($request->all());
        return redirect()->route('kategori_pinbox.index')->with('Sukses', 'Berhasil Tambah Kategori Pinbox');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriPinbox $kategoriPinbox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori_pinbox = KategoriPinbox::find($id);
        $title = 'Edit Kategori Pinbox';
        return view('kategori_pinbox.edit', compact('kategori_pinbox', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' =>'Atribut Wajib Diisi',
        ];
        $request->validate([
            'nama_kategori_pinbox' => 'required',
            'ukuran_kategori_pinbox' => 'required'
        ], $messages);
        $kategori_pinbox = KategoriPinbox::findorfail($id);
        $kategori_pinbox->update($request->all());
        return redirect()->route('kategori_pinbox.index')->with('Sukses', 'Berhasil Edit Kategori Pinbox');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori_pinbox = KategoriPinbox::find($id);
        $kategori_pinbox->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Kategori Pinbox');
    }
}
