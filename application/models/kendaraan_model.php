<?php
class kendaraan_model extends CI_Model
{
  public function getData()
  {
    // mengambil semua data
    return $this->db->get('kendaraan')->result_array();
  }

  public function getDataExportExcelKendaraan($tglmulai, $tglselesai)
  {
    $this->db->select('*');
    $this->db->where('tanggal_habis_stnk >=', $tglmulai);
    $this->db->where('tanggal_habis_stnk <=', $tglselesai);
    return $this->db->get('kendaraan')->result_array();
  }

  public function getDataExportExcelNokir($tglmulai, $tglselesai)
  {
    $this->db->select('*');
    $this->db->where('jatuh_tempo_kir >=', $tglmulai);
    $this->db->where('jatuh_tempo_kir <=', $tglselesai);
    return $this->db->get('kendaraan')->result_array();
  }

  public function hitungAllData()
  {
    // mengambil semua data
    return $this->db->get('kendaraan')->num_rows();
  }

  public function hitungJumlahSTNK($tglmulai, $tglselesai)
  {
    // menghitung banyaknya data
    if ($tglmulai && $tglselesai) {
      $this->db->select('*');
      $this->db->where('tanggal_habis_stnk >=', $tglmulai);
      $this->db->where('tanggal_habis_stnk <=', $tglselesai);
      return $this->db->get('kendaraan')->num_rows();
    } else {
      return $this->db->get('kendaraan')->num_rows();
    }
  }

  public function getTampilKendaraanPagination($limit, $start, $tglmulai, $tglselesai)
  {
    // tampil data berdasarkan limit
    if ($tglmulai && $tglselesai) {
      $this->db->select('*');
      $this->db->where('tanggal_habis_stnk >=', $tglmulai);
      $this->db->where('tanggal_habis_stnk <=', $tglselesai);
      $this->db->order_by('tanggal_habis_stnk', 'ASC');
      return $this->db->get('kendaraan', $limit, $start)->result_array();
    } else {
      $this->db->order_by('tanggal_habis_stnk', 'ASC');
      return $this->db->get('kendaraan', $limit, $start)->result_array();
    }
  }



  public function getNOKIRByTanggal($limit, $start, $tglmulai, $tglselesai)
  {
    if ($tglmulai && $tglselesai) {
      $this->db->select('*');
      $this->db->where('jatuh_tempo_kir >=', $tglmulai);
      $this->db->where('jatuh_tempo_kir <=', $tglselesai);
      $this->db->order_by('jatuh_tempo_kir', 'ASC');
      return $this->db->get('kendaraan', $limit, $start)->result_array();
    } else {
      $this->db->order_by('jatuh_tempo_kir', 'ASC');
      return $this->db->get('kendaraan', $limit, $start)->result_array();
    }
  }

  public function hitungNokir($tglmulai, $tglselesai)
  {
    if ($tglmulai && $tglselesai) {
      $this->db->select('*');
      $this->db->where('jatuh_tempo_kir >=', $tglmulai);
      $this->db->where('jatuh_tempo_kir <=', $tglselesai);
      return $this->db->get('kendaraan')->num_rows();
    } else {
      return $this->db->get('kendaraan')->num_rows();
    }
  }

  public function tambahkendaraan()
  {

    $data = [
      'no_registrasi' => $this->input->post('no_registrasi'),
      'nama_pemilik' => $this->input->post('nama_pemilik'),
      'alamat' => $this->input->post('alamat'),
      'merk' => $this->input->post('merk'),
      'tipe' => $this->input->post('tipe'),
      'jenis' => $this->input->post('jenis'),
      'tahun_pembuatan' => $this->input->post('tahun_pembuatan'),
      'isi_silinder' => $this->input->post('isi_silinder'),
      'no_rangka' => $this->input->post('no_rangka'),
      'warna' => $this->input->post('warna'),
      'bahan_bakar' => $this->input->post('bahan_bakar'),
      'warna_tnkb' => $this->input->post('warna_tnkb'),
      'tahun_registrasi' => $this->input->post('tahun_registrasi'),
      'no_bpkb' => $this->input->post('no_bpkb'),
      'tanggal_habis_stnk' => $this->input->post('tanggal_habis_stnk'),
      'jatuh_tempo_kir' => $this->input->post('jatuh_tempo_kir'),
      'harga_stnk' => $this->input->post('harga_stnk'),
      'harga_kir' => $this->input->post('harga_kir'),
      'no_uji_kir' => $this->input->post('no_uji_kir')
    ];
    $this->db->insert('kendaraan', $data);
  }

  public function hapus_kendaraan($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('kendaraan');
  }

  public function getDataKendaraan($id)
  {
    return $this->db->get_where('kendaraan', ['id' => $id])->row_array();
  }

  public function ubah_kendaraan()
  {
    $data = [
      'no_registrasi' => $this->input->post('no_registrasi'),
      'nama_pemilik' => $this->input->post('nama_pemilik'),
      'alamat' => $this->input->post('alamat'),
      'merk' => $this->input->post('merk'),
      'tipe' => $this->input->post('tipe'),
      'jenis' => $this->input->post('jenis'),
      'tahun_pembuatan' => $this->input->post('tahun_pembuatan'),
      'isi_silinder' => $this->input->post('isi_silinder'),
      'no_rangka' => $this->input->post('no_rangka'),
      'warna' => $this->input->post('warna'),
      'bahan_bakar' => $this->input->post('bahan_bakar'),
      'warna_tnkb' => $this->input->post('warna_tnkb'),
      'tahun_registrasi' => $this->input->post('tahun_registrasi'),
      'no_bpkb' => $this->input->post('no_bpkb'),
      'tanggal_habis_stnk' => $this->input->post('tanggal_habis_stnk'),
      'jatuh_tempo_kir' => $this->input->post('jatuh_tempo_kir'),
      'harga_stnk' => $this->input->post('harga_stnk'),
      'harga_kir' => $this->input->post('harga_kir'),
      'no_uji_kir' => $this->input->post('no_uji_kir')
    ];
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('kendaraan', $data);
  }
}
