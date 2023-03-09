<?php

// echo date('H:i');

if (time() < strtotime('05:00:00') or time() > strtotime('18:00:00')) {
    $theme = 'dark';
    //   $good = 'Good Night 🌕';
} else if (time() > strtotime('05:00:00') or time() < strtotime('18:00:00')) {
    $theme = 'light';
    //   $good = 'Good Evening ☀️';
}

if (time() >= strtotime('05:00:00')) {
    $good = 'Good Morning ☀️';
}
if (time() >= strtotime('12:00:00')) {
    $good = 'Good Afternoon ☀️';
}
if (time() >= strtotime('18:00:00')) {
    $good = 'Good Night 🌕';
}
if (time() <= strtotime('04:59:00')) {
    $good = 'Good Night 🌕';
}
// dd($good);
?>

<?= $this->extend('pages/layout/template'); ?>

<?= $this->section('style'); ?>

<style>
    nav {
        background-color: unset;
    }
</style>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="header-moon">
    <section>
        <?php if ($theme == 'dark') { ?>
            <div id="particles-js"></div>
            <img src="<?= base_url(); ?>/imgassets/stars.png" id="stars" alt="stars" />
        <?php } else { ?>
            <div class="awan" id="stars">
                <div id="background-wrap">
                    <div class="x1">
                        <div class="cloud"></div>
                    </div>

                    <div class="x2">
                        <div class="cloud"></div>
                    </div>

                    <div class="x3">
                        <div class="cloud"></div>
                    </div>

                    <div class="x4">
                        <div class="cloud"></div>
                    </div>

                    <div class="x5">
                        <div class="cloud"></div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <img src="<?= base_url(); ?>/imgassets/<?= $theme == 'dark' ? 'moon' : 'sun'; ?>.png" id="moon" alt="moon" />
        <img src="<?= base_url(); ?>/imgassets/mountains_behind<?= $theme == 'dark' ? '' : '_light'; ?>.png" id="mountains_behind" />
        <h1 class="text"><?= $good; ?></h1>
        <!-- <h1 class="text">Good Morning</h1> -->
        <img src="<?= base_url(); ?>/imgassets/mountains_front<?= $theme == 'dark' ? '' : '_light'; ?>.png" id="mountains_front" />
    </section>
</div>
<div class="container" id="home">

    <section>
        <div class="berita" id="berita">
            <h1 class="yellow">Berita Terbaru</h1>

            <?php if ($berita == null) { ?>
                <p>Sedang tidak ada berita sekarang</p>
                <?php } else {
                foreach ($berita as $brt) : ?>
                    <div class="row">
                        <div class="card">
                            <img src="<?= base_url(); ?>/img/no-image.png" alt="">
                            <div class="content">
                                <h4 class="yellow"><?= substr($brt['title_info'], 0, 30); ?></h4>
                                <p class="blue">Last Update : <?= $brt['updated_at']; ?></p>
                                <p><?= substr($brt['isi_info'], 0, 100); ?>....</p>
                                <a href="<?= base_url(); ?>/berita/detail/<?= $brt['id_info']; ?>" class="yellow">Selengkapnya....</a>
                                <br>
                                <br>
                                <?php if ($brt['dokumen_info'] !== '') {
                                ?>

                                    <!-- <a href="berita/download?file=<?= $brt['dokumen_info']; ?>"><button class="btn" style="margin: 0;">Unduh Dokumen</button></a> -->

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
                <a href="<?= base_url(); ?>/berita">
                    <button class="btn">
                        <a href="<?= base_url(); ?>/berita">Berita Lainnya</a>
                    </button>
                </a>
            <?php
            }
            ?>


        </div>
    </section>

    <section>
        <div class="galeri" id="galeri">

            <h1 class="yellow">Galeri</h1>
            <div class="row">

                <?php if ($galeri == null) { ?>
                    <p>Sedang tidak ada gambar sekarang</p>
                    <?php } else {
                    foreach ($galeri as $post) : ?>
                        <div class="col col-4 mb-4">
                            <div class="card">
                                <!-- Swiper -->
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($post['gambar'] as $gambar) { ?>
                                            <div class="swiper-slide"><img src="<?= base_url(); ?>/img/<?= $gambar['gambar']; ?>" alt=""></div>
                                        <?php } ?>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-pagination"></div>
                                </div>
                                <div class="content">
                                    <h3 class="yellow"><?= $post['title']; ?></h3>
                                    <p class="blue"><?= $post['updated_at']; ?></p>
                                    <p><?= $post['deskripsi']; ?></p>
                                    <!-- <a href="/galeri/detail" class="yellow">Selengkapnya....</a> -->
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

            </div>

            <a href="<?= base_url(); ?>/galeri">
                <button class="btn">
                    <a href="<?= base_url(); ?>/galeri">Galeri Lainnya</a>
                </button>
            </a>
        <?php
                }
        ?>

        </div>
    </section>

</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<script>
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) {
            document.getElementById("navbar").style.backgroundColor = "white";
        } else {
            document.getElementById("navbar").style.backgroundColor = "unset";
        }
    }

    let stars = document.getElementById("stars");
    let moon = document.getElementById("moon");
    let mountains_front = document.getElementById("mountains_front");
    let mountains_behind = document.getElementById("mountains_behind");
    let text = document.getElementById("text");
    let btn = document.getElementById("btn");
    let header = document.querySelector("header");

    window.addEventListener("scroll", function() {
        let value = window.scrollY;

        stars.style.left = value * 0.25 + "px";
        moon.style.top = value * 1.05 + "px";

        mountains_behind.style.top = value * 0.5 + "px";
        mountains_front.style.top = value * 0 + "px";

        text.style.marginRight = value * 4 + "px";
        text.style.marginTop = value * 1.5 + "px";
        btn.style.marginTop = value * 1.5 + "px";

        header.style.top = value * 0.5 + "px";
    });











    particlesJS("particles-js", {
        "particles": {
            "number": {
                "value": 100,
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "color": {
                "value": "#ffffff"
            },
            "shape": {
                "type": "circle",
                "stroke": {
                    "width": 0,
                    "color": "#000000"
                },
                "polygon": {
                    "nb_sides": 5
                },
                "image": {
                    "src": "img/github.svg",
                    "width": 100,
                    "height": 100
                }
            },
            "opacity": {
                "value": 0.5,
                "random": false,
                "anim": {
                    "enable": false,
                    "speed": 1,
                    "opacity_min": 0.1,
                    "sync": false
                }
            },
            "size": {
                "value": 3,
                "random": true,
                "anim": {
                    "enable": false,
                    "speed": 40,
                    "size_min": 0.1,
                    "sync": false
                }
            },
            "line_linked": {
                "enable": true,
                "distance": 150,
                "color": "#406fbb",
                "opacity": 0.4,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 6,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "bounce": false,
                "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 1200
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "repulse"
                },
                "onclick": {
                    "enable": true,
                    "mode": "push"
                },
                "resize": true
            },
            "modes": {
                "grab": {
                    "distance": 400,
                    "line_linked": {
                        "opacity": 1
                    }
                },
                "bubble": {
                    "distance": 400,
                    "size": 40,
                    "duration": 2,
                    "opacity": 8,
                    "speed": 3
                },
                "repulse": {
                    "distance": 200,
                    "duration": 0.4
                },
                "push": {
                    "particles_nb": 4
                },
                "remove": {
                    "particles_nb": 2
                }
            }
        },
        "retina_detect": true
    });
    var count_particles, stats, update;
    stats = new Stats;
    stats.setMode(0);
    stats.domElement.style.position = 'absolute';
    stats.domElement.style.left = '0px';
    stats.domElement.style.top = '0px';
    document.body.appendChild(stats.domElement);
    count_particles = document.querySelector('.js-count-particles');
    update = function() {
        stats.begin();
        stats.end();
        if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
            count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
        }
        requestAnimationFrame(update);
    };
    requestAnimationFrame(update);;
</script>
<?= $this->endSection(); ?>