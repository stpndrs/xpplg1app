<?= $this->extend('pages2/layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container" id="jadwal">

    <?php if ($statusPas == true) { ?>
        <section id="jadwal-pas">
            <div class="row" id="jpas">
                <h4 class="blue">Jadwal Ujian</h4>

                <br>
                <br>

                <?php foreach ($jpas as $jps) : ?>
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
    <?php } else { ?>
        <div class="closed">
            <div class="card">
                <p>Jadwal Sedang Ditutup</p>
            </div>

            <img src="<?= base_url(); ?>/imgassets/chill.png" alt="Chill">
        </div>
    <?php } ?>


</div>






<?= $this->endSection(); ?>