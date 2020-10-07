 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
         <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
     </div>

     <!-- Content Row -->
     <div class="row">

         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-primary shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Penjualan</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($totalpendapatan['TB']); ?></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-success shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Order</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $order['tb'] ?></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-calendar fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-info shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Piutang</div>
                             <div class="row no-gutters align-items-center">
                                 <div class="col-auto">
                                     <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp <?= number_format($totalpiutang['TB']); ?></div>
                                 </div>
                                 <div class="col">
                                     <div class="progress progress-sm mr-2">
                                         <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Pending Requests Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-warning shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Produk Kurang</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $stokkurang['TB'] ?></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-boxes fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <!-- Content Row -->

     <div class="row">

         <!-- Area Chart -->
         <div class="col-xl-7 col-lg-7">
             <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Penjualan</h6>
                     <div class="dropdown no-arrow">
                         <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                         </a>
                         <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                             <div class="dropdown-header">Dropdown Header:</div>
                             <a class="dropdown-item" href="#">Action</a>
                             <a class="dropdown-item" href="#">Another action</a>
                             <div class="dropdown-divider"></div>
                             <a class="dropdown-item" href="#">Something else here</a>
                         </div>
                     </div>
                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                     <div class="chart-area">
                         <canvas id="myAreaChart">
                             <script></script>

                         </canvas>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Pie Chart -->
         <div class="col-xl-5 col-lg-5">
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">Barang Terjual</h6>
                 </div>
                 <div class="card-body">
                     <div class="chart-bar">
                         <canvas id="myBarChart"></canvas>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Content Row -->
         <div class="row">

             <!-- Content Column -->
             <div class="col-lg-6 mb-4">

                 <!-- Project Card Example -->
                 <div class="card shadow mb-4">
                     <div class="card-header py-3">
                         <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                     </div>
                     <div class="card-body">
                         <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                         <div class="progress mb-4">
                             <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                         </div>
                         <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                         <div class="progress mb-4">
                             <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                         </div>
                         <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                         <div class="progress mb-4">
                             <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                         </div>
                         <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                         <div class="progress mb-4">
                             <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                         </div>
                         <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                         <div class="progress">
                             <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                         </div>
                     </div>
                 </div>

                 <!-- Color System -->
                 <div class="row">
                     <div class="col-lg-6 mb-4">
                         <div class="card bg-primary text-white shadow">
                             <div class="card-body">
                                 Primary
                                 <div class="text-white-50 small">#4e73df</div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-6 mb-4">
                         <div class="card bg-success text-white shadow">
                             <div class="card-body">
                                 Success
                                 <div class="text-white-50 small">#1cc88a</div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-6 mb-4">
                         <div class="card bg-info text-white shadow">
                             <div class="card-body">
                                 Info
                                 <div class="text-white-50 small">#36b9cc</div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-6 mb-4">
                         <div class="card bg-warning text-white shadow">
                             <div class="card-body">
                                 Warning
                                 <div class="text-white-50 small">#f6c23e</div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-6 mb-4">
                         <div class="card bg-danger text-white shadow">
                             <div class="card-body">
                                 Danger
                                 <div class="text-white-50 small">#e74a3b</div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-6 mb-4">
                         <div class="card bg-secondary text-white shadow">
                             <div class="card-body">
                                 Secondary
                                 <div class="text-white-50 small">#858796</div>
                             </div>
                         </div>
                     </div>
                 </div>

             </div>

             <div class="col-lg-6 mb-4">

                 <!-- Illustrations -->
                 <div class="card shadow mb-4">
                     <div class="card-header py-3">
                         <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                     </div>
                     <div class="card-body">
                         <div class="text-center">
                             <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?= base_url('assets/') ?>img/undraw_posting_photo.svg" alt="">
                         </div>
                         <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
                         <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a>
                     </div>
                 </div>

                 <!-- Approach -->
                 <div class="card shadow mb-4">
                     <div class="card-header py-3">
                         <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                     </div>
                     <div class="card-body">
                         <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
                         <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
                     </div>
                 </div>

             </div>
         </div>

     </div>
     <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->
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
                    foreach ($lappenjualan as $t) :
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
                        foreach ($lappenjualan as $t) :
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

     // Bar Chart Example
     var ctx = document.getElementById("myBarChart");
     var myBarChart = new Chart(ctx, {
         type: 'horizontalBar',
         data: {
             labels: [
                 <?php
                    foreach ($lapbarang as $t) :
                    ?> "<?= $t['NamaProduk']; ?>  ",
                 <?php
                    endforeach;
                    ?>
             ],
             datasets: [{
                 label: "Terjual",
                 backgroundColor: "#4e73df",
                 hoverBackgroundColor: "#2e59d9",
                 borderColor: "#4e73df",
                 data: [
                     <?php
                        foreach ($lapbarang as $t) :
                        ?> "<?= $t['Jumlah']; ?>  ",
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
                 yAxes: [{
                     time: {
                         unit: 'barang'
                     },
                     gridLines: {
                         display: false,
                         drawBorder: false
                     },
                     ticks: {
                         maxTicksLimit: 60
                     },
                     maxBarThickness: 25,
                 }],
                 xAxes: [{
                     ticks: {
                         min: 0,
                         max: 100,
                         maxTicksLimit: 5,
                         padding: 10,
                         // Include a dollar sign in the ticks
                         callback: function(value, index, values) {
                             return number_format(value);
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
                 titleMarginBottom: 10,
                 titleFontColor: '#6e707e',
                 titleFontSize: 14,
                 backgroundColor: "rgb(255,255,255)",
                 bodyFontColor: "#858796",
                 borderColor: '#dddfeb',
                 borderWidth: 1,
                 xPadding: 15,
                 yPadding: 15,
                 displayColors: false,
                 caretPadding: 10,
                 callbacks: {
                     label: function(tooltipItem, chart) {
                         var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                         return datasetLabel + ': ' + number_format(tooltipItem.xLabel);
                     }
                 }
             },
         }
     });
 </script>