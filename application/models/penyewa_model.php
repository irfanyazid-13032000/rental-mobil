<?php
class penyewa_model extends CI_Model
{
  public function getDatapenyewa()
  {
    return $this->db->get('penyewa')->result_array();
  }

  public function getJumlahDatapenyewa($keyword)
  {
    if ($keyword) {
      $this->db->like('nama_penyewa', $keyword);
      return $this->db->get('penyewa')->num_rows();
    } else {
      return $this->db->get('penyewa')->num_rows();
    }
  }

  public function getTampilpenyewaPagination($limit, $start, $keyword)
  {
    if ($keyword) {
      $this->db->order_by('nama_penyewa', 'ASC');
      $this->db->like('nama_penyewa', $keyword);
      return $this->db->get('penyewa', $limit, $start)->result_array();
    } else {
      $this->db->order_by('nama_penyewa', 'ASC');
      return $this->db->get('penyewa', $limit, $start)->result_array();
    }
  }



  public function hapuspenyewa($id)
  {
    $this->db->where('id_penyewa', $id);
    $this->db->delete('penyewa');
  }

  public function tambahpenyewa()
  {
    $data = [
      'nama_penyewa' => $this->input->post('nama_penyewa'),
      'no_telepon' => $this->input->post('no_telepon')
    ];

    $this->db->insert('penyewa', $data);
  }


  public function getDatapenyewaById($id)
  {
    return $this->db->get_where('penyewa', ['id_penyewa' => $id])->row_array();
  }

  public function ubahpenyewa($id)
  {
    $data = [
      'nama_penyewa' => $this->input->post('nama_penyewa'),
      'no_telepon' => $this->input->post('no_telepon')
    ];
    $this->db->where('id_penyewa', $id);

    $this->db->update('penyewa', $data);
  }
}
