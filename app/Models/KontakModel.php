<?php

namespace App\Models;

use CodeIgniter\Model;

class KontakModel extends Model
{
    protected $table = "kontak";
    protected $primaryKey = "id_kontak";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['telepon', 'email', 'fb_url', 'ig_url', 'alamat', 'embed_map'];

    public function deleteData()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('kontak');
        $builder->emptyTable();
    }
}
