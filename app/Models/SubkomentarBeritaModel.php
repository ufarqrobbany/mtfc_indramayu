<?php

namespace App\Models;

use CodeIgniter\Model;

class SubkomentarBeritaModel extends Model
{
    protected $table = "subkomentar_berita";
    protected $primaryKey = "id_subkomentar";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['nama', 'foto', 'komentar', 'waktu', 'id_komentar', 'id_berita'];

    public function getData()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('subkomentar_berita')->orderBy("waktu", "asc");
        $query = $builder->get();
        return $query->getResult();
    }

    public function getDataBerita($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('subkomentar_berita')->select('subkomentar_berita.*')->join('berita', 'berita.id_berita = subkomentar_berita.id_berita')->where('subkomentar_berita.id_berita', $id)->orderBy("waktu", "asc");
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
