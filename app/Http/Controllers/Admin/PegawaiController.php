<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PegawaiRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Guard;

class PegawaiController extends Controller {

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
        $data['title'] = 'Data Pegawai';
        return view('backend.pegawai.index', $data);
    }

    public function apiPegawai() {
        $data = Pegawai::orderBy('nip')->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
        $data['title'] = 'Tambah Pegawai';
        return View('backend.pegawai.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PegawaiRequest $request) {
        //
        $input = $request->all();
        $pegawai = new Pegawai($input);
        if ($pegawai->save()) {
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
        $data = Pegawai::find($id);
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
        $data['title'] = 'Edit Pegawai';
        $data['data'] = Pegawai::find($id);
        if ($this->auth->user()->status == 'admin') {
            return view('backend.pegawai.edit', $data);
        }
        return view('guru.pegawai.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(PegawaiRequest $request, $id) {
        //
        $input = $request->all();
        $pegawai = Pegawai::find($id);
        if ($pegawai->update($input)) {
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
        $pegawai = Pegawai::find($id);
        if ($pegawai->delete()) {
            return response()->json(array('success' => TRUE));
        }
    }

}
