<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = "admin";
    protected $primaryKey = "id_admin";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'kata_sandi', 'nama'];
}
