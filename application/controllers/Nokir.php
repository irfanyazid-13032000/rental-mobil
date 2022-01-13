<?php
class Nokir extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('kendaraan_model');
    $this->load->model('jenis_model');
  }

  // cari data berdasarkan nokir
  public function index()
  {
    // jika ada data search
    // masukkan kedalam session
    if (null !== $this->input->post('tglmulai') && null !== $this->input->post('tglselesai')) {
      $data['tglmulai'] = $this->input->post('tglmulai');
      $data['tglselesai'] = $this->input->post('tglselesai');
      $this->session->set_userdata('tglmulai', $data['tglmulai']);
      $this->session->set_userdata('tglselesai', $data['tglselesai']);
    } else {
      $data['tglmulai'] = $this->session->userdata('tglmulai');
      $data['tglselesai'] = $this->session->userdata('tglselesai');
    }

    // jika tidak ada data session
    // masukkan tgl hari ini hingga tanggal terakhir bulan ini
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
    $data['title'] = 'Tanggal jatuh tempo kir';
    $data['judul'] = 'data kendaraan';
    $data['jenis'] = $this->jenis_model->getDataJenis();



    $config['total_rows'] = $this->kendaraan_model->hitungNokir($data['tglmulai'], $data['tglselesai']);
    $data['hasil_pencarian'] = $config['total_rows'];
    $config['per_page'] = 10;


    $config['base_url'] = 'http://localhost/mencobamengerti/nokir/index/';
    // inisialisasi

    $this->pagination->initialize($config);


    if ($config['total_rows'] <= $config['per_page']) {
      $data['start'] = 0;
    } elseif ($config['total_rows'] <= $this->uri->segment(3)) {
      $data['start'] = $this->uri->segment(3) - $config['per_page'];
    } else {
      $data['start'] = $this->uri->segment(3);
    }

    $data['kendaraan'] = $this->kendaraan_model->getNOKIRByTanggal($config['per_page'], $data['start'], $data['tglmulai'], $data['tglselesai']);


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('nokir', $data);
    $this->load->view('templates/footer');
  }
}
