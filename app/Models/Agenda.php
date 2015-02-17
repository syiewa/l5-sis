<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model {

    //
    protected $table = 'tbl_agenda';
    protected $primaryKey = 'id_agenda';
    protected $fillable = array('tema_agenda', 'isi', 'tgl_mulai', 'tgl_selesai', 'tgl_posting', 'tempat', 'jam','keterangan');
    public $timestamps = false;

}
