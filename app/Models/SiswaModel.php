<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $useTimestamps = true;
    protected $allowedFields = ['foto_siswa', 'nama_siswa', 'nisn_siswa', 'absen_siswa', 'ins_siswa'];

    public function getSiswa($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_siswa' => $id])->first();
    }

    public function search($keyword)
    {
        return $this->table('siswa')->like('absen_siswa', $keyword)->orLike('foto_siswa', $keyword)->orLike('nama_siswa', $keyword)->orLike('ins_siswa', $keyword)->orLike('desk_siswa', $keyword);
    }

    public function filter_all($blnawal, $blnakhir)
    {
        $blnawal = $this->db->escape($blnawal);
        $blnakhir = $this->db->escape($blnakhir);

        return $this->db->table('siswa')->where('DATE(created_at) BETWEEN ' . $blnawal . ' AND ' . $blnakhir)->get()->getResultArray();
        // return $this->db->table('survey');
    }
}
