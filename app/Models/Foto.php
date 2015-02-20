<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model {

    //
    protected $table = 'tbl_galeri';
    protected $primaryKey = 'id_foto';
    protected $fillable = array('id_album', 'foto_kecil', 'foto_besar');
    public $timestamps = false;
    
    public function galeri(){
        return $this->belongsTo('App\Models\Galeri','id_album');
    }

}
