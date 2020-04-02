<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data User</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow mb-4 ">

                <div class="card-header py-3  align-items-center">
                    <div class="text-center">
                        <h5 class="m-0 font-weight-bold text-primary ">Ubah Data User </h5>
                    </div>
                </div>

                <div class="card-body">
                    <?php echo form_open_multipart('user/ubahuser/' . $user['KodeUser']); ?>

                    <!-- Parameter Ubah// KodeUser -->

                    <input type="hidden" id="kode" name="kode" value="<?= $user['KodeUser'] ?>"></input>

                    <div class="form-group">
                        <label for="nama" class="font-weight-bold">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['NamaLengkap'];  ?>">
                        <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                    </div>
                    <div class="form-group">
                        <label for="Alamat" class="font-weight-bold">Alamat</label>
                        <input type="textarea" class="form-control " id="alamat" name="alamat" value="<?= $user['Alamat'];  ?>">
                        <small class="form-text text-danger ml-1"> <?= form_error('alamat'); ?> </small>
                    </div>
                    <div class="form-group">
                        <label for="Telepon" class="font-weight-bold">Telepon</label>
                        <input type="text" class="form-control r" id="telepon" name="telepon" value="<?= $user['Telepon'];  ?>">
                        <small class="form-text text-danger ml-1"> <?= form_error('telepon'); ?> </small>
                    </div>
                    <div class="form-group">
                        <label for="Email" class="font-weight-bold">Email</label>
                        <input type="email" class="form-control " id="email" name="email" value="<?= $user['Email'];  ?>">
                        <small class="form-text text-danger ml-1"> <?= form_error('email'); ?> </small>
                    </div>
                    <div class="form-group">
                        <label for="Level" class="font-weight-bold">Level</label>
                        <select class="form-control" id="level" name="level">
                            <?php foreach ($level as $l) : ?>
                                <?php if ($l == $user['Level']) : ?>
                                    <option value="<?= $l; ?>" selected><?= $l; ?></option>
                                <?php else : ?>
                                    <option value="<?= $l; ?>"><?= $l; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>

                        <small class="form-text text-danger ml-1"> <?= form_error('level'); ?> </small>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="font-weight-bold">Foto</label>
                        <div class="justify-content-center mb-4">
                            <img src="<?= base_url(); ?>uploads/user/<?= $user['Foto'] ?>" width="160px" alt="">
                        </div>
                        <input type="file" class="form-control-file" id="foto" name="foto">
                        <small id="fileHelpId" class="form-text text-muted">Biarkan jika tidak ada perubahan</small>
                    </div>
                    <div class="form-group">
                        <label for="Username" class="font-weight-bold">Username</label>
                        <input type="text" class="form-control " id="username" name="username" value="<?= $user['Username'];  ?>">
                        <small class="form-text text-danger ml-1"> <?= form_error('username'); ?> </small>
                    </div>
                    <div class="form-group">
                        <label for="password" class="font-weight-bold">Password</label>
                        <input type="password" class="form-control " id="password" name="password" value="<?= $user['Password'];  ?>">
                        <small class="form-text text-danger ml-1"> <?= form_error('password'); ?> </small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Ubah
                    </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>