<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Buat Pesanan</h1>
    </div>

    <div class="row">

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
            <div class="card shadow mb-4 ">
                <div class="card-header py-3  align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Pilih Produk</h6>
                </div>
                <div class="card-body">
                    <form class="user" method="post" action="<?= base_url(); ?>/transaksi/tambahproduk/<?= $transaksi['KodeTransaksi']; ?>">
                        <input type="hidden" class="form-control" id="kode" name="kode" value="<?= $transaksi['KodeTransaksi'] ?>">
                        <div class="form-group">
                            <label for="produk" class="font-weight-bold">Produk</label>
                            <select class="form-control" id="produk" name="produk">
                                <?php foreach ($produk as $p) : ?>
                                    <option value="<?= $p['KodeProduk']; ?>"><?= $p['NamaProduk'] . ' - (' . $p['Satuan'] . ')'; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger ml-1"> <?= form_error('produk'); ?> </small>
                        </div>
                        <div class="form-group">
                            <label for="jumlah" class="font-weight-bold">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah">
                            <small class="form-text text-danger ml-1"> <?= form_error('jumlah'); ?> </small>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-icon-split ">
                                <span class="icon text-white-50">
                                    <i class="fas fa-shopping-cart"></i>
                                </span>
                                <span class="text">Tambah Produk</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-lg-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">List Produk</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Satuan</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pesanan as $p) : ?>
                                    <?php
                                    $this->db->where('KodeProduk', $p['KodeProduk']);
                                    $produk = $this->db->get('tbproduk')->row_array();
                                    ?>
                                    <tr>
                                        <td><?= $produk['NamaProduk']; ?></td>
                                        <td><?= number_format($produk['Harga']); ?> </td>
                                        <td><?= $produk['Satuan']; ?></td>
                                        <td><?= $p['Jumlah']; ?></td>
                                        <td><?= number_format($p['TotalBayar']); ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>/transaksi/hapusdetailtransaksi/<?= $p['KodeDetail']; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus?'); ">
                                                <span class="icon text-white">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <input hidden type="date" class="form-control" id="nama" name="tanggal" value="<?= $transaksi['TglOrder'] ?>">

                        <a href="<?= base_url(); ?>/transaksi/simpantransaksi/<?= $transaksi['KodeTransaksi']; ?>" type="submit" class="btn btn-primary btn-user btn-block">
                            SIMPAN TRANSAKSI
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
</div>