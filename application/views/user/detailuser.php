<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-7 col-lg-10 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-header py-3  align-items-justify">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <a href="<?= base_url('User/listUser') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-angle-double-left fa-sm text-white-50"></i> Kembali</a>
                    <h5 class="m-0 font-weight-bold text-primary">Data User</h5>
                    <a href="<?= base_url() ?>/user/ubahuser/<?= $user['KodeUser']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-pencil-alt fa-sm text-white-50"></i> Edit User</a>
                </div>

            </div>
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- Foto -->
                    <div class="col-lg-4 p-1 pl-3">
                        <img src="<?= base_url(); ?>uploads/user/<?= $user['Foto'] ?>" width="100%" alt="">
                    </div>

                    <div class="col-lg-5 border-left">
                        <div class="p-1">
                            <div class="text-justify">
                                <h1 class="h5 text-gray-900 mb-0">Nama Lengkap</h1>
                                <p class="mb-2"><?= $user['NamaLengkap']; ?></p>
                            </div>
                            <div class="text-justify">
                                <h1 class="h5 text-gray-900 mb-0">Alamat Lengkap</h1>
                                <p class="mb-2"><?= $user['Alamat']; ?></p>
                            </div>
                            <div class="text-justify">
                                <h1 class="h5 text-gray-900 mb-0">Telepon</h1>
                                <p class="mb-2"><?= $user['Telepon']; ?></p>
                            </div>
                            <div class="text-justify">
                                <h1 class="h5 text-gray-900 mb-0">Email</h1>
                                <p class="mb-2"><?= $user['Email']; ?></p>
                            </div>
                            <div class="text-justify">
                                <h1 class="h5 text-gray-900 mb-0">Level</h1>
                                <p class=""><?= $user['Level']; ?></p>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 border-left">
                        <div class="p-1">
                            <div class="text-justify">
                                <p class="text-gray-900 mb-0">Username</p>
                                <p class="mb-2"><?= $user['Username']; ?></p>
                            </div>
                            <div class="text-justify">
                                <p class="text-gray-900 mb-0">Password</p>
                                <p class="mb-2"><?= $user['Password']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer mt-3 align-items-center">
                    <div class="text-center">
                        <a href="<?= base_url(); ?>/user/ubahuser/<?= $user['KodeUser']; ?>" class="btn btn-primary btn-user btn-block">
                            Ubah Data
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>