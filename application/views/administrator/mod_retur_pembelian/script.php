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
                url: base_url + "administrator/search_general_pembelian/" + kode,
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
                        $('#id-pembelian').val(data.id_pembelian);
                        $('#nama-supplier').val(data.nama_supplier);
                        $('#tgl-transaksi').val(data.waktu_beli);
                        loadDataAkanRetur(kode);
                    }
                }
            })
        }
    }

    function loadDataAkanRetur(kode) {
        var html = '';
        $.ajax({
            url: base_url + "administrator/produk_detail_akan_retur_pembelian/" + kode,
            type: "post",
            dataType: "json",
            success: function(result) {
                for (var i = 0; i < result.length; i++) {
                    html += '<tr><td>' + (i + 1) + '</td>' +
                        '<td>' + result[i].nama_produk + '</td>' +
                        '<td>' + result[i].satuan + '</td>' +
                        '<td>Rp. ' + result[i].harga_pesan + '</td>' +
                        '<td>' + result[i].jumlah_pesan + '</td>' +
                        '<td>Rp. ' + result[i].subtotal + '</td>' +
                        '<td><a class="btn btn-primary btn-xs" onclick="addProdukRetur(' + result[i].id_pembelian_detail + ')" title="Tambah Data"><span class="fa fa-check-square-o"></span></a></td></tr>';
                }
                $('#produk-akan-retur').html(html);
            }
        })
    }

    function loadDataRetur() {
        var html = '';
        $.ajax({
            url: base_url + "administrator/load_detail_retur_pembelian",
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
                        '<td><a class="btn btn-danger btn-xs" onclick="deleteProdukRetur(' + result[i].id_retur_pembelian_detail + ',' + result[i].id_pembelian_detail + ')" title="Hapus Data"><span class="fa fa-trash"></span></a></td></tr>';
                }
                $('#daftar-retur').html(html);
            }
        })
    }

    function addProdukRetur(e) {
        $.ajax({
            url: base_url + "administrator/select_produk_retur_pembelian/" + e,
            type: "post",
            dataType: "json",
            success: function(data) {
                $('#id-produk').val(data.id_produk);
                $('#id-detail-beli').val(data.id_pembelian_detail);
                $('#nama-produk').val(data.nama_produk);
                $('#harga-beli').val(data.harga_pesan);
                $('#qty-retur').val(data.jumlah_pesan);
                $('#qty-beli').val(data.jumlah_pesan);
            }
        })
    }


    function addRetur() {
        const qty_retur = $('#qty-retur').val();
        const qty_beli = $('#qty-beli').val();
        const data = $('.form-retur-beli').serialize();
        const kode = $('#kode-transaksi').val();
        if (qty_retur > qty_beli) {
            Swal.fire({
                title: "Oops!",
                text: "Jumlah Retur Tidak Boleh Lebih Besar Dari Jumlah Pembelian!",
                icon: "error",
            });
        } else {
            $.ajax({
                url: base_url + "administrator/tambah_detail_retur_pembelian",
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
            url: base_url + "administrator/get_total_retur_pembelian",
            type: "post",
            dataType: "json",
            success: function(data) {
                $('#total-retur').text(data.total_retur);
            }

        })
    }

    function deleteProdukRetur(e, i) {
        const kode = $('#kode-transaksi').val();
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
                    url: base_url + "administrator/delete_produk_retur_pembelian/" + e + '/' + i,
                    type: "post",
                    success: function(data) {
                        loadDataRetur();
                        loadDataAkanRetur(kode);
                        setTotalRetur();
                    }
                })
            }
        })
    }

    function simpanRetur() {
        const data = $('#id-pembelian').val();
        const table = document.getElementById('daftar-retur').rows.length;
        if (table == 0) {
            Swal.fire({
                title: "Oops!",
                text: "Tambahkan Produk Terlebih Dahulu Sebelum Disimpan!",
                icon: "error",
            });
        } else {
            Swal.fire({
                title: "Simpan Data Retur ?",
                text: "Produk retur pembelian akan tersimpan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, simpan!"
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: base_url + "administrator/simpan_retur_pembelian/" + data,
                        type: "post",
                        success: function(data) {
                            Swal.fire({
                                title: "Berhasil Disimpan!",
                                icon: "success",
                                confirmButtonColor: "#3085d6",
                                confirmButtonText: "Oke"
                            }).then((result) => {
                                if (result.value) {
                                    window.location.href = base_url + "administrator/retur_pembelian";
                                }
                            })
                        }
                    })
                }
            })
        }
    }

    function kembaliRetur() {
        const table = document.getElementById('daftar-retur').rows.length;
        if (table > 0) {
            Swal.fire({
                title: "Oops!",
                text: "Harap Simpan Retur Penjualan Terlebib Dahulu!",
                icon: "error",
            });
        } else {
            window.location.href = base_url + "administrator/retur_penjualan";
        }
    }

    function detailRetur(e) {
        var html = '';
        $.ajax({
            url: base_url + "administrator/detail_retur_pembelian/" + e,
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
                    html += '<tr>' +
                        '<td>' + result[i].nama_produk + '</td>' +
                        '<td>Rp. ' + result[i].harga_produk + '</td>' +
                        '<td>' + result[i].jumlah_retur + '</td>' +
                        '<td>Rp. ' + result[i].total_retur + '</td>' +
                        '<td>' + kondisi + '</td>' +
                        '<td>' + opsi + '</td>' +
                        '</tr>';
                }
                $('#detail-retur-pembelian').html(html);
                $('#detailReturPembelian').modal('show');
            }
        })
    }
</script>