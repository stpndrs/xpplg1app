<?= $this->extend('bendahara/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" id="tambah-transaksi">

  <h1 class="yellow">Tambah Pembayaran Kas</h1>

  <form action="/bendahara/saveKas" method="POST">
    <?= csrf_field(); ?>

    <!-- <h5 class="blue">Nama Pembeli</h5>
    <input type="text" name="txtNama" placeholder="Nama Pembeli..." class="<?= ($validation->hasError('txtNama'))? 'is-invalid' : ''; ?>" value="<?= old('txtNama'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtNama'); ?>
    </div> -->

    <h5 class="blue">Nama Siswa</h5>
    <select class="form-select" name="txtNama">
      <!-- <option selected>Nama Siswa</option> -->
      <?php foreach($v as $v) : ?>
      <option value="<?= $v['id_siswa']; ?>"><?= $v['nama_siswa']; ?></option>
      <?php endforeach; ?>
    </select>

    <br>
    <br>

    <h5 class="blue">Tanggal</h5>
    <input type="date" name="txtTgl" placeholder="Tanggal Pembayaran..." class="<?= ($validation->hasError('txtTgl')) ? 'is-invalid' : ''; ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtTgl'); ?>
    </div>
    
    <br>
    <br>
    
    <h5 class="blue">Jumlah Pembayaran</h5>
    <input type="text" name="txtJmlh" placeholder="contoh: 10000" class="<?= ($validation->hasError('txtJmlh'))? 'is-invalid' : ''; ?>" value="<?= old('txtJmlh'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtJmlh'); ?>
    </div>
    
    <br>
    <br>
    
    <h5 class="blue form-check-label">Pembayaran Untuk...</h5>
    <div class="form-check d-flex">
      <input type="checkbox" name="chckMinggu1" value="1" class="form-check-input">
      <label class="yellow form-check-label">Minggu I</label>
    </div>
    <br>
    <div class="form-check d-flex">
      <input type="checkbox" name="chckMinggu2" value="1" class="form-check-input">
      <label class="yellow form-check-label">Minggu II</label>
    </div>
    <br>
    <div class="form-check d-flex">
      <input type="checkbox" name="chckMinggu3" value="1" class="form-check-input">
      <label class="yellow form-check-label">Minggu III</label>
    </div>
    <br>
    <div class="form-check d-flex">
      <input type="checkbox" name="chckMinggu4" value="1" class="form-check-input">
      <label class="yellow form-check-label">Minggu IV</label>
    </div>
    
    <br>
    <br>
    
    <h5 class="blue">Keterangan</h5>
    <textarea name="txtKeterangan" id="editor" placeholder="Keterangan..." class="<?= ($validation->hasError('txtKeterangan'))? 'is-invalid' : ''; ?>"><?= old('txtKeterangan'); ?></textarea>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtKeterangan'); ?>
    </div>

    <br>
    <br>

    <button type="submit" class="btn btn-primary" style="margin-left: 0;">Simpan</button>
    <p onclick="window.history.go(-1)" class="text-start btn blue m-0"><i class="bi bi-chevron-double-left"></i>Kembali</p>

  </form>
</div>

<?= $this->endSection(); ?>