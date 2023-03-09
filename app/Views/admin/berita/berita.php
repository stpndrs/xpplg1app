<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container berita-page" id="home">
    <header>
        <div class="bg"></div>
        <h1 class="title yellow">Berita Terbaru</h1>
    </header>

    <section>
        <div class="berita berita-page" id="berita">

            <a href="/admin/addBerita" class="btn">Tambah Berita</a>

            <?php if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success alert-dismissible fade show pesan-success" role="alert">
                <h6><?= session()->getFlashdata('pesan'); ?>!</h6>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>

            <?php foreach($berita as $brt) : ?>
            <div class="row">
                <div class="card">
                    <img src="/img/no-image.png" alt="">
                    <div class="content">
                        <h4 class="yellow"><?= substr($brt['title_info'],0 ,30); ?></h4>
                        <p class="blue">Last Update : <?= $brt['updated_at']; ?></p>
                        <p><?= substr($brt['isi_info'],0 ,100); ?>....</p>
                        <a href="/admin/detail/<?= $brt['id_info']; ?>" class="yellow">Selengkapnya....</a>
                        <br>
                        <br>
                        <?php if ($brt['dokumen_info'] !== '') {
                        ?>

                        <!-- <a href="/berita/download/<?= $brt['id_info']; ?>"><button class="btn" style="margin: 0;">Unduh Dokumen</button></a> -->

                        <?php
                        } 
                        if ($brt['link_info'] !== '') {
                        ?>

                        <a href="<?= $brt['link_info']; ?>" target="_break" class="blue">Kunjungi Link</a>

                        <?php 
                        } 
                        ?>

                        <br>

                        <a href="/admin/editBerita/<?= $brt['id_info']; ?>">
                            <button class="btn" style="margin: 1vh 2vh 2vh 0;">edit</button>
                        </a>
                        <form action="/admin/deleteBerita/<?= $brt['id_info']; ?>" method="POST" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE PROJECT">
                            <button type="submit" class="btn" onclick="return confirm('Anda Yakin Ingin Menghapus Berita?')" style="margin: 1vh 2vh 2vh 0;"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </section>

</div>

<?= $this->endSection(); ?>