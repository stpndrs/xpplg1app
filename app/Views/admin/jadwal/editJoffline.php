<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" id="edit-berita">

    <h1 class="yellow">Edit Jadwal Offline</h1>

    <form action="/admin/updateJoffline/<?= $jof['id_joffline']; ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="txtId" value="<?= $jof['id_joffline']; ?>">
        <!-- <h5 class="blue">Title Berita</h5>
        <input type="text" name="txtTitle" placeholder="Title Berita...." class="<?= ($validation->hasError('txtTitle')) ? 'is-invalid' : ''; ?>" value="<?= old('txtTitle'); ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
        <?= $validation->getError('txtTitle'); ?>
        </div> -->

        <h5 class="blue">Hari</h5>
        <input type="text" name="txtHari" placeholder="Hari...." class="<?= ($validation->hasError('txtHari')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtHari')) ? old('txtHari') : $jof['hari_joffline'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtHari'); ?>
        </div>

        <br>
        <br>

        <h5 class="blue">Seragam Laki-laki</h5>
        <input type="text" name="txtSeragam" placeholder="Seragam Laki-laki...." class="<?= ($validation->hasError('txtSeragam')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtSeragam')) ? old('txtSeragam') : $jof['seragam_joffline'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtSeragam'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Seragam Perempuan</h5>
        <input type="text" name="txtSeragamPer" placeholder="Seragam Perempuan...." class="<?= ($validation->hasError('txtSeragamPer')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtSeragamPer')) ? old('txtSeragamPer') : $jof['seragamper_joffline'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtSeragamPer'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Mapel 0</h5>
        <input type="text" name="txtMapel0" placeholder="Mapel Pertama...." class="<?= ($validation->hasError('txtMapel0')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtMapel0')) ? old('txtMapel0') : $jof['mapel_0_joffline'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtMapel0'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Jam 0</h5>
        <input type="text" name="txtJam0" placeholder="Jam 0...." class="<?= ($validation->hasError('txtJam0')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtJam0')) ? old('txtJam0') : $jof['waktu_0_joffline'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtJam0'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Nama Guru Mapel 0</h5>
        <input type="text" name="txtNmguru0" placeholder="Nama Guru Mapel 0...." class="<?= ($validation->hasError('txtNmguru0')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtNmguru0')) ? old('txtNmguru0') : $jof['namaguru_0_joffline'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNmguru0'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Mapel 1</h5>
        <input type="text" name="txtMapel1" placeholder="Mapel Pertama...." class="<?= ($validation->hasError('txtMapel1')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtMapel1')) ? old('txtMapel1') : $jof['mapel_1_joffline'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtMapel1'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Jam 1</h5>
        <input type="text" name="txtJam1" placeholder="Jam 1...." class="<?= ($validation->hasError('txtJam1')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtJam1')) ? old('txtJam1') : $jof['waktu_1_joffline'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtJam1'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Nama Guru Mapel 1</h5>
        <input type="text" name="txtNmguru1" placeholder="Nama Guru Mapel 1...." class="<?= ($validation->hasError('txtNmguru1')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtNmguru1')) ? old('txtNmguru1') : $jof['namaguru_1_joffline'] ?>">
        <hr>
        <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNmguru1'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Mapel 2</h5>
        <input type="text" name="txtMapel2" placeholder="Mapel Pertama...." class="<?= ($validation->hasError('txtMapel2')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtMapel2')) ? old('txtMapel2') : $jof['mapel_2_joffline'] ?>">
        <hr>
        <div id="validationServer23Feedback" class="invalid-feedback">
            <?= $validation->getError('txtMapel2'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Jam 2</h5>
        <input type="text" name="txtJam2" placeholder="Jam 2...." class="<?= ($validation->hasError('txtJam2')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtJam2')) ? old('txtJam2') : $jof['waktu_2_joffline'] ?>">
        <hr>
        <div id="validationServer23Feedback" class="invalid-feedback">
            <?= $validation->getError('txtJam2'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Nama Guru Mapel 2</h5>
        <input type="text" name="txtNmguru2" placeholder="Nama Guru Mapel 2...." class="<?= ($validation->hasError('txtNmguru2')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtNmguru2')) ? old('txtNmguru2') : $jof['namaguru_2_joffline'] ?>">
        <hr>
        <div id="validationServer23Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNmguru2'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Mapel 3</h5>
        <input type="text" name="txtMapel3" placeholder="Mapel Pertama...." class="<?= ($validation->hasError('txtMapel3')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtMapel3')) ? old('txtMapel3') : $jof['mapel_3_joffline'] ?>">
        <hr>
        <div id="validationServer33Feedback" class="invalid-feedback">
            <?= $validation->getError('txtMapel3'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Jam 3</h5>
        <input type="text" name="txtJam3" placeholder="Jam 3...." class="<?= ($validation->hasError('txtJam3')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtJam3')) ? old('txtJam3') : $jof['waktu_3_joffline'] ?>">
        <hr>
        <div id="validationServer33Feedback" class="invalid-feedback">
            <?= $validation->getError('txtJam3'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Nama Guru Mapel 3</h5>
        <input type="text" name="txtNmguru3" placeholder="Nama Guru Mapel 3...." class="<?= ($validation->hasError('txtNmguru3')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtNmguru3')) ? old('txtNmguru3') : $jof['namaguru_3_joffline'] ?>">
        <hr>
        <div id="validationServer33Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNmguru3'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Mapel 4</h5>
        <input type="text" name="txtMapel4" placeholder="Mapel Pertama...." class="<?= ($validation->hasError('txtMapel4')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtMapel4')) ? old('txtMapel4') : $jof['mapel_4_joffline'] ?>">
        <hr>
        <div id="validationServer43Feedback" class="invalid-feedback">
            <?= $validation->getError('txtMapel4'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Jam 4</h5>
        <input type="text" name="txtJam4" placeholder="Jam 4...." class="<?= ($validation->hasError('txtJam4')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtJam4')) ? old('txtJam4') : $jof['waktu_4_joffline'] ?>">
        <hr>
        <div id="validationServer43Feedback" class="invalid-feedback">
            <?= $validation->getError('txtJam4'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Nama Guru Mapel 4</h5>
        <input type="text" name="txtNmguru4" placeholder="Nama Guru Mapel 4...." class="<?= ($validation->hasError('txtNmguru4')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtNmguru4')) ? old('txtNmguru4') : $jof['namaguru_4_joffline'] ?>">
        <hr>
        <div id="validationServer43Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNmguru4'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Mapel 5</h5>
        <input type="text" name="txtMapel5" placeholder="Mapel Pertama...." class="<?= ($validation->hasError('txtMapel5')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtMapel5')) ? old('txtMapel5') : $jof['mapel_5_joffline'] ?>">
        <hr>
        <div id="validationServer53Feedback" class="invalid-feedback">
            <?= $validation->getError('txtMapel5'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Jam 5</h5>
        <input type="text" name="txtJam5" placeholder="Jam 5...." class="<?= ($validation->hasError('txtJam5')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtJam5')) ? old('txtJam5') : $jof['waktu_5_joffline'] ?>">
        <hr>
        <div id="validationServer53Feedback" class="invalid-feedback">
            <?= $validation->getError('txtJam5'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Nama Guru Mapel 5</h5>
        <input type="text" name="txtNmguru5" placeholder="Nama Guru Mapel 5...." class="<?= ($validation->hasError('txtNmguru5')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtNmguru5')) ? old('txtNmguru5') : $jof['namaguru_5_joffline'] ?>">
        <hr>
        <div id="validationServer53Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNmguru5'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Mapel 6</h5>
        <input type="text" name="txtMapel6" placeholder="Mapel Pertama...." class="<?= ($validation->hasError('txtMapel6')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtMapel6')) ? old('txtMapel6') : $jof['mapel_6_joffline'] ?>">
        <hr>
        <div id="validationServer63Feedback" class="invalid-feedback">
            <?= $validation->getError('txtMapel6'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Jam 6</h5>
        <input type="text" name="txtJam6" placeholder="Jam 6...." class="<?= ($validation->hasError('txtJam6')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtJam6')) ? old('txtJam6') : $jof['waktu_6_joffline'] ?>">
        <hr>
        <div id="validationServer63Feedback" class="invalid-feedback">
            <?= $validation->getError('txtJam6'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Nama Guru Mapel 6</h5>
        <input type="text" name="txtNmguru6" placeholder="Nama Guru Mapel 6...." class="<?= ($validation->hasError('txtNmguru6')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtNmguru6')) ? old('txtNmguru6') : $jof['namaguru_6_joffline'] ?>">
        <hr>
        <div id="validationServer63Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNmguru6'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Mapel 7</h5>
        <input type="text" name="txtMapel7" placeholder="Mapel Pertama...." class="<?= ($validation->hasError('txtMapel7')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtMapel7')) ? old('txtMapel7') : $jof['mapel_7_joffline'] ?>">
        <hr>
        <div id="validationServer73Feedback" class="invalid-feedback">
            <?= $validation->getError('txtMapel7'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Jam 7</h5>
        <input type="text" name="txtJam7" placeholder="Jam 7...." class="<?= ($validation->hasError('txtJam7')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtJam7')) ? old('txtJam7') : $jof['waktu_7_joffline'] ?>">
        <hr>
        <div id="validationServer73Feedback" class="invalid-feedback">
            <?= $validation->getError('txtJam7'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Nama Guru Mapel 7</h5>
        <input type="text" name="txtNmguru7" placeholder="Nama Guru Mapel 7...." class="<?= ($validation->hasError('txtNmguru7')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtNmguru7')) ? old('txtNmguru7') : $jof['namaguru_7_joffline'] ?>">
        <hr>
        <div id="validationServer73Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNmguru7'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Mapel 8</h5>
        <input type="text" name="txtMapel8" placeholder="Mapel Pertama...." class="<?= ($validation->hasError('txtMapel8')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtMapel8')) ? old('txtMapel8') : $jof['mapel_8_joffline'] ?>">
        <hr>
        <div id="validationServer83Feedback" class="invalid-feedback">
            <?= $validation->getError('txtMapel8'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Jam 8</h5>
        <input type="text" name="txtJam8" placeholder="Jam 8...." class="<?= ($validation->hasError('txtJam8')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtJam8')) ? old('txtJam8') : $jof['waktu_8_joffline'] ?>">
        <hr>
        <div id="validationServer83Feedback" class="invalid-feedback">
            <?= $validation->getError('txtJam8'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Nama Guru Mapel 8</h5>
        <input type="text" name="txtNmguru8" placeholder="Nama Guru Mapel 8...." class="<?= ($validation->hasError('txtNmguru8')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtNmguru8')) ? old('txtNmguru8') : $jof['namaguru_8_joffline'] ?>">
        <hr>
        <div id="validationServer83Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNmguru8'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Mapel 9</h5>
        <input type="text" name="txtMapel9" placeholder="Mapel Pertama...." class="<?= ($validation->hasError('txtMapel9')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtMapel9')) ? old('txtMapel9') : $jof['mapel_9_joffline'] ?>">
        <hr>
        <div id="validationServer93Feedback" class="invalid-feedback">
            <?= $validation->getError('txtMapel9'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Jam 9</h5>
        <input type="text" name="txtJam9" placeholder="Jam 9...." class="<?= ($validation->hasError('txtJam9')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtJam9')) ? old('txtJam9') : $jof['waktu_9_joffline'] ?>">
        <hr>
        <div id="validationServer93Feedback" class="invalid-feedback">
            <?= $validation->getError('txtJam9'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Nama Guru Mapel 9</h5>
        <input type="text" name="txtNmguru9" placeholder="Nama Guru Mapel 9...." class="<?= ($validation->hasError('txtNmguru9')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtNmguru9')) ? old('txtNmguru9') : $jof['namaguru_9_joffline'] ?>">
        <hr>
        <div id="validationServer93Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNmguru9'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Mapel 10</h5>
        <input type="text" name="txtMapel10" placeholder="Mapel Pertama...." class="<?= ($validation->hasError('txtMapel10')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtMapel10')) ? old('txtMapel10') : $jof['mapel_10_joffline'] ?>">
        <hr>
        <div id="validationServer103Feedback" class="invalid-feedback">
            <?= $validation->getError('txtMapel10'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Jam 10</h5>
        <input type="text" name="txtJam10" placeholder="Jam 10...." class="<?= ($validation->hasError('txtJam10')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtJam10')) ? old('txtJam10') : $jof['waktu_10_joffline'] ?>">
        <hr>
        <div id="validationServer103Feedback" class="invalid-feedback">
            <?= $validation->getError('txtJam10'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Nama Guru Mapel 10</h5>
        <input type="text" name="txtNmguru10" placeholder="Nama Guru Mapel 10...." class="<?= ($validation->hasError('txtNmguru10')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtNmguru10')) ? old('txtNmguru10') : $jof['namaguru_10_joffline'] ?>">
        <hr>
        <div id="validationServer103Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNmguru10'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Mapel 11</h5>
        <input type="text" name="txtMapel11" placeholder="Mapel Pertama...." class="<?= ($validation->hasError('txtMapel11')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtMapel11')) ? old('txtMapel11') : $jof['mapel_11_joffline'] ?>">
        <hr>
        <div id="validationServer113Feedback" class="invalid-feedback">
            <?= $validation->getError('txtMapel11'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Jam 11</h5>
        <input type="text" name="txtJam11" placeholder="Jam 11...." class="<?= ($validation->hasError('txtJam11')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtJam11')) ? old('txtJam11') : $jof['waktu_11_joffline'] ?>">
        <hr>
        <div id="validationServer113Feedback" class="invalid-feedback">
            <?= $validation->getError('txtJam11'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Nama Guru Mapel 11</h5>
        <input type="text" name="txtNmguru11" placeholder="Nama Guru Mapel 11...." class="<?= ($validation->hasError('txtNmguru11')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtNmguru11')) ? old('txtNmguru11') : $jof['namaguru_11_joffline'] ?>">
        <hr>
        <div id="validationServer113Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNmguru11'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Mapel 12</h5>
        <input type="text" name="txtMapel12" placeholder="Mapel Pertama...." class="<?= ($validation->hasError('txtMapel12')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtMapel12')) ? old('txtMapel12') : $jof['mapel_12_joffline'] ?>">
        <hr>
        <div id="validationServer123Feedback" class="invalid-feedback">
            <?= $validation->getError('txtMapel12'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Jam 12</h5>
        <input type="text" name="txtJam12" placeholder="Jam 12...." class="<?= ($validation->hasError('txtJam12')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtJam12')) ? old('txtJam12') : $jof['waktu_12_joffline'] ?>">
        <hr>
        <div id="validationServer123Feedback" class="invalid-feedback">
            <?= $validation->getError('txtJam12'); ?>
        </div>

        <br>
        <br>
        
        <h5 class="blue">Nama Guru Mapel 12</h5>
        <input type="text" name="txtNmguru12" placeholder="Nama Guru Mapel 12...." class="<?= ($validation->hasError('txtNmguru12')) ? 'is-invalid' : ''; ?>" value="<?= (old('txtNmguru12')) ? old('txtNmguru12') : $jof['namaguru_12_joffline'] ?>">
        <hr>
        <div id="validationServer123Feedback" class="invalid-feedback">
            <?= $validation->getError('txtNmguru12'); ?>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-left: 0;">Simpan</button>
        <p onclick="window.history.go(-1)" class="text-start btn blue"><i class="bi bi-chevron-double-left"></i>Kembali</p>

    </form>
</div>

<?= $this->endSection(); ?>