<?php

// echo date('H:i');

if (time() < strtotime('05:00:00') or time() > strtotime('18:00:00')) {
  $theme = 'dark';
  // $good = 'Good Night, Admin 🌕';
} else if (time() > strtotime('05:00:00') or time() < strtotime('10:00:00')) {
  $theme = 'light';
  // $good = 'Good Evening, Admin ☀️';
}
if (time() >= strtotime('06:00:00')) {
  $good = 'Good Morning Admin ☀️';
}
if (time() >= strtotime('12:00:00')) {
  $good = 'Good Afternoon Admin ☀️';
}
if (time() >= strtotime('18:00:00')) {
  $good = 'Good Night Admin 🌕';
}
if (time() <= strtotime('05:59:00')) {
  $good = 'Good Night Admin 🌕';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Stevan Andreas" />
  <meta name="keywords" content="Intelligence Class, XPPLG 1, SMK Negeri 7 Samarinda, Kelas XPPLG 1">
  <meta name="description" content="Intelligence Class">
  <meta name="<?= csrf_token() ?>" content="<?= csrf_hash() ?>">

  <title><?= $title; ?></title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

  <!-- DataTable CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/css/app.css">

  <link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">

  <link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>/<?= $layout['icon_layout']; ?>" />

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-TXMXTCHKL0"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-TXMXTCHKL0');
  </script>
</head>

<body id="<?= $theme; ?>">
  <div id="app">

    <?= $this->include('bendahara/layout/navbar'); ?>

    <div id="main">
      <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
          <i class="bi bi-justify fs-3"></i>
        </a>
      </header>
      <?= $this->renderSection('content'); ?>
    </div>

  </div>

  <script src="<?= base_url(); ?>/js/mazer.js"></script>

  <script src="<?= base_url(); ?>/js/script.js"></script>





  <!-- DataTables JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>

  <!-- Ck Editor -->
  <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('editor');
  </script>

  <!-- Jquery -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->

  <script src="/js/script.js"></script>

  <?= $this->renderSection('script'); ?>
</body>