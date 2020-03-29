<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah User</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow mb-4 ">

                <div class="card-header py-3  align-items-center">
                    <div class="text-center">
                        <h5 class="m-0 font-weight-bold text-primary ">Data User Baru</h5>
                    </div>
                </div>

                <div class="card-body">
                    <form class="user" method="post" action="<?= base_url('user/tambahuser'); ?>">
                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                            <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                        </div>
                        <div class="form-group">
                            <label for="Alamat" class="font-weight-bold">Alamat</label>
                            <input type="textarea" class="form-control " id="alamat" name="alamat">
                            <small class="form-text text-danger ml-1"> <?= form_error('alamat'); ?> </small>
                        </div>
                        <div class="form-group">
                            <label for="Telepon" class="font-weight-bold">Telepon</label>
                            <input type="number" class="form-control r" id="telepon" name="telepon">
                            <small class="form-text text-danger ml-1"> <?= form_error('telepon'); ?> </small>
                        </div>
                        <div class="form-group">
                            <label for="Email" class="font-weight-bold">Email</label>
                            <input type="email" class="form-control " id="email" name="email">
                            <small class="form-text text-danger ml-1"> <?= form_error('email'); ?> </small>
                        </div>
                        <div class="form-group">
                            <label for="Level" class="font-weight-bold">Level</label>
                            <input type="text" class="form-control r" id="level" name="level">
                            <small class="form-text text-danger ml-1"> <?= form_error('level'); ?> </small>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">Foto</label>
                            <input type="text" class="form-control " id="foto" name="foto">
                            <small class="form-text text-danger ml-1"> <?= form_error('foto'); ?> </small>
                        </div>
                        <div class="form-group">
                            <label for="Username" class="font-weight-bold">Username</label>
                            <input type="text" class="form-control " id="username" name="username">
                            <small class="form-text text-danger ml-1"> <?= form_error('username'); ?> </small>
                        </div>
                        <div class="form-group">
                            <label for="password" class="font-weight-bold">Password</label>
                            <input type="password" class="form-control " id="password" name="password">
                            <small class="form-text text-danger ml-1"> <?= form_error('password'); ?> </small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Simpan
                        </button>
                        <button type="reset" class="btn btn-primary btn-user btn-block">
                            Ulang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>