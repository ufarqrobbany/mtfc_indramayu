<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarBeritaModel extends Model
{
    protected $table = "komentar_berita";
    protected $primaryKey = "id_komentar";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['nama', 'foto', 'komentar', 'waktu', 'id_berita', 'dilihat'];

    public function getData()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('komentar_berita')->select('*')->join('berita', 'berita.id_berita = komentar_berita.id_berita')->orderBy("waktu", "desc");
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

    public function getDataIDKomen($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('komentar_berita')->select('*')->join('berita', 'berita.id_berita = komentar_berita.id_berita')->where('komentar_berita.id_komentar', $id)->orderBy("waktu", "desc");
        $query = $builder->get();
        return $query->getResult();
    }

    public function deleteDataByKomen($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('komentar_berita')->where('komentar_berita.id_berita', $id);
        $db->table('subkomentar_berita')->where('subkomentar_berita.id_berita', $id)->delete();
        $builder->delete();
    }
}
