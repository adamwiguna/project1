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
                    <form class="user" method="post" action="<?= base_url('transaksi/pembayaran'); ?>">
                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">Kode Transaksi</label>
                            <select class="form-control" id="kode" name="kode">
                                <option></option>
                                <?php foreach ($pembayaran as $u) :
                                    $this->db->where('KodeUser', $u['KodeUser']);
                                    $pelanggan = $this->db->get('tbuser')->row_array();
                                ?>
                                    <option value="<?= $u['KodeTransaksi']; ?>"><?= $u['NoTransaksi'] . ' - (' . $pelanggan['NamaLengkap'] . ')'; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger ml-1"> <?= form_error('kode'); ?> </small>
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