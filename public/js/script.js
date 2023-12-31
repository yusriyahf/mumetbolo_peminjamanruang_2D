
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

    //update data jadwal
    $('.tampilModalUbahJadwal').on('click', function () {
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/mumetbolo_peminjamanruang_2d/public/admin/getUbahJadwal/' + id,

            method: 'post',
            data : {id : id},
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $("#id_jadwal").val(data.id_jadwal);
                $("#id_ruang_edit_input").val(data.id_ruang);
                $("#jenis_kegiatan_edit").val(data.jenis_kegiatan);
                $("#tgl_mulai_edit").val(data.tgl_mulai);
                $("#tgl_selesai_edit").val(data.tgl_selesai);
                $("#hari_edit").val(data.hari);
                $("#keterangan_edit").val(data.keterangan)
            },
            error: function (xhr, status, error) {
                console.log('Error: ' + error);
            }
        });
    });

    //update data ruang
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
                $("#arah_edit").val(data.arah);
                $("#kapasitas_edit").val(data.kapasitas);
                $("#gambarLama").attr('src', 'http://localhost/mumetbolo_peminjamanruang_2d/public/imgRuang/' + data.gambar);
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
                $('#ruangModal #status').text('Status: ' + data.status);
                $('#ruangModal #gambar_ruang').attr('src', 'http://localhost/mumetbolo_peminjamanruang_2d/public/imgRuang/' + data.gambar);
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
        $("#id_proses_tolak").val(id_proses);
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


//EXPORT KE EXCEL :
    $('#dataTablemhs').DataTable({
        dom: 'B',
        buttons: [{
            extend: 'excel',
            text: 'Ekspor ke Excel',
            filename: function () {
                return 'Data_Mahasiswa'; // Nama file Excel disetel di sini
            },
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6], // Kolom yang ingin diexport ke Excel
                orthogonal: 'export' // Mencegah kolom "Action" ikut terkonversi
            },
            customize: function (xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
    
                // Loop through all rows and columns
                $('row c', sheet).each(function () {
                    $(this).attr('s', '25'); // Set border style to thin
                });
            }
        }]
    });
    
    var excelButton = $('.buttons-excel');
    excelButton.addClass('d-none d-sm-inline-block btn btn-sm btn-success shadow-sm tambah');
    excelButton.css('margin-bottom', '15px');
    
    $('#dataTabledosen').DataTable({
        dom: 'B',
        buttons: [{
            extend: 'excel',
            text: 'Ekspor ke Excel',
            filename: function () {
                return 'Data_Dosen'; // Nama file Excel disetel di sini
            },
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6], // Kolom yang ingin diexport ke Excel
                orthogonal: 'export' // Mencegah kolom "Action" ikut terkonversi
            },
            customize: function (xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
    
                // Loop through all rows and columns
                $('row c', sheet).each(function () {
                    $(this).attr('s', '25'); // Set border style to thin
                });
            }
        }]
    });
    
    var excelButton = $('.buttons-excel');
    excelButton.addClass('d-none d-sm-inline-block btn btn-sm btn-success shadow-sm tambah');
    excelButton.css('margin-bottom', '15px');

    $('#dataTablejadwal').DataTable({
        dom: 'B',
        buttons: [{
            extend: 'excel',
            text: 'Ekspor ke Excel',
            filename: function () {
                return 'Tabel_Jadwal'; // Nama file Excel disetel di sini
            },
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6], // Kolom yang ingin diexport ke Excel
                orthogonal: 'export' // Mencegah kolom "Action" ikut terkonversi
            },
            customize: function (xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
    
                // Loop through all rows and columns
                $('row c', sheet).each(function () {
                    $(this).attr('s', '25'); // Set border style to thin
                });
            }
        }]
    });
    
    var excelButton = $('.buttons-excel');
    excelButton.addClass('d-none d-sm-inline-block btn btn-sm btn-success shadow-sm tambah');
    excelButton.css('margin-bottom', '15px');

    $('#dataTablehistori').DataTable({
        dom: 'B',
        buttons: [{
            extend: 'excel',
            text: 'Ekspor ke Excel',
            filename: function () {
                return 'Data_Histori_Peminjaman'; // Nama file Excel disetel di sini
            },
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6], // Kolom yang ingin diexport ke Excel
                orthogonal: 'export' // Mencegah kolom "Action" ikut terkonversi
            },
            customize: function (xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
    
                // Loop through all rows and columns
                $('row c', sheet).each(function () {
                    $(this).attr('s', '25'); // Set border style to thin
                });
            }
        }]
    });
    
    var excelButton = $('.buttons-excel');
    excelButton.addClass('d-none d-sm-inline-block btn btn-sm btn-success shadow-sm tambah');
    excelButton.css('margin-bottom', '15px');
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

       