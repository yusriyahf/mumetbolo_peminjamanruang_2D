<?php
require "vendor/autoload.php"; // Tambahkan titik koma di sini

session_start();
// Referensi namespace Dompdf
use Dompdf\Dompdf;

// Instantiasi dan menggunakan kelas dompdf
$dompdf = new Dompdf();
$html = "<p style='text-align: center;line-height:0.1; '>KEMENTRIAN PENDIDIKAN, KEBUDAYAAN</p>";
$html .= "<img src='C:/xampp/htdocs/dasarWeb/dompdf/vendor/dompdf/dompdf/src/Image/logo2.png' style='position: absolute; top: 20px; left: 20px; width: 100px; height: auto;' />";
$html .= "<img src='C:/xampp/htdocs/dasarWeb/dompdf/vendor/dompdf/dompdf/src/Image/logowri.png' style='position: absolute; top: 20px; left: 570px; width: 100px; height: auto;' />";
$html .=       "<p style='text-align: center;line-height:0.1;font-size: 11; '>RISET, DAN TEKNOLOGI</p>";
$html .=       "<p style='text-align: center;line-height:0.5;font-size: 11;'>POLITEKNIK NEGERI MALANG</p>";
$html .=       "<p style='text-align: center;line-height:0.5;font-size: 11;'><b>WORKSHOP DAN RISET INFORMATIKA</b></p>";
$html .=       "<p style='text-align: center;line-height:0.5;font-size: 11;'>Jl. Soekarno Hatta No.9 Jatimulyo, Lowokwaru, Malang, 65141</p>";
$html .=       "<p style='text-align: center;line-height:0.5;font-size: 11;'>Telp(0341)404424-494425, Fax (0341) 404420,</p>";
$html .=       "<p style='text-align: center;line-height:0.5;font-size: 11;'>http://www.polinema.ac.id</p>";
$html .=       "<p style='text-align: center;line-height:0.01;'>_________________________________________________________________________________________</p>";
$html .= "<p style='text-align: left; font-size: 11; line-height: 0.5;'>
            <span style='display: inline-block;'>Nomor : 008/MTR/WRI/XI/2023</span>
            <span style='float: right;'>1 November 2023</span>
          </p>";
$html .=       "<p style='text-align: left;line-height:0.5;font-size: 11;'>Lampiran <span class='spacer'>:</span> -</p>";
$html .=       "<p style='text-align: left;line-height:0.5;font-size: 11;'>Hal <span class='spacer'>:</span> Peminjaman Gedung</p>";
$html .=       "<p style='text-align: left;line-height:2;font-size: 11;'>Yth. Ketua Jurusan Teknologi Informasi</p>";
$html .=       "<p style='padding-left: 30px;line-height:0.2;font-size: 11;'>Politeknik Negeri Malang</p>";
$html .=       "<p style='text-align: left;line-height:2;font-size: 11;'>Dengan hormat,</p>";
$html .=       "<p style='text-align: justify;line-height:1.5;font-size: 11;'>Tujuan</p>";
$html .=       "<p style='text-align: left;line-height:2;font-size: 11;'>Kegiatan ini akan diselenggarakan pada:</p>";
$html .=       "<p style='padding-left: 30px;line-height:0.2;font-size: 11;'>hari, tanggal&nbsp; : &nbsp; Rabu, 29 November 2023</p>";
$html .=       "<p style='padding-left: 30px;line-height:0.2;font-size: 11;'>pukul&nbsp;      :&nbsp; 18.00-22.00 WIB</p>";
$html .=       "<p style='padding-left: 30px;line-height:0.2;font-size: 11;'>tempat&nbsp;       :&nbsp; Ruang LKJ2, LKJ3, LPY4, LERP, LIG2, LAI1 dan LPR8 Lantai 7 </p>";
$html .=       "<p style='padding-left: 90px;line-height:0.2;font-size: 11;'>Gedung Sipil Politeknik Negeri Malang</p>";
$html .=       "<p style='text-align: justify;line-height:1.5;font-size: 11;'>Demikian surat peminjaman ini kami buat, atas izin dan bantuan yang diberikan kami sampaikan terima kasih</p>";
$html .=       "<p style='padding-left: 350;line-height:1.5;font-size: 11;'>Hormat kami,</p>";
$html .=       "<p style='padding-left: 350;line-height:0.2;font-size: 11;'>Humas Umum WRI</p>";
$html .=       "<p style='padding-left: 350;line-height:4;font-size: 11;'>Agilar Gumilar</p>";
$html .=       "<p style='padding-left: 350;line-height:0.001;font-size: 11;'>NIM 2141720106</p>";
$html .=       "<p style='text-align: center;line-height:1.5;font-size: 11; '>Mengetahui dan menyetujui,</p>";
$html .=        "<p style='font-size: 11; line-height: 1.5; text-align: left;'> 
                <span style='display: inline-block;'>Ketua Jurusan Teknologi Informasi,</span>
                <span style='float: right;'>Dosen Pembina WRI,</span>
                </p>";
$html .=       "<p style='font-size: 11; line-height: 1.5; text-align: left;'> 
                <span style='display: inline-block;line-height: 3;'>Dr. Eng Rosa Andrie Asmara, ST. MT.</span>
                <span style='float: right;line-height: 3;'>Putra Prima Arhandi, S.T.,M.Kom.</span>
                </p>";
$html .=       "<p style='font-size: 11; line-height: 1.5; text-align: left;'> 
                <span style='display: inline-block;'>NIP. 198010102005011001</span>
                <span style='float: right;'>NIP. 198611032014041001</span>
                </p>";
$html .=       "<p style='text-align: left;line-height:3;font-size: 11; '>Tembusan &nbsp; : &nbsp; 1. OB Gedung Teknik Sipil</p>";
$html .=       "<p style='padding-left: 66;line-height:0.5;font-size: 11; '>2. SATPAM</p>";
$html .=       "<p style='text-align: center;line-height:0.01;'>_________________________________________________________________________________________</p>";
$html .=       "<p style='text-align: left;line-height:0.5;font-size: 11;'>FRM.BAA.03.18.00</p>";


$dompdf->loadHtml($html);

// (Opsional) Setup ukuran kertas dan orientasi
$dompdf->setPaper('A4', 'potrait');

// Render HTML sebagai PDF
$dompdf->render();

// Output PDF yang dihasilkan ke Browser
$dompdf->stream("output.pdf", array('Attachment' => false));
