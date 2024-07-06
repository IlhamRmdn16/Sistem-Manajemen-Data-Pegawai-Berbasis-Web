<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BukuSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul' => 'Belajar CodeIgniter 4',
                'pengarang' => 'John Doe',
                'penerbit' => 'Gramedia',
                'tahun_terbit' => '2021',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'judul' => 'Pemrograman Web dengan PHP',
                'pengarang' => 'Jane Smith',
                'penerbit' => 'Erlangga',
                'tahun_terbit' => '2020',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'judul' => 'Framework Laravel untuk Pemula',
                'pengarang' => 'Michael Brown',
                'penerbit' => 'Bentang Pustaka',
                'tahun_terbit' => '2019',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];

        $this->db->table('buku')->insertBatch($data);
    }
}
