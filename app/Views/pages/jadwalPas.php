<?= $this->extend('pages/layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container" id="jadwal">
    <!-- <header>
        <div class="bg"></div>
        <h1 class="title yellow">Jadwal Kelas</h1>
    </header> -->

    <br>
    <br>

    <?php if($statusPas == true) { ?>
    <section id="jadwal-pas">
        <div class="row" id="jpas">
            <h4 class="blue">Jadwal Ujian</h4>

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
    <?php } else {
        echo 'Jadwal Sedang Dinonaktifkan, <a href="http://stpndrs.epizy.com/" target="_blank">Hubungi Admin?</a>';
    } ?>


</div>






<?= $this->endSection(); ?>






