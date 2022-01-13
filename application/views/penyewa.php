<div class="col-md-10">
  <section class="content">
    <div class="row mt-3">
      <div class="col-md-6">
        <form action="" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari Nama Penyewa Mobil" name="keyword">
            <button class="btn btn-outline-secondary" type="submit">cari</button>
            <a href="<?php echo base_url() ?>close/penyewa" class="btn btn-dark">tampil data seluruh</a>
          </div>
        </form>
      </div>
    </div>
    <h4>Hasil Pencarian : <?php echo $pencarian ?></h4>
    <?php echo $this->pagination->create_links(); ?>
    <div class="container">
      <table class="table">
        <tr>
          <th>no</th>
          <th>Penyewa</th>
          <th>No Telp</th>

          <th>aksi</th>
        </tr>
        <?php if ($penyewa !== []) : ?>
          <?php foreach ($penyewa as $penyew) : ?>
            <tr>
              <td><?php echo ++$start ?></td>
              <td><?php echo $penyew['nama_penyewa'] ?></td>
              <td><a href="https://wa.me/<?php echo $penyew['no_telepon'] ?>" target="blank"><?php echo $penyew['no_telepon'] ?></a></td>
              <td>
                <a href="<?php echo base_url() ?>penyewa/ubahpenyewa/<?php echo $penyew['id_penyewa'] ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
                <a href="<?php echo base_url() ?>penyewa/hapuspenyewa/<?php echo $penyew['id_penyewa'] ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fas fa-trash"></i></a>

              </td>
            <?php endforeach; ?>
          <?php else : ?>
            <td colspan="4" style="color: red; text-align:center">DATA TIDAK ADA</td>
          <?php endif; ?>
      </table>
    </div>

    <!-- pemicu modal box -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Tambah
    </button>
  </section>
</div>


<!-- modal box nya -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Silahkan Input data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">

            <form action=" <?php echo base_url() . 'penyewa/tambahpenyewa' ?>" method="POST">

              <div class="form-group">
                <label for="">Nama penyewa</label>
                <input type="text" name="nama_penyewa" class="form-control">
              </div>

              <div class="form-group">
                <label for="">No Telepon</label>
                <input type="text" name="no_telepon" class="form-control" id="no_telepon">
              </div>



              <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Input</button>
              </div>


            </form>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>


<script>
  const no_telepon = document.querySelector('#no_telepon');
  no_telepon.value = 62;
</script>