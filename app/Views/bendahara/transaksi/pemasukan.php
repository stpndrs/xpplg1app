<?= $this->extend('bendahara/layout/template'); ?>

<?= $this->section('content'); ?>
<style>
    td p {
        margin: 0;
    }

    td br {
        display: none;
    }

    .card.total {
        min-height: unset;
        background-color: #20c997;
        color: white;
        border-radius: 3px !important;
    }
</style>

<div class="container" id="transaksi">
    <div class="row mb-3">
        <div class="col-lg">
            <h3 class="title yellow text-start">Data Pemasukan XI PPLG 1</h3>
        </div>
        <div class="col-lg">
            <button class="btn" style="margin: 0 !important;">
                <a href="/bendahara/addTransPemasukan">Tambah Transaksi</a>
            </button>
        </div>
    </div>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show pesan-success" role="alert">
            <h6><?= session()->getFlashdata('pesan'); ?>!</h6>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg">
            <div class="card total">
                <h6 class="text-start">TOTAL KAS MASUK : Rp <?= number_format($totalpemasukan['jumlah_transaksi']); ?></h6>
            </div>
        </div>
    </div>

    <table class="table" id="example">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Oleh</th>
                <th scope="col">Waktu/Tanggal</th>
                <th scope="col">Jenis Barang</th>
                <!-- <th scope="col">Jenis Transaksi</th> -->
                <th scope="col">Jumlah Transaksi</th>
                <th scope="col">Bukti Nota</th>
                <th scope="col">Uraian</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($transaksi as $trs) :
            ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $trs['oleh_transaksi']; ?></td>
                    <td><?= date('l, d F Y', strtotime($trs['tanggal_transaksi'])) ?></td>
                    <td><?= $trs['jenisbrg_transaksi']; ?></td>
                    <!-- <td><?//= $trs['jenis_transaksi']; ?></td> -->
                    <td>Rp <?= number_format($trs['jumlah_transaksi']); ?></td>
                    <td>
                        <a href="<?= base_url(); ?>/buktinotatransaksi/<?= $trs['buktinota_transaksi']; ?>" target="_blank"><img src="<?= $trs['buktinota_transaksi'] == 'no-image.png' ? '/img/no-image.png' : '/buktinotatransaksi/' . $trs['buktinota_transaksi']; ?>" alt="<?= $trs['jenisbrg_transaksi']; ?>" alt="<?= $trs['jenisbrg_transaksi']; ?>"></a>
                    </td>
                    <td><?= nl2br($trs['uraian_transaksi']); ?></td>
                    <td>
                        <a class="btn" href="<?= base_url(); ?>/bendahara/editTransaksi/<?= $trs['id_transaksi']; ?>">
                            <button class="btn m-0">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </a>
                        <a onclick="return confirm('Yakin Ingin Menghapus Data Transaksi?')" class="btn" href="<?= base_url(); ?>/bendahara/deleteTransaksiPemasukan/<?= $trs['id_transaksi']; ?>">
                            <button class="btn m-0">
                                <i class="bi bi-trash"></i>
                            </button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endsection(); ?>