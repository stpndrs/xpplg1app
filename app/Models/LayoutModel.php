<?php

namespace App\Models;

use CodeIgniter\Model;

class LayoutModel extends Model
{
    protected $table = 'layout';
    protected $primaryKey = 'id_layout';
    protected $useTimestamps = true;
    protected $allowedFields = ['icon_layout', 'col1_footer', 'col2_footer', 'col3_footer'];

    public function getLayout($id = false)
    {
        if($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_layout' => $id])->first();
    }
    // public function getTitle($title = false)
    // {
    //     if($title == false) {
    //         return $this->findAll();
    //     }

    //     return $this->where(['title_projects' => $title])->first();
    // }
    
}