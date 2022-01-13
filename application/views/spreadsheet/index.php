<!-- container -->
<div class="col-md-10">
  <section class="content">

    <?php if (form_error('fileURL')) { ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php print form_error('fileURL'); ?>
      </div>
    <?php } ?>


    <form action="<?php print site_url(); ?>phpspreadsheet/upload" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
      <div class="row padall">
        <div class>

          <input type="file" class="custom-file-input" id="validatedCustomFile" name="fileURL">
          <label class="custom-file-label" for="validatedCustomFile">Pilih file</label>
        </div>
        <div class="col-lg-6 order-lg-2">
          <button type="submit" name="import" class="float-right btn btn-primary">Import</button>
        </div>
      </div>
    </form>

    <a href="<?php echo base_url('phpspreadsheet/download'); ?>" class="btn btn-success">download Templates</a>
  </section>
</div>