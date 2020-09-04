<script>
    function selectProduk() {
        const produk = $('#produk').val();
        $.ajax({
            url: "<?php echo base_url() ?>administrator/detail_stok_produk/" + produk,
            type: "post",
            success: function(data) {
                var obj = JSON.parse(data);
                $('#harga').val(obj.harga_beli);
                $('#stok').val(obj.stok);
            }
        })
    }
</script>