<div class="col-md-10">
  <section class="content">
    <div class="row mt-3">
      <div class="col-md-6">
        <form action="" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari Nama Mobil" name="keyword">
            <button class="btn btn-outline-secondary" type="submit">cari</button>
            <a href="<?php echo base_url() ?>close/mobil" class="btn btn-dark">tampil data seluruh</a>
          </div>
        </form>
      </div>
    </div>
    <h4>Hasil Pencarian : <?php echo $pencarian ?></h4>
    <?php echo $this->pagination->create_links(); ?>
    <?php echo $start; ?>
    <div class="container">
      <table class="table">
        <tr>
          <th>no</th>
          <th>Merk Mobil</th>
          <th>Tahun</th>
          <th>Nopol</th>
          <th>Masa STNK</th>
          <th>Lokasi</th>
          <th>PenanggungJawab</th>
          <th>Harga</th>
          <th>Kondisi</th>
          <th>aksi</th>
        </tr>
        <?php if ($mobil !== []) : ?>
          <?php foreach ($mobil as $m) : ?>
            <tr>
              <td><?php echo ++$start ?></td>
              <td><?php echo $m['merk'] ?></td>
              <td><?php echo $m['tahun'] ?></td>
              <td><?php echo $m['nopol'] ?></td>
              <td><?php echo date('d-M-Y', strtotime($m['masa_stnk'])) ?></td>
              <td><?php echo $m['lokasi'] ?></td>
              <td><?php echo $m['penanggungjawab'] ?></td>
              <td>Rp. <?php echo number_format($m['harga']) ?></td>
              <?php if ($m['kondisi'] === 'ready') : ?>
                <td><span class="badge badge-pill bg-success"><?php echo $m['kondisi'] ?></span></td>
              <?php elseif ($m['kondisi'] === 'not ready') : ?>
                <td><span class="badge badge-pill bg-danger"><?php echo $m['kondisi'] ?></span></td>
              <?php else : ?>
                <td><span class="badge badge-pill bg-info"><?php echo $m['kondisi'] ?></span></td>
              <?php endif ?>
              <td>
                <a href="<?php echo base_url() ?>mobil/ubahmobil/<?php echo $m['id_mobil'] ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
                <a href="<?php echo base_url() ?>mobil/hapusmobil/<?php echo $m['id_mobil'] ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fas fa-trash"></i></a>

              </td>
            <?php endforeach; ?>
          <?php else : ?>
            <td colspan="10" style="text-align: center; color:red;">DATA TIDAK ADA</td>
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

            <form action=" <?php echo base_url() . 'mobil/tambahmobil' ?>" method="POST">

              <div class="form-group">
                <label for="">Merk mobil</label>
                <input type="text" name="merk" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Tahun</label>
                <input type="text" name="tahun" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Nopol</label>
                <input type="text" name="nopol" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Masa STNK</label>
                <input type="date" name="masa_stnk" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Lokasi</label>
                <input type="text" name="lokasi" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Penanggungjawab</label>
                <input type="text" name="penanggungjawab" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Harga</label>
                <input type="text" name="harga" class="form-control">
              </div>


              <div class="form-group">
                <label for="">Kondisi</label>
                <select name="kondisi" class="form-select">
                  <option value="pilih">pilih</option>
                  <option value="ready">ready</option>
                  <option value="ready">not ready</option>
                  <option value="ready">maintain</option>
                </select>
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
<!-- 
<script>
  const keyword = document.querySelector('.keyword');
  const container = document.querySelector('.container');
  keyword.addEventListener('keyup', function() {
    fetch('../../vendor/cari.php?keyword=' + keyword.value)
      // fetch('mobil.php?keyword' + keyword.value)
      .then((response) => response.text())
      .then((response) => container.innerHTML = response);
  });
</script> -->