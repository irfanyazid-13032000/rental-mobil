<style>
  .nav-item {
    background-color: #9E7777;
  }

  #sidebar:hover {
    background-color: #6F4C5B;
  }

  .nav-item.telahditekan {
    background-color: #6F4C5B;
  }
</style>

<div class="row">

  <!-- ini sidebar -->
  <div class="col-md-2 mt-2 pr-10 pt-3" id="sdbr">
    <ul class="nav flex-column mb-5">

      <li class="nav-item <?php if ($this->uri->segment(1) === 'halo') {
                            echo "telahditekan";
                          } ?>" id='sidebar'>
        <a class="nav-link text-white" href="<?php echo base_url() ?>halo">Dashboard</a>
        <hr class="bg-secondary">
      </li>

      <li class="nav-item <?php if ($this->uri->segment(1) === 'statistik') {
                            echo "telahditekan";
                          } ?>" id='sidebar'>
        <a class=" nav-link text-white" aria-current="page" href=" <?php echo base_url() ?>statistik">Statistik</a>
        <hr class="bg-secondary">
      </li>
      <li class="nav-item <?php if ($this->uri->segment(1) === 'transaksi') {
                            echo "telahditekan";
                          } ?>" id="sidebar">
        <a class="nav-link text-white" href="<?php echo base_url() ?>transaksi">transaksi</a>
        <hr class="bg-secondary">
      </li>
      <li class="nav-item <?php if ($this->uri->segment(1) === 'penyewa') {
                            echo "telahditekan";
                          } ?>" id="sidebar">
        <a class="nav-link text-white" href="<?php echo base_url() ?>penyewa">penyewa</a>
        <hr class="bg-secondary">
      </li>
      <li class="nav-item <?php if ($this->uri->segment(1) === 'mobil') {
                            echo "telahditekan";
                          } ?>"" id=" sidebar">
        <a class="nav-link text-white" href="<?php echo base_url() ?>mobil">Mobil</a>
        <hr class="bg-secondary">
      </li>


      <li class="nav-item <?php if ($this->uri->segment(1) === 'about') {
                            echo "telahditekan";
                          } ?>" id="sidebar">
        <a class="nav-link text-white" href="<?php echo base_url() ?>about">About KKUSB</a>
        <hr class="bg-secondary">
      </li>


      <li class="nav-item" id="sidebar">
        <a class="nav-link text-white" href="<?php echo base_url() ?>close/logout">logout</a>
        <hr class="bg-secondary">
      </li>


    </ul>
  </div>
  <!-- ini tutup sidebar -->