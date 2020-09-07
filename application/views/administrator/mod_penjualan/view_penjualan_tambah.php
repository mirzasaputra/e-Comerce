<div class="row">
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header">

            </div><!-- /.box-header -->
            <div class="box-body">
                <form method="post" class="form-add-item">
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="customer-check" onclick="customerCheck()"> Customer Umum
                            </label>
                        </div>
                    </div>
                    <div class="form-group customer-form">
                        <label>Customer</label>
                        <select name="customer" id="customer" onchange="selectPembeli()" class="form-control select2" data-placeholder="Pilih Customer" id="">
                            <?php foreach ($konsumen as $customer) { ?>
                                <option value="<?php echo $customer['id_konsumen'] ?>"><?php echo $customer['nama_lengkap'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Produk</label>
                        <select name="produk" id="produk" class="form-control select2" data-placeholder="Pilih Produk" onchange="selectProduk()">
                            <option value=""></option>
                            <?php foreach ($produk as $pr) { ?>
                                <option value="<?php echo $pr['id_produk'] ?>"><?php echo $pr['nama_produk'] ?></option>
                            <?php } ?>
                        </select>
                        <input type="hidden" name="satuan" id="satuan" class="form-control">
                        <input type="hidden" name="stok" id="stok" class="form-control">
                        <input type="hidden" name="id_pembeli" id="id_pembeli" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" name="harga" id="harga" readonly>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" name="qty" id="qty" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-sm btn-block" onclick="addItemJual()" type="button"><i class="fa fa-shopping-cart"></i> Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header">

            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Prodouk</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Diskon</th>
                            <th>Total</th>
                            <th style='width:70px'>Action</th>
                        </tr>
                    </thead>
                    <tbody id="data-item-jual">

                    </tbody>
                    <tfoot>

                        <tr class='success'>
                            <td colspan='4'><b>Subtotal </b></td>
                            <td colspan="2"><b>Rp <b id="sub-total">0</b></b></td>
                        </tr>
                        <tr class='success'>
                            <td colspan='4'><b>Diskon Total</b></td>
                            <td colspan="2"><b>Rp <b id="diskon-total">0</b></b></td>
                        </tr>
                        <tr class='success'>
                            <td colspan='4'><b>Grand Total </b></td>
                            <td colspan="2"><b>Rp <b id="grand-total">0</b></b></td>
                        </tr>
                    </tfoot>

                </table>
            </div>
            <div class="box-footer">
                <button class="btn btn-primary pull-right" onclick="checkoutPenjualan()" type="button"><i class="fa fa-check-square-o"></i> Checkout</button>
            </div>
        </div>
    </div>
</div>
<?php include 'view_edit_detail_penjualan.php' ?>
<?php include 'view_checkout.php' ?>
<?php include 'script.php' ?>