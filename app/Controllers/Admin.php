<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\LayoutModel;
use App\Models\HomeModel;
use App\Models\DashtodoModel;
use App\Models\BeritaModel;
use App\Models\PostModel;
use App\Models\GambarModel;
use App\Models\JgmeetModel;
use App\Models\JtugasModel;
use App\Models\JpiketModel;
use App\Models\JpasModel;
use App\Models\JofflineModel;
use App\Models\SiswaModel;
use App\Models\ConfigModel;

class Admin extends BaseController
{
    use ResponseTrait;     //disini

    protected $db;
    protected $layoutModel;
    protected $homeModel;
    protected $dashtodoModel;
    protected $beritaModel;
    protected $jgmeetModel;
    protected $jtugasModel;
    protected $jpiketModel;
    protected $jpasModel;
    protected $jofflineModel;
    protected $postModel;
    protected $gambarModel;
    protected $siswaModel;
    protected $configModel;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->layoutModel = new LayoutModel();
        $this->homeModel = new HomeModel();
        $this->dashtodoModel = new DashtodoModel();
        $this->beritaModel = new BeritaModel();
        $this->postModel = new PostModel();
        $this->gambarModel = new GambarModel();
        $this->jgmeetModel = new JgmeetModel();
        $this->jtugasModel = new JtugasModel();
        $this->jpiketModel = new JpiketModel();
        $this->jpasModel = new JpasModel();
        $this->jofflineModel = new JofflineModel();
        $this->siswaModel = new SiswaModel();
        $this->configModel = new ConfigModel();
    }
    public function index()
    {
        $layout = $this->db->table('layout');
        $dash_todo = $this->db->table('dashboard_todo');
        // $home = $this->db->table('home');
        // $berita = $this->db->table('infosklh');
        // $galeri = $this->db->table('galeri');
        $queryLayout = $layout->get()->getRowArray();
        $queryTodo = $dash_todo->orderby('deadline_todo', 'ASC')->get()->getResultArray();
        // $queryHome = $home->get()->getResultArray();
        // $queryGaleri = $galeri->get(3)->getResultArray();
        // $queryBerita = $berita->get(3)->getResultArray();

        $data = [
            'title' => 'Intelligence Class',
            'layout' => $queryLayout,
            // 'home' => $queryHome,
            // 'galeri' => $queryGaleri,
            // 'berita' => $queryBerita,
            'todo' => $queryTodo,
        ];
        return view('admin/home/dashboard', $data);
    }
    public function saveTodo()
    {
        $this->dashtodoModel->save([
            'title_todo' => $this->request->getVar('txtTitle'),
            'deadline_todo' => $this->request->getVar('txtDeadline'),
        ]);
        return redirect()->to('/admin');
    }
    public function removeTodo($id)
    {
        $this->dashtodoModel->delete($id);
        return redirect()->to('/admin');
    }
    public function editHome($id)
    {
        $layout = $this->db->table('layout');
        $queryLayout = $layout->get()->getRowArray();
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Admin | Edit Home Page',
            'validation' => \Config\Services::validation(),
            'he' => $this->homeModel->getHome($id)
        ];
        return view('admin/home/editHome', $data);
    }
    public function deleteHome($id)
    {
        $home = $this->homeModel->find($id);

        // cek gambar default
        if ($home['carousel_home'] != 'no-image.png') {
            // hapus gambar
            unlink('img/' . $home['carousel_home']);
        }

        $this->homeModel->delete($id);
        session()->setFlashdata('pesan', 'Carousel Lama Telah Terhapus!');
        return redirect()->to('/admin');
    }

    // BERITA ~ BERITA
    public function berita()
    {
        $layout = $this->db->table('layout');
        $berita = $this->db->table('infosklh');
        $queryLayout = $layout->get()->getRowArray();
        $query = $berita->get()->getResultArray();
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Admin | Berita',
            'berita' => $query
        ];
        return view('admin/berita/berita', $data);
    }
    public function download()
    {
        return view('admin/berita/download');
    }
    public function detail($id)
    {
        $layout = $this->db->table('layout');
        $queryLayout = $layout->get()->getRowArray();
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Admin | Berita | Berita - Detail',
            'dtl' => $this->beritaModel->getBerita($id)
        ];
        return view('admin/berita/detail', $data);
    }



    public function addBerita()
    {
        $layout = $this->db->table('layout');
        $queryLayout = $layout->get()->getRowArray();
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Admin | Tambah Berita',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/berita/addBerita', $data);
    }
    public function saveBerita()
    {
        // ccek validasi input
        if (!$this->validate([
            'txtTitle' => [
                'rules' => 'required|is_unique[infosklh.title_info]',
                'errors' => [
                    'required' => 'Title Berita Tidak Boleh Kosong!',
                    'is_unique' => 'Title Berita Tidak Boleh Sama!'
                ]
            ],
            'txtLink' => [
                'rules' => 'is_unique[infosklh.link_info]',
                'errors' => [
                    // 'required' => 'Link Berita Tidak Boleh Kosong!',
                    'is_unique' => 'Link Berita Tidak Boleh Sama!'
                ]
            ],
            'txtIsi' => [
                'rules' => 'required|is_unique[infosklh.isi_info]',
                'errors' => [
                    'required' => 'Isi Berita Tidak Boleh Kosong!',
                    'is_unique' => 'Isi Berita Tidak Boleh Sama!'
                ]
            ],
            'txtGambar' => [
                'rules' => 'max_size[txtGambar,1600]|is_image[txtGambar]|mime_in[txtGambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Hanya Gambar Yang Diperbolehkan!',
                    'mime_in' => 'Hanya Gambar Yang Diperbolehkan!'
                ]
            ]
        ])) {
            return redirect()->to('/admin/addBerita')->withInput();
        }

        // ambil gambar
        $fileGambar = $this->request->getFile('txtGambar');
        // cek ada gambar atau tidak
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'no-image.png';
        } else {
            // generate nama foto
            $namaGambar = $fileGambar->getRandomName();
            // pindah file
            $fileGambar->move('img', $namaGambar);
        }

        $this->beritaModel->save([
            'title_info' => $this->request->getVar('txtTitle'),
            'link_info' => $this->request->getVar('txtLink'),
            'isi_info' => $this->request->getVar('txtIsi'),
            'gambar_info' => $namaGambar
        ]);

        session()->setFlashdata('pesan', 'Berita Baru Telah Ditambahkan!');
        return redirect()->to('/admin/berita');
    }

    public function deleteBerita($id)
    {
        $this->beritaModel->delete($id);
        session()->setFlashdata('pesan', 'Berita Lama Telah Terhapus!');
        return redirect()->to('/admin/berita');
    }

    public function editBerita($id)
    {
        $layout = $this->db->table('layout');
        $queryLayout = $layout->get()->getRowArray();
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Admin | Edit Berita',
            'validation' => \Config\Services::validation(),
            'brt' => $this->beritaModel->getBerita($id)
        ];
        return view('admin/berita/editBerita', $data);
    }
    public function updateBerita($id)
    {
        // ccek validasi input
        if (!$this->validate([
            'txtTitle' => [
                'rules' => 'required[infosklh.title_info,{txtId}]',
                'errors' => [
                    'required' => 'Title Berita Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Title already exist!'
                ]
            ],
            'txtLink' => [
                // 'rules' => 'required[infosklh.link_info,{txtId}]',
                // 'errors' => [
                // 'required' => 'Link Berita Tidak Boleh Kosong!',
                // 'is_unique' => 'Project Link already exist!'
                // ]
            ],
            'txtIsi' => [
                'rules' => 'required|is_unique[infosklh.isi_info,{txtId}]',
                'errors' => [
                    'required' => 'Isi Berita Tidak Boleh Kosong!',
                    'is_unique' => 'Isi Berita Tidak Boleh Sama!'
                ]
            ]
        ])) {
            return redirect()->to('/admin/editBerita/' . $this->request->getVar('txtId'))->withInput();
        }

        $this->beritaModel->save([
            'id_info' => $id,
            'title_info' => $this->request->getVar('txtTitle'),
            'link_info' => $this->request->getVar('txtLink'),
            'isi_info' => $this->request->getVar('txtIsi')
            // 'gambar_info' => $namaGambar
        ]);

        session()->setFlashdata('pesan', 'Berita Telah Diupdate!');
        return redirect()->to('/admin/berita');
    }

    // GALERI ~ GALERI
    public function galeri()
    {
        $layout = $this->db->table('layout');
        $queryLayout = $layout->get()->getRowArray();
        $posts = $this->db->table('tb_post')->get()->getResultArray();
        $postsWithImages = [];
        foreach ($posts as $post) {
            $pictures = $this->db->table('tb_gambar')->where('post_id', $post['id'])->get()->getResultArray();
            $post['gambar'] = [];
            foreach ($pictures as $picture) {
                $post['gambar'][] = $picture;
            }
            $postsWithImages[] = $post;
        }
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Admin | Galeri',
            'galeri' => $postsWithImages
        ];
        // return view('welcome_message');
        return view('admin/galeri/galeri', $data);
    }
    public function addGaleri()
    {
        $layout = $this->db->table('layout');
        $queryLayout = $layout->get()->getRowArray();
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Admin | Tambah Galeri',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/galeri/addGaleri', $data);
    }
    public function saveGaleri()
    {
        // dd($this->request->getFiles());
        // ccek validasi input
        if (!$this->validate([
            'txtTitle' => [
                'rules' => 'required|is_unique[tb_post.title]',
                'errors' => [
                    'required' => 'Title Gambar Tidak Boleh Kosong!',
                    'is_unique' => 'Title Gambar Tidak Boleh Sama!'
                ]
            ],
            'txtIsi' => [
                'rules' => 'required|is_unique[tb_post.deskripsi]',
                'errors' => [
                    'required' => 'Deskripsi Gambar Tidak Boleh Kosong!',
                    'is_unique' => 'Deskripsi Gambar Tidak Boleh Sama!'
                ]
            ],
            // 'txtGambar' => [
            //     'rules' => 'max_size[txtGambar1,2048]|is_image[txtGambar1]|mime_in[txtGambar1,image/jpg,image/jpeg,image/png]',
            //     'errors' => [
            //         'max_size' => 'Ukuran gambar terlalu besar',
            //         'is_image' => 'Hanya Gambar Yang Diperbolehkan!',
            //         'mime_in' => 'Hanya Gambar Yang Diperbolehkan!'
            //     ]
            // ],
        ])) {
            return redirect()->to('/admin/addGaleri')->withInput();
        }

        $post = $this->postModel->insert([
            'title' => $this->request->getVar('txtTitle'),
            'deskripsi' => $this->request->getVar('txtIsi'),
            // 'gambar_galeri' => $namaGambar
        ]);

        // dd($post);
        $array_penampung = [];
        // dd($this->request->getFiles());
        $uploadedFiles = $this->request->getFiles();
        foreach ($uploadedFiles['txtGambar'] as $fileGambar) {
            // pindah file
            if ($fileGambar->getError() == 4) {
                $namaGambar = 'no-image.png';
            } else {
                // generate nama foto
                $namaGambar = $fileGambar->getRandomName();
                // pindah file
                $fileGambar->move('img', $namaGambar);
            }
            array_push($array_penampung, [
                'post_id' => $post,
                'gambar' => $namaGambar
            ]);
        }
        $this->gambarModel->insertBatch($array_penampung);
        // dd($array_penampung);

        session()->setFlashdata('pesan', 'Foto Baru Telah Ditambahkan!');
        return redirect()->to('/admin/galeri');
    }
    public function deletePost($id)
    {
        $pictures = $this->db->table('tb_gambar')->where('post_id', $id)->get()->getResultArray();

        foreach ($pictures as $picture) {

            if ($picture['gambar'] != 'no-image.png') {
                unlink('img/' . $picture['gambar']);
            }
        }

        $this->postModel->delete($id);

        session()->setFlashdata('pesan', 'Foto Lama Telah Terhapus!');
        return redirect()->to('/admin/galeri');
    }
    public function editGaleri($id)
    {
        $layout = $this->db->table('layout');
        $queryLayout = $layout->get()->getRowArray();
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Admin | Edit Galeri',
            'validation' => \Config\Services::validation(),
            'glr' => $this->postModel->getPost($id),
            'gbr' => $this->gambarModel->getGambar($id)
        ];
        // dd($data);
        return view('admin/galeri/editGaleri', $data);
    }
    public function updateGaleri($id)
    {
        // ccek validasi input
        if (!$this->validate([
            'txtTitle' => [
                'rules' => 'required|is_unique[galeri.title_galeri]',
                'errors' => [
                    'required' => 'Title Gambar Tidak Boleh Kosong!',
                    'is_unique' => 'Title Gambar Tidak Boleh Sama!'
                ]
            ],
            'txtIsi' => [
                'rules' => 'required|is_unique[galeri.desc_galeri]',
                'errors' => [
                    'required' => 'Deskripsi Gambar Tidak Boleh Kosong!',
                    'is_unique' => 'Deskripsi Gambar Tidak Boleh Sama!'
                ]
            ],
            // 'txtGambar' => [
            //     'rules' => 'max_size[txtGambar,1600]|is_image[txtGambar]|mime_in[txtGambar,image/jpg,image/jpeg,image/png]',
            //     'errors' => [
            //         'max_size' => 'Ukuran gambar terlalu besar',
            //         'is_image' => 'Hanya Gambar Yang Diperbolehkan!',
            //         'mime_in' => 'Hanya Gambar Yang Diperbolehkan!'
            //     ]
            // ]
        ])) {
            return redirect()->to('/admin/galeri/editGaleri/' . $this->request->getVar('txtId'))->withInput();
        }
        // dd($this->request->getFiles('txtGambar'));
        $this->postModel->save([
            'id' => $id,
            'title' => $this->request->getVar('txtTitle'),
            'deskripsi' => $this->request->getVar('txtIsi')
        ]);

        session()->setFlashdata('pesan', 'Postingan Dengan Title' . $this->request->getVar('txtTitle') . 'Telah Diedit!');
        return redirect()->to('/admin/galeri');
    }

    // JADWAL ~ JADWAL
    public function JadwalPelajaran()
    {

        $layout = $this->db->table('layout');
        $queryLayout = $layout->get()->getRowArray();
        $jgmeet = $this->db->table('jgmeet');
        $queryGmeet = $jgmeet->get()->getResultArray();

        $jtugas = $this->db->table('jtugas');
        $queryTugas = $jtugas->get()->getResultArray();

        $jpiket = $this->db->table('jpiket');
        $queryPiket = $jpiket->get()->getResultArray();

        $jpas = $this->db->table('jpas');
        $queryPAS = $jpas->get()->getResultArray();

        $joffline = $this->db->table('joffline');
        $queryOffline = $joffline->get()->getResultArray();
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Admin | Jadwal',
            'jvideo' => $queryGmeet,
            'jtugas' => $queryTugas,
            'jpik' => $queryPiket,
            'jpas' => $queryPAS,
            'joffline' => $queryOffline,
        ];
        // return view('welcome_message');
        return view('admin/jadwal/jadwalSkl', $data);
    }
    public function JadwalPiket()
    {

        $layout = $this->db->table('layout');
        $queryLayout = $layout->get()->getRowArray();
        $jgmeet = $this->db->table('jgmeet');
        $queryGmeet = $jgmeet->get()->getResultArray();

        $jtugas = $this->db->table('jtugas');
        $queryTugas = $jtugas->get()->getResultArray();

        $jpiket = $this->db->table('jpiket');
        $queryPiket = $jpiket->get()->getResultArray();

        $jpas = $this->db->table('jpas');
        $queryPAS = $jpas->get()->getResultArray();
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Admin | Jadwal',
            'jvideo' => $queryGmeet,
            'jtugas' => $queryTugas,
            'jpik' => $queryPiket,
            'jpas' => $queryPAS,
        ];
        // return view('welcome_message');
        return view('admin/jadwal/jadwalPik', $data);
    }
    public function JadwalUjian()
    {

        $layout = $this->db->table('layout');
        $queryLayout = $layout->get()->getRowArray();
        $jgmeet = $this->db->table('jgmeet');
        $queryGmeet = $jgmeet->get()->getResultArray();

        $jtugas = $this->db->table('jtugas');
        $queryTugas = $jtugas->get()->getResultArray();

        $jpiket = $this->db->table('jpiket');
        $queryPiket = $jpiket->get()->getResultArray();

        $jpas = $this->db->table('jpas');
        $queryPAS = $jpas->get()->getResultArray();
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Admin | Jadwal',
            'jvideo' => $queryGmeet,
            'jtugas' => $queryTugas,
            'jpik' => $queryPiket,
            'jpas' => $queryPAS,
        ];
        // return view('welcome_message');
        return view('admin/jadwal/jadwalUj', $data);
    }

    // JADWAL GOOGLE MEET
    public function editJgmeet($id)
    {
        $layout = $this->db->table('layout');
        $queryLayout = $layout->get()->getRowArray();
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Admin | Edit Jadwal',
            'validation' => \Config\Services::validation(),
            'jgm' => $this->jgmeetModel->getJgmeet($id)
        ];
        return view('admin/jadwal/editJgmeet', $data);
    }
    public function updateJgmeet($id)
    {
        // dd($this->request->getVar('txtSeragamPer'));
        // ccek validasi input
        if (!$this->validate([
            'txtHari' => [
                'rules' => 'required[jgmeet.hari_jgmeet,{txtId}]',
                'errors' => [
                    'required' => 'Hari Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Title already exist!'
                ]
            ],
            'txtSeragam' => [
                'rules' => 'required[jgmeet.seragam_jgmeet,{txtId}]',
                'errors' => [
                    'required' => 'Seragam Laki-laki Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtSeragamPer' => [
                'rules' => 'required[jgmeet.seragamper_jgmeet,{txtId}]',
                'errors' => [
                    'required' => 'Seragam Perempuan Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtMapel1' => [
                'rules' => 'required[jgmeet.mapel1_jgmeet,{txtId}]',
                'errors' => [
                    'required' => 'Mapel 1 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Isi already exist!'
                ]
            ],
            'txtNmguru1' => [
                'rules' => 'required[jgmeet.nmguru1_jgmeet,{txtid}]',
                'errors' => [
                    'required' => 'Nama Guru Mapel 1 Tidak Boleh Kosong!'
                ]
            ],
            'txtMapel2' => [
                'rules' => 'required[jgmeet.mapel2_jgmeet,{txtId}]',
                'errors' => [
                    'required' => 'Mapel 2 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Isi already exist!'
                ]
            ],
            'txtNmguru2' => [
                'rules' => 'required[jgmeet.nmguru2_jgmeet,{txtid}]',
                'errors' => [
                    'required' => 'Nama Guru Mapel 2 Tidak Boleh Kosong!'
                ]
            ],
            'txtMapel3' => [
                'rules' => 'required[jgmeet.mapel3_jgmeet,{txtId}]',
                'errors' => [
                    'required' => 'Mapel 3 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Isi already exist!'
                ]
            ],
            'txtNmguru3' => [
                'rules' => 'required[jgmeet.nmguru3_jgmeet,{txtid}]',
                'errors' => [
                    'required' => 'Nama Guru Mapel 3 Tidak Boleh Kosong!'
                ]
            ]
        ])) {
            return redirect()->to('/admin/jadwal/editJgmeet/' . $this->request->getVar('txtId'))->withInput();
        }

        $this->jgmeetModel->save([
            'id_jgmeet' => $id,
            'hari_jgmeet' => $this->request->getVar('txtHari'),
            'seragam_jgmeet' => $this->request->getVar('txtSeragam'),
            'seragamper_jgmeet' => $this->request->getVar('txtSeragamPer'),
            'mapel1_jgmeet' => $this->request->getVar('txtMapel1'),
            'nmguru1_jgmeet' => $this->request->getVar('txtNmguru1'),
            'mapel2_jgmeet' => $this->request->getVar('txtMapel2'),
            'nmguru2_jgmeet' => $this->request->getVar('txtNmguru2'),
            'mapel3_jgmeet' => $this->request->getVar('txtMapel3'),
            'nmguru3_jgmeet' => $this->request->getVar('txtNmguru3'),
            'mapel4_jgmeet' => $this->request->getVar('txtMapel4'),
            'nmguru4_jgmeet' => $this->request->getVar('txtNmguru4'),
            // 'gambar_info' => $namaGambar
        ]);

        session()->setFlashdata('pesan-jgmeet', 'Jadwal Video Conference Telah Diupdate!');
        return redirect()->to('/admin/JadwalPelajaran#jadwal-video');
    }
    // JADWAL GOOGLE MEET
    public function editJoffline($id)
    {
        $layout = $this->db->table('layout');
        $queryLayout = $layout->get()->getRowArray();
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Admin | Edit Jadwal',
            'validation' => \Config\Services::validation(),
            'jof' => $this->jofflineModel->getJoffline($id)
        ];
        return view('admin/jadwal/editJoffline', $data);
    }
    public function updateJoffline($id)
    {
        // dd($this->request->getVar('txtSeragamPer'));
        // ccek validasi input
        if (!$this->validate([
            'txtHari' => [
                'rules' => 'required[joffline.hari_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Hari Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Title already exist!'
                ]
            ],
            'txtSeragam' => [
                'rules' => 'required[joffline.seragam_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Seragam Laki-laki Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtSeragamPer' => [
                'rules' => 'required[joffline.seragamper_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Seragam Perempuan Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtMapel0' => [
                'rules' => 'required[joffline.mapel 0_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Mapel 0 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtJam0' => [
                'rules' => 'required[joffline.waktu_0_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Jam Mapel 0 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            // 'txtNmguru0' => [
            //     'rules' => 'required[joffline.namaguru_0_joffline,{txtId}]',
            //     'errors' => [
            //         'required' => 'Nama Guru Mapel 0 Tidak Boleh Kosong!',
            //         // 'is_unique' => 'Project Link already exist!'
            //     ]
            // ],
            'txtMapel1' => [
                'rules' => 'required[joffline.mapel 1_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Mapel 1 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtJam1' => [
                'rules' => 'required[joffline.waktu_1_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Jam Mapel 1 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            // 'txtNmguru1' => [
            //     'rules' => 'required[joffline.namaguru_1_joffline,{txtId}]',
            //     'errors' => [
            //         'required' => 'Nama Guru Mapel 1 Tidak Boleh Kosong!',
            //         // 'is_unique' => 'Project Link already exist!'
            //     ]
            // ],
            'txtMapel2' => [
                'rules' => 'required[joffline.mapel 2_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Mapel 2 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtJam2' => [
                'rules' => 'required[joffline.waktu_2_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Jam Mapel 2 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtNmguru2' => [
                'rules' => 'required[joffline.namaguru_2_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Nama Guru Mapel 2 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtMapel3' => [
                'rules' => 'required[joffline.mapel 3_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Mapel 3 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtJam3' => [
                'rules' => 'required[joffline.waktu_3_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Jam Mapel 3 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtNmguru3' => [
                'rules' => 'required[joffline.namaguru_3_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Nama Guru Mapel 3 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtMapel4' => [
                'rules' => 'required[joffline.mapel 4_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Mapel 4 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtJam4' => [
                'rules' => 'required[joffline.waktu_4_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Jam Mapel 4 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtNmguru4' => [
                'rules' => 'required[joffline.namaguru_4_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Nama Guru Mapel 4 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtMapel5' => [
                'rules' => 'required[joffline.mapel 5_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Mapel 5 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtJam5' => [
                'rules' => 'required[joffline.waktu_5_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Jam Mapel 5 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtNmguru5' => [
                'rules' => 'required[joffline.namaguru_5_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Nama Guru Mapel 5 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtMapel6' => [
                'rules' => 'required[joffline.mapel 6_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Mapel 6 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtJam6' => [
                'rules' => 'required[joffline.waktu_6_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Jam Mapel 6 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtNmguru6' => [
                'rules' => 'required[joffline.namaguru_6_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Nama Guru Mapel 6 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtMapel7' => [
                'rules' => 'required[joffline.mapel 7_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Mapel 7 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtJam7' => [
                'rules' => 'required[joffline.waktu_7_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Jam Mapel 7 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtNmguru7' => [
                'rules' => 'required[joffline.namaguru_7_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Nama Guru Mapel 7 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtMapel8' => [
                'rules' => 'required[joffline.mapel 8_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Mapel 8 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtJam8' => [
                'rules' => 'required[joffline.waktu_8_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Jam Mapel 8 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtNmguru8' => [
                'rules' => 'required[joffline.namaguru_8_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Nama Guru Mapel 8 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtMapel9' => [
                'rules' => 'required[joffline.mapel 9_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Mapel 9 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtJam9' => [
                'rules' => 'required[joffline.waktu_9_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Jam Mapel 9 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtNmguru9' => [
                'rules' => 'required[joffline.namaguru_9_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Nama Guru Mapel 9 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtMapel10' => [
                'rules' => 'required[joffline.mapel 10_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Mapel 10 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtJam10' => [
                'rules' => 'required[joffline.waktu_10_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Jam Mapel 10 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
            'txtNmguru10' => [
                'rules' => 'required[joffline.namaguru_10_joffline,{txtId}]',
                'errors' => [
                    'required' => 'Nama Guru Mapel 10 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Link already exist!'
                ]
            ],
        ])) {
            return redirect()->to('/admin/editJoffline/' . $this->request->getVar('txtId'))->withInput();
        }

        $this->jofflineModel->save([
            'id_joffline' => $id,
            'hari_joffline' => $this->request->getVar('txtHari'),
            'seragam_joffline' => $this->request->getVar('txtSeragam'),
            'seragamper_joffline' => $this->request->getVar('txtSeragamPer'),
            'mapel_0_joffline' => $this->request->getVar('txtMapel0'),
            'waktu_0_joffline' => $this->request->getVar('txtJam0'),
            'namaguru_0_joffline' => $this->request->getVar('txtNmguru0'),
            'mapel_1_joffline' => $this->request->getVar('txtMapel1'),
            'waktu_1_joffline' => $this->request->getVar('txtJam1'),
            'namaguru_1_joffline' => $this->request->getVar('txtNmguru1'),
            'mapel_2_joffline' => $this->request->getVar('txtMapel2'),
            'waktu_2_joffline' => $this->request->getVar('txtJam2'),
            'namaguru_2_joffline' => $this->request->getVar('txtNmguru2'),
            'mapel_3_joffline' => $this->request->getVar('txtMapel3'),
            'waktu_3_joffline' => $this->request->getVar('txtJam3'),
            'namaguru_3_joffline' => $this->request->getVar('txtNmguru3'),
            'mapel_4_joffline' => $this->request->getVar('txtMapel4'),
            'waktu_4_joffline' => $this->request->getVar('txtJam4'),
            'namaguru_4_joffline' => $this->request->getVar('txtNmguru4'),
            'mapel_5_joffline' => $this->request->getVar('txtMapel5'),
            'waktu_5_joffline' => $this->request->getVar('txtJam5'),
            'namaguru_5_joffline' => $this->request->getVar('txtNmguru5'),
            'mapel_6_joffline' => $this->request->getVar('txtMapel6'),
            'waktu_6_joffline' => $this->request->getVar('txtJam6'),
            'namaguru_6_joffline' => $this->request->getVar('txtNmguru6'),
            'mapel_7_joffline' => $this->request->getVar('txtMapel7'),
            'waktu_7_joffline' => $this->request->getVar('txtJam7'),
            'namaguru_7_joffline' => $this->request->getVar('txtNmguru7'),
            'mapel_8_joffline' => $this->request->getVar('txtMapel8'),
            'waktu_8_joffline' => $this->request->getVar('txtJam8'),
            'namaguru_8_joffline' => $this->request->getVar('txtNmguru8'),
            'mapel_9_joffline' => $this->request->getVar('txtMapel9'),
            'waktu_9_joffline' => $this->request->getVar('txtJam9'),
            'namaguru_9_joffline' => $this->request->getVar('txtNmguru9'),
            'mapel_10_joffline' => $this->request->getVar('txtMapel10'),
            'waktu_10_joffline' => $this->request->getVar('txtJam10'),
            'namaguru_10_joffline' => $this->request->getVar('txtNmguru10'),
            'mapel_11_joffline' => $this->request->getVar('txtMapel11'),
            'waktu_11_joffline' => $this->request->getVar('txtJam11'),
            'namaguru_11_joffline' => $this->request->getVar('txtNmguru11'),
            'mapel_12_joffline' => $this->request->getVar('txtMapel12'),
            'waktu_12_joffline' => $this->request->getVar('txtJam12'),
            'namaguru_12_joffline' => $this->request->getVar('txtNmguru12'),
        ]);

        session()->setFlashdata('pesan-joffline', 'Jadwal Offline Telah Diupdate!');
        return redirect()->to('/admin/JadwalPelajaran#jadwal-offline');
    }

    // JADWAL PENUGASAN
    public function editJtugas($id)
    {
        $layout = $this->db->table('layout');
        $queryLayout = $layout->get()->getRowArray();
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Admin | Edit Jadwal',
            'validation' => \Config\Services::validation(),
            'jgt' => $this->jtugasModel->getJtugas($id)
        ];
        return view('admin/jadwal/editJtugas', $data);
    }
    public function updateJtugas($id)
    {
        // ccek validasi input
        if (!$this->validate([
            'txtHari' => [
                'rules' => 'required[jtugas.hari_jtugas,{txtId}]',
                'errors' => [
                    'required' => 'Hari Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Title already exist!'
                ]
            ],
            'txtMapel1' => [
                'rules' => 'required[jtugas.mapel1_jtugas,{txtId}]',
                'errors' => [
                    'required' => 'Mapel 1 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Isi already exist!'
                ]
            ],
            'txtNmguru1' => [
                'rules' => 'required[jgmeet.nmguru1_jtugas,{txtid}]',
                'errors' => [
                    'required' => 'Nama Guru Mapel 1 Tidak Boleh Kosong!'
                ]
            ],
            'txtMapel2' => [
                'rules' => 'required[jtugas.mapel2_jtugas,{txtId}]',
                'errors' => [
                    'required' => 'Mapel 2 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Isi already exist!'
                ]
            ],
            'txtNmguru2' => [
                'rules' => 'required[jgmeet.nmguru2_jtugas,{txtid}]',
                'errors' => [
                    'required' => 'Nama Guru Mapel 2 Tidak Boleh Kosong!'
                ]
            ],
            'txtMapel3' => [
                'rules' => 'required[jtugas.mapel3_jtugas,{txtId}]',
                'errors' => [
                    'required' => 'Mapel 3 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Project Isi already exist!'
                ]
            ],
            'txtNmguru3' => [
                'rules' => 'required[jgmeet.nmguru3_jtugas,{txtid}]',
                'errors' => [
                    'required' => 'Nama Guru Mapel 3 Tidak Boleh Kosong!'
                ]
            ],
            // 'txtMapel4' => [
            //     'rules' => 'required[jtugas.mapel4_jtugas,{txtId}]',
            //     'errors' => [
            //         // 'required' => 'Mapel 4 Tidak Boleh Kosong!',
            //         // 'is_unique' => 'Project Isi already exist!'
            //     ]
            // ],
            // 'txtNmguru4' => [
            //     'rules' => 'required[jgmeet.nmguru4_jtugas,{txtid}]',
            //     'errors' => [
            //         // 'required' => 'Nama Guru Mapel 4 Tidak Boleh Kosong!'
            //     ]
            // ]
        ])) {
            return redirect()->to('/admin/editJtugas/' . $this->request->getVar('txtId'))->withInput();
        }

        $this->jtugasModel->save([
            'id_jtugas' => $id,
            'hari_jtugas' => $this->request->getVar('txtHari'),
            'mapel1_jtugas' => $this->request->getVar('txtMapel1'),
            'nmguru1_jtugas' => $this->request->getVar('txtNmguru1'),
            'mapel2_jtugas' => $this->request->getVar('txtMapel2'),
            'nmguru2_jtugas' => $this->request->getVar('txtNmguru2'),
            'mapel3_jtugas' => $this->request->getVar('txtMapel3'),
            'nmguru3_jtugas' => $this->request->getVar('txtNmguru3'),
            'mapel4_jtugas' => $this->request->getVar('txtMapel4'),
            'nmguru4_jtugas' => $this->request->getVar('txtNmguru4'),
            // 'gambar_info' => $namaGambar
        ]);

        session()->setFlashdata('pesan-jtugas', 'Jadwal Pemberian Tugas Telah Diupdate!');
        return redirect()->to('/admin/JadwalPelajaran#jadwal-penugasan');
    }

    // JADWAL PIKET
    public function addJpik()
    {
        $layout = $this->db->table('layout');
        $queryLayout = $layout->get()->getRowArray();
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Admin | Tambah Jadwal Piket',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/jadwal/addJpik', $data);
    }

    public function saveJpik()
    {
        // ccek validasi input
        if (!$this->validate([
            'txtHari' => [
                'rules' => 'required|is_unique[jpiket.hari_jpiket]',
                'errors' => [
                    'required' => 'Hari Jadwal Piket Tidak Boleh Kosong!',
                    'is_unique' => 'Hari Jadwal Piket Tidak Boleh Sama'
                ]
            ],
            'txtNama1' => [
                'rules' => 'required|is_unique[jpiket.nama1_jpiket]',
                'errors' => [
                    'required' => 'Nama Siswa 1 Tidak Boleh Kosong!',
                    'is_unique' => 'Nama Siswa 1 Tidak Boleh Sama!'
                ]
            ],
            'txtNama2' => [
                'rules' => 'required|is_unique[jpiket.nama2_jpiket]',
                'errors' => [
                    'required' => 'Nama Siswa 2 Tidak Boleh Kosong!',
                    'is_unique' => 'Nama Siswa 2 Tidak Boleh Sama!'
                ]
            ],
            'txtNama3' => [
                'rules' => 'required|is_unique[jpiket.nama3_jpiket]',
                'errors' => [
                    'required' => 'Nama Siswa 3 Tidak Boleh Kosong!',
                    'is_unique' => 'Nama Siswa 3 Tidak Boleh Sama!'
                ]
            ],
            'txtNama4' => [
                'rules' => 'required|is_unique[jpiket.nama4_jpiket]',
                'errors' => [
                    'required' => 'Nama Siswa 4 Tidak Boleh Kosong!',
                    'is_unique' => 'Nama Siswa 4 Tidak Boleh Sama!'
                ]
            ],
            'txtNama5' => [
                'rules' => 'required|is_unique[jpiket.nama5_jpiket]',
                'errors' => [
                    'required' => 'Nama Siswa 5 Tidak Boleh Kosong!',
                    'is_unique' => 'Nama Siswa 5 Tidak Boleh Sama!'
                ]
            ],
            'txtNama6' => [
                'rules' => 'required|is_unique[jpiket.nama6_jpiket]',
                'errors' => [
                    'required' => 'Nama Siswa 6 Tidak Boleh Kosong!',
                    'is_unique' => 'Nama Siswa 6 Tidak Boleh Sama!'
                ]
            ],
            'txtNama7' => [
                'rules' => 'required|is_unique[jpiket.nama7_jpiket]',
                'errors' => [
                    'required' => 'Nama Siswa 7 Tidak Boleh Kosong!',
                    'is_unique' => 'Nama Siswa 7 Tidak Boleh Sama!'
                ]
            ],
        ])) {
            return redirect()->to('/admin/addJpik')->withInput();
        }

        $this->jpiketModel->save([
            'hari_jpiket' => $this->request->getVar('txtHari'),
            'nama1_jpiket' => $this->request->getVar('txtNama1'),
            'nama2_jpiket' => $this->request->getVar('txtNama2'),
            'nama3_jpiket' => $this->request->getVar('txtNama3'),
            'nama4_jpiket' => $this->request->getVar('txtNama4'),
            'nama5_jpiket' => $this->request->getVar('txtNama5'),
            'nama6_jpiket' => $this->request->getVar('txtNama6'),
            'nama7_jpiket' => $this->request->getVar('txtNama7'),
        ]);

        session()->setFlashdata('data-jpik', 'Jadwal Piket Baru Telah Ditambah!');
        return redirect()->to('/admin/JadwalPiket');
    }

    public function editJpik($id)
    {
        $layout = $this->db->table('layout');
        $queryLayout = $layout->get()->getRowArray();
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Admin | Edit Jadwal Piket',
            'validation' => \Config\Services::validation(),
            'jpk' => $this->jpiketModel->getJpik($id)
        ];
        return view('admin/jadwal/editJpik', $data);
    }
    public function updateJpik($id)
    {
        // ccek validasi input
        if (!$this->validate([
            'txtHari' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Hari Jadwal Piket Tidak Boleh Kosong!',
                    // 'is_unique' => 'Hari Jadwal Piket Tidak Boleh Sama'
                ]
            ],
            'txtNama1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Siswa 1 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Nama Siswa 1 Tidak Boleh Sama!'
                ]
            ],
            'txtNama2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Siswa 2 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Nama Siswa 2 Tidak Boleh Sama!'
                ]
            ],
            'txtNama3' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Siswa 3 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Nama Siswa 3 Tidak Boleh Sama!'
                ]
            ],
            'txtNama4' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Siswa 4 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Nama Siswa 4 Tidak Boleh Sama!'
                ]
            ],
            'txtNama5' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Siswa 5 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Nama Siswa 5 Tidak Boleh Sama!'
                ]
            ],
            'txtNama6' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Siswa 6 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Nama Siswa 6 Tidak Boleh Sama!'
                ]
            ],
            'txtNama7' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Siswa 7 Tidak Boleh Kosong!',
                    // 'is_unique' => 'Nama Siswa 7 Tidak Boleh Sama!'
                ]
            ],
        ])) {
            return redirect()->to('/admin/editJpik/' . $this->request->getVar('txtId'))->withInput();
        }

        $this->jpiketModel->save([
            'id_jpiket' => $id,
            'hari_jpiket' => $this->request->getVar('txtHari'),
            'nama1_jpiket' => $this->request->getVar('txtNama1'),
            'nama2_jpiket' => $this->request->getVar('txtNama2'),
            'nama3_jpiket' => $this->request->getVar('txtNama3'),
            'nama4_jpiket' => $this->request->getVar('txtNama4'),
            'nama5_jpiket' => $this->request->getVar('txtNama5'),
            'nama6_jpiket' => $this->request->getVar('txtNama6'),
            'nama7_jpiket' => $this->request->getVar('txtNama7'),
        ]);

        session()->setFlashdata('data-jpik', 'Jadwal Piket Lama Telah Diedit!');
        return redirect()->to('/admin/JadwalPiket');
    }
    public function deleteJpik($id)
    {
        $this->jpikModel->delete($id);
        session()->setFlashdata('data-jpik', 'Jadwal Piket Telah Terhapus!');
        return redirect()->to('/admin/JadwalPiket');
    }

    // JADWAL PAS
    public function addJuj()
    {
        $layout = $this->db->table('layout');
        $queryLayout = $layout->get()->getRowArray();
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Admin | Tambah Jadwal PAS',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/jadwal/addJuj', $data);
    }

    public function saveJuj()
    {
        // ccek validasi input
        if (!$this->validate([
            'txtHari' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Hari Jadwal PAS Tidak Boleh Kosong!',
                ]
            ],
            'txtTgl' => [
                'rules' => 'required|is_unique[jpas.tanggal_jpas]',
                'errors' => [
                    'required' => 'Tanggal Tidak Boleh Kosong!',
                    'is_unique' => 'Tanggal Tidak Boleh Sama!'
                ]
            ],
            'txtMapel1' => [
                'rules' => 'required|is_unique[jpas.mapel1_jpas]',
                'errors' => [
                    'required' => 'Mapel 1 PAS Tidak Boleh Kosong!',
                    'is_unique' => 'Mapel 1 PAS Tidak Boleh Sama!'
                ]
            ],
            'txtJam1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Waktu PAS Mapel 1 Tidak Boleh Kosong!'
                ]
            ],
            'txtMapel2' => [
                'rules' => 'required|is_unique[jpas.mapel2_jpas]',
                'errors' => [
                    'required' => 'Mapel 2 PAS Tidak Boleh Kosong!',
                    'is_unique' => 'Mapel 2 PAS Tidak Boleh Sama!'
                ]
            ],
            'txtJam2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Waktu PAS Mapel 2 Tidak Boleh Kosong!'
                ]
            ],
        ])) {
            return redirect()->to('/admin/addJuj')->withInput();
        }

        $this->jpasModel->save([
            'hari_jpas' => $this->request->getVar('txtHari'),
            'tanggal_jpas' => $this->request->getVar('txtTgl'),
            'mapel1_jpas' => $this->request->getVar('txtMapel1'),
            'jam1_jpas' => $this->request->getVar('txtJam1'),
            'mapel2_jpas' => $this->request->getVar('txtMapel2'),
            'jam2_jpas' => $this->request->getVar('txtJam2'),
            'mapel3_jpas' => $this->request->getVar('txtMapel3'),
            'jam3_jpas' => $this->request->getVar('txtJam3')
        ]);

        session()->setFlashdata('data-jpas', 'Jadwal PAS Baru Telah Ditambah!');
        return redirect()->to('/admin/JadwalUjian');
    }

    public function editJuj($id)
    {
        $layout = $this->db->table('layout');
        $queryLayout = $layout->get()->getRowArray();
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Admin | Edit Jadwal PAS',
            'validation' => \Config\Services::validation(),
            'jps' => $this->jpasModel->getJpas($id)
        ];
        return view('admin/jadwal/editJuj', $data);
    }
    public function updateJuj($id)
    {
        // ccek validasi input
        if (!$this->validate([
            'txtHari' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Hari Jadwal PAS Tidak Boleh Kosong!',
                ]
            ],
            'txtTgl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Tidak Boleh Kosong!',
                    // 'is_unique' => 'Tanggal Tidak Boleh Sama!'
                ]
            ],
            'txtMapel1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Mapel 1 PAS Tidak Boleh Kosong!',
                    // 'is_unique' => 'Mapel 1 PAS Tidak Boleh Sama!'
                ]
            ],
            'txtJam1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Waktu PAS Mapel 1 Tidak Boleh Kosong!'
                ]
            ],
            'txtMapel2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Mapel 2 PAS Tidak Boleh Kosong!',
                    // 'is_unique' => 'Mapel 2 PAS Tidak Boleh Sama!'
                ]
            ],
            'txtJam2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Waktu PAS Mapel 2 Tidak Boleh Kosong!'
                ]
            ],
        ])) {
            return redirect()->to('/admin/editJuj/' . $this->request->getVar('txtId'))->withInput();
        }

        $this->jpasModel->save([
            'id_jpas' => $id,
            'hari_jpas' => $this->request->getVar('txtHari'),
            'tanggal_jpas' => $this->request->getVar('txtTgl'),
            'mapel1_jpas' => $this->request->getVar('txtMapel1'),
            'jam1_jpas' => $this->request->getVar('txtJam1'),
            'mapel2_jpas' => $this->request->getVar('txtMapel2'),
            'jam2_jpas' => $this->request->getVar('txtJam2'),
            'mapel3_jpas' => $this->request->getVar('txtMapel3'),
            'jam3_jpas' => $this->request->getVar('txtJam3')
        ]);

        session()->setFlashdata('data-jpas', 'Jadwal PAS Lama Telah Diedit!');
        return redirect()->to('/admin/JadwalUjian');
    }

    public function deleteJuj($id)
    {
        $this->jpasModel->delete($id);
        session()->setFlashdata('data-jpas', 'Jadwal PAS Telah Terhapus!');
        return redirect()->to('/admin/JadwalUjian');
    }

    // SISWA ~ SISWA
    public function siswa()
    {
        $layout = $this->db->table('layout');
        $queryLayout = $layout->get()->getRowArray();
        $absen = $this->db->table('siswa'); // $this->db mengambil dari property $db
        $absen->orderBy('absen_siswa', 'ASC');

        // $keyword = $this->request->getVar('keyword');
        // if ($keyword) {
        //     $siswa = $this->siswaModel->search($keyword);
        // } else {
        //     $siswa = $this->siswaModel;
        // }

        $query = $this->db->table('siswa')->orderBy('absen_siswa', 'ASC')->get()->getResultArray();

        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Admin | Data Siswa',
            'siswa' => $query,
        ];
        // return view('welcome_message');
        return view('admin/siswa/siswa', $data);
    }

    public function addSiswa()
    {
        $layout = $this->db->table('layout');
        $queryLayout = $layout->get()->getRowArray();
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Admin | Tambah Siswa',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/siswa/addSiswa', $data);
    }

    public function saveSiswa()
    {
        // ccek validasi input
        if (!$this->validate([
            'txtAbsen' => [
                'rules' => 'required|is_unique[siswa.absen_siswa]',
                'errors' => [
                    'required' => 'Nomor Absen Siswa Tidak Boleh Kosong!',
                    'is_unique' => 'Nomor Absen Siswa Tidak Boleh Sama!'
                ]
            ],
            'txtNamSis' => [
                'rules' => 'required|is_unique[siswa.nama_siswa]',
                'errors' => [
                    'required' => 'Nama Siswa Tidak Boleh Kosong!',
                    'is_unique' => 'Nama Siswa Tidak Boleh Sama!'
                ]
            ],
            'txtNisn' => [
                'rules' => 'required|is_unique[siswa.nisn_siswa]',
                'errors' => [
                    'required' => 'NISN Siswa Tidak Boleh Kosong!',
                    'is_unique' => 'NISN Siswa Tidak Boleh Sama!'
                ]
            ],
            // 'txtDeskSis' => [
            // 'rules' => 'required',
            // 'errors' => [
            // 'required' => 'Deskripsi Siswa Tidak Boleh Kosong!',
            // 'is_unique' => 'Project Isi already exist!'
            // ]
            // ],
            'txtIg' => [
                'rules' => 'is_unique[siswa.ins_siswa]',
                'errors' => [
                    // 'required' => 'Username Instagram Siswa Tidak Boleh Kosong!',
                    'is_unique' => 'Username Instagram Siswa Tidak Boleh Sama!'
                ]
            ],
            'txtGambar' => [
                'rules' => 'max_size[txtGambar,1600]|is_image[txtGambar]|mime_in[txtGambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Hanya Gambar Yang Diperbolehkan!',
                    'mime_in' => 'Hanya Gambar Yang Diperbolehkan!'
                ]
            ]
        ])) {
            return redirect()->to('/admin/addSiswa')->withInput();
        }

        // ambil gambar
        $fileGambar = $this->request->getFile('txtGambar');
        // cek ada gambar atau tidak
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'download.png';
        } else {
            // generate nama foto
            $namaGambar = $fileGambar->getName();
            // pindah file
            $fileGambar->move('img', $namaGambar);
        }

        $this->siswaModel->save([
            'absen_siswa' => $this->request->getVar('txtAbsen'),
            'nama_siswa' => $this->request->getVar('txtNamSis'),
            'nisn_siswa' => $this->request->getVar('txtNisn'),
            'desk_siswa' => $this->request->getVar('txtDeskSis'),
            'ins_siswa' => $this->request->getVar('txtIg'),
            'foto_siswa' => $namaGambar
        ]);

        session()->setFlashdata('pesan', 'Siswa Baru Telah Ditambah!');
        return redirect()->to('/admin/siswa');
    }

    public function editSiswa($id)
    {
        $layout = $this->db->table('layout');
        $queryLayout = $layout->get()->getRowArray();
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Admin | Edit Siswa',
            'validation' => \Config\Services::validation(),
            'sis' => $this->siswaModel->getSiswa($id)
        ];
        return view('/admin/siswa/editSiswa', $data);
    }
    public function updateSiswa($id)
    {
        // ccek validasi input
        if (!$this->validate([
            'txtAbsen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Absen Siswa Tidak Boleh Kosong!',
                    // 'is_unique' => 'Nomor Absen Siswa Tidak Boleh Sama!'
                ]
            ],
            'txtNamSis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Siswa Tidak Boleh Kosong!',
                    // 'is_unique' => 'Nama Siswa Tidak Boleh Sama!'
                ]
            ],
            'txtNisn' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Siswa Tidak Boleh Kosong!',
                    // 'is_unique' => 'Nama Siswa Tidak Boleh Sama!'
                ]
            ],
            // 'txtDeskSis' => [
            // 'rules' => 'required',
            // 'errors' => [
            // 'required' => 'Deskripsi Siswa Tidak Boleh Kosong!',
            // 'is_unique' => 'Project Isi already exist!'
            // ]
            // ],
            // 'txtIg' => [
            // 'rules' => 'is_unique[siswa.ins_siswa]',
            // 'errors' => [
            // 'required' => 'Username Instagram Siswa Tidak Boleh Kosong!',
            // 'is_unique' => 'Username Instagram Siswa Tidak Boleh Sama!'
            // ]
            // ],
            'txtGambar' => [
                'rules' => 'max_size[txtGambar,1600]|is_image[txtGambar]|mime_in[txtGambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Hanya Gambar Yang Diperbolehkan!',
                    'mime_in' => 'Hanya Gambar Yang Diperbolehkan!'
                ]
            ]
        ])) {
            return redirect()->to('/admin/editSiswa/' . $this->request->getVar('txtId'))->withInput();
        }
        // dd($this->request->getVar('txtNisn'));
        $dataUpdate = [
            'id_siswa' => $id,
            'absen_siswa' => $this->request->getVar('txtAbsen'),
            'nama_siswa' => $this->request->getVar('txtNamSis'),
            'nisn_siswa' => $this->request->getVar('txtNisn'),
            'desk_siswa' => $this->request->getVar('txtDeskSis'),
            'ins_siswa' => $this->request->getVar('txtIg'),
        ];
        // dd($dataUpdate);

        // ambil gambar
        $fileGambar = $this->request->getFile('txtGambar');
        // cek ada gambar atau tidak
        if ($fileGambar != '') {
            $namaGambar = $fileGambar->getName();
            $dataUpdate['foto_siswa'] = $namaGambar;
            if ($this->request->getVar('txtGambarLama') != 'download.png') {
                # melihat data yang lama di database dan menghapusnya jika ada
                $siswa = $this->siswaModel->find($id);
                if (file_exists(ROOTPATH . 'public/img/' . $siswa['foto_siswa'])) {
                    unlink(ROOTPATH . 'public/img/' . $siswa['foto_siswa']);
                }
                $fileGambar->move(ROOTPATH . 'public/img', $namaGambar);
            } else {
                // pindah file
                $fileGambar->move(ROOTPATH . 'public/img', $namaGambar);
            }
        }
        // dd($dataUpdate);
        $this->siswaModel->save($dataUpdate);

        session()->setFlashdata('pesan', 'Siswa Telah Diupdate!');
        return redirect()->to('/admin/siswa');
    }

    public function deleteSiswa($id)
    {
        $siswa = $this->siswaModel->find($id);

        // cek gambar default
        if ($siswa['foto_siswa'] != 'download.png') {
            // hapus gambar
            unlink('img/' . $siswa['foto_siswa']);
        }

        $this->siswaModel->delete($id);
        session()->setFlashdata('pesan', 'Siswa Lama Telah Terhapus!');
        return redirect()->to('/admin/siswa');
    }

    // CONTACT ~ CONTACT
    public function contact()
    {
        $layout = $this->db->table('layout');
        $queryLayout = $layout->get()->getRowArray();
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Admin | Contact'
        ];
        // return view('welcome_message');
        return view('admin/contact', $data);
    }

    // CONFIG STATUS ~ CONFIG STATUS
    public function setting()
    {
        // History Login
        $logData = $this->db->table('auth_logins')->orderBy('date', 'desc');
        $histLog = $logData->get()->getResultArray();

        // Status Absen
        $configPAS = $this->db->table('configstatus')->where('nama_config', 'Status PAS')->get()->getRowArray();
        $statusPas = $configPAS['value'];

        $configJgmeet = $this->db->table('configstatus')->where('nama_config', 'Status JGMEET')->get()->getRowArray();
        $statusJgmeet = $configJgmeet['value'];

        $configJtugas = $this->db->table('configstatus')->where('nama_config', 'Status JTUGAS')->get()->getRowArray();
        $statusJtugas = $configJtugas['value'];

        $configJpiket = $this->db->table('configstatus')->where('nama_config', 'Status JPiket')->get()->getRowArray();
        $statusJpiket = $configJpiket['value'];

        // Status Absen
        $ConfigAbsen = $this->db->table('configstatus')->where('nama_config', 'Status Absen')->get()->getRowArray();
        $statusAbsen = $ConfigAbsen['value'];


        $layout = $this->db->table('layout');
        $config = $this->db->table('configstatus');
        $queryLayout = $layout->get()->getRowArray();
        $queryConfig = $config->get()->getResultArray();
        $queryConfig2 = $config->get()->getRowArray();
        $data = [
            'layout' => $queryLayout,
            'config' => $queryConfig,
            'cnfg' => $queryConfig2,
            'title' => 'Intelligence Class - Admin | Config Status',
            'statusPas' => $statusPas,
            'statusJgmeet' => $statusJgmeet,
            'statusJtugas' => $statusJtugas,
            'statusJpiket' => $statusJpiket,
            'statusAbsen' => $statusAbsen,
            'historyLogin' => $histLog,
        ];
        // return view('welcome_message');
        return view('admin/setting', $data);
    }
    public function configAbsen()
    {

        //cek request apakah xhr/ajax
        if (!$this->request->isAjax()) {
            exit('page not found');
        }
        //ambil data dari post
        $data = [
            'value' => (int) $this->request->getPost('configabsen')
        ];

        //update data

        // configModel = new configModel()
        if ($this->configModel->update('Status Absen', $data)) {
            return $this->respondUpdated();
        }
        //gagal update
        return $this->configModel->errors();
    }
    public function configjpas()
    {

        //cek request apakah xhr/ajax
        if (!$this->request->isAjax()) {
            exit('page not found');
        }
        //ambil data dari post
        $data = [
            'value' => (int) $this->request->getPost('configjpas')
        ];

        //update data

        // configModel = new configModel()
        if ($this->configModel->update('Status PAS', $data)) {
            return $this->respondUpdated();
        }
        //gagal update
        return $this->configModel->errors();
    }
    public function configjgmeet()
    {

        //cek request apakah xhr/ajax
        if (!$this->request->isAjax()) {
            exit('page not found');
        }
        //ambil data dari post
        $data = [
            'value' => (int) $this->request->getPost('configjgmeet')
        ];

        //update data

        // configModel = new configModel()
        if ($this->configModel->update('Status JGMEET', $data)) {
            return $this->respondUpdated();
        }
        //gagal update
        return $this->configModel->errors();
    }
    public function configjtugas()
    {

        //cek request apakah xhr/ajax
        if (!$this->request->isAjax()) {
            exit('page not found');
        }
        //ambil data dari post
        $data = [
            'value' => (int) $this->request->getPost('configjtugas')
        ];

        //update data

        // configModel = new configModel()
        if ($this->configModel->update('Status JTUGAS', $data)) {
            return $this->respondUpdated();
        }
        //gagal update
        return $this->configModel->errors();
    }
    public function configjpiket()
    {

        //cek request apakah xhr/ajax
        if (!$this->request->isAjax()) {
            exit('page not found');
        }
        //ambil data dari post
        $data = [
            'value' => (int) $this->request->getPost('configjpiket')
        ];

        //update data

        // configModel = new configModel()
        if ($this->configModel->update('Status JPiket', $data)) {
            return $this->respondUpdated();
        }
        //gagal update
        return $this->configModel->errors();
    }
    public function configjoffline()
    {

        //cek request apakah xhr/ajax
        if (!$this->request->isAjax()) {
            exit('page not found');
        }
        //ambil data dari post
        $data = [
            'value' => (int) $this->request->getPost('configjoffline')
        ];

        //update data

        // configModel = new configModel()
        if ($this->configModel->update('Status JOffline', $data)) {
            return $this->respondUpdated();
        }
        //gagal update
        return $this->configModel->errors();
    }
    public function configuangkas()
    {

        //cek request apakah xhr/ajax
        if (!$this->request->isAjax()) {
            exit('page not found');
        }
        //ambil data dari post
        $data = [
            'value' => (int) $this->request->getPost('configuangkas')
        ];

        //update data

        // configModel = new configModel()
        if ($this->configModel->update('Status UangKas', $data)) {
            return $this->respondUpdated();
        }
        //gagal update
        return $this->configModel->errors();
    }
}
