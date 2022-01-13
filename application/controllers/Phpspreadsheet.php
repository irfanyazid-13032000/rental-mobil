<?php
defined('BASEPATH') or exit('No direct script access allowed');
//PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Phpspreadsheet extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // load model
    $this->load->helper('download');
    $this->load->model('Site', 'site');
  }
  // index
  public function index()
  {
    $data['file'] = 'templatesExcel.xlsx';
    $data['judul'] = 'Import Excel';
    $data['breadcrumbs'] = array('Home' => '#');
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('spreadsheet/index', $data);
    $this->load->view('templates/footer');
  }

  public function download()
  {
    // $data['file'] = file_get_contents('templatesExcel.xlsx');
    // $name = $this->uri->segment(3);
    // var_dump($name);
    // exit;

    force_download('templatesExcel.xlsx', NULL);
  }

  // file upload functionality
  public function upload()
  {
    $data = array();
    $data['judul'] = 'Import Excel';
    $data['breadcrumbs'] = array('Home' => '#');
    // Load form validation library
    $this->load->library('form_validation');
    $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('spreadsheet/index', $data);
      $this->load->view('templates/footer');
    } else {
      // If file uploaded
      if (!empty($_FILES['fileURL']['name'])) {
        // get file extension
        $extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);

        if ($extension == 'csv') {
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } elseif ($extension == 'xlsx') {
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        } else {
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }
        // file path
        $spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
        $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        // array Count
        $arrayCount = count($allDataInSheet);
        $flag = 0;
        $createArray = array(
          'no_registrasi',
          'nama_pemilik',
          'alamat',
          'merk',
          'tipe',
          'jenis',
          'tahun_pembuatan',
          'isi_silinder',
          'no_rangka',
          'no_mesin',
          'warna',
          'bahan_bakar',
          'warna_tnkb',
          'tahun_registrasi',
          'no_bpkb',
          'tanggal_habis_stnk',
          'jatuh_tempo_kir',
          'harga_stnk',
          'harga_kir',
          'no_uji_kir'
        );
        $makeArray = array(
          'no_registrasi' => 'no_registrasi',
          'nama_pemilik' => 'nama_pemilik',
          'alamat' => 'alamat',
          'merk' => 'merk',
          'tipe' => 'tipe',
          'jenis' => 'jenis',
          'tahun_pembuatan' => 'tahun_pembuatan',
          'isi_silinder' => 'isi_silinder',
          'no_rangka' => 'no_rangka',
          'no_mesin' => 'no_mesin',
          'warna' => 'warna',
          'bahan_bakar' => 'bahan_bakar',
          'warna_tnkb' => 'warna_tnkb',
          'tahun_registrasi' => 'tahun_registrasi',
          'no_bpkb' => 'no_bpkb',
          'tanggal_habis_stnk' => 'tanggal_habis_stnk',
          'jatuh_tempo_kir' => 'jatuh_tempo_kir',
          'harga_stnk' => 'harga_stnk',
          'harga_kir' => 'harga_kir',
          'no_uji_kir' => 'no_uji_kir'
        );
        $SheetDataKey = array();
        foreach ($allDataInSheet as $dataInSheet) {
          foreach ($dataInSheet as $key => $value) {
            if (in_array(trim($value), $createArray)) {
              $value = preg_replace('/\s+/', '', $value);
              $SheetDataKey[trim($value)] = $key;
            }
          }
        }
        $dataDiff = array_diff_key($makeArray, $SheetDataKey);

        if (empty($dataDiff)) {
          $flag = 1;
        }
        // match excel sheet column
        if ($flag == 1) {
          for ($i = 2; $i <= $arrayCount; $i++) {
            // $addresses = array();
            $no_registrasi = $SheetDataKey['no_registrasi'];
            $nama_pemilik = $SheetDataKey['nama_pemilik'];
            $alamat = $SheetDataKey['alamat'];
            $merk = $SheetDataKey['merk'];
            $tipe = $SheetDataKey['tipe'];
            $jenis = $SheetDataKey['jenis'];
            $tahun_pembuatan = $SheetDataKey['tahun_pembuatan'];
            $isi_silinder = $SheetDataKey['isi_silinder'];
            $no_rangka = $SheetDataKey['no_rangka'];
            $no_mesin = $SheetDataKey['no_mesin'];
            $warna = $SheetDataKey['warna'];
            $bahan_bakar = $SheetDataKey['bahan_bakar'];
            $warna_tnkb = $SheetDataKey['warna_tnkb'];
            $tahun_registrasi = $SheetDataKey['tahun_registrasi'];
            $no_bpkb = $SheetDataKey['no_bpkb'];
            $tanggal_habis_stnk = $SheetDataKey['tanggal_habis_stnk'];
            $jatuh_tempo_kir = $SheetDataKey['jatuh_tempo_kir'];
            $harga_stnk = $SheetDataKey['harga_stnk'];
            $harga_kir = $SheetDataKey['harga_kir'];
            $no_uji_kir = $SheetDataKey['no_uji_kir'];

            $no_registrasi = filter_var(trim($allDataInSheet[$i][$no_registrasi]), FILTER_SANITIZE_STRING);
            $nama_pemilik = filter_var(trim($allDataInSheet[$i][$nama_pemilik]), FILTER_SANITIZE_STRING);
            $alamat = filter_var(trim($allDataInSheet[$i][$alamat]), FILTER_SANITIZE_STRING);
            $merk = filter_var(trim($allDataInSheet[$i][$merk]), FILTER_SANITIZE_STRING);
            $tipe = filter_var(trim($allDataInSheet[$i][$tipe]), FILTER_SANITIZE_STRING);
            $jenis = filter_var(trim($allDataInSheet[$i][$jenis]), FILTER_SANITIZE_STRING);
            $tahun_pembuatan = filter_var(trim($allDataInSheet[$i][$tahun_pembuatan]), FILTER_SANITIZE_STRING);
            $isi_silinder = filter_var(trim($allDataInSheet[$i][$isi_silinder]), FILTER_SANITIZE_STRING);
            $no_rangka = filter_var(trim($allDataInSheet[$i][$no_rangka]), FILTER_SANITIZE_STRING);
            $no_mesin = filter_var(trim($allDataInSheet[$i][$no_mesin]), FILTER_SANITIZE_STRING);
            $warna = filter_var(trim($allDataInSheet[$i][$warna]), FILTER_SANITIZE_STRING);
            $bahan_bakar = filter_var(trim($allDataInSheet[$i][$bahan_bakar]), FILTER_SANITIZE_STRING);
            $warna_tnkb = filter_var(trim($allDataInSheet[$i][$warna_tnkb]), FILTER_SANITIZE_STRING);
            $tahun_registrasi = filter_var(trim($allDataInSheet[$i][$tahun_registrasi]), FILTER_SANITIZE_STRING);
            $no_bpkb = filter_var(trim($allDataInSheet[$i][$no_bpkb]), FILTER_SANITIZE_STRING);
            $tanggal_habis_stnk = filter_var(trim($allDataInSheet[$i][$tanggal_habis_stnk]), FILTER_SANITIZE_STRING);
            $jatuh_tempo_kir = filter_var(trim($allDataInSheet[$i][$jatuh_tempo_kir]), FILTER_SANITIZE_STRING);
            $harga_stnk = filter_var(trim($allDataInSheet[$i][$harga_stnk]), FILTER_SANITIZE_STRING);
            $harga_kir = filter_var(trim($allDataInSheet[$i][$harga_kir]), FILTER_SANITIZE_STRING);
            $no_uji_kir = filter_var(trim($allDataInSheet[$i][$no_uji_kir]), FILTER_SANITIZE_STRING);
            $fetchData[] = array(
              'no_registrasi' => $no_registrasi,
              'nama_pemilik' => $nama_pemilik,
              'alamat' => $alamat,
              'merk' => $merk,
              'tipe' => $tipe,
              'jenis' => $jenis,
              'tahun_pembuatan' => $tahun_pembuatan,
              'isi_silinder' => $isi_silinder,
              'no_rangka' => $no_rangka,
              'no_mesin' => $no_mesin,
              'warna' => $warna,
              'bahan_bakar' => $bahan_bakar,
              'warna_tnkb' => $warna_tnkb,
              'tahun_registrasi' => $tahun_registrasi,
              'no_bpkb' => $no_bpkb,
              'tanggal_habis_stnk' => $tanggal_habis_stnk,
              'jatuh_tempo_kir' => $jatuh_tempo_kir,
              'harga_stnk' => $harga_stnk,
              'harga_kir' => $harga_kir,
              'no_uji_kir' => $no_uji_kir
            );
          }
          $data['dataInfo'] = $fetchData;
          $this->site->setBatchImport($fetchData);
          $this->site->importData();
        } else {
          echo "Please import correct file, did not match excel sheet column";
        }
        $data['judul'] = 'Hasil Import Excel';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('spreadsheet/display', $data);
        $this->load->view('templates/footer');
      } else {
        echo 'harap masukkan data';
      }
    }
  }

  // checkFileValidation
  public function checkFileValidation($string)
  {
    $file_mimes = array(
      'text/x-comma-separated-values',
      'text/comma-separated-values',
      'application/octet-stream',
      'application/vnd.ms-excel',
      'application/x-csv',
      'text/x-csv',
      'text/csv',
      'application/csv',
      'application/excel',
      'application/vnd.msexcel',
      'text/plain',
      'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    );
    if (isset($_FILES['fileURL']['name'])) {
      $arr_file = explode('.', $_FILES['fileURL']['name']);
      $extension = end($arr_file);
      if (($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)) {
        return true;
      } else {
        $this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
        return false;
      }
    } else {
      $this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
      return false;
    }
  }
}
