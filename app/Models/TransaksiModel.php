<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'oleh_transaksi', 
        'tanggal_transaksi', 
        'jenisbrg_transaksi', 
        'jenis_transaksi', 
        'jumlah_transaksi',
        'uraian_transaksi', 
        'buktibrg_transaksi', 
        'buktinota_transaksi'
    ];

    public function getTransaksi($id = false)
    {
        if($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_transaksi' => $id])->first();
    }
    
}