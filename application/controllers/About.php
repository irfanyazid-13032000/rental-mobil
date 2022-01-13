<?php
class About extends CI_Controller
{


  public function index()
  {
    $data['judul'] = 'About';


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('about');
    $this->load->view('templates/footer');
  }
}
