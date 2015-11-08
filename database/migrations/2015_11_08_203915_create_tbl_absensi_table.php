<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblAbsensiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_absensi', function(Blueprint $table)
		{
			$table->integer('id_absensi', true);
			$table->integer('id_siswa');
			$table->integer('id_kelas');
			$table->char('absen', 3);
			$table->integer('tanggal');
			$table->integer('bulan');
			$table->integer('tahun');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_absensi');
	}

}
