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
       <div class="card shadow mb-4" id="aaa">
           <div class="card-header py-3">
               <div class="d-sm-flex align-items-center justify-content-between">
                   <h6 class="m-0 font-weight-bold text-primary">Data <?= $judul; ?></h6>
                   <a href="<?= base_url('Produk/tambahProduk') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-square fa-sm text-white-50"></i> Tambah Produk</a>
               </div>
           </div>

           <div class="card-body">
               <div class="table-responsive">
                   <table class="table table-bordered" id="dataTableProduk" width="100%" cellspacing="0">
                       <thead>
                           <tr>
                               <th hidden>Kode</th>
                               <th>Foto</th>
                               <th>Deskripsi </th>
                               <th>Satuan</th>
                               <th>Harga(Rp)</th>
                               <th>Stok</th>
                               <th>Aksi</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php foreach ($produk as $p) : ?>
                               <tr>
                                   <td hidden><?= $p['KodeProduk']; ?></td>
                                   <td>
                                       <img src="<?= base_url(); ?>uploads/produk/<?= $p['Foto'] ?>" width="120px" alt="">
                                   </td>
                                   <td>
                                       <text style="font-variant-caps: all-large-caps; font-weight:bold; font-style: oblique"> <?= $p['NamaProduk']; ?> <br> </text>
                                       <text style="font-weight:600; font-style:italic"> <?= $p['KategoriProduk']; ?> <br> </text>
                                       <text> <?= $p['Keterangan']; ?> <br> </text>
                                   </td>
                                   <td><?= $p['Satuan']; ?></td>
                                   <td><?= number_format($p['Harga']); ?></td>
                                   <td><?= $p['Stok']; ?></td>
                                   <td>
                                       <a href="<?= base_url(); ?>/produk/ubahproduk/<?= $p['KodeProduk']; ?>" class="btn btn-success ">
                                       </a>
                                       <button type="button" class="btn btn-success " onclick="edit(<?= $p['KodeProduk']; ?>)">
                                           <script>
                                               function edit(KodeJenis) {
                                                   $('#aaa').load("ubahproduk/" + KodeJenis, "#ubahproduk");
                                               }
                                           </script>
                                           <span class="icon text-white">
                                               <i class="fas fa-pencil-alt"></i>
                                           </span>
                                           <span class="text"></span>
                                       </button>
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