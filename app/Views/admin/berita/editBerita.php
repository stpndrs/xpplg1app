<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" id="edit-berita">

  <h1 class="yellow">Edit Berita</h1>

  <form action="/admin/updateBerita/<?= $brt['id_info']; ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="txtId" value="<?= $brt['id_info']; ?>">
    <!-- <h5 class="blue">Title Berita</h5>
    <input type="text" name="txtTitle" placeholder="Title Berita...." class="<?= ($validation->hasError('txtTitle'))? 'is-invalid' : ''; ?>" value="<?= old('txtTitle'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtTitle'); ?>
    </div> -->

    <h5 class="blue">Title Berita</h5>
    <input type="text" name="txtTitle" placeholder="Title Berita...." class="<?= ($validation->hasError('txtTitle'))? 'is-invalid' : ''; ?>" value="<?= (old('txtTitle')) ? old('txtTitle') : $brt['title_info'] ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtTitle'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Isi Berita</h5>
    <textarea class="ckeditor ck-add-task <?= ($validation->hasError('txtIsi'))? 'is-invalid' : ''; ?>" id="ckeditor" name="txtIsi"><?= nl2br((old('txtIsi')) ? old('txtIsi') : $brt['isi_info']) ?></textarea>
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtIsi'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Upload File</h5>
    <input class="form-control <?= ($validation->hasError('txtGambar'))? 'is-invalid' : ''; ?>" type="file" id="formFile" name="txtGambar" value="<?= old('txtGambar'); ?>" onchange="previewGambar()">
    <br>
    <div class="col-sm-2">
      <img src="/img/no-image.png" class="img-thumbnail img-preview">
    </div>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtGambar'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Link yang Terhubung</h5>
    <input type="text" name="txtLink" placeholder="Link yang Terhubung...." class="<?= ($validation->hasError('txtLink'))? 'is-invalid' : ''; ?>" value="<?= (old('txtLink')) ? old('txtLink') : $brt['link_info'] ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtLink'); ?>
    </div>

    <button type="submit" class="btn btn-primary" style="margin-left: 0;">Simpan</button>
    <p onclick="window.history.go(-1)" class="text-start btn blue"><i class="bi bi-chevron-double-left"></i>Kembali</p>

  </form>
</div>

<?= $this->endSection(); ?>