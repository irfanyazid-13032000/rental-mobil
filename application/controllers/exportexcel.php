<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class exportexcel extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('kendaraan_model');
  }

  public function index()
  {

    if (null !== $this->session->userdata('tglmulai') && null !== $this->session->userdata('tglselesai')) {
      $data['tglmulai'] = $this->session->userdata('tglmulai');
      $data['tglselesai'] = $this->session->userdata('tglselesai');
      $data['kendaraan'] = $this->kendaraan_model->getDataExportExcelKendaraan($data['tglmulai'], $data['tglselesai']);
    } else {
      $data['tglmulai'] = null;
      $data['tglselesai'] = null;
      $data['kendaraan'] = $this->kendaraan_model->getData();
    }

    // var_dump($data['tglmulai']);
    // echo '<br>';
    // var_dump($data['tglselesai']);
    // exit;

    $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet

    $sheet = $spreadsheet->getActiveSheet();

    $kolom = 1;

    $sheet->setCellValue('A' . $kolom, "No");
    $sheet->setCellValue('B' . $kolom, "Nama Pemilik");
    $sheet->setCellValue('C' . $kolom, "No Registrasi");
    $sheet->setCellValue('D' . $kolom, "Alamat");
    $sheet->setCellValue('E' . $kolom, "Merk");
    $sheet->setCellValue('F' . $kolom, "Tipe");
    $sheet->setCellValue('G' . $kolom, "Jenis");
    $sheet->setCellValue('H' . $kolom, "Tahun Pembuatan");
    $sheet->setCellValue('I' . $kolom, "Silinder");
    $sheet->setCellValue('J' . $kolom, "Rangka");
    $sheet->setCellValue('K' . $kolom, "Mesin");
    $sheet->setCellValue('L' . $kolom, "Warna");
    $sheet->setCellValue('M' . $kolom, "Bahan Bakar");
    $sheet->setCellValue('N' . $kolom, "Warna TNKB");
    $sheet->setCellValue('O' . $kolom, "Tahun Registrasi");
    $sheet->setCellValue('P' . $kolom, "NO BPKB");
    $sheet->setCellValue('Q' . $kolom, "Tanggal Habis STNK");
    $sheet->setCellValue('R' . $kolom, "Jatuh Tempo KIR");
    $sheet->setCellValue('S' . $kolom, "Harga STNK");
    $sheet->setCellValue('T' . $kolom, "Harga KIR");
    $sheet->setCellValue('U' . $kolom, "No Uji KIR");

    $baris = $kolom + 1;
    $no = 1;


    foreach ($data['kendaraan'] as $k) {
      // manually set table data value
      $sheet->setCellValue('A' . $baris, $no);
      $sheet->setCellValue('B' . $baris, $k['nama_pemilik']);
      $sheet->setCellValue('C' . $baris, $k['no_registrasi']);
      $sheet->setCellValue('D' . $baris, $k['alamat']);
      $sheet->setCellValue('E' . $baris, $k['merk']);
      $sheet->setCellValue('F' . $baris, $k['tipe']);
      $sheet->setCellValue('G' . $baris, $k['jenis']);
      $sheet->setCellValue('H' . $baris, $k['tahun_pembuatan']);
      $sheet->setCellValue('I' . $baris, $k['isi_silinder']);
      $sheet->setCellValue('J' . $baris, $k['no_rangka']);
      $sheet->setCellValue('K' . $baris, $k['no_mesin']);
      $sheet->setCellValue('L' . $baris, $k['warna']);
      $sheet->setCellValue('M' . $baris, $k['bahan_bakar']);
      $sheet->setCellValue('N' . $baris, $k['warna_tnkb']);
      $sheet->setCellValue('O' . $baris, $k['tahun_registrasi']);
      $sheet->setCellValue('P' . $baris, $k['no_bpkb']);
      $sheet->setCellValue('Q' . $baris, $k['tanggal_habis_stnk']);
      $sheet->setCellValue('R' . $baris, $k['jatuh_tempo_kir']);
      $sheet->setCellValue('S' . $baris, $k['harga_stnk']);
      $sheet->setCellValue('T' . $baris, $k['harga_kir']);
      $sheet->setCellValue('U' . $baris, $k['no_uji_kir']);
      $baris++;
      $no++;
    }


    $writer = new Xlsx($spreadsheet); // instantiate Xlsx
    if (null !== $data['tglmulai'] && null !== $data['tglselesai']) {
      $filename = 'Data Jatuh Tempo STNK  dari tanggal ' . $data['tglmulai'] . ' hingga ' . $data['tglselesai']; // set filename for excel file to be exported
    } else {
      $filename = 'Seluruh Data Jatuh Tempo STNK';
    }

    // $filename = 'Seluruh Data Jatuh Tempo STNK';


    header('Content-Type: application/vnd.ms-excel'); // generate excel file
    header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');  // download file 
  }

  public function nokir()
  {
    if (null !== $this->session->userdata('tglmulai') && null !== $this->session->userdata('tglselesai')) {
      $data['tglmulai'] = $this->session->userdata('tglmulai');
      $data['tglselesai'] = $this->session->userdata('tglselesai');
      $data['kendaraan'] = $this->kendaraan_model->getDataExportExcelNokir($data['tglmulai'], $data['tglselesai']);
    } else {
      $data['kendaraan'] = $this->kendaraan_model->getData();
    }





    $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet

    $sheet = $spreadsheet->getActiveSheet();

    $kolom = 8;

    if (null !== $this->session->userdata('tglmulai') && null !== $this->session->userdata('tglselesai')) {
      $sheet->setCellValue('G3', 'Data Jatuh Tempo KIR dari Tanggal ' . $data['tglmulai'] . ' hingga ' . $data['tglselesai']);
    } else {
      $sheet->setCellValue('G3', 'Seluruh data Jatuh Tempo KIR');
    }

    $sheet->setCellValue('A' . $kolom, "No");
    $sheet->setCellValue('B' . $kolom, "Nama Pemilik");
    $sheet->setCellValue('C' . $kolom, "No Registrasi");
    $sheet->setCellValue('D' . $kolom, "Alamat");
    $sheet->setCellValue('E' . $kolom, "Merk");
    $sheet->setCellValue('F' . $kolom, "Tipe");
    $sheet->setCellValue('G' . $kolom, "Jenis");
    $sheet->setCellValue('H' . $kolom, "Tahun Pembuatan");
    $sheet->setCellValue('I' . $kolom, "Silinder");
    $sheet->setCellValue('J' . $kolom, "Rangka");
    $sheet->setCellValue('K' . $kolom, "Mesin");
    $sheet->setCellValue('L' . $kolom, "Warna");
    $sheet->setCellValue('M' . $kolom, "Bahan Bakar");
    $sheet->setCellValue('N' . $kolom, "Warna TNKB");
    $sheet->setCellValue('O' . $kolom, "Tahun Registrasi");
    $sheet->setCellValue('P' . $kolom, "NO BPKB");
    $sheet->setCellValue('Q' . $kolom, "Tanggal Habis STNK");
    $sheet->setCellValue('R' . $kolom, "Jatuh Tempo KIR");
    $sheet->setCellValue('S' . $kolom, "Harga STNK");
    $sheet->setCellValue('T' . $kolom, "Harga KIR");
    $sheet->setCellValue('U' . $kolom, "No Uji KIR");

    $baris = $kolom + 1;
    $no = 1;


    foreach ($data['kendaraan'] as $k) {
      // manually set table data value
      $sheet->setCellValue('A' . $baris, $no);
      $sheet->setCellValue('B' . $baris, $k['nama_pemilik']);
      $sheet->setCellValue('C' . $baris, $k['no_registrasi']);
      $sheet->setCellValue('D' . $baris, $k['alamat']);
      $sheet->setCellValue('E' . $baris, $k['merk']);
      $sheet->setCellValue('F' . $baris, $k['tipe']);
      $sheet->setCellValue('G' . $baris, $k['jenis']);
      $sheet->setCellValue('H' . $baris, $k['tahun_pembuatan']);
      $sheet->setCellValue('I' . $baris, $k['isi_silinder']);
      $sheet->setCellValue('J' . $baris, $k['no_rangka']);
      $sheet->setCellValue('K' . $baris, $k['no_mesin']);
      $sheet->setCellValue('L' . $baris, $k['warna']);
      $sheet->setCellValue('M' . $baris, $k['bahan_bakar']);
      $sheet->setCellValue('N' . $baris, $k['warna_tnkb']);
      $sheet->setCellValue('O' . $baris, $k['tahun_registrasi']);
      $sheet->setCellValue('P' . $baris, $k['no_bpkb']);
      $sheet->setCellValue('Q' . $baris, $k['tanggal_habis_stnk']);
      $sheet->setCellValue('R' . $baris, $k['jatuh_tempo_kir']);
      $sheet->setCellValue('S' . $baris, $k['harga_stnk']);
      $sheet->setCellValue('T' . $baris, $k['harga_kir']);
      $sheet->setCellValue('U' . $baris, $k['no_uji_kir']);
      $baris++;
      $no++;
    }


    $writer = new Xlsx($spreadsheet); // instantiate Xlsx

    if (null !== $this->session->userdata('tglmulai') && null !== $this->session->userdata('tglselesai')) {
      $filename = 'Data Jatuh Tempo KIR dari tanggal ' . $data['tglmulai'] . ' hingga ' . $data['tglselesai']; // set filename for excel file to be exported
    } else {
      $filename = 'Seluruh Data Jatuh tempo KIR';
    }



    header('Content-Type: application/vnd.ms-excel'); // generate excel file
    header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');  // download file 
  }
}




  // // export file Xlsx, Xls and Csv
  // public function mencoba()
  // {
  //   if (null !== $this->input->post('tglmulai') && null !== $this->input->post('tglselesai')) {
  //     $tglmulai = $this->input->post('tglmulai');
  //     $tglselesai = $this->input->post('tglselesai');

  //     $data['tglmulai'] = $tglmulai;
  //     $data['tglselesai'] = $tglselesai;
  //   } else {
  //     $tglmulai = date('Y-m-d');
  //     $tglselesai = date('Y-m-d', strtotime('+1month'));

  //     $data['tglmulai'] = $tglmulai;
  //     $data['tglselesai'] = $tglselesai;
  //   }

  //   $data['kendaraan'] = $this->kendaraan_model->getSTNKByTanggal($tglmulai, $tglselesai);



  //   $this->load->helper('download');

  //   $data['title'] = 'masih belajar saya bang';
  //   // get employee list
  //   // $empInfo = $this->site->employeeList();
  //   $fileName = 'masih mencoba aja';
  //   $spreadsheet = new Spreadsheet();
  //   $sheet = $spreadsheet->getActiveSheet();

  //   $sheet->setCellValue('A1', 'ID');
  //   $sheet->setCellValue('B1', 'no registrasi');
  //   $sheet->setCellValue('C1', 'nama pemilik');
  //   $sheet->setCellValue('D1', 'alamat');
  //   $sheet->setCellValue('E1', 'merk');


  //   $rowCount = 2;
  //   foreach ($data['kendaraan'] as $k) {
  //     $sheet->setCellValue('A' . $rowCount, $k['id']);
  //     $sheet->setCellValue('B' . $rowCount, $k['no_registrasi']);
  //     $sheet->setCellValue('C' . $rowCount, $k['nama_pemilik']);
  //     $sheet->setCellValue('D' . $rowCount, $k['alamat']);
  //     $sheet->setCellValue('E' . $rowCount, $k['merk']);
  //     $rowCount++;
  //   }


  //   $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
  //   $fileName = $fileName . '.xlsx';

  //   $this->output->set_header('Content-Type: application/vnd.ms-excel');
  //   $this->output->set_header("Content-type: application/csv");
  //   $this->output->set_header('Cache-Control: max-age=0');
  //   $writer->save(ROOT_UPLOAD_PATH . $fileName);
  //   //redirect(HTTP_UPLOAD_PATH.$fileName); 
  //   $filepath = file_get_contents(ROOT_UPLOAD_PATH . $fileName);
  //   force_download($fileName, $filepath);
  // }
// }