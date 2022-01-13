<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Import Model
 *
 * @author Coders Mag Team
 *
 * @email  info@techarise.com
 */
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Site extends CI_Model
{
  private $_batchImport;

  public function setBatchImport($batchImport)
  {
    $this->_batchImport = $batchImport;
  }

  // save data
  public function importData()
  {
    $data = $this->_batchImport;
    $this->db->insert_batch('kendaraan', $data);
  }
  // get employee list
  public function employeeList()
  {
    $this->db->select(array('e.no_registrasi', 'e.nama_pemilik', 'e.alamat', 'e.merk'));
    $this->db->from('kendaraan as e');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function mengambilkolom()
  {
    return $this->db->query("SELECT *
    FROM Name.COLUMNS
    WHERE TABLE_NAME = 'kendaraan'")->result_array();
  }
}
