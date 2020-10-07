<div class="container-fluid" onbeforeunload="return myFunction()">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4" onunload="return confirm('Anda Yakin Ingin Menghapus?');">
        <h1 class="h3 mb-0 text-gray-800">Buat Pesanan</h1>
    </div>
    <script>
        function myFunction() {
            return alert('Anda Yakin Ingin Menghapus?');
        }
    </script>


    <div class="row justify-content-center">

        <div class="col-lg-8">
            <!-- DataTales Example -->
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
                    <div class="form-group">
                        <div class="row justify-content-left">
                            <div class="col-lg-8">
                                <label for="nama" class="font-weight-bold">Produk yang di Order</label>
                                <small class="form-text text-danger ml-1"> <?= form_error('kode'); ?> </small>
                            </div>
                            <div class="col-lg-4">
                                <label for="nama" class="font-weight-bold">Jumlah</label>
                                <small class="form-text text-danger ml-1"> <?= form_error('kode'); ?> </small>
                            </div>
                        </div>
                        <?php foreach ($pesanan as $p) : ?>
                            <div class="row justify-content-left">
                                <div class="col-lg-8">
                                    <input disabled type="text" class="form-control" id="kode" name="kode" value="<?= $p['NamaProduk'] ?>">
                                    <small class="form-text text-danger ml-1"> <?= form_error('kode'); ?> </small>
                                </div>
                                <div class="col-lg-4">
                                    <input disabled type="text" class="form-control" id="kode" name="kode" value="<?= $p['Jumlah'] ?>">
                                    <small class="form-text text-danger ml-1"> <?= form_error('kode'); ?> </small>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="font-weight-bold">Total yang harus di Bayar</label>
                        <input disabled type="text" class="form-control" id="kode" name="kode" value="<?= number_format($transaksi['TotalBayar']) ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-lg-6">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
                </div>
                <div class="card-body">
                    <?php
                    if ($transaksi['StatusBayar'] != NULL) :
                    ?>
                        <input type="hidden" class="form-control" id="kode" name="kode" value="<?= $transaksi['KodeTransaksi'] ?>">
                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">No Rekening</label>
                            <input type="text" class="form-control" id="norek" name="norek" value="<?= $pembayaran['NoRek']; ?>">
                            <small class="form-text text-danger ml-1"> <?= form_error('norek'); ?> </small>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">Atas Nama</label>
                            <input type="text" class="form-control" id="atasnama" name="atasnama" value="<?= $pembayaran['AtasNama']; ?>">
                            <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">Nama Bank</label>
                            <input type="text" class="form-control" id="bank" name="bank" value="<?= $pembayaran['NamaBank']; ?>">
                            <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">Jumlah Bayar</label>
                            <input type="number" class="form-control" id="bayar" name="bayar" value="<?= $pembayaran['JumlahBayar']; ?>">
                            <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">Tanggal Bayar</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $pembayaran['TglBayar']; ?>">
                            <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">Bukti Bayar</label>
                            <img src="<?= base_url(); ?>uploads/bukti/<?= $pembayaran['BuktiBayar'] ?>" width="100%" alt="">

                            <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                        </div>
                    <?php
                    else :
                    ?>
                        <div class="row justify-content-center">
                            <div class="form-group">
                                <label for="nama" class="font-weight-bold">Belum Melakukan Pembayaran</label>
                                <br>
                                <div class="row justify-content-center">
                                    <a href="<?= base_url(); ?>/transaksi/buatpembayaran/<?= $transaksi['KodeTransaksi']; ?>" class="btn btn-warning">
                                        <span class="icon text-white">
                                            Bayar
                                        </span>
                                        <span class="text"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    endif;
                    ?>
                </div>
            </div>

        </div>

        <div class="col-lg-6">
            <div class="card shadow mb-4 ">
                <div class="card-header py-3  align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pengiriman</h6>
                </div>
                <div class="card-body">
                    <?php
                    if ($transaksi['StatusKirim'] != NULL) :
                    ?>
                        <input type="hidden" class="form-control" id="kode" name="kode" value="<?= $transaksi['KodeTransaksi'] ?>">
                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">Nama Pengirim</label>
                            <input type="text" class="form-control" id="pengirim" name="pengirim" value="<?= $pengiriman['Pengirim']; ?>">
                            <small class="form-text text-danger ml-1"> <?= form_error('norek'); ?> </small>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">Nama Penerima</label>
                            <input type="text" class="form-control" id="penerima" name="penerima" value="<?= $pengiriman['Penerima']; ?>">
                            <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">Tanggal Kirim / Terima</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $pengiriman['TglKirim']; ?>">
                            <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">Bukti Terima</label>
                            <img src="<?= base_url(); ?>uploads/bukti/kirim/<?= $pengiriman['BuktiKirim'] ?>" width="100%" alt="">

                            <small class="form-text text-danger ml-1"> <?= form_error('nama'); ?> </small>
                        </div>
                    <?php
                    else :
                    ?>
                        <div class="row justify-content-center">
                            <div class="form-group">
                                <label for="nama" class="font-weight-bold">Belum Melakukan Pengiriman</label>
                                <br>
                                <div class="row justify-content-center">
                                    <a href="<?= base_url(); ?>/transaksi/buatpengiriman/<?= $transaksi['KodeTransaksi']; ?>" class="btn btn-warning">
                                        <span class="icon text-white">
                                            Kirim
                                        </span>
                                        <span class="text"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    endif;
                    ?>

                </div>
            </div>
        </div>
    </div>



    <!-- /.container-fluid -->
</div>
</div>