<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" id="edit-berita">

  <h1 class="yellow">Tambah Jadwal Piket</h1>

  <form action="/admin/saveJpik" method="POST" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <!-- <h5 class="blue">Title galeri</h5>
    <input type="text" name="txtNama" placeholder="Title Galeri...." class="<?= ($validation->hasError('txtNama'))? 'is-invalid' : ''; ?>" value="<?= old('txtNama'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtNama'); ?>
    </div> -->
    
    <h5 class="blue">Hari Piket</h5>
    <input type="text" name="txtHari" placeholder="Hari Piket...." class="<?= ($validation->hasError('txtHari'))? 'is-invalid' : ''; ?>" value="<?= old('txtHari'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtHari'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Nama siswa pertama</h5>
    <input type="text" name="txtNama1" placeholder="Nama siswa pertama...." class="<?= ($validation->hasError('txtNama1'))? 'is-invalid' : ''; ?>" value="<?= old('txtNama1'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtNama1'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Nama siswa kedua</h5>
    <input type="text" name="txtNama2" placeholder="Nama siswa kedua...." class="<?= ($validation->hasError('txtNama2'))? 'is-invalid' : ''; ?>" value="<?= old('txtNama2'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtNama2'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Nama siswa ketiga</h5>
    <input type="text" name="txtNama3" placeholder="Nama siswa ketiga...." class="<?= ($validation->hasError('txtNama3'))? 'is-invalid' : ''; ?>" value="<?= old('txtNama3'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtNama3'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Nama siswa keempat</h5>
    <input type="text" name="txtNama4" placeholder="Nama siswa pertama...." class="<?= ($validation->hasError('txtNama4'))? 'is-invalid' : ''; ?>" value="<?= old('txtNama4'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtNama4'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Nama siswa kelima</h5>
    <input type="text" name="txtNama5" placeholder="Nama siswa kelima...." class="<?= ($validation->hasError('txtNama5'))? 'is-invalid' : ''; ?>" value="<?= old('txtNama5'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtNama5'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Nama siswa keenam</h5>
    <input type="text" name="txtNama6" placeholder="Nama siswa keenam...." class="<?= ($validation->hasError('txtNama6'))? 'is-invalid' : ''; ?>" value="<?= old('txtNama6'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtNama6'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Nama siswa ketujuh</h5>
    <input type="text" name="txtNama7" placeholder="Nama siswa ketujuh...." class="<?= ($validation->hasError('txtNama7'))? 'is-invalid' : ''; ?>" value="<?= old('txtNama7'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtNama7'); ?>
    </div>

    <br>
    <br>

    <button type="submit" class="btn btn-primary" style="margin-left: 0;">Simpan</button>
    <p onclick="window.history.go(-1)" class="text-start btn blue"><i class="bi bi-chevron-double-left"></i>Kembali</p>

  </form>
</div>

<?= $this->endSection(); ?>