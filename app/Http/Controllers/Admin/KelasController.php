<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\KelasRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Contracts\Auth\Guard;

class KelasController extends Controller {

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
        $data['title'] = 'Menu Kelas';
        return view('backend.kelas.index', $data);
    }

    public function apiKelas() {
        $data = Kelas::all();
        return response()->json($data);
    }

    public function apiCreateKelas() {
        $data = Kelas::DropdownKelas();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
        $data['title'] = 'Tambah Kelas';
        return View('backend.kelas.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(KelasRequest $request) {
        //
        $input = $request->all();
        $kelas = new Kelas($input);
        if ($kelas->save()) {
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
        $data = Kelas::find($id);
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
        $data['title'] = 'Edit Kelas';
        $data['data'] = Kelas::find($id);
        return view('backend.kelas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(KelasRequest $request, $id) {
        //
        $input = $request->all();
        $kelas = Kelas::find($id);
        if ($kelas->update($input)) {
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
        $kelas = Kelas::find($id);
        if ($kelas->delete()) {
            return response()->json(array('success' => TRUE));
        }
    }

}
