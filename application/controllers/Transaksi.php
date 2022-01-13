<?php
class Transaksi extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('transaksi_model');
    $this->load->model('mobil_model');
    $this->load->model('penyewa_model');
  }

  public function index()
  {
    $data['judul'] = 'Daftar transaksi';
    // $data['nama_mobil'] = $this->mobil_model->getDatamobil();
    if ($this->input->post('keyword')) {
      $data['keyword'] =  $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }
    $config['total_rows'] = $this->transaksi_model->getTampiltransaksiPagination($data['keyword']);
    // $config['total_rows'] = $this->transaksi_model->untukTotalRows($data['keyword']);


    $data['pencarian'] = $config['total_rows'];

    $config['per_page'] = 10;
    $config['base_url'] = 'http://localhost/rentalmobil/transaksi/index/';




    $this->pagination->initialize($config);

    if ($config['total_rows'] <= $config['per_page']) {
      $data['start'] = 0;
      // jika hasil query kurang dari uri segment maka data start nya uri segment - per page
    } elseif ($config['total_rows'] <= $this->uri->segment(3)) {
      $data['start'] = $this->uri->segment(3) - $config['per_page'];
      // jika tidak ada $config['total_rows']
    } else {
      $data['start'] = $this->uri->segment(3);
    }


    $data['transaksi'] = $this->transaksi_model->getDataSewa($config['per_page'], $data['start'], $data['keyword']);
    // $data['penyewa'] = $this->transaksi_model->getNomornyaPenyewa();


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('transaksi', $data);
    $this->load->view('templates/footer');
  }

  public function tambahtransaksi()
  {
    $data['judul'] = 'Tambah Transaksi';
    $data['mobil'] = $this->mobil_model->mobilDropdown();
    $data['penyewa'] = $this->penyewa_model->getDatapenyewa();


    $this->form_validation->set_rules('merk', 'mobil', 'required');
    if ($this->form_validation->run() === false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('transaksi/tambahtransaksi', $data);
      $this->load->view('templates/footer');
    } else {
      $this->transaksi_model->tambahTransaksi();
      $this->transaksi_model->notready();
      redirect('transaksi');
    }
  }

  public function ubahtransaksi($id)
  {
    $data['judul'] = 'Ubah Transaksi';
    $data['transaksi'] = $this->transaksi_model->getDataTransaksiByID($id);
    $data['penyewa'] = $this->penyewa_model->getDatapenyewa();
    $data['mobil'] = $this->mobil_model->mobilDropdown();
    $data['mobilterpilih'] = $this->mobil_model->mobilChange();



    $this->form_validation->set_rules('merk', 'mobil', 'required');
    if ($this->form_validation->run() === false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('transaksi/ubahtransaksi', $data);
      $this->load->view('templates/footer');
    } else {
      $this->transaksi_model->ubahTransaksi($id);
      $this->transaksi_model->notready();
      redirect('transaksi');
    }
  }

  public function hapustransaksi($id)
  {
    $this->transaksi_model->hapustransaksi($id);
    echo '<script>alert("Anda Telah Berhasil menghapus data")</script>';
    redirect('transaksi');
  }
}
