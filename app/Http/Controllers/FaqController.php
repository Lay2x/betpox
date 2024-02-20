<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faq = DB::table('faq')->get();
        $title = 'Data FAQ';
        return view('faq.index', compact('title', 'faq'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah FAQ';
        return view('faq.create', compact('title'));
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
            'judul_faq' => 'required',
            'isi_faq' => 'required'
        ], $message);

        Faq::create($request->all());
        return redirect()->route('faq.index')->with('Sukses', 'Berhasil Tambah FAQ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Edit FAQ';
        $faq = Faq::find($id);
        return view('faq.edit', compact('title', 'faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $message = [
            'required' => 'Atribut Wajib Diisi'
        ];
        $request->validate([
            'judul_faq' => 'required',
            'isi_faq' => 'required'
        ], $message);

        $faq = Faq::findorfail($id);
        $faq->update($request->all());
        return redirect()->route('faq.index')->with('Sukses', 'Berhasil Tambah FAQ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $faq = Faq::find($id);
        $faq->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus FAQ');
    }
}
