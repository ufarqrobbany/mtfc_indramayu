<?php

namespace App\Models;

use CodeIgniter\Model;

class PesanModel extends Model
{
    protected $table = "pesan";
    protected $primaryKey = "id_pesan";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['nama', 'email', 'subjek', 'pesan', 'waktu', 'dilihat'];

    public function getData()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pesan')->orderBy("id_pesan", "desc");
        $query = $builder->get();
        return $query->getResult();
    }

    public function getDataBelumDilihat()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pesan')->where("dilihat", false);
        $query = $builder->get();
        return $query->getResult();
    }

    public function deleteData()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pesan');
        $builder->emptyTable();
    }
}
