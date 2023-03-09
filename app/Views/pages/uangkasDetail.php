<?= $this->extend('pages/layout/template'); ?>

<?= $this->section('content') ?>

<div class="container uangkas-page" id="home">
  <div class="row">
    <div class="col-md">
      <div class="card text-start">

        <?php $i = 0; ?>
        <?php //for ($x = 0; $x < $arr['total_data']; $x++) : ?>
            <?php if ($i === 0) : ?>
              <h5>Nama Siswa : <?= $arr['nama_siswa']; ?></h5>
              <h5>Absen Siswa : <?= $arr['absen_siswa']; ?></h5>
            <?php endif; ?>
        <?php //endfor; ?>
        <br>
        <div class="row">
          <div class="col-lg">
            <h5>Tanggal Pembayaran</h5>
          </div>
          <div class="col-lg">
            <h5>Jumlah Pembayaran</h5>
          </div>
          <div class="col-lg">
            <tr>
              <th><h5>Minggu Ke</h5></th>
            </tr>
            <tr>
              <td>I</td>
              <td>II</td>
              <td>III</td>
              <td>IV</td>
            </tr>
          </div>
          <div class="col-lg">
            <h5>Keterangan Pembayaran</h5>
          </div>
        </div>
        <?php $i = 0; ?>
        <?php for ($x = 0; $x < $arr['total_data']; $x++) : ?>
          <div class="row">
            <div class="col-lg">
              <p><?= $arr[$x]['tanggal_pembayaran']; ?></p>
            </div>
            <div class="col-lg">
              <p>Rp <?= number_format( $arr[$x]['jumlah_pembayaran']); ?></p>
            </div>
            <div class="col-lg">
              <p><?= $arr[$x]['keterangan_pembayaran'] == '' ? '-' : $arr[$x]['keterangan_pembayaran']; ?></p>
            </div>
          </div>

          <?php $i++; ?>
          <?php endfor; ?>
        <hr>
        <?php $i = 0; ?>
        <?php for ($x = 0; $x < $arr['total_data']; $x++) : ?>
            <?php if ($i === 0) : ?>
              <div class="row">
                <div class="col-lg">
                  <p>Total Seluruhnya</p>
                </div>
                <div class="col-lg">
                  <p>Rp <?= number_format($arr['total_pembayaran']); ?></p>
                </div>
                <div class="col-lg"></div>
              </div>
            <?php endif; ?>
            <?php $i++; ?>
        <?php endfor; ?>

      </div>
    </div>
  </div>
</div>

  </table>

<?= $this->endSection(); ?>