<?php

namespace App\Controllers;

use App\Models\LayoutModel;
use App\Models\JgmeetModel;
use App\Models\JtugasModel;
use App\Models\JpiketModel;
use App\Models\JpasModel;

class Jadwal extends BaseController
{
    protected $layoutModel;
    protected $jgmeetModel;
    protected $jtugasModel;
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->layoutModel = new LayoutModel();
        $this->jgmeetModel = new JgmeetModel();
        $this->jtugasModel = new JtugasModel();
        $this->jpiketModel = new JpiketModel();
        $this->jpasModel = new JpasModel();
    }
    public function JadwalPelajaran()
    {

        $jgmeet = $this->db->table('jgmeet')->get()->getResultArray();

        $jtugas = $this->db->table('jtugas')->get()->getResultArray();

        $jpiket = $this->db->table('jpiket')->get()->getResultArray();

        $joffline = $this->db->table('joffline')->get()->getResultArray();

        $configJPas = $this->db->table('configstatus')->where('nama_config', 'Status PAS')->get()->getRowArray();
        $statusPas = $configJPas['value'];

        $configJgmeet = $this->db->table('configstatus')->where('nama_config', 'Status JGMEET')->get()->getRowArray();
        $statusJgmeet = $configJgmeet['value'];

        $configJtugas = $this->db->table('configstatus')->where('nama_config', 'Status JTUGAS')->get()->getRowArray();
        $statusJtugas = $configJtugas['value'];

        $configJpiket = $this->db->table('configstatus')->where('nama_config', 'Status JPiket')->get()->getRowArray();
        $statusJpiket = $configJpiket['value'];

        $configJoffline = $this->db->table('configstatus')->where('nama_config', 'Status JOffline')->get()->getRowArray();
        $statusJoffline = $configJoffline['value'];

        $jpas = $this->db->table('jpas')->get()->getResultArray();

        $data = [
            'title' => 'Intelligence Class | Jadwal',
            'jvideo' => $jgmeet,
            'jtugas' => $jtugas,
            'jpik' => $jpiket,
            'jpas' => $jpas,
            'joffline' => $joffline,
            'statusPas' => $statusPas,
            'statusJgmeet' => $statusJgmeet,
            'statusJtugas' => $statusJtugas,
            'statusJpiket' => $statusJpiket,
            'statusJoffline' => $statusJoffline,
        ];
        // dd($data);
        return view('/pages2/jadwalSkl', $data);
    }
    public function JadwalPiket()
    {
        $jgmeet = $this->db->table('jgmeet')->get()->getResultArray();

        $jtugas = $this->db->table('jtugas')->get()->getResultArray();

        $jpiket = $this->db->table('jpiket')->get()->getResultArray();

        $configJPas = $this->db->table('configstatus')->where('nama_config', 'Status PAS')->get()->getRowArray();
        $statusPas = $configJPas['value'];

        $configJgmeet = $this->db->table('configstatus')->where('nama_config', 'Status JGMEET')->get()->getRowArray();
        $statusJgmeet = $configJgmeet['value'];

        $configJtugas = $this->db->table('configstatus')->where('nama_config', 'Status JTUGAS')->get()->getRowArray();
        $statusJtugas = $configJtugas['value'];

        $configJpiket = $this->db->table('configstatus')->where('nama_config', 'Status JPiket')->get()->getRowArray();
        $statusJpiket = $configJpiket['value'];

        $configJoffline = $this->db->table('configstatus')->where('nama_config', 'Status JOffline')->get()->getRowArray();
        $statusJoffline = $configJoffline['value'];

        $jpas = $this->db->table('jpas')->get()->getResultArray();
        $data = [
            'title' => 'Intelligence Class | Jadwal Piket',
            'jvideo' => $jgmeet,
            'jtugas' => $jtugas,
            'jpik' => $jpiket,
            'jpas' => $jpas,
            'statusPas' => $statusPas,
            'statusJgmeet' => $statusJgmeet,
            'statusJtugas' => $statusJtugas,
            'statusJpiket' => $statusJpiket,
            'statusJoffline' => $statusJoffline,
        ];
        // return view('welcome_message');
        return view('/pages2/jadwalPiket', $data);
    }
    public function JadwalUjian()
    {
        $jgmeet = $this->db->table('jgmeet')->get()->getResultArray();

        $jtugas = $this->db->table('jtugas')->get()->getResultArray();

        $jpiket = $this->db->table('jpiket')->get()->getResultArray();

        $configJPas = $this->db->table('configstatus')->where('nama_config', 'Status PAS')->get()->getRowArray();
        $statusPas = $configJPas['value'];

        $configJgmeet = $this->db->table('configstatus')->where('nama_config', 'Status JGMEET')->get()->getRowArray();
        $statusJgmeet = $configJgmeet['value'];

        $configJtugas = $this->db->table('configstatus')->where('nama_config', 'Status JTUGAS')->get()->getRowArray();
        $statusJtugas = $configJtugas['value'];

        $configJpiket = $this->db->table('configstatus')->where('nama_config', 'Status JPiket')->get()->getRowArray();
        $statusJpiket = $configJpiket['value'];

        $configJoffline = $this->db->table('configstatus')->where('nama_config', 'Status JOffline')->get()->getRowArray();
        $statusJoffline = $configJoffline['value'];

        $jpas = $this->db->table('jpas')->get()->getResultArray();
        $data = [
            'title' => 'Intelligence Class | Jadwal Ujian',
            'jvideo' => $jgmeet,
            'jtugas' => $jtugas,
            'jpik' => $jpiket,
            'jpas' => $jpas,
            'statusPas' => $statusPas,
            'statusJgmeet' => $statusJgmeet,
            'statusJtugas' => $statusJtugas,
            'statusJpiket' => $statusJpiket,
            'statusJoffline' => $statusJoffline,
        ];
        // return view('welcome_message');
        return view('/pages2/jadwalPas', $data);
    }
}
