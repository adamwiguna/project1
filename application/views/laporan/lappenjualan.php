 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
     <?php if ($this->session->flashdata()) : ?>
         <div class="alert alert-success">
             Data produk berhasil <strong><?= $this->session->flashdata('flash'); ?></strong>
             <button type="button" class="close" data-dismiss="alert" aria-label="close">
                 <span aria-hidden="true"> &times; </span>
             </button>
         </div>
     <?php endif; ?>

     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <div class="d-sm-flex align-items-center justify-content-between">
                 <h6 class="m-0 font-weight-bold text-primary">Grafik Penjualan</h6>
                 <h6 class="m-0 font-weight-bold text-primary"> Total : Rp <?= number_format($totalpendapatan['TB']); ?></h6>
                 <?php echo form_open_multipart('laporan/lihatLaporanPenjualanfilter'); ?>
                 <div class="row">
                     <div class="mr-1">
                         <select class="form-control " id="bulan" name="bulan">
                             <option value="NULL">Bulan</option>
                             <?php foreach ($filter as $k) : ?>
                                 <option value="<?= $k['bulan']; ?>"><?= $k['bulan']; ?></option>
                             <?php endforeach; ?>
                         </select>

                     </div>
                     <div class="mr-1">
                         <select class="form-control" id="tahun" name="tahun">
                             <option value="NULL">Tahun</option>
                             <?php foreach ($filter as $k) : ?>
                                 <option value="<?= $k['tahun']; ?>"><?= $k['tahun']; ?></option>
                             <?php endforeach; ?>
                         </select>

                     </div>
                     <div class="">
                         <button type="submit" class="btn btn-primary btn-user btn-block">
                             filter
                         </button>
                     </div>
                 </div>
                 <?= form_close(); ?>
             </div>
         </div>
         <div class="card-body">
             <div class="chart-area">
                 <canvas id="myAreaChart"></canvas>
             </div>
         </div>
     </div>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <div class="d-sm-flex align-items-center justify-content-between">
                 <h6 class="m-0 font-weight-bold text-primary">Data <?= $judul; ?></h6>
                 <h6 class="m-0 font-weight-bold text-primary"> Total : Rp <?= number_format($totalpendapatan['TB']); ?></h6>
                 <?php echo form_open_multipart('laporan/lihatLaporanPenjualanfilter'); ?>
                 <div class="row">
                     <div class="mr-1">
                         <select class="form-control " id="bulan" name="bulan">
                             <option value="NULL">Bulan</option>
                             <?php foreach ($filter as $k) : ?>
                                 <option value="<?= $k['bulan']; ?>"><?= $k['bulan']; ?></option>
                             <?php endforeach; ?>
                         </select>

                     </div>
                     <div class="mr-1">
                         <select class="form-control" id="tahun" name="tahun">
                             <option value="NULL">Tahun</option>
                             <?php foreach ($filter as $k) : ?>
                                 <option value="<?= $k['tahun']; ?>"><?= $k['tahun']; ?></option>
                             <?php endforeach; ?>
                         </select>

                     </div>
                     <div class="">
                         <button type="submit" class="btn btn-primary btn-user btn-block">
                             filter
                         </button>
                     </div>
                 </div>
                 <?= form_close(); ?>
             </div>
         </div>

         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTableProduk" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>Tahun</th>
                             <th>Bulan</th>
                             <th>Total Penjualan</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php foreach ($transaksi as $t) : ?>
                             <tr>
                                 <td>
                                     <?= $t['tahun']; ?> <br> </text>
                                 </td>

                                 <td>
                                     <?= $t['bulan']; ?> <br> </text>
                                 </td>

                                 <td>
                                     <?= number_format($t['penjualan']); ?> <br> </text>
                                 </td>
                             </tr>
                         <?php endforeach; ?>

                     </tbody>
                 </table>

             </div>
         </div>
     </div>

 </div>

 <script>
     // Set new default font family and font color to mimic Bootstrap's default styling
     Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
     Chart.defaults.global.defaultFontColor = '#858796';

     function number_format(number, decimals, dec_point, thousands_sep) {
         // *     example: number_format(1234.56, 2, ',', ' ');
         // *     return: '1 234,56'
         number = (number + '').replace(',', '').replace(' ', '');
         var n = !isFinite(+number) ? 0 : +number,
             prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
             sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
             dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
             s = '',
             toFixedFix = function(n, prec) {
                 var k = Math.pow(10, prec);
                 return '' + Math.round(n * k) / k;
             };
         // Fix for IE parseFloat(0.55).toFixed(0) = 0;
         s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
         if (s[0].length > 3) {
             s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
         }
         if ((s[1] || '').length < prec) {
             s[1] = s[1] || '';
             s[1] += new Array(prec - s[1].length + 1).join('0');
         }
         return s.join(dec);
     }

     // Area Chart Example
     var ctx = document.getElementById("myAreaChart");
     var myLineChart = new Chart(ctx, {
         type: 'line',
         data: {
             labels: [
                 <?php
                    foreach ($transaksi as $t) :
                    ?> "<?= $t['bulan']; ?> <?= $t['tahun']; ?> ",
                 <?php
                    endforeach;
                    ?>
             ],
             datasets: [{
                 label: "Penjualan",
                 lineTension: 0.3,
                 backgroundColor: "rgba(78, 115, 223, 0.05)",
                 borderColor: "rgba(78, 115, 223, 1)",
                 pointRadius: 3,
                 pointBackgroundColor: "rgba(78, 115, 223, 1)",
                 pointBorderColor: "rgba(78, 115, 223, 1)",
                 pointHoverRadius: 3,
                 pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                 pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                 pointHitRadius: 10,
                 pointBorderWidth: 2,
                 data: [
                     <?php
                        foreach ($transaksi as $t) :
                        ?> "<?= $t['penjualan']; ?>  ",
                     <?php
                        endforeach;
                        ?>
                 ],
             }],
         },
         options: {
             maintainAspectRatio: false,
             layout: {
                 padding: {
                     left: 10,
                     right: 25,
                     top: 25,
                     bottom: 0
                 }
             },
             scales: {
                 xAxes: [{
                     time: {
                         unit: 'date'
                     },
                     gridLines: {
                         display: false,
                         drawBorder: false
                     },
                     ticks: {
                         maxTicksLimit: 12
                     }
                 }],
                 yAxes: [{
                     ticks: {
                         maxTicksLimit: 10,
                         padding: 10,
                         // Include a dollar sign in the ticks
                         callback: function(value, index, values) {
                             return 'Rp' + number_format(value);
                         }
                     },
                     gridLines: {
                         color: "rgb(234, 236, 244)",
                         zeroLineColor: "rgb(234, 236, 244)",
                         drawBorder: false,
                         borderDash: [2],
                         zeroLineBorderDash: [2]
                     }
                 }],
             },
             legend: {
                 display: false
             },
             tooltips: {
                 backgroundColor: "rgb(255,255,255)",
                 bodyFontColor: "#858796",
                 titleMarginBottom: 10,
                 titleFontColor: '#6e707e',
                 titleFontSize: 14,
                 borderColor: '#dddfeb',
                 borderWidth: 1,
                 xPadding: 15,
                 yPadding: 15,
                 displayColors: false,
                 intersect: false,
                 mode: 'index',
                 caretPadding: 10,
                 callbacks: {
                     label: function(tooltipItem, chart) {
                         var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                         return datasetLabel + ': Rp' + number_format(tooltipItem.yLabel);
                     }
                 }
             }
         }
     });
 </script>