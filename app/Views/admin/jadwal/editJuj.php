<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" id="edit-berita">

    <h1 class="yellow">Edit Jadwal Ujian</h1>

    <form action="/admin/updateJuj/<?= $jps['id_jpas']; ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="txtId" value="<?= $jps['id_jpas']; ?>">
        <!-- <h5 class="blue">Title Berita</h5>
        <input type="text" name="txtTitle" placeholder="Title Berita...." class="<?= ($validation->hasError('txtTitle'))? 'is-invalid' : ''; ?>" value="<?= old('txtTitle'); ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
        <?= $validation->getError('txtTitle'); ?>
        </div> -->

        <h5 class="blue">Hari</h5>
        <input type="text" name="txtHari" placeholder="Hari...." class="<?= ($validation->hasError('txtHari'))? 'is-invalid' : ''; ?>" value="<?= (old('txtHari')) ? old('txtHari') : $jps['hari_jpas'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtHari'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Tanggal PAS</h5>
        <input type="text" name="txtTgl" placeholder="Tanggal PAS...." class="<?= ($validation->hasError('txtTgl'))? 'is-invalid' : ''; ?>" value="<?= (old('txtTgl')) ? old('txtTgl') : $jps['tanggal_jpas'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtTgl'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Mapel 1</h5>
        <input type="text" name="txtMapel1" placeholder="Mapel 1...." class="<?= ($validation->hasError('txtMapel1'))? 'is-invalid' : ''; ?>" value="<?= (old('txtMapel1')) ? old('txtMapel1') : $jps['mapel1_jpas'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtMapel1'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Waktu PAS Mapel 1</h5>
        <input type="text" name="txtJam1" placeholder="Waktu PAS Mapel 1...." class="<?= ($validation->hasError('txtJam1'))? 'is-invalid' : ''; ?>" value="<?= (old('txtJam1')) ? old('txtJam1') : $jps['jam1_jpas'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtJam1'); ?>
        </div>
        
        <br>
        <br>

        <h5 class="blue">Mapel 2</h5>
        <input type="text" name="txtMapel2" placeholder="Mapel 2...." class="<?= ($validation->hasError('txtMapel2'))? 'is-invalid' : ''; ?>" value="<?= (old('txtMapel2')) ? old('txtMapel2') : $jps['mapel2_jpas'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtMapel2'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Waktu PAS Mapel 2</h5>
        <input type="text" name="txtJam2" placeholder="Waktu PAS Mapel 2...." class="<?= ($validation->hasError('txtJam2'))? 'is-invalid' : ''; ?>" value="<?= (old('txtJam2')) ? old('txtJam2') : $jps['jam2_jpas'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtJam2'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Mapel 2</h5>
        <input type="text" name="txtMapel2" placeholder="Mapel 2...." class="<?= ($validation->hasError('txtMapel2'))? 'is-invalid' : ''; ?>" value="<?= (old('txtMapel2')) ? old('txtMapel2') : $jps['mapel2_jpas'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtMapel2'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Mapel 3</h5>
        <input type="text" name="txtMapel3" placeholder="Mapel 3...." class="<?= ($validation->hasError('txtMapel3'))? 'is-invalid' : ''; ?>" value="<?= (old('txtMapel3')) ? old('txtMapel3') : $jps['mapel3_jpas'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtMapel3'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Waktu PAS Mapel 3</h5>
        <input type="text" name="txtJam3" placeholder="Waktu PAS Mapel 3...." class="<?= ($validation->hasError('txtJam3'))? 'is-invalid' : ''; ?>" value="<?= (old('txtJam3')) ? old('txtJam3') : $jps['jam3_jpas'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtJam3'); ?>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-left: 0;">Simpan</button>
        <p onclick="window.history.go(-1)" class="text-start btn blue"><i class="bi bi-chevron-double-left"></i>Kembali</p>

    </form>
</div>

<?= $this->endSection(); ?>