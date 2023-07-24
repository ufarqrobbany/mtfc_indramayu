<?php

namespace App\Models;

use CodeIgniter\Model;

class TentangModel extends Model
{
    protected $table = "tentang";
    protected $primaryKey = "id_tentang";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['tentang', 'footer'];

    public function deleteData()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tentang');
        $builder->emptyTable();
    }
}
