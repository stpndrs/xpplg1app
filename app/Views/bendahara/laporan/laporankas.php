<?= $this->extend('bendahara/layout/template'); ?>

<?= $this->section('content'); ?>

<style>
  .masuk {
    background-color: #20c997 !important;
    color: white;
  }

  .keluar {
    background-color: #dc3545 !important;
    color: white;
  }

  .total {
    background-color: #ffc107 !important;
    color: white;
  }
</style>

<div class="container" id="laporan">
  <h1 class="title yellow text-center">Laporan Uang Kas XI PPLG 1</h1>

  <form action="/bendahara/laporandatakas" method="post">
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

  <form action="/bendahara/cetak" method="post">
    <div class="row">
      <div class="col-lg">
        <div class="mb-3">
          <label class="form-label yellow">Masukkan Bulan Untuk Dicetak</label>
          <input type="month" name="bulanfilter" class="form-control">
        </div>
      </div>
      <div class="col-lg">
        <div class="mb-3">
          <button type="submit" class="btn">Cetak</button>
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
  if ($bulan != null && $tahun != null && $totalBulanan != null) { ?>
    <h4 class="yellow">Data <b><?= $bln ?> <?= $tahun; ?></b></h4>
  <?php } else if ($totalBulanan == null) { ?>
    <h4 class="yellow">Tidak Ada Data <b><?= $bln ?> Tahun <?= date('Y', strtotime($bulan)); ?></b></h4>
  <?php } else { ?>
    <h4 class="yellow">Semua Data Uang Kas</h4>
  <?php
  }
  ?>

  <table id="style">
    <thead>
      <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Nama</th>
        <th colspan="2">Rincian</th>
        <th colspan="4">Minggu</th>
        <th rowspan="2">Keterangan</th>
        <th rowspan="2">Total</th>
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
            <td><?= $v[$i]['tanggal_pembayaran']; ?></td>
            <td><?= date('l, d F Y', strtotime($v[$i]['tanggal_pembayaran'])); ?></td>
            <td><?= $v[$i]['minggu1_pembayaran'] == true ? '<i class="bi bi-check"></i>' : '<i class="bi bi-x"></i>'; ?></td>
            <td><?= $v[$i]['minggu2_pembayaran'] == true ? '<i class="bi bi-check"></i>' : '<i class="bi bi-x"></i>'; ?></td>
            <td><?= $v[$i]['minggu3_pembayaran'] == true ? '<i class="bi bi-check"></i>' : '<i class="bi bi-x"></i>'; ?></td>
            <td><?= $v[$i]['minggu4_pembayaran'] == true ? '<i class="bi bi-check"></i>' : '<i class="bi bi-x"></i>'; ?></td>
            <td><?= $v[$i]['keterangan_pembayaran'] == '' ? '-' : $v[$i]['keterangan_pembayaran']; ?></td>

            <?php if ($i === 0) : ?>
              <td rowspan="<?= $v['total_data']; ?>">Rp <?= number_format($v['total_pembayaran']); ?></td>
            <?php endif; ?>

            <?php
            $i++;
            if ($i === $v['total_data']) {
              $i = 0;
            }
            ?>
          </tr>

        <?php endfor; ?>
      <?php endforeach; ?>
      <?php
      $saldo = $totalBulanan;
      $transaksikeluar = $totalkeluar['jumlah_transaksi'];
      $transaksimasuk = $totalmasuk['jumlah_transaksi'];

      $totalduit = $saldo - $transaksikeluar + $transaksimasuk
      ?>
      <tr>
        <th colspan="8">Total Bulanan</th>
        <th colspan="2">Rp <?= number_format($totalBulanan); ?></th>
      </tr>
      <tr>
        <th class="keluar" colspan="8">Transaksi Keluar</th>
        <th class="keluar" colspan="2">Rp <?= number_format($transaksikeluar); ?></th>
      </tr>
      <tr>
        <th class="masuk" colspan="8">Transaksi Masuk</th>
        <th class="masuk" colspan="2">Rp <?= number_format($transaksimasuk); ?></th>
      </tr>
      <tr>
        <th class="total" colspan="8">Total Saldo</th>
        <th class="total" colspan="2">Rp <?= number_format($totalduit); ?></th>
    </tbody>
  </table>

  <!-- <a href="/bendahara/cetak">
    <button class="btn">Cetak</button>
  </a> -->
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