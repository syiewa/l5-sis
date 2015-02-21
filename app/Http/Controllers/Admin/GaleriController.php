<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GaleriRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Contracts\Auth\Guard;

class GaleriController extends Controller {

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
        $data['title'] = 'Data Galeri';
        return view('backend.galeri.index', $data);
    }

    public function apiGaleri() {
        $data = Galeri::orderBy('id_album', 'desc')->get();
        return response()->json($data);
    }

    public function apiCreateGaleri() {
        $data = Galeri::DropdownGaleri();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
        $data['title'] = 'Tambah Galeri';
        return View('backend.galeri.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(GaleriRequest $request) {
        //
        $input = $request->all();
        $galeri = new Galeri($input);
        if ($galeri->save()) {
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
        $data = Galeri::find($id);
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
        $data['title'] = 'Edit Galeri';
        $data['data'] = Galeri::find($id);
        return view('backend.galeri.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(GaleriRequest $request, $id) {
        //
        $input = $request->all();
        $galeri = Galeri::find($id);
        if ($input['status'] == 'Y') {
            Galeri::where('status', '=', 'Y')->update(['status' => 'N']);
        }
        if ($galeri->update($input)) {
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
        $galeri = Galeri::find($id);
        if ($galeri->delete()) {
            return response()->json(array('success' => TRUE));
        }
    }

}
