<?= $this->extend('bendahara/layout/template'); ?>

<?= $this->section('content'); ?>
<style>
  .card.total {
    min-height: unset !Important;
    background-color: #20c997;
    color: white;
    border-radius: 3px !important;
    text-align: left;
  }
  .card.keluar {
    background-color: #dc3545;
  }
  .card.saldo {
    background-color: #ffc107;
  }
</style>
<div class="container" id="datakas">
  <h1 class="title yellow text-center">Data Uang Kas XI PPLG 1</h1>

  <?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success alert-dismissible fade show pesan-success" role="alert">
      <h6><?= session()->getFlashdata('pesan'); ?>!</h6>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <div class="row">
    <div class="col-lg">
      <button class="btn">
        <a href="/bendahara/addKas">Tambah Data Pembayaran</a>
      </button>
    </div>
    <? //= date('d D M Y'); 
    ?>
    <? //= date('H:i'); 
    ?>
    <!-- <div class="col-lg" style="margin: 5vh; padding: 0;">
            <form action="" method="POST">
                <div class="input-group mb-3 float-end">
                    <input type="text" class="form-control" id="keyword" placeholder="Masukkan Keyword" name="keyword">
                    <button class="btn btn-outline-secondary m-0" id="cari" type="submit">Cari</button>
                </div>
            </form>
        </div> -->
  </div>

  <form action="/bendahara/datakas" method="post">
    <div class="row">
      <div class="col-lg">
        <div class="mb-3">
          <label class="form-label yellow">Masukkan Bulan</label>
          <input type="month" name="bulanfilter" class="form-control">
        </div>
      </div>
      <div class="col-lg">
        <div class="mb-3">
          <button type="submit" class="btn">Cari</button>
        </div>
      </div>
    </div>
  </form>

  <?php
  // dd($bulan);
  if ($bulan != null) {
    $bulan = date('F', strtotime($bulan));
    $tahun = date('Y', strtotime($bulan));
  } else {
    $bulan = 'null';
    $tahun = '';
  }
  switch ($bulan) {
    case 'January':
      $bln = 'Bulan Januari';
      break;
    case 'February':
      $bln = 'Bulan Februari';
      break;
    case 'March':
      $bln = 'Bulan Maret';
      break;
    case 'April':
      $bln = 'Bulan April';
      break;
    case 'May':
      $bln = 'Bulan Mei';
      break;
    case 'June':
      $bln = 'Bulan Juni';
      break;
    case 'July':
      $bln = 'Bulan Juli';
      break;
    case 'August':
      $bln = 'Bulan Agustus';
      break;
    case 'September':
      $bln = 'Bulan September';
      break;
    case 'October':
      $bln = 'Bulan Oktober';
      break;
    case 'November':
      $bln = 'Bulan November';
      break;
    case 'December':
      $bln = 'Bulan Desember';
      break;
    case 'null':
      $bln = '';
      break;
  }
  if ($bulan != null && $tahun != null && $total != null) { ?>
    <h4 class="yellow">Data <b><?= $bln ?> <?= $tahun; ?></b></h4>
  <?php } else if ($total == null) { ?>
    <h4 class="yellow">Tidak Ada Data <b><?= $bln ?> Tahun <?= date('Y', strtotime($bulan)); ?></b></h4>
  <?php } else { ?>
    <h4 class="yellow">Semua Data Uang Kas</h4>
  <?php
  }
  ?>
  <div class="row">
    <div class="col-lg">
      <div class="card total">
        <h5>TOTAL KAS MASUK : Rp <?= number_format($totalmasuk['jumlah_transaksi']); ?></h5>
      </div>
    </div>
    <div class="col-lg">
      <div class="card total keluar">
        <h5>TOTAL KAS KELUAR : Rp <?= number_format($totalkeluar['jumlah_transaksi']); ?></h5>
      </div>
    </div>
    <?php
    $saldo = $totalsaldo['jumlah_pembayaran'];
    $transaksikeluar = $totalkeluar['jumlah_transaksi'];
    $transaksimasuk = $totalmasuk['jumlah_transaksi'];

    $totalduit = $saldo - $transaksikeluar + $transaksimasuk
    ?>
    <div class="card total saldo">
      <h5>TOTAL UANGKAS : Rp <?= number_format($totalduit); ?></h5>
    </div>
  </div>
  <table id="style">
    <thead>
      <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Nama</th>
        <th colspan="2">Rincian</th>
        <th colspan="4">Minggu</th>
        <th rowspan="2">Keterangan</th>
        <th rowspan="2">Total</th>
        <th rowspan="2">Aksi</th>
      </tr>
      <tr>
        <th>Tanggal</th>
        <th>Pembayaran</th>
        <th>I</th>
        <th>II</th>
        <th>III</th>
        <th>IV</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 0;
      $no = 1; ?>
      <? //= dd($uangkasData);
      ?>
      <?php foreach ($uangkasData as $k => $v) : ?>
        <?php $totalData = (int)$v['total_data']; ?>
        <?php for ($x = 0; $x < $totalData; $x++) : ?>
          <tr>
            <?php if ($i === 0) : ?>
              <td rowspan="<?= $v['total_data']; ?>"><?= $no++; ?></td>
              <td rowspan="<?= $v['total_data']; ?>"><?= $v['nama_siswa']; ?></td>
            <?php endif; ?>

            <td><?= date('l, d F Y', strtotime($v[$i]['tanggal_pembayaran'])); ?></td>
            <td>Rp <?= number_format($v[$i]['jumlah_pembayaran']); ?></td>
            <td><?= $v[$i]['minggu1_pembayaran'] == true ? '<i class="bi bi-check"></i>' : '<i class="bi bi-x"></i>'; ?></td>
            <td><?= $v[$i]['minggu2_pembayaran'] == true ? '<i class="bi bi-check"></i>' : '<i class="bi bi-x"></i>'; ?></td>
            <td><?= $v[$i]['minggu3_pembayaran'] == true ? '<i class="bi bi-check"></i>' : '<i class="bi bi-x"></i>'; ?></td>
            <td><?= $v[$i]['minggu4_pembayaran'] == true ? '<i class="bi bi-check"></i>' : '<i class="bi bi-x"></i>'; ?></td>
            <td><?= $v[$i]['keterangan_pembayaran'] == '' ? '-' : $v[$i]['keterangan_pembayaran']; ?></td>

            <?php if ($i === 0) : ?>
              <td rowspan="<?= $v['total_data']; ?>">Rp <?= number_format($v['total_pembayaran']); ?></td>
            <?php endif; ?>

            <td>
              <a href="/bendahara/editKas/<?= $v[$i]['id_pembayaran']; ?>">
                <button class="btn m-0">
                  <i class="bi bi-pencil"></i>
                </button>
              </a>
              <a onclick="return confirm('Yakin Ingin Menghapus Data Transaksi?')" href="/bendahara/deleteDatakas/<?= $v[$i]['id_pembayaran']; ?>">
                <button class="btn m-0">
                  <i class="bi bi-trash"></i>
                </button>
              </a>
            </td>
            <?php
            $i++;
            if ($i === $v['total_data']) {
              $i = 0;
            }
            ?>
          </tr>

        <?php endfor; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
  <!-- <? //= $pager->links('uangkas', 'uangkas_pagination'); 
        ?> -->
</div>

<?= $this->endsection(); ?>

<?= $this->section('script'); ?>

<!-- Resubmit FORM -->
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>

<?= $this->endSection(); ?>