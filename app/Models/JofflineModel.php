<?php

namespace App\Models;

use CodeIgniter\Model;

class JofflineModel extends Model
{
    protected $table = 'joffline';
    protected $primaryKey = 'id_joffline';
    // protected $useTimestamps = true;
    protected $allowedFields = [
        'hari_joffline',
        'jam_mapel_0_joffline',
        'jam_mapel_1_joffline',
        'jam_mapel_2_joffline',
        'jam_mapel_3_joffline',
        'jam_mapel_4_joffline',
        'jam_mapel_5_joffline',
        'jam_mapel_6_joffline',
        'jam_mapel_7_joffline',
        'jam_mapel_8_joffline',
        'jam_mapel_9_joffline',
        'jam_mapel_10_joffline',
        'jam_mapel_11_joffline',
        'jam_mapel_12_joffline',
        'waktu_0_joffline',
        'waktu_1_joffline',
        'waktu_2_joffline',
        'waktu_3_joffline',
        'waktu_4_joffline',
        'waktu_5_joffline',
        'waktu_6_joffline',
        'waktu_7_joffline',
        'waktu_8_joffline',
        'waktu_9_joffline',
        'waktu_10_joffline',
        'waktu_11_joffline',
        'waktu_12_joffline',
        'mapel_0_joffline',
        'mapel_1_joffline',
        'mapel_2_joffline',
        'mapel_3_joffline',
        'mapel_4_joffline',
        'mapel_5_joffline',
        'mapel_6_joffline',
        'mapel_7_joffline',
        'mapel_8_joffline',
        'mapel_9_joffline',
        'mapel_10_joffline',
        'mapel_11_joffline',
        'mapel_12_joffline',
        'namaguru_0_joffline',
        'namaguru_1_joffline',
        'namaguru_2_joffline',
        'namaguru_3_joffline',
        'namaguru_4_joffline',
        'namaguru_5_joffline',
        'namaguru_6_joffline',
        'namaguru_7_joffline',
        'namaguru_8_joffline',
        'namaguru_9_joffline',
        'namaguru_10_joffline',
        'namaguru_11_joffline',
        'namaguru_12_joffline'
    ];

    public function getJoffline($id = false)
    {
        if($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_joffline' => $id])->first();
    }
}