<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SiswaRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Contracts\Auth\Guard;

class SiswaController extends Controller {

    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($kelas_id, $id = null) {
        //
        $data['kelas_id'] = $kelas_id;
        $data['title'] = 'Menu Siswa';
        return view('backend.siswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function apiSiswa($id = NULL) {
        //
        $data = Siswa::with('kelas')->where('id_kelas', '=', $id)->orderBy('nis')->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function create($id = null) {
        //
        $data['id'] = $id;
        $data['title'] = 'Tambah Siswa';
        return View('backend.siswa.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(SiswaRequest $request, $id = null) {
        //
        $input = $request->all();
        $siswa = new Siswa($input);
        if ($siswa->save()) {
            return response()->json(array('success' => TRUE));
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
        $data = Siswa::find($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($kelas_id, $id) {
        //
        $data['kelas_id'] = $kelas_id;
        $data['title'] = 'Edit Siswa';
        $data['data'] = Siswa::find($id);
        return view('backend.siswa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(SiswaRequest $request, $kelas_id, $id) {
        //
        $input = $request->all();
        $siswa = Siswa::find($id);
        if ($siswa->update($input)) {
            return response()->json(array('success' => TRUE));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($kelas_id, $id) {
        //
        $siswa = Siswa::find($id);
        if ($siswa->delete()) {
            return response()->json(array('success' => TRUE));
        }
    }

}
