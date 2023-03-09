<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container" id="jadwal">
    <header>
        <div class="bg"></div>
        <h1 class="title yellow">Jadwal Kelas</h1>
    </header>
    
    <section id="jadwal-video">
        <div class="row" id="jrow">
            <h4 class="blue" style="margin-bottom: 0;">JADWAL PROJEK PENGUATAN PROFIL PELAJAR PANCASILA (P5) MINGGU 1</h4>
            <!-- <p class="yellow" style="margin-bottom: 20px;">Minggu Ganjil kelas X dan XII melaksanakan kegiatan belajar mengajar secara langsung (face to face), Sementara kelas XI melaksanakan kegiatan belajar mengajar secara online sesuai jadwal pelajaran yang terlampir.</p> -->

            <?php if(session()->getFlashdata('data-edit-jgmeet')): ?>
            <div class="alert alert-success alert-dismissible fade show pesan-success" role="alert">
                <h6><?= session()->getFlashdata('data-edit-jgmeet'); ?></h6>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>

            <br>
            <br>
            <br>

            <?php foreach($jvideo as $jvc) : ?>
            <div class="col">
                <div class="card">
                    <h5 class="yellow"><?= $jvc['hari_jgmeet']; ?></h5>
                    <p class="blue">Seragam Laki-laki : <strong><?= $jvc['seragam_jgmeet']; ?></strong></p>
                    <p class="blue">Seragam Perempuan : <strong><?= $jvc['seragamper_jgmeet']; ?></strong></p>
                    <p class="yellow"><strong><?= $jvc['mapel1_jgmeet']; ?></strong></p>
                    <p class="blue"><?= $jvc['nmguru1_jgmeet']; ?></p>
                    <p class="yellow"><strong><?= $jvc['mapel2_jgmeet']; ?></strong></p>
                    <p class="blue"><?= $jvc['nmguru2_jgmeet']; ?></p>
                    <p class="yellow"><strong><?= $jvc['mapel3_jgmeet']; ?></strong></p>
                    <p class="blue"><?= $jvc['nmguru3_jgmeet']; ?></p>
                    <p class="yellow"><strong><?= $jvc['mapel4_jgmeet']; ?></strong></p>
                    <p class="blue"><?= $jvc['nmguru4_jgmeet']; ?></p>

                    <a href="/admin/editJgmeet/<?= $jvc['id_jgmeet']; ?>">
                        <button class="btn" style="margin: 1vh 2vh 2vh 0;">edit</button>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </section>
    
    <section id="jadwal-penugasan">
        <div class="row" id="jrow">
            <h4 class="blue" style="margin-bottom: 0;">Jadwal Minggu Genap</h4>
            <p class="yellow" style="margin-bottom: 20px;">Minggu Genap kelas XI melaksanakan kegiatan belajar mengajar secara langsung (face to face), sementara kelas XII dan kelas X melaksanakan kegiatan belajar mengajar secara online sesuai jadwal terlampir.</p>

            <?php if(session()->getFlashdata('data-edit-jtugas')): ?>
            <div class="alert alert-success alert-dismissible fade show pesan-success" role="alert">
                <h6><?= session()->getFlashdata('data-edit-jtugas'); ?></h6>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>

            <br>
            <br>
            <br>

            <?php foreach($jtugas as $jpt) : ?>
            <div class="col">
                <div class="card">
                    <h5 class="yellow"><?= $jpt['hari_jtugas']; ?></h5>
                    <p class="yellow"><strong><?= $jpt['mapel1_jtugas']; ?></strong></p>
                    <p class="blue"><?= $jpt['nmguru1_jtugas']; ?></p>
                    <p class="yellow"><strong><?= $jpt['mapel2_jtugas']; ?></strong></p>
                    <p class="blue"><?= $jpt['nmguru2_jtugas']; ?></p>
                    <p class="yellow"><strong><?= $jpt['mapel3_jtugas']; ?></strong></p>
                    <p class="blue"><?= $jpt['nmguru3_jtugas']; ?></p>
                    <p class="yellow"><strong><?= $jpt['mapel4_jtugas']; ?></strong></p>
                    <p class="blue"><?= $jpt['nmguru4_jtugas']; ?></p>

                    <a href="/admin/editJtugas/<?= $jpt['id_jtugas']; ?>">
                        <button class="btn" style="margin: 1vh 2vh 2vh 0;">edit</button>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </section>

    <section id="jadwal-pas">
        <div class="row" id="jpas">
            <h4 class="blue">Jadwal PAS</h4>

            <?php if(session()->getFlashdata('data-jpas')): ?>
            <div class="alert alert-success alert-dismissible fade show pesan-success" role="alert">
                <h6><?= session()->getFlashdata('data-jpas'); ?></h6>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>

            <a href="/admin/addJpas" style="width: 100%;">
                <button class="btn">Tambah Jadwal PAS</button>
            </a>

            <br>
            <br>
            <br>

            <?php foreach($jpas as $jps) : ?>
            <div class="col-lg mb-3">
                <div class="card">
                    <h5 class="yellow"><?= $jps['hari_jpas']; ?></h5>
                    <p class="blue"><?= $jps['tanggal_jpas']; ?></p>
                    <p class="yellow"><strong><?= $jps['mapel1_jpas']; ?></strong></p>
                    <p class="blue"><?= $jps['jam1_jpas']; ?></p>
                    <p class="yellow"><strong><?= $jps['mapel2_jpas']; ?></strong></p>
                    <p class="blue"><?= $jps['jam2_jpas']; ?></p>
                    <p class="yellow"><strong><?= $jps['mapel3_jpas']; ?></strong></p>
                    <p class="blue"><?= $jps['jam3_jpas']; ?></p>

                    <a href="/admin/editJpas/<?= $jps['id_jpas']; ?>">
                        <button class="btn" style="margin: 1vh 2vh 2vh 0;">edit</button>
                    </a>
                    <a href="/admin/deleteJpas/<?= $jps['id_jpas']; ?>">
                        <button class="btn" style="margin: 1vh 2vh 2vh 0;" onclick="return confirm('Yakin ingin menghapus data?')"><i class="bi bi-trash"></i></button>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </section>
    <section id="jadwal-piket">
        <div class="row" id="jpik">
            <h4 class="blue">Jadwal Piket X PPLG 1</h4>

            <?php if(session()->getFlashdata('data-jpik')): ?>
            <div class="alert alert-success alert-dismissible fade show pesan-success" role="alert">
                <h6><?= session()->getFlashdata('data-jpik'); ?></h6>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>

            <a href="/admin/addJpik" style="width: 100%;">
                <button class="btn">Tambah Jadwal Piket</button>
            </a>

            <br>
            <br>
            <br>

            <?php foreach($jpik as $jpk) : ?>
            <div class="col-lg mb-3">
                <div class="card">
                    <h5 class="blue"><?= $jpk['hari_jpiket']; ?></h5>
                    <p class="yellow"><?= $jpk['nama1_jpiket']; ?></p>
                    <p class="blue"><?= $jpk['nama2_jpiket']; ?></p>
                    <p class="yellow"><?= $jpk['nama3_jpiket']; ?></p>
                    <p class="blue"><?= $jpk['nama4_jpiket']; ?></p>
                    <p class="yellow"><?= $jpk['nama5_jpiket']; ?></p>
                    <p class="blue"><?= $jpk['nama6_jpiket']; ?></p>
                    <p class="yellow"><?= $jpk['nama7_jpiket']; ?></p>

                    <a href="/admin/editJpik/<?= $jpk['id_jpiket']; ?>">
                        <button class="btn" style="margin: 1vh 2vh 2vh 0;">edit</button>
                    </a>
                    <a href="/admin/deleteJpik/<?= $jpk['id_jpiket']; ?>">
                        <button class="btn" style="margin: 1vh 2vh 2vh 0;" onclick="return confirm('Yakin ingin menghapus data?')"><i class="bi bi-trash"></i></button>
                    </a>

                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </section>

</div>






<?= $this->endSection(); ?>






