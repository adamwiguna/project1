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


       <!-- DataTales Example -->
       <div class="card shadow mb-4">
           <div class="card-header py-3">
               <div class="d-sm-flex align-items-center justify-content-between">
                   <h6 class="m-0 font-weight-bold text-primary">Data <?= $judul; ?></h6>
                   <a href="<?= base_url('Stok/tambahStok') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-square fa-sm text-white-50"></i> Tambah Stok</a>
               </div>
           </div>

           <div class="card-body">
               <div class="table-responsive">
                   <table class="table table-bordered" id="dataTableProduk" width="100%" cellspacing="0">
                       <thead>
                           <tr>
                               <th hidden>Kode</th>
                               <th>Nama Produk</th>
                               <th>Satuan</th>
                               <th>Harga</th>
                               <th>Stok</th>
                               <th>Aksi</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php foreach ($produk as $p) : ?>
                               <tr>
                                   <td hidden><?= $p['KodeProduk']; ?></td>

                                   <td>
                                       <?= $p['NamaProduk']; ?> <br> </text>
                                   </td>
                                   <td><?= $p['Satuan']; ?></td>
                                   <td><?= number_format($p['Harga']); ?></td>
                                   <td><?= $p['Stok']; ?></td>
                                   <td>
                                       <?php
                                        if ($p['Stok'] < 0) {
                                        ?>
                                           <a href="<?= base_url(); ?>/stok/tambahstokproduk/<?= $p['KodeProduk']; ?>" class="btn btn-danger ">
                                               <span class="icon text-white">
                                                   Stok Kurang
                                               </span>
                                               <span class="text"></span>
                                           </a>
                                       <?php
                                        }
                                        ?>
                                       <?php
                                        if (($p['Stok'] >= 0) && ($p['Stok'] <= 10)) {
                                        ?>
                                           <a href="<?= base_url(); ?>/stok/tambahstokproduk/<?= $p['KodeProduk']; ?>" class="btn btn-warning ">
                                               <span class="icon text-white">
                                                   Tambah Stok
                                               </span>
                                               <span class="text"></span>
                                           </a>
                                       <?php
                                        }
                                        ?>

                                       <?php
                                        if ($p['Stok'] > 10) {
                                        ?>
                                           <a href="<?= base_url(); ?>/stok/tambahstokproduk/<?= $p['KodeProduk']; ?>" class="btn btn-primary ">
                                               <span class="icon text-white">
                                                   Tambah Stok
                                               </span>
                                               <span class="text"></span>
                                           </a>
                                       <?php
                                        }
                                        ?>
                                   </td>
                               </tr>
                           <?php endforeach; ?>

                       </tbody>
                   </table>

               </div>
           </div>
       </div>

       <!-- Bar Chart -->
       <div class="card shadow mb-4">
           <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
           </div>
           <div class="card-body">
               <div class="chart-bar">
                   <canvas id="myBarChart"></canvas>
               </div>
               <hr>
               Styling for the bar chart can be found in the <code>/js/demo/chart-bar-demo.js</code> file.
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

           // Bar Chart Example
           var ctx = document.getElementById("myBarChart");
           var myBarChart = new Chart(ctx, {
               type: 'bar',
               data: {
                   labels: ["January", "February", "March", "April", "May", "June", "June", "June", "June", "June", "June", "June"],
                   datasets: [{
                       label: "Penjualan",
                       backgroundColor: "#4e73df",
                       hoverBackgroundColor: "#2e59d9",
                       borderColor: "#4e73df",
                       data: [4215, 5312, 6251, 7841, 9821, 1498400, 49840000, 14984000],
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
                               unit: 'month'
                           },
                           gridLines: {
                               display: false,
                               drawBorder: false
                           },
                           ticks: {
                               maxTicksLimit: 12
                           },
                           maxBarThickness: 25,
                       }],
                       yAxes: [{
                           ticks: {
                               min: 0,
                               max: 100000000,
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
                               return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                           }
                       }
                   },
               }
           });
       </script>

   </div>
   <!-- /.container-fluid -->

   </div>
   <!-- End of Main Content -->