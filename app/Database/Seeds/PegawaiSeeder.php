<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        $data = [
			[
				'nama'          =>  'Ilham',
				'jenis_kelamin' =>  'pria',
				'no_telp'       =>  '082116957457',
				'email'         =>  'ilham@gmail.com',
				'alamat'	=>  'Karangpawitan',
				'created_at' => Time::now()
			],
			[
				'nama'          =>  'Heri',
				'jenis_kelamin' =>  'pria',
				'no_telp'       =>  '08571234567',
				'email'         =>  'heri@gmail.com',
				'alamat'	=>  'Cibatu',
				'created_at' => Time::now()
			],
			[
				'nama'          =>  'Ahmad',
				'jenis_kelamin' =>  'wanita',
				'no_telp'       =>  '08122334465',
				'email'         =>  'ahmad@gmail.com',
				'alamat'	=>  'Cikelet',
				'created_at' => Time::now()
			]
		];
		$this->db->table('pegawai')->insertBatch($data);
    }
}
