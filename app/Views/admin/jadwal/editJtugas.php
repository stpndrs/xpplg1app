<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" id="edit-berita">

    <h1 class="yellow">Edit Jadwal Minggu Genap</h1>

    <form action="/admin/updateJtugas/<?= $jgt['id_jtugas']; ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="txtId" value="<?= $jgt['id_jtugas']; ?>">
        <!-- <h5 class="blue">Title Berita</h5>
        <input type="text" name="txtTitle" placeholder="Title Berita...." class="<?= ($validation->hasError('txtTitle'))? 'is-invalid' : ''; ?>" value="<?= old('txtTitle'); ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
        <?= $validation->getError('txtTitle'); ?>
        </div> -->

        <h5 class="blue">Hari</h5>
        <input type="text" name="txtHari" placeholder="Hari...." class="<?= ($validation->hasError('txtHari'))? 'is-invalid' : ''; ?>" value="<?= (old('txtHari')) ? old('txtHari') : $jgt['hari_jtugas'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtHari'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Mapel 1</h5>
        <input type="text" name="txtMapel1" placeholder="Mapel 1...." class="<?= ($validation->hasError('txtMapel1'))? 'is-invalid' : ''; ?>" value="<?= (old('txtMapel1')) ? old('txtMapel1') : $jgt['mapel1_jtugas'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtMapel1'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Nama Guru Mapel 1</h5>
        <input type="text" name="txtNmguru1" placeholder="Nama Guru Mapel 1...." class="<?= ($validation->hasError('txtNmguru1'))? 'is-invalid' : ''; ?>" value="<?= (old('txtNmguru1')) ? old('txtNmguru1') : $jgt['nmguru1_jtugas'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNmguru1'); ?>
        </div>
        
        <br>
        <br>

        <h5 class="blue">Mapel 2</h5>
        <input type="text" name="txtMapel2" placeholder="Mapel 2...." class="<?= ($validation->hasError('txtMapel2'))? 'is-invalid' : ''; ?>" value="<?= (old('txtMapel2')) ? old('txtMapel2') : $jgt['mapel2_jtugas'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtMapel2'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Nama Guru Mapel 2</h5>
        <input type="text" name="txtNmguru2" placeholder="Nama Guru Mapel 2...." class="<?= ($validation->hasError('txtNmguru2'))? 'is-invalid' : ''; ?>" value="<?= (old('txtNmguru2')) ? old('txtNmguru2') : $jgt['nmguru2_jtugas'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNmguru2'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Mapel 3</h5>
        <input type="text" name="txtMapel3" placeholder="Mapel 3...." class="<?= ($validation->hasError('txtMapel3'))? 'is-invalid' : ''; ?>" value="<?= (old('txtMapel3')) ? old('txtMapel3') : $jgt['mapel3_jtugas'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtMapel3'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Nama Guru Mapel 3</h5>
        <input type="text" name="txtNmguru3" placeholder="Nama Guru Mapel 3...." class="<?= ($validation->hasError('txtNmguru3'))? 'is-invalid' : ''; ?>" value="<?= (old('txtNmguru3')) ? old('txtNmguru3') : $jgt['nmguru3_jtugas'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNmguru3'); ?>
        </div>
        
        <br>
        <br>

        <h5 class="blue">Mapel 4</h5>
        <input type="text" name="txtMapel4" placeholder="Mapel 4...." class="<?= ($validation->hasError('txtMapel4'))? 'is-invalid' : ''; ?>" value="<?= (old('txtMapel4')) ? old('txtMapel4') : $jgt['mapel4_jtugas'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtMapel4'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Nama Guru Mapel 4</h5>
        <input type="text" name="txtNmguru4" placeholder="Nama Guru Mapel 4...." class="<?= ($validation->hasError('txtNmguru4'))? 'is-invalid' : ''; ?>" value="<?= (old('txtNmguru4')) ? old('txtNmguru4') : $jgt['nmguru4_jtugas'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNmguru4'); ?>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-left: 0;">Simpan</button>
        <p onclick="window.history.go(-1)" class="text-start btn blue"><i class="bi bi-chevron-double-left"></i>Kembali</p>

    </form>
</div>

<?= $this->endSection(); ?>