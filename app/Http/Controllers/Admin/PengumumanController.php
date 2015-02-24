<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PengumumanRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengumuman;
use Illuminate\Contracts\Auth\Guard;

class PengumumanController extends Controller {

    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
        $data['title'] = 'Menu Pengumuman';
        if ($this->auth->user()->status == 'admin') {
            return view('backend.pengumuman.index', $data);
        }
        return view('guru.pengumuman.index', $data);
    }

    public function apiPengumuman() {
        if ($this->auth->user()->status == 'guru') {
            $penulis = $this->auth->user()->nama_pegawai;
            $data = Pengumuman::orderBy('tanggal', 'desc')->where('penulis', $penulis)->get();
        } else {
            $data = Pengumuman::orderBy('tanggal', 'desc')->get();
        }
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
        $data['title'] = 'Tambah Pengumuman';
        if ($this->auth->user()->status == 'admin') {
            return View('backend.pengumuman.create', $data);
        }
        return view('guru.pengumuman.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PengumumanRequest $request) {
        //
        $input = $request->all();
        $pengumuman = new Pengumuman($input);
        $pengumuman->tanggal = date('Y-m-d');
        $pengumuman->penulis = $this->auth->user()->nama_pegawai;
        if ($pengumuman->save()) {
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
        $data = Pengumuman::find($id);
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
        $data['title'] = 'Edit Pengumuman';
        $data['data'] = Pengumuman::find($id);
        if ($this->auth->user()->status == 'admin') {
            return view('backend.pengumuman.edit', $data);
        }
        return view('guru.pengumuman.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(PengumumanRequest $request, $id) {
        //
        $input = $request->all();
        $input['penulis'] = $this->auth->user()->nama_pegawai;
        $pengumuman = Pengumuman::find($id);
        if ($pengumuman->update($input)) {
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
        $data = Pengumuman::find($id);
        if ($data->delete()) {
            return response()->json(array('success' => TRUE, 'msg' => 'Data Berhasil Dihapus'));
        }
    }

}
