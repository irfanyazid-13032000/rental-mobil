<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<!-- ini kontennya -->
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
          <a href="<?php echo base_url() ?>close" class="btn btn-dark">Tampilkan <?= date('F'); ?></a>
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
            <?php if (time() < strtotime($k['tanggal_habis_stnk'])) : ?>
              <?php $belumjatuh = strtotime($k['tanggal_habis_stnk']) - time() ?>
              <td style="color: green;"> <?php echo $k['tanggal_habis_stnk'] ?> <br> belum jatuh tempo <br><?php echo round(date($belumjatuh / (60 * 60 * 24))) ?> hari dari sekarang</td>
            <?php elseif (time() > strtotime($k['tanggal_habis_stnk'])) : ?>
              <?php $sudahjatuh = time() - strtotime($k['tanggal_habis_stnk']) ?>
              <td style="color: red;"> <?php echo $k['tanggal_habis_stnk'] ?> <br> sudah jatuh tempo <br> <?= round(date($sudahjatuh / (60 * 60 * 24))) ?> hari yang lalu</td>
            <?php else :  ?>
              <td style="color: blue;"> baru hari ini jatuh tempo <br> <?= $k['tanggal_habis_stnk'] ?></td>
            <?php endif; ?>

            <?php if ($k['jatuh_tempo_kir'] !== '') : ?>
              <td><?php echo $k['jatuh_tempo_kir'] ?></td>
            <?php else : ?>
              <td>Tidak Memiliki <br> Jatuh Tempo KIR</td>
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
    <?php endif; ?>

    <!-- button untuk input -->
    <a type="button" class="btn btn-file" href="<?php echo base_url() ?>kendaraan/tambah">input data</a>

    <!-- Export Excel -->
    <a href="<?php echo base_url() ?>exportexcel/index" class="btn btn-success">Export Excel</a>



  </section>
</div>
<!-- ini tutup konten -->
</div>




<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Silahkan Input data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label for="">No Registrasi</label>
                  <input type="text" name="no_registrasi" class="form-control">
                </div>

                <div class="my-select">
                  <div class="form-group">
                    <label for="">Nama Pemilik</label>
                    <select name="nama_pemilik" id="nama_pemilik" class="form-control nama_pemilik" style="width: 200px;">
                      <option value="null">pilih nama pemilik</option>
                    </select>
                  </div>
                </div>


                <div class="form-group">
                  <label for="">Alamat</label>
                  <input type="text" name="alamat" class="form-control">
                </div>

                <div class="form-group">
                  <label for="">Merk</label>
                  <input type="text" name="merk" class="form-control">
                </div>

                <div class="form-group">
                  <label for="">tipe</label>
                  <input type="text" name="tipe" class="form-control">
                </div>

                <div class="form-group">
                  <label for="">jenis</label>
                  <select name="jenis" id="jenis" class="form-control">
                   
                  <label for="">Tahun Pembuatan</label>
                  <input type="text" name="tahun_pembuatan" class="form-control">
                </div>

                <div class="form-group">
                  <label for="">Silinder</label>
                  <input type="text" name="isi_silinder" class="form-control">
                </div>

                <div class="form-group">
                  <label for="">No Rangka</label>
                  <input type="text" name="no_rangka" class="form-control">
                </div>

                <div class="form-group">
                  <label for="">No Mesin</label>
                  <input type="text" name="no_mesin" class="form-control">
                </div>
            </div>
            <div class="col-md-6">

              <div class="form-group">
                <label for="">Warna</label>
                <input type="text" name="warna" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Bahan Bakar</label>
                <input type="text" name="bahan_bakar" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Warna TNKB</label>
                <input type="text" name="warna_tnkb" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Tahun Registrasi</label>
                <input type="text" name="tahun_registrasi" class="form-control">
              </div>

              <div class="form-group">
                <label for="">NO BPKB</label>
                <input type="text" name="no_bpkb" class="form-control">
              </div>

              <div class="form-group">
                <label for="">tanggal habis STNK</label>
                <input type="date" name="tanggal_habis_stnk" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Jatuh Tempo KIR</label>
                <input type="date" name="jatuh_tempo_kir" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Harga STNK</label>
                <input type="text" name="harga_stnk" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Harga KIR</label>
                <input type="text" name="harga_kir" class="form-control">
              </div>

              <div class="form-group">
                <label for="">No Uji KIR</label>
                <input type="text" name="no_uji_kir" class="form-control">
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Input</button>
              </div>
            </div>

            </form>
          </div>
        </div>

      </div>
    </div>
  </div> -->

<script>
  $(document).ready(function() {
    $(".nama_pemilik").select2({
      placeholder: 'pilih dong',
      tags: true,
    });


  });
</script>