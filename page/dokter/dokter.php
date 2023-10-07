<!--Basic examples-->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA DOKTER
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Telpon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- php -->
                        <?php
                        $no=1;
                        $sql1=$koneksi->query("select*from tb_dokter");
                        while ($data=$sql1->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $data['kd_dokter'];?></td>
                                <td><?php echo $data['nm_dokter'];?></td>
                                <td><?php echo $data['tmp_lhr'];?></td>
                                <td><?php echo $data['tlp'];?></td>
                                <td><?php echo $data['alamat'];?></td>
                                <td>
                                    <a href="?page=dokter&aksi=ubah&kd_dokter=<?php echo $data['kd_dokter'];?>" class="btn btn-succes"><img src="images/edit.ico" width="15" height="15" alt=""></a>
                                    <a onclick="return confirm ('Anda Yakin Ingin Menghapus Data Ini?')" href="?page=dokter&aksi=hapus&kd_dokter=<?php echo $data['kd_dokter'];?>" class="btn btn-danger"><img src="images/delete.ico" width="15" height="15" alt=""></a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                    </table>
                    <a href="?page=dokter&aksi=tambah" class="btn btn-primary"><img src="images/edit_add.png" width="15" height="15" alt="">Tambah</a>
                    <a href="page/dokter/cetak.php" class="btn btn-primary"><img src="images/print.ico" width="15" height="15" alt="">Print</a>
                </div>
            </div>
        </div>
    </div>
</div>