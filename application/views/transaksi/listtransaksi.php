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


       <!-- DataTales Example -->
       <div class="card shadow mb-4">
           <div class="card-header py-3">
               <div class="d-sm-flex align-items-center justify-content-between">
                   <h6 class="m-0 font-weight-bold text-primary">Belum Disimpan</h6>
               </div>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                       <thead>
                           <tr>
                               <th>No Transaksi </th>
                               <th>Nama Pelanggan</th>
                               <th>Tanggal</th>
                               <th>Total Bayar</th>
                               <th>Aksi</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php foreach ($belum as $t) : ?>
                               <tr>
                                   <td><a href="<?= base_url(); ?>/transaksi/tambahproduk/<?= $t['KodeTransaksi']; ?>">
                                           <?= $t['NoTransaksi']; ?>
                                       </a>
                                   </td>
                                   <td><?php
                                        $this->db->where('KodeUser', $t['KodeUser']);
                                        $pelanggan = $this->db->get('tbuser')->row_array();
                                        echo $pelanggan['NamaLengkap'];
                                        ?></td>
                                   <td><?= $t['TglOrder']; ?></td>
                                   <td><?= number_format($t['TotalBayar']); ?></td>
                                   <td>
                                       <a href="<?= base_url(); ?>/produk/ubahproduk/<?= $t['NoTransaksi']; ?>" class="btn btn-success ">
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

       <script>
           $(document).ready(function() {
               $('#data').DataTable({
                   responsive: true
               });
           });
       </script>

       <div class="card shadow mb-4">
           <div class="card-header py-3">
               <div class="d-sm-flex align-items-center justify-content-between">
                   <h6 class="m-0 font-weight-bold text-primary">Menunggu Pembayaran</h6>
               </div>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table table-bordered table-striped display" id="data" width="100%" cellspacing="0">
                       <thead>
                           <tr>
                               <th hidden>NoUrut</th>
                               <th>No Transaksi </th>
                               <th>Nama Pelanggan</th>
                               <th>Tanggal</th>
                               <th>Total Bayar</th>
                               <th>Aksi</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php foreach ($pembayaran as $t) : ?>
                               <tr>
                                   <td hidden><?= $t['NoUrut']; ?></td>
                                   <td><a href="<?= base_url(); ?>/transaksi/buatpembayaran/<?= $t['KodeTransaksi']; ?>">
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
                                       <a href="<?= base_url(); ?>/produk/ubahproduk/<?= $t['NoTransaksi']; ?>" class="btn btn-success ">
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

       <div class="card shadow mb-4">
           <div class="card-header py-3">
               <div class="d-sm-flex align-items-center justify-content-between">
                   <h6 class="m-0 font-weight-bold text-primary">Konfirmasi Pembayaran</h6>
               </div>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table table-bordered table-striped display" id="datakonfirmasi" width="100%" cellspacing="0">
                       <thead>
                           <tr>
                               <th hidden>NoUrut</th>
                               <th>No Transaksi </th>
                               <th>Nama Pelanggan</th>
                               <th>Tanggal Transaksi</th>
                               <th>Yang Haurs Di Bayar</th>
                               <th>Tanggal Pembayaran</th>
                               <th>Yang Sudah Di Bayar</th>
                               <!-- <th>Aksi</th> -->
                           </tr>
                       </thead>
                       <tbody>
                           <?php foreach ($konfirmasi as $t) : ?>
                               <tr>
                                   <td hidden><?= $t['NoUrut']; ?></td>
                                   <td><a href="<?= base_url(); ?>/transaksi/proseskonfirmasi/<?= $t['KodeTransaksi']; ?>">
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
                                   <td><?php
                                        $this->db->where('KodeTransaksi', $t['KodeTransaksi']);
                                        $pembayaran = $this->db->get('tbpembayaran')->row_array();
                                        echo $pembayaran['TglBayar'];
                                        ?>
                                   </td>
                                   <td><?php
                                        echo number_format($pembayaran['JumlahBayar']);
                                        ?>
                                   </td>
                                   <!-- <td>
                                       <a href="<?= base_url(); ?>/produk/ubahproduk/<?= $t['NoTransaksi']; ?>" class="btn btn-success ">
                                           <span class="icon text-white">
                                               <i class="fas fa-pencil-alt"></i>
                                           </span>
                                           <span class="text"></span>
                                       </a>
                                       <a href="<?= base_url(); ?>/transaksi/hapustransaksi/<?= $t['KodeTransaksi']; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data Transaksi?'); ">
                                           <span class="icon text-white">
                                               <i class="fas fa-trash"></i>
                                           </span>
                                       </a>
                                   </td> -->
                               </tr>
                           <?php endforeach; ?>

                       </tbody>
                   </table>
               </div>
           </div>

       </div>


       <div class="card shadow mb-4">
           <div class="card-header py-3">
               <div class="d-sm-flex align-items-center justify-content-between">
                   <h6 class="m-0 font-weight-bold text-primary">Siap Dikirim</h6>
               </div>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table table-bordered table-striped display" id="datasiapdikirim" width="100%" cellspacing="0">
                       <thead>
                           <tr>
                               <th hidden>NoUrut</th>
                               <th>No Transaksi </th>
                               <th>Nama Pelanggan</th>
                               <th>Tanggal</th>
                               <th>Total Bayar</th>
                               <!-- <th>Aksi</th> -->
                           </tr>
                       </thead>
                       <tbody>
                           <?php foreach ($siapdikirim as $t) : ?>
                               <tr>
                                   <td hidden><?= $t['NoUrut']; ?></td>
                                   <td><a href="<?= base_url(); ?>/transaksi/tambahproduk/<?= $t['KodeTransaksi']; ?>">
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
                                   <!-- <td>
                                              <a href="<?= base_url(); ?>/produk/ubahproduk/<?= $t['NoTransaksi']; ?>" class="btn btn-success ">
                                                  <span class="icon text-white">
                                                      <i class="fas fa-pencil-alt"></i>
                                                  </span>
                                                  <span class="text"></span>
                                              </a>
                                              <a href="<?= base_url(); ?>/transaksi/hapustransaksi/<?= $t['KodeTransaksi']; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data Transaksi?'); ">
                                                  <span class="icon text-white">
                                                      <i class="fas fa-trash"></i>
                                                  </span>
                                              </a>
                                          </td> -->
                               </tr>
                           <?php endforeach; ?>

                       </tbody>
                   </table>
               </div>
           </div>

       </div>
   </div>
   <!-- /.container-fluid -->

   </div>
   <!-- End of Main Content -->