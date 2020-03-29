   <!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800">List User</h1>

       <!-- Flash notifikasi -->
       <?php if ($this->session->flashdata()) : ?>
           <div class="alert alert-success">
               Data user berhasil <strong><?= $this->session->flashdata('flash'); ?></strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="close">
                   <span aria-hidden="true"> &times; </span>
               </button>
           </div>
       <?php endif; ?>

       <!-- DataTables -->
       <div class="card shadow mb-4">
           <div class="card-header py-3">
               <div class="d-sm-flex align-items-center justify-content-between">
                   <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                   <a href="<?= base_url('User/tambahUser') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-square fa-sm text-white-50"></i> Tambah User</a>
               </div>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                       <thead>
                           <tr>
                               <th>Nama </th>
                               <th>Email</th>
                               <th>Telepon</th>
                               <th>Level</th>
                               <th>Username </br> Password</th>
                               <th>Aksi</th>
                           </tr>
                       </thead>
                       <tfoot>
                           <tr>
                               <th>Nama </th>
                               <th>Email</th>
                               <th>Telepon</th>
                               <th>Level</th>
                               <th>Username / Password</th>
                               <th>Aksi</th>
                           </tr>
                       </tfoot>
                       <tbody>
                           <?php foreach ($produk as $p) : ?>
                               <tr>
                                   <td><?= $p['NamaLengkap']; ?></td>
                                   <td><?= $p['Email']; ?></td>
                                   <td><?= $p['Telepon']; ?></td>
                                   <td><?= $p['Level']; ?></td>
                                   <td><b><?= $p['Username']; ?></b></br><i><?= $p['Password']; ?></i></td>
                                   <td>


                                       <!-- Button -->

                                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
                                           <span class="icon text-white">
                                               <i class="fas fa-search"></i>
                                           </span>
                                       </button>
                                       <!-- Aksi edit -->


                                       <a href="<?= base_url(); ?>/user/ubahuser/<?= $p['KodeUser']; ?>" class="btn btn-success ">
                                           <span class="icon text-white">
                                               <i class="fas fa-pencil-alt"></i>
                                           </span>
                                           <span class="text"></span>
                                       </a>

                                       <!-- Modal -->
                                       <div class="modal " id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                           <div class="modal-dialog" role="document">
                                               <div class="modal-content">
                                                   <div class="modal-header">
                                                       <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                           <span aria-hidden="true">&times;</span>
                                                       </button>
                                                   </div>
                                                   <div class="modal-body">
                                                       <form method="post" action="<?= base_url('user/tambahuser'); ?>">
                                                           <div class="form-group">
                                                               <label for="nama">Nama</label>
                                                               <input type="text" class="form-control" id="nama" name="nama">
                                                               <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                                                           </div>
                                                           <div class="form-group">
                                                               <input type="textarea" class="form-control " id="alamat" name="alamat" placeholder="Alamat...">
                                                               <small class="form-text text-danger ml-1"> <?= form_error('alamat'); ?> </small>
                                                           </div>
                                                           <div class="form-group">
                                                               <input type="number" class="form-control r" id="telepon" name="telepon" placeholder="Telepon...">
                                                               <small class="form-text text-danger ml-1"> <?= form_error('telepon'); ?> </small>
                                                           </div>
                                                           <div class="form-group">
                                                               <input type="email" class="form-control " id="email" name="email" placeholder="Email...">
                                                               <small class="form-text text-danger ml-1"> <?= form_error('email'); ?> </small>
                                                           </div>
                                                           <div class="form-group">
                                                               <input type="text" class="form-control r" id="level" name="level" placeholder="Level...">
                                                               <small class="form-text text-danger ml-1"> <?= form_error('level'); ?> </small>
                                                           </div>
                                                           <div class="form-group">
                                                               <input type="text" class="form-control " id="foto" name="foto" placeholder="Foto...">
                                                               <small class="form-text text-danger ml-1"> <?= form_error('foto'); ?> </small>
                                                           </div>
                                                           <div class="form-group">
                                                               <input type="text" class="form-control " id="username" name="username" placeholder="Username...">
                                                               <small class="form-text text-danger ml-1"> <?= form_error('username'); ?> </small>
                                                           </div>
                                                           <div class="form-group">
                                                               <input type="password" class="form-control " id="password" name="password" placeholder="Password...">
                                                               <small class="form-text text-danger ml-1"> <?= form_error('password'); ?> </small>
                                                           </div>
                                                           <button type="subtmit" class="btn btn-primary btn-user btn-block">
                                                               Simpan
                                                           </button>
                                                           <button type="reset" class="btn btn-primary btn-user btn-block">
                                                               Ulang
                                                           </button>
                                                       </form>

                                                       Anda yakin ?
                                                   </div>
                                                   <div class="modal-footer">
                                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>

                                       <!-- Aksi delete -->
                                       <!-- Button -->

                                       <a href="<?= base_url(); ?>/user/hapus/<?= $p['KodeUser']; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus?'); ">
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