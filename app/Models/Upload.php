<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model {

	//
    protected $table = 'tbl_download';
    protected $primaryKey = 'id_download';
    protected $fillable = ['judul_file','nama_file','tanggal','author'];
    public $timestamps = false;

}
