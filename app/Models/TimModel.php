<?php

namespace App\Models;

use CodeIgniter\Model;

class TimModel extends Model
{
    protected $table = "tim";
    protected $primaryKey = "id_tim";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['foto', 'nama', 'jabatan'];

    public function getData()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tim')->orderBy("id_tim", "desc");
        $query = $builder->get();
        return $query->getResult();
    }

    public function getNoSematData()
    {
        $db      = \Config\Database::connect();
        $subQuery = $db->table('semat_tim')->select('id_anggota_tim');
        $builder = $db->table('tim')->whereNotIn('id_tim', $subQuery);
        $query = $builder->orderBy("id_tim", "desc")->get();
        return $query->getResult();
    }

    public function deleteData()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tim');
        $db->table('semat_tim')->emptyTable();
        $builder->emptyTable();
    }
}
