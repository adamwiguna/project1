   <!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800">Keuangan</h1>
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
               <a class="nav-link active" id="bayar-tab" data-toggle="tab" href="#c" role="tab" aria-controls="contact" aria-selected="false">Piutang</a>
           </li>
           <li class="nav-item">
               <a class="nav-link  " id="belumsimpan-tab" data-toggle="tab" href="#a" role="tab" aria-controls="home" aria-selected="true">Penjualan</a>
           </li>
           <!-- <li class="nav-item">
               <a class="nav-link" id="order-tab" data-toggle="tab" href="#b" role="tab" aria-controls="profile" aria-selected="false">Order</a>
           </li> -->
           <li class="nav-item">
               <a class="nav-link" id="kirim-tab" data-toggle="tab" href="#d" role="tab" aria-controls="home" aria-selected="true">Pembelian</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" id="selesai-tab" data-toggle="tab" href="#e" role="tab" aria-controls="profile" aria-selected="false">Selesai</a>
           </li>

       </ul>
       <div class="tab-content" id="myTabContent">
           <div class="tab-pane fade  " id="a" role="tabpanel" aria-labelledby="home-tab">
               <!-- Belum Simpan -->
               <div class="card shadow mb-4 border-bottom-primary">
                   <a href="#collapse1" class="d-block card-header py-3 bg-gradient-primary" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapse1">
                       <div class="d-sm-flex align-items-center justify-content-between ">
                           <h6 class="m-0 font-weight-bold text-white">Penjualan</h6>
                           <h6 class="m-0 font-weight-bold text-white"> Total : Rp <?= number_format($totalpendapatan['TB']); ?></h6>
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
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <?php foreach ($pendapatan as $t) : ?>
                                           <tr>
                                               <td>
                                                   <a href="<?= base_url(); ?>/transaksi/detailtransaksi/<?= $t['KodeTransaksi']; ?>">
                                                       <?= $t['NoTransaksi']; ?>
                                                   </a>
                                               </td>
                                               <td>
                                                   <?php
                                                    $this->db->where('KodeUser', $t['KodeUser']);
                                                    $pelanggan = $this->db->get('tbuser')->row_array();
                                                    echo $pelanggan['NamaLengkap'];
                                                    ?>
                                               </td>

                                               <td><?= $t['TglOrder']; ?></td>

                                               <td><?= number_format($t['TotalBayar']); ?></td>
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
           <div class="tab-pane fade show active" id="c" role="tabpanel" aria-labelledby="contact-tab">
               <!-- Belum Bayar-->
               <div class="card shadow mb-4 border-bottom-primary">
                   <a href="#collapse2" class="d-block card-header py-3 bg-gradient-primary" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                       <div class="d-sm-flex align-items-center justify-content-between ">
                           <h6 class="m-0 font-weight-bold text-white">Piutang</h6>
                           <h6 class="m-0 font-weight-bold text-white"> Total : Rp <?= number_format($totalpiutang['TB']); ?></h6>
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
                                           <th>Piutang</th>
                                           <th>Aksi</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <?php foreach ($piutang as $t) : ?>
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