<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Produk</h1>
    </div>
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-header py-3  align-items-center">
                    <div class="text-center">
                        <h5 class="m-0 font-weight-bold text-primary ">Produk Baru </h5>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Nested Row within Card Body -->

                    <form class="user" method="post" action="<?= base_url('produk/tambahproduk'); ?>">
                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">Nama Produk</label>
                            <input type="text" class="form-control" id="namaproduk" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="kategori" class="font-weight-bold">Kategori</label>
                            <select class="form-control" id="kategori" name="kategori">
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k; ?>"><?= $k; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="satuan" class="font-weight-bold">Satuan</label>
                            <input type="text" class="form-control r" id="satuan" name="satuan">
                        </div>
                        <div class="form-group">
                            <label for="harga" class="font-weight-bold">Harga</label>
                            <input type="number" class="form-control " id="harga" name="harga">
                        </div>
                        <div class="form-group">
                            <label for="stok" class="font-weight-bold">Stok Produk</label>
                            <input type="number" class="form-control r" id="stok" name="stok">
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="font-weight-bold">Keterangan</label>
                            <textarea class="form-control" name="keterangan" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="foto" class="font-weight-bold">Foto</label>
                            <input type="text" class="form-control " id="foto" name="foto">
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