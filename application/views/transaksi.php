<div class="col-md-10">
  <section class="content">
    <div class="row mt-3">
      <div class="col-md-6">
        <form action="" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari Nama Kendaraan" name="keyword">
            <button class="btn btn-outline-secondary" type="submit">cari</button>
            <a href="<?php echo base_url() ?>close/transaksi" class="btn btn-dark">tampil data seluruh</a>
          </div>
        </form>
      </div>
    </div>
    <div class="container">
      <h4>Jumlah Pencarian : <?php echo $pencarian ?></h4>
      <?php echo $this->pagination->create_links(); ?>
      <?php echo $start; ?>
      <table class="table">
        <tr>
          <th>no</th>
          <th>Merk Mobil</th>
          <th>Penyewa</th>
          <th>waktu dipinjam</th>
          <th>tgl dipinjam</th>
          <th>waktu dikembalikan</th>
          <th>tgl dikembalikan</th>
          <th>lama dipinjam</th>
          <th>terlambat</th>
          <th>Harga</th>
          <th>denda</th>
          <th>total pembayaran</th>

          <th>aksi</th>
        </tr>
        <?php if ($transaksi !== []) : ?>
          <?php foreach ($transaksi as $trans) : ?>
            <?php $keterlambatan = round((strtotime($trans['pukul_dikembalikan']) - strtotime($trans['pukul_dipinjam'])) / (60 * 60)); ?>
            <?php if ($keterlambatan < 0) {
              $keterlambatan = 0;
            } ?>
            <?php $durasimeminjam = (strtotime($trans['tgl_kembali']) - strtotime($trans['tgl_dipinjam'])) / (60 * 60 * 24) ?>
            <tr>
              <td><?php echo ++$start ?></td>
              <td><?php echo $trans['merk'] ?></td>
              <td><a href=" https://wa.me/<?php echo $trans['no_telepon'] ?>" target="blank"><?php echo $trans['penyewa'] ?></td>
              <td><?php echo $trans['pukul_dipinjam'] ?></td>
              <td><?php echo $trans['tgl_dipinjam'] ?></td>
              <td><?php echo $trans['pukul_dikembalikan'] ?></td>
              <td><?php echo $trans['tgl_kembali'] ?></td>
              <td><?php echo $durasimeminjam ?> hari</td>
              <td><?php echo $keterlambatan ?> jam</td>
              <td>Rp. <?php echo number_format($trans['harga']) ?></td>
              <td>Rp. <?php echo number_format(50000 * $keterlambatan) ?></td>
              <td>Rp. <?php echo number_format(($durasimeminjam * $trans['harga']) + (50000 * $keterlambatan)) ?></td>

              <td>
                <a href="<?php echo base_url() ?>transaksi/ubahtransaksi/<?php echo $trans['id'] ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
                <a href="<?php echo base_url() ?>transaksi/hapustransaksi/<?php echo $trans['id'] ?>" class="btn btn-danger" id="delete" onclick="return confirm('apakah anda yakin?')"><i class="fas fa-trash"></i></a>
                <h6 id="coba">coba</h6>

              </td>
            <?php endforeach; ?>
          <?php else : ?>
            <td colspan="13" style="text-align:center; color:red">DATA TIDAK ADA</td>
          <?php endif; ?>
      </table>
    </div>

    <a href="<?php echo base_url() ?>transaksi/tambahtransaksi" type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i></a>

  </section>
</div>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
  $('#coba').on('click', function() {
    Swal.fire({
      title: 'Apa Kamu yakin akan menghapus Produk ini?',
      text: "Kamu Tidak akan bisa mengembalikan datanya!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })
  });
</script>