<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Testimoni';
        $testimoni = Testimoni::all();
        return view('testimoni.index', compact('testimoni', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Testimoni';
        return view('testimoni.create', compact('title'));
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
            'instansi_testimoni' => 'required',
            'isi_testimoni' => 'required',
            'logo_instansi_testimoni' => 'required'
        ], $message);

        $logo_instansi_testimoni = $request->file('logo_instansi_testimoni');
        $namalogo = 'Testimoni'.date('Ymdhis').'.'.$request->file('logo_instansi_testimoni')->getClientOriginalExtension();
        $logo_instansi_testimoni->move('file/testimoni/',$namalogo);

        $data = new Testimoni();
        $data->instansi_testimoni = $request->instansi_testimoni;
        $data->isi_testimoni = $request->isi_testimoni;
        $data->logo_instansi_testimoni = $namalogo;
        $data->save();
        return redirect()->route('testimoni.index')->with('Sukses', 'Berhasil Tambah Testimoni');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimoni $testimoni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $testimoni = Testimoni::find($id);
        $title = 'Edit Testimoni';
        return view('testimoni.edit', compact('testimoni', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $testimoni = Testimoni::findorfail($id);
        $namalogo = $testimoni->logo_instansi_testimoni;
        $update = [
            'instansi_testimoni' => $request->instansi_testimoni,
            'isi_testimoni' => $request->isi_testimoni,
            'logo_instansi_testimoni' => $namalogo
        ];
        if ($request->logo_instansi_testimoni != ""){
            $request->logo_instansi_testimoni->move(public_path('file/testimoni/'), $namalogo);
        } 
        $testimoni->update($update);
        return redirect()->route('testimoni.index')->with('Sukses', 'Berhasil Edit Testimoni');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $testimoni = Testimoni::find($id);
        $namalogo = $testimoni->logo_instansi_testimoni;
        $file_testimoni = ('file/testimoni/').$namalogo;
        if(file_exists($file_testimoni)){
            @unlink($file_testimoni);
        }
        $testimoni->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Testimoni');
    }
}
