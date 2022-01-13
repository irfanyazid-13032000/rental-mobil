<?php
class statistik_model extends CI_Model
{

  public function jumlahKendaraan()
  {
    return $this->db->get('mobil')->result();
  }

  public function kuantitiready()
  {
    return $this->db->get_where('mobil', ['kondisi' => 'ready'])->num_rows();
  }

  public function kuantitinotready()
  {
    return $this->db->get_where('mobil', ['kondisi' => 'not ready'])->num_rows();
  }

  public function kuantitimaintain()
  {
    return $this->db->get_where('mobil', ['kondisi' => 'maintainance'])->num_rows();
  }
}
