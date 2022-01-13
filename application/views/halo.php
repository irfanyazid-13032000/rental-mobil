<div class="col-md-10">
  <section class="content">

    <?php


    function getHari($date)
    {
      $datetime = $date;
      switch ($datetime) {
        case 'Sunday':
          $hari = 'Minggu';
          break;
        case 'Monday':
          $hari = 'Senin';
          break;
        case 'Tuesday':
          $hari = 'Selasa';
          break;
        case 'Wednesday':
          $hari = 'Rabu';
          break;
        case 'Thursday':
          $hari = 'Kamis';
          break;
        case 'Friday':
          $hari = 'Jum\'at';
          break;
        case 'Saturday':
          $hari = 'Sabtu';
          break;
        default:
          $hari = 'Tidak ada';
          break;
      }
      return $hari;
    }

    function getBulan($moon)
    {
      $datetime = $moon;
      switch ($datetime) {
        case 'January':
          $bulan = 'Januari';
          break;
        case 'February':
          $bulan = 'Februari';
          break;
        case 'March':
          $bulan = 'Maret';
          break;
        case 'April':
          $bulan = 'April';
          break;
        case 'May':
          $bulan = 'Mei';
          break;
        case 'June':
          $bulan = 'Juni';
          break;
        case 'July':
          $bulan = 'Juli';
          break;
        case 'August':
          $bulan = 'Agustus';
          break;
        case 'September':
          $bulan = 'September';
          break;
        case 'October':
          $bulan = 'Oktober';
          break;
        case 'November':
          $bulan = 'November';
          break;
        case 'December':
          $bulan = 'Desember';
          break;
        default:
          $bulan = 'Tidak ada';
          break;
      }
      return $bulan;
    }

    ?>
    <?php $date = date('l');
    $moon = date('F');
    ?>
    <h1>Hari ini : <?php echo getHari($date) . ', ' . date('d') . ' ' . getBulan($moon) . ' ' . date('Y'); ?></h1>
  </section>
</div>