<?php

namespace App\Models;

use CodeIgniter\Model;

class JpiketModel extends Model
{
    protected $table = 'jpiket';
    protected $primaryKey = 'id_jpiket';
    protected $allowedFields = ['hari_jpiket', 'tanggal_jpiket', 'nama1_jpiket', 'nama2_jpiket', 'nama3_jpiket', 'nama4_jpiket', 'nama5_jpiket', 'nama6_jpiket', 'nama7_jpiket'];

    public function getJpik($id = false)
    {
        if($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_jpiket' => $id])->first();
    }
    // public function getTitle($title = false)
    // {
    //     if($title == false) {
    //         return $this->findAll();
    //     }

    //     return $this->where(['title_info' => $title])->first();
    // }
    
}