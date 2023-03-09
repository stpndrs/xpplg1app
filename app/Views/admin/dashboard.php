<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">

    <?php foreach($layout as $lyt) : ?>
    <link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>/<?= $lyt['icon_layout']; ?>"/>
    <?php endforeach; ?>

    <title><?= $title; ?></title>
    
    <link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url(); ?>/dist/css/bootstrap.min.css" rel="stylesheet">
    


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
    <link href="<?= base_url(); ?>/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Intelligence Class</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="#">Sign out</a>
      </div>
    </div>
  </header>

<div class="container-fluid">
  
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>/admin/">
              <i class="bi bi-house"></i>
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>/admin/jadwal">
              <i class="bi bi-card-checklist"></i>
              Jadwal
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>/admin/berita">
              <i class="bi bi-newspaper"></i>
              Berita
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>/admin/galeri">
              <i class="bi bi-columns-gap"></i>
              Galeri
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="/admin/absen">
              <span data-feather="bar-chart-2"></span>
              Absen
            </a>
          </li> -->
        </ul>

      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <!-- CONTENT START -->
      <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Home Page</h1>
      </div>

      <h3>Section title</h3> -->

      <?= $this->renderSection('content'); ?>

      <!-- CONTENT END -->
    </main>

  </div>

</div>


    <script src="../dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="/js/dashboard.js"></script>

    <!-- Ck Editor -->
    <script src="//cdn.ckeditor.com/4.16.2/basic/ckeditor.js"></script>

    <!-- Preview GAmbar -->
    <script>
      function previewGambar() {
        const gambar = document.querySelector('#gambar');
        const gambarLabel = document.querySelector('.form-label-gambar');
        const imgPreview = document.querySelector('.img-preview');

        gambarLabel.textContent = gambar.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function(e) {
          imgPreview.src = e.target.result;
        }
      }

    </script>
    
  </body>
</html>
