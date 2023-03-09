<?php

// echo date('H:i');

if (time() < strtotime('05:00:00') or time() > strtotime('18:00:00')) {
  $theme = 'dark';
  // $goodAdmin = 'Good Night, Admin 🌕';
} else if (time() > strtotime('05:00:00') or time() < strtotime('10:00:00')) {
  $theme = 'light';
  // $goodAdmin = 'Good Evening, Admin ☀️';
}
if (time() < strtotime('05:00:00') or time() > strtotime('18:00:00')) {
  $theme = 'dark';
  // $goodBendahara = 'Good Night, Bendahara 🌕';
} else if (time() > strtotime('05:00:00') or time() < strtotime('10:00:00')) {
  $theme = 'light';
  // $goodBendahara = 'Good Evening, Bendahara ☀️';
}

if (time() >= strtotime('05:00:00')) {
  $goodAdmin = 'Good Morning Admin ☀️';
}
if (time() >= strtotime('12:00:00')) {
  $goodAdmin = 'Good Afternoon Admin ☀️';
}
if (time() >= strtotime('18:00:00')) {
  $goodAdmin = 'Good Night Admin 🌕';
}
if (time() <= strtotime('04:59:00')) {
  $goodAdmin = 'Good Night Admin 🌕';
}

if (time() >= strtotime('05:00:00')) {
  $goodBendahara = 'Good Morning Bendahara ☀️';
}
if (time() >= strtotime('12:00:00')) {
  $goodBendahara = 'Good Afternoon Bendahara ☀️';
}
if (time() >= strtotime('18:00:00')) {
  $goodBendahara = 'Good Night Bendahara 🌕';
}
if (time() <= strtotime('04:59:00')) {
  $goodBendahara = 'Good Night Bendahara 🌕';
}

function tanggal($tanggal, $cetak_hari = false)
{
  $hari = array(
    1 =>    'Senin',
    'Selasa',
    'Rabu',
    'Kamis',
    'Jumat',
    'Sabtu',
    'Minggu'
  );

  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $split     = explode('-', $tanggal);
  $tgl = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

  if ($cetak_hari) {
    $num = date('N', strtotime($tanggal));
    return $hari[$num] . ', ' . $tgl;
  }
  return $tgl;
}
?>

<div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
    <div class="sidebar-header">
      <div class="d-flex justify-content-between">
        <div class="logo">
          <a href="<?= base_url(); ?>/bendahara"><?= in_groups('1') ? $goodAdmin : $goodBendahara; ?></a>
        </div>
        <div class="toggler">
          <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
        </div>
      </div>
    </div>
    <hr>
    <div class="sidebar-menu">
      <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item <?= url_is('/bendahara') ? 'active' : '' ?> ">
          <a href="<?= base_url(); ?>/bendahara" class='sidebar-link '>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <!-- <li class="sidebar-item 
                    <?= url_is('/bendahara/transaksi') ? 'active' : '' ?> 
                    <?= url_is('/bendahara/addTrans') ? 'active' : '' ?> 
                    ">
          <a href="<?= base_url(); ?>/bendahara/transaksi" class='sidebar-link '>
            <i class="bi bi-receipt"></i>
            <span>Transaksi</span>
          </a>
        </li> -->

        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-receipt"></i>
            <span>Transaksi</span>
          </a>
          <ul class="submenu 
          <?= url_is('/bendahara/transaksipengeluaran') ? 'active' : '' ?> 
          <?= url_is('/bendahara/transaksipemasukan') ? 'active' : '' ?>
          <?= url_is('/bendahara/addTransPengeluaran') ? 'active' : '' ?>
          <?= url_is('/bendahara/addTransPemasukan') ? 'active' : '' ?> ">
            <li class="submenu-item <?= url_is('/bendahara/transaksipengeluaran') ? 'active' : '' ?> <?= url_is('/bendahara/addTransPengeluaran') ? 'active' : '' ?>">
              <a href="<?= base_url(); ?>/bendahara/transaksipengeluaran">Pengeluaran</a>
            </li>
            <li class="submenu-item <?= url_is('/bendahara/transaksipemasukan') ? 'active' : '' ?> <?= url_is('/bendahara/addTransPemasukan') ? 'active' : '' ?> ">
              <a href="<?= base_url(); ?>/bendahara/transaksipemasukan">Pemasukan</a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item 
                    <?= url_is('/bendahara/datakas') ? 'active' : '' ?> 
                    <?= url_is('/bendahara/addKas') ? 'active' : '' ?> 
                    ">
          <a href="<?= base_url(); ?>/bendahara/datakas " class='sidebar-link '>
            <i class="bi bi-grid-fill"></i>
            <span>Data Uang Kas</span>
          </a>
        </li>

        <!-- <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-receipt"></i>
            <span>Laporan</span>
          </a>
          <ul class="submenu 
          <?= url_is('/bendahara/laporandatakas') ? 'active' : '' ?> 
          <?= url_is('/bendahara/laporanpemasukan') ? 'active' : '' ?>
          <?= url_is('/bendahara/laporanpengeluaran') ? 'active' : '' ?>">
            <li class="submenu-item <?= url_is('/bendahara/laporandatakas') ? 'active' : '' ?>">
              <a href="<?= base_url(); ?>/bendahara/laporandatakas">Data Kas</a>
            </li>
            <li class="submenu-item <?= url_is('/bendahara/laporanpengeluaran') ? 'active' : '' ?>">
              <a href="<?= base_url(); ?>/bendahara/laporanpengeluaran">Pengeluaran</a>
            </li>
            <li class="submenu-item <?= url_is('/bendahara/laporanpemasukan') ? 'active' : '' ?>">
              <a href="<?= base_url(); ?>/bendahara/laporanpemasukan">Pemasukan</a>
            </li>
          </ul>
        </li> -->
        <li class="sidebar-item 
                    <?= url_is('/bendahara/laporandatakas') ? 'active' : '' ?>
                    ">
          <a href="<?= base_url(); ?>/bendahara/laporandatakas" class='sidebar-link '>
            <i class="bi bi-newspaper"></i>
            <span>Laporan</span>
          </a>
        </li>

        <?php if (in_groups('1')) { ?>
          <li class="sidebar-item <?= url_is('/admin') ? 'active' : '' ?> ">
            <a href="<?= base_url(); ?>/admin" class='sidebar-link '>
              <i class="bi bi-person-circle"></i>
              <span>Admin</span>
            </a>
          </li>
        <?php } ?>

        <li class="sidebar-item ">
          <a href="#" class="sidebar-link fs-6">
            <span id="jam" class="blue"></span> <span class="yellow">:</span> <span id="menit" class="blue"></span> <span class="yellow">:</span> <span id="detik" class="blue"></span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="#" class="sidebar-link fs-6">
            <strong class="blue"><?= tanggal(date('Y-m-d'), true); ?></strong>
          </a>
        </li>
        <hr>
        <li class="sidebar-item ">
          <a href="/logout" class='sidebar-link '>
            <i class="bi bi-box-arrow-left"></i>
            <span>Logout</span>
          </a>
        </li>

      </ul>
    </div>
    <div class="sidebar-toggler btn x"><i data-feather="x"></i></div>
  </div>
</div>