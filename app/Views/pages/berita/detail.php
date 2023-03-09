<?= $this->extend('pages/layout/template.php'); ?>

<?= $this->section('content'); ?>

<div class="container" id="detail-berita">
    <div class="card">

        <p onclick="window.history.go(-1)" class="text-start btn blue"><i class="bi bi-chevron-double-left"></i>Kembali</p>
        <!-- <a href="#" class="text-start btn blue"><i class="bi bi-chevron-double-left"></i>Kembali</a> -->

        <h1 class="title yellow"><?= $dtl['title_info']; ?></h1>
        <p class="blue"><?= $dtl['updated_at']; ?></p>
        <img src="/img/no-image.png" alt="<?= $dtl['title_info']; ?>">
        <p><?= $dtl['isi_info']; ?></p>
        <br>
        <br>
        <!-- <button class="btn" style="margin: 0;">Unduh Dokumen</button> -->
        <br>
        <?php if($dtl['link_info'] != '') { ?>
        <a href="#" class="btn blue">Kunjungi Link</a>
        <?php } ?>
    </div>

</div>

<?= $this->endSection(); ?>