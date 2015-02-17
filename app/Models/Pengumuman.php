<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model {

    //
    protected $table = 'tbl_pengumuman';
    protected $primaryKey = 'id_pengumuman';
    protected $fillable = array('judul_pengumuman', 'isi','tanggal', 'penulis');
    public $timestamps = false;

}
