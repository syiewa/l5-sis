<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblPesanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_pesan', function(Blueprint $table)
		{
			$table->integer('id_pesan', true);
			$table->string('nama', 100);
			$table->string('email', 150);
			$table->text('pesan', 65535);
			$table->char('status', 1)->default('N');
			$table->dateTime('tgl_posting');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_pesan');
	}

}
