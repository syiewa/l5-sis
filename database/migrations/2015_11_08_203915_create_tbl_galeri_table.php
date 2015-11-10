<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblGaleriTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_galeri', function(Blueprint $table)
		{
			$table->integer('id_foto', true);
			$table->integer('id_album');
			$table->string('foto_kecil', 100);
			$table->string('foto_besar', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_galeri');
	}

}
