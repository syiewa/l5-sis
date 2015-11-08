<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblAgendaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_agenda', function(Blueprint $table)
		{
			$table->integer('id_agenda', true);
			$table->string('tema_agenda', 200);
			$table->text('isi', 65535);
			$table->date('tgl_mulai');
			$table->date('tgl_selesai');
			$table->date('tgl_posting');
			$table->string('tempat', 150);
			$table->string('jam', 50);
			$table->text('keterangan');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_agenda');
	}

}
