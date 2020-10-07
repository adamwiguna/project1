<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Products</li>
        </ol>
    </div>
</div>
<!-- //breadcrumbs -->

<!--- products --->
<div class="products">
    <div class="container">
        <div class="col-md-3 products-left">
            <div class="categories">
                <h2>Kategori</h2>
                <ul class="cate">
                    <li><a href="products.html"><i class="fa fa-arrow-right" aria-hidden="true"></i>Semua</a></li>
                    <li><a href="products.html"><i class="fa fa-arrow-right" aria-hidden="true"></i>Laundry</a></li>
                    <li><a href="products.html"><i class="fa fa-arrow-right" aria-hidden="true"></i>Kithcen</a></li>
                    <li><a href="products.html"><i class="fa fa-arrow-right" aria-hidden="true"></i>HouseKeeping</a></li>
                    <li><a href="products.html"><i class="fa fa-arrow-right" aria-hidden="true"></i>Pool Chemical</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-8 products-right">
            <div class="products-right-grid">
                <div class="products-right-grids">
                    <div class="sorting">
                        <select id="country" onchange="change_country(this.value)" class="frm-field required sect">
                            <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Default sorting</option>
                            <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sort by popularity</option>
                            <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sort by average rating</option>
                            <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sort by price</option>
                        </select>
                    </div>
                    <div class="sorting-left">
                        <select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
                            <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Item on page 9</option>
                            <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Item on page 18</option>
                            <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Item on page 32</option>
                            <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>All</option>
                        </select>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>

            <?php
            $index = 1;
            foreach ($produk as $p) :
                $a = $index % 3;
            ?>
                <div class="agile_top_brands_grids">
                    <div class="col-md-4 top_brand_left">
                        <div class="hover14 column">
                            <div class="agile_top_brand_left_grid">
                                <div class="agile_top_brand_left_grid_pos">
                                    <img src="<?= base_url('assets/pelanggan/') ?>images/offer.png" alt=" " class="img-responsive">
                                </div>
                                <div class="agile_top_brand_left_grid1">
                                    <figure>
                                        <div class="snipcart-item block">
                                            <div class="snipcart-thumb">
                                                <a href="single.html"><img title=" " alt=" " src="<?= base_url(); ?>uploads/produk/<?= $p['Foto'] ?>" class="img-responsive"></a>
                                                <p><?= $p['NamaProduk']; ?></p>
                                                <h4>Rp <?= number_format($p['Harga']); ?></h4>
                                                <h4>(<?= $p['Satuan'] . $index . $a; ?>) </h4>
                                            </div>
                                            <div class="snipcart-details top_brand_home_details">
                                                <form action="#" method="post">
                                                    <fieldset>
                                                        <input type="hidden" name="cmd" value="_cart">
                                                        <input type="hidden" name="add" value="1">
                                                        <input type="hidden" name="business" value=" ">
                                                        <input type="hidden" name="item_name" value="<?= $p['NamaProduk']; ?>">
                                                        <input type="hidden" name="amount" value="35.99">
                                                        <input type="hidden" name="discount_amount" value="1.00">
                                                        <input type="hidden" name="currency_code" value="USD">
                                                        <input type="hidden" name="return" value=" ">
                                                        <input type="hidden" name="cancel_return" value=" ">
                                                        <input type="submit" name="submit" value="Add to cart" class="button">
                                                    </fieldset>
                                                </form>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="<?php if ($a == 0) {
                                    echo 'clearfix';
                                } ?>"> </div>
                </div>
            <?php
                $index++;
            endforeach;
            ?>

        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!--- products --->