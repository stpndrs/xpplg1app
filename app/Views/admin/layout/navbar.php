<?php

// echo date('H:i');

if (time() < strtotime('05:00:00') or time() > strtotime('18:00:00')) {
    $theme = 'dark';
    // $good = 'Good Night, Admin 🌕';
} else if (time() > strtotime('05:00:00') or time() < strtotime('10:00:00')) {
    $theme = 'light';
    // $good = 'Good Evening, Admin ☀️';
}
if (time() >= strtotime('05:00:00')) {
    $good = 'Good Morning Admin ☀️';
}
if (time() >= strtotime('12:00:00')) {
    $good = 'Good Afternoon Admin ☀️';
}
if (time() >= strtotime('18:00:00')) {
    $good = 'Good Night Admin 🌕';
}
if (time() <= strtotime('04:59:00')) {
    $good = 'Good Night Admin 🌕';
}

function tanggal_indo($tanggal, $cetak_hari = false)
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
    $split       = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo;
    }
    return $tgl_indo;
}
?>
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="<?= base_url(); ?>/admin"><?= $good; ?></a>
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

                <li class="sidebar-item <?= url_is('/admin') ? 'active' : '' ?> ">
                    <a href="<?= base_url(); ?>/admin" class='sidebar-link '>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link '>
                        <i class="bi bi-card-checklist"></i>
                        <span>Jadwal</span>
                    </a>

                    <ul class="submenu 
                <?= url_is('/admin/JadwalPelajaran') ? 'active' : '' ?> 
                <?= url_is('admin/JadwalPiket') ? 'active' : '' ?> 
                <?= url_is('admin/addJpik') ? 'active' : '' ?> 
                <?= url_is('admin/Jadwaluj') ? 'active' : '' ?>
                <?= url_is('admin/addJuj') ? 'active' : '' ?>
                ">
                        <li class="submenu-item <?= url_is('/admin/JadwalPelajaran') ? 'active' : '' ?>">
                            <a href="<?= base_url(); ?>/admin/JadwalPelajaran">Jadwal Pelajaran</a>
                        </li>

                        <li class="submenu-item 
                    <?= url_is('admin/JadwalPiket') ? 'active' : '' ?>
                    <?= url_is('admin/addJpik') ? 'active' : '' ?>
                    ">
                            <a href="<?= base_url(); ?>/admin/JadwalPiket">Jadwal Piket</a>
                        </li>

                        <li class="submenu-item 
                    <?= url_is('admin/JadwalUjian') ? 'active' : '' ?>
                    <?= url_is('admin/addJuj') ? 'active' : '' ?>
                    ">
                            <a href="<?= base_url(); ?>/admin/JadwalUjian">Jadwal Ujian</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item <?= url_is('/admin/berita') ? 'active' : '' ?>">
                    <a href="<?= base_url(); ?>/admin/berita" class='sidebar-link '>
                        <i class="bi bi-newspaper"></i>
                        <span>Berita</span>
                    </a>
                </li>

                <li class="sidebar-item <?= url_is('/admin/galeri') ? 'active' : '' ?>">
                    <a href="<?= base_url(); ?>/admin/galeri" class='sidebar-link '>
                        <i class="bi bi-columns-gap"></i>
                        <span>Galeri</span>
                    </a>
                </li>

                <li class="sidebar-item <?= url_is('/admin/siswa') ? 'active' : '' ?>">
                    <a href="<?= base_url(); ?>/admin/siswa" class='sidebar-link '>
                        <i class="bi bi-person"></i>
                        <span>Data Siswa</span>
                    </a>
                </li>

                <li class="sidebar-item <?= url_is('/bendahara') ? 'active' : '' ?>">
                    <a href="<?= base_url(); ?>/bendahara" class='sidebar-link '>
                        <i class="bi bi-cash-stack"></i>
                        <span>Bendahara</span>
                    </a>
                </li>

                <li class="sidebar-item <?= url_is('/admin/setting') ? 'active' : '' ?>">
                    <a href="<?= base_url(); ?>/admin/setting" class='sidebar-link '>
                        <i class="bi bi-sliders"></i>
                        <span>Setting</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a href="#" class="sidebar-link fs-6">
                        <span id="jam" class="blue"></span> <span class="yellow">:</span> <span id="menit" class="blue"></span> <span class="yellow">:</span> <span id="detik" class="blue"></span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link fs-6">
                        <strong class="blue"><?= tanggal_indo(date('Y-m-d'), true); ?></strong>
                    </a>
                </li>
                <hr>
                <li class="sidebar-item ">
                    <a href="<?= base_url(); ?>/logout" class='sidebar-link '>
                        <i class="bi bi-box-arrow-left"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="sidebar-toggler btn x"><i data-feather="x"></i></div>
    </div>
</div>