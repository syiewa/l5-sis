<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblGambarTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_gambar', function(Blueprint $table)
		{
			$table->integer('id_file', true);
			$table->string('title', 100);
			$table->string('image_description', 100);
			$table->string('image_url', 100);
			$table->string('file_type', 10);
			$table->string('image_size', 20);
			$table->date('uploaded_date');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_gambar');
	}

}
