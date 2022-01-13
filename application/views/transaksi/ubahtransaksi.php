<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<div class="col-md-4">
  <section class="content">
    <form action="" method="POST">
      <input type="hidden" value="<?php echo $transaksi['id'] ?>">


      <div class="form-group">
        <label for="">Merk Mobil</label>
        <select name="merk" id="merk" class="form-control">
          <?php foreach ($mobilterpilih as $mobter) : ?>
            <?php if ($transaksi['merk_mobil'] === $mobter['nopol']) : ?>
              <option value="<?php echo $mobter['nopol'] ?>" selected><?php echo $mobter['merk'] . ' ' . $mobter['nopol'] ?></option>
            <?php endif ?>
          <?php endforeach; ?>
          <?php foreach ($mobil as $mob) : ?>
            <option value="<?php echo $mob['nopol'] ?>"><?php echo $mob['merk'] . ' ' . $mob['nopol'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label for="">Plat Nomor</label>
        <input type="text" class="form-control" value="<?php echo $transaksi['merk_mobil'] ?>" readonly>
      </div>


      <div class="form-group">
        <label for="">Penyewa</label>
        <select name="penyewa" id="penyewa" class="form-control">
          <?php foreach ($penyewa as $peny) : ?>
            <?php if ($transaksi['penyewa'] === $peny['nama_penyewa']) : ?>
              <option value="<?php echo $peny['nama_penyewa'] ?>" selected><?php echo $peny['nama_penyewa'] ?></option>
            <?php else : ?>
              <option value="<?php echo $peny['nama_penyewa'] ?>"><?php echo $peny['nama_penyewa'] ?></option>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label for="">waktu dipinjam</label>
        <input type="time" name="pukul_dipinjam" class="form-control" id="pukul_dipinjam" value="<?php echo $transaksi['pukul_dipinjam'] ?>">
      </div>

      <div class="form-group">
        <label for="">Tanggal Dipinjam</label>
        <input type="date" name="tgl_dipinjam" class="form-control" id="tgl_dipinjam" value="<?php echo $transaksi['tgl_dipinjam'] ?>">
      </div>

      <div class="form-group">
        <label for="">waktu dikembalikan</label>
        <input type="time" name="pukul_dikembalikan" class="form-control" id="pukul_dikembalikan" value="<?php echo $transaksi['pukul_dikembalikan'] ?>">
      </div>

      <div class="form-group">
        <label for="">Tanggal Dikembalikan</label>
        <input type="date" name="tgl_kembali" class="form-control" id="tgl_kembali" value="<?php echo $transaksi['tgl_kembali'] ?>">
      </div>



      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Change</button>
      </div>


    </form>

  </section>
</div>


<script>
  $(document).ready(function() {
    $("#merk").select2({
      placeholder: 'pilih dong',
      tags: true,
    });

    $("#penyewa").select2({
      placeholder: 'pilih dong',
      tags: true,
    });

  });
</script>