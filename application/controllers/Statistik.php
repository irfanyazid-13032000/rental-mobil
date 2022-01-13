<?php
class Statistik extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('statistik_model');
  }

  public function index()
  {
    $data['judul'] = 'Data Mobil';
    $data['kendaraan'] = $this->statistik_model->jumlahKendaraan();
    // $data['label'] = $this->statistik_model->jenisKendaraan();
    $data['label'] = ['ready', 'not ready', 'maintainance'];
    $data['ready'] = $this->statistik_model->kuantitiready();
    $data['notready'] = $this->statistik_model->kuantitinotready();
    $data['maintain'] = $this->statistik_model->kuantitimaintain();


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('chartkendaraan', $data);
    $this->load->view('templates/footer');
  }
}
