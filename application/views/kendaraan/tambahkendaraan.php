<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<!-- <style>
  .input-group>.select2-container--bootstrap {
    width: auto;
    flex: 1 1 auto;
  }

  .input-group>.select2-container--bootstrap .select2-selection--single {
    height: 100%;
    line-height: inherit;
    padding: 0.5rem 1rem;
  }
</style> -->

<div class="col-md-10">
  <section class="content">
    <form action="" method="post">
      <div class="row">
        <div class="col-md-5">

          <label class="form-label">No Registrasi</label>
          <input type="text" id="no_registrasi" class="form-control" name="no_registrasi">


          <label class="form-label">nama pemilik</label>
          <select name="nama_pemilik" id="nama_pemilik" class="form-control">

            <option value="kosong">select nama pemilik</option>

            <?php foreach ($pemilik as $pem) : ?>
              <option value="<?php echo $pem['nama_pemilik'] ?>"><?php echo $pem['nama_pemilik'] ?></option>
            <?php endforeach; ?>
          </select>

          <label class="form-label">alamat</label>
          <input type="text" id="alamat" class="form-control" name="alamat">

          <label class="form-label">merk</label>
          <input type="text" id="merk" class="form-control" name="merk">

          <label class="form-label">tipe</label>
          <input type="text" id="tipe" class="form-control" name="tipe">

          <label class="form-label">Jenis</label>
          <select name="jenis" id="jenis" class="form-control">

            <?php foreach ($jenis as $j) : ?>

              <option value="<?php echo $j['jenis_kendaraan'] ?>"><?php echo $j['jenis_kendaraan'] ?></option>
            <?php endforeach; ?>
          </select>

          <label class="form-label">tahun pembuatan</label>
          <input type="text" id="tahun_pembuatan" class="form-control" name="tahun_pembuatan">

          <label class="form-label">isi silinder</label>
          <input type="text" id="isi_silinder" class="form-control" name="isi_silinder">

          <label class="form-label">no rangka</label>
          <input type="text" id="no_rangka" class="form-control" name="no_rangka">

          <label class="form-label">no mesin</label>
          <input type="text" id="no_mesin" class="form-control" name="no_mesin">
        </div>

        <div class="col-md-5">

          <label class="form-label">warna</label>
          <input type="text" id="warna" class="form-control" name="warna">

          <label class="form-label">bahan bakar</label>
          <input type="text" id="bahan_bakar" class="form-control" name="bahan_bakar">

          <label class="form-label">warna TNKB</label>
          <input type="text" id="warna_tnkb" class="form-control" name="warna_tnkb">

          <label class="form-label">Tahun Registrasi</label>
          <input type="text" id="tahun_registrasi" class="form-control" name="tahun_registrasi">

          <label class="form-label">No BPKB</label>
          <input type="text" id="no_bpkb" class="form-control" name="no_bpkb">

          <label class="form-label">Tanggal Habis STNK</label>
          <input type="date" id="tanggal_habis_stnk" class="form-control" name="tanggal_habis_stnk">

          <label class="form-label">Jatuh Tempo KIR</label>
          <input type="date" id="jatuh_tempo_kir" class="form-control" name="jatuh_tempo_kir">

          <label class="form-label">Harga STNK</label>
          <input type="text" id="harga_stnk" class="form-control" name="harga_stnk">

          <label class="form-label">Harga KIR</label>
          <input type="text" id="harga_kir" class="form-control" name="harga_kir">

          <label class="form-label">No Uji KIR</label>
          <input type="text" id="no_uji_kir" class="form-control" name="no_uji_kir">

          <div class="modal-footer">

            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </div>

      </div>

    </form>
  </section>
</div>

<script>
  $(document).ready(function() {
    $("#nama_pemilik").select2();


  });
</script>