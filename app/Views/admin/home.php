<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" id="home">
    <section>
        <header>

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/img/foto1.jpg" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="/img/foto2.jpg" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="/img/foto3.jpg" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="/img/foto4.jpg" class="d-block w-100">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card pengantar" id="pengantar">
                        <h1 class="yellow">Pengantar</h1>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit tempora quibusdam dignissimos quasi quas maiores neque deserunt accusantium quam adipisci praesentium quod amet mollitia soluta harum officia, autem assumenda eius reprehenderit tenetur sequi vero possimus rerum hic? Quam laboriosam hic ad veritatis, neque cumque temporibus animi deserunt illo sit pariatur voluptate soluta inventore, ex unde provident quasi tenetur saepe! Quidem, a. Quia obcaecati tenetur pariatur voluptatum, tempora commodi delectus dolor, aperiam, nesciunt minima doloribus dolorem repellat consequuntur quibusdam. Officia amet mollitia ab nostrum numquam. Dolorem dolores autem id ipsa sequi asperiores, earum necessitatibus illum sint quisquam, explicabo est doloribus? Sunt?</p>
                    </div>
                </div>
            </div>

        </header>
    </section>

    <section>
        <div class="berita" id="berita">
            <h1 class="yellow">Berita Terbaru</h1>

            <?php foreach($berita as $brt) : ?>
            <div class="row">
                <div class="card">
                    <img src="/img/no-image.png" alt="">
                    <div class="content">
                        <h4 class="yellow"><?= substr($brt['title_info'],0 ,30); ?></h4>
                        <p class="blue">Last Update : <?= $brt['updated_at']; ?></p>
                        <p><?= substr($brt['isi_info'],0 ,100); ?>....</p>
                        <a href="/berita/detail" class="yellow">Selengkapnya....</a>
                        <br>
                        <br>
                        <?php if ($brt['dokumen_info'] !== '') {
                        ?>

                        <a href="berita/download?file=<?= $brt['dokumen_info']; ?>"><button class="btn" style="margin: 0;">Unduh Dokumen</button></a>

                        <?php
                        } 
                        if ($brt['link_info'] !== '') {
                        ?>

                        <a href="<?= $brt['link_info']; ?>" target="_break" class="blue">Kunjungi Link</a>

                        <?php 
                        } 
                        ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <a href="/berita"><button class="btn">
                <a href="/berita">Berita Lainnya</a>
            </button></a>

        </div>
    </section>

    <section>
        <div class="tenpen" id="tenpen">

            <h1 class="yellow">Tenaga Pendidik</h1>
            <div class="content">
                <div class="row">

                    <div class="col col-3 mb-3" id="center">
                        <div class="card">
                            <img class="img" src="/img/atan cut.jpg" alt="Profile Pic">
                            <div class="card body">
                                <p class="header">M. Gatan</p>
                                <p class="desc">Kepala Sekolah</p>
                            </div>
                        </div>
                    </div>

                    <div class="col col-3 mb-3" id="center">
                        <div class="card">
                            <img class="img" src="/img/hada cut.jpg" alt="Profile Pic">
                            <div class="card body">
                                <p class="header">M. Gatan</p>
                                <p class="desc">Kepala Sekolah</p>
                            </div>
                        </div>
                    </div>

                    <div class="col col-3 mb-3" id="center">
                        <div class="card">
                            <img class="img" src="/img/ihsan cut.jpg" alt="Profile Pic">
                            <div class="card body">
                                <p class="header">M. Gatan</p>
                                <p class="desc">Kepala Sekolah</p>
                            </div>
                        </div>
                    </div>

                    <div class="col col-3 mb-3" id="center">
                        <div class="card">
                            <img class="img" src="/img/oca cut 1.jpg" alt="Profile Pic">
                            <div class="card body">
                                <p class="header">M. Gatan</p>
                                <p class="desc">Kepala Sekolah</p>
                            </div>
                        </div>
                    </div>

                    <div class="col col-3 mb-3" id="center">
                        <div class="card">
                            <img class="img" src="/img/sherly cut.jpg" alt="Profile Pic">
                            <div class="card body">
                                <p class="header">M. Gatan</p>
                                <p class="desc">Kepala Sekolah</p>
                            </div>
                        </div>
                    </div>

                    <div class="col col-3 mb-3" id="center">
                        <div class="card">
                            <img class="img" src="/img/naura cut.jpg" alt="Profile Pic">
                            <div class="card body">
                                <p class="header">M. Gatan</p>
                                <p class="desc">Kepala Sekolah</p>
                            </div>
                        </div>
                    </div>

                    <div class="col col-3 mb-3" id="center">
                        <div class="card">
                            <img class="img" src="/img/William cut.jpg" alt="Profile Pic">
                            <div class="card body">
                                <p class="header">M. Gatan</p>
                                <p class="desc">Kepala Sekolah</p>
                            </div>
                        </div>
                    </div>

                    <div class="col col-3 mb-3" id="center">
                        <div class="card">
                            <img class="img" src="/img/nayla cut.jpg" alt="Profile Pic">
                            <div class="card body">
                                <p class="header">M. Gatan</p>
                                <p class="desc">Kepala Sekolah</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>
                </ul>
            </nav>

        </div>
    </section>

    <section>
        <div class="galeri" id="galeri">

            <h1 class="yellow">Galeri</h1>
            <div class="row">

                <div class="col col-4 mb-4">
                    <div class="card">
                        <img src="/img/no-image.png" alt="">
                        <div class="content">
                            <h3 class="yellow">Title Image</h3>
                            <p class="blue">Jumat, 11 November 2021</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit, error quas! Sit laborum molestiae neque illo deleniti dolorem recusandae tempora?....</p>
                            <!-- <a href="/galeri/detail" class="yellow">Selengkapnya....</a> -->
                        </div>
                    </div>
                </div>

                <div class="col col-4 mb-4">
                    <div class="card">
                        <img src="/img/no-image.png" alt="">
                        <div class="content">
                            <h3 class="yellow">Title Image</h3>
                            <p class="blue">Jumat, 11 November 2021</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit, error quas! Sit laborum molestiae neque illo deleniti dolorem recusandae tempora?....</p>
                            <!-- <a href="/galeri/detail" class="yellow">Selengkapnya....</a> -->
                        </div>
                    </div>
                </div>

                <div class="col col-4 mb-4">
                    <div class="card">
                        <img src="/img/no-image.png" alt="">
                        <div class="content">
                            <h3 class="yellow">Title Image</h3>
                            <p class="blue">Jumat, 11 November 2021</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit, error quas! Sit laborum molestiae neque illo deleniti dolorem recusandae tempora?....</p>
                            <!-- <a href="/galeri/detail" class="yellow">Selengkapnya....</a> -->
                        </div>
                    </div>
                </div>

                <div class="col col-4 mb-4">
                    <div class="card">
                        <img src="/img/no-image.png" alt="">
                        <div class="content">
                            <h3 class="yellow">Title Image</h3>
                            <p class="blue">Jumat, 11 November 2021</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit, error quas! Sit laborum molestiae neque illo deleniti dolorem recusandae tempora?....</p>
                            <!-- <a href="/galeri/detail" class="yellow">Selengkapnya....</a> -->
                        </div>
                    </div>
                </div>

                <div class="col col-4 mb-4">
                    <div class="card">
                        <img src="/img/no-image.png" alt="">
                        <div class="content">
                            <h3 class="yellow">Title Image</h3>
                            <p class="blue">Jumat, 11 November 2021</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit, error quas! Sit laborum molestiae neque illo deleniti dolorem recusandae tempora?....</p>
                            <!-- <a href="/galeri/detail" class="yellow">Selengkapnya....</a> -->
                        </div>
                    </div>
                </div>

                <div class="col col-4 mb-4">
                    <div class="card">
                        <img src="/img/no-image.png" alt="">
                        <div class="content">
                            <h3 class="yellow">Title Image</h3>
                            <p class="blue">Jumat, 11 November 2021</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit, error quas! Sit laborum molestiae neque illo deleniti dolorem recusandae tempora?....</p>
                            <!-- <a href="/galeri/detail" class="yellow">Selengkapnya....</a> -->
                        </div>
                    </div>
                </div>

            </div>

            <a href="/galeri"><button class="btn">
                <a href="/galeri">Galeri Lainnya</a>
            </button></a>

        </div>
    </section>

</div>

<?= $this->endSection(); ?>