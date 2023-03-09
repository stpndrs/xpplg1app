<?= $this->extend('pages2/layout/template'); ?>

<?= $this->section('content'); ?>

<section id="header" style="margin: 0;">
    <!-- <img class="frame" src="<?= base_url(); ?>/imgassets/blob-scene-haikei.svg" alt="">
    <img class="frame" src="<?= base_url(); ?>/imgassets/blob-scatter-haikei.svg" alt=""> -->
    <!-- <div id="particles-js"></div> -->
    <header>
        <div class="container" id="home">
            <div class="row">
                <div class="col-lg">
                    <img src="/imgassets/foto 1.png" alt="Header Background">
                </div>
                <div class="col-lg">
                    <h1>Welcome to the<br> <span class="yellow">Intelligence Class Website</span><br><small>XI PPLG 1 SMK Negeri 7 Samarinda</small></h1>
                    <button class="btn mt-5">
                        <a href="#thisisic">Explore More</a>
                    </button>
                </div>
            </div>
        </div>
    </header>
</section>
<section id="thisisic" class="mt-5">
    <div class="container">
        <h1>This Is <span class="yellow">Intelligence Class</span></h1>
        <div class="row">
            <div class="col-lg">
                <p>Intelligence Class, adalah sebuah kelas yang berisikan anggota-anggota Kelas XI PPLG 1, SMK Negeri 7 Samarinda, yang berisikan 35 Siswa dan 1 Wali Kelas.</p>
                <!-- <div style="width: 25%;"> -->
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="card" style="height: 40vh;">
                            <img class="rounded-circle" src="<?= base_url(); ?>/img/pak_vicky.jpg" alt="Vicky Priyadi">
                            <br>
                            <h5 class="yellow">Vicky Priyadi</h5>
                            <p>Wali Kelas</p>
                        </div>
                    </div>
                    <?php foreach ($siswa as $sis) : ?>
                        <div class="item">
                            <div class="card" style="height: 40vh;">
                                <img class="rounded-circle" src="<?= base_url(); ?>/img/<?= $sis['foto_siswa']; ?>" alt="<?= $sis['nama_siswa']; ?>">
                                <br>
                                <?= $sis['nama_siswa'] == 'Stevan Andreas' ? '<h5 class="yellow"><a href="https://stevanandreas.com/">' . $sis['nama_siswa'] . '</a></h5>' : '<h5 class="yellow">' . $sis['nama_siswa'] . '</h5>'; ?>
                                <!-- <h5 class="yellow"><?= $sis['nama_siswa']; ?></h5> -->
                                <p>Anggota Kelas</p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <!-- </div> -->
            </div>
            <div class="col-lg">
                <img src="/imgassets/foto 8.png" alt="">
            </div>
        </div>
        
        <!-- Project -->
        <section id="projects">
            <div class="container">
                <h1>Our <span class="yellow">Projects</span></h1>
                <p>Project-project yang sudah kami kerjakan</p>
                <div class="row">
                    <div class="col col-4 mb-3">
                        <div class="card text-start">
                            <img src="<?= base_url(); ?>/img/Screenshot (355).png" alt="">
                            <br>
                            <h5 class="yellow"><a target="_break" href="https://e-library-smk7.netlify.app/" data-bs-toggle="tooltip" data-bs-title="View Demo">E-Library SMK Negeri 7 Samarinda</a></h5>
                            <p class="yellow">Website App Project</p>
                            <div class="technologies">
                                <span>Bootstrap</span>
                                <span>Javascript</span>
                                <span>Laravel</span>
                                <span>JQuery</span>
                            </div>
                        </div>
                    </div>
                    <div class="col col-4 mb-3">
                        <div class="card text-start">
                            <img src="<?= base_url(); ?>/img/jurnal.png" alt="">
                            <br>
                            <h5 class="yellow"><a target="_break" href="http://jurnal.stevanandreas.com/" data-bs-toggle="tooltip" data-bs-title="View Demo">Aplikasi Pendataan Jurnal SMKN 7 Samarinda</a></h5>
                            <p class="yellow">Website App Project</p>
                            <div class="technologies">
                                <span>Javascript</span>
                                <span>Codeigniter 4</span>
                                <span>JQuery</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
</script>

<?= $this->endSection(); ?>