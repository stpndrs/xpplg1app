<?php

namespace App\Models;

use CodeIgniter\Model;

class DashtodoModel extends Model
{
    protected $table = 'dashboard_todo';
    protected $primaryKey = 'id_todo';
    protected $allowedFields = ['title_todo', 'deadline_todo'];

    public function getTodo($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_todo' => $id])->first();
    }
}
