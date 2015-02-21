<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AgendaRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agenda;
use Illuminate\Contracts\Auth\Guard;

class AgendaController extends Controller {

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
        $data['title'] = 'Agenda Sekolah';
        return view('backend.agenda.index', $data);
    }

    public function apiAgenda() {
        $data = Agenda::orderBy('tgl_mulai', 'desc')->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
        $data['title'] = 'Tambah Agenda';
        return View('backend.agenda.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(AgendaRequest $request) {
        //
        $input = $request->all();
        $input['tgl_mulai'] = formatDate($input['tgl_mulai']);
        $input['tgl_selesai'] = formatDate($input['tgl_selesai']);
        $input['tgl_posting'] = date('Y-m-d');
        $agenda = new Agenda($input);
        if ($agenda->save()) {
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
        $data = Agenda::find($id);
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
        $data['title'] = 'Edit Agenda';
        $data['data'] = Agenda::find($id);
        return view('backend.agenda.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(AgendaRequest $request, $id) {
        //
        $input = $request->all();
        $input['tgl_mulai'] = formatDate($input['tgl_mulai']);
        $input['tgl_selesai'] = formatDate($input['tgl_selesai']);
        $agenda = Agenda::find($id);
        if ($agenda->update($input)) {
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
        $agenda = Agenda::find($id);
        if ($agenda->delete()) {
            return response()->json(array('success' => TRUE));
        }
    }

}
