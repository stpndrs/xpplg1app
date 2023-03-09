<?php

// echo date('H:i');

if (time() < strtotime('05:00:00') or time() > strtotime('18:00:00')) {
  $theme = 'dark';
  // $good = 'Good Night 🌕';
} else if (time() > strtotime('05:00:00') or time() < strtotime('10:00:00')) {
  $theme = 'light';
  // $good = 'Good Morning ☀️';
}
if (time() >= strtotime('06:00:00')) {
  $good = 'Good Morning ☀️';
}
if (time() >= strtotime('12:00:00')) {
  $good = 'Good Afternoon ☀️';
}
if (time() >= strtotime('18:00:00')) {
  $good = 'Good Night 🌕';
}
if (time() <= strtotime('05:59:00')) {
  $good = 'Good Night 🌕';
}
?>

<!doctype html>
<html lang="en">

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

  <link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">

  <?= $this->renderSection('style'); ?>

  <link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>/<?= $layout['icon_layout']; ?>" />

  <?= $gtagJS; ?>
  <title><?= $title; ?></title>
</head>

<body id="<?= $theme; ?>">

  <?= $this->include('pages/layout/navbar'); ?>

  <?= $this->renderSection('content'); ?>

  <?= $this->include('pages/layout/footer'); ?>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

  <!-- PARTICLE JS -->
  <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
  <script src="js/particle.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
</body>

</html>