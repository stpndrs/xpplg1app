<?php

namespace App\Models;

use CodeIgniter\Model;

class UangKasModel extends Model
{
    protected $table = 'uangkas';
    protected $primaryKey = 'id_pembayaran';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_siswa', 'tanggal_pembayaran', 'nama_pembayaran', 'absen_siswa', 'jumlah_pembayaran', 'minggu1_pembayaran', 'minggu2_pembayaran', 'minggu3_pembayaran', 'minggu4_pembayaran', 'keterangan_pembayaran'];

    public function getUangKas($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_pembayaran' => $id])->first();
    }

    public function search($keyword)
    {
        return $this->table('uangkas')->like('nama_pembayaran', $keyword)->orLike('tanggal_pembayaran', $keyword)->orLike('jumlah_pembayaran', $keyword)->orLike('absen_siswa', $keyword)->orLike('keterangan_pembayaran', $keyword);
    }
}
