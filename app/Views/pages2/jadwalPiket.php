<?= $this->extend('/pages2/layout/template'); ?>

<?= $this->section('content'); ?>
<?php
$hari = date('l');
switch ($hari) {
    case 'Monday':
        $hari_ini = 'Senin';
        break;
    case 'Tuesday':
        $hari_ini = 'Selasa';
        break;
    case 'Wednesday':
        $hari_ini = 'Rabu';
        break;
    case 'Thursday':
        $hari_ini = 'Kamis';
        break;
    case 'Friday':
        $hari_ini = 'Jumat';
        break;
    case 'Saturday':
        $hari_ini = 'Sabtu';
        break;
    case 'Sunday':
        $hari_ini = 'Minggu';
        break;
}
?>

<div class="container" id="jadwal">
    <section id="jadwal-sekolah">
        <?php if ($statusJpiket == true) { ?>
            <section id="jadwal-pas">
                <div class="row" id="jpas">
                    <h3>Jadwal <span class="yellow">Piket X PPLG 1</span></h3>
                    <p class="yellow" style="margin-bottom: 20px;">Piket dilakukan diakhir pembelajaran. Bagi yang tidak melaksanakan piket akan didenda Rp 5.000 setiap orang.</p>

                    <br>
                    <br>

                    <?php foreach ($jpik as $jpk) : ?>
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
        <?php } else { ?>
            <div class="closed">
                <div class="card">
                    <p>Jadwal Sedang Ditutup</p>
                </div>

                <img src="<?= base_url(); ?>/imgassets/chill.png" alt="Chill">
            </div>
        <?php } ?>
    </section>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
<?= $this->endSection(); ?>