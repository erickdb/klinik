<!--Basic examples-->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA PENGGUNA
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Nama pengguna</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- php -->
                        <?php
                        $no=1;
                        $sql1=$koneksi->query("select*from tb_pengguna");
                        while ($data=$sql1->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $data['username'];?></td>
                                <td><?php echo $data['nama'];?></td>
                                <td><?php echo $data['password'];?></td>
                                <td><?php echo $data['level'];?></td>
                                <td><?php echo $data['foto'];?></td>
                                <td>
                                    <a href="?page=pengguna&aksi=ubah&id=<?php echo $data['id'];?>" class="btn btn-succes"><img src="images/edit.ico" width="15" height="15" alt=""></a>
                                    <a onclick="return confirm ('Anda Yakin Ingin Menghapus Data Ini?')" href="?page=pengguna&aksi=hapus&pengguna=<?php echo $data['id'];?>" class="btn btn-danger"><img src="images/delete.ico" width="15" height="15" alt=""></a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                    </table>
                    <a href="?page=pengguna&aksi=tambah" class="btn btn-primary"><img src="images/edit_add.png" width="15" height="15" alt="">Tambah</a>
                </div>
            </div>
        </div>
    </div>
</div>