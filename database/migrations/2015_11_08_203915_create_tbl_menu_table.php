<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_menu', function(Blueprint $table)
		{
			$table->char('id', 10)->primary();
			$table->string('title', 50);
			$table->char('id_parent', 10);
			$table->integer('level');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_menu');
	}

}
