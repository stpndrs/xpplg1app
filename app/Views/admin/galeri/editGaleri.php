<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<?= $this->section('style') ?>

<style>
  .swiper {
    width: 50%;
    height: 100%;
  }

  .swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;
  }
</style>

<?= $this->endSection(); ?>
<div class="container" id="edit-galeri">

  <h1 class="yellow">Edit Galeri</h1>

  <form action="/admin/updateGaleri/<?= $glr['id']; ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="txtId" value="<?= $glr['id']; ?>">

    <!-- <h5 class="blue">Title Berita</h5>
    <input type="text" name="txtTitle" placeholder="Title Berita...." class="<?= ($validation->hasError('txtTitle')) ? 'is-invalid' : ''; ?>" value="<?= old('txtTitle'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtTitle'); ?>
    </div> -->

    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <?php foreach ($gbr as $gambar) : ?>
          <div class="swiper-slide"><img src="/img/<?= $gambar['gambar']; ?>" alt=""></div>
        <?php endforeach; ?>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>

    <br>
    <br>

    <h5 class="blue">Title Galeri</h5>
    <input type="text" name="txtTitle" placeholder="Title Galeri...." class="<?= ($validation->hasError('txtTitle')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtTitle')) ? old('txtTitle') : $glr['title'] ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtTitle'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Isi Galeri</h5>
    <textarea class="ckeditor ck-add-task <?= ($validation->hasError('txtIsi')) ? 'is-invalid' : ''; ?>" id="ckeditor" name="txtIsi"><?= nl2br((old('txtIsi')) ? old('txtIsi') : $glr['deskripsi']) ?></textarea>
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtIsi'); ?>
    </div>

    <br>
    <br>

    <button type="submit" class="btn btn-primary" style="margin-left: 0;">Simpan</button>
    <p onclick="window.history.go(-1)" class="text-start btn blue"><i class="bi bi-chevron-double-left"></i>Kembali</p>

  </form>
</div>

<?= $this->endSection(); ?>