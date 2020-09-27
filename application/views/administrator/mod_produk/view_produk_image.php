        <div class="row">
            <div class="col-xs-7">
                <div class="box box-primary">
                    <div class="box-header">
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <?php foreach ($record as $val) { ?>
                                <div class="col-md-6">
                                    <img src="<?php echo base_url('asset/foto_produk/') . $val['gambar'] ?>" alt="" class="img-fluid" width="200">
                                    <a data-id="<?php echo $val['id_produk_image'] ?>" class="btn btn-danger btn-block btn-sm delete-produk-image"><i class="fa fa-trash"></i> Hapus</a>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-5">
                <div class="box box-primary">
                    <div class="box-header">
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?php echo base_url('administrator/produk_image') ?>" id="add-produk-image" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="produk-image" id="produk-image" required>
                                <input type=hidden class="form-control" name="id" id="id" value="<?php echo $this->uri->segment(3) ?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary btn-block">Add Image</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $('.delete-produk-image').click(function(e) {
                const kode = $(this).data('id');
                Swal.fire({
                    title: "Are you sure ?",
                    text: "Deleted data can not be restored!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: base_url + "administrator/delete_produk_image/" + kode,
                            type: "post",
                            success: function(data) {
                                window.location.reload();
                            }
                        })
                    }
                })
            })
        </script>