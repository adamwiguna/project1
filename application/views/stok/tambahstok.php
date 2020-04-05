<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Stok Produk</h1>
    </div>
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-header py-3  align-items-center">
                    <div class="text-center">
                        <h5 class="m-0 font-weight-bold text-primary ">Data Tambah Stok</h5>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Nested Row within Card Body -->
                    <?php echo form_open_multipart('stok/tambahstok'); ?>
                    <div class="form-group">
                        <label for="produk" class="font-weight-bold">Pilih Produk</label>
                        <select class="form-control" id="produk" name="produk">
                            <option></option>
                            <?php foreach ($produk as $p) : ?>
                                <option value="<?= $p['KodeProduk']; ?>"><?= $p['NamaProduk'] . '(' . $p['Satuan'] . ') - [Stok = ' . $p['Stok'] . ']'; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small class="form-text text-danger ml-1"> <?= form_error('produk'); ?> </small>
                    </div>
                    <div class="form-group">
                        <label for="satuan" class="font-weight-bold">Jumlah</label>
                        <input type="number" class="form-control " id="jumlah" name="jumlah">
                    </div>
                    <div class="form-group">
                        <label for="nama" class="font-weight-bold">Tanggal</label>
                        <input type="date" class="form-control" id="nama" name="tanggal" size="1" value="<?= date('Y-m-d'); ?>">
                        <small class="form-text text-danger ml-1"> <?= form_error('tanggal'); ?> </small>
                        <small class="form-text ml-1"> (bulan/tanggal/tahun) </small>
                    </div>
                    <div class="form-group">
                        <label for="harga" class="font-weight-bold">Keterangan</label>
                        <input type="text" class="form-control " id="keterangan" name="keterangan">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Simpan
                    </button>
                    <button type="reset" class="btn btn-primary btn-user btn-block">
                        Ulang
                    </button>
                    <?php echo form_close(); ?>
                    </form>

                </div>
            </div>

        </div>

    </div>

</div>