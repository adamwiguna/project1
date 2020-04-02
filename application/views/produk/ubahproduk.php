<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Produk</h1>
    </div>
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-header py-3  align-items-center">
                    <div class="text-center">
                        <h5 class="m-0 font-weight-bold text-primary ">Ubah Data Produk </h5>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Nested Row within Card Body -->
                    <?php echo form_open_multipart('produk/ubahproduk/' . $produk['KodeProduk']); ?>

                    <!-- Parameter Ubah// KodeUser -->

                    <input type="hidden" id="kode" name="kode" value="<?= $produk['KodeProduk'] ?>"></input>

                    <div class="form-group">
                        <label for="nama" class="font-weight-bold">Nama Produk</label>
                        <input type="text" class="form-control" id="namaproduk" name="nama" value="<?= $produk['NamaProduk'];  ?>">
                    </div>
                    <div class="form-group">
                        <label for="kategori" class="font-weight-bold">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori">
                            <?php foreach ($kategori as $k) : ?>
                                <?php if ($k == $produk['KategoriProduk']) : ?>
                                    <option value="<?= $k; ?>" selected><?= $k; ?></option>
                                <?php else : ?>
                                    <option value="<?= $k; ?>"><?= $k; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="satuan" class="font-weight-bold">Satuan</label>
                        <input type="text" class="form-control r" id="satuan" name="satuan" value="<?= $produk['Satuan'];  ?>">
                    </div>
                    <div class="form-group">
                        <label for="harga" class="font-weight-bold">Harga</label>
                        <input type="number" class="form-control " id="harga" name="harga" value="<?= $produk['Harga'];  ?>">
                    </div>
                    <div class="form-group">
                        <label for="stok" class="font-weight-bold">Stok Produk</label>
                        <input type="number" class="form-control r" id="stok" name="stok" value="<?= $produk['Stok'];  ?>">
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="font-weight-bold">Keterangan</label>
                        <textarea class="form-control" name="keterangan" rows="3" value=""><?= $produk['Keterangan'];  ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="font-weight-bold">Foto</label>
                        <div class="justify-content-center mb-4">
                            <img src="<?= base_url(); ?>uploads/produk/<?= $produk['Foto'] ?>" width="160px" alt="">
                        </div>
                        <input type="file" class="form-control-file" id="foto" name="foto">
                        <small id="fileHelpId" class="form-text text-muted">Biarkan jika tidak ada perubahan</small>
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