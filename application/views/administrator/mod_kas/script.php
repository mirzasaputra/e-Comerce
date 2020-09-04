<script>
    function addKas() {
        $('#addKasModal').modal('show');
    }

    function editKas(e) {
        $.ajax({
            url: "<?php echo base_url() ?>administrator/detail_kas/" + e,
            type: "post",
            dataType: "json",
            success: function(data) {
                $('#id_kas').val(data.id_kas);
                $('#nominal').val(data.nominal);
                $('#jenis_kas').val(data.jenis);
                $('#keterangan_kas').val(data.keterangan);
                $('#editKasModal').modal('show');
            }
        })
    }
</script>