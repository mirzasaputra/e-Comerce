<script>
    function cariDataRetur() {
        const kode = $('#kode-transaksi').val();
        if (kode == '') {
            Swal.fire({
                title: "Oops!",
                text: "Kode Transaksi Harus Diisi!",
                icon: "error",
            });
        } else {
            $.ajax({
                url: base_url + "administrator/search_general_penjualan/" + kode,
                type: "post",
                dataType: "json",
                success: function(data) {
                    if (data == null) {
                        Swal.fire({
                            title: "Oops!",
                            text: "Data Tidak Ditemukan!",
                            icon: "error",
                        });
                    } else {
                        $('#id-penjualan').val(data.id_penjualan);
                        $('#nama-customer').val(data.nama_lengkap);
                        $('#tgl-transaksi').val(data.waktu_transaksi);
                        loadDataAkanRetur(kode);
                    }
                }
            })
        }
    }

    function loadDataAkanRetur(kode) {
        var html = '';
        $.ajax({
            url: base_url + "administrator/produk_detail_akan_retur/" + kode,
            type: "post",
            dataType: "json",
            success: function(result) {
                for (var i = 0; i < result.length; i++) {
                    html += '<tr><td>' + (i + 1) + '</td>' +
                        '<td>' + result[i].nama_produk + '</td>' +
                        '<td>' + result[i].satuan + '</td>' +
                        '<td>Rp. ' + result[i].harga_jual + '</td>' +
                        '<td>' + result[i].jumlah + '</td>' +
                        '<td>' + result[i].diskon + '</td>' +
                        '<td>Rp. ' + result[i].subtotal + '</td>' +
                        '<td><a class="btn btn-primary btn-xs" onclick="addProdukRetur(' + result[i].id_penjualan_detail + ')" title="Tambah Data"><span class="fa fa-check-square-o"></span></a></td></tr>';
                }
                $('#produk-akan-retur').html(html);
            }
        })
    }

    function loadDataRetur() {
        var html = '';
        $.ajax({
            url: base_url + "administrator/load_detail_retur",
            type: "post",
            dataType: "json",
            success: function(result) {
                for (var i = 0; i < result.length; i++) {
                    var kondisi = '';
                    var opsi = '';
                    if (result[i].kondisi == 1) {
                        kondisi = "Rusak";
                    } else if (result[i].kondisi == 2) {
                        kondisi = "Layak / Bagus";
                    }
                    if (result[i].opsi == 1) {
                        opsi = "Stok In";
                    } else if (result[i].opsi == 2) {
                        opsi = "Stok Out";
                    }
                    html += '<tr><td>' + (i + 1) + '</td>' +
                        '<td>' + result[i].nama_produk + '</td>' +
                        '<td>' + result[i].satuan + '</td>' +
                        '<td>Rp. ' + result[i].harga_produk + '</td>' +
                        '<td>' + result[i].jumlah_retur + '</td>' +
                        '<td>' + kondisi + '</td>' +
                        '<td>' + opsi + '</td>' +
                        '<td>Rp. ' + result[i].total_retur + '</td>' +
                        '<td><a class="btn btn-danger btn-xs" onclick="deleteProdukRetur(' + result[i].id_retur_penjualan_detail + ')" title="Hapus Data"><span class="fa fa-trash"></span></a></td></tr>';
                }
                $('#daftar-retur').html(html);
            }
        })
    }

    function addProdukRetur(e) {
        $.ajax({
            url: base_url + "administrator/select_produk_retur/" + e,
            type: "post",
            dataType: "json",
            success: function(data) {
                $('#id-produk').val(data.id_produk);
                $('#id-detail-jual').val(data.id_penjualan_detail);
                $('#nama-produk').val(data.nama_produk);
                $('#harga-jual').val(data.harga_jual);
                $('#qty-retur').val(data.jumlah);
                $('#qty-jual').val(data.jumlah);
            }
        })
    }


    function addRetur() {
        const qty_retur = $('#qty-retur').val();
        const qty_jual = $('#qty-jual').val();
        const data = $('.form-retur').serialize();
        const kode = $('#kode-transaksi').val();
        if (qty_retur > qty_jual) {
            Swal.fire({
                title: "Oops!",
                text: "Jumlah Retur Tidak Boleh Lebih Besar Dari Jumlah Pembelian!",
                icon: "error",
            });
        } else {
            $.ajax({
                url: base_url + "administrator/tambah_detail_retur",
                type: "post",
                data: data,
                success: function(data) {
                    loadDataRetur();
                    loadDataAkanRetur(kode);
                    setTotalRetur();
                }

            })
        }
    }

    function setTotalRetur() {
        $.ajax({
            url: base_url + "administrator/get_total_retur",
            type: "post",
            dataType: "json",
            success: function(data) {
                $('#total-retur').text(data.total_retur);
            }

        })
    }
</script>