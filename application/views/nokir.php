<!-- ini kontennya -->
<style>
  @media screen and (min-width: 676px) {
    .modal-dialog {
      max-width: 900px;
      /* New width for default modal */
    }
  }
</style>
<div class="col-md-10">
  <section class="content">

    <h3>Cari kendaraan Berdasarkan <?php echo $title; ?></h3>

    <form action="" method="POST">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="">tanggal mulai</label>
            <input type="date" class="form-control" value="<?php echo $tglmulai ?>" name="tglmulai" placeholder="tanggal mulai">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">tanggal selesai</label>
            <input type="date" class="form-control" value="<?php echo $tglselesai ?>" name="tglselesai" placeholder="tanggal selesai">
          </div>
        </div>
        <div class="col-md-2">
          <label for="">&nbsp;</label><br>
          <button type="submit" class="btn btn-info">Cari</button>
        </div>
        <div class="col-md-2">
          <label for="">&nbsp;</label><br>
          <a href="<?php echo base_url() ?>close/nokir" class="btn btn-dark">Tampil <?= date('F'); ?></a>
        </div>
      </div>
    </form>


    <h4>Hasil Pencarian : <?php echo $hasil_pencarian ?></h4>

    <?php if (0 !== $hasil_pencarian) : ?>
      <table class="table">
        <tr>
          <th>no</th>
          <th>nama pemilik</th>
          <th>Jenis Kendaraan</th>
          <th>tanggal habis STNK</th>
          <th>Jatuh Tempo KIR</th>
          <th>Aksi</th>
        </tr>
        <?php foreach ($kendaraan as $k) : ?>
          <tr>
            <td><?php echo ++$start; ?></td>
            <td><?= $k['nama_pemilik']; ?></td>
            <td><?= $k['jenis']; ?></td>
            <td><?php echo $k['tanggal_habis_stnk'] ?></td>
            <?php if (time() < strtotime($k['jatuh_tempo_kir'])) : ?>
              <?php $belumjatuh = strtotime($k['jatuh_tempo_kir']) - time() ?>
              <td style="color: green;"> <?php echo $k['jatuh_tempo_kir'] ?> <br> belum jatuh tempo <br><?php echo round(date($belumjatuh / (60 * 60 * 24))) ?> hari dari sekarang</td>
            <?php elseif (time() > strtotime($k['jatuh_tempo_kir'])) : ?>
              <?php $sudahjatuh = time() - strtotime($k['jatuh_tempo_kir']) ?>
              <?php if (round(date($sudahjatuh / (60 * 60 * 24))) > 1000) : ?>
                <td>Tidak Ada <br> Jatuh Tempo KIR</td>
              <?php else : ?>
                <td style="color: red;"> <?php echo $k['jatuh_tempo_kir'] ?> <br> sudah jatuh tempo <br>
                  <?= round(date($sudahjatuh / (60 * 60 * 24))) ?> hari yang lalu</td>
              <?php endif; ?>
            <?php endif; ?>
            <td>
              <a class="btn btn-warning" href="<?php echo base_url() ?>kendaraan/detailkendaraan/<?php echo $k['id'] ?>">Detail</a>
              <a class="btn btn-secondary" href="<?php echo base_url() ?>kendaraan/ubahkendaraan/<?php echo $k['id'] ?>">Ubah</a>
              <a class="btn btn-danger" href="<?php echo base_url() ?>kendaraan/hapus/<?php echo $k['id'] ?>" onclick="return confirm('apakah anda yakin akan menghapus data ini?')">Hapus</a>
            </td>
          </tr>
        <?php endforeach; ?>
        <?= $this->pagination->create_links(); ?>
      </table>
    <?php else : ?>
      <table class="table">
        <tr>
          <td colspan="6" style="color: red;">Data Tidak Ditemukan</td>
        </tr>
      </table>
    <?php endif ?>

    <a type="button" class="btn btn-file" href="<?php echo base_url() ?>kendaraan/tambah">input data</a>

    <a href="<?php echo base_url() ?>exportexcel/nokir" class="btn btn-dark">Export Excel</a>

  </section>
</div>
<!-- ini tutup konten -->
</div>