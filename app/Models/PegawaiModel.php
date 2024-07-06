<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table = "pegawai";
    protected $primaryKey = "id_pegawai";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['id_pegawai', 'nama', 'jenis_kelamin', 'no_telp', 'email', 'alamat'];

    public function search($keyword)
    {
        // $builder = $this->table('pegawai');
        // $builder->like('nama', $keyword);
        // return $builder;

        return $this->table('pegawai')->like('nama', $keyword);
    }
}