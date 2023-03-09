<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container galeri-page" id="home">
    <header>
        <div class="bg"></div>
        <h1 class="yellow">Galeri</h1>
    </header>

    <section>
        <div class="galeri" id="galeri">

            <div class="row">

                <a href="/admin/addGaleri" class="btn mb-5">Tambah Galeri</a>

                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success alert-dismissible fade show pesan-success" role="alert">
                        <h6><?= session()->getFlashdata('pesan'); ?>!</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php foreach ($galeri as $post) : ?>
                    <div class="col col-4 mb-4">
                        <div class="card">
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <?php foreach ($post['gambar'] as $gambar) { ?>
                                        <div class="swiper-slide"><img src="/img/<?= $gambar['gambar']; ?>" alt=""></div>
                                    <?php } ?>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="content">
                                <h3 class="yellow"><?= $post['title']; ?></h3>
                                <p class="blue"><?= $post['created_at']; ?></p>
                                <p><?= $post['deskripsi']; ?></p>
                                <!-- <a href="/galeri/detail" class="yellow">Selengkapnya....</a> -->
                            </div>

                            <a href="/admin/editGaleri/<?= $post['id']; ?>">
                                <button class="btn" style="margin: 0 0 2vh 0;">edit</button>
                            </a>
                            <form action="/admin/deletePost/<?= $post['id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE PROJECT">
                                <button type="submit" class="btn" onclick="return confirm('Yakin ingin menghapus foto?')" style="margin: 0 0 2vh 0;"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </section>

</div>

<?= $this->endSection(); ?>