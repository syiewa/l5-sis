<?php

namespace App\Http\Controllers\Admin;

use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests\FotoRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Foto;
use Illuminate\Contracts\Auth\Guard;

class FotoController extends Controller {

    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($album_id, $id = null) {
//
        $data['album_id'] = $album_id;
        $data['title'] = 'Menu Foto';
        return view('backend.foto.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function apiFoto($album_id = NULL) {
//
        $data = Foto::with('galeri')->where('id_album', '=', $album_id)->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function create($album_id = null) {
//
        $data['album_id'] = $album_id;
        $data['title'] = 'Tambah Foto';
        return View('backend.foto.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(FotoRequest $request, $id = null) {
//
        $besar = public_path('upload/besar');
        $kecil = public_path('upload/kecil');
        $input = $request->except('file');
        $data = json_decode($input['data']);
        if (isset($data->id_foto)) {
            $foto = Foto::find($data->id_foto);
            $foto->id_album = $data->id_album;
            if ($request->hasFile('file')) {
                $checkfile = file_exists(public_path('upload/besar/' . $foto->foto_besar));
                $checkfile2 = file_exists(public_path('upload/kecil/' . $foto->foto_kecil));
                if ($checkfile) {
                    unlink(public_path('upload/kecil/' . $foto->foto_kecil));
                }
                if ($checkfile2) {
                    unlink(public_path('upload/besar/' . $foto->foto_besar));
                }
                $foto->foto_besar = $request->file('file')->getClientOriginalName();
                $foto->foto_kecil = $request->file('file')->getClientOriginalName();
                $request->file('file')->move($besar, $foto->foto_besar);
                $foto_kecil = Image::make(public_path('upload/besar/' . $foto->foto_besar))->resize(300, 200)->save($kecil . '/' . $foto->foto_kecil);
            }
        } else {
            $foto = new Foto();
            $foto->id_album = $input['data'];
            if ($request->hasFile('file')) {
                $foto->foto_besar = $request->file('file')->getClientOriginalName();
                $foto->foto_kecil = $request->file('file')->getClientOriginalName();
                $request->file('file')->move($besar, $foto->foto_besar);
                $foto_kecil = Image::make(public_path('upload/besar/' . $foto->foto_besar))->resize(300, 200)->save($kecil . '/' . $foto->foto_kecil);
            }
        }
        if ($foto->save()) {
            return response()->json(array('success' => TRUE));
        } else {
            return 1;
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
        $data = Foto::find($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($album_id, $id) {
//
        $data['album_id'] = $album_id;
        $data['title'] = 'Edit Foto';
        $data['data'] = Foto::find($id);
        return view('backend.foto.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(FotoRequest $request, $album_id, $id) {
//
        $input = $request->all();
        $foto = Foto::find($id);
        if ($foto->update($input)) {
            return response()->json(array('success' => TRUE));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($album_id, $id) {
//
        $foto = Foto::find($id);
        $checkfile = file_exists(public_path('upload/besar/' . $foto->foto_besar));
        $checkfile2 = file_exists(public_path('upload/kecil/' . $foto->foto_kecil));
        if ($checkfile) {
            unlink(public_path('upload/kecil/' . $foto->foto_kecil));
        }
        if ($checkfile2) {
            unlink(public_path('upload/besar/' . $foto->foto_besar));
        }
        if ($foto->delete()) {
            return response()->json(array('success' => TRUE));
        }
    }

}
