<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" id="edit-berita">

    <h1 class="yellow">Edit Jadwal Piket</h1>

    <form action="/admin/updateJpik/<?= $jpk['id_jpiket']; ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="txtId" value="<?= $jpk['id_jpiket']; ?>">
        <!-- <h5 class="blue">Title Berita</h5>
        <input type="text" name="txtTitle" placeholder="Title Berita...." class="<?= ($validation->hasError('txtTitle'))? 'is-invalid' : ''; ?>" value="<?= old('txtTitle'); ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
        <?= $validation->getError('txtTitle'); ?>
        </div> -->

        <h5 class="blue">Hari Piket</h5>
        <input type="text" name="txtHari" placeholder="Hari Piket...." class="<?= ($validation->hasError('txtHari'))? 'is-invalid' : ''; ?>" value="<?= (old('txtHari')) ? old('txtHari') : $jpk['hari_jpiket'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtHari'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Nama Siswa Pertama</h5>
        <input type="text" name="txtNama1" placeholder="Nama siswa pertama...." class="<?= ($validation->hasError('txtNama1'))? 'is-invalid' : ''; ?>" value="<?= (old('txtNama1')) ? old('txtNama1') : $jpk['nama1_jpiket'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNama1'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Nama Siswa Kedua</h5>
        <input type="text" name="txtNama2" placeholder="Nama siswa kedua...." class="<?= ($validation->hasError('txtNama2'))? 'is-invalid' : ''; ?>" value="<?= (old('txtNama2')) ? old('txtNama2') : $jpk['nama2_jpiket'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNama2'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Nama Siswa Ketiga</h5>
        <input type="text" name="txtNama3" placeholder="Nama siswa ketiga...." class="<?= ($validation->hasError('txtNama3'))? 'is-invalid' : ''; ?>" value="<?= (old('txtNama3')) ? old('txtNama3') : $jpk['nama3_jpiket'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNama3'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Nama Siswa Keempat</h5>
        <input type="text" name="txtNama4" placeholder="Nama siswa keempat...." class="<?= ($validation->hasError('txtNama4'))? 'is-invalid' : ''; ?>" value="<?= (old('txtNama4')) ? old('txtNama4') : $jpk['nama4_jpiket'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNama4'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Nama Siswa Kelima</h5>
        <input type="text" name="txtNama5" placeholder="Nama siswa kelima...." class="<?= ($validation->hasError('txtNama5'))? 'is-invalid' : ''; ?>" value="<?= (old('txtNama5')) ? old('txtNama5') : $jpk['nama5_jpiket'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNama5'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Nama Siswa Keenam</h5>
        <input type="text" name="txtNama6" placeholder="Nama siswa keenam...." class="<?= ($validation->hasError('txtNama6'))? 'is-invalid' : ''; ?>" value="<?= (old('txtNama6')) ? old('txtNama6') : $jpk['nama6_jpiket'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNama6'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Nama Siswa Ketujuh</h5>
        <input type="text" name="txtNama7" placeholder="Nama siswa ketujuh...." class="<?= ($validation->hasError('txtNama7'))? 'is-invalid' : ''; ?>" value="<?= (old('txtNama7')) ? old('txtNama7') : $jpk['nama7_jpiket'] ?>">
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