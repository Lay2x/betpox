<?php

namespace App\Http\Controllers;

use App\Models\Keunggulan;
use Illuminate\Http\Request;

class KeunggulanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Keunggulan';
        $keunggulan = Keunggulan::all();
        return view('keunggulan.index', compact('title', 'keunggulan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Keunggulan';
        return view('keunggulan.create', compact('title'));
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
            'judul_keunggulan' => 'required',
            'icon_keunggulan' => 'required',
            'deskripsi_keunggulan' => 'required'
        ], $message);

        $icon_keunggulan = $request->file('icon_keunggulan');
        $namaicon = 'Keunggulan'.date('Ymdhis').'.'.$request->file('icon_keunggulan')->getClientOriginalExtension();
        $icon_keunggulan->move('file/keunggulan/',$namaicon);
        
        $data = new Keunggulan();
        $data->judul_keunggulan = $request->judul_keunggulan;
        $data->icon_keunggulan = $namaicon;
        $data->deskripsi_keunggulan = $request->deskripsi_keunggulan;
        $data->save();
        return redirect()->route('keunggulan.index')->with('Sukses', 'Berhasil Tambahkan Keunggulan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keunggulan $keunggulan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $keunggulan = Keunggulan::findorfail($id);
        $title = 'Edit Keunggulan';
        return view('keunggulan.edit', compact('keunggulan', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $keunggulan = Keunggulan::findorfail($id);
        $namafile = $keunggulan->icon_keunggulan;
        $update = [
            'judul_keunggulan' => $request->judul_keunggulan,
            'icon_keunggulan' => $namafile,
            'deskripsi_keunggulan' => $request->deskripsi_keunggulan,
        ];
        if ($request->icon_keunggulan != ""){
            $request->icon_keunggulan->move('file/keunggulan/', $namafile);
        } 
        $keunggulan->update($update);
      
       return redirect()->route('keunggulan.index')->with('Sukses', 'Berhasil Edit Keunggulan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $keunggulan = Keunggulan::find($id);
        $namalogo = $keunggulan->icon_keunggulan;
        $file_keunggulan = ('file/keunggulan/').$namalogo;
        if(file_exists($file_keunggulan)){
            @unlink($file_keunggulan);
        }
        $keunggulan->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Keunggulan');
    }
}
