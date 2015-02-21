<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\JawabanRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jawaban;
use Illuminate\Contracts\Auth\Guard;

class JawabanController extends Controller {

    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($poll_id, $id = null) {
        //
        $data['poll_id'] = $poll_id;
        $data['title'] = 'Menu Jawaban';
        return view('backend.jawaban.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function apiJawaban($poll_id = NULL) {
        //
        $data = Jawaban::with('polling')->where('id_soal_poll', '=', $poll_id)->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function create($poll_id = null) {
        //
        $data['poll_id'] = $poll_id;
        $data['title'] = 'Tambah Jawaban';
        return View('backend.jawaban.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(JawabanRequest $request, $id = null) {
        //
        $input = $request->all();
        $jawaban = new Jawaban($input);
        if ($jawaban->save()) {
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
        $data = Jawaban::find($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($poll_id, $id) {
        //
        $data['poll_id'] = $poll_id;
        $data['title'] = 'Edit Jawaban';
        $data['data'] = Jawaban::find($id);
        return view('backend.jawaban.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(JawabanRequest $request, $id) {
        //
        $input = $request->all();
        $jawaban = Jawaban::find($id);
        if ($jawaban->update($input)) {
            return response()->json(array('success' => TRUE));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($poll_id, $id) {
        //
        $jawaban = Jawaban::find($id);
        if ($jawaban->delete()) {
            return response()->json(array('success' => TRUE));
        }
    }

}
