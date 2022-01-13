<?php
class mobil_model extends CI_Model
{


  public function getJumlahDatamobil($keyword)
  {
    if ($keyword) {
      $this->db->like('merk', $keyword);
      $this->db->or_like('nopol', $keyword);
      return $this->db->get('mobil')->num_rows();
    } else {
      return $this->db->get('mobil')->num_rows();
    }
  }

  public function getTampilmobilPagination($limit, $start, $keyword)
  {
    if ($keyword) {
      $this->db->order_by('merk', 'ASC');
      $this->db->like('merk', $keyword);
      $this->db->or_like('nopol', $keyword);
      return $this->db->get('mobil', $limit, $start)->result_array();
    } else {
      $this->db->order_by('merk', 'ASC');
      return $this->db->get('mobil', $limit, $start)->result_array();
    }
  }



  public function hapusmobil($id)
  {
    $this->db->where('id_mobil', $id);
    $this->db->delete('mobil');
  }

  public function tambahmobil()
  {
    $data = [
      'merk' => $this->input->post('merk'),
      'tahun' => $this->input->post('tahun'),
      'nopol' => $this->input->post('nopol'),
      'masa_stnk' => $this->input->post('masa_stnk'),
      'lokasi' => $this->input->post('lokasi'),
      'penanggungjawab' => $this->input->post('penanggungjawab'),
      'harga' => $this->input->post('harga'),
      'kondisi' => $this->input->post('kondisi')
    ];

    $this->db->insert('mobil', $data);
  }

  // mendapatkan data mobil

  public function getDatamobilById($id)
  {
    return $this->db->get_where('mobil', ['id_mobil' => $id])->row_array();
  }

  public function ubahmobil($id)
  {
    $data = [
      'merk' => $this->input->post('merk'),
      'tahun' => $this->input->post('tahun'),
      'nopol' => $this->input->post('nopol'),
      'masa_stnk' => $this->input->post('masa_stnk'),
      'lokasi' => $this->input->post('lokasi'),
      'penanggungjawab' => $this->input->post('penanggungjawab'),
      'harga' => $this->input->post('harga'),
      'kondisi' => $this->input->post('kondisi')
    ];
    $this->db->where('id_mobil', $id);

    $this->db->update('mobil', $data);
  }

  public function mobilDropdown()
  {
    return $this->db->get_where('mobil', ['kondisi' => 'ready'])->result_array();
  }

  public function mobilChange()
  {
    return $this->db->get_where('mobil', ['kondisi' => 'not ready'])->result_array();
  }
}
