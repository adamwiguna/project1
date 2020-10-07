   <!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>
       <?php if ($this->session->flashdata()) : ?>
           <div class="alert alert-success">
               Data transaksi berhasil <strong><?= $this->session->flashdata('flash'); ?></strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="close">
                   <span aria-hidden="true"> &times; </span>
               </button>
           </div>
       <?php endif; ?>

       <!-- Tabs -->
       <ul class="nav nav-tabs " id="myTab" role="tablist">
           <li class="nav-item">
               <a class="nav-link active " id="belumsimpan-tab" data-toggle="tab" href="#a" role="tab" aria-controls="home" aria-selected="true">Order</a>
           </li>
           <!-- <li class="nav-item">
               <a class="nav-link" id="order-tab" data-toggle="tab" href="#b" role="tab" aria-controls="profile" aria-selected="false">Order</a>
           </li> -->
           <li class="nav-item">
               <a class="nav-link" id="bayar-tab" data-toggle="tab" href="#c" role="tab" aria-controls="contact" aria-selected="false">Belum Bayar</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" id="kirim-tab" data-toggle="tab" href="#d" role="tab" aria-controls="home" aria-selected="true">Belum Kirim</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" id="selesai-tab" data-toggle="tab" href="#e" role="tab" aria-controls="profile" aria-selected="false">Selesai</a>
           </li>

       </ul>
       <div class="tab-content" id="myTabContent">
           <div class="tab-pane fade show active " id="a" role="tabpanel" aria-labelledby="home-tab">
               <!-- Belum Simpan -->
               <div class="card shadow mb-4 border-bottom-primary">
                   <a href="#collapse1" class="d-block card-header py-3 bg-gradient-primary" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapse1">
                       <div class="d-sm-flex align-items-center justify-content-between ">
                           <h6 class="m-0 font-weight-bold text-white">Belum Selesai</h6>
                       </div>
                   </a>
                   <!-- Card Content - Collapse -->
                   <div class="collapse show" id="collapse1">
                       <div class="card-body">
                           <div class="table-responsive">
                               <table class="table table-bordered table-striped" id="data1" width="100%" cellspacing="0">
                                   <thead>
                                       <tr>
                                           <th>No Transaksi </th>
                                           <th>Nama Pelanggan</th>
                                           <th>Tanggal</th>
                                           <th>Total Bayar</th>
                                           <th>Status Simpan</th>
                                           <th>Status Bayar</th>
                                           <th>Status Kirim</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <?php foreach ($transaksi as $t) : ?>
                                           <tr class="<?php
                                                        if ($t['StatusSimpan'] == NULL) {
                                                            echo 'font-weight-bold text-danger';
                                                        }  ?>">
                                               <td>
                                                   <?php
                                                    if ($t['StatusSimpan'] == NULL) {
                                                    ?>
                                                       <i class="fas fa-exclamation-triangle"></i>
                                                       <?= $t['NoTransaksi']; ?>
                                                   <?php
                                                    } else { ?>
                                                       <a href="<?= base_url(); ?>/transaksi/detailtransaksi/<?= $t['KodeTransaksi']; ?>">
                                                           <?= $t['NoTransaksi']; ?>
                                                       </a>
                                                   <?php
                                                    }
                                                    ?>

                                               <td>
                                                   <?php
                                                    $this->db->where('KodeUser', $t['KodeUser']);
                                                    $pelanggan = $this->db->get('tbuser')->row_array();
                                                    echo $pelanggan['NamaLengkap'];
                                                    ?>
                                               </td>

                                               <td><?= $t['TglOrder']; ?></td>

                                               <td><?= number_format($t['TotalBayar']); ?></td>

                                               <td>
                                                   <div class="row justify-content-center">
                                                       <?php
                                                        if ($t['StatusSimpan'] == NULL) {
                                                        ?>
                                                           <a href="<?php
                                                                    // $this->session->set_userdata('Halaman', 'tambahproduk');
                                                                    echo base_url(); ?>/transaksi/pilihproduk/<?= $t['KodeTransaksi']; ?>" class="btn btn-warning mr-1">
                                                               <span class="icon text-white ">
                                                                   <i class="fas fa-pencil-alt"></i>
                                                               </span>
                                                               <span class="text"></span>
                                                           </a>
                                                           <a href="<?= base_url(); ?>/transaksi/hapustransaksi/<?= $t['KodeTransaksi']; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus?'); ">
                                                               <span class="icon text-white">
                                                                   <i class="fas fa-trash"></i>
                                                               </span>
                                                           </a>
                                                       <?php
                                                        } else if ($t['StatusSimpan'] != NULL && ($t['StatusBayar'] == NULL && $t['StatusKirim'] == NULL)) {
                                                        ?>
                                                           <span class="btn btn-success btn-circle mr-1">
                                                               <i class="fas fa-check"></i>
                                                           </span>
                                                           <a href="<?= base_url(); ?>/transaksi/hapustransaksi/<?= $t['KodeTransaksi']; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus?'); ">
                                                               <span class="icon text-white">
                                                                   <i class="fas fa-trash"></i>
                                                               </span>
                                                           </a>
                                                       <?php
                                                        } else {
                                                        ?>
                                                           <span class="btn btn-success btn-circle">
                                                               <i class="fas fa-check"></i>
                                                           </span>
                                                       <?php
                                                        }
                                                        ?>
                                                   </div>
                                               </td>

                                               <td>
                                                   <div class="row justify-content-center">
                                                       <?php
                                                        if ($t['StatusBayar'] == NULL) {
                                                            if ($t['StatusSimpan'] == NULL) {
                                                            } else {
                                                        ?>
                                                               <a href="<?= base_url(); ?>/transaksi/buatpembayaran/<?= $t['KodeTransaksi']; ?>" class="btn btn-warning">
                                                                   <span class="icon text-white">
                                                                       Bayar
                                                                   </span>
                                                                   <span class="text"></span>
                                                               </a>
                                                           <?php
                                                            }
                                                        } else {
                                                            ?>
                                                           <span class="btn btn-success btn-circle">
                                                               <i class="fas fa-check"></i>
                                                           </span>
                                                       <?php
                                                        }
                                                        ?>
                                                   </div>
                                               </td>
                                               <td>
                                                   <div class="row justify-content-center">
                                                       <?php
                                                        if ($t['StatusKirim'] == NULL) {
                                                            if ($t['StatusSimpan'] == NULL) {
                                                            } else {
                                                        ?>
                                                               <a href="<?= base_url(); ?>/transaksi/buatpengiriman/<?= $t['KodeTransaksi']; ?>" class="btn btn-warning">
                                                                   <span class="icon text-white">
                                                                       Kirim
                                                                   </span>
                                                                   <span class="text"></span>
                                                               </a>
                                                           <?php
                                                            }
                                                        } else {
                                                            ?>
                                                           <span class="btn btn-success btn-circle">
                                                               <i class="fas fa-check"></i>
                                                           </span>
                                                       <?php
                                                        }
                                                        ?>
                                                   </div>
                                               </td>
                                           </tr>
                                       <?php endforeach; ?>

                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>

           </div>
           <div class="tab-pane fade" id="b" role="tabpanel" aria-labelledby="profile-tab">...</div>
           <div class="tab-pane fade" id="c" role="tabpanel" aria-labelledby="contact-tab">
               <!-- Belum Bayar-->
               <div class="card shadow mb-4 border-bottom-primary">
                   <a href="#collapse2" class="d-block card-header py-3 bg-gradient-primary" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                       <div class="d-sm-flex align-items-center justify-content-between ">
                           <h6 class="m-0 font-weight-bold text-white">Menunggu Pembayaran</h6>
                       </div>
                   </a>
                   <!-- Card Content - Collapse -->
                   <div class="collapse show" id="collapse2">
                       <div class="card-body">
                           <div class="table-responsive">
                               <table class="table table-bordered table-striped display" id="data" width="100%" cellspacing="0">
                                   <thead>
                                       <tr>
                                           <th hidden>NoUrut</th>
                                           <th>No Transaksi </th>
                                           <th>Nama Pelanggan</th>
                                           <th>Tanggal Order</th>
                                           <th>Total Bayar</th>
                                           <th>Aksi</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <?php foreach ($pembayaran as $t) : ?>
                                           <tr>
                                               <td hidden><?= $t['NoUrut']; ?></td>
                                               <td>
                                                   <a href="<?= base_url(); ?>/transaksi/detailtransaksi/<?= $t['KodeTransaksi']; ?>">
                                                       <?= $t['NoTransaksi']; ?>
                                                   </a>
                                               </td>
                                               <td><?php
                                                    $this->db->where('KodeUser', $t['KodeUser']);
                                                    $pelanggan = $this->db->get('tbuser')->row_array();
                                                    echo $pelanggan['NamaLengkap'];
                                                    ?>
                                               </td>
                                               <td><?= $t['TglOrder']; ?></td>
                                               <td><?= number_format($t['TotalBayar']); ?></td>
                                               <td>
                                                   <a href="<?= base_url(); ?>/transaksi/buatpembayaran/<?= $t['KodeTransaksi']; ?>" class="btn btn-success ">
                                                       <span class="icon text-white">
                                                           <i class="fas fa-pencil-alt"></i>
                                                       </span>
                                                       <span class="text"></span>
                                                   </a>
                                                   <!-- Aksi delete -->
                                                   <!-- Button -->
                                                   <a href="<?= base_url(); ?>/transaksi/hapustransaksi/<?= $t['KodeTransaksi']; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus?'); ">
                                                       <span class="icon text-white">
                                                           <i class="fas fa-trash"></i>
                                                       </span>
                                                   </a>
                                               </td>
                                           </tr>
                                       <?php endforeach; ?>

                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <div class="tab-pane fade" id="d" role="tabpanel" aria-labelledby="profile-tab">
               <!-- Belum Kirim -->
               <div class="card shadow mb-4 border-bottom-primary">
                   <a href="#collapse4" class="d-block card-header py-3 bg-gradient-primary" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                       <div class="d-sm-flex align-items-center justify-content-between ">
                           <h6 class="m-0 font-weight-bold text-white">Siap Dikirim</h6>
                       </div>
                   </a>
                   <!-- Card Content - Collapse -->
                   <div class="collapse show" id="collapse4">
                       <div class="card-body">
                           <div class="table-responsive">
                               <table class="table table-bordered table-striped display" id="datasiapdikirim" width="100%" cellspacing="0">
                                   <thead>
                                       <tr>
                                           <th hidden>NoUrut</th>
                                           <th>No Transaksi </th>
                                           <th>Nama Pelanggan</th>
                                           <th>Tanggal Order</th>
                                           <th>Alamat</th>
                                           <th>Aksi</th>
                                           <!-- <th>Aksi</th> -->
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <?php foreach ($siapdikirim as $t) : ?>
                                           <tr>
                                               <td hidden><?= $t['NoUrut']; ?></td>
                                               <td>
                                                   <a href="<?= base_url(); ?>/transaksi/detailtransaksi/<?= $t['KodeTransaksi']; ?>">
                                                       <?= $t['NoTransaksi']; ?>
                                                   </a>
                                               </td>
                                               <td><?php
                                                    $this->db->where('KodeUser', $t['KodeUser']);
                                                    $pelanggan = $this->db->get('tbuser')->row_array();
                                                    echo $pelanggan['NamaLengkap'];
                                                    ?>
                                               </td>
                                               <td><?= $t['TglOrder']; ?></td>
                                               <td><?= $pelanggan['Alamat']; ?></td>
                                               <td>
                                                   <a href="<?= base_url(); ?>/transaksi/buatpengiriman/<?= $t['KodeTransaksi']; ?>" class="btn btn-success ">
                                                       <span class="icon text-white">
                                                           <i class="fas fa-pencil-alt"></i>
                                                       </span>
                                                       <span class="text"></span>
                                                   </a>
                                                   <!-- Aksi delete -->
                                                   <!-- Button -->
                                                   <a href="<?= base_url(); ?>/transaksi/hapustransaksi/<?= $t['KodeTransaksi']; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus?'); ">
                                                       <span class="icon text-white">
                                                           <i class="fas fa-trash"></i>
                                                       </span>
                                                   </a>
                                               </td>
                                           </tr>
                                       <?php endforeach; ?>

                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
           </div>


           <div class="tab-pane fade" id="e" role="tabpanel" aria-labelledby="contact-tab">...

               <!-- Belum Kirim -->
               <div class="card shadow mb-4 border-bottom-primary">
                   <a href="#collapse4" class="d-block card-header py-3 bg-gradient-primary" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                       <div class="d-sm-flex align-items-center justify-content-between ">
                           <h6 class="m-0 font-weight-bold text-white">Selesai</h6>
                       </div>
                   </a>
                   <!-- Card Content - Collapse -->
                   <div class="collapse show" id="collapse4">
                       <div class="card-body">
                           <div class="table-responsive">
                               <table class="table table-bordered table-striped display" id="dataselesai" width="100%" cellspacing="0">
                                   <thead>
                                       <tr>
                                           <th hidden>NoUrut</th>
                                           <th>No Transaksi </th>
                                           <th>Nama Pelanggan</th>
                                           <th>Total Bayar</th>
                                           <th>Tanggal Order</th>
                                           <th>Tanggal Bayar</th>
                                           <th>Tanggal Kirim</th>
                                           <!-- <th>Aksi</th> -->
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <?php foreach ($selesai as $t) : ?>
                                           <tr>
                                               <td hidden><?= $t['NoUrut']; ?></td>
                                               <td>
                                                   <a href="<?= base_url(); ?>/transaksi/detailtransaksi/<?= $t['KodeTransaksi']; ?>">
                                                       <?= $t['NoTransaksi']; ?>
                                                   </a>
                                               </td>
                                               <td><?php
                                                    $this->db->where('KodeUser', $t['KodeUser']);
                                                    $pelanggan = $this->db->get('tbuser')->row_array();
                                                    echo $pelanggan['NamaLengkap'];
                                                    ?>
                                               </td>
                                               <td><?= number_format($t['TotalBayar']); ?></td>
                                               <td><?= $t['TglOrder']; ?></td>
                                               <td><?php
                                                    $this->db->where('KodeTransaksi', $t['KodeTransaksi']);
                                                    $tglbayar = $this->db->get('tbpembayaran')->row_array();
                                                    echo $tglbayar['TglBayar'];
                                                    ?>
                                               </td>
                                               <td><?php
                                                    $this->db->where('KodeTransaksi', $t['KodeTransaksi']);
                                                    $tglbayar = $this->db->get('tbkirim')->row_array();
                                                    echo $tglbayar['TglKirim'];
                                                    ?>
                                               </td>
                                           </tr>
                                       <?php endforeach; ?>

                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>


   </div>
   <!-- /.container-fluid -->


   </div>
   <!-- End of Main Content -->