<script type="text/javascript">
    $('input:radio[name="metode"]').on('change', function() {
        if ($(this).is(':checked') && $(this).val() == "Cash") {
            $('.jatuh-tempo').hide();
        } else if ($(this).is(':checked') && $(this).val() == "Kredit") {
            $('.jatuh-tempo').show();
        }
    });

    function selectPembeli() {

        const pembeli = $('#customer').val();
        $('#id_pembeli').val(pembeli);
    }

    function customerCheck() {
        var check = document.getElementById('customer-check');
        if (check.checked == true) {
            $('.customer-form').hide();
            $('#id_pembeli').val('');
        } else if (check.checked == false) {
            $('.customer-form').show();
        }
    }

    function selectProduk() {
        const produk = $('#produk').val();
        const check = document.getElementById('customer-check');
        const customer = $('#customer').val();
        $.ajax({
            url: base_url + "administrator/detail_produk/" + produk,
            type: "post",
            success: function(data) {
                var obj = JSON.parse(data);
                $('#satuan').val(obj.satuan);
                $('#stok').val(obj.stok);
                if (obj.stok == 0) {
                    Swal.fire({
                        title: "Oops!",
                        text: "Stok Produk Yang Anda Pilih Kosong!",
                        icon: "error",
                    });
                } else {

                    if (check.checked == true) {

                        $('#harga').val(obj.harga_konsumen);

                    } else if (check.checked == false) {
                        $.ajax({
                            url: base_url + "administrator/detail_customer/" + customer,
                            type: "post",
                            dataType: "json",
                            success: function(result) {
                                console.log(result);
                                if (result.tipe == "Konsumen") {
                                    $('#harga').val(obj.harga_konsumen);
                                } else if (result.tipe == "Reseller") {
                                    $('#harga').val(obj.harga_reseller);
                                }
                            }
                        });

                    }
                }
            }
        });
    }

    function addItemJual() {
        var data = $('.form-add-item').serialize();
        const stok = $('#stok').val();
        const qty = $('#qty').val();
        const produk = $('#produk').val();
        if (produk == '') {
            Swal.fire({
                title: "Oops!",
                text: "Pilih Produk Terlebih Dahulu!",
                icon: "error",
            });
        } else {

            if (qty == '') {
                Swal.fire({
                    title: "Oops!",
                    text: "Jumlah Produk Harus Diisi!",
                    icon: "error",
                });
            } else {

                if (qty > stok) {
                    Swal.fire({
                        title: "Oops!",
                        text: "Jumlah Produk Melebihi Stok!",
                        icon: "error",
                    });
                } else {

                    $.ajax({
                        url: base_url + "administrator/additemjual",
                        type: "post",
                        data: data,
                        success: function(data) {
                            var obj = JSON.parse(data);
                            $('#grand-total').html(obj.total);
                            $('#sub-total').html(obj.subtotal);
                            loadItemBeli();
                        }
                    });
                }
            }
        }
    }

    function loadItemBeli() {
        var html = '';
        $.ajax({
            url: base_url + "administrator/load_item_jual",
            type: "post",
            dataType: "json",
            success: function(data) {
                for (var i = 0; i < data.length; i++) {
                    html += "<tr><td>" + data[i].nama_produk + "</td>" +
                        "<td>" + data[i].harga_jual + "</td>" +
                        "<td>" + data[i].jumlah + "</td>" +
                        "<td>" + data[i].diskon + "</td>" +
                        "<td>" + data[i].subtotal + "</td>" +
                        "<td><a class='btn btn-primary btn-xs' onclick='editItemJual(" + data[i].id_penjualan_detail + ")' title='Edit Data'><span class='glyphicon glyphicon-edit'></span></a> \n\ <a class='btn btn-danger btn-xs'  onclick='hapusItemJual(" + data[i].id_penjualan_detail + ")' title='Hapus Data'><span class='glyphicon glyphicon-remove'></span></a></td>"

                }
                $('#data-item-jual').html(html);
            }
        })
    }

    function hapusItemJual(e) {
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
                    url: base_url + "administrator/del_item_jual/" + e,
                    type: "post",
                    success: function(data) {
                        loadItemBeli();
                        var obj = JSON.parse(data);
                        if (obj.subtotal != null || obj.total != 0 || obj.diskon != 0) {
                            $('#grand-total').text(obj.total);
                            $('#sub-total').text(obj.subtotal);
                            $('#diskon-total').text(obj.diskon);
                        } else {
                            $('#grand-total').text(0);
                            $('#sub-total').text(0);
                            $('#diskon-total').text(0);
                        }
                    }
                })
            }
        })
    }

    function editItemJual(e) {
        $.ajax({
            url: base_url + "administrator/detail_item_jual/" + e,
            type: "post",
            success: function(data) {
                var obj = JSON.parse(data);
                $('#iddetiljual').val(obj.id_penjualan_detail);
                $('#iddetilbarang').val(obj.id_produk);
                $('#namadetilitem').val(obj.nama_produk);
                $('#hargadetilitem').val(obj.harga_jual);
                $('#detilqty').val(obj.jumlah);
                $('#hideqty').val(obj.jumlah);
                $('#detildiskonitem').val(obj.diskon);
                $('#detiltotalitem').val(obj.subtotal);

            }
        });
        $('#editDetilModal').modal('show');
    }

    function editDetilJual() {
        var data = $('.form-edit-detil-jual').serialize();
        $.ajax({
            url: base_url + "administrator/edit_detail_penjualan",
            type: "post",
            data: data,
            dataType: "json",
            success: function(data) {
                loadItemBeli();
                if (data.subtotal != null || data.total != 0 || data.diskon != 0) {
                    $('#grand-total').text(data.total);
                    $('#sub-total').text(data.subtotal);
                    $('#diskon-total').text(data.diskon);
                } else {
                    $('#grand-total').text(0);
                    $('#sub-total').text(0);
                    $('#diskon-total').text(0);
                }

            }
        });
    }

    $(function() {

        var qty = $('#detilqty');
        var diskon = $('#detildiskonitem');
        var subtotal = $('#detiltotalitem');
        var peritem = $('#hargadetilitem');
        qty.keyup(function() {
            var jum = document.getElementById('detilqty').value;
            if (jum == null) {
                subtotal.val(subtotal.val());
            } else {
                var total = peritem.val() * qty.val() - diskon.val();
                subtotal.val(total);
            }
        });
        diskon.keyup(function() {
            var disk = document.getElementById('detildiskonitem').value;
            if (disk == null) {
                subtotal.val(subtotal.val());
            } else {
                var total = peritem.val() * qty.val() - diskon.val();
                subtotal.val(total);
            }
        })

        var grand = $('#grandtotal');
        var bayar = $('#bayar');
        bayar.keyup(function() {
            var byr = document.getElementById('bayar').value;
            if (byr == null) {
                var nilai = 0;
                byr = nilai;
            } else {
                var hasil = bayar.val() - grand.val();
                $('#kembali').val(hasil);
            }
        })
    })

    function checkoutPenjualan() {
        const table = document.getElementById('data-item-jual').rows.length;
        if (table == 0) {
            Swal.fire({
                title: "Oops!",
                text: "Silakan Pilih Produk Terlebih Dahulu!",
                icon: "error",
            });
        } else {
            const pembeli = $('#id_pembeli').val();
            if (pembeli == '') {
                $('#kredit').attr('disabled', 'disabled');
            } else {
                $('#kredit').removeAttr('disabled');

            }
            $.ajax({
                url: base_url + "administrator/data_checkout",
                type: "post",
                dataType: "json",
                success: function(data) {
                    $('#diskon1').val(data.diskon);
                    $('#subtot').html(data.subtotal);
                    $('#subtotal').val(data.subtotal);
                    $('#grandtotal').val(data.total);
                    $('#nominal').val(data.total);
                    $('#idpembeli').val(pembeli);

                }
            });
            $('#pembayaranModal').modal('show');
        }
    }

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
                $('#detail_penjualan').html(html);
                $('#detailPenjualanModal').modal('show');
            }
        })
    }
</script>