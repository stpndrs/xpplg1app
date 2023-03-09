<?php

// echo date('H:i');

if (time() < strtotime('05:00:00') or time() > strtotime('18:00:00')) {
    $theme = 'dark';
} else if (time() > strtotime('05:00:00') or time() < strtotime('10:00:00')) {
    $theme = 'light';
}

if (time() >= strtotime('06:00:00')) {
    $good = 'Good Morning Admin ☀️';
}
if (time() >= strtotime('12:00:00')) {
    $good = 'Good Afternoon Admin ☀️';
}
if (time() >= strtotime('18:00:00')) {
    $good = 'Good Night Admin 🌕';
}
if (time() <= strtotime('05:59:00')) {
    $good = 'Good Night Admin 🌕';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Stevan Andreas" />
    <meta name="keywords" content="Intelligence Class, XPPLG 1, SMK Negeri 7 Samarinda, Kelas XPPLG 1">
    <meta name="description" content="Intelligence Class">
    <meta name="<?= csrf_token() ?>" content="<?= csrf_hash() ?>">

    <title><?= $title; ?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" type="text/css">

    <!-- swiper js -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/app.css">

    <link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">

    <?= $this->renderSection('style'); ?>

    <link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>/<?= $layout['icon_layout']; ?>" />

    <!-- DataTable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TXMXTCHKL0"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-TXMXTCHKL0');
    </script>
</head>

<body id="<?= $theme; ?>">
    <div id="app">

        <?= $this->include('admin/layout/navbar'); ?>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <?= $this->renderSection('content'); ?>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="<?= base_url(); ?>/js/mazer.js"></script>

    <script src="<?= base_url(); ?>/js/script.js"></script>





    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <!-- Ck Editor -->
    <script src="https://cdn.ckeditor.com/4.16.2/basic/ckeditor.js"></script>

    <!-- Jquery -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->

    <script src="/js/script.js"></script>

    <script>
        // Switch Absen
        $(() => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token_name"]').attr('content')
                }
            });
            $('#absen').change(() => {
                var data;
                if ($('#absen').prop('checked')) {
                    data = 1;
                    status = 'Absen Dibuka';
                } else {
                    data = 0;
                    status = 'Absen Ditutup';
                }
                console.log($('#absen').prop('checked'), data, status);
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>/admin/configabsen',
                    data: {
                        'configabsen': data
                    },
                }).done((response) => {
                    console.log(response);
                }).fail((xhr, response, msg) => {
                    console.table(xhr.responseJSON.messages);
                });
            });
        });

        // Switch Jadwal PAS
        $(() => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token_name"]').attr('content')
                }
            });
            $('#jadwalPAS').change(() => {
                var data;
                if ($('#jadwalPAS').prop('checked')) {
                    data = 1;
                    status = 'Jadwal Pas Dibuka';
                } else {
                    data = 0;
                    status = 'Jadwal Pas Ditutup';
                }
                console.log($('#jadwalPAS').prop('checked'), data, status);
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>/admin/configjpas',
                    data: {
                        'configjpas': data
                    },
                }).done((response) => {
                    console.log(response);
                }).fail((xhr, response, msg) => {
                    console.table(xhr.responseJSON.messages);
                });
            });
        });

        // Switch Jadwal GMEET
        $(() => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token_name"]').attr('content')
                }
            });
            $('#jadwalGMEET').change(() => {
                var data;
                if ($('#jadwalGMEET').prop('checked')) {
                    data = 1;
                    status = 'Jadwal Gmeet Dibuka';
                } else {
                    data = 0;
                    status = 'Jadwal Gmeet Ditutup';
                }
                console.log($('#jadwalGMEET').prop('checked'), data, status);
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>/admin/configjgmeet',
                    data: {
                        'configjgmeet': data
                    },
                }).done((response) => {
                    console.log(response);
                }).fail((xhr, response, msg) => {
                    console.table(xhr.responseJSON.messages);
                });
            });
        });

        // Switch Jadwal Tugas
        $(() => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token_name"]').attr('content')
                }
            });
            $('#jadwalTUGAS').change(() => {
                var data;
                if ($('#jadwalTUGAS').prop('checked')) {
                    data = 1;
                    status = 'Jadwal Tugas Dibuka';
                } else {
                    data = 0;
                    status = 'Jadwal Tugas Ditutup';
                }
                console.log($('#jadwalTUGAS').prop('checked'), data, status);
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>/admin/configjtugas',
                    data: {
                        'configjtugas': data
                    },
                }).done((response) => {
                    console.log(response);
                }).fail((xhr, response, msg) => {
                    console.table(xhr.responseJSON.messages);
                });
            });
        });

        // Switch Jadwal Piket
        $(() => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token_name"]').attr('content')
                }
            });
            $('#jadwalPiket').change(() => {
                var data;
                if ($('#jadwalPiket').prop('checked')) {
                    data = 1;
                    status = 'Jadwal Piket Dibuka';
                } else {
                    data = 0;
                    status = 'Jadwal Piket Ditutup';
                }
                console.log($('#jadwalPiket').prop('checked'), data, status);
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>/admin/configjpiket',
                    data: {
                        'configjpiket': data
                    },
                }).done((response) => {
                    console.log(response);
                }).fail((xhr, response, msg) => {
                    console.table(xhr.responseJSON.messages);
                });
            });
        });

        // Switch Jadwal Offline
        $(() => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token_name"]').attr('content')
                }
            });
            $('#jadwalOffline').change(() => {
                var data;
                if ($('#jadwalOffline').prop('checked')) {
                    data = 1;
                    status = 'Jadwal Offline Dibuka';
                } else {
                    data = 0;
                    status = 'Jadwal Offline Ditutup';
                }
                console.log($('#jadwalOffline').prop('checked'), data, status);
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>/admin/configjoffline',
                    data: {
                        'configjoffline': data
                    },
                }).done((response) => {
                    console.log(response);
                }).fail((xhr, response, msg) => {
                    console.table(xhr.responseJSON.messages);
                });
            });
        });

        // Switch Jadwal UangKas
        $(() => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token_name"]').attr('content')
                }
            });
            $('#uangKas').change(() => {
                var data;
                if ($('#uangKas').prop('checked')) {
                    data = 1;
                    status = ' UangKas Dibuka';
                } else {
                    data = 0;
                    status = ' UangKas Ditutup';
                }
                console.log($('#uangKas').prop('checked'), data, status);
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>/admin/configuangkas',
                    data: {
                        'configuangkas': data
                    },
                }).done((response) => {
                    console.log(response);
                }).fail((xhr, response, msg) => {
                    console.table(xhr.responseJSON.messages);
                });
            });
        });
    </script>


    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

    <?= $this->renderSection('script'); ?>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

</body>