<?php

namespace App\Http\Controllers\Admin;

use App\Models\Upload;
use App\Http\Requests\UploadRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class UploadController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    public function index() {
        //
        $data['title'] = 'Menu Upload';
        return view('backend.upload.index', $data);
    }

    public function apiUpload() {
        $data = Upload::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
        $data['title'] = 'Tambah Upload';
        return View('backend.upload.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UploadRequest $request) {
        //
        $path = public_path('upload/file');
        $input = $request->except('file');
        $upload = new Upload();
        if ($request->hasFile('file')) {
            $upload->judul_file = $input['data'];
            $upload->tgl_posting = date('Y-m-d');
            $upload->author = $this->auth->user()->nama_pegawai;
            $upload->nama_file = $request->file('file')->getClientOriginalName();
            $request->file('file')->move($path, $upload->nama_file);
            if ($upload->save()) {
                return response()->json(array('success' => TRUE));
            };
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
        $data = Upload::find($id);
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
        $data['title'] = 'Edit Upload';
        $data['data'] = Upload::find($id);
        return view('backend.upload.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(UploadRequest $request, $id) {
        //
        $input = $request->all();
        $input['penulis'] = $this->auth->user()->nama_pegawai;
        $upload = Upload::find($id);
        if ($upload->update($input)) {
            return response()->json(array('success' => TRUE));
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
        $data = Upload::find($id);
        if ($data->delete()) {
            return response()->json(array('success' => TRUE, 'msg' => 'Data Berhasil Dihapus'));
        }
    }

}
