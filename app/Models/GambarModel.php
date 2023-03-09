<?php

namespace App\Models;

use CodeIgniter\Model;

class GambarModel extends Model
{
    protected $table = 'tb_gambar';
    protected $primaryKey = 'id';
    protected $allowedFields = ['post_id', 'gambar'];

    public function getGambar($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['post_id' => $id])->findAll();
    }
}
