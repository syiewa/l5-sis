<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblSoalpollingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_soalpolling', function(Blueprint $table)
		{
			$table->integer('id_soal_poll', true);
			$table->text('soal_poll', 65535);
			$table->char('status', 1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_soalpolling');
	}

}
