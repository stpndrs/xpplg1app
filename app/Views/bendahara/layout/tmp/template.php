<?php

// echo date('H:i');

if (time() < strtotime('05:00:00') or time() > strtotime('18:00:00')) {
  $theme = 'dark';
  // $goodAdmin = 'Good Night, Admin 🌕';
} else if (time() > strtotime('05:00:00') or time() < strtotime('10:00:00')) {
  $theme = 'light';
  // $goodAdmin = 'Good Evening, Admin ☀️';
}
if (time() < strtotime('05:00:00') or time() > strtotime('18:00:00')) {
  $theme = 'dark';
  // $goodBendahara = 'Good Night, Bendahara 🌕';
} else if (time() > strtotime('05:00:00') or time() < strtotime('10:00:00')) {
  $theme = 'light';
  // $goodBendahara = 'Good Evening, Bendahara ☀️';
}

if (time() >= strtotime('06:00:00')) {
  $goodAdmin = 'Good Morning Admin ☀️';
}
if (time() >= strtotime('12:00:00')) {
  $goodAdmin = 'Good Afternoon Admin ☀️';
}
if (time() >= strtotime('18:00:00')) {
  $goodAdmin = 'Good Night Admin 🌕';
}
if (time() <= strtotime('05:59:00')) {
  $goodAdmin = 'Good Night Admin 🌕';
}

if (time() >= strtotime('06:00:00')) {
  $goodBendahara = 'Good Morning Bendahara ☀️';
}
if (time() >= strtotime('12:00:00')) {
  $goodBendahara = 'Good Afternoon Bendahara ☀️';
}
if (time() >= strtotime('18:00:00')) {
  $goodBendahara = 'Good Night Bendahara 🌕';
}
if (time() <= strtotime('05:59:00')) {
  $goodBendahara = 'Good Night Bendahara 🌕';
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Stevan Andreas" />
  <meta name="keywords" content="Intelligence Class, XPPLG 1, SMK Negeri 7 Samarinda, Kelas XPPLG 1">
  <meta name="description" content="Intelligence Class">

  <meta name="<?= csrf_token() ?>" content="<?= csrf_hash() ?>">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-PE0PGF9VNF"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-PE0PGF9VNF');
  </script>

  <?php //foreach ($layout as $lyt) : 
  ?>
  <link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>/<?= $layout['icon_layout']; ?>" />
  <?php //endforeach; 
  ?>

  <title><?= $title; ?></title>

  <link rel="stylesheet" href="/css/style.css">

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

  <!-- Bootstrap core CSS -->
  <link href="/dist/css/bootstrap.min.css" rel="stylesheet">



  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="/css/dashboard.css" rel="stylesheet">
</head>

<body>

  <header class="navbar sticky-top navbar-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><?= in_groups('1') ? $goodAdmin : $goodBendahara; ?> 👋</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
    <!-- <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="#">Sign out</a>
      </div>
    </div> -->
  </header>

  <div class="container-fluid">

    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">

            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/bendahara/">
                <i class="bi bi-speedometer"></i>
                Dashboard
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?= url_is('/bendahara/addTrans') ? 'active' : '' ?>" href="/bendahara/transaksi">
                <i class="bi bi-receipt"></i>
                Transaksi
              </a>
            </li>

            <!-- <li class="nav-item" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false">
            <a href="#" class="nav-link"><i class="bi bi-receipt"></i> Transaksi</a>
          </li>
          <div class="collapse" id="collapseExample">
            <div class="card card-body" id="collapse">
              <li class="nav-item">
                <a href="/bendahara/transaksipengeluaran" class="nav-link">Pengeluaran</a>
                <hr style="margin: 0;">
                <a href="/bendahara/transaksipemasukan" class="nav-link">Pemasukan</a>
              </li>
            </div>
          </div> -->

            <li class="nav-item">
              <a class="nav-link <?= url_is('/bendahara/addKas') ? 'active' : '' ?>" href="/bendahara/datakas">
                <i class="bi bi-clipboard-data"></i>
                Data Uang Kas
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/bendahara/laporan">
                <i class="bi bi-newspaper"></i>
                Laporan
              </a>
            </li>

            <?php if (in_groups('1')) { ?>
              <li class="nav-item">
                <a class="nav-link" href="/admin">
                  <i class="bi bi-person-circle"></i>
                  Admin
                </a>
              </li>
            <?php } ?>


            <hr>

            <li class="nav-item">
              <a class="nav-link" href="/logout">
                <i class="bi bi-box-arrow-left"></i>
                Logout
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <strong style="font-size: x-large;">
                  <span id="jam" class="blue"></span> <span class="yellow">:</span> <span id="menit" class="blue"></span> <span class="yellow">:</span> <span id="detik" class="blue"></span>
                </strong>
              </a>
            </li>

          </ul>

        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <!-- CONTENT START -->
        <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Home Page</h1>
      </div>

      <h3>Section title</h3> -->

        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
      </button> -->
        <?= $this->renderSection('content'); ?>

        <!-- CONTENT END -->
      </main>

    </div>

  </div>


  <script src="../dist/js/bootstrap.bundle.min.js"></script>
  <script src="kalkulator.js"></script>
  <script src="storage.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="/js/dashboard.js"></script>

  <!-- Ck Editor -->
  <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('editor');
  </script>

  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

  <script src="/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <?= $this->renderSection('script'); ?>

</body>

</html>