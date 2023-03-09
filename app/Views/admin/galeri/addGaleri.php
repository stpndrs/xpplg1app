<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" id="tambah-galeri">

  <h1 class="yellow">Tambah Galeri</h1>

  <form action="/admin/saveGaleri" method="POST" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <!-- <h5 class="blue">Title galeri</h5>
    <input type="text" name="txtTitle" placeholder="Title Galeri...." class="<?= ($validation->hasError('txtTitle'))? 'is-invalid' : ''; ?>" value="<?= old('txtTitle'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtTitle'); ?>
    </div> -->

    <h5 class="blue">Title Galeri</h5>
    <input type="text" name="txtTitle" placeholder="Title Galeri...." class="<?= ($validation->hasError('txtTitle'))? 'is-invalid' : ''; ?>" value="<?= old('txtTitle'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtTitle'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Isi Galeri</h5>
    <textarea class="ckeditor ck-add-task <?= ($validation->hasError('txtIsi'))? 'is-invalid' : ''; ?>" id="ckeditor" name="txtIsi"><?= old('txtIsi'); ?></textarea>
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtIsi'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Upload Gambar 1</h5>
    <h6 class="form-label-gambar1 yellow"></h6>
    <input class="form-control <?= ($validation->hasError('txtGambar'))? 'is-invalid' : ''; ?>" type="file" id="gambar1" name="txtGambar[]" value="<?= old('txtGambar'); ?>" onchange="previewGambar1()">
    <br>
    <div class="col-sm-2">
      <img src="/img/no-image.png" class="img-thumbnail img-preview1">
    </div>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtGambar'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Upload Gambar 2</h5>
    <h6 class="form-label-gambar2 yellow"></h6>
    <input class="form-control <?= ($validation->hasError('txtGambar')) ? 'is-invalid' : ''; ?>" type="file" id="gambar2" name="txtGambar[]" value="<?= old('txtGambar'); ?>" onchange="previewGambar2()">
    <br>
    <div class="col-sm-2">
      <img src="/img/no-image.png" class="img-thumbnail img-preview2">
    </div>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtGambar'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Upload Gambar 3</h5>
    <h6 class="form-label-gambar3 yellow"></h6>
    <input class="form-control <?= ($validation->hasError('txtGambar')) ? 'is-invalid' : ''; ?>" type="file" id="gambar3" name="txtGambar[]" value="<?= old('txtGambar'); ?>" onchange="previewGambar3()">
    <br>
    <div class="col-sm-2">
      <img src="/img/no-image.png" class="img-thumbnail img-preview3">
    </div>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtGambar'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Upload Gambar 4</h5>
    <h6 class="form-label-gambar4 yellow"></h6>
    <input class="form-control <?= ($validation->hasError('txtGambar')) ? 'is-invalid' : ''; ?>" type="file" id="gambar4" name="txtGambar[]" value="<?= old('txtGambar'); ?>" onchange="previewGambar4()">
    <br>
    <div class="col-sm-2">
      <img src="/img/no-image.png" class="img-thumbnail img-preview4">
    </div>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtGambar'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Upload Gambar 5</h5>
    <h6 class="form-label-gambar5 yellow"></h6>
    <input class="form-control <?= ($validation->hasError('txtGambar')) ? 'is-invalid' : ''; ?>" type="file" id="gambar5" name="txtGambar[]" value="<?= old('txtGambar'); ?>" onchange="previewGambar5()">
    <br>
    <div class="col-sm-2">
      <img src="/img/no-image.png" class="img-thumbnail img-preview5">
    </div>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtGambar'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Upload Gambar 6</h5>
    <h6 class="form-label-gambar6 yellow"></h6>
    <input class="form-control <?= ($validation->hasError('txtGambar')) ? 'is-invalid' : ''; ?>" type="file" id="gambar6" name="txtGambar[]" value="<?= old('txtGambar'); ?>" onchange="previewGambar6()">
    <br>
    <div class="col-sm-2">
      <img src="/img/no-image.png" class="img-thumbnail img-preview6">
    </div>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtGambar'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Upload Gambar 7</h5>
    <h6 class="form-label-gambar7 yellow"></h6>
    <input class="form-control <?= ($validation->hasError('txtGambar')) ? 'is-invalid' : ''; ?>" type="file" id="gambar7" name="txtGambar[]" value="<?= old('txtGambar'); ?>" onchange="previewGambar7()">
    <br>
    <div class="col-sm-2">
      <img src="/img/no-image.png" class="img-thumbnail img-preview7">
    </div>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtGambar'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Upload Gambar 8</h5>
    <h6 class="form-label-gambar8 yellow"></h6>
    <input class="form-control <?= ($validation->hasError('txtGambar')) ? 'is-invalid' : ''; ?>" type="file" id="gambar8" name="txtGambar[]" value="<?= old('txtGambar'); ?>" onchange="previewGambar8()">
    <br>
    <div class="col-sm-2">
      <img src="/img/no-image.png" class="img-thumbnail img-preview8">
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