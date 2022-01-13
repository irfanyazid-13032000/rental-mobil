<?php
class Mobil extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('mobil_model');
  }


  public function index()
  {

    $data['judul'] = 'Daftar mobil';
    if ($this->input->post('keyword')) {
      $data['keyword'] =  $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }
    $config['total_rows'] = $this->mobil_model->getJumlahDatamobil($data['keyword']);


    $data['pencarian'] = $config['total_rows'];

    $config['per_page'] = 10;
    $config['base_url'] = 'http://localhost/rentalmobil/mobil/index/';

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

    $data['mobil'] = $this->mobil_model->getTampilmobilPagination($config['per_page'], $data['start'], $data['keyword']);




    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('mobil', $data);
    $this->load->view('templates/footer');
  }

  public function hapusmobil($id)
  {
    $this->mobil_model->hapusmobil($id);
    echo '<script>alert("Anda Telah Berhasil menghapus data")</script>';
    redirect('mobil');
  }

  public function tambahmobil()
  {
    $this->mobil_model->tambahmobil();
    redirect('mobil');
  }

  public function ubahmobil($id)
  {
    $data['judul'] = 'ubah mobil Kendaraan';
    $data['mobil'] = $this->mobil_model->getDatamobilById($id);
    $data['kondisi'] = ['ready', 'not ready', 'maintainance'];


    $this->form_validation->set_rules('merk', 'merk', 'required');
    if ($this->form_validation->run() === false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('mobil/ubahmobil', $data);
      $this->load->view('templates/footer');
    } else {
      $this->mobil_model->ubahmobil($id);
      redirect('mobil');
    }
  }
}
