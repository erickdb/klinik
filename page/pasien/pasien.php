<!--Basic examples-->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA PASIEEN
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>Pekerjaan</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Usia</th>
                            <th>No Telpon</th>
                            <th>foto</th>
                            <th>Status</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- php -->
                        <?php
                        $no=1;
                        $sql1=$koneksi->query("select*from tb_pasien");
                        while ($data=$sql1->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $data['no_pasien'];?></td>
                                <td><?php echo $data['nm_pasien'];?></td>
                                <td><?php echo $data['j_kel'];?></td>
                                <td><?php echo $data['pekerjaan'];?></td>
                                <td><?php echo $data['agama'];?></td>
                                <td><?php echo $data['alamat'];?></td>
                                <td><?php echo $data['tgl_lhr'];?></td>
                                <td><?php echo $data['usia'];?></td>
                                <td><?php echo $data['no_tlp'];?></td>
                                <td><?php echo $data['foto'];?></td>
                                <td><?php echo $data['status'];?></td>
                                <td><?php echo $data['tgldaftar'];?></td>
                                <td>
                                    <a href="?page=pasien&aksi=ubah&no_pasien=<?php echo $data['no_pasien'];?>" class="btn btn-succes"><img src="images/edit.ico" width="15" height="15" alt=""></a>
                                    <a onclick="return confirm ('Anda Yakin Ingin Menghapus Data Ini?')" href="?page=pasien&aksi=hapus&no_pasien=<?php echo $data['no_pasien'];?>" class="btn btn-danger"><img src="images/delete.ico" width="15" height="15" alt=""></a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                    </table>
                    <a href="?page=pasien&aksi=tambah" class="btn btn-primary"><img src="images/edit_add.png" width="15" height="15" alt="">Tambah</a>
                </div>
            </div>
        </div>
    </div>
</div>