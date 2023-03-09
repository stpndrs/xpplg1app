<?= $this->extend('pages2/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container galeri-page" id="home">
    <h1 class="yellow">Galeri</h1>

    <section>
        <div class="galeri" id="galeri">

            <div class="row">
                <?php foreach ($galeri as $post) : ?>
                    <div class="col col-4 mb-4">
                        <div class="card">
                            <!-- Swiper -->
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <?php foreach ($post['gambar'] as $gambar) { ?>
                                        <div class="swiper-slide"><img src="<?= base_url(); ?>/img/<?= $gambar['gambar']; ?>" alt="<?= $gambar['gambar']; ?>"></div>
                                    <?php } ?>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="content">
                                <h3 class="yellow"><?= $post['title']; ?></h3>
                                <p class="blue"><?= date('l, d-m-Y', strtotime($post['created_at'])); ?></p>
                                <p><?= $post['deskripsi']; ?></p>
                                <!-- <a href="/galeri/detail" class="yellow">Selengkapnya....</a> -->
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </section>
</div>

</div>

<?= $this->endSection(); ?>