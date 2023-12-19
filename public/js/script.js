
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
                $("#kelas_edit").val(data.kelas);
                $("#prodi_edit").val(data.prodi);
                $("#usernameMhs").val(data.username);
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
            url: 'http://localhost/mumetbolo_peminjamanruang_2d/public/admin/getUbahDosen/' + id,

            method: 'post',
            data : {id : id},
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $("#id_dosen_edit").val(data.id_dosen);
                $("#nip_edit").val(data.nip);
                $("#namaDsn_edit").val(data.nama);
                $("#jabatan_edit").val(data.jabatan);
                $("#prodiDsn_edit").val(data.prodi);
                $("#jkDosen_edit").val(data.jenis_kelamin);
                $("#tlpDosen_edit").val(data.no_tlp);
                $("#usernameDsn").val(data.username);
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
            url: 'http://localhost/mumetbolo_peminjamanruang_2d/public/admin/getUbahRuang/' + id,

            method: 'post',
            data : {id : id},
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $("#id_ruang_lama").val(data.id_ruang);
                $("#id_ruang_edit").val(data.id_ruang);
                $("#nama_rg_edit").val(data.nama_ruang);
                $("#jenis_rg_edit").val(data.jenis_ruang);
                $("#kapasitas_edit").val(data.kapasitas);
                $("#fasilitas_edit").val(data.fasilitas);
            },
            error: function (xhr, status, error) {
                console.log('Error: ' + error);
            }
        });
    });
    
    //User formPinjam
    $('.tampilFormPinjam').on('click', function () {
        const id_ruang = $(this).data('id_ruang');
        const id_jadwal = $(this).data('id_jadwal');

        const tgl = $(this).data('tgl');
        const status = $(this).data('status');


        $('#id_ruang').val(id_ruang);
        $('#id_jadwal').val(id_jadwal);
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date+' '+time;
        $('#tglSekarang').val(dateTime);
        $('#id_jadwal').val(id_jadwal);
    });

    //user tampil detail ruangan
    $('.tampilDetailRuang').on('click', function () {
        const id_ruang = $(this).data('id_ruang');
        const status = $(this).data('status');
        $('#ruangModal #status_ruang').text('Status: ' + status);

        $.ajax({
            url: 'http://localhost/mumetbolo_peminjamanruang_2d/public/mahasiswa/detailRuang/' + id_ruang,
            method: 'post',
            data : {id : id_ruang},
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#ruangModal #nama_ruang').text('Nama ruang: ' + data.nama_ruang);
                $('#ruangModal #lantai_ruang').text('Lantai: ' + data.lantai);
                $('#ruangModal #jenis_ruang').text('Jenis: ' + data.jenis_ruang);
                $('#ruangModal #fasilitas').text('Fasilitas: ' + data.fasilitas);
                $('#ruangModal #status').text('Status: ' + data.status);
            },
            error: function (xhr, status, error) {
                console.log('Error: ' + error);
            }
        });
    });

    //Alasan Penolakan
    $('.alasanPenolakan').on('click', function () {
        const pesan = $(this).data('pesan');
        const defaultPesan = 'Hahahah'; // Nilai default disetel sebagai 'Hahahah'
        const finalPesan = pesan || defaultPesan;
        $('#pesanPenolakanModal #alasan').text(finalPesan);
    });

    //admin tolak peminjaman
    $('.tolakPeminjaman').on('click', function () {
        const id_proses = $(this).data('id_proses');
        $("#tolak_id_proses").val(id_proses);
        const id_jadwal = $(this).data('id_jadwal');
        $("#tolak_id_jadwal").val(id_jadwal);
    });

    //admin acc peminjaman
    $('.accPeminjaman').on('click', function () {
        const id_proses = $(this).data('id_proses');
        $("#acc_id_proses").val(id_proses);
        const id_jadwal = $(this).data('id_jadwal');
        $("#acc_id_jadwal").val(id_jadwal);
    });

    //user tampil status ruangan

    $('.statusRg').each(function () {
        const idRuang = $(this).data('id_ruang');
        const tgl = $(this).data('tgl');

        $.ajax({
            url: 'http://localhost/mumetbolo_peminjamanruang_2d/public/mahasiswa/getStatusRg/' + idRuang + '/' + tgl,
            method: 'get',
            dataType: 'text',
            success: function (data) {
                console.log(data);
                $('.statusRg').text('Status: ' + data);
            },
            error: function (xhr, status, error) {
                console.log('Error fetching status ruangan:', error);
            }
        });
    });

    //admin tambah jadwal
    $('.tambahJadwal').on('click', function(){
        $.ajax({
            url: 'http://localhost/mumetbolo_peminjamanruang_2d/public/admin/getRuangAll',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var dropdown = $('#id_ruang');
                dropdown.empty();
                $.each(data, function (index, value) {
                    dropdown.append($('<option>').text(value.id_ruang).attr('value', value.id_ruang));
                });
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    })
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


            $('.grid').isotope({
                // options
                itemSelector: '.grid-item',
                layoutMode: 'fitRows'
              });

       