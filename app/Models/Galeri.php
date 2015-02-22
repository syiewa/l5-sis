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
        return $this->hasMany('App\Models\Foto','id_album');
    }

    public function scopeDropdownGaleri($query) {
        $data = array();
        $eselon = $query->select(array('id_album', 'nama_album'))->get();
        if (count($eselon) > 0) {
            foreach ($eselon as $ese) {
                $data[] = array('id' => $ese->id_album, 'label' => $ese->nama_album);
            }
        }
        return $data;
    }

}
