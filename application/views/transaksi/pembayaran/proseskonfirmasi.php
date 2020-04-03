<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Konfirmasi Pembayaran</h1>
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
                        <label for="nama" class="font-weight-bold">Tanggal</label>
                        <input disabled type="date" class="form-control" id="nama" name="tanggal" value="<?= $transaksi['TglOrder'] ?>">
                        <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-6">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
                </div>
                <div class="card-body">
                    <input type="hidden" class="form-control" id="no" name="no" value="<?= $transaksi['NoTransaksi'] ?>">
                    <input type="hidden" class="form-control" id="kode" name="kode" value="<?= $transaksi['KodeTransaksi'] ?>">
                    <div class="form-group">
                        <label for="nama" class="font-weight-bold">No Rekening</label>
                        <input type="text" class="form-control" id="norek" name="norek" value="<?= $pembayaran['NoRek'] ?>">
                        <small class="form-text text-danger ml-1"> <?= form_error('norek'); ?> </small>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="font-weight-bold">Atas Nama</label>
                        <input type="text" class="form-control" id="atasnama" name="atasnama" value="<?= $pembayaran['AtasNama'] ?>">
                        <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="font-weight-bold">Nama Bank</label>
                        <input type="text" class="form-control" id="bank" name="bank" value="<?= $pembayaran['NamaBank'] ?>">
                        <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="font-weight-bold">Tanggal Bayar</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $pembayaran['TglBayar'] ?>">
                        <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="row justify-content-center ">

        <div class="col-lg-6">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Konfirmasi</h6>
                </div>
                <div class="card-body">
                    <?php echo form_open_multipart('transaksi/proseskonfirmasi/' . $transaksi['KodeTransaksi']); ?>
                    <input type="hidden" class="form-control" id="kode" name="kode" value="<?= $transaksi['KodeTransaksi'] ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nama" class="font-weight-bold">Bukti Bayar</label>
                                <img src="<?= base_url(); ?>uploads/bukti/<?= $pembayaran['BuktiBayar'] ?>" width="100%" alt="">
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nama" class="font-weight-bold">Total yang harus di Bayar</label>
                                <input disabled type="text text-white-50 " class="form-control border-bottom-danger" id="kode" name="kode" value="<?= number_format($transaksi['TotalBayar']) ?>">
                            </div>
                            <div class="form-group">
                                <label for="nama" class="font-weight-bold">Jumlah Yang Di Bayar</label>
                                <input disabled type="text" class="form-control border-bottom-info" id="bayar" name="bayar" value="<?= number_format($pembayaran['JumlahBayar']) ?>">
                                <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="font-weight-bold">Konfirmasi??</label>
                                <select class="form-control" id="konfirmasi" name="konfirmasi">
                                    <option></option>
                                    <option value="iya">Iya</option>
                                    <option value="tidak">Tidak</option>
                                    <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer py-3">

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Konfirmasi
                    </button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>