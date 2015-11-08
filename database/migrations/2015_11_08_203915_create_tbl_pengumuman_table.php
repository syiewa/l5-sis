<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblPengumumanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_pengumuman', function(Blueprint $table)
		{
			$table->integer('id_pengumuman', true);
			$table->string('judul_pengumuman', 200);
			$table->text('isi', 65535);
			$table->date('tanggal');
			$table->string('penulis', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_pengumuman');
	}

}
