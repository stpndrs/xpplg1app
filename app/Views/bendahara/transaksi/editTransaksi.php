<?= $this->extend('bendahara/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" id="edit-transaksi">
    <h1 class="title yellow text-center">Edit Transaksi</h1>

    <form action="/bendahara/updateTrans/<?= $trs['id_transaksi']; ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="txtId" value="<?= $trs['id_transaksi']; ?>">
    <input type="hidden" name="txtGambarLamaBrg" value="<?= $trs['buktibrg_transaksi']; ?>">
    <input type="hidden" name="txtGambarLamaNota" value="<?= $trs['buktinota_transaksi']; ?>">

    <!-- <h5 class="blue">Title Berita</h5>
        <input type="text" name="txtTitle" placeholder="Title Berita...." class="<?= ($validation->hasError('txtTitle'))? 'is-invalid' : ''; ?>" value="<?= old('txtTitle'); ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
        <?= $validation->getError('txtTitle'); ?>
        </div> -->

        <h5 class="blue">Jenis Transaksi</h5>
        <input type="text" name="jenistransaksi" placeholder="Jenis Transaksi...." value="<?= (old('jenistransaksi')) ? old('jenistransaksi') : $trs['jenis_transaksi'] ?>" readonly>
        <hr>

        <br>
        <br>

        <h5 class="blue">Oleh</h5>
        <input type="text" name="txtOleh" placeholder="Nama Pengeluaran Oleh...." class="<?= ($validation->hasError('txtOleh'))? 'is-invalid' : ''; ?>" value="<?= (old('txtOleh')) ? old('txtOleh') : $trs['oleh_transaksi'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtOleh'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Tanggal</h5>
        <input type="date" name="txtTgl" placeholder="Tanggal Pembelian Barang...." class="<?= ($validation->hasError('txtTgl'))? 'is-invalid' : ''; ?>" value="<?= (old('txtTgl')) ? old('txtTgl') : $trs['tanggal_transaksi'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtTgl'); ?>
        </div>

        <br>
        <br>

        <?php if($trs['jenis_transaksi'] == 'Pengeluaran') { ?>
        <h5 class="blue">Jenis Barang</h5>
        <input type="text" name="txtJnsBrg" placeholder="Jenis Barang...." class="<?= ($validation->hasError('txtJnsBrg'))? 'is-invalid' : ''; ?>" value="<?= (old('txtJnsBrg')) ? old('txtJnsBrg') : $trs['jenisbrg_transaksi'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtJnsBrg'); ?>
        </div>

        <br>
        <br>
        <?php } ?>

        <h5 class="blue">Jumlah Transaksi</h5>
        <input type="text" name="numJumlah" placeholder="Jumlah Transaksi...." class="<?= ($validation->hasError('numJumlah'))? 'is-invalid' : ''; ?>" value="<?= (old('numJumlah')) ? old('numJumlah') : $trs['jumlah_transaksi'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('numJumlah'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Uraian</h5>
        <textarea type="text" id="editor" name="txtUraian" placeholder="Uraian...." class="<?= ($validation->hasError('txtUraian'))? 'is-invalid' : ''; ?>"><?= (old('txtUraian')) ? old('txtUraian') : $trs['uraian_transaksi'] ?></textarea>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtUraian'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Upload Gambar Barang</h5>
        <h6 class="form-label-gambar yellow"><?= $trs['buktibrg_transaksi'] != '' ? $trs['buktibrg_transaksi'] : ''; ?></h6>
        <input class="form-control <?= ($validation->hasError('txtGambarBrg'))? 'is-invalid' : ''; ?>" type="file" id="gambar" name="txtGambarBrg" value="<?= $trs['buktibrg_transaksi'] == '' ? old('txtGambarBrg') : $trs['buktibrg_transaksi'] ?>" onchange="previewGambar()">
        <br>
        <div class="col-sm-2">
        <img src="<?= $trs['buktibrg_transaksi'] == 'no-image.png' ? '/img/no-image.png' : '/buktibrgtransaksi/' . $trs['buktibrg_transaksi']; ?>" class="img-thumbnail img-preview">
        </div>
        <div id="validationServer03Feedback" class="invalid-feedback">
        <?= $validation->getError('txtGambarBrg'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Upload Gambar Nota</h5>
        <h6 class="form-label-gambarNota yellow"><?= $trs['buktinota_transaksi'] != '' ? $trs['buktinota_transaksi'] : ''; ?></h6>
        <input class="form-control <?= ($validation->hasError('txtGambarNota'))? 'is-invalid' : ''; ?>" type="file" id="gambarNota" name="txtGambarNota" value="<?= $trs['buktinota_transaksi'] == '' ? old('txtGambarNota') : $trs['buktinota_transaksi'] ?>" onchange="previewGambarNota()">
        <br>
        <div class="col-sm-2">
        <img src="<?= $trs['buktinota_transaksi'] == 'no-image.png' ? '/img/no-image.png' : '/buktiNotatransaksi/' . $trs['buktinota_transaksi']; ?>" class="img-thumbnail img-previewNota">
        </div>
        <div id="validationServer03Feedback" class="invalid-feedback">
        <?= $validation->getError('txtGambarNota'); ?>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-left: 0;">Simpan</button>
        <p onclick="window.history.go(-1)" class="text-start btn blue"><i class="bi bi-chevron-double-left"></i>Kembali</p>

    </form>
</div>

<?= $this->endSection(); ?>