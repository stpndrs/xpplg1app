<?php

namespace App\Controllers;

use App\Models\UangKasModel;
use App\Models\SiswaModel;

class UangKas extends BaseController
{
  protected $db;
  protected $uangkasModel;
  public function __construct()
  {
    $this->db = \Config\Database::connect();
    $this->uangkasModel = new UangKasModel();
    $this->siswaModel = new SiswaModel();
  }
  public function index()
  {

    $configUangKas = $this->db->table('configstatus')->where('nama_config', 'Status UangKas')->get()->getRowArray();
    $statusUangKas = $configUangKas['value'];

    $bulan = $this->request->getVar('bulanfilter');

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

      $queryTotalBulanan = $this->db->table('uangkas')->selectSum('jumlah_pembayaran')->get()->getRowArray();
      $jumlahBulanan = $queryTotalBulanan['jumlah_pembayaran'];
      $queryTotalTahunan = $this->db->table('uangkas')->selectSum('jumlah_pembayaran')->get()->getRowArray();
      $jumlahTahunan = $queryTotalTahunan['jumlah_pembayaran'];
    } else {
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

      $queryTotalBulanan = $this->db->table('uangkas')->selectSum('jumlah_pembayaran')->where('MONTH(tanggal_pembayaran) = ' . date('m', strtotime($bulan)))->get()->getRowArray();
      $jumlahBulanan = $queryTotalBulanan['jumlah_pembayaran'];

      $queryTotalTahunan = $this->db->table('uangkas')->selectSum('jumlah_pembayaran')->where('YEAR(tanggal_pembayaran) = ' . date('Y', strtotime($bulan)))->get()->getRowArray();
      $jumlahTahunan = $queryTotalTahunan['jumlah_pembayaran'];
    }

    // dd($arr);



    $data = [
      'title' => 'Intelligence Class | Data Uang Kas',

      'uangkasData' => $arr,
      'statusUangKas' => $statusUangKas,
      'bulan' => $bulan,

      'mg1' => $mg1,
      'mg2' => $mg2,
      'mg3' => $mg3,
      'mg4' => $mg4,

      'totalBulanan' => $jumlahBulanan,
      'totalTahunan' => $jumlahTahunan,
    ];
    return view('/pages2/uangkas', $data);
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

    $configJoffline = $this->db->table('configstatus')->where('nama_config', 'Status JOffline')->get()->getRowArray();
    $statusJoffline = $configJoffline['value'];

    // query data uang kas
    $this->uangkasModel
      // ->select('siswa.id_siswa, siswa.nama_siswa, siswa.absen_siswa, uangkas.tanggal_pembayaran, uangkas.jumlah_pembayaran')
      ->join('siswa', 'siswa.id_siswa = uangkas.id_siswa', 'inner')
      ->where('siswa.id_siswa', $id);
    $queryUangKas = $this->uangkasModel->get()->getResultArray();

    // dd($queryUangKas); 
    $dataSiswa = $this->siswaModel->get()->getResultArray();

    $row = 1;

    $arr = [];
    $lastId = 0;
    $x = 0;
    if (count($dataSiswa) > 0) {
      // dd($dataSiswa);
      $y = 0;
      $total = 0;

      foreach ($queryUangKas as $rowSiswa) {
        $arr['id_siswa'] = $rowSiswa['id_siswa'];
        $arr['nama_siswa'] = $rowSiswa['nama_siswa'];
        $arr['absen_siswa'] = $rowSiswa['absen_siswa'];
        $arr[$y]['tanggal_pembayaran'] = $rowSiswa['tanggal_pembayaran'];
        $arr[$y]['jumlah_pembayaran'] = $rowSiswa['jumlah_pembayaran'];
        $arr[$y]['keterangan_pembayaran'] = $rowSiswa['keterangan_pembayaran'];
        $arr[$y]['minggu1_pembayaran'] = $rowSiswa['minggu1_pembayaran'];
        $arr[$y]['minggu2_pembayaran'] = $rowSiswa['minggu2_pembayaran'];
        $arr[$y]['minggu3_pembayaran'] = $rowSiswa['minggu3_pembayaran'];
        $arr[$y]['minggu4_pembayaran'] = $rowSiswa['minggu4_pembayaran'];
        $total += $rowSiswa['jumlah_pembayaran'];
        $y++;
      }
      $arr['total_pembayaran'] = $total;
      $arr['total_data'] = $y;
    } else {
      echo 'Data tidak ditemukan!';
      exit;
    }

    // dd($arr);

    $data = [
      'title' => 'Intelligence Class | Detail Data Uang Kas',
      'gtagJS' => '<!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-TRSWNRHZEZ"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag(\'js\', new Date());
            
              gtag(\'config\', \'G-TRSWNRHZEZ\');
            </script>',
      'layout' => $queryLayout,
      'statusPas' => $statusPas,

      'arr' => $arr,
      // 'arr' => $this->uangkasModel->getUangKas($id),

      'statusJgmeet' => $statusJgmeet,
      'statusJtugas' => $statusJtugas,
      'statusJpiket' => $statusJpiket,
      'statusJoffline' => $statusJoffline,
    ];
    return view('/pages/uangkasDetail', $data);
  }
}
