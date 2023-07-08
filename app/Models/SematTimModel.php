<?php

namespace App\Models;

use CodeIgniter\Model;

class SematTimModel extends Model
{
    protected $table = "semat_tim";
    protected $primaryKey = "id_semat_tim";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['urutan', 'id_anggota_tim'];

    public function getData()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('semat_tim')->select('*')->join('tim', 'tim.id_tim = semat_tim.id_anggota_tim')->orderBy("urutan", "asc");
        $query = $builder->get();
        return $query->getResult();
    }

    public function getDataID()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('semat_tim')->select('id_anggota_tim')->join('tim', 'tim.id_tim = semat_tim.id_anggota_tim')->orderBy("urutan", "asc");
        $query = $builder->get();
        return $query->getResult();
    }

    public function saveData($data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('semat_tim')->select('*')->join('tim', 'tim.id_tim = semat_tim.id_anggota_tim');
        $query = $builder->insertBatch($data);
        return $query;
    }

    public function deleteData()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('semat_tim');
        $builder->emptyTable();
    }
}
