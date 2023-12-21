<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Surat Peminjaman</h1>
   <p class="mb-4">Proses Peminjaman Ruang Jurusan Teknik Informatika <b>POLINEMA</b></p>

   <!-- DataTales Example -->
   <div class="card shadow mb-4 col-md-11" method="post" action="#" id="printJS-form">
      <div class="container">
         <center>
            <div class="row text-center">
               <div class="col-2 card-body py-3 mb-0 d-flex mr-5 justify-content-center">
                  <img src="<?= BASEURL; ?>/img/polinema.png" height="100px" style="margin-top: 15">
               </div>
               <div class="col-7 card-body pb-2 mb-0 text-black text-center lh-0.2">
                  <p style='margin-top: 15;line-height:0.2;font-size:12; '> KEMENTERIAN PENDIDIKAN, KEBUDAYAAN</p>
                  <p style='line-height:0.2;font-size:12; '> RISET, DAN TEKNOLOGI</p>
                  <p style='line-height:0.2;font-size:12;'>POLITEKNIK NEGERI MALANG</p>
                  <p style='line-height:0.2;font-size:12;'><b>JURUSAN TEKNOLOGI INFORMASI</b></p>
                  <p style='line-height:0.2;font-size:12;'>Jl. Soekarno Hatta No.9 Jatimulyo, Lowokwaru, Malang, 65141</p>
                  <p style='line-height:0.2;font-size:12;'>Telp(0341)404424-494425, Fax (0341) 404420,</p>
                  <p style='line-height:0.2;font-size:12;'>http://www.polinema.ac.id</p>
               </div>
               <div class="col-1 card-body py-3 mb-0 d-flex ml-5 justify-content-center">
                  <img src="<?= BASEURL; ?>/img/jti.png" height="100px" style="margin-top: 15">
               </div>
            </div>
         </center>
         <hr size="100">
         <div class="card-body text-black">
            <p style='margin-top: 20;color:black; margin-left: 20; font-size:12;'>Nomor &nbsp; &nbsp; &nbsp; : -</p>
            <p style='margin-left: 20; font-size:12;color:black;'>Lampiran &nbsp; : -</p>
            <p style='margin-left: 20; font-size:12;color:black;color:black;'>Hal &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Peminjaman Gedung</p>
            <p style='margin-left: 20;line-height:0.5;margin-top: 50;color:black;font-size:12;'>Yth. Dr. Eng. Rosa Andrie Asmara, ST., MT.,</p>
            <p style='line-height:0.5;padding-left: 25px;margin-left: 20;color:black;font-size:12;'>Ketua Jurusan Teknologi Informasi</p>
            <p style='padding-left: 25px;line-height:0.5;margin-left: 20;color:black;font-size:12;'>Politeknik Negeri Malang</p>
            <p style='line-height:2;font-size:12;margin-left: 20;color:black;'>Dengan hormat,</p>
            <p style='line-height:1.5;font-size:12;margin-left: 20;color:black;margin-right: 20;'>Sehubungan akan dilaksanakanya kegiatan <?= $data['proses']['tujuan']; ?> dari <?= $data['proses']['instansi']; ?>
               kami mohon bantuan peminjaman ruangan <?= $data['proses']['nama_ruang']; ?>, Gedung Teknik Sipil Politeknik Negeri Malang beserta fasilitas yang ada didalamnya
               dan daya listrik digedung tersebut.</p>
            <p style='margin-top:20;line-height:0.2; font-size:12;color:black;margin-left: 20;'>Kegiatan ini akan diselenggarakan pada:</p>
            <p style='padding-left: 30px;line-height:0.2;color:black;font-size:12;margin-left: 20;'>tanggal&nbsp;&nbsp;&nbsp;: &nbsp; <?= $data['proses']['tgl_dipakai']; ?> </p>
            <p style='padding-left: 30px;line-height:2;color:black;font-size:12;margin-left: 20;'>tempat&nbsp;&nbsp;&nbsp; :&nbsp; <?= $data['proses']['nama_ruang'] ?>, Gedung Sipil Politeknik Negeri Malang</p>
            <p style='line-height:1.5;font-size:12;color:black;margin-left: 20;'>Demikian surat peminjaman ini kami buat, atas izin dan bantuan yang diberikan kami sampaikan terimakasih</p>
            <div class="container mt-20">
               <div class="row">
                  <div class="col">
                     <p style='font-size:12;margin-left: 20;'>Penanggung Jawab</p>
                     <br><br><br><br>
                     <p style='font-size:12;margin-left: 20;'> <?= $data['proses']['username']; ?></p>
                     <p style='font-size:12;margin-left: 20;'>NIM. : <?= $data['profil']['nim']; ?></p>
                  </div>
                  <div class="col">
                     <p style='font-size:12;margin-left: 20;'>Ketua Jurusan Teknologi Infromasi</p>
                     <br><br><br><br>
                     <p style='font-size:12;margin-left: 20;'>Dr. Eng. Rosa Andrie Asmara, ST., MT.,</p>
                     <p style='font-size:12;margin-left: 20;margin-top:0;'>NIP, : 198010102005011001</p>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>
   <div class="mr-2">
      <div class="mr-5">
         <div class="d-flex justify-content-end mr-5">
            <button type="button" class="btn btn-primary btn-sm col-md-1 " onclick="printJS('printJS-form', 'html')">
               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-printer-fill" viewBox="0 0 16 16">
                  <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1" />
                  <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
               </svg>
            </button>
         </div>
      </div>
   </div>
   <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->