<div class="col-md-10">
  <section class="content">
    <h3>Ubah Kendaraan <?= $kendaraan['nama_pemilik']; ?></h3>

    <form action="" method="post">
      <div class="row">
        <div class="col-md-5">

          <input type="hidden" value="<?php echo $kendaraan['id'] ?>" name="id">

          <label class="form-label">No Registrasi</label>
          <input type="text" id="no_registrasi" class="form-control" value="<?php echo $kendaraan['no_registrasi'] ?>" name="no_registrasi">


          <label class="form-label">nama pemilik</label>
          <input type="text" id="nama_pemilik" class="form-control" value="<?php echo $kendaraan['nama_pemilik'] ?>" name="nama_pemilik">

          <label class="form-label">alamat</label>
          <input type="text" id="alamat" class="form-control" value="<?php echo $kendaraan['alamat'] ?>" name="alamat">

          <label class="form-label">merk</label>
          <input type="text" id="merk" class="form-control" value="<?php echo $kendaraan['merk'] ?>" name="merk">

          <label class="form-label">tipe</label>
          <input type="text" id="tipe" class="form-control" value="<?php echo $kendaraan['tipe'] ?>" name="tipe">

          <label class="form-label">Jenis</label>
          <select name="jenis" id="jenis" class="form-control">

            <?php foreach ($jenis as $j) : ?>
              <?php if ($j['jenis_kendaraan'] === $kendaraan['jenis']) : ?>
                <option value="<?php echo $j['jenis_kendaraan'] ?>" selected><?php echo $j['jenis_kendaraan'] ?></option>
              <?php else : ?>
                <option value="<?php echo $j['jenis_kendaraan'] ?>"><?php echo $j['jenis_kendaraan'] ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>

          <label class="form-label">tahun pembuatan</label>
          <input type="text" id="tahun_pembuatan" class="form-control" value="<?php echo $kendaraan['tahun_pembuatan'] ?>" name="tahun_pembuatan">

          <label class="form-label">isi silinder</label>
          <input type="text" id="isi_silinder" class="form-control" value="<?php echo $kendaraan['isi_silinder'] ?>" name="isi_silinder">

          <label class="form-label">no rangka</label>
          <input type="text" id="no_rangka" class="form-control" value="<?php echo $kendaraan['no_rangka'] ?>" name="no_rangka">

          <label class="form-label">no mesin</label>
          <input type="text" id="no_mesin" class="form-control" value="<?php echo $kendaraan['no_mesin'] ?>" name="no_mesin">
        </div>

        <div class="col-md-5">

          <label class="form-label">warna</label>
          <input type="text" id="warna" class="form-control" value="<?php echo $kendaraan['warna'] ?>" name="warna">

          <label class="form-label">bahan bakar</label>
          <input type="text" id="bahan_bakar" class="form-control" value="<?php echo $kendaraan['bahan_bakar'] ?>" name="bahan_bakar">

          <label class="form-label">warna TNKB</label>
          <input type="text" id="warna_tnkb" class="form-control" value="<?php echo $kendaraan['warna_tnkb'] ?>" name="warna_tnkb">

          <label class="form-label">Tahun Registrasi</label>
          <input type="text" id="tahun_registrasi" class="form-control" value="<?php echo $kendaraan['tahun_registrasi'] ?>" name="tahun_registrasi">

          <label class="form-label">No BPKB</label>
          <input type="text" id="no_bpkb" class="form-control" value="<?php echo $kendaraan['no_bpkb'] ?>" name="no_bpkb">

          <label class="form-label">Tanggal Habis STNK</label>
          <input type="date" id="tanggal_habis_stnk" class="form-control" value="<?php echo $kendaraan['tanggal_habis_stnk'] ?>" name="tanggal_habis_stnk">

          <label class="form-label">Jatuh Tempo KIR</label>
          <input type="date" id="jatuh_tempo_kir" class="form-control" value="<?php echo $kendaraan['jatuh_tempo_kir'] ?>" name="jatuh_tempo_kir">

          <label class="form-label">Harga STNK</label>
          <input type="text" id="harga_stnk" class="form-control" value="<?php echo $kendaraan['harga_stnk'] ?>" name="harga_stnk">

          <label class="form-label">Harga KIR</label>
          <input type="text" id="harga_kir" class="form-control" value="<?php echo $kendaraan['harga_kir'] ?>" name="harga_kir">

          <label class="form-label">No Uji KIR</label>
          <input type="text" id="no_uji_kir" class="form-control" value="<?php echo $kendaraan['no_uji_kir'] ?>" name="no_uji_kir">

          <div class="modal-footer">

            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
        </div>

      </div>

    </form>
  </section>
</div>