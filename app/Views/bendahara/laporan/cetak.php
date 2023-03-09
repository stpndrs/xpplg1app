<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            text-align: center;
        }

        table#style {
            width: 100%;
            text-align: center;
            /*     border-radius: 10rem; */
        }

        table#style th {
            background-color: gray;
        }

        table#style,
        table#style thead,
        table#style tbody,
        table#style tr,
        table#style th,
        table#style td {
            border: 0.5px solid black;
            text-align: center;
            padding: 5px;
            border-collapse: collapse;
        }

        table#style .bi.bi-check {
            color: green;
        }

        table#style .bi.bi-x {
            color: red;
        }

        .keluar {
            color: white !important;
            background-color: red !important;
        }

        .masuk {
            color: white !important;
            background-color: green !important;
        }

        .total {
            background-color: #ffc107 !important;
        }
    </style>
</head>

<?php
switch (date('F', strtotime($bulan))) {
    case 'January':
        $bln = 'Januari';
        break;
    case 'February':
        $bln = 'Februari';
        break;
    case 'March':
        $bln = 'Maret';
        break;
    case 'April':
        $bln = 'April';
        break;
    case 'May':
        $bln = 'Mei';
        break;
    case 'June':
        $bln = 'Juni';
        break;
    case 'July':
        $bln = 'Juli';
        break;
    case 'August':
        $bln = 'Agustus';
        break;
    case 'September':
        $bln = 'September';
        break;
    case 'October':
        $bln = 'Oktober';
        break;
    case 'November':
        $bln = 'November';
        break;
    case 'December':
        $bln = 'Desember';
        break;
}
?>

<body>
    <div class="container" id="laporan">
        <h1 class="title #ffc107 text-center">Laporan Uang Kas XI PPLG 1 Bulan <?= $bln; ?> Tahun <?= date('Y', strtotime($bulan)); ?></h1>

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
                                <td style="background-color: #ffc107;" rowspan="<?= $v['total_data']; ?>"><?= $no++; ?></td>
                                <td rowspan="<?= $v['total_data']; ?>"><?= $v['nama_siswa']; ?></td>
                            <?php endif; ?>

                            <td><?= date('l, d F Y', strtotime($v[$i]['tanggal_pembayaran'])); ?></td>
                            <td>Rp <?= number_format($v[$i]['jumlah_pembayaran']); ?></td>
                            <td <?= $v[$i]['minggu1_pembayaran'] != true ? 'style="background-color: red;"' : ''; ?>><?= $v[$i]['minggu1_pembayaran'] == true ? 'Ok' : '-'; ?></td>
                            <td <?= $v[$i]['minggu2_pembayaran'] != true ? 'style="background-color: red;"' : ''; ?>><?= $v[$i]['minggu2_pembayaran'] == true ? 'Ok' : '-'; ?></td>
                            <td <?= $v[$i]['minggu3_pembayaran'] != true ? 'style="background-color: red;"' : ''; ?>><?= $v[$i]['minggu3_pembayaran'] == true ? 'Ok' : '-'; ?></td>
                            <td <?= $v[$i]['minggu4_pembayaran'] != true ? 'style="background-color: red;"' : ''; ?>><?= $v[$i]['minggu4_pembayaran'] == true ? 'Ok' : '-'; ?></td>
                            <td><?= $v[$i]['keterangan_pembayaran'] == '' ? '-' : $v[$i]['keterangan_pembayaran']; ?></td>

                            <?php if ($i === 0) : ?>
                                <td style="background-color: #ffc107;" rowspan="<?= $v['total_data']; ?>">Rp <?= number_format($v['total_pembayaran']); ?></td>
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

                <?php
                $saldo = $totalBulanan;
                $transaksikeluar = $totalkeluar['jumlah_transaksi'];
                $transaksimasuk = $totalmasuk['jumlah_transaksi'];

                $totalduit = $saldo - $transaksikeluar + $transaksimasuk
                ?>
                <tr>
                    <th colspan="8">Total Bulanan</th>
                    <th colspan="2">Rp <?= number_format($totalBulanan); ?></th>
                </tr>
                <tr>
                    <th class="keluar" colspan="8">Transaksi Keluar</th>
                    <th class="keluar" colspan="2">Rp <?= number_format($transaksikeluar); ?></th>
                </tr>
                <tr>
                    <th class="masuk" colspan="8">Transaksi Masuk</th>
                    <th class="masuk" colspan="2">Rp <?= number_format($transaksimasuk); ?></th>
                </tr>
                <tr>
                    <th class="total" colspan="8">Total Saldo</th>
                    <th class="total" colspan="2">Rp <?= number_format($totalduit); ?></th>
            </tbody>
            </tbody>
        </table>
    </div>
</body>

</html>