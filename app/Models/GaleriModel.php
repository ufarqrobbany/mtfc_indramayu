<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
    protected $table = "galeri";
    protected $primaryKey = "id_galeri";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['foto', 'keterangan', 'tgl_upload'];

    public function getData()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('galeri')->orderBy("id_galeri", "desc");
        $query = $builder->get();
        return $query->getResult();
    }

    public function deleteData()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('galeri');
        $builder->emptyTable();
    }
}
