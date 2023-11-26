$(document).ready(function () {
    $('.tampilModalUbah').on('click', function () {
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/mumetbolo_peminjamanruang_2d/public/admin/getUbahMahasiswa/' + id,
            method: 'post',
            data : {id : id},
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $("#id_mahasiswa_edit").val(data.id_mahasiswa);
                $("#nim_edit").val(data.nim);
                $("#nama_edit").val(data.nama);
                $("#jenis_kelamin_edit").val(data.jenis_kelamin);
                $("#no_tlp_edit").val(data.no_tlp);
                $("#alamat_edit").val(data.alamat);
            },
            error: function (xhr, status, error) {
                console.log('Error: ' + error);
            }
        });
    });
});
