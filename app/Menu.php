<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

    //
    protected $table = 'tbl_menu';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function datas() {
        return $this->hasMany('App\Data','data_id');
    }

}
