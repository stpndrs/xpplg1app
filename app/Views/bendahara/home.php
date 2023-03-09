<?= $this->extend('bendahara/layout/template.php'); ?>

<?= $this->section('content'); ?>
<style>
    .card.total {
        min-height: unset !Important;
        background-color: #20c997;
        color: white;
        border-radius: 3px !important;
        text-align: left;
    }

    .card.keluar {
        background-color: #dc3545;
    }

    .card.saldo {
        background-color: #ffc107;
    }
</style>

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
}
// d($bulan);
// dd($bln);
?>
<div class="container mt-5">
    <!-- <h1 class="yellow title">Halo, <? //= in_groups('1') ? 'Admin' : 'Bendahara' ; 
                                        ?> 👋</h1> -->
    <h3 class="title yellow">Dashboard</h3>
    <form action="/bendahara" method="post">
        <div class="row">
            <div class="col-lg">
                <div class="mb-3">
                    <h5 class="form-label yellow">Masukkan Bulan</h5>
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
    if ($bulan != null && $tahun != null && $mg1['minggu1_pembayaran'] != '0' && $mg2['minggu2_pembayaran'] != '0' && $mg3['minggu3_pembayaran'] != '0' && $mg4['minggu4_pembayaran'] != '0') { ?>
        <h5 class="yellow">Data <b><?= $bln ?> <?= $tahun; ?></b></h5>
    <?php } else if ($mg1['minggu1_pembayaran'] == '0' && $mg2['minggu2_pembayaran'] == '0' && $mg3['minggu3_pembayaran'] == '0' && $mg4['minggu4_pembayaran'] == '0') { ?>
        <h5 class="yellow">Tidak Ada Data <b><?= $bln ?> Tahun <?= date('Y', strtotime($bulan)); ?></b></h5>
    <?php } else { ?>
        <h5 class="yellow">Semua Data Uang Kas</h5>
    <?php
    }
    ?>
    <br>
    <div class="row">
        <div class="col-lg">
            <div class="card total">
                <h5>TOTAL KAS MASUK : Rp <?= number_format($totalmasuk['jumlah_transaksi']); ?></h5>
            </div>
        </div>
        <div class="col-lg">
            <div class="card total keluar">
                <h5>TOTAL KAS KELUAR : Rp <?= number_format($totalkeluar['jumlah_transaksi']); ?></h5>
            </div>
        </div>
        <?php
        $saldo = $total['jumlah_pembayaran'];
        $transaksikeluar = $totalkeluar['jumlah_transaksi'];
        $transaksimasuk = $totalmasuk['jumlah_transaksi'];

        $totalsaldo = $saldo - $transaksikeluar + $transaksimasuk
        ?>
        <div class="card total saldo">
            <h5>TOTAL UANGKAS : Rp <?= number_format($totalsaldo); ?></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-lg mb-4">
            <div class="card">
                <h4 class="yellow title text-center">Data Pembayaran Uang Kas X PPLG 1 <?= $bln; ?></h4>
                <div>
                    <div class="row">
                        <div class="col-lg mb-4">
                            <div class="card">
                                <h5 class="blue">Total Pembayaran Minggu Pertama <?= $bln; ?></h5>
                                <h5 class="yellow"><?= $mg1['minggu1_pembayaran']; ?> Orang</h5>
                            </div>
                        </div>
                        <div class="col-lg mb-4">
                            <div class="card">
                                <h5 class="blue">Total Pembayaran Minggu Kedua <?= $bln; ?></h5>
                                <h5 class="yellow"><?= $mg2['minggu2_pembayaran']; ?> Orang</h5>
                            </div>
                        </div>
                        <div class="col-lg mb-4">
                            <div class="card">
                                <h5 class="blue">Total Pembayaran Minggu Ketiga <?= $bln; ?></h5>
                                <h5 class="yellow"><?= $mg3['minggu3_pembayaran']; ?> Orang</h5>
                            </div>
                        </div>
                        <div class="col-lg mb-4">
                            <div class="card">
                                <h5 class="blue">Total Pembayaran Minggu Keempat <?= $bln; ?></h5>
                                <h5 class="yellow"><?= $mg4['minggu4_pembayaran']; ?> Orang</h5>
                            </div>
                        </div>
                    </div>
                    <div id="chart"></div>
                </div>
            </div>
        </div>
        <!-- <div class="col-lg mb-4">
            <div class="card">
                <h3>Jumlah Pengeluaran Uang Kas X PPLG 1</h3>
                <div>
                  <canvas id="chartPengl"></canvas>
                </div>
            </div>
        </div> -->
    </div>
</div>


<?php
// dd($absen)
?>

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
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<!-- Resubmit FORM -->
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?= $this->endSection(); ?>