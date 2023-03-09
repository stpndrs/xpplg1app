<?php

namespace App\Controllers;


class Home extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {

        $berita = $this->db->table('infosklh')->get(3)->getResultArray();
        $siswa = $this->db->table('siswa')->where('foto_siswa !=', 'download.png')->get()->getResultArray();
        $data = [
            'title' => 'Intelligence Class',
            'siswa' => $siswa,
        ];
        return view('/pages2/home', $data);
    }
}
