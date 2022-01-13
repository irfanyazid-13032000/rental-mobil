<div class="col-md-4">
  <section class="content">
    <h3>Ubah Kendaraan <?= $penyewa['nama_penyewa']; ?></h3>

    <form action="" method="post">

      <input type="hidden" value="<?php echo $penyewa['id_penyewa'] ?>" name="id">

      <label class="form-label">Nama Penyewa</label>
      <input type="text" id="nama_penyewa" class="form-control" value="<?php echo $penyewa['nama_penyewa'] ?>" name="nama_penyewa">

      <label class="form-label">No Telepon</label>
      <input type="text" id="no_telepon" class="form-control" value="<?php echo $penyewa['no_telepon'] ?>" name="no_telepon">


      <div class="modal-footer">

        <button type="submit" class="btn btn-primary">Ubah</button>
      </div>



    </form>
  </section>
</div>