<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblDownloadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_download', function(Blueprint $table)
		{
			$table->integer('id_download', true);
			$table->string('judul_file', 200);
			$table->string('nama_file', 200);
			$table->date('tgl_posting');
			$table->string('author', 20);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_download');
	}

}
