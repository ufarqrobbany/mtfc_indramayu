<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table = "berita";
    protected $primaryKey = "id_berita";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['judul', 'thumbnail', 'isi', 'tgl_dibuat', 'tgl_diupdate', 'slug'];

    public function getData()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('berita')->orderBy("tgl_dibuat", "desc");
        $query = $builder->get();
        return $query->getResult();
    }

    public function getDataBySlug($slug)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('berita')->where('slug', $slug);
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
