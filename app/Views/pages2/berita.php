<?= $this->extend('pages2/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container berita-page" id="home">
    <header>
        <div class="bg"></div>
        <h1 class="title yellow">Berita Terbaru</h1>
    </header>

    <section>
        <div class="berita berita-page" id="berita">

            <?php foreach($berita as $brt) : ?>
            <div class="row">
                <div class="card">
                    <img src="/img/no-image.png" alt="">
                    <div class="content">
                        <h4 class="yellow"><?= substr($brt['title_info'],0 ,30); ?></h4>
                        <p class="blue">Last Update : <?= $brt['updated_at']; ?></p>
                        <p><?= substr($brt['isi_info'],0 ,100); ?>....</p>
                        <a href="/berita/detail/<?= $brt['id_info']; ?>" class="yellow">Selengkapnya....</a>
                        <br>
                        <br>
                        <?php
                        if ($brt['link_info'] !== '') {
                        ?>

                        <a href="<?= $brt['link_info']; ?>" target="_break" class="blue">Kunjungi Link</a>

                        <?php 
                        } 
                        ?>

                        <br>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </section>

</div>

<?= $this->endSection(); ?>