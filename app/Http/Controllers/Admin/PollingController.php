<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PollingRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Polling;
use Illuminate\Contracts\Auth\Guard;

class PollingController extends Controller {

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
        $data['title'] = 'Data Polling';
        return view('backend.polling.index', $data);
    }

    public function apiPolling() {
        $data = Polling::all();
        return response()->json($data);
    }

    public function apiCreatePolling() {
        $data = Polling::DropdownPoll();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
        $data['title'] = 'Tambah Polling';
        return View('backend.polling.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PollingRequest $request) {
        //
        $input = $request->all();
        $polling = new Polling($input);
        if ($input['status'] == 'Y') {
            Polling::where('status', '=', 'Y')->update(['status' => 'N']);
        }
        if ($polling->save()) {
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
        $data = Polling::find($id);
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
        $data['title'] = 'Edit Polling';
        $data['data'] = Polling::find($id);
        return view('backend.polling.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(PollingRequest $request, $id) {
        //
        $input = $request->all();
        $polling = Polling::find($id);
        if ($input['status'] == 'Y') {
            Polling::where('status', '=', 'Y')->update(['status' => 'N']);
        }
        if ($polling->update($input)) {
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
        $polling = Polling::find($id);
        if ($polling->delete()) {
            return response()->json(array('success' => TRUE));
        }
    }

}
