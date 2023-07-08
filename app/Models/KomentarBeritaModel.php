<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarBeritaModel extends Model
{
    protected $table = "komentar_berita";
    protected $primaryKey = "id_komentar";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['nama', 'foto', 'komentar', 'waktu', 'id_berita'];

    public function getData()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('komentar_berita')->select('*')->join('berita', 'berita.id_berita = komentar_berita.id_berita');
        // $query = $builder->get();
        // return $query->getResult();
        return $builder;
    }

    public function getDataID($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('komentar_berita')->select('*')->join('berita', 'berita.id_berita = komentar_berita.id_berita')->where('komentar_berita.id_berita', $id)->orderBy("waktu", "desc");
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
