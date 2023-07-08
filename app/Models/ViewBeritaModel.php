<?php

namespace App\Models;

use CodeIgniter\Model;

class ViewBeritaModel extends Model
{
    protected $table = "view_berita";
    protected $primaryKey = "id_view";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['waktu', 'id_berita'];

    public function getData()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('view_berita')->select('*')->join('berita', 'berita.id_berita = view_berita.id_berita');
        // $query = $builder->get();
        // return $query->getResult();
        return $builder;
    }

    public function deleteData()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('berita');
        $db->table('komentar_berita')->emptyTable();
        $db->table('subkomentar_berita')->emptyTable();
        $db->table('view_berita')->emptyTable();
        $builder->emptyTable();
    }
}
