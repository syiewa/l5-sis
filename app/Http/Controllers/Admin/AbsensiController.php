<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AbsensiRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Absensi;
use App\Models\Siswa;

class AbsensiController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
        $data['title'] = 'Menu Absensi';
        return view('backend.absensi.index', $data);
    }

    public function apiAbsensi() {
        $data = Absensi::all();
        return response()->json($data);
    }

    public function apiCreateAbsensi() {
        $data = Absensi::DropdownAbsensi();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(AbsensiRequest $request) {
        //
        $data['tanggal'] = $request->get('tanggal');
        $data['bulan'] = $request->get('bulan');
        $data['tahun'] = $request->get('tahun');
        $data['fulltanggal'] = date('d F Y', strtotime($data['tanggal'] . '-' . $data['bulan'] . '-' . $data['tahun']));
        $data['siswa'] = Siswa::with('kelas')->where('id_kelas', '=', $request->get('kelas'))->orderBy('nis')->get();
        $data['title'] = 'Tambah Absensi';
        return View('backend.absensi.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(AbsensiRequest $request) {
        //
        $input = $request->except('_token', 'kelas', 'tanggal', 'bulan', 'tahun');
        $kelas = $request->get('kelas');
        $absensi = new Absensi();
        foreach ($input as $key => $val) {
            dd($val);
            $implode = explode('-', $key);
            $siswa = $implode[1];
            $absensi->id_siswa = $siswa;
            $absensi->id_kelas = $kelas;
            $absensi->tanggal = $request->get("tanggal");
            $absensi->bulan = $request->get('bulan');
            $absensi->tahun = $request->get('tahun');
            $absensi->absen = 
            $absensi->save();
        }
        return redirect(route('admin.absensi.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(AbsensiRequest $request) {
        //
        $input = $request->except('_token');
        $data['title'] = 'Lihat Absensi';
        $data['fulltanggal'] = date('d F Y', strtotime($input['tanggal'] . '-' . $input['bulan'] . '-' . $input['tahun']));
        $data['siswa'] = Siswa::with(['absensi' => function($query) use ($input) {
                $query->where('tanggal', '=', $input['tanggal'])
                        ->where('bulan', '=', $input['bulan'])
                        ->where('tahun', '=', $input['tahun']);
            }])->where('id_kelas', '=', $input['kelas'])->get();
        return View('backend.absensi.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
        $data['title'] = 'Edit Absensi';
        $data['data'] = Absensi::find($id);
        return view('backend.absensi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(AbsensiRequest $request, $id) {
        //
        $input = $request->all();
        $absensi = Absensi::find($id);
        if ($absensi->update($input)) {
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
        $absensi = Absensi::find($id);
        if ($absensi->delete()) {
            return response()->json(array('success' => TRUE));
        }
    }

}
