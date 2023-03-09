<?= $this->extend('pages2/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container uangkas-page" id="home">

    <?php
    // dd($bulan);
    if ($bulan != null) {
        $bulan = date('F', strtotime($bulan));
        $tahun = date('Y', strtotime($bulan));
    } else {
        $bulan = 'null';
        $tahun = '';
    }
    switch ($bulan) {
        case 'January':
            $bln = 'Bulan Januari';
            break;
        case 'February':
            $bln = 'Bulan Februari';
            break;
        case 'March':
            $bln = 'Bulan Maret';
            break;
        case 'April':
            $bln = 'Bulan April';
            break;
        case 'May':
            $bln = 'Bulan Mei';
            break;
        case 'June':
            $bln = 'Bulan Juni';
            break;
        case 'July':
            $bln = 'Bulan Juli';
            break;
        case 'August':
            $bln = 'Bulan Agustus';
            break;
        case 'September':
            $bln = 'Bulan September';
            break;
        case 'October':
            $bln = 'Bulan Oktober';
            break;
        case 'November':
            $bln = 'Bulan November';
            break;
        case 'December':
            $bln = 'Bulan Desember';
            break;
        case 'null':
            $bln = '';
            break;
    } ?>
    <?php if ($statusUangKas == true) { ?>
        <h1>Data <span class="yellow">Uang Kas XI PPLG 1</span></h1>
        <img src="<?= base_url(); ?>/imgassets/5917.svg" alt="">
        <form action="/uangkas" method="post">
            <div class="row">
                <div class="col-lg">
                    <div class="mb-3">
                        <h3 class="form-label">Masukkan Bulan</h3>
                        <input type="month" name="bulanfilter" class="form-control">
                    </div>
                </div>
                <div class="col-lg">
                    <div class="mb-3">
                        <button type="submit" class="btn">Cari</button>
                    </div>
                </div>
            </div>
        </form>

        <?php
        // d($bulan);
        // dd($bln);

        if ($bulan != null && $tahun != null && $mg1['minggu1_pembayaran'] != '0' && $mg2['minggu2_pembayaran'] != '0' && $mg3['minggu3_pembayaran'] != '0' && $mg4['minggu4_pembayaran'] != '0') { ?>
            <h4>Data <b><?= $bln ?> <?= $tahun; ?></b></h4>
        <?php } else if ($mg1['minggu1_pembayaran'] == '0' && $mg2['minggu2_pembayaran'] == '0' && $mg3['minggu3_pembayaran'] == '0' && $mg4['minggu4_pembayaran'] == '0') { ?>
            <h4>Tidak Ada Data <b><?= $bln ?> Tahun <?= date('Y', strtotime($bulan)); ?></b></h4>
        <?php } else { ?>
            <h4>Semua Data Uang Kas</h4>
        <?php
        }
        ?>

        <table id="style">
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Nama</th>
                    <th colspan="2">Rincian</th>
                    <th colspan="4">Minggu</th>
                    <th rowspan="2">Keterangan</th>
                    <th rowspan="2">Total</th>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <th>Pembayaran</th>
                    <th>I</th>
                    <th>II</th>
                    <th>III</th>
                    <th>IV</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0;
                $no = 1; ?>
                <? //= dd($uangkasData);
                ?>
                <?php foreach ($uangkasData as $k => $v) : ?>
                    <?php $totalData = (int)$v['total_data']; ?>
                    <?php for ($x = 0; $x < $totalData; $x++) : ?>
                        <tr>
                            <?php if ($i === 0) : ?>
                                <td rowspan="<?= $v['total_data']; ?>"><?= $no++; ?></td>
                                <td rowspan="<?= $v['total_data']; ?>"><?= $v['nama_siswa']; ?></td>
                            <?php endif; ?>

                            <td><?= $v[$i]['tanggal_pembayaran']; ?></td>
                            <td>Rp <?= number_format($v[$i]['jumlah_pembayaran']); ?></td>
                            <td><?= $v[$i]['minggu1_pembayaran'] == true ? '<i class="bi bi-check"></i>' : '<i class="bi bi-x"></i>'; ?></td>
                            <td><?= $v[$i]['minggu2_pembayaran'] == true ? '<i class="bi bi-check"></i>' : '<i class="bi bi-x"></i>'; ?></td>
                            <td><?= $v[$i]['minggu3_pembayaran'] == true ? '<i class="bi bi-check"></i>' : '<i class="bi bi-x"></i>'; ?></td>
                            <td><?= $v[$i]['minggu4_pembayaran'] == true ? '<i class="bi bi-check"></i>' : '<i class="bi bi-x"></i>'; ?></td>
                            <td><?= $v[$i]['keterangan_pembayaran'] == '' ? '-' : $v[$i]['keterangan_pembayaran']; ?></td>

                            <?php if ($i === 0) : ?>
                                <td rowspan="<?= $v['total_data']; ?>">Rp <?= number_format($v['total_pembayaran']); ?></td>
                            <?php endif; ?>


                            <?php
                            $i++;
                            if ($i === $v['total_data']) {
                                $i = 0;
                            }
                            ?>
                        </tr>

                    <?php endfor; ?>
                <?php endforeach; ?>
                <tr>
                    <!-- <td colspan="8"></td> -->
                    <th colspan="9">Total Bulanan</th>
                    <th>Rp <?= number_format($totalBulanan); ?></th>
                </tr>
            </tbody>
        </table>

        <div class="row mt-4">
            <div class="col-lg mb-4">
                <div class="card">
                    <h3 class="yellow title text-center">Data Pembayaran Uang Kas X PPLG 1 Bulan <?= date('M'); ?></h3>
                    <div>
                        <div class="row">
                            <div class="col-lg mb-4">
                                <div class="card">
                                    <h5 class="blue">Total Pembayaran Minggu Pertama Bulan <?= date('M'); ?></h5>
                                    <h5 class="yellow"><?= $mg1['minggu1_pembayaran']; ?> Orang</h5>
                                </div>
                            </div>
                            <div class="col-lg mb-4">
                                <div class="card">
                                    <h5 class="blue">Total Pembayaran Minggu Kedua Bulan <?= date('M'); ?></h5>
                                    <h5 class="yellow"><?= $mg2['minggu2_pembayaran']; ?> Orang</h5>
                                </div>
                            </div>
                            <div class="col-lg mb-4">
                                <div class="card">
                                    <h5 class="blue">Total Pembayaran Minggu Ketiga Bulan <?= date('M'); ?></h5>
                                    <h5 class="yellow"><?= $mg3['minggu3_pembayaran']; ?> Orang</h5>
                                </div>
                            </div>
                            <div class="col-lg mb-4">
                                <div class="card">
                                    <h5 class="blue">Total Pembayaran Minggu Keempat Bulan <?= date('M'); ?></h5>
                                    <h5 class="yellow"><?= $mg4['minggu4_pembayaran']; ?> Orang</h5>
                                </div>
                            </div>
                        </div>
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
        </div>

    <?php } else { ?>
        <div class="closed text-center">
            <h4>Data Uangkas Sedang Ditutup</h4>

            <img src="<?= base_url(); ?>/imgassets/chill.png" alt="Chill">
        </div>
    <?php } ?>


</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var options = {
        chart: {
            type: 'bar'
        },
        series: [{
            name: 'sales',
            data: [
                <?= $mg1['minggu1_pembayaran']; ?>,
                <?= $mg2['minggu2_pembayaran']; ?>,
                <?= $mg3['minggu3_pembayaran']; ?>,
                <?= $mg4['minggu4_pembayaran']; ?>,
            ]
        }],
        xaxis: {
            categories: ["Minggu 1 <?= $bln; ?>", "Minggu 2 <?= $bln; ?>", "Minggu 3 <?= $bln; ?>", "Minggu 4 <?= $bln; ?>"]
        },
        plotOptions: {
            bar: {
                distributed: true
            }
        }
    }

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();
</script>

<!-- Resubmit FORM -->
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?= $this->endSection(); ?>