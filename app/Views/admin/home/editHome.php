<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" id="edit-home">

  <h1 class="yellow">Edit Home</h1>

  <form action="/admin/updateHome/<?= $he['id_home']; ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="txtId" value="<?= $he['id_home']; ?>">
    <!-- <h5 class="blue">Title Berita</h5>
    <input type="text" name="txtTitle" placeholder="Title Berita...." class="<?= ($validation->hasError('txtTitle'))? 'is-invalid' : ''; ?>" value="<?= old('txtTitle'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtTitle'); ?>
    </div> -->

    <h5 class="blue">Pengantar</h5>
    <textarea class="ckeditor ck-add-task <?= ($validation->hasError('txtPengantar'))? 'is-invalid' : ''; ?>" id="ckeditor" name="txtPengantar"><?= nl2br((old('txtPengantar')) ? old('txtPengantar') : $he['pengantar_home']) ?></textarea>
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtPengantar'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Upload Gambar</h5>
    <h6 class="form-label-gambar yellow"></h6>
    <input class="form-control <?= ($validation->hasError('txtGambar'))? 'is-invalid' : ''; ?>" type="file" id="gambar" name="txtGambar" value="<?= old('txtGambar'); ?>" onchange="previewGambar()">
    <br>
    <div class="col-sm-2">
      <img src="/img/no-image.png" class="img-thumbnail img-preview">
    </div>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtGambar'); ?>
    </div>

    <br>
    <br>

    <button type="submit" class="btn btn-primary" style="margin-left: 0;">Simpan</button>
    <p onclick="window.history.go(-1)" class="text-start btn blue"><i class="bi bi-chevron-double-left"></i>Kembali</p>

  </form>
</div>

<?= $this->endSection(); ?>