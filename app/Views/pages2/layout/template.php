<!doctype html>
<html lang="en" id="<?= site_url(uri_string()) == 'http://localhost:8080/' ? 'home' : ''; ?>">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Intelligence Class adalah website informasi kelas yang dibuat dengan tujuan untuk memberikan informasi-informasi atau berita-berita yang diberikan sekolah SMK Negeri 7 Samarinda yang direkayasa sedemikian rupa oleh anggota kelas sendiri.">
  <meta name="keywords" content="Stevan Andreas, stevanandreas, Stevan, Andreas, StevanAndreas, stpndrs, Intelligence Class, SMKN 7 Samarinda, SMK Negeri 7 Samarinda, SMK 7 Samarinda, SMK 7">
  <meta name="author" content="Stevan">

  <meta name="twitter:image:src" content="https://pplg2021.smkn7-smr.sch.id/logo.png" />
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:title" content="Intelligence Class XI PPLG 1 - SMK Negeri 7 Samarinda Website" />
  <meta name="twitter:description" content="Intelligence Class adalah website informasi kelas yang dibuat dengan tujuan untuk memberikan informasi-informasi atau berita-berita yang diberikan sekolah SMK Negeri 7 Samarinda yang direkayasa sedemikian rupa oleh anggota kelas sendiri." />
  <meta property="og:image" content="https://pplg2021.smkn7-smr.sch.id/logo.png" />
  <meta property="og:image:alt" content="Intelligence Class adalah website informasi kelas yang dibuat dengan tujuan untuk memberikan informasi-informasi atau berita-berita yang diberikan sekolah SMK Negeri 7 Samarinda yang direkayasa sedemikian rupa oleh anggota kelas sendiri." />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Intelligence Class XI PPLG 1 - SMK Negeri 7 Samarinda Website" />
  <meta property="og:url" content="https://pplg2021.smkn7-smr.sch.id/" />
  <meta property="og:description" content="Intelligence Class adalah website informasi kelas yang dibuat dengan tujuan untuk memberikan informasi-informasi atau berita-berita yang diberikan sekolah SMK Negeri 7 Samarinda yang direkayasa sedemikian rupa oleh anggota kelas sendiri." />
  <meta property="profile:username" content="stpndrs" />
  <meta name="hostname" content="pplg2021.smkn7-smr.sch.id">
  <meta name="expected-hostname" content="pplg2021.smkn7-smr.sch.id">


  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

  <!-- swiper js -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

  <!-- Owl Carousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">

  <link rel="stylesheet" href="<?= base_url(); ?>/css/layout.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/css/style2.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/css/component.css">

  <?= $this->renderSection('style'); ?>

  <link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>/logo.png" />

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-N26R81P5DP"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-N26R81P5DP');
  </script>
  <title><?= $title; ?></title>
</head>

<body>

  <?= $this->include('pages2/layout/navbar'); ?>

  <?= $this->renderSection('content'); ?>

  <?= $this->include('pages2/layout/footer');
  ?>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

  <?= $this->renderSection('script'); ?>

  <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>

  <!-- APEXCHART JS -->
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

  <!-- Owl Carousel -->
  <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script>
    $(document).ready(function() {
      $(".owl-carousel").owlCarousel();
    });
  </script>
  <script>
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
  </script>

  <!-- Navbar hover -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // make it as accordion for smaller screens
      if (window.innerWidth > 992) {

        document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem) {

          everyitem.addEventListener('mouseover', function(e) {

            let el_link = this.querySelector('a[data-bs-toggle]');

            if (el_link != null) {
              let nextEl = el_link.nextElementSibling;
              el_link.classList.add('show');
              nextEl.classList.add('show');
            }

          });
          everyitem.addEventListener('mouseleave', function(e) {
            let el_link = this.querySelector('a[data-bs-toggle]');

            if (el_link != null) {
              let nextEl = el_link.nextElementSibling;
              el_link.classList.remove('show');
              nextEl.classList.remove('show');
            }


          })
        });

      }
      // end if innerWidth
    });
    // DOMContentLoaded  end
  </script>

  <!-- Tooltips -->
  <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
  </script>
</body>

</html>