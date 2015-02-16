<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model {

    //
    protected $table = 'tbl_data';
    protected $primaryKey = 'id_data';
    protected $fillable = array('content', 'data_id');
    public $timestamps = false;

    public function menu() {
        return $this->belongsTo('App\Menu', 'data_id');
    }

}
