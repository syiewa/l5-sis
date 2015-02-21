<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

    //
    protected $table = 'tbl_menu';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function datas() {
        return $this->hasMany('App\Models\Data', 'data_id');
    }
    public function child(){
        return $this->hasMany('App\Models\Menu','id_parent','id');
    }

    public function scopeDropdownMenu($query) {
        $data = array();
        $eselon = $query->select(array('id', 'title'))->has('datas')->get();
        if (count($eselon) > 0) {
            foreach ($eselon as $ese) {
                $data[] = array('id' => $ese->id, 'label' => $ese->id.' - '.$ese->title);
            }
        }
        return $data;
    }

}
