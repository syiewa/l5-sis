<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model {

    //
    protected $table = 'tbl_album_galeri';
    protected $primaryKey = 'id_album';
    protected $fillable = array('nama_album');
    public $timestamps = false;

    public function foto() {
        return $this->hasMany('App\Models\Foto');
    }

}
