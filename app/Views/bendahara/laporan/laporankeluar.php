<?= $this->extend('bendahara/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" id="laporan">
    <h1 class="title yellow text-center">Laporan Pengeluaran XI PPLG 1</h1>

    <form action="/bendahara/laporan" method="post">
        <div class="row">
            <div class="col-lg">
                <div class="mb-3">
                    <label class="form-label yellow">Masukkan Bulan</label>
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

    <form action="/bendahara/cetak" method="post">
        <div class="row">
            <div class="col-lg">
                <div class="mb-3">
                    <label class="form-label yellow">Masukkan Bulan Untuk Dicetak</label>
                    <input type="month" name="bulanfilter" class="form-control">
                </div>
            </div>
            <div class="col-lg">
                <div class="mb-3">
                    <button type="submit" class="btn">Cetak</button>
                </div>
            </div>
        </div>
    </form>

<?= $this->endsection(); ?>

<?= $this->section('script'); ?>

<!-- Resubmit FORM -->
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?= $this->endSection(); ?>