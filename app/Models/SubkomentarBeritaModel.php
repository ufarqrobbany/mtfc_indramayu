<?php

namespace App\Models;

use CodeIgniter\Model;

class SubkomentarBeritaModel extends Model
{
    protected $table = "subkomentar_berita";
    protected $primaryKey = "id_subkomentar";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['nama', 'foto', 'komentar', 'waktu', 'id_komentar'];

    public function getData()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('berita')->orderBy("tgl_dibuat", "desc");
        $query = $builder->get();
        return $query->getResult();
    }

    public function getDataID($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('subkomentar_berita')->select('*')->join('komentar_berita', 'komentar_berita.id_komentar = subkomentar_berita.id_komentar')->where('subkomentar_berita.id_komentar', $id)->orderBy("waktu", "asc");
        $query = $builder->get();
        return $query->getResult();
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
