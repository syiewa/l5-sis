<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pegawai extends Model {

    //
    protected $table = 'tbl_kepegawaian';
    protected $primaryKey = 'id_kepegawaian';
    protected $fillable = ['nip', 'nama_pegawai', 'kelahiran', 'matpel', 'jk', 'status', 'username', 'password'];
    protected $hidden = ['password'];
    public $timestamps = false;

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}
