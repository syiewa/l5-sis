<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblSiswaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_siswa', function(Blueprint $table)
		{
			$table->integer('id_siswa', true);
			$table->integer('id_kelas');
			$table->integer('nis');
			$table->string('nama_siswa', 150);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_siswa');
	}

}
