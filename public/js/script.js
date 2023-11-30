
$(document).ready(function () {
    $('.tampilModalUbah').on('click', function () {
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost:8080/mumetbolo_peminjamanruang_2d/public/admin/getUbahMahasiswa/' + id,
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

    //update data dosen
    $('.tampilModalUbahDosen').on('click', function () {
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost:8080/mumetbolo_peminjamanruang_2d/public/admin/getUbahDosen/' + id,
            method: 'post',
            data : {id : id},
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $("#id_dosen_edit").val(data.id_dosen);
                $("#nip_edit").val(data.nip);
                $("#namaDsn_edit").val(data.nama);
                $("#jkDosen_edit").val(data.jenis_kelamin);
                $("#tlpDosen_edit").val(data.no_tlp);
                $("#alamatDsn_edit").val(data.alamat);
            },
            error: function (xhr, status, error) {
                console.log('Error: ' + error);
            }
        });
    });

    //update data ruangan
    $('.tampilModalUbahRuang').on('click', function () {
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost:8080/mumetbolo_peminjamanruang_2d/public/admin/getUbahRuang/' + id,
            method: 'post',
            data : {id : id},
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $("#id_ruang_edit").val(data.id_ruang);
                $("#nama_rg_edit").val(data.nama_ruang);
                $("#jenis_rg_edit").val(data.jenis_ruang);
                $("#kapasitas_edit").val(data.kapasitas);
                $("#fasilitas_edit").val(data.fasilitas);
                $("#status_edit").val(data.status);
            },
            error: function (xhr, status, error) {
                console.log('Error: ' + error);
            }
        });
    });
});

function updateClock() {
                var now = new Date();
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();

                // Formatting waktu menjadi HH:MM:SS
                var timeString = padZero(hours) + ":" + padZero(minutes) + ":" + padZero(seconds);

                // Memperbarui elemen dengan ID "clock" dengan waktu yang baru
                document.getElementById("clock").innerText = timeString;
            }

function padZero(number) {
                // Menambahkan nol di depan angka jika hanya satu digit
                return (number < 10) ? "0" + number : number;
            }

            // Memperbarui waktu setiap detik
setInterval(updateClock, 1000);

            // Memanggil fungsi updateClock untuk pertama kali saat halaman dimuat
            updateClock();


        

