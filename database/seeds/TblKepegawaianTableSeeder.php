<?php

use Illuminate\Database\Seeder;
use App\User;

class TblKepegawaianTableSeeder extends Seeder {

	public function run()
	{
		// User::truncate();
		User::create([

			'nip' => '123453539',
			'nama_pegawai' => 'Admin',
			'kelahiran' => 'Jakarta, 17 Agustus 1945',
			'matpel' => 'TIK',
			'jk' => 'L',
			'status' => 'admin',
			'username' => 'admin',
			'password' => Hash::make( 'password' ),

		]);

	}

}
