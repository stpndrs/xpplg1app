<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" id="tambah-siswa">

  <h1 class="yellow">Tambah Siswa</h1>

  <form action="/admin/updateSiswa/<?= $sis['id_siswa']; ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="txtId" value="<?= $sis['id_siswa']; ?>">
    <input type="hidden" name="txtGambarLama" value="<?= $sis['foto_siswa']; ?>">
    <!-- <h5 class="blue">Title galeri</h5>
    <input type="text" name="txtNama" placeholder="Title Galeri...." class="<?= ($validation->hasError('txtNama'))? 'is-invalid' : ''; ?>" value="<?= old('txtNama'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtNama'); ?>
    </div> -->
    
    <h5 class="blue">Nomor Absen</h5>
    <input type="text" name="txtAbsen" placeholder="Nomor Absen...." class="<?= ($validation->hasError('txtAbsen'))? 'is-invalid' : ''; ?>" value="<?= (old('txtAbsen')) ? old('txtAbsen') : $sis['absen_siswa'] ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtAbsen'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Nama Siswa</h5>
    <input type="text" name="txtNamSis" placeholder="Nama Siswa...." class="<?= ($validation->hasError('txtNamSis'))? 'is-invalid' : ''; ?>" value="<?= (old('txtNamSis')) ? old('txtNamSis') : $sis['nama_siswa'] ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtNamSis'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Nisn Siswa</h5>
    <input type="text" name="txtNisn" placeholder="Nisn Siswa...." class="<?= ($validation->hasError('txtNisn'))? 'is-invalid' : ''; ?>" value="<?= (old('txtNisn')) ? old('txtNisn') : $sis['nisn_siswa'] ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtNisn'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Instagram</h5>
    <input type="text" name="txtIg" placeholder="Instagram...." class="<?= ($validation->hasError('txtIg'))? 'is-invalid' : ''; ?>" value="<?= (old('txtIg')) ? old('txtIg') : $sis['ins_siswa'] ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtIg'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Deskripsi</h5>
    <textarea class="ckeditor ck-add-task <?= ($validation->hasError('txtDeskSis'))? 'is-invalid' : ''; ?>" id="ckeditor" name="txtDeskSis"><?= (old('txtDeskSis')) ? old('txtDeskSis') : $sis['desk_siswa'] ?></textarea>
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtDeskSis'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Upload Gambar</h5>
    <h6 class="form-label-gambar yellow"><?= $sis['foto_siswa']; ?></h6>
    <input class="form-control <?= ($validation->hasError('txtGambar'))? 'is-invalid' : ''; ?>" type="file" id="gambar" name="txtGambar" value="<?= old('txtGambar'); ?>" onchange="previewGambar()">
    <br>
    <div class="col-sm-2">
      <img src="/img/<?= $sis['foto_siswa']; ?>" class="img-thumbnail img-preview">
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