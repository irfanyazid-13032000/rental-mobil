<?php
class jenis_model extends CI_Model
{
  public function getDataJenis()
  {
    return $this->db->get('jenis_kendaraan')->result_array();
  }
}
