<?php
class Close extends CI_Controller
{
  public function index()
  {
    $this->session->sess_destroy('tglmulai');
    $this->session->sess_destroy('tglselesai');

    redirect(base_url('kendaraan'));
  }

  public function mobil()
  {
    $this->session->sess_destroy('keyword');
    redirect(base_url('mobil'));
  }

  public function penyewa()
  {
    $this->session->sess_destroy('keyword');
    redirect(base_url('penyewa'));
  }


  public function transaksi()
  {
    $this->session->sess_destroy('keyword');
    redirect(base_url('transaksi'));
  }

  public function logout()
  {
    $this->session->sess_destroy('nama');
    redirect(base_url('halo'));
  }
}
