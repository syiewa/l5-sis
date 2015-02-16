<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Berita;

class BeritaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
        $data['title'] = 'Menu Data Statis';
        return view('backend.berita.index', $data);
    }

    public function apiBerita() {
        $data = Berita::orderBy('tanggal', 'desc')->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
        $data['title'] = 'Tambah Berita';
        return View('backend.berita.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        //
        $destinationPath = public_path() . '/upload';
        $input = $request->except('file');
        if ($input['data']) {
            $data = json_decode($input['data']);
            $berita = Berita::find($data->id_berita);
            if ($request->hasFile('file')) {
                $request->file('file')->move($destinationPath);
                $berita->gambar = $request->file('file')->getClientOriginalName();
                $checkfile = file_exists($destinationPath . '/' . $berita->gambar);
                if ($checkfile) {
                    unlink($destinationPath . '/' . $berita->gambar);
                }
            }
            $berita->judul_berita = $data->judul_berita;
            $berita->isi = $data->isi;
        } else {
            $berita = new Berita($input);
            $berita->tanggal = date('Y-m-d');
            $berita->waktu = date('H:i:s');
            if ($request->hasFile('file')) {
                $request->file('file')->move($destinationPath);
                $berita->gambar = $request->file('file')->getClientOriginalName();
            }
        }
        if ($berita->save()) {
            return response()->json(array('success' => TRUE));
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
        $data = Berita::find($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
        $data['title'] = 'Edit Berita';
        $data['data'] = Berita::find($id);
        return view('backend.berita.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        //
        $berita = Berita::find($id);
        if ($berita->update($request->all())) {
            return response()->json(array('success' => TRUE, 'msg' => 'Data Berhasil Dihapus'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
        $data = Berita::find($id);
        if ($data->delete()) {
            return response()->json(array('success' => TRUE, 'msg' => 'Data Berhasil Dihapus'));
        }
    }

}
