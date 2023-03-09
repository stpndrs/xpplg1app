<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $table = 'home';
    protected $primaryKey = 'id_home';
    protected $useTimestamps = true;
    protected $allowedFields = ['carousel_home', 'pengantar_home'];

    public function getHome($id = false)
    {
        if($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_home' => $id])->first();
    }
    
}