<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table = 'infosklh';
    protected $primaryKey = 'id_info';
    protected $useTimestamps = true;
    protected $allowedFields = ['title_info', 'link_info', 'isi_info', 'dokumen_info'];

    public function getBerita($id = false)
    {
        if($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_info' => $id])->first();
    }
    // public function getTitle($title = false)
    // {
    //     if($title == false) {
    //         return $this->findAll();
    //     }

    //     return $this->where(['title_info' => $title])->first();
    // }
    
}