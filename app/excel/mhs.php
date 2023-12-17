<?php
    // convert file ke bentuk excel
    header("Content-type:application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Mahasiswa.xls");
?>

<h3>DATA MAHASISWA</h3>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telp</th>
                            <th>Kelas</th>
                            <th>Prodi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telp</th>
                            <th>prodi</th>
                            <th>Action</th>
                        </tr>
                    </tfoot> -->
                    <tbody>
                        <tr>
                                    <td><?php echo $mhs['nim']; ?></td>
                                    <td><?php echo $mhs['nama']; ?></td>
                                    <td><?php echo $mhs['jenis_kelamin']; ?></td>
                                    <td><?php echo $mhs['no_tlp']; ?></td>
                                    <td><?php echo $mhs['kelas']; ?></td>
                                    <td><?php echo $mhs['prodi']; ?></td>
                                    
                                    
                                </tr>
                    </tbody>
                </table>