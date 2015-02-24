<?php

namespace App\Http\Controllers;

use Illuminate\Cookie\CookieJar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use Illuminate\Support\Facades\DB;

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

    public function tambahpoll(CookieJar $cookieJar, Request $request) {
        $input = $request->except('_token');
        $update = Models\Jawaban::where('id_soal_poll', $input['id_soal_poll'])->where('jawaban', $input['jawaban'])->first();
        $update->counter = $update->counter + 1;
        $update->update();
        $cookieJar->queue(cookie('polling', 'sudah', 45000));
        return redirect()->to('lihatpoll');
    }

    public function polling() {
        $this->data['polling'] = Models\Polling::with('jawaban')->where('status', 'Y')->first();
        $this->data['total_data'] = $this->data['polling']->jawaban->sum('counter') / 100;
        return view('front.lihatpoll', $this->data);
    }

    public function halaman($id) {
        switch ($id) {
            case 3.4: return $this->dataguru();
            case 3.5: return $this->datapegawai();
            case 4.1: return $this->datasiswa();
            case 5.1: return $this->absensi();
        }
        $this->data['page'] = Models\Data::with('menu')->where('data_id', $id)->first();
        $this->data['title'] = $this->data['page'] ? $this->data['page']->menu->title : 'Page Tidak Ditekemukan';
        return view('front.post', $this->data);
    }

    public function absensi() {
        $this->data['title'] = 'Absensi';
        return view('front.absensi', $this->data);
    }

    public function showabsensi(Request $request) {
        $input = $request->all();
        $siswa = Models\Absensi::getAbsen($input['kelas'],$input['bulan'],$input['tahun']);
        return response()->json($siswa);
    }

    public function datasiswa() {
        $this->data['title'] = 'Data Siswa';
        return view('front.datasiswa', $this->data);
    }

    public function ambilsiswa($id) {
        $siswa = Models\Siswa::where('id_kelas', $id)->get();
        return response()->json($siswa);
    }

    public function dataguru() {
        $this->data['guru'] = Models\Pegawai::where('status', 'guru')->paginate(15);
        $this->data['title'] = 'Data Guru';
        return view('front.dataguru', $this->data);
    }

    public function datapegawai() {
        $this->data['guru'] = Models\Pegawai::where('status', 'pegawai')->paginate(15);
        $this->data['title'] = 'Data Pegawai';
        return view('front.datapegawai', $this->data);
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

    public function pengumuman($id) {
        $this->data['title'] = 'Pengumuman';
        $this->data['pengumumanlist'] = Models\Pengumuman::find($id);
        return view('front.pengumuman', $this->data);
    }

    public function agendalist() {
        $this->data['title'] = 'Agenda';
        $this->data['agendalist'] = Models\Agenda::orderBy('tgl_posting', 'desc')->paginate(5);
        return view('front.agendalist', $this->data);
    }

    public function agenda($id) {
        $this->data['title'] = 'Agenda';
        $this->data['agendalist'] = Models\Agenda::find($id);
        return view('front.agenda', $this->data);
    }

    public function album() {
        $this->data['title'] = 'Album Sekolah';
        $this->data['album'] = Models\Galeri::all();
        return view('front.album', $this->data);
    }

    public function foto($id) {
        $this->data['title'] = 'Album Sekolah';
        $album = Models\Galeri::find($id);
        $this->data['foto'] = $album->foto;
        return view('front.foto', $this->data);
    }

    public function download() {
        $this->data['title'] = 'Download File';
        $this->data['download'] = Models\Upload::orderBy('tgl_posting')->paginate(10);
        return view('front.download', $this->data);
    }

}
