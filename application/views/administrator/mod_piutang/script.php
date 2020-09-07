<script>
    function hapusPembayaranPiutang(e) {
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
                    url: base_url + "administrator/delete_detail_piutang/" + e,
                    type: "post",
                    success: function(data) {
                        window.location.reload();
                    }
                })
            }
        })
    }

    function detailPay(e) {
        var html = '';
        $.ajax({
            url: base_url + "administrator/detail_payment_piutang/" + e,
            type: "post",
            success: function(data) {
                var obj = JSON.parse(data);
                for (var i = 0; i < obj.length; i++) {
                    html += '<tr><td>' + obj[i].nama_lengkap + '</td>' +
                        '<td>' + obj[i].tgl_bayar + '</td>' +
                        '<td> Rp. ' + obj[i].nominal + '</td></tr>';
                }
                $('#detailPiutang').modal('show');
                $('#detail_piutang').html(html);
            }
        })
    }
</script>