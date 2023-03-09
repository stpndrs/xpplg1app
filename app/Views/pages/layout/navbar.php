    <nav class="navbar navbar-expand-lg fixed-top" data-aos="fade-down" data-aos-duration="1500" id="navbar">
        <div class="container">

            <a class="navbar-brand" href="#">Intelligence Class</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
            </button>
            <div class="justify-content-end collapse navbar-collapse" id="navbarSupportedContent">

                <div class="justify-content-end">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="navBar">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="/jadwal">Jadwal</a>
                        </li> -->
                        <?php if($statusJgmeet || $statusJpiket || $statusPas || $statusJoffline == true) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link <?= url_is('/jadwal/JadwalPelajaran') || url_is('/jadwal/JadwalPiket') || url_is('/jadwal/JadwalUjian') ? 'active': '' ?> dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Jadwal
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php if($statusJgmeet || $statusJoffline == true) { ?>
                                <li><a class="dropdown-item" href="/jadwal/JadwalPelajaran">Jadwal Pelajaran</a></li>
                                <?php } if ($statusJpiket == true) { ?>
                                <li><a class="dropdown-item" href="/jadwal/JadwalPiket">Jadwal Piket</a></li>
                                <?php } if ($statusPas == true) { ?>
                                <li><a class="dropdown-item" href="/jadwal/JadwalUjian">Jadwal Ujian</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/berita">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/galeri">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/absen">Absen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/uangkas">Uang Kas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Contact</a>
                        </li>
                        &nbsp
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span id="jam" style="color: #0d6efd;"></span> <span class="yellow">:</span> <span id="menit" style="color: #0d6efd;"></span> <span class="yellow">:</span> <span id="detik" style="color: #0d6efd;"></span>
                            </a>
                        </li> -->
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