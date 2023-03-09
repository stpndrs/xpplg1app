<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" id="siswa">
    <div class="row">
        <h1 class="title yellow">Data Siswa</h1>

        <!-- <br>
            <form action="" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan keyword data...." name="keyword">
                    <button class="btn btn-outline-secondary m-0" type="submit" name="submit">Cari</button>
                </div>
            </form>
        <br> -->

        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success alert-dismissible fade show pesan-success" role="alert">
                <h6><?= session()->getFlashdata('pesan'); ?>!</h6>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        <br>

        <a class="btn" href="/admin/addSiswa">Tambah Siswa</a>

        <br>

        <?php if (count($siswa) <= 0) : ?>
            <a href="/admin/siswa/" class="yellow"><u>Tidak Ada Data, Kembali Ke Halaman Data Siswa....</u></a>
        <?php endif; ?>

        <br>
        <br>
        <br>
        <br>

        <table class="table" id="example">
            <thead>
                <tr>
                    <th scope="col" class="blue">No Absen</th>
                    <th scope="col" class="blue">Foto Siswa</th>
                    <th scope="col" class="blue">Nama Lengkap</th>
                    <th scope="col" class="blue">Nisn Siswa</th>
                    <th scope="col" class="blue">Instagram Siswa</th>
                    <th scope="col" class="blue">Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($siswa as $sis) : ?>
                    <tr>
                        <th scope="row" class="blue"><?= $sis['absen_siswa']; ?></th>
                        <td class="yellow"><img src="/img/<?= $sis['foto_siswa']; ?>" alt="<?= $sis['nama_siswa']; ?>" width="50"></td>
                        <td class="yellow"><?= $sis['nama_siswa']; ?></td>
                        <td class="yellow"><?= $sis['nisn_siswa']; ?></td>
                        <td class="yellow"><?= $sis['ins_siswa']; ?></td>
                        <td class="yellow">
                            <a href="/admin/editSiswa/<?= $sis['id_siswa']; ?>" class="blue">Edit</a>
                            <form action="/admin/deleteSiswa/<?= $sis['id_siswa']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE PROJECT">
                                <a href="/admin/deleteSiswa/<?= $sis['id_siswa']; ?>" class="blue" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>

<?= $this->endSection(); ?>