<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfigModel extends Model
{
    protected $table = 'configstatus';
    protected $primaryKey = 'nama_config';
    // protected $useAutoIncrement = false;
    protected $allowedFields = ['nama_config', 'value'];
    
}