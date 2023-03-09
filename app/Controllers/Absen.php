<?php

namespace App\Controllers;

class Absen extends BaseController
{
    protected $layoutModel;
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $ConfigAbsen = $this->db->table('configstatus')->where('nama_config', 'Status Absen')->get()->getRowArray();
        $status = $ConfigAbsen['value'];

        $absen = $this->db->table('siswa')->orderBy('absen_siswa', 'ASC')->get()->getResultArray(); // $this->db mengambil dari property $db
        $data = [
            'title' => 'Intelligence Class | Absen',
            'absen' => $absen,
            'status' => $status,
        ];
        // return view('welcome_message');
        return view('/pages2/absen', $data);
    }
}
