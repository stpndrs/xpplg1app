<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use App\Models\LayoutModel;
use App\Models\UangKasModel;
use App\Models\SiswaModel;
use App\Models\TransaksiModel;

class Bendahara extends BaseController
{

    protected $db;
    protected $layoutModel;
    protected $uangkasModel;
    protected $siswaModel;
    protected $transaksiModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->layoutModel = new LayoutModel();
        $this->uangkasModel = new UangkasModel();
        $this->siswaModel = new SiswaModel();
        $this->transaksiModel = new TransaksiModel();
    }
    public function index()
    {
        $queryLayout = $this->db->table('layout')->get()->getRowArray();
        $bulan = $this->request->getVar('bulanfilter');
        if (empty($bulan)) {
            $mg1 = $this->db
                ->table('uangkas')
                ->selectCount('minggu1_pembayaran')
                ->where('minggu1_pembayaran', 1)
                ->get()->getRowArray();
            $mg2 = $this->db
                ->table('uangkas')
                ->selectCount('minggu2_pembayaran')
                ->where('minggu2_pembayaran', 1)
                ->get()->getRowArray();
            $mg3 = $this->db
                ->table('uangkas')
                ->selectCount('minggu3_pembayaran')
                ->where('minggu3_pembayaran', 1)
                ->get()->getRowArray();
            $mg4 = $this->db
                ->table('uangkas')
                ->selectCount('minggu4_pembayaran')
                ->where('minggu4_pembayaran', 1)
                ->get()->getRowArray();

            $total = $this->db->table('uangkas')->selectSum('jumlah_pembayaran')->get()->getRowArray();

            $totalmasuk = $this->db->table('transaksi')->selectSum('jumlah_transaksi')->where('jenis_transaksi', 'Pemasukan')->get()->getRowArray();

            $totalkeluar = $this->db->table('transaksi')->selectSum('jumlah_transaksi')->where('jenis_transaksi', 'Pengeluaran')->get()->getRowArray();
        } else {
            $mg1 = $this->db
                ->table('uangkas')
                ->selectCount('minggu1_pembayaran')
                ->where('minggu1_pembayaran', 1)
                ->where('MONTH(tanggal_pembayaran) = ' . date('m', strtotime($bulan)))
                ->where('YEAR(tanggal_pembayaran) = ' . date('Y', strtotime($bulan)))
                ->get()->getRowArray();
            $mg2 = $this->db
                ->table('uangkas')
                ->selectCount('minggu2_pembayaran')
                ->where('minggu2_pembayaran', 1)
                ->where('MONTH(tanggal_pembayaran) = ' . date('m', strtotime($bulan)))
                ->where('YEAR(tanggal_pembayaran) = ' . date('Y', strtotime($bulan)))
                ->get()->getRowArray();
            $mg3 = $this->db
                ->table('uangkas')
                ->selectCount('minggu3_pembayaran')
                ->where('minggu3_pembayaran', 1)
                ->where('MONTH(tanggal_pembayaran) = ' . date('m', strtotime($bulan)))
                ->where('YEAR(tanggal_pembayaran) = ' . date('Y', strtotime($bulan)))
                ->get()->getRowArray();
            $mg4 = $this->db
                ->table('uangkas')
                ->selectCount('minggu4_pembayaran')
                ->where('minggu4_pembayaran', 1)
                ->where('MONTH(tanggal_pembayaran) = ' . date('m', strtotime($bulan)))
                ->where('YEAR(tanggal_pembayaran) = ' . date('Y', strtotime($bulan)))
                ->get()->getRowArray();


            $total = $this->db
                ->table('uangkas')
                ->selectSum('jumlah_pembayaran')
                ->where('MONTH(tanggal_pembayaran) = ' . date('m', strtotime($bulan)))
                ->where('YEAR(tanggal_pembayaran) = ' . date('Y', strtotime($bulan)))
                ->get()->getRowArray();

            $totalmasuk = $this->db
                ->table('transaksi')
                ->selectSum('jumlah_transaksi')
                ->where('jenis_transaksi', 'Pemasukan')
                ->where('MONTH(tanggal_transaksi) = ' . date('m', strtotime($bulan)))
                ->where('YEAR(tanggal_transaksi) = ' . date('Y', strtotime($bulan)))
                ->get()->getRowArray();

            $totalkeluar = $this->db
                ->table('transaksi')
                ->selectSum('jumlah_transaksi')
                ->where('jenis_transaksi', 'Pengeluaran')
                ->where('MONTH(tanggal_transaksi) = ' . date('m', strtotime($bulan)))
                ->where('YEAR(tanggal_transaksi) = ' . date('Y', strtotime($bulan)))
                ->get()->getRowArray();
        }


        // dd($mg1);
        $data = [
            'title' => 'Intelligence Class - Bendahara',
            'layout' => $queryLayout,
            'mg1' => $mg1,
            'mg2' => $mg2,
            'mg3' => $mg3,
            'mg4' => $mg4,
            'bulan' => $bulan,
            'total' => $total,
            'totalmasuk' => $totalmasuk,
            'totalkeluar' => $totalkeluar,
        ];
        return view('bendahara/home', $data);
    }

    public function transaksi()
    {
        $queryLayout = $this->db->table('layout')->get()->getRowArray();

        $queryTransaksi = $this->db->table('transaksi')->orderBy('id_transaksi', 'DESC');

        $data = [
            'title' => 'Intelligence Class - Bendahara | Transaksi ',
            'layout' => $queryLayout,
            'transaksi' => $queryTransaksi,
        ];
        return view('bendahara/transaksi/transaksi', $data);
    }

    public function transaksipengeluaran()
    {
        $queryLayout = $this->db->table('layout')->get()->getRowArray();

        $queryTransaksi = $this->db->table('transaksi')->where('jenis_transaksi', 'Pengeluaran')->get()->getResultArray();

        $queryTotal = $this->db->table('transaksi')->where('jenis_transaksi', 'Pengeluaran')->selectSum('jumlah_transaksi')->get()->getRowArray();
        $data = [
            'title' => 'Intelligence Class - Bendahara | Transaksi ',
            'layout' => $queryLayout,
            'transaksi' => $queryTransaksi,
            'totalpengeluaran' => $queryTotal,
        ];
        return view('bendahara/transaksi/pengeluaran', $data);
    }
    public function addTransPengeluaran()
    {
        $queryLayout = $this->db->table('layout')->get()->getRowArray();
        $data = [
            'title' => 'Intelligence Class - Bendahara | Tambah Transaksi Pengeluaran',
            'layout' => $queryLayout,
            'validation' => \Config\Services::validation(),
        ];
        return view('bendahara/transaksi/addTransaksiPengeluaran', $data);
    }
    public function saveTransPengeluaran()
    {
        if (!$this->validate([
            'txtOleh' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Tidak Boleh Kosong!'
                ]
            ],
            'txtTgl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Tidak Boleh Kosong!'
                ]
            ],
            'txtJnsBrg' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Barang Tidak Boleh Kosong!'
                ]
            ],
            'numJumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah Pengeluaran Tidak Boleh Kosong!'
                ]
            ],
            // 'txtUraian' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Uraian Tidak Boleh Kosong!'
            //     ]
            // ],
            // 'txtGambarBrg' => [
            //     'rules' => 'mime_in[txtGambar,image/jpg,image/jpeg,image/png]',
            //     'errors' => [
            //         // 'max_size' => 'Ukuran gambar terlalu besar',
            //         'is_image' => 'Hanya Gambar Yang Diperbolehkan!',
            //         'mime_in' => 'Hanya Gambar Yang Diperbolehkan!'
            //     ]
            // ],
            // 'txtGambarNota' => [
            //     'rules' => 'mime_in[txtGambar,image/jpg,image/jpeg,image/png]',
            //     'errors' => [
            //         // 'max_size' => 'Ukuran gambar terlalu besar',
            //         'is_image' => 'Hanya Gambar Yang Diperbolehkan!',
            //         'mime_in' => 'Hanya Gambar Yang Diperbolehkan!'
            //     ]
            // ],
        ])) {
            return redirect()->to('/bendahara/addTransPengeluaran')->withInput();
        }

        // ambil gambar
        $fileGambarBrg = $this->request->getFile('txtGambarBrg');
        // cek ada gambar atau tidak
        if ($fileGambarBrg->getError() == 4) {
            $namaGambarBrg = 'no-image.png';
        } else {
            // generate nama foto
            $namaGambarBrg = $fileGambarBrg->getName();
            // pindah file
            $fileGambarBrg->move('buktibrgtransaksi', $namaGambarBrg);
        }
        // ambil gambar
        $fileGambarNota = $this->request->getFile('txtGambarNota');
        // cek ada gambar atau tidak
        if ($fileGambarNota->getError() == 4) {
            $namaGambarNota = 'no-image.png';
        } else {
            // generate nama foto
            $namaGambarNota = $fileGambarNota->getName();
            // pindah file
            $fileGambarNota->move('buktinotatransaksi', $namaGambarNota);
        }

        $this->transaksiModel->save([
            'oleh_transaksi' => $this->request->getVar('txtOleh'),
            'tanggal_transaksi' => date('Y-m-d', strtotime($this->request->getVar('txtTgl'))),
            'jenisbrg_transaksi' => $this->request->getVar('txtJnsBrg'),
            'jumlah_transaksi' => $this->request->getVar('numJumlah'),
            'jenis_transaksi' => 'Pengeluaran',
            'uraian_transaksi' => $this->request->getVar('txtUraian'),
            'buktibrg_transaksi' => $namaGambarBrg,
            'buktinota_transaksi' => $namaGambarNota,
        ]);

        session()->setFlashdata('pesan', 'Data Transaksi Dengan Jenis Barang <b>' . $this->request->getVar('txtJnsBrg') . '</b> Dan Pada Tanggal <b>' . $this->request->getVar('txtTgl') . '</b> Telah Ditambah!');
        return redirect()->to('/bendahara/transaksipengeluaran');
    }
    public function deleteTransaksiPengeluaran($id)
    {
        $this->transaksiModel->delete($id);
        session()->setFlashdata('pesan', 'Data Transaksi Telah Terhapus!');
        return redirect()->to('/bendahara/transaksipengeluaran');
    }

    public function transaksipemasukan()
    {
        $queryLayout = $this->db->table('layout')->get()->getRowArray();

        $queryTransaksi = $this->db->table('transaksi')->where('jenis_transaksi', 'Pemasukan')->get()->getResultArray();

        $queryTotal = $this->db->table('transaksi')->where('jenis_transaksi', 'Pemasukan')->selectSum('jumlah_transaksi')->get()->getRowArray();

        $data = [
            'title' => 'Intelligence Class - Bendahara | Transaksi ',
            'layout' => $queryLayout,
            'transaksi' => $queryTransaksi,
            'totalpemasukan' => $queryTotal
        ];
        return view('bendahara/transaksi/pemasukan', $data);
    }
    public function addTransPemasukan()
    {
        $queryLayout = $this->db->table('layout')->get()->getRowArray();
        $data = [
            'title' => 'Intelligence Class - Bendahara | Tambah Transaksi Pengeluaran',
            'layout' => $queryLayout,
            'validation' => \Config\Services::validation(),
        ];
        return view('bendahara/transaksi/addTransaksiPemasukan', $data);
    }
    public function saveTransPemasukan()
    {
        // d(date('l, d F Y'));
        // $tgl = $this->request->getVar('txtTgl');
        // dd(date('Y-m-d', strtotime($tgl)));
        // ccek validasi input
        if (!$this->validate([
            'txtOleh' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Tidak Boleh Kosong!'
                ]
            ],
            'txtTgl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Tidak Boleh Kosong!'
                ]
            ],
            'numJumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah Pengeluaran Tidak Boleh Kosong!'
                ]
            ],
            // 'txtUraian' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Uraian Tidak Boleh Kosong!'
            //     ]
            // ],
            // 'txtGambarBrg' => [
            //     'rules' => 'mime_in[txtGambar,image/jpg,image/jpeg,image/png]',
            //     'errors' => [
            //         // 'max_size' => 'Ukuran gambar terlalu besar',
            //         'is_image' => 'Hanya Gambar Yang Diperbolehkan!',
            //         'mime_in' => 'Hanya Gambar Yang Diperbolehkan!'
            //     ]
            // ],
            // 'txtGambarNota' => [
            //     'rules' => 'mime_in[txtGambar,image/jpg,image/jpeg,image/png]',
            //     'errors' => [
            //         // 'max_size' => 'Ukuran gambar terlalu besar',
            //         'is_image' => 'Hanya Gambar Yang Diperbolehkan!',
            //         'mime_in' => 'Hanya Gambar Yang Diperbolehkan!'
            //     ]
            // ],
        ])) {
            return redirect()->to('/bendahara/addTransPemasukan')->withInput();
        }

        // ambil gambar
        $fileGambarNota = $this->request->getFile('txtGambarNota');
        // cek ada gambar atau tidak
        if ($fileGambarNota->getError() == 4) {
            $namaGambarNota = 'no-image.png';
        } else {
            // generate nama foto
            $namaGambarNota = $fileGambarNota->getName();
            // pindah file
            $fileGambarNota->move('buktinotatransaksi', $namaGambarNota);
        }

        $this->transaksiModel->save([
            'oleh_transaksi' => $this->request->getVar('txtOleh'),
            'tanggal_transaksi' => date('Y-m-d', strtotime($this->request->getVar('txtTgl'))),
            'jumlah_transaksi' => $this->request->getVar('numJumlah'),
            'jenis_transaksi' => 'Pemasukan',
            'uraian_transaksi' => $this->request->getVar('txtUraian'),
            'buktinota_transaksi' => $namaGambarNota,
        ]);

        session()->setFlashdata('pesan', 'Data Transaksi Dengan Jenis Barang <b>' . $this->request->getVar('txtJnsBrg') . '</b> Dan Pada Tanggal <b>' . $this->request->getVar('txtTgl') . '</b> Telah Ditambah!');
        return redirect()->to('/bendahara/transaksipemasukan');
    }
    public function deleteTransaksiPemasukan($id)
    {
        $this->transaksiModel->delete($id);
        session()->setFlashdata('pesan', 'Data Transaksi Telah Terhapus!');
        return redirect()->to('/bendahara/transaksipemasukan');
    }

    public function editTransaksi($id)
    {
        $queryLayout = $this->db->table('layout')->get()->getRowArray();
        $data = [
            'layout' => $queryLayout,
            'title' => 'Intelligence Class - Bendahara | Edit Transaksi',
            'validation' => \Config\Services::validation(),
            'trs' => $this->transaksiModel->getTransaksi($id)
        ];
        return view('bendahara/transaksi/editTransaksi', $data);
    }
    public function updateTrans($id)
    {
        if ($this->request->getVar('jenistransaksi') == 'Pengeluaran') {
            // ccek validasi input
            if (!$this->validate([
                'txtOleh' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Tidak Boleh Kosong!'
                    ]
                ],
                'txtTgl' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Tidak Boleh Kosong!'
                    ]
                ],
                'txtJnsBrg' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Barang Tidak Boleh Kosong!'
                    ]
                ],
                'numJumlah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jumlah Pengeluaran Tidak Boleh Kosong!'
                    ]
                ],
            ])) {
                return redirect()->to('/bendahara/editTransaksi/' . $this->request->getVar('txtId'))->withInput();
            }

            $dataUpdate = [
                'id_transaksi' => $id,
                'oleh_transaksi' => $this->request->getVar('txtOleh'),
                'tanggal_transaksi' => date('Y-m-d', strtotime($this->request->getVar('txtTgl'))),
                'jenisbrg_transaksi' => $this->request->getVar('txtJnsBrg'),
                'jumlah_transaksi' => $this->request->getVar('numJumlah'),
                'jenis_transaksi' => 'Pengeluaran',
                'uraian_transaksi' => $this->request->getVar('txtUraian'),
                // 'buktibrg_transaksi' => $namaGambarBrg,
                // 'buktinota_transaksi' => $namaGambarNota,
            ];

            // ambil gambar
            $fileGambarBrg = $this->request->getFile('txtGambarBrg');
            // cek ada gambar atau tidak
            if ($fileGambarBrg != '') {
                $namaGambarBrg = $fileGambarBrg->getName();
                $dataUpdate['buktibrg_transaksi'] = $namaGambarBrg;
                if ($this->request->getVar('txtGambarLamaBrg') != 'no-image.png') {
                    # melihat data yang lama di database dan menghapusnya jika ada
                    $gbr = $this->transaksiModel->find($id);
                    if (file_exists(ROOTPATH . 'public/buktibrgtransaksi/' . $gbr['buktibrg_transaksi'])) {
                        unlink(ROOTPATH . 'public/buktibrgtransaksi/' . $gbr['buktibrg_transaksi']);
                    }
                    $fileGambarBrg->move(ROOTPATH . 'public/buktibrgtransaksi', $namaGambarBrg);
                } else {
                    // pindah file
                    $fileGambarBrg->move(ROOTPATH . 'public/buktibrgtransaksi', $namaGambarBrg);
                }
            }

            // ambil gambar
            $fileGambarNota = $this->request->getFile('txtGambarNota');
            // cek ada gambar atau tidak
            if ($fileGambarNota != '') {
                $namaGambarNota = $fileGambarNota->getName();
                $dataUpdate['buktinota_transaksi'] = $namaGambarNota;
                if ($this->request->getVar('txtGambarLamaNota') != 'no-image.png') {
                    # melihat data yang lama di database dan menghapusnya jika ada
                    $gbr = $this->transaksiModel->find($id);
                    if (file_exists(ROOTPATH . 'public/buktinotatransaksi/' . $gbr['buktinota_transaksi'])) {
                        unlink(ROOTPATH . 'public/buktinotatransaksi/' . $gbr['buktinota_transaksi']);
                    }
                    $fileGambarNota->move(ROOTPATH . 'public/buktinotatransaksi', $namaGambarNota);
                } else {
                    // pindah file
                    $fileGambarNota->move(ROOTPATH . 'public/buktinotatransaksi', $namaGambarNota);
                }
            }

            // dd($dataUpdate);
            $this->transaksiModel->save($dataUpdate);

            session()->setFlashdata('pesan', 'Data Transaksi Dengan Jenis Barang <b>' . $this->request->getVar('txtJnsBrg') . '</b> Dan Pada Tanggal <b>' . $this->request->getVar('txtTgl') . '</b> Telah Diupdate!');
            return redirect()->to('/bendahara/transaksipengeluaran');
        } else {
            if (!$this->validate([
                'txtOleh' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Tidak Boleh Kosong!'
                    ]
                ],
                'txtTgl' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Tidak Boleh Kosong!'
                    ]
                ],
                'numJumlah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jumlah Pengeluaran Tidak Boleh Kosong!'
                    ]
                ],
            ])) {
                return redirect()->to('/bendahara/editTransaksi/' . $this->request->getVar('txtId'))->withInput();
            }

            $dataUpdate = [
                'id_transaksi' => $id,
                'oleh_transaksi' => $this->request->getVar('txtOleh'),
                'tanggal_transaksi' => date('Y-m-d', strtotime($this->request->getVar('txtTgl'))),
                'jenisbrg_transaksi' => $this->request->getVar('txtJnsBrg'),
                'jumlah_transaksi' => $this->request->getVar('numJumlah'),
                'jenis_transaksi' => 'Pemasukan',
                'uraian_transaksi' => $this->request->getVar('txtUraian'),
                // 'buktibrg_transaksi' => $namaGambarBrg,
                // 'buktinota_transaksi' => $namaGambarNota,
            ];

            // ambil gambar
            $fileGambarBrg = $this->request->getFile('txtGambarBrg');
            // cek ada gambar atau tidak
            if ($fileGambarBrg != '') {
                $namaGambarBrg = $fileGambarBrg->getName();
                $dataUpdate['buktibrg_transaksi'] = $namaGambarBrg;
                if ($this->request->getVar('txtGambarLamaBrg') != 'no-image.png') {
                    # melihat data yang lama di database dan menghapusnya jika ada
                    $gbr = $this->transaksiModel->find($id);
                    if (file_exists(ROOTPATH . 'public/buktibrgtransaksi/' . $gbr['buktibrg_transaksi'])) {
                        unlink(ROOTPATH . 'public/buktibrgtransaksi/' . $gbr['buktibrg_transaksi']);
                    }
                    $fileGambarBrg->move(ROOTPATH . 'public/buktibrgtransaksi', $namaGambarBrg);
                } else {
                    // pindah file
                    $fileGambarBrg->move(ROOTPATH . 'public/buktibrgtransaksi', $namaGambarBrg);
                }
            }

            // ambil gambar
            $fileGambarNota = $this->request->getFile('txtGambarNota');
            // cek ada gambar atau tidak
            if ($fileGambarNota != '') {
                $namaGambarNota = $fileGambarNota->getName();
                $dataUpdate['buktinota_transaksi'] = $namaGambarNota;
                if ($this->request->getVar('txtGambarLamaNota') != 'no-image.png') {
                    # melihat data yang lama di database dan menghapusnya jika ada
                    $gbr = $this->transaksiModel->find($id);
                    if (file_exists(ROOTPATH . 'public/buktinotatransaksi/' . $gbr['buktinota_transaksi'])) {
                        unlink(ROOTPATH . 'public/buktinotatransaksi/' . $gbr['buktinota_transaksi']);
                    }
                    $fileGambarNota->move(ROOTPATH . 'public/buktinotatransaksi', $namaGambarNota);
                } else {
                    // pindah file
                    $fileGambarNota->move(ROOTPATH . 'public/buktinotatransaksi', $namaGambarNota);
                }
            }

            // dd($dataUpdate);
            $this->transaksiModel->save($dataUpdate);

            session()->setFlashdata('pesan', 'Data Transaksi Pada Tanggal <b>' . $this->request->getVar('txtTgl') . '</b> Telah Diupdate!');
            return redirect()->to('/bendahara/transaksipemasukan');
        }
    }

    public function datakas()
    {
        $queryLayout = $this->db->table('layout')->get()->getRowArray();

        $bulan = $this->request->getVar('bulanfilter');

        // dd($bulan);

        // dd($bulan, $blnakhir);
        if (empty($bulan)) {
            // query data uang kas
            $this->uangkasModel->join('siswa', 'siswa.id_siswa = uangkas.id_siswa', 'siswa.absen_siswa = uangkas.absen_siswa', 'siswa.id_siswa', 'siswa.nama_siswa', 'siswa.absen_siswa', 'uangkas.tanggal_pembayaran', 'uangkas.jumlah_pembayaran', 'inner');
            $queryUangKas = $this->uangkasModel->get()->getResultArray();

            $dataSiswa = $this->siswaModel->orderBy('absen_siswa', 'ASC')->get()->getResultArray();

            $row = 1;

            $arr = [];
            $lastId = 0;
            $x = 0;

            if (count($dataSiswa) > 0) {
                foreach ($dataSiswa as $rowSiswa) {
                    if ($lastId != $rowSiswa['id_siswa'] || $lastId === 0) {
                        $lastId = $rowSiswa['id_siswa'];
                        // dd($rowSiswa);
                        $arr[$x]['id_siswa'] = $rowSiswa['id_siswa'];
                        $arr[$x]['nama_siswa'] = $rowSiswa['nama_siswa'];
                        $arr[$x]['absen_siswa'] = $rowSiswa['absen_siswa'];

                        $dataUangKas = $this->uangkasModel
                            ->table('uangkas')
                            ->where('id_siswa', $rowSiswa['id_siswa'])
                            // ->where('MONTH(created_at) = 1')
                            ->get()->getResultArray();

                        if (count($dataUangKas) > 0) {
                            //   dd($dataUangKas);
                            $y = 0;
                            $total = 0;

                            foreach ($dataUangKas as $rowUangKas) {
                                $arr[$x][$y]['id_pembayaran'] = $rowUangKas['id_pembayaran'];
                                $arr[$x][$y]['tanggal_pembayaran'] = $rowUangKas['tanggal_pembayaran'];
                                $arr[$x][$y]['jumlah_pembayaran'] = $rowUangKas['jumlah_pembayaran'];
                                $arr[$x][$y]['keterangan_pembayaran'] = $rowUangKas['keterangan_pembayaran'];
                                $arr[$x][$y]['minggu1_pembayaran'] = $rowUangKas['minggu1_pembayaran'];
                                $arr[$x][$y]['minggu2_pembayaran'] = $rowUangKas['minggu2_pembayaran'];
                                $arr[$x][$y]['minggu3_pembayaran'] = $rowUangKas['minggu3_pembayaran'];
                                $arr[$x][$y]['minggu4_pembayaran'] = $rowUangKas['minggu4_pembayaran'];
                                $total += $rowUangKas['jumlah_pembayaran'];
                                // $arr[$x][$y]['jumlah_pembayaran'] = 0;

                                // $total += 0;
                                $y++;
                            }

                            $arr[$x]['total_pembayaran'] = $total;
                            $arr[$x]['total_data'] = $y;
                        } else {
                            $arr[$x]['total_pembayaran'] = 0;
                            $arr[$x]['total_data'] = 0;
                        }
                    }

                    $x++;
                }
            }

            // dd($arr);

            $queryTotalBulanan = $this->db->table('uangkas')->selectSum('jumlah_pembayaran')->get()->getRowArray();
            $jumlah = $queryTotalBulanan['jumlah_pembayaran'];

            $total = $this->db->table('uangkas')->selectSum('jumlah_pembayaran')->get()->getRowArray();

            $totalmasuk = $this->db->table('transaksi')->selectSum('jumlah_transaksi')->where('jenis_transaksi', 'Pemasukan')->get()->getRowArray();

            $totalkeluar = $this->db->table('transaksi')->selectSum('jumlah_transaksi')->where('jenis_transaksi', 'Pengeluaran')->get()->getRowArray();
        } else {
            // query data uang kas
            $this->uangkasModel->join('siswa', 'siswa.id_siswa = uangkas.id_siswa', 'siswa.absen_siswa = uangkas.absen_siswa', 'siswa.id_siswa', 'siswa.nama_siswa', 'siswa.absen_siswa', 'uangkas.tanggal_pembayaran', 'uangkas.jumlah_pembayaran', 'inner');
            $queryUangKas = $this->uangkasModel->get()->getResultArray();

            $dataSiswa = $this->siswaModel->get()->getResultArray();

            $row = 1;

            $arr = [];
            $lastId = 0;
            $x = 0;

            if (count($dataSiswa) > 0) {
                foreach ($dataSiswa as $rowSiswa) {
                    if ($lastId != $rowSiswa['id_siswa'] || $lastId === 0) {
                        $lastId = $rowSiswa['id_siswa'];
                        // dd($rowSiswa);
                        $arr[$x]['id_siswa'] = $rowSiswa['id_siswa'];
                        $arr[$x]['nama_siswa'] = $rowSiswa['nama_siswa'];
                        $arr[$x]['absen_siswa'] = $rowSiswa['absen_siswa'];

                        $dataUangKas = $this->uangkasModel
                            ->table('uangkas')
                            ->where('id_siswa', $rowSiswa['id_siswa'])
                            ->where('MONTH(tanggal_pembayaran) = ' . date('m', strtotime($bulan)))
                            ->where('YEAR(tanggal_pembayaran) = ' . date('Y', strtotime($bulan)))
                            ->get()->getResultArray();
                        // dd($dataUangKas);

                        if (count($dataUangKas) > 0) {
                            //   dd($dataUangKas);
                            $y = 0;
                            $total = 0;

                            foreach ($dataUangKas as $rowUangKas) {
                                $arr[$x][$y]['id_pembayaran'] = $rowUangKas['id_pembayaran'];
                                $arr[$x][$y]['tanggal_pembayaran'] = $rowUangKas['tanggal_pembayaran'];
                                $arr[$x][$y]['jumlah_pembayaran'] = $rowUangKas['jumlah_pembayaran'];
                                $arr[$x][$y]['keterangan_pembayaran'] = $rowUangKas['keterangan_pembayaran'];
                                $arr[$x][$y]['minggu1_pembayaran'] = $rowUangKas['minggu1_pembayaran'];
                                $arr[$x][$y]['minggu2_pembayaran'] = $rowUangKas['minggu2_pembayaran'];
                                $arr[$x][$y]['minggu3_pembayaran'] = $rowUangKas['minggu3_pembayaran'];
                                $arr[$x][$y]['minggu4_pembayaran'] = $rowUangKas['minggu4_pembayaran'];
                                $total += $rowUangKas['jumlah_pembayaran'];
                                // $arr[$x][$y]['jumlah_pembayaran'] = 0;

                                // $total += 0;
                                $y++;
                            }

                            $arr[$x]['total_pembayaran'] = $total;
                            $arr[$x]['total_data'] = $y;
                        } else {
                            $arr[$x]['total_pembayaran'] = 0;
                            $arr[$x]['total_data'] = 0;
                        }
                    }

                    $x++;
                }
            }

            // dd($arr);

            $queryTotalBulanan = $this->db->table('uangkas')->selectSum('jumlah_pembayaran')->where('MONTH(tanggal_pembayaran) = ' . date('m', strtotime($bulan)))->get()->getRowArray();
            $jumlah = $queryTotalBulanan['jumlah_pembayaran'];

            $total = $this->db
                ->table('uangkas')
                ->selectSum('jumlah_pembayaran')
                ->where('MONTH(tanggal_pembayaran) = ' . date('m', strtotime($bulan)))
                ->where('YEAR(tanggal_pembayaran) = ' . date('Y', strtotime($bulan)))
                ->get()->getRowArray();

            $totalmasuk = $this->db
                ->table('transaksi')
                ->selectSum('jumlah_transaksi')
                ->where('jenis_transaksi', 'Pemasukan')
                ->where('MONTH(tanggal_transaksi) = ' . date('m', strtotime($bulan)))
                ->where('YEAR(tanggal_transaksi) = ' . date('Y', strtotime($bulan)))
                ->get()->getRowArray();

            $totalkeluar = $this->db
                ->table('transaksi')
                ->selectSum('jumlah_transaksi')
                ->where('jenis_transaksi', 'Pengeluaran')
                ->where('MONTH(tanggal_transaksi) = ' . date('m', strtotime($bulan)))
                ->where('YEAR(tanggal_transaksi) = ' . date('Y', strtotime($bulan)))
                ->get()->getRowArray();
        }

        // dd($arr);

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $dtk = $this->uangkasModel->search($keyword);
        } else {
            $dtk = $this->uangkasModel;
        }

        $queryKas = $dtk->orderBy('id_pembayaran', 'DESC');
        $currentPage = $this->request->getVar('page_uangkas') ? $this->request->getVar('page_uangkas') : 1;
        $data = [
            'title' => 'Intelligence Class - Bendahara | Data Uang Kas',
            'layout' => $queryLayout,
            // 'kas' => $queryKas,
            'kas' => $queryKas->paginate(10, 'uangkas'),
            'pager' => $this->uangkasModel->pager,
            'currentPage' => $currentPage,
            'bulan' => $bulan,
            'total' => $jumlah,

            'uangkasData' => $arr,

            'totalsaldo' => $total,
            'totalmasuk' => $totalmasuk,
            'totalkeluar' => $totalkeluar,
        ];
        return view('bendahara/kas/datakas', $data);
    }
    public function addKas()
    {
        $queryLayout = $this->db->table('layout')->get()->getRowArray();

        $dataSiswa = $this->db->table('siswa')->orderBy('absen_siswa', 'ASC')->get()->getResultArray();

        $data = [
            'title' => 'Intelligence Class - Bendahara | Tambah Pembayaran Kas',
            'layout' => $queryLayout,
            'validation' => \Config\Services::validation(),
            'v' => $dataSiswa,
        ];
        return view('bendahara/kas/addKas', $data);
    }
    public function saveKas()
    {
        // ccek validasi input
        if (!$this->validate([
            // 'txtNoServ' => [
            //     'rules' => 'required|is_unique[service.no_serv]',
            //     'errors' => [
            //         'required' => 'Nomor Service Tidak Boleh Kosong!',
            //         'is_unique' => 'Nomor Service Tidak Boleh Sama!'
            //     ]
            // ],
            'txtNama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Tidak Boleh Kosong!'
                ]
            ],
            'txtTgl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Tidak Boleh Kosong!'
                ]
            ],
            'txtJmlh' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah Nominal Tidak Boleh Kosong!'
                ]
            ],
            // 'txtKeterangan' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Keterangan Tidak Boleh Kosong!'
            //     ]
            // ],
        ])) {
            return redirect()->to('/bendahara/addKas')->withInput();
        }
        // dd($this->request->getVar());
        if ($this->request->getVar('txtKeterangan') != '') {
            $ket = $this->request->getVar('txtKeterangan');
        } else {
            $ket = '-';
            // $ket = $this->request->getVar('txtKeterangan');
        }
        // dd($ket);

        $this->uangkasModel->save([
            'id_siswa' => $this->request->getVar('txtNama'),
            'tanggal_pembayaran' => date('Y-m-d', strtotime($this->request->getVar('txtTgl'))),
            'absen_siswa' => $this->request->getVar('txtNama'),
            'jumlah_pembayaran' => $this->request->getVar('txtJmlh'),
            'minggu1_pembayaran' => $this->request->getVar('chckMinggu1'),
            'minggu2_pembayaran' => $this->request->getVar('chckMinggu2'),
            'minggu3_pembayaran' => $this->request->getVar('chckMinggu3'),
            'minggu4_pembayaran' => $this->request->getVar('chckMinggu4'),
            'keterangan_pembayaran' => $ket,
        ]);

        session()->setFlashdata('pesan', 'Data Kas Dengan Absen <b>' . $this->request->getVar('txtNama') . '</b> Telah Ditambah!');
        return redirect()->to('/bendahara/datakas');
    }
    public function editKas($id)
    {
        $queryLayout = $this->db->table('layout')->get()->getRowArray();

        $dataSiswa = $this->siswaModel->get()->getResultArray();

        $data = [
            'title' => 'Intelligence Class - Bendahara | Tambah Pembayaran Kas',
            'layout' => $queryLayout,
            'validation' => \Config\Services::validation(),
            'guk' => $this->uangkasModel->getUangKas($id),
            'v' => $dataSiswa,
        ];
        return view('bendahara/kas/editKas', $data);
    }
    public function updateKas($id)
    {
        // ccek validasi input
        if (!$this->validate([
            // 'txtNoServ' => [
            //     'rules' => 'required|is_unique[service.no_serv]',
            //     'errors' => [
            //         'required' => 'Nomor Service Tidak Boleh Kosong!',
            //         'is_unique' => 'Nomor Service Tidak Boleh Sama!'
            //     ]
            // ],
            'txtNama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Tidak Boleh Kosong!'
                ]
            ],
            'txtTgl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Tidak Boleh Kosong!'
                ]
            ],
            'txtJmlh' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah Nominal Tidak Boleh Kosong!'
                ]
            ],
            // 'txtKeterangan' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Keterangan Tidak Boleh Kosong!'
            //     ]
            // ],
        ])) {
            return redirect()->to('/bendahara/editTrans/' . $this->request->getVar('txtId'))->withInput();
        }
        if ($this->request->getVar('txtKeterangan') != '') {
            $ket = $this->request->getVar('txtKeterangan');
        } else {
            $ket = '-';
            // $ket = $this->request->getVar('txtKeterangan');
        }
        // dd($this->request->getVar());
        $this->uangkasModel->save([
            'id_pembayaran' => $id,
            'id_siswa' => $this->request->getVar('txtNama'),
            'tanggal_pembayaran' => $this->request->getVar('txtTgl'),
            'absen_siswa' => $this->request->getVar('txtNama'),
            'jumlah_pembayaran' => $this->request->getVar('txtJmlh'),
            'minggu1_pembayaran' => $this->request->getVar('chckMinggu1'),
            'minggu2_pembayaran' => $this->request->getVar('chckMinggu2'),
            'minggu3_pembayaran' => $this->request->getVar('chckMinggu3'),
            'minggu4_pembayaran' => $this->request->getVar('chckMinggu4'),
            'keterangan_pembayaran' => $ket,
        ]);

        session()->setFlashdata('pesan', 'Data Kas Dengan Absen <b>' . $this->request->getVar('txtNama') . '</b> Telah Diedit!');
        return redirect()->to('/bendahara/datakas');
    }
    public function deleteDatakas($id)
    {
        $this->uangkasModel->delete($id);
        session()->setFlashdata('pesan', 'Data Kas Telah Terhapus!');
        return redirect()->to('/bendahara/datakas');
    }

    public function laporandatakas()
    {
        $queryLayout = $this->db->table('layout')->get()->getRowArray();


        $bulan = $this->request->getVar('bulanfilter');

        // dd($bulan);

        // dd($bulan, $blnakhir);
        if (empty($bulan)) {
            // query data uang kas
            $this->uangkasModel->join('siswa', 'siswa.id_siswa = uangkas.id_siswa', 'siswa.absen_siswa = uangkas.absen_siswa', 'siswa.id_siswa', 'siswa.nama_siswa', 'siswa.absen_siswa', 'uangkas.tanggal_pembayaran', 'uangkas.jumlah_pembayaran', 'inner');
            $queryUangKas = $this->uangkasModel->get()->getResultArray();

            $dataSiswa = $this->siswaModel->get()->getResultArray();

            $row = 1;

            $arr = [];
            $lastId = 0;
            $x = 0;

            if (count($dataSiswa) > 0) {
                foreach ($dataSiswa as $rowSiswa) {
                    if ($lastId != $rowSiswa['id_siswa'] || $lastId === 0) {
                        $lastId = $rowSiswa['id_siswa'];
                        // dd($rowSiswa);
                        $arr[$x]['id_siswa'] = $rowSiswa['id_siswa'];
                        $arr[$x]['nama_siswa'] = $rowSiswa['nama_siswa'];
                        $arr[$x]['absen_siswa'] = $rowSiswa['absen_siswa'];

                        $dataUangKas = $this->uangkasModel->table('uangkas')->where('id_siswa', $rowSiswa['id_siswa'])->get()->getResultArray();

                        if (count($dataUangKas) > 0) {
                            //   dd($dataUangKas);
                            $y = 0;
                            $total = 0;

                            foreach ($dataUangKas as $rowUangKas) {
                                $arr[$x][$y]['tanggal_pembayaran'] = $rowUangKas['tanggal_pembayaran'];
                                $arr[$x][$y]['jumlah_pembayaran'] = $rowUangKas['jumlah_pembayaran'];
                                $arr[$x][$y]['keterangan_pembayaran'] = $rowUangKas['keterangan_pembayaran'];
                                $arr[$x][$y]['minggu1_pembayaran'] = $rowUangKas['minggu1_pembayaran'];
                                $arr[$x][$y]['minggu2_pembayaran'] = $rowUangKas['minggu2_pembayaran'];
                                $arr[$x][$y]['minggu3_pembayaran'] = $rowUangKas['minggu3_pembayaran'];
                                $arr[$x][$y]['minggu4_pembayaran'] = $rowUangKas['minggu4_pembayaran'];
                                $total += $rowUangKas['jumlah_pembayaran'];
                                // $arr[$x][$y]['jumlah_pembayaran'] = 0;

                                // $total += 0;
                                $y++;
                            }

                            $arr[$x]['total_pembayaran'] = $total;
                            $arr[$x]['total_data'] = $y;
                        } else {
                            $arr[$x]['total_pembayaran'] = 0;
                            $arr[$x]['total_data'] = 0;
                        }
                    }

                    $x++;
                }
            }

            $queryTotalBulanan = $this->db->table('uangkas')->selectSum('jumlah_pembayaran')->get()->getRowArray();
            $jumlahBulanan = $queryTotalBulanan['jumlah_pembayaran'];
            $queryTotalTahunan = $this->db->table('uangkas')->selectSum('jumlah_pembayaran')->get()->getRowArray();
            $jumlahTahunan = $queryTotalTahunan['jumlah_pembayaran'];

            // dd($queryTotalTahunan);


            $totalmasuk = $this->db->table('transaksi')->selectSum('jumlah_transaksi')->where('jenis_transaksi', 'Pemasukan')->get()->getRowArray();

            $totalkeluar = $this->db->table('transaksi')->selectSum('jumlah_transaksi')->where('jenis_transaksi', 'Pengeluaran')->get()->getRowArray();
        } else {
            // query data uang kas
            $this->uangkasModel->join('siswa', 'siswa.id_siswa = uangkas.id_siswa', 'siswa.absen_siswa = uangkas.absen_siswa', 'siswa.id_siswa', 'siswa.nama_siswa', 'siswa.absen_siswa', 'uangkas.tanggal_pembayaran', 'uangkas.jumlah_pembayaran', 'inner');
            $queryUangKas = $this->uangkasModel->get()->getResultArray();

            $dataSiswa = $this->siswaModel->get()->getResultArray();

            $row = 1;

            $arr = [];
            $lastId = 0;
            $x = 0;

            if (count($dataSiswa) > 0) {
                foreach ($dataSiswa as $rowSiswa) {
                    if ($lastId != $rowSiswa['id_siswa'] || $lastId === 0) {
                        $lastId = $rowSiswa['id_siswa'];
                        // dd($rowSiswa);
                        $arr[$x]['id_siswa'] = $rowSiswa['id_siswa'];
                        $arr[$x]['nama_siswa'] = $rowSiswa['nama_siswa'];
                        $arr[$x]['absen_siswa'] = $rowSiswa['absen_siswa'];

                        $dataUangKas = $this->uangkasModel
                            ->table('uangkas')
                            ->where('id_siswa', $rowSiswa['id_siswa'])
                            ->where('MONTH(tanggal_pembayaran) = ' . date('m', strtotime($bulan)))
                            ->where('YEAR(tanggal_pembayaran) = ' . date('Y', strtotime($bulan)))
                            ->get()->getResultArray();
                        // dd($dataUangKas);

                        if (count($dataUangKas) > 0) {
                            //   dd($dataUangKas);
                            $y = 0;
                            $total = 0;

                            foreach ($dataUangKas as $rowUangKas) {
                                $arr[$x][$y]['tanggal_pembayaran'] = $rowUangKas['tanggal_pembayaran'];
                                $arr[$x][$y]['jumlah_pembayaran'] = $rowUangKas['jumlah_pembayaran'];
                                $arr[$x][$y]['keterangan_pembayaran'] = $rowUangKas['keterangan_pembayaran'];
                                $arr[$x][$y]['minggu1_pembayaran'] = $rowUangKas['minggu1_pembayaran'];
                                $arr[$x][$y]['minggu2_pembayaran'] = $rowUangKas['minggu2_pembayaran'];
                                $arr[$x][$y]['minggu3_pembayaran'] = $rowUangKas['minggu3_pembayaran'];
                                $arr[$x][$y]['minggu4_pembayaran'] = $rowUangKas['minggu4_pembayaran'];
                                $total += $rowUangKas['jumlah_pembayaran'];
                                // $arr[$x][$y]['jumlah_pembayaran'] = 0;

                                // $total += 0;
                                $y++;
                            }

                            $arr[$x]['total_pembayaran'] = $total;
                            $arr[$x]['total_data'] = $y;
                        } else {
                            $arr[$x]['total_pembayaran'] = 0;
                            $arr[$x]['total_data'] = 0;
                        }
                    }

                    $x++;
                }
            }

            $queryTotalBulanan = $this->db->table('uangkas')->selectSum('jumlah_pembayaran')->where('MONTH(tanggal_pembayaran) = ' . date('m', strtotime($bulan)))->get()->getRowArray();
            $jumlahBulanan = $queryTotalBulanan['jumlah_pembayaran'];

            $queryTotalTahunan = $this->db->table('uangkas')->selectSum('jumlah_pembayaran')->where('YEAR(tanggal_pembayaran) = ' . date('Y', strtotime($bulan)))->get()->getRowArray();
            $jumlahTahunan = $queryTotalTahunan['jumlah_pembayaran'];

            $totalmasuk = $this->db
                ->table('transaksi')
                ->selectSum('jumlah_transaksi')
                ->where('jenis_transaksi', 'Pemasukan')
                ->where('MONTH(tanggal_transaksi) = ' . date('m', strtotime($bulan)))
                ->where('YEAR(tanggal_transaksi) = ' . date('Y', strtotime($bulan)))
                ->get()->getRowArray();

            $totalkeluar = $this->db
                ->table('transaksi')
                ->selectSum('jumlah_transaksi')
                ->where('jenis_transaksi', 'Pengeluaran')
                ->where('MONTH(tanggal_transaksi) = ' . date('m', strtotime($bulan)))
                ->where('YEAR(tanggal_transaksi) = ' . date('Y', strtotime($bulan)))
                ->get()->getRowArray();

            // dd($queryTotalTahunan);
        }


        $data = [
            'title' => 'Intelligence Class - Bendahara | Laporan Data Kas',
            'layout' => $queryLayout,
            'uangkasData' => $arr,
            'totalBulanan' => $jumlahBulanan,
            'totalTahunan' => $jumlahTahunan,
            'bulan' => $bulan,

            'totalmasuk' => $totalmasuk,
            'totalkeluar' => $totalkeluar,
        ];
        return view('bendahara/laporan/laporankas', $data);
    }
    public function cetak()
    {
        $queryLayout = $this->db->table('layout')->get()->getRowArray();

        $bulan = $this->request->getVar('bulanfilter');

        // dd($bulan);

        // dd($bulan, $blnakhir);
        if (empty($bulan)) {
            // query data uang kas
            $this->uangkasModel->join('siswa', 'siswa.id_siswa = uangkas.id_siswa', 'siswa.absen_siswa = uangkas.absen_siswa', 'siswa.id_siswa', 'siswa.nama_siswa', 'siswa.absen_siswa', 'uangkas.tanggal_pembayaran', 'uangkas.jumlah_pembayaran', 'inner');
            $queryUangKas = $this->uangkasModel->get()->getResultArray();

            $dataSiswa = $this->siswaModel->get()->getResultArray();

            $row = 1;

            $arr = [];
            $lastId = 0;
            $x = 0;

            if (count($dataSiswa) > 0) {
                foreach ($dataSiswa as $rowSiswa) {
                    if ($lastId != $rowSiswa['id_siswa'] || $lastId === 0) {
                        $lastId = $rowSiswa['id_siswa'];
                        // dd($rowSiswa);
                        $arr[$x]['id_siswa'] = $rowSiswa['id_siswa'];
                        $arr[$x]['nama_siswa'] = $rowSiswa['nama_siswa'];
                        $arr[$x]['absen_siswa'] = $rowSiswa['absen_siswa'];

                        $dataUangKas = $this->uangkasModel->table('uangkas')->where('id_siswa', $rowSiswa['id_siswa'])->get()->getResultArray();

                        if (count($dataUangKas) > 0) {
                            //   dd($dataUangKas);
                            $y = 0;
                            $total = 0;

                            foreach ($dataUangKas as $rowUangKas) {
                                $arr[$x][$y]['tanggal_pembayaran'] = $rowUangKas['tanggal_pembayaran'];
                                $arr[$x][$y]['jumlah_pembayaran'] = $rowUangKas['jumlah_pembayaran'];
                                $arr[$x][$y]['keterangan_pembayaran'] = $rowUangKas['keterangan_pembayaran'];
                                $arr[$x][$y]['minggu1_pembayaran'] = $rowUangKas['minggu1_pembayaran'];
                                $arr[$x][$y]['minggu2_pembayaran'] = $rowUangKas['minggu2_pembayaran'];
                                $arr[$x][$y]['minggu3_pembayaran'] = $rowUangKas['minggu3_pembayaran'];
                                $arr[$x][$y]['minggu4_pembayaran'] = $rowUangKas['minggu4_pembayaran'];
                                $total += $rowUangKas['jumlah_pembayaran'];
                                // $arr[$x][$y]['jumlah_pembayaran'] = 0;

                                // $total += 0;
                                $y++;
                            }

                            $arr[$x]['total_pembayaran'] = $total;
                            $arr[$x]['total_data'] = $y;
                        } else {
                            $arr[$x]['total_pembayaran'] = 0;
                            $arr[$x]['total_data'] = 0;
                        }
                    }

                    $x++;
                }
            }

            $queryTotalBulanan = $this->db->table('uangkas')->selectSum('jumlah_pembayaran')->get()->getRowArray();
            $jumlahBulanan = $queryTotalBulanan['jumlah_pembayaran'];
            $queryTotalTahunan = $this->db->table('uangkas')->selectSum('jumlah_pembayaran')->get()->getRowArray();
            $jumlahTahunan = $queryTotalTahunan['jumlah_pembayaran'];

            // dd($queryTotalTahunan);


            $totalmasuk = $this->db->table('transaksi')->selectSum('jumlah_transaksi')->where('jenis_transaksi', 'Pemasukan')->get()->getRowArray();

            $totalkeluar = $this->db->table('transaksi')->selectSum('jumlah_transaksi')->where('jenis_transaksi', 'Pengeluaran')->get()->getRowArray();
        } else {
            // query data uang kas
            $this->uangkasModel->join('siswa', 'siswa.id_siswa = uangkas.id_siswa', 'siswa.absen_siswa = uangkas.absen_siswa', 'siswa.id_siswa', 'siswa.nama_siswa', 'siswa.absen_siswa', 'uangkas.tanggal_pembayaran', 'uangkas.jumlah_pembayaran', 'inner');
            $queryUangKas = $this->uangkasModel->get()->getResultArray();

            $dataSiswa = $this->siswaModel->get()->getResultArray();

            $row = 1;

            $arr = [];
            $lastId = 0;
            $x = 0;

            if (count($dataSiswa) > 0) {
                foreach ($dataSiswa as $rowSiswa) {
                    if ($lastId != $rowSiswa['id_siswa'] || $lastId === 0) {
                        $lastId = $rowSiswa['id_siswa'];
                        // dd($rowSiswa);
                        $arr[$x]['id_siswa'] = $rowSiswa['id_siswa'];
                        $arr[$x]['nama_siswa'] = $rowSiswa['nama_siswa'];
                        $arr[$x]['absen_siswa'] = $rowSiswa['absen_siswa'];

                        $dataUangKas = $this->uangkasModel
                            ->table('uangkas')
                            ->where('id_siswa', $rowSiswa['id_siswa'])
                            ->where('MONTH(tanggal_pembayaran) = ' . date('m', strtotime($bulan)))
                            ->where('YEAR(tanggal_pembayaran) = ' . date('Y', strtotime($bulan)))
                            ->get()->getResultArray();
                        // dd($dataUangKas);

                        if (count($dataUangKas) > 0) {
                            //   dd($dataUangKas);
                            $y = 0;
                            $total = 0;

                            foreach ($dataUangKas as $rowUangKas) {
                                $arr[$x][$y]['tanggal_pembayaran'] = $rowUangKas['tanggal_pembayaran'];
                                $arr[$x][$y]['jumlah_pembayaran'] = $rowUangKas['jumlah_pembayaran'];
                                $arr[$x][$y]['keterangan_pembayaran'] = $rowUangKas['keterangan_pembayaran'];
                                $arr[$x][$y]['minggu1_pembayaran'] = $rowUangKas['minggu1_pembayaran'];
                                $arr[$x][$y]['minggu2_pembayaran'] = $rowUangKas['minggu2_pembayaran'];
                                $arr[$x][$y]['minggu3_pembayaran'] = $rowUangKas['minggu3_pembayaran'];
                                $arr[$x][$y]['minggu4_pembayaran'] = $rowUangKas['minggu4_pembayaran'];
                                $total += $rowUangKas['jumlah_pembayaran'];
                                // $arr[$x][$y]['jumlah_pembayaran'] = 0;

                                // $total += 0;
                                $y++;
                            }

                            $arr[$x]['total_pembayaran'] = $total;
                            $arr[$x]['total_data'] = $y;
                        } else {
                            $arr[$x]['total_pembayaran'] = 0;
                            $arr[$x]['total_data'] = 0;
                        }
                    }

                    $x++;
                }
            }

            $queryTotalBulanan = $this->db->table('uangkas')->selectSum('jumlah_pembayaran')->where('MONTH(tanggal_pembayaran) = ' . date('m', strtotime($bulan)))->get()->getRowArray();
            $jumlahBulanan = $queryTotalBulanan['jumlah_pembayaran'];

            $queryTotalTahunan = $this->db->table('uangkas')->selectSum('jumlah_pembayaran')->where('YEAR(tanggal_pembayaran) = ' . date('Y', strtotime($bulan)))->get()->getRowArray();
            $jumlahTahunan = $queryTotalTahunan['jumlah_pembayaran'];

            $totalmasuk = $this->db
                ->table('transaksi')
                ->selectSum('jumlah_transaksi')
                ->where('jenis_transaksi', 'Pemasukan')
                ->where('MONTH(tanggal_transaksi) = ' . date('m', strtotime($bulan)))
                ->where('YEAR(tanggal_transaksi) = ' . date('Y', strtotime($bulan)))
                ->get()->getRowArray();

            $totalkeluar = $this->db
                ->table('transaksi')
                ->selectSum('jumlah_transaksi')
                ->where('jenis_transaksi', 'Pengeluaran')
                ->where('MONTH(tanggal_transaksi) = ' . date('m', strtotime($bulan)))
                ->where('YEAR(tanggal_transaksi) = ' . date('Y', strtotime($bulan)))
                ->get()->getRowArray();

            // dd($queryTotalTahunan);
        }

        $data = [
            'title' => 'Intelligence Class - Bendahara | Cetak Laporan',
            'layout' => $queryLayout,
            'uangkasData' => $arr,
            'totalBulanan' => $jumlahBulanan,
            'totalTahunan' => $jumlahTahunan,
            'bulan' => $bulan,

            'totalmasuk' => $totalmasuk,
            'totalkeluar' => $totalkeluar,
        ];
        // return view('bendahara/laporan/cetak', $data);

        switch (date('F', strtotime($bulan))) {
            case 'January':
                $bln = 'Januari';
                break;
            case 'February':
                $bln = 'Februari';
                break;
            case 'March':
                $bln = 'Maret';
                break;
            case 'April':
                $bln = 'April';
                break;
            case 'May':
                $bln = 'Mei';
                break;
            case 'June':
                $bln = 'Juni';
                break;
            case 'July':
                $bln = 'Juli';
                break;
            case 'August':
                $bln = 'Agustus';
                break;
            case 'September':
                $bln = 'September';
                break;
            case 'October':
                $bln = 'Oktober';
                break;
            case 'November':
                $bln = 'November';
                break;
            case 'December':
                $bln = 'Desember';
                break;
        }

        $filename = 'Laporan Uangkas Bulan ' . $bln . ' Tahun ' . date('Y', strtotime($bulan));
        $html = view('bendahara/laporan/cetak', $data);
        // instantiate and use the dompdf class

        setlocale(LC_NUMERIC, "C");

        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        // $dompdf->stream($filename, array("Attachment" => false));
        $dompdf->stream($filename);
    }
    public function cetak2()
    {
        $queryLayout = $this->db->table('layout')->get()->getRowArray();

        // query data uang kas
        $this->uangkasModel->join('siswa', 'siswa.id_siswa = uangkas.id_siswa', 'siswa.absen_siswa = uangkas.absen_siswa', 'siswa.id_siswa', 'siswa.nama_siswa', 'siswa.absen_siswa', 'uangkas.tanggal_pembayaran', 'uangkas.jumlah_pembayaran', 'inner');
        $queryUangKas = $this->uangkasModel->get()->getResultArray();

        $dataSiswa = $this->siswaModel->get()->getResultArray();

        $row = 1;

        $arr = [];
        $lastId = 0;
        $x = 0;

        if (count($dataSiswa) > 0) {
            foreach ($dataSiswa as $rowSiswa) {
                if ($lastId != $rowSiswa['id_siswa'] || $lastId === 0) {
                    $lastId = $rowSiswa['id_siswa'];
                    // dd($rowSiswa);
                    $arr[$x]['id_siswa'] = $rowSiswa['id_siswa'];
                    $arr[$x]['nama_siswa'] = $rowSiswa['nama_siswa'];
                    $arr[$x]['absen_siswa'] = $rowSiswa['absen_siswa'];

                    $dataUangKas = $this->uangkasModel->table('uangkas')->where('id_siswa', $rowSiswa['id_siswa'])->where('MONTH(created_at) = MONTH(CURRENT_DATE)')->get()->getResultArray();

                    if (count($dataUangKas) > 0) {
                        //   dd($dataUangKas);
                        $y = 0;
                        $total = 0;

                        foreach ($dataUangKas as $rowUangKas) {
                            $arr[$x][$y]['tanggal_pembayaran'] = $rowUangKas['tanggal_pembayaran'];
                            $arr[$x][$y]['jumlah_pembayaran'] = $rowUangKas['jumlah_pembayaran'];
                            $arr[$x][$y]['keterangan_pembayaran'] = $rowUangKas['keterangan_pembayaran'];
                            $arr[$x][$y]['minggu1_pembayaran'] = $rowUangKas['minggu1_pembayaran'];
                            $arr[$x][$y]['minggu2_pembayaran'] = $rowUangKas['minggu2_pembayaran'];
                            $arr[$x][$y]['minggu3_pembayaran'] = $rowUangKas['minggu3_pembayaran'];
                            $arr[$x][$y]['minggu4_pembayaran'] = $rowUangKas['minggu4_pembayaran'];
                            $total += $rowUangKas['jumlah_pembayaran'];
                            // $arr[$x][$y]['jumlah_pembayaran'] = 0;

                            // $total += 0;
                            $y++;
                        }

                        $arr[$x]['total_pembayaran'] = $total;
                        $arr[$x]['total_data'] = $y;
                    } else {
                        $arr[$x]['total_pembayaran'] = 0;
                        $arr[$x]['total_data'] = 0;
                    }
                }

                $x++;
            }
        }

        // dd($arr);

        $queryTotalBulanan = $this->db->table('uangkas')->selectSum('jumlah_pembayaran')->where('MONTH(created_at) = MONTH(CURRENT_DATE)')->get()->getRowArray();
        $jumlahBulanan = $queryTotalBulanan['jumlah_pembayaran'];
        $queryTotalTahunan = $this->db->table('uangkas')->selectSum('jumlah_pembayaran')->where('YEAR(created_at) = YEAR(CURRENT_DATE)')->get()->getRowArray();
        $jumlahTahunan = $queryTotalTahunan['jumlah_pembayaran'];

        $data = [
            'title' => 'Intelligence Class - Bendahara | Cetak Laporan',
            'layout' => $queryLayout,
            'uangkasData' => $arr,
            'totalBulanan' => $jumlahBulanan,
            'totalTahunan' => $jumlahTahunan,
        ];
        // return view('bendahara/laporan/cetak', $data);


    }

    // public function laporanpengeluaran()
    // {
    //     $queryLayout = $this->db->table('layout')->get()->getRowArray();
    //     $bulan = $this->request->getVar('bulanfilter');
    //     $data = [
    //         'title' => 'Intelligence Class - Bendahara | Laporan Pengeluaran',
    //         'layout' => $queryLayout,
    //         'bulan' => $bulan,
    //     ];
    //     return view('bendahara/laporan/laporankeluar', $data);
    // }

    // public function laporanpemasukan()
    // {
    //     $queryLayout = $this->db->table('layout')->get()->getRowArray();
    //     $bulan = $this->request->getVar('bulanfilter');
    //     $data = [
    //         'title' => 'Intelligence Class - Bendahara | Laporan Pemasukan',
    //         'layout' => $queryLayout,
    //         'bulan' => $bulan,
    //     ];
    //     return view('bendahara/laporan/laporanmasuk', $data);
    // }
}
