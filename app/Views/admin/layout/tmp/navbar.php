    <nav class="navbar navbar-expand-lg fixed-top" data-aos="fade-down" data-aos-duration="1500">
        <div class="container">

            <a class="navbar-brand" href="#">Intelligence Class</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
            </button>
            <div class="justify-content-end collapse navbar-collapse" id="navbarSupportedContent">

                <div class="justify-content-end">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="navBar">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/jadwal">Jadwal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/berita">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/galeri">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/absen">Absen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/contact">Contact</a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </nav>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    $(function() {
    var path = window.location.href; // Mengambil data URL pada Address bar
    $('nav a').each(function() {
        // Jika URL pada menu ini sama persis dengan path...
        if (this.href === path) {
            // Tambahkan kelas "active" pada menu ini
            $(this).addClass('active');
        }
    });
});
</script>