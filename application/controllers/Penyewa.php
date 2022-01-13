<?php
class Penyewa extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('penyewa_model');
  }

  public function index()
  {

    $data['judul'] = 'Daftar penyewa';
    if ($this->input->post('keyword')) {
      $data['keyword'] =  $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }
    $config['total_rows'] = $this->penyewa_model->getJumlahDatapenyewa($data['keyword']);


    $data['pencarian'] = $config['total_rows'];

    $config['per_page'] = 10;
    $config['base_url'] = 'http://localhost/rentalmobil/penyewa/index/';

    // var_dump($config['total_rows']);
    // exit;


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

    // $data['start'] = $this->uri->segment(3);

    $data['penyewa'] = $this->penyewa_model->getTampilpenyewaPagination($config['per_page'], $data['start'], $data['keyword']);




    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('penyewa', $data);
    $this->load->view('templates/footer');
  }

  public function tambahpenyewa()
  {
    $this->penyewa_model->tambahpenyewa();
    redirect('penyewa');
  }

  public function ubahpenyewa($id)
  {
    $data['judul'] = 'ubah penyewa Kendaraan';
    $data['penyewa'] = $this->penyewa_model->getDatapenyewaById($id);
    $data['kondisi'] = ['ready', 'not ready'];


    $this->form_validation->set_rules('nama_penyewa', 'nama_penyewa', 'required');
    if ($this->form_validation->run() === false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('penyewa/ubahpenyewa', $data);
      $this->load->view('templates/footer');
    } else {
      $this->penyewa_model->ubahpenyewa($id);
      redirect('penyewa');
    }
  }

  public function hapuspenyewa($id)
  {
    $this->penyewa_model->hapuspenyewa($id);
    echo '<script>alert("Anda Telah Berhasil menghapus data")</script>';
    redirect('penyewa');
  }
}
