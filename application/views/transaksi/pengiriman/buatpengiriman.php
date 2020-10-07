<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengiriman</h1>
    </div>


    <div class="row ">

        <div class="col-lg-6">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
                </div>
                <div class="card-body">
                    <input type="hidden" class="form-control" id="kode" name="kode" value="<?= $transaksi['KodeTransaksi'] ?>">
                    <div class="form-group">
                        <label for="nama" class="font-weight-bold">Kode Pesanan</label>
                        <input disabled type="text" class="form-control" id="kode" name="kode" value="<?= $transaksi['NoTransaksi'] ?>">
                        <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="font-weight-bold">Nama Pelanggan</label>
                        <input disabled type="text" class="form-control" id="nama" name="nama" value="<?php
                                                                                                        $this->db->where('KodeUser', $transaksi['KodeUser']);
                                                                                                        $pelanggan = $this->db->get('tbuser')->row_array();
                                                                                                        echo $pelanggan['NamaLengkap'];
                                                                                                        ?>">
                        <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="font-weight-bold">Alamat</label>
                        <input disabled type="text" class="form-control" id="nama" name="nama" value="<?php
                                                                                                        $this->db->where('KodeUser', $transaksi['KodeUser']);
                                                                                                        $alamat = $this->db->get('tbuser')->row_array();
                                                                                                        echo $alamat['Alamat'];
                                                                                                        ?>">
                        <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="font-weight-bold">Tanggal</label>
                        <input disabled type="date" class="form-control" id="nama" name="tanggal" value="<?= $transaksi['TglOrder'] ?>">
                        <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="font-weight-bold">Total yang harus di Bayar</label>
                        <input disabled type="text" class="form-control" id="kode" name="kode" value="<?= number_format($transaksi['TotalBayar']) ?>">
                    </div>
                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 ">
                                <label for="nama" class="font-weight-bold">Produk yang di Order</label>
                                <small class="form-text text-danger ml-1"> <?= form_error('kode'); ?> </small>
                            </div>
                            <div class="col-lg-3 ">
                                <label for="nama" class="font-weight-bold">Jumlah</label>
                                <small class="form-text text-danger ml-1"> <?= form_error('kode'); ?> </small>
                            </div>
                        </div>
                        <?php foreach ($pesanan as $p) : ?>
                            <div class="row justify-content-center">
                                <div class="col-lg-9 ">
                                    <input disabled type="text" class="form-control" id="kode" name="kode" value="<?= $p['NamaProduk'] ?>">
                                    <small class="form-text text-danger ml-1"> <?= form_error('kode'); ?> </small>
                                </div>
                                <div class="col-lg-3 ">
                                    <input disabled type="text" class="form-control" id="kode" name="kode" value="<?= $p['Jumlah'] ?>">
                                    <small class="form-text text-danger ml-1"> <?= form_error('kode'); ?> </small>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-6">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pengiriman</h6>
                </div>
                <div class="card-body">
                    <?php echo form_open_multipart('transaksi/simpanpengiriman/' . $transaksi['KodeTransaksi']); ?>
                    <input type="hidden" class="form-control" id="no" name="no" value="<?= $transaksi['NoTransaksi'] ?>">
                    <input type="hidden" class="form-control" id="kode" name="kode" value="<?= $transaksi['KodeTransaksi'] ?>">
                    <div class="form-group">
                        <label for="nama" class="font-weight-bold">Nama Pengirim</label>
                        <input type="text" class="form-control" id="pengirim" name="pengirim" required>
                        <small class="form-text text-danger ml-1"> <?= form_error('norek'); ?> </small>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="font-weight-bold">Nama Penerima</label>
                        <input type="text" class="form-control" id="penerima" name="penerima" required>
                        <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="font-weight-bold">Tanggal Bayar</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="font-weight-bold">Bukti Terima</label>
                        <input type="file" class="form-control-file" id="bukti" name="bukti">
                        <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Simpan
                    </button>
                    <button type="reset" class="btn btn-primary btn-user btn-block">
                        Ulang
                    </button>
                    <?php echo form_close(); ?>
                </div>

            </div>

        </div>

    </div>
</div>