<?= $this->extend('bendahara/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" id="tambah-transaksi">

    <h1 class="yellow">Tambah Transaksi Pengeluaran</h1>

    <form action="/bendahara/saveTransPengeluaran" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>

        <!-- <h5 class="blue">Nama Pembeli</h5>
    <input type="text" name="txtNama" placeholder="Nama Pembeli..." class="<?= ($validation->hasError('txtNama')) ? 'is-invalid' : ''; ?>" value="<?= old('txtNama'); ?>">
    <hr>
    <div id="validationServer03Feedback" class="invalid-feedback">
      <?= $validation->getError('txtNama'); ?>
    </div> -->

        <h5 class="blue">Oleh</h5>
        <input type="text" name="txtOleh" placeholder="Nama Pengeluaran Oleh..." class="<?= ($validation->hasError('txtOleh')) ? 'is-invalid' : ''; ?>" value="<?= old('txtOleh'); ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtOleh'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Tanggal</h5>
        <input type="text" name="txtTgl" placeholder="Tanggal Pembelian Barang..." value="<?= date('l, d F Y') ?>" class="<?= ($validation->hasError('txtTgl')) ? 'is-invalid' : ''; ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtTgl'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Jenis Barang</h5>
        <input type="text" name="txtJnsBrg" placeholder="Nama atau Jenis barang..." class="<?= ($validation->hasError('txtJnsBrg')) ? 'is-invalid' : ''; ?>" value="<?= old('txtJnsBrg'); ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtJnsBrg'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Jumlah</h5>
        <input type="text" name="numJumlah" placeholder="Jumlah..." class="<?= ($validation->hasError('numJumlah')) ? 'is-invalid' : ''; ?>" value="<?= old('numJumlah'); ?>">
        <hr>
        <p style="margin: 0;">Jika tidak ada maka isi dengan <b>angka 0</b></p>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('numJumlah'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Uraian</h5>
        <textarea name="txtUraian" id="editor" placeholder="Uraian..." class="<?= ($validation->hasError('txtUraian')) ? 'is-invalid' : ''; ?>"><?= old('txtUraian'); ?></textarea>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtUraian'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Upload Gambar Barang</h5>
        <h6 class="form-label-gambar yellow"></h6>
        <input class="form-control <?= ($validation->hasError('txtGambarBrg')) ? 'is-invalid' : ''; ?>" type="file" id="gambar" name="txtGambarBrg" value="<?= old('txtGambarBrg'); ?>" onchange="previewGambar()">
        <br>
        <div class="col-sm-2">
            <img src="/img/no-image.png" class="img-thumbnail img-preview">
        </div>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtGambarBrg'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Upload Gambar Nota</h5>
        <h6 class="form-label-gambarNota yellow"></h6>
        <input class="form-control <?= ($validation->hasError('txtGambarNota')) ? 'is-invalid' : ''; ?>" type="file" id="gambarNota" name="txtGambarNota" value="<?= old('txtGambarNota'); ?>" onchange="previewGambarNota()">
        <br>
        <div class="col-sm-2">
            <img src="/img/no-image.png" class="img-thumbnail img-previewNota">
        </div>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtGambarNota'); ?>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-left: 0;">Simpan</button>
        <p onclick="window.history.go(-1)" class="text-start btn blue m-0"><i class="bi bi-chevron-double-left"></i>Kembali</p>

    </form>
</div>

<?= $this->endSection(); ?>