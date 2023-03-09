<?= $this->extend('pages/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" id="absen">
    <div class="row">
        <?php if ($status == true) { ?>
            <h1 class="title yellow">Absen</h1>

            <div class="alert alert-success alert-dismissible fade show pesan-success d-none" role="alert">
                <h6>Terima Kasih, Anda Sudah Absen!</h6>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="alert alert-danger alert-dismissible fade show pesan-gagal d-none" role="alert">
                <h6>Absen Gagal, Silahkan Hubungi Admin!</h6>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="col">
                <div class="card">
                    <form name="absen-kelas">
                        <?= csrf_field(); ?>
                        <select class="form-select" name="txtNama">
                            <option selected>-- Nama Siswa --</option>
                            <?php foreach ($absen as $a) : ?>
                                <option value="<?= $a['nama_siswa'] . '-' . $a['absen_siswa']; ?>"><?= $a['nama_siswa']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <p class="yellow">Silahkan pilih <strong>Nama Anda</strong> !</p>

                        <select class="form-select" name="Keterangan" id="mySelect" onchange="myFunction()">
                            <option selected>-- Keterangan --</option>
                            <option value="Hadir">Hadir</option>
                            <option value="Izin">Izin</option>
                            <option value="Sakit">Sakit</option>
                            <option value="Alpa">Alpa</option>
                        </select>
                        <p class="yellow">Silahkan pilih <strong>Keterangan</strong></p>
                        <input class="form-control" type="text" name="Keterangan Izin" id="alasan-ijin" style="display: none; margin-top: 3vh;" placeholder="Alasan Izin....">

                        <button style="margin: 0;" class="btn" type="submit">Absen Sekarang</button>
                        <p style="margin-bottom: 3vh" class="yellow">Jika sudah, tekah tombol di atas <strong>1 kali saja</strong>, dan tunggu konfirmasi !</p>
                    </form>
                </div>
            </div>
        <?php } else { ?>

            <p>Absen Sedang Ditutup</p>

        <?php } ?>
    </div>
</div>

<script>
    function myFunction() {
        var x = document.getElementById("mySelect").value;
        var y = document.getElementById("alasan-ijin");

        y.style.display = x === "Izin" ? "block" : "none";
    }
</script>

<script>
    let nama = document.querySelector('[name="txtNama"]');

    const scriptURL = 'https://script.google.com/macros/s/AKfycbxUy3zJXBW-nGacv5v4Bgh7hHHMsJFFAQhGZnTAZS6-ceGzxcUQH0nYOCGbQibAjTQtXg/exec'
    const form = document.forms['absen-kelas'];
    const pesanOk = document.querySelector('.pesan-success');
    const pesanNo = document.querySelector('.pesan-gagal');

    form.addEventListener('submit', e => {
        e.preventDefault()
        const tempData = nama.value.split('-');
        let formData = new FormData(form);
        formData.append('Nama Siswa', tempData[0]);
        formData.append('Nomor Absen', tempData[1]);
        formData.delete('txtNama');

        fetch(scriptURL, {
                method: 'POST',
                body: formData
            })
            .then(response => {
                // tampilkan alert
                pesanOk.classList.toggle('d-none');
                // reset form
                form.reset();
                console.log('Success!', response)
            })
            .catch(error => {
                //   tampilkan alert
                pesanNo.classList.toggle('d-none');
                console.error('Error!', error.message)
            })
    })
</script>

<?= $this->endSection(); ?>