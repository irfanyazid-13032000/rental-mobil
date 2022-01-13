<div class="col-md-5">
  <section class="content">
    <h3>Ubah Mobil
      <br>
      <?= $mobil['merk']; ?>
    </h3>

    <form action="" method="post">

      <input type="hidden" value="<?php echo $mobil['id_mobil'] ?>" name="id">

      <label class="form-label">Merk</label>
      <input type="text" id="merk" class="form-control" value="<?php echo $mobil['merk'] ?>" name="merk">


      <label class="form-label">Tahun</label>
      <input type="text" id="tahun" class="form-control" value="<?php echo $mobil['tahun'] ?>" name="tahun">

      <label class="form-label">Nopol</label>
      <input type="text" id="nopol" class="form-control" value="<?php echo $mobil['nopol'] ?>" name="nopol">

      <label class="form-label">Masa STNK</label>
      <input type="date" id="masa_stnk" class="form-control" value="<?php echo $mobil['masa_stnk'] ?>" name="masa_stnk">

      <label class="form-label">Lokasi</label>
      <input type="text" id="lokasi" class="form-control" value="<?php echo $mobil['lokasi'] ?>" name="lokasi">

      <label class="form-label">Penanggungjawab</label>
      <input type="text" id="penanggungjawab" class="form-control" value="<?php echo $mobil['penanggungjawab'] ?>" name="penanggungjawab">


      <label class="form-label">Harga</label>
      <input type="number" id="harga" class="form-control" value="<?php echo $mobil['harga'] ?>" name="harga">


      <label class="form-label">Kondisi</label>
      <select class="form-select" name="kondisi">
        <?php foreach ($kondisi as $kon) : ?>
          <?php if ($kon === $mobil['kondisi']) : ?>
            <option value="<?php echo $kon ?>" selected><?php echo $kon ?></option>
          <?php else : ?>
            <option value="<?php echo $kon ?>"><?php echo $kon ?></option>
          <?php endif; ?>
        <?php endforeach; ?>
      </select>


      <div class="modal-footer">

        <button type="submit" class="btn btn-primary">Ubah</button>
      </div>



    </form>
  </section>
</div>