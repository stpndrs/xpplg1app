<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container" id="jadwal">
    <!-- <header>
        <div class="bg"></div>
        <h1 class="title yellow">Jadwal Kelas</h1>
    </header> -->
    
    <section id="jadwal-pas">
        <div class="row" id="jpas">
            <h4 class="blue">Jadwal Ujian</h4>

            <?php if(session()->getFlashdata('data-jpas')): ?>
            <div class="alert alert-success alert-dismissible fade show pesan-success" role="alert">
                <h6><?= session()->getFlashdata('data-jpas'); ?></h6>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>

            <a href="/admin/addJuj" style="width: 100%;">
                <button class="btn">Tambah Jadwal Ujian</button>
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

                    <a href="/admin/editJuj/<?= $jps['id_jpas']; ?>">
                        <button class="btn" style="margin: 1vh 2vh 2vh 0;">edit</button>
                    </a>
                    <a href="/admin/deleteJuj/<?= $jps['id_jpas']; ?>">
                        <button class="btn" style="margin: 1vh 2vh 2vh 0;" onclick="return confirm('Yakin ingin menghapus data?')"><i class="bi bi-trash"></i></button>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </section>
    
</div>






<?= $this->endSection(); ?>






