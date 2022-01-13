<?php
class Kendaraan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('kendaraan_model');
    $this->load->model('jenis_model');
    $this->load->model('pemilik_model');
  }

  // cari data berdasarkan stnk
  public function index()
  {


    if (null !== $this->input->post('tglmulai') && null !== $this->input->post('tglselesai')) {
      $data['tglmulai'] = $this->input->post('tglmulai');
      $data['tglselesai'] = $this->input->post('tglselesai');
      $this->session->set_userdata('tglmulai', $data['tglmulai']);
      $this->session->set_userdata('tglselesai', $data['tglselesai']);
    } else {
      $data['tglmulai'] = $this->session->userdata('tglmulai');
      $data['tglselesai'] = $this->session->userdata('tglselesai');
    }

    if (null === $this->session->userdata('tglmulai') && null === $this->session->userdata('tglselesai')) {
      $data['tglmulai'] = date('Y-m-d');
      $data['tglselesai'] = date('Y-m-t');
      $this->session->set_userdata('tglmulai', $data['tglmulai']);
      $this->session->set_userdata('tglselesai', $data['tglselesai']);
    } else {
      $data['tglmulai'] = $this->session->userdata('tglmulai');
      $data['tglselesai'] = $this->session->userdata('tglselesai');
    }

    $data['today'] = date('Y-m-d');
    $data['title'] = 'Tanggal Habis STNK';
    $data['judul'] = 'Data Habis STNK';
    $data['pemilik'] = $this->pemilik_model->getDataPemilik();
    $data['jenis'] = $this->jenis_model->getDataJenis();



    $config['total_rows'] = $this->kendaraan_model->hitungJumlahSTNK($data['tglmulai'], $data['tglselesai']);
    $data['hasil_pencarian'] = $config['total_rows'];
    $config['per_page'] = 10;

    $config['base_url'] = 'http://localhost/mencobamengerti/kendaraan/index/';


    // inisialisasi

    $this->pagination->initialize($config);

    // jika hasil query maks 10
    if ($config['total_rows'] <= $config['per_page']) {
      $data['start'] = 0;
      // jika hasil query kurang dari uri segment maka data start nya uri segment - per page
    } elseif ($config['total_rows'] <= $this->uri->segment(3)) {
      $data['start'] = $this->uri->segment(3) - $config['per_page'];
      // jika tidak ada $config['total_rows']
    } else {
      $data['start'] = $this->uri->segment(3);
    }
    $data['kendaraan'] = $this->kendaraan_model->getTampilKendaraanPagination($config['per_page'], $data['start'], $data['tglmulai'], $data['tglselesai']);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('kendaraan', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    $data['judul'] = 'Tambah Kendaraan';
    $data['pemilik'] = $this->pemilik_model->getDataPemilik();
    $data['jenis'] = $this->jenis_model->getDataJenis();
    $this->form_validation->set_rules('nama_pemilik', 'pemilik', 'required');
    if ($this->form_validation->run() === false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('kendaraan/tambahkendaraan', $data);
      $this->load->view('templates/footer');
    } else {
      $this->kendaraan_model->tambahkendaraan();
      if ($this->uri->segment(1) === 'kendaraan') {
        redirect('kendaraan');
      } else {
        redirect('nokir');
      }
    }
  }

  public function hapus($id)
  {
    $this->kendaraan_model->hapus_kendaraan($id);
    if ($this->uri->segment(1) === 'kendaraan') {
      redirect('kendaraan');
    } else {
      redirect('nokir');
    }
  }

  public function detailkendaraan($id)
  {
    $data['judul'] = 'Detail Kendaraan';
    $data['kendaraan'] = $this->kendaraan_model->getDataKendaraan($id);
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('kendaraan/detailkendaraan', $data);
    $this->load->view('templates/footer');
  }

  public function ubahkendaraan($id)
  {
    $data['judul'] = 'ubah data';
    $data['kendaraan'] = $this->kendaraan_model->getDataKendaraan($id);
    $data['jenis'] = $this->jenis_model->getDataJenis();

    $this->form_validation->set_rules('nama_pemilik', 'pemilik', 'required');

    if ($this->form_validation->run() === false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('kendaraan/ubahkendaraan', $data);
      $this->load->view('templates/footer');
    } else {
      $this->kendaraan_model->ubah_kendaraan();
      if ($this->uri->segment(1) === 'kendaraan') {
        redirect('kendaraan');
      } else {
        redirect('nokir');
      }
    }
  }
}
