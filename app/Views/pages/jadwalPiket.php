<?= $this->extend('pages/layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container" id="jadwal">
    <!-- <header>
        <div class="bg"></div>
        <h1 class="title yellow">Jadwal Kelas</h1>
    </header> -->

    <br>
    <br>

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
    <?php } else {
        echo 'Jadwal Sedang Dinonaktifkan, <a href="http://stpndrs.epizy.com/" target="_blank">Hubungi Admin?</a>';
    } ?>

</div>






<?= $this->endSection(); ?>






