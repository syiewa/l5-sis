<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model {

    //
    protected $table = 'tbl_absensi';
    protected $primaryKey = 'id_absensi';
    protected $fillable = array('id_siswa', 'id_kelas', 'absen', 'tanggal', 'bulan', 'tahun');
    public $timestamps = false;

    public function kelas() {
        return $this->belongsTo('App\Models\Kelas', 'id_kelas');
    }

    public function siswa() {
        return $this->belongsTo('App\Models\Siswa', 'id_siswa');
    }

    public function scopeGetAbsen($query, $kelas, $bulan, $tahun) {
        $kampret = DB::select(DB::raw(
                                "SELECT s.`nama_siswa` , s.`nis` , 
                        IFNULL(h.hadir,0) AS hadir,
                        IFNULL(sk.sakit,0) AS sakit,
                        IFNULL(i.ijin,0) AS ijin, 
                        IFNULL(a.alpha,0) AS alpha, 
                        IFNULL(b.bolos,0) AS bolos,
                        IFNULL(d.dispen,0) AS dispen,
                        IFNULL(skr.skorsing,0) AS skorsing, 
                        IFNULL(t.total,0) AS total
                        FROM tbl_siswa s
                        LEFT JOIN
                        (
                            SELECT id_siswa	, COUNT(absen) AS hadir  FROM tbl_absensi
                            WHERE absen = 'H' AND tahun = ".$tahun." AND bulan = ".$bulan."
                            GROUP BY id_siswa
                        ) AS h ON h.id_siswa = s.id_siswa
                        LEFT JOIN
                        (
                            SELECT id_siswa	, COUNT(absen) AS alpha  FROM tbl_absensi
                            WHERE absen = 'A' AND tahun = ".$tahun." AND bulan = ".$bulan."
                            GROUP BY id_siswa
                        ) AS a ON a.id_siswa = s.id_siswa
                        LEFT JOIN
                        (
                            SELECT id_siswa	, COUNT(absen) AS sakit  FROM tbl_absensi
                            WHERE absen = 'S' AND tahun = ".$tahun." AND bulan = ".$bulan."
                            GROUP BY id_siswa
                        ) AS sk ON sk.id_siswa = s.id_siswa
                        LEFT JOIN
                        (
                            SELECT id_siswa	, COUNT(absen) AS ijin  FROM tbl_absensi
                            WHERE absen = 'I' AND tahun = ".$tahun." AND bulan = ".$bulan."
                            GROUP BY id_siswa
                        ) AS i ON i.id_siswa = s.id_siswa
                        LEFT JOIN
                        (
                            SELECT id_siswa	, COUNT(absen) AS bolos  FROM tbl_absensi
                            WHERE absen = 'B' AND tahun = ".$tahun." AND bulan = ".$bulan."
                            GROUP BY id_siswa
                        ) AS b ON b.id_siswa = s.id_siswa
                        LEFT JOIN
                        (
                            SELECT id_siswa	, COUNT(absen) AS dispen  FROM tbl_absensi
                            WHERE absen = 'D' AND tahun = ".$tahun." AND bulan = ".$bulan."
                            GROUP BY id_siswa
                        ) AS d ON d.id_siswa = s.id_siswa
                        LEFT JOIN
                        (
                            SELECT id_siswa	, COUNT(absen) AS skorsing  FROM tbl_absensi
                            WHERE absen = 'SK' AND tahun = ".$tahun." AND bulan = ".$bulan."
                            GROUP BY id_siswa
                        ) AS skr ON skr.id_siswa = s.id_siswa
                        LEFT JOIN
                        (
                            SELECT id_siswa	, COUNT(absen) AS total  FROM tbl_absensi
                            WHERE  tahun = ".$tahun." AND bulan = ".$bulan."
                            GROUP BY id_siswa
                        ) AS t ON t.id_siswa = s.id_siswa
                        WHERE id_kelas=".$kelas
                
        ));
        return $kampret;
    }

}
