<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Buat Transaksi</h1>
    </div>

    <div class="row justify-content-center">

        <div class="col-lg-6 ">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
                </div>
                <div class="card-body">
                    <form class="user" method="post" action="<?= base_url('transaksi/buattransaksi'); ?>">
                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">Kode Transaksi</label>
                            <div class="row justify-content-center">
                                <div class="col-lg-3 ">
                                    <input type="number" class="form-control" id="no" name="no">
                                    <small class="form-text text-danger ml-1"> <?= form_error('kode'); ?> </small>
                                </div>
                                <div class="col-lg-9 ">
                                    <input type="text" class="form-control" id="kode" name="kode" value="<?= '/PC/' . date('m') . '/' . date('Y') ?>">
                                    <small class="form-text text-danger ml-1"> <?= form_error('kode'); ?> </small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">Nama Pelanggan</label>
                            <select class="form-control" id="nama" name="nama" class="font-weight-bold text-danger">
                                <option class="font-weight-bold text-danger text-center">

                                </option>
                                <?php foreach ($user as $u) : ?>
                                    <option value="<?= $u['KodeUser']; ?>"><?= $u['NamaLengkap']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">Tanggal</label>
                            <input type="date" class="form-control" id="nama" name="tanggal" size="1" value="<?= date('Y-m-d'); ?>">
                            <small class="form-text text-danger ml-1"> <?= form_error('tanggal'); ?> </small>
                            <small class="form-text ml-1"> (bulan/tanggal/tahun) </small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>

            <!-- /.container-fluid -->
        </div>
    </div>
</div>