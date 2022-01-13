<div class="col-md-10">
  <section class="content">
    <canvas id="myChart"></canvas>
  </section>
</div>




<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
  var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: [<?php foreach ($label as $la) {
                  echo "'" . $la . "',";
                } ?>],
      datasets: [{
        label: 'Jumlah Kendaraan',
        backgroundColor: ['#d4f0f7', '#d0d5f7', '#b8cefc'],
        borderColor: '#C3C3D2',
        data: [
          <?php echo $ready ?>, <?php echo $notready ?>, <?php echo $maintain ?>
        ]
      }]
    },
  });
</script>