<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model {

	//
        protected $table = 'tbl_berita';
        protected $primaryKey = 'id_berita';
        protected $fillable = array('judul_berita','isi','gambar','tanggal','waktu','author','counter');
        public $timestamps = false;

}
