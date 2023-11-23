$(document).ready(function () {
    $('.tampilModalUbah').on('click', function () {
        const id = $(this).data('id');
        $.ajax({
            url: '<?= BASEURL; ?>/admin/getMahasiswaById/' + id,
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id_mahasiswa);
                $('#nim').val(data.nim);
                $('#nama').val(data.nama);
                $('#jenis_kelamin').val(data.jenis_kelamin);
                $('#no_tlp').val(data.no_tlp);
                $('#alamat').val(data.alamat);
            }
        });
    });
});
