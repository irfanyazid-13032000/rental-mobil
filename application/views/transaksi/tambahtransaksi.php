<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="col-md-4">
  <section class="content">
    <form action=" <?php echo base_url() . 'transaksi/tambahtransaksi' ?>" method="POST">

      <div class="form-group">
        <label for="">Merk Mobil</label>
        <select name="merk" id="merk" class="form-control">
          <option value="pilih">pilih</option>
          <?php foreach ($mobil as $mbl) : ?>
            <option value="<?php echo $mbl['nopol'] ?>"><?php echo $mbl['merk'] . ' ' . $mbl['nopol'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label for="">Penyewa</label>
        <select name="penyewa" id="penyewa" class="form-control">
          <option value="pilih">pilih</option>
          <?php foreach ($penyewa as $peny) : ?>
            <option value="<?php echo $peny['nama_penyewa'] ?>"><?php echo $peny['nama_penyewa'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>



      <div class="form-group">
        <label for="">waktu dipinjam</label>
        <input type="time" name="pukul_dipinjam" class="form-control" id="pukul_dipinjam">
      </div>

      <div class="form-group">
        <label for="">Tanggal Dipinjam</label>
        <input type="date" name="tgl_dipinjam" class="form-control" id="tgl_dipinjam">
      </div>

      <div class="form-group">
        <label for="">waktu dikembalikan</label>
        <input type="time" name="pukul_dikembalikan" class="form-control" id="pukul_dikembalikan">
      </div>

      <div class="form-group">
        <label for="">Tanggal Dikembalikan</label>
        <input type="date" name="tgl_kembali" class="form-control" id="tgl_kembali">
      </div>





      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Input</button>
      </div>


    </form>

  </section>
</div>


<script>
  $(document).ready(function() {

    function lala($param) {
      $($param).select2({
        placeholder: 'pilih dong',
        tags: true,
      });

    }

    lala("#penyewa");
    lala("#merk");
  });

  const tgl_dipinjam = document.querySelector('#tgl_dipinjam');
  tgl_dipinjam.addEventListener('change', function() {
    const tgl_kembali = document.querySelector('#tgl_kembali');
    tgl_kembali.value = tgl_dipinjam.value;
  })
</script>