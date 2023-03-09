<?= $this->extend('bendahara/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" id="edit-transaksi">

    <h1 class="yellow">Edit Pembayaran Uang Kas</h1>

    <form action="/bendahara/updateKas/<?= $guk['id_pembayaran']; ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="txtId" value="<?= $guk['id_pembayaran']; ?>">
        <!-- <h5 class="blue">Title Berita</h5>
        <input type="text" name="txtTitle" placeholder="Title Berita...." class="<?//= ($validation->hasError('txtTitle'))? 'is-invalid' : ''; ?>" value="<?//= old('txtTitle'); ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
        <?//= $validation->getError('txtTitle'); ?>
        </div> -->

        <h5 class="blue">Nama Siswa</h5>
        <select class="form-select" name="txtNama">
            <!-- <option selected>Nama Siswa</option> -->
            <?php foreach($v as $v) : ?>
            <option <?= $v['id_siswa'] == $guk['id_siswa'] ? 'selected' : '' ?> value="<?= $v['id_siswa']; ?>"><?= $v['nama_siswa']; ?></option>
            <?php endforeach; ?>
        </select>

        <br>
        <br>

        <h5 class="blue">Tanggal</h5>
        <input type="date" name="txtTgl" placeholder="Tanggal Pembayaran...." class="<?= ($validation->hasError('txtTgl'))? 'is-invalid' : ''; ?>" value="<?= (old('txtTgl')) ? old('txtTgl') : $guk['tanggal_pembayaran'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtTgl'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Jumlah</h5>
        <input type="number" name="txtJmlh" placeholder="Jumlah Pembayaran...." class="<?= ($validation->hasError('txtJmlh'))? 'is-invalid' : ''; ?>" value="<?= (old('txtJmlh')) ? old('txtJmlh') : $guk['jumlah_pembayaran'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtJmlh'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue form-check-label">Pembayaran Untuk...</h5>
        <div class="form-check d-flex">
            <input type="checkbox" name="chckMinggu1" value="1" class="form-check-input" <?= $guk['minggu1_pembayaran'] == 1 ? 'checked' : ''; ?>>
            <label class="yellow form-check-label">Minggu I</label>
        </div>
        <br>
        <div class="form-check d-flex">
            <input type="checkbox" name="chckMinggu2" value="1" class="form-check-input" <?= $guk['minggu2_pembayaran'] == 1 ? 'checked' : ''; ?>>
            <label class="yellow form-check-label">Minggu II</label>
        </div>
        <br>
        <div class="form-check d-flex">
            <input type="checkbox" name="chckMinggu3" value="1" class="form-check-input" <?= $guk['minggu3_pembayaran'] == 1 ? 'checked' : ''; ?>>
            <label class="yellow form-check-label">Minggu III</label>
        </div>
        <br>
        <div class="form-check d-flex">
            <input type="checkbox" name="chckMinggu4" value="1" class="form-check-input" <?= $guk['minggu4_pembayaran'] == 1 ? 'checked' : ''; ?>>
            <label class="yellow form-check-label">Minggu IV</label>
        </div>
    
        <br>
        <br>

        <h5 class="blue">Keterangan</h5>
        <textarea name="txtKeterangan" id="editor" placeholder="Keterangan..." class="<?= ($validation->hasError('txtKeterangan'))? 'is-invalid' : ''; ?>"><?= (old('txtKeterangan')) ? old('txtKeterangan') : $guk['keterangan_pembayaran'] ?></textarea>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtKeterangan'); ?>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-left: 0;">Simpan</button>
        <p onclick="window.history.go(-1)" class="text-start btn blue m-0"><i class="bi bi-chevron-double-left"></i>Kembali</p>

    </form>
</div>

<?= $this->endSection(); ?>