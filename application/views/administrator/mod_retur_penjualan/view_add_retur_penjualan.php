<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
            </div><!-- /.box-header -->
            <div class="box-body">
                <form class="form-retur" method="post">


                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Kode Transaksi</label>
                            <div class="input-group">
                                <input type="hidden" class="form-control" id="id-penjualan" name="id-penjualan">
                                <input type="text" class="form-control" id="kode-transaksi" placeholder="Masukan Kode Transaksi">
                                <span class="input-group-btn">
                                    <button type="button" onclick="cariDataRetur()" class="btn btn-default btn-flat"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Customer</label>
                                <input type="text" class="form-control" id="nama-customer" placeholder="Nama Customer" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tanggal Transaksi</label>
                                <input type="text" class="form-control" id="tgl-transaksi" placeholder="Tanggal Transaksi" readonly>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Satuan</th>
                                        <th>Harga Produk</th>
                                        <th>Jumlah</th>
                                        <th>Diskon</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="produk-akan-retur">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nama Produk</label>
                                <input type="text" class="form-control" id="nama-produk" placeholder="Nama Produk" readonly>
                                <input type="hidden" class="form-control" id="id-produk" name="id-produk">
                                <input type="hidden" class="form-control" id="id-detail-jual" name="id-detail-jual">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Harga Jual</label>
                                <input type="text" class="form-control" id="harga-jual" name="harga-jual" placeholder="Harga Jual" readonly>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="text" class="form-control" name="qty-retur" id="qty-retur" placeholder="Qty">
                                <input type="hidden" class="form-control" name="qty-jual" id="qty-jual">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Kondisi</label>
                                <select name="kondisi" id="kondisi" class="select2 form-control">
                                    <option value="1">Rusak</option>
                                    <option value="2">Layak / Bagus</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Masuk Ke</label>
                                <select name="masuk-ke" id="masuk-ke" class="select2 form-control">
                                    <option value="1">Stok In</option>
                                    <option value="2">Stok Out</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2" style="margin-top:25px ;">
                            <button onclick="addRetur()" class="btn btn-default btn-block" type="button"><i class="fa fa-plus"></i> ADD</button>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Satuan</th>
                                        <th>Harga Produk</th>
                                        <th>Jumlah Retur</th>
                                        <th>Kondisi</th>
                                        <th>Opsi</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="daftar-retur">

                                </tbody>
                                <tfoot>
                                    <tr class='success'>
                                        <td colspan='7'><b>Total Retur </b></td>
                                        <td colspan="2"><b>Rp <b id="total-retur">0</b></b></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="form-group pull-right">
                        <button class="btn btn-danger" type="submit"><i class="fa fa-arrow-circle-left"></i> Kembali</button>
                        <button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Simpan Retur</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include 'script.php' ?>