<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $video = Video::first();
        $title = 'Data Video';
        return view('video.index', compact('video', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Video';
        return view('video.create', compact('title'));
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
            'judul_video' => 'required',
            'link_video' => 'required',
        ], $message);
        Video::create($request->all());
        return redirect()->route('video.index')->with('Sukses', 'Berhasil Tambah Video');
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $video = Video::find($id);
        $title = 'Edit Data Video';
        return view('video.edit', compact('video', 'title'));
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
            'judul_video' => 'required',
            'link_video' => 'required',
        ], $message);
        $video = Video::findorfail($id);
        $video->update($request->all());
        return redirect()->route('video.index')->with('Sukses', 'Berhasil Edit Video');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Video');
    }
}
