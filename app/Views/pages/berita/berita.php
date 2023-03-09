<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container berita-page" id="home">
    <header>
        <div class="bg"></div>
        <h1 class="title yellow">Berita Terbaru</h1>
    </header>

    <section>
        <div class="berita berita-page" id="berita">

            <div class="row">
                <div class="card">
                    <img src="/img/no-image.png" alt="">
                    <div class="content">
                        <h4 class="yellow">Title Berita</h4>
                        <p class="blue">Jumat, 5 November 2021</p>
                        <p>Diberitahukan kepada bapak/ibu wali kelas X, Bahwa baju seragam icon, baju olahraga dan baju batik sudah bisa diambil di Toko CV. Baruna Karya Jalan Urip Sumoharjo Gang Baruna Subulussalam....</p>
                        <a href="/berita/detail" class="yellow">Selengkapnya....</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="card">
                    <img src="/img/no-image.png" alt="">
                    <div class="content">
                        <h4 class="yellow">Title Berita</h4>
                        <p class="blue">Jumat, 5 November 2021</p>
                        <p>Diberitahukan kepada bapak/ibu wali kelas X, Bahwa baju seragam icon, baju olahraga dan baju batik sudah bisa diambil di Toko CV. Baruna Karya Jalan Urip Sumoharjo Gang Baruna Subulussalam....</p>
                        <a href="/berita/detail" class="yellow">Selengkapnya....</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="card">
                    <img src="/img/no-image.png" alt="">
                    <div class="content">
                        <h4 class="yellow">Title Berita</h4>
                        <p class="blue">Jumat, 5 November 2021</p>
                        <p>Diberitahukan kepada bapak/ibu wali kelas X, Bahwa baju seragam icon, baju olahraga dan baju batik sudah bisa diambil di Toko CV. Baruna Karya Jalan Urip Sumoharjo Gang Baruna Subulussalam....</p>
                        <a href="/berita/detail" class="yellow">Selengkapnya....</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>

<?= $this->endSection(); ?>