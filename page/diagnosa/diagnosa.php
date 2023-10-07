<!--Basic examples-->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA DIAGNOSA
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Nama Diagnosa</th>
                            <th>Diagnosa ICD10</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- php -->
                        <?php
                        $no=1;
                        $sql1=$koneksi->query("select*from tb_diagnosa");
                        while ($data=$sql1->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $data['kd_diagnosa'];?></td>
                                <td><?php echo $data['nm_diagnosa'];?></td>
                                <td><?php echo $data['diagnosaicd10'];?></td>
                                <td><?php echo $data['jenis'];?></td>
                                <td>
                                    <a href="?page=diagnosa&aksi=ubah&kd_diagnosa=<?php echo $data['kd_diagnosa'];?>" class="btn btn-succes"><img src="images/edit.ico" width="15" height="15" alt=""></a>
                                    <a onclick="return confirm ('Anda Yakin Ingin Menghapus Data Ini?')" href="?page=diagnosa&aksi=hapus&kd_diagnosa=<?php echo $data['kd_diagnosa'];?>" class="btn btn-danger"><img src="images/delete.ico" width="15" height="15" alt=""></a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                    </table>
                    <a href="?page=diagnosa&aksi=tambah" class="btn btn-primary"><img src="images/edit_add.png" width="15" height="15" alt="">Tambah</a>
                </div>
            </div>
        </div>
    </div>
</div>