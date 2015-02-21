<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DataStatisPostRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Menu;
use Illuminate\Contracts\Auth\Guard;

class DataStatisController extends Controller {

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
        $data['title'] = 'Menu Data Statis';
        return view('backend.datastatis.index', $data);
    }

    public function apiDataStatis() {
        $data = Data::with('menu')->orderBy('data_id')->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
        $data['title'] = 'Tambah Data Statis';
        return View('backend.datastatis.create', $data);
    }

    public function apiCreateMenu() {
        $data = Menu::DropdownMenu();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(DataStatisPostRequest $request) {
        //
        $input = $request->all();
        $data = new Data($input);
        if ($data->save()) {
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
        $data = Data::find($Id);
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
        $data['title'] = 'Edit Data Statis';
        $data['data'] = Data::find($id);
        return view('backend.datastatis.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(DataStatisPostRequest $request, $id) {
        //
        $input = $request->all();
        $data = Data::find($id);
        if ($data->update($input)) {
            return response()->json(array('success' => TRUE, 'msg' => 'Data Berhasil diupdate'));
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
        $data = Data::find($id);
        if ($data->delete()) {
            return response()->json(array('success' => TRUE, 'msg' => 'Data Berhasil Dihapus'));
        }
    }

}
