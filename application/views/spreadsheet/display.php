<!-- container -->
<div class="col-md-10">
  <section class="content">


    <h2>Berikut ini adalah Data yang telah di Import</h2>
    <div class="row padall border-bottom">
      <div class="col-lg-12">
        <div class="float-right">
          <a href="<?php print site_url(); ?>phpspreadsheet" class="btn btn-info btn-sm"><i class="fa fa-file-upload"></i> Back to Upload</a>
        </div>
      </div>
    </div>
    <div class="row padall">

      <table class="table table-striped">
        <thead>
          <tr class="table-primary">
            <th scope="col">No registrasi</th>
            <th scope="col">nama Pemilik</th>
            <th scope="col">alamat</th>
            <th scope="col">merk</th>
            <!-- <th scope="col">Contact No</th> -->
          </tr>
        </thead>
        <tbody>
          <?php foreach ($dataInfo as $key => $element) { ?>
            <tr>
              <td><?php print $element['no_registrasi']; ?></td>
              <td><?php print $element['nama_pemilik']; ?></td>
              <td><?php print $element['alamat']; ?></td>
              <td><?php print $element['merk']; ?></td>

            </tr>
          <?php } ?>
        </tbody>
      </table>

    </div>

  </section>
</div>