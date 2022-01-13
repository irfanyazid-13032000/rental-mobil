<?php
class transaksi_model extends CI_Model
{

  public function getDataSewa($limit, $start, $keyword)
  {
    if (!isset($start)) {
      $start = 0;
    }
    if ($keyword) {
      // $this->db->get('mobil', $limit, $start);
      return $this->db->query("SELECT *
      FROM mobil
      INNER JOIN transaksi
      ON mobil.nopol = transaksi.merk_mobil 
      INNER JOIN penyewa
      ON transaksi.penyewa = penyewa.nama_penyewa
      WHERE merk LIKE '%$keyword%' LIMIT $limit OFFSET $start")->result_array();
    } else {
      // $this->db->get('mobil', $limit, $start);
      return $this->db->query("SELECT *
      FROM mobil
      INNER JOIN transaksi
      ON mobil.nopol = transaksi.merk_mobil
      INNER JOIN penyewa 
      ON transaksi.penyewa = penyewa.nama_penyewa LIMIT $limit OFFSET $start")->result_array();
    }
  }


  public function notready()
  {
    $this->db->where('nopol', $this->input->post('merk'));
    $this->db->update('mobil', ['kondisi' => 'not ready']);
  }

  public function getDataTransaksi($limit, $start, $keyword)
  {
    if ($keyword) {
      $this->db->order_by('merk_mobil', 'ASC');
      $this->db->like('merk_mobil', $keyword);
      return $this->db->get('transaksi', $limit, $start)->result_array();
    } else {
      $this->db->order_by('merk_mobil', 'ASC');
      return $this->db->get('transaksi', $limit, $start)->result_array();
    }
  }

  public function getTampiltransaksiPagination($keyword)
  {
    if ($keyword) {
      $this->db->like('merk_mobil', $keyword);
      return $this->db->get('transaksi')->num_rows();
    } else {
      return $this->db->get('transaksi')->num_rows();
    }
  }

  public function tambahtransaksi()
  {
    $data = [
      'merk_mobil' => $this->input->post('merk'),
      'penyewa' => $this->input->post('penyewa'),
      'pukul_dipinjam' => $this->input->post('pukul_dipinjam'),
      'tgl_dipinjam' => $this->input->post('tgl_dipinjam'),
      'pukul_dikembalikan' => $this->input->post('pukul_dikembalikan'),
      'tgl_kembali' => $this->input->post('tgl_kembali')
    ];

    $this->db->insert('transaksi', $data);
  }

  public function getDataTransaksiByID($id)
  {
    return $this->db->get_where('transaksi', ['id' => $id])->row_array();
  }

  public function ubahTransaksi($id)
  {
    $data = [
      'merk_mobil' => $this->input->post('merk'),
      'penyewa' => $this->input->post('penyewa'),
      'pukul_dipinjam' => $this->input->post('pukul_dipinjam'),
      'tgl_dipinjam' => $this->input->post('tgl_dipinjam'),
      'pukul_dikembalikan' => $this->input->post('pukul_dikembalikan'),
      'tgl_kembali' => $this->input->post('tgl_kembali')
    ];
    $this->db->where('id', $id);
    $this->db->update('transaksi', $data);
  }

  public function hapustransaksi($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('transaksi');
  }
}
