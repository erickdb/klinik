<?php
    $kode=$_GET['no_rm'];
    $sql=$koneksi->query("SELECT tgl_pemeriksaan,tb_rekam_medis.no_rm,tb_rekam_medis.no_pasien,nm_pasien,bb,keluhan,tb,lp,suhu,td,ao,kol,glu,au,hb FROM tb_pasien,tb_rekam_medis,tb_rekam_medis_detail3 WHERE tb_pasien.no_pasien=tb_rekam_medis.no_pasien AND tb_rekam_medis.no_rm=tb_rekam_medis_detail3.no_rm and tb_rekam_medis.no_rm='$kode'");
    $tampil=$sql->fetch_assoc();

?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                    <form action="" method="post">
                        <div>
                            <label for="">No.ID</label>
                                <div class="row clearfix">
                                    <div class="col-md-2">
                                        <input type="text" name="kode" class="form-control" value="<?php echo $kode; ?>"></input>
                                    </div>
                                </div>
                        </div>
                    </form>
</div>
</div>
</div>
</div>
</div>
<?php
    if(isset($_POST['simpan'])){
        date_default_timezone_set('Asia/Jakarta');
        $date=date("Y-m-d H:i:s");
        $no_rm=$_POST['kode'];
        $nopasien=$_POST['no_pasien'];
        $kddokter=$_POST['dokter'];

        $pasien=$koneksi->query("select*from tb_pasien where no_pasien='$nopasien'");
        while($data_pasien=$pasien->fetch_assoch())
        {
            $status=$data_pasien['status'];
            if($status==0)
            {
                $koneksi->query("insert into tb_rekam_medis(no_rm,no_pasien,diagnosa,tgl_pemeriksaan,ket,status,statusobat,kd_dokter)values('$no_rm','$nopasien','-','$date','-','Dalam Antrian','Dalam Antrian','$kddokter')");
                $koneksi->query("update tb_pasien set status='A' where no_pasien='$nopasien'");
            }
        else
        {
            ?>
            <script type="text/javascript">
                alert("Nomor atau nama pasien sudah terdaftar");
                window.location.href="?page=rekam_medis&koderm=<?php echo $kode; ?>";
            </script>
            <?php
        }
        }
    }
?>

<form action="" method="post">
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
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Usia</th>
                            <th>Agama</th>
                            <th>No Telpon</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- php -->
                        <?php
                        $no=1;
                        $sql1=$koneksi->query("select tb_pasien.no_pasien,nm_pasien,j_kel,tgl_lhr,usia,agama,no_tlp,alamat from tb_pasien,tb_rekam_medis where tb_rekam_medis.no_pasien=tb_pasien.no_pasien AND no_rm='$kode'");
                        while ($data=$sql1->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $data['no_pasien'];?></td>
                                <td><?php echo $data['nm_pasien'];?></td>
                                <td><?php echo $data['j_kel'];?></td>
                                <td><?php echo $data['tgl_lhr'];?></td>
                                <td><?php echo $data['usia'];?></td>
                                <td><?php echo $data['agama'];?></td>
                                <td><?php echo $data['no_tlp'];?></td>
                                <td><?php echo $data['alamat'];?></td>
                                <td>
                                </td>
                            </tr>
                        <?php 
                        }
                        ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA PEMERIKSAAN <small>OLEH:DOKTER</small>
                </h2>
            </div>
            <div class="body">
                <form action="" method="post">

                        <label for="">1. Berat Badan ,Tinggi Badan ,Lingkar Perut ,Suhu Badan dan Tekanan Darah</label>
                        <div class="row clearfix">
                            <div class="col-sm-1">
                            <input type="text" name="txtbb" value="<?php echo $tampil['bb']?>" class="form-control"/>
                            </div>
                            <div class="col-sm-1">
                            <input type="text" name="txttb"  value="<?php echo $tampil['tb']?>" class="form-control"/>
                            </div>
                            <div class="col-sm-1">
                            <input type="text" name="txtlp"  value="<?php echo $tampil['lp']?>" class="form-control"/>
                            </div>
                            <div class="col-sm-1">
                            <input type="text" name="txtsuhu"  value="<?php echo $tampil['suhu']?>" class="form-control"/>
                            </div>
                            <div class="col-sm-1">
                            <input type="text" name="txttd"  value="<?php echo $tampil['td']?>" class="form-control"/>
                            </div>
                        </div>
                        <label for="">2. Alergi Obat ,Kolesterol ,Asam Urat ,Glukosa dan Hemoglobin</label>
                        <div class="row clearfix">
                            <div class="col-sm-1">
                            <input type="text" name="txtao" value="<?php echo $tampil['ao']?>" class="form-control"/>
                            </div>
                            <div class="col-sm-1">
                            <input type="text" name="txtkol"  value="<?php echo $tampil['kol']?>" class="form-control"/>
                            </div>
                            <div class="col-sm-1">
                            <input type="text" name="txtau"  value="<?php echo $tampil['au']?>" class="form-control"/>
                            </div>
                            <div class="col-sm-1">
                            <input type="text" name="txtglu"  value="<?php echo $tampil['glu']?>" class="form-control"/>
                            </div>
                            <div class="col-sm-1">
                            <input type="text" name="txthb"  value="<?php echo $tampil['hb']?>" class="form-control"/>
                            </div>
                            <div class="col-sm-1">
                            </div>
                        </div>
                        <label for="">3. Keluhan-Keluhan</label>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea name="" id="" rows="4" class="form-control no-resize" readonly>
                                            <?php echo $tampil['keluhan'];
                                            ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>