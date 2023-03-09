<?php

namespace App\Models;

use CodeIgniter\Model;

class JpasModel extends Model
{
    protected $table = 'jpas';
    protected $primaryKey = 'id_jpas';
    protected $useTimestamps = true;
    protected $allowedFields = ['hari_jpas', 'tanggal_jpas', 'mapel1_jpas', 'jam1_jpas', 'mapel2_jpas', 'jam2_jpas', 'mapel3_jpas', 'jam3_jpas'];

    public function getJpas($id = false)
    {
        if($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_jpas' => $id])->first();
    }
    // public function getTitle($title = false)
    // {
    //     if($title == false) {
    //         return $this->findAll();
    //     }

    //     return $this->where(['title_info' => $title])->first();
    // }
    
}