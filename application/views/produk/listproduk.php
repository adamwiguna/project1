   <!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800">List Produk</h1>
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
                   <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
                   <a href="<?= base_url('Produk/tambahProduk') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-square fa-sm text-white-50"></i> Tambah Produk</a>
               </div>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                       <thead>
                           <tr>
                               <th>Nama </th>
                               <th>Katgori</th>
                               <th>Stok</th>
                               <th>Harga</th>
                               <th>Foto</th>
                               <th>Aksi</th>
                           </tr>
                       </thead>
                       <tfoot>
                           <tr>
                               <th>Nama </th>
                               <th>Katgori</th>
                               <th>Stok</th>
                               <th>Harga</th>
                               <th>Foto</th>
                               <th>Aksi</th>
                           </tr>
                       </tfoot>
                       <tbody>
                           <?php foreach ($produk as $p) : ?>
                               <tr>
                                   <td><?= $p['NamaProduk']; ?></td>
                                   <td><?= $p['KategoriProduk']; ?></td>
                                   <td><?= $p['Stok'] . ' ' . $p['Satuan']; ?></td>
                                   <td><?= 'Rp ' . $p['Harga']; ?></td>
                                   <td><?= $p['Foto']; ?></td>
                                   <td>
                                       <a href="<?= base_url(); ?>/produk/ubahproduk/<?= $p['KodeProduk']; ?>" class="btn btn-success ">
                                           <span class="icon text-white">
                                               <i class="fas fa-pencil-alt"></i>
                                           </span>
                                           <span class="text"></span>
                                       </a>
                                       <!-- Aksi delete -->
                                       <!-- Button -->
                                       <a href="<?= base_url(); ?>/produk/hapus/<?= $p['KodeProduk']; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus?'); ">
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
   <!-- /.container-fluid -->

   </div>
   <!-- End of Main Content -->