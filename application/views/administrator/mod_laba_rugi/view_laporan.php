<div class="row">
    <div class="col-lg-6">
        <div class="box box-primary">
            <div class="box-header">
                <h5>Laporan Laba Kotor</h5>
                <hr>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form action="<?php echo base_url('report/laba_kotor') ?>" method="get">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Awal</label>
                                <input type="text" name="from" class="form-control datepicker" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Akhir</label>
                                <input type="text" name="to" class="form-control datepicker" autocomplete="off" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-download"></i> Export</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="box box-primary">
            <div class="box-header">
                <h5>Laporan Laba Bersih</h5>
                <hr>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form action="<?php echo base_url('report/laba_bersih') ?>" method="get">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Awal</label>
                                <input type="text" name="from" class="form-control datepicker" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Akhir</label>
                                <input type="text" name="to" class="form-control datepicker" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Biaya Lain :</label>
                        <input type="number" required autocomplete="off" name="utility" class="form-control">
                        <small><i>Biaya listrik, produksi, dan lain-lain.</i></small>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-download"></i> Export</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>