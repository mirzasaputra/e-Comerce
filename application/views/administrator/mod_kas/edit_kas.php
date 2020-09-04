<div class="modal fade" id="editKasModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Data Kas</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('administrator/edit_kas') ?>" method="post">
                    <div class="form-group">
                        <label for="">Jenis</label>
                        <select name="jenis" id="jenis_kas" class="form-control" required>
                            <option value="Pemasukan">Pemasukan</option>
                            <option value="Pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nominal</label>
                        <input type="number" name="nominal" id="nominal" class="form-control" required autocomplete="off">
                        <input type="hidden" name="id_kas" id="id_kas" class="form-control" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <textarea name="keterangan" id="keterangan_kas" class="form-control" cols="30" rows="3" required></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->