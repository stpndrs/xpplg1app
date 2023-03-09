<?= $this->extend('pages/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" id="contact">

    <div class="row">
        <h1 class="yellow">Contact Developer</h1>

        <div class="alert alert-success alert-dismissible fade show pesan-success d-none" role="alert">
            <h6>Terima Kasih Sudah Mengirim Pesan, Pesan Anda Akan Dibalas Melalui Email!</h6>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="alert alert-danger alert-dismissible fade show pesan-gagal d-none" role="alert">
            <h6>Pesan Gagal Terkirim, Silahkan Hubungi Admin!</h6>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div class="col-8">
            <form name="submit-contact-ic">
                <h3 class="blue">Email Anda</h3>
                <input type="text" placeholder="Email...." name="Email">
                <hr>

                <br>
                <br>
                
                <h3 class="blue">Nama Lengkap</h3>
                <input type="text" placeholder="Nama Lengkap...." name="Nama Lengkap">
                <hr>

                <br>
                <br>

                <h3 class="blue">Pesan Anda</h3>
                <textarea class="ckeditor ck-add-task" id="ckeditor" name="Pesan"></textarea>
                <hr>

                <button class="btn" type="submit">Send to Stevan</button>
            </form>
        </div>
        
        <div class="col-4">
            <p><a class="yellow" href="https://goo.gl/maps/ceFQvdRgC3WDzry36"><i class="bi bi-geo-alt-fill"></i> Samarinda, Kalimantan Timur, Indonesia</a></p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255338.26932911764!2d117.03544149105888!3d-0.509684476647699!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df5d57d33074935%3A0xef64e9b06c7ad3e7!2sKota%20Samarinda%2C%20Kalimantan%20Timur!5e0!3m2!1sid!2sid!4v1636116267903!5m2!1sid!2sid" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            <br>
            <p><a class="yellow" href="https://instagram.com/stpndrs20/"><i class="bi bi-instagram"></i> @stpndrs20</a></p>
            <br>
            <p class="yellow"><i class="bi bi-telegram yellow"></i> @StevanAndreas</p>
        </div>
    </div>

</div>

<script>
    const scriptURL = 'https://script.google.com/macros/s/AKfycbxvAAoRzel933tt0JrZL7vZguL-tR3xU17LqzexvyC9GWMdBhhU4WyL2lz-jvVLGmYIkA/exec'
    const form = document.forms['submit-contact-ic'];
    const pesan = document.querySelector('.pesan-success');

    form.addEventListener('submit', e => {
        e.preventDefault()
        fetch(scriptURL, { method: 'POST', body: new FormData(form)})
          .then(response => {
            // tampilkan alert
            pesan.classList.toggle('d-none');
            // reset form
            form.reset();
            console.log('Success!', response)
          })
          .catch(error => console.error('Error!', error.message))
      })
</script>


<?= $this->endSection(); ?>