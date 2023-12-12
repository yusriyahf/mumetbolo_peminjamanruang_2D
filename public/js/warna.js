function setCardClasses() {
    var ruangCards = document.querySelectorAll(".ruang-card");

    ruangCards.forEach(function(card) {
        var status = card.getAttribute("data-status");

        switch (status) {
            case "tersedia":
                card.classList.add("bg-success");
                break;
            case "dipakai":
                card.classList.add("bg-danger");
                break;
            case "dibooking":
                card.classList.add("bg-secondary");
                break;
            case "diacc":
                card.style.backgroundColor = "rgb(52, 52, 52)";                
                // card.classList.add("bg-dark");
                break;
            default:
                card.classList.add("bg-primary");
                break;
        }
    });
}

document.addEventListener("DOMContentLoaded", function() {
    setCardClasses();
});



    document.addEventListener("DOMContentLoaded", function() {
        var statusCells = document.querySelectorAll(".status-cell");

        statusCells.forEach(function(cell) {
            var status = cell.textContent.trim();

            switch (status) {
                case 'tersedia':
                    cell.classList.add('text-success');
                    break;
                case 'dipakai':
                    cell.classList.add('text-danger');
                    break;
                case 'dibooking':
                    cell.classList.add('text-secondary-emphasis');
                    break;
                case 'diacc':
                    cell.classList.add('text-black');
                    break;
                default:
                    break;
            }
        });
    });

    // $(document).ready(function () {
    //     // Menangkap acara tampilan modal
    //     $('#ruangModal').on('show.bs.modal', function (event) {
    //         var button = $(event.relatedTarget); // Tombol yang membuka modal
    //         var nama_ruang = button.data('nama'); // Ambil data dari atribut data-nama
    //         var status_ruang = button.data('status'); // Ambil data dari atribut data-status
    //         var lantai_ruang = button.data('lantai'); // Ambil data dari atribut data-status
    //         var jenis_ruang = button.data('jenis_ruang'); // Ambil data dari atribut data-status
    //         var fasilitas = button.data('fasilitas'); // Ambil data dari atribut data-status
    //         var kapasitas = button.data('kapasitas'); // Ambil data dari atribut data-status

    //         // Setel data ke dalam elemen modal
    //         $('#ruangModal #nama_ruang').text('Nama ruang: ' + nama_ruang);
    //         $('#ruangModal #status_ruang').text('Status: ' + status_ruang);
    //         $('#ruangModal #lantai_ruang').text('Lantai: ' + lantai_ruang);
    //         $('#ruangModal #jenis_ruang').text('Jenis: ' + jenis_ruang);
    //         $('#ruangModal #fasilitas').text('Fasilitas: ' + fasilitas);
    //         $('#ruangModal #kapasitas').text('kapasitas: ' + fasilitas);
    //         // Tambahkan elemen lain atau modifikasi sesuai kebutuhan

    //         // Anda dapat menambahkan elemen lain yang akan menampilkan data lainnya
    //     });
    // });

