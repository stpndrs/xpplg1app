<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container" id="jadwal">
    <!-- <header>
        <div class="bg"></div>
        <h1 class="title yellow">Jadwal Kelas</h1>
    </header> -->

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






