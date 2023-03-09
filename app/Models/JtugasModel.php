<?php

namespace App\Models;

use CodeIgniter\Model;

class JtugasModel extends Model
{
    protected $table = 'jtugas';
    protected $primaryKey = 'id_jtugas';
    protected $useTimestamps = true;
    protected $allowedFields = ['hari_jtugas', 'mapel1_jtugas', 'nmguru1_jtugas', 'mapel2_jtugas', 'nmguru2_jtugas', 'mapel3_jtugas', 'nmguru3_jtugas', 'mapel4_jtugas', 'nmguru4_jtugas'];

    public function getJtugas($id = false)
    {
        if($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_jtugas' => $id])->first();
    }
    // public function getTitle($title = false)
    // {
    //     if($title == false) {
    //         return $this->findAll();
    //     }

    //     return $this->where(['title_info' => $title])->first();
    // }
    
}