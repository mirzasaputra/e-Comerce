<script>
    function detailPenjualan(e) {
        var html = '';
        $.ajax({
            url: base_url + "administrator/detail_penjualan/" + e,
            type: "post",
            success: function(data) {
                var obj = JSON.parse(data);
                for (var i = 0; i < obj.length; i++) {
                    html += '<tr><td>' + obj[i].nama_produk + '</td>' +
                        '<td>' + obj[i].harga_jual + '</td>' +
                        '<td>' + obj[i].jumlah + '</td>' +
                        '<td>' + obj[i].diskon + '</td>' +
                        '<td>' + obj[i].subtotal + '</td></tr>';
                }
                $('#detail_riwayat_konsumen').html(html);
                $('#detailRiwayatKonsumen').modal('show');
            }
        })
    }
</script>