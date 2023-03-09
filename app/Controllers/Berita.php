<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\LayoutModel;

class Berita extends BaseController
{
    protected $beritaModel;
    protected $layoutModel;
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->beritaModel = new BeritaModel();
        $this->layoutModel = new LayoutModel();
    }
    public function index2()
    {
        $berita = $this->db->table('infosklh')->get()->getResultArray();
        $data = [
            'title' => 'Intelligence Class | Berita',
            'berita' => $berita,
        ];
        return view('/pages2/berita', $data);
    }
    function download($id)
    {
        $berkas = new BeritaModel();
        $data = $berkas->find($id);
        return $this->response->download('file-info/' . $data->berkas, null);
    }
    public function detail($id)
    {
        $configJPas = $this->db->table('configstatus')->where('nama_config', 'Status PAS')->get()->getRowArray();
        $statusPas = $configJPas['value'];

        $configJgmeet = $this->db->table('configstatus')->where('nama_config', 'Status JGMEET')->get()->getRowArray();
        $statusJgmeet = $configJgmeet['value'];

        $configJtugas = $this->db->table('configstatus')->where('nama_config', 'Status JTUGAS')->get()->getRowArray();
        $statusJtugas = $configJtugas['value'];

        $configJpiket = $this->db->table('configstatus')->where('nama_config', 'Status JPiket')->get()->getRowArray();
        $statusJpiket = $configJpiket['value'];

        $layout = $this->db->table('layout');
        $queryLayout = $layout->get()->getRowArray();
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class | Berita | Berita - Detail',
            'dtl' => $this->beritaModel->getBerita($id),
            'gtagJS' => '<!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-N26R81P5DP"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag(\'js\', new Date());
            
              gtag(\'config\', \'G-N26R81P5DP\');
            </script>',

            'statusPas' => $statusPas,
            'statusJgmeet' => $statusJgmeet,
            'statusJtugas' => $statusJtugas,
            'statusJpiket' => $statusJpiket,
        ];
        return view('/pages/berita/detail', $data);
    }
}
