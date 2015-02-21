<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;

class FrontController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct() {
        $this->data['menu'] = Models\Menu::with('child')->where('level', 0)->get();
        $this->data['berita'] = Models\Berita::orderBy('tanggal', 'desc')->limit(4)->get();
        $this->data['pengumuman'] = Models\Pengumuman::orderBy('tanggal', 'desc')->limit(5)->get();
        $this->data['agenda'] = Models\Agenda::orderBy('tgl_posting', 'desc')->limit(5)->get();
        $this->data['polling'] = Models\Polling::with('jawaban')->where('status', 'Y')->limit(1)->first();
    }

    public function index() {
        //
        return view('front.home', $this->data);
    }

    public function polling() {
        $this->data['polling'] = Models\Polling::with('jawaban')->where('status', 'Y')->first();
        $this->data['total_data'] = $this->data['polling']->jawaban->sum('counter') / 100;
        return view('front.lihatpoll', $this->data);
    }

    public function halaman($id) {
        $this->data['page'] = Models\Data::with('menu')->where('data_id', $id)->first();
        return view('front.post', $this->data);
    }

    public function beritalist() {
        $this->data['title'] = 'Berita';
        $this->data['beritalist'] = Models\Berita::orderBy('tanggal', 'desc')->paginate(5);
        return view('front.beritalist', $this->data);
    }

    public function berita($id) {
        $this->data['title'] = 'Berita';
        $this->data['beritalist'] = Models\Berita::find($id);
        return view('front.berita', $this->data);
    }

    public function pengumumanlist() {
        $this->data['title'] = 'Pengumuman';
        $this->data['pengumumanlist'] = Models\Pengumuman::orderBy('tanggal', 'desc')->paginate(5);
        return view('front.pengumumanlist', $this->data);
    }
    
    public function pengumuman($id){
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
