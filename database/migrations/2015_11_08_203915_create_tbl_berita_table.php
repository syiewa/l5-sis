<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblBeritaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_berita', function(Blueprint $table)
		{
			$table->integer('id_berita', true);
			$table->string('judul_berita', 100);
			$table->text('isi', 65535);
			$table->string('gambar', 100);
			$table->date('tanggal');
			$table->time('waktu');
			$table->string('author', 20);
			$table->integer('counter');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_berita');
	}

}
