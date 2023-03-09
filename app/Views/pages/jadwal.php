<?= $this->extend('pages/layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container" id="jadwal">
    <header>
        <div class="bg"></div>
        <h1 class="title yellow">Jadwal Kelas</h1>
    </header>

    <br>
    <br>
    
    <?php if($statusJgmeet == true) { ?>
    <section id="jadwal-video">
        <div class="row" id="jrow">
            <h4 class="blue" style="margin-bottom: 0;">Jadwal Minggu Ganjil</h4>
            <p class="yellow" style="margin-bottom: 20px;">Minggu Ganjil kelas X dan XII melaksanakan kegiatan belajar mengajar secara langsung (face to face), Sementara kelas XI melaksanakan kegiatan belajar mengajar secara online sesuai jadwal pelajaran yang terlampir.</p>

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
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </section>
    <?php } ?>
    
    <?php if($statusJtugas == true) { ?>
    <section id="jadwal-penugasan">
        <div class="row" id="jrow">
            <h4 class="blue" style="margin-bottom: 0;">Jadwal Minggu Genap</h4>
            <p class="yellow" style="margin-bottom: 20px;">Minggu Genap kelas XI melaksanakan kegiatan belajar mengajar secara langsung (face to face), sementara kelas XII dan kelas X melaksanakan kegiatan belajar mengajar secara online sesuai jadwal terlampir.</p>

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
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </section>
    <?php } ?>

    <?php if($statusJoffline == true) { ?>
    <section id="jadwal-offline">
        <div class="row" id="jrow">
            <h4 class="blue" style="margin-bottom: 0;">Jadwal Offline</h4>
            <!-- <p class="yellow" style="margin-bottom: 20px;">Minggu Genap kelas XI melaksanakan kegiatan belajar mengajar secara langsung (face to face), sementara kelas XII dan kelas X melaksanakan kegiatan belajar mengajar secara online sesuai jadwal terlampir.</p> -->

            <?php if(session()->getFlashdata('data-edit-jtugas')): ?>
            <div class="alert alert-success alert-dismissible fade show pesan-success" role="alert">
                <h6><?= session()->getFlashdata('data-edit-jtugas'); ?></h6>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>

            <br>
            <br>
            <br>

            <?php foreach($joffline as $joff) : ?>
            <div class="col">
                <div class="card">
                    <h5 class="yellow" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $joff['seragam_joffline']; ?>/<?= $joff['seragamper_joffline']; ?>"><?= $joff['hari_joffline']; ?></h5>
                    <hr>
                    <p class="yellow" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $joff['waktu_0_joffline']; ?>">
                        <strong><?= $joff['mapel_0_joffline']; ?></strong>
                    </p>
                    <p class="blue">
                        <?= $joff['namaguru_0_joffline'] == Null ? "-" : $joff['namaguru_0_joffline']; ?>
                    </p>

                    <?php if($joff['mapel_0_joffline'] != $joff['mapel_1_joffline']) { ?>
                        <hr>
                    <?php } ?>

                    <p class="yellow" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $joff['waktu_1_joffline']; ?>">
                        <strong><?= $joff['mapel_1_joffline']; ?></strong>
                    </p>
                    <p class="blue">
                        <?= $joff['namaguru_1_joffline'] == Null ? "-" : $joff['namaguru_1_joffline']; ?>
                    </p>

                    <?php if($joff['mapel_1_joffline'] != $joff['mapel_2_joffline']) { ?>
                        <hr>
                    <?php } ?>

                    <p class="yellow" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $joff['waktu_2_joffline']; ?>">
                        <strong><?= $joff['mapel_2_joffline']; ?></strong>
                    </p>
                    <p class="blue">
                        <?= $joff['namaguru_2_joffline'] == Null ? "-" : $joff['namaguru_2_joffline']; ?>
                    </p>

                    <?php if($joff['mapel_2_joffline'] != $joff['mapel_3_joffline']) { ?>
                        <hr>
                    <?php } ?>

                    <p class="yellow" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $joff['waktu_3_joffline']; ?>">
                        <strong><?= $joff['mapel_3_joffline']; ?></strong>
                    </p>
                    <p class="blue">
                        <?= $joff['namaguru_3_joffline'] == Null ? "-" : $joff['namaguru_3_joffline']; ?>
                    </p>

                    <?php if($joff['mapel_3_joffline'] != $joff['mapel_4_joffline']) { ?>
                        <hr>
                    <?php } ?>

                    <p class="yellow" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $joff['waktu_4_joffline']; ?>">
                        <strong><?= $joff['mapel_4_joffline']; ?></strong>
                    </p>
                    <p class="blue">
                        <?= $joff['namaguru_4_joffline'] == Null ? "-" : $joff['namaguru_4_joffline']; ?>
                    </p>

                    <?php if($joff['mapel_4_joffline'] != $joff['mapel_5_joffline']) { ?>
                        <hr>
                    <?php } ?>

                    <p class="yellow" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $joff['waktu_5_joffline']; ?>">
                        <strong><?= $joff['mapel_5_joffline']; ?></strong>
                    </p>
                    <p class="blue">
                        <?= $joff['namaguru_5_joffline'] == Null ? "-" : $joff['namaguru_5_joffline']; ?>
                    </p>

                    <?php if($joff['mapel_5_joffline'] != $joff['mapel_6_joffline']) { ?>
                        <hr>
                    <?php } ?>

                    <p class="yellow" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $joff['waktu_6_joffline']; ?>">
                        <strong><?= $joff['mapel_6_joffline']; ?></strong>
                    </p>
                    <p class="blue">
                        <?= $joff['namaguru_6_joffline'] == Null ? "-" : $joff['namaguru_6_joffline']; ?>
                    </p>

                    <?php if($joff['mapel_6_joffline'] != $joff['mapel_7_joffline']) { ?>
                        <hr>
                    <?php } ?>

                    <p class="yellow" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $joff['waktu_7_joffline']; ?>">
                        <strong><?= $joff['mapel_7_joffline']; ?></strong>
                    </p>
                    <p class="blue">
                        <?= $joff['namaguru_7_joffline'] == Null ? "-" : $joff['namaguru_7_joffline']; ?>
                    </p>

                    <?php if($joff['mapel_7_joffline'] != $joff['mapel_8_joffline']) { ?>
                        <hr>
                    <?php } ?>

                    <p class="yellow" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $joff['waktu_8_joffline']; ?>">
                        <strong><?= $joff['mapel_8_joffline']; ?></strong>
                    </p>
                    <p class="blue">
                        <?= $joff['namaguru_8_joffline'] == Null ? "-" : $joff['namaguru_8_joffline']; ?>
                    </p>

                    <?php if($joff['mapel_8_joffline'] != $joff['mapel_9_joffline']) { ?>
                        <hr>
                    <?php } ?>

                    <p class="yellow" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $joff['waktu_9_joffline']; ?>">
                        <strong><?= $joff['mapel_9_joffline']; ?></strong>
                    </p>
                    <p class="blue">
                        <?= $joff['namaguru_9_joffline'] == Null ? "-" : $joff['namaguru_9_joffline']; ?>
                    </p>

                    <?php if($joff['mapel_9_joffline'] != $joff['mapel_10_joffline']) { ?>
                        <hr>
                    <?php } ?>

                    <p class="yellow" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $joff['waktu_10_joffline']; ?>">
                        <strong><?= $joff['mapel_10_joffline']; ?></strong>
                    </p>
                    <p class="blue">
                        <?= $joff['namaguru_10_joffline'] == Null ? "-" : $joff['namaguru_10_joffline']; ?>
                    </p>
                    <?php if($joff['mapel_11_joffline'] || $joff['mapel_12_joffline'] != Null) { ?>


                        <?php if($joff['mapel_10_joffline'] != $joff['mapel_11_joffline']) { ?>
                            <hr>
                        <?php } ?>

                        <p class="yellow" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $joff['waktu_11_joffline']; ?>">
                            <strong><?= $joff['mapel_11_joffline']; ?></strong>
                        </p>
                        <p class="blue">
                            <?= $joff['namaguru_11_joffline'] == Null ? "-" : $joff['namaguru_11_joffline']; ?>
                        </p>

                        <?php if($joff['mapel_11_joffline'] != $joff['mapel_12_joffline']) { ?>
                            <hr>
                        <?php } ?>
                        
                        <p class="yellow" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $joff['waktu_12_joffline']; ?>">
                            <strong><?= $joff['mapel_12_joffline']; ?></strong>
                        </p>
                        <p class="blue">
                            <?= $joff['namaguru_12_joffline'] == Null ? "-" : $joff['namaguru_12_joffline']; ?>
                        </p>
                        
                        <?php } ?>
                    <hr>
                    <a href="/admin/editjoffline/<?= $joff['id_joffline']; ?>">
                        <button class="btn" style="margin: 1vh 2vh 2vh 0;">edit</button>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </section>
    <?php } ?>

    <?php if($statusPas == true) { ?>
    <section id="jadwal-pas">
        <div class="row" id="jpas">
            <h4 class="blue">Jadwal PAS</h4>

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

                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </section>
    <?php } ?>

    <?php if($statusJpiket == true) { ?>
    <section id="jadwal-pas">
        <div class="row" id="jpas">
            <h4 class="blue">Jadwal Piket X PPLG 1</h4>
            <p class="yellow" style="margin-bottom: 20px;">Piket dilakukan diakhir pembelajaran. Bagi yang tidak melaksanakan piket akan didenda Rp 5.000 setiap orang.</p>

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

                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </section>
    <?php } ?>

</div>






<?= $this->endSection(); ?>






