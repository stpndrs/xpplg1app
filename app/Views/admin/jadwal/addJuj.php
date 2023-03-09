<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" id="edit-berita">

  <h1 class="yellow">Tambah Jadwal Ujian</h1>

  <form action="/admin/saveJuj" method="POST" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <!-- <h5 class="blue">Title galeri</h5>
    <input type="text" name="txtNama" placeholder="Title Galeri...." class="<?= ($validation->hasError('txtNama'))? 'is-invalid' : ''; ?>" value="<?= old('txtNama'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtNama'); ?>
    </div> -->
    
    <h5 class="blue">Hari PAS</h5>
    <input type="text" name="txtHari" placeholder="Hari PAS...." class="<?= ($validation->hasError('txtHari'))? 'is-invalid' : ''; ?>" value="<?= old('txtHari'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtHari'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Tanggal PAS</h5>
    <input type="text" name="txtTgl" placeholder="Tanggal PAS...." class="<?= ($validation->hasError('txtTgl'))? 'is-invalid' : ''; ?>" value="<?= old('txtTgl'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtTgl'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Mapel 1 PAS</h5>
    <input type="text" name="txtMapel1" placeholder="Mapel 1 PAS...." class="<?= ($validation->hasError('txtMapel1'))? 'is-invalid' : ''; ?>" value="<?= old('txtMapel1'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtMapel1'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Waktu PAS Mapel 1</h5>
    <input type="text" name="txtJam1" placeholder="Waktu PAS Mapel 1...." class="<?= ($validation->hasError('txtJam1'))? 'is-invalid' : ''; ?>" value="<?= old('txtJam1'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtJam1'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Mapel 2 PAS</h5>
    <input type="text" name="txtMapel2" placeholder="Mapel 2 PAS...." class="<?= ($validation->hasError('txtMapel2'))? 'is-invalid' : ''; ?>" value="<?= old('txtMapel2'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtMapel2'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Waktu PAS Mapel 2</h5>
    <input type="text" name="txtJam2" placeholder="Waktu PAS Mapel 2...." class="<?= ($validation->hasError('txtJam2'))? 'is-invalid' : ''; ?>" value="<?= old('txtJam2'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtJam2'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Mapel 3 PAS</h5>
    <input type="text" name="txtMapel3" placeholder="Mapel 3 PAS...." class="<?= ($validation->hasError('txtMapel3'))? 'is-invalid' : ''; ?>" value="<?= old('txtMapel3'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtMapel3'); ?>
    </div>

    <br>
    <br>

    <h5 class="blue">Waktu PAS Mapel 3</h5>
    <input type="text" name="txtJam3" placeholder="Waktu PAS Mapel 3...." class="<?= ($validation->hasError('txtJam3'))? 'is-invalid' : ''; ?>" value="<?= old('txtJam3'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtJam3'); ?>
    </div>

    <br>
    <br>

    <button type="submit" class="btn btn-primary" style="margin-left: 0;">Simpan</button>
    <p onclick="window.history.go(-1)" class="text-start btn blue"><i class="bi bi-chevron-double-left"></i>Kembali</p>

  </form>
</div>

<?= $this->endSection(); ?>