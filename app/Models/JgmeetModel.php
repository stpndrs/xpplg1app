<?php

namespace App\Models;

use CodeIgniter\Model;

class JgmeetModel extends Model
{
    protected $table = 'jgmeet';
    protected $primaryKey = 'id_jgmeet';
    protected $useTimestamps = true;
    protected $allowedFields = ['hari_jgmeet', 'seragam_jgmeet', 'seragamper_jgmeet', 'mapel1_jgmeet', 'nmguru1_jgmeet', 'mapel2_jgmeet', 'nmguru2_jgmeet', 'mapel3_jgmeet', 'nmguru3_jgmeet', 'mapel4_jgmeet', 'nmguru4_jgmeet', 'link_gmeet'];

    public function getJgmeet($id = false)
    {
        if($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_jgmeet' => $id])->first();
    }
    // public function getTitle($title = false)
    // {
    //     if($title == false) {
    //         return $this->findAll();
    //     }

    //     return $this->where(['title_info' => $title])->first();
    // }
    
}