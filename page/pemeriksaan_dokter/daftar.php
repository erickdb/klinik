<!--Basic examples-->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    LAPORAN REKAM MEDIS
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>tanggal periksa</th>
                            <th>No Rekam Medis</th>
                            <th>No Pasien</th>
                            <th>Nama Pasien</th>
                            <th>Berat Badan</th>
                            <th>Keluhan</th>
                            <th>Status Periksa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- php -->
                        <?php
                        $no=1;
                        $sql1=$koneksi->query("SELECT tgl_pemeriksaan,tb_rekam_medis.no_rm,tb_rekam_medis.no_pasien,nm_pasien,bb,keluhan,tb_rekam_medis.status FROM tb_pasien,tb_rekam_medis,tb_rekam_medis_detail3 WHERE tb_pasien.no_pasien=tb_rekam_medis.no_pasien AND tb_rekam_medis.no_rm=tb_rekam_medis_detail3.no_rm ORDER BY tb_rekam_medis.id DESC");
                        while ($data=$sql1->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $data['tgl_pemeriksaan'];?></td>
                                <td><?php echo $data['no_rm'];?></td>
                                <td><?php echo $data['no_pasien'];?></td>
                                <td><?php echo $data['nm_pasien'];?></td>
                                <td><?php echo $data['bb'];?></td>
                                <td><?php echo $data['keluhan'];?></td>
                                <td><?php echo $data['status'];?></td>
                                <td>
                                    <a href="?page=pemeriksaan_dokter&aksi=pemeriksaan_dokter&no_rm=<?php echo $data['no_rm'];?>" class="btn btn-danger">Lihat</a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>