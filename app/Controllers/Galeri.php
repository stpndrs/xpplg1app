<?php

namespace App\Controllers;

use App\Models\LayoutModel;
use App\Models\PostModel;

class Galeri extends BaseController
{
    protected $layoutModel;
    protected $postModel;
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->layoutModel = new LayoutModel();
        $this->postModel = new PostModel();
    }
    public function index()
    {
        $posts = $this->db->table('tb_post')->orderBy('id', 'DESC')->get()->getResultArray();
        $postsWithImages = [];
        foreach ($posts as $post) {
            $pictures = $this->db->table('tb_gambar')->where('post_id', $post['id'])->where('gambar !=', 'no-image.png')->get()->getResultArray();
            $post['gambar'] = [];
            foreach ($pictures as $picture) {
                $post['gambar'][] = $picture;
            }
            $postsWithImages[] = $post;
        }
        // dd($postsWithImages);

        $data = [
            'title' => 'Intelligence Class | Galeri',
            'galeri' => $postsWithImages,
        ];
        return view('/pages2/galeri', $data);
    }
    // public function detail()
    // {
    //     $layout = $this->db->table('layout');
    //     $queryLayout = $layout->get()->getRowArray();

    //     $configJPas = $this->db->table('configstatus')->where('nama_config', 'Status PAS')->get()->getRowArray();
    //     $statusPas = $configJPas['value'];

    //     $configJgmeet = $this->db->table('configstatus')->where('nama_config', 'Status JGMEET')->get()->getRowArray();
    //     $statusJgmeet = $configJgmeet['value'];

    //     $configJtugas = $this->db->table('configstatus')->where('nama_config', 'Status JTUGAS')->get()->getRowArray();
    //     $statusJtugas = $configJtugas['value'];

    //     $configJpiket = $this->db->table('configstatus')->where('nama_config', 'Status JPiket')->get()->getRowArray();
    //     $statusJpiket = $configJpiket['value'];

    //     $configJoffline = $this->db->table('configstatus')->where('nama_config', 'Status JOffline')->get()->getRowArray();
    //     $statusJoffline = $configJoffline['value'];

    //     $data = [
    //         'layout' => $queryLayout,
    //         'title' => 'Intelligence Class | Galeri | Detail',
    //         'gtagJS' => '<!-- Global site tag (gtag.js) - Google Analytics -->
    //         <script async src="https://www.googletagmanager.com/gtag/js?id=G-N26R81P5DP"></script>
    //         <script>
    //           window.dataLayer = window.dataLayer || [];
    //           function gtag(){dataLayer.push(arguments);}
    //           gtag(\'js\', new Date());

    //           gtag(\'config\', \'G-N26R81P5DP\');
    //         </script>',
    //         'statusPas' => $statusPas,
    //         'statusJgmeet' => $statusJgmeet,
    //         'statusJtugas' => $statusJtugas,
    //         'statusJpiket' => $statusJpiket,
    //         'statusJoffline' => $statusJoffline,
    //     ];

    //     return view('/pages/galeri/detail', $data);
    // }
}
