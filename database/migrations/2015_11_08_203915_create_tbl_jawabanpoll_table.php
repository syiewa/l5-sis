<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblJawabanpollTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_jawabanpoll', function(Blueprint $table)
		{
			$table->integer('id_jawaban_poll', true);
			$table->integer('id_soal_poll');
			$table->string('jawaban', 100);
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
		Schema::drop('tbl_jawabanpoll');
	}

}
