<?php
    $kode=$_GET['koderm'];
?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                    <form action="" method="post">
                        <div>
                            <label for="">No.Rekam Medis</label>
                                <div class="row clearfix">
                                    <div class="col-md-2">
                                        <input type="text" name="kode" class="form-control" value="<?php echo $kode; ?>"></input>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="no_pasien" id="no_pasien" class="form-control" data-toggle="modal" data-target="#myModal" required=""></input>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" value="cari pasien" name="simpan" class="btn btn-primary"></input>
                                    </div>
                                </div>
                                <label for="">Pilih Dokter</label>
                                    <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <select name="dokter" id="" class="form-control show-tick">
                                            <?php
                                                $lbl='<option value=""> - Pilih Dokter - </option>';
                                                    $dokter=$koneksi->query("select * from tb_dokter order by kd_dokter");

                                                    while ($d_dokter=$dokter->fetch_assoc()){
                                                        echo "<option value='$d_dokter[kd_dokter]'>$d_dokter[nm_dokter]</option>";
                                                    }
                                            ?>
                                        </select>
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

        $koneksi_show_rekam_medis = new mysqli("localhost", "root", "", "db_abc");
        $pasien=$koneksi_show_rekam_medis->query("select*from tb_pasien where no_pasien='$nopasien'");                
        while($data_pasien = $pasien->fetch_assoc())
        {
            $status=$data_pasien['status'];
            if($status==0)
            {
                $koneksi_show_rekam_medis->query("insert into tb_rekam_medis(no_rm,no_pasien,diagnosa,tgl_pemeriksaan,ket,status,statusobat,kd_dokter)values('$no_rm','$nopasien','-','$date','-','Dalam Antrian','Dalam Antrian','$kddokter')");
                $koneksi_show_rekam_medis->query("update tb_pasien set status='A' where no_pasien='$nopasien'");
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
                    DATA PASIEN
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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- php -->
                        <?php
                        $no=1;
                        $sql1=$koneksi->query("select tb_pasien.no_pasien,tb_pasien.nm_pasien,tb_pasien.j_kel,tb_pasien.tgl_lhr,tb_pasien.usia,tb_pasien.agama,tb_pasien.no_tlp,tb_pasien.alamat,tb_rekam_medis.no_rm from tb_pasien,tb_rekam_medis where tb_rekam_medis.no_pasien=tb_pasien.no_pasien");
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
                                    <a href="?page=rekam_medis&aksi=hapus&no_pasien=<?php echo $data['no_pasien'];?> &no_rm=<?php echo $data['no_rm'];?>" class="btn btn-danger">Hapus</a>
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
                    DATA PEMERIKSAAN AWAL <small>oleh:perawat</small>
                </h2>
            </div>
            <div class="body">
                <form action="" method="post">

                        <label for="">1. Berat Badan ,Tinggi Badan ,Lingkar Perut ,Suhu Badan dan Tekanan Darah</label>
                        <div class="row clearfix">
                            <div class="col-sm-1">
                            <input type="text" name="txtbb" class="form-control" placeholder="BB" />
                            </div>
                            <div class="col-sm-1">
                            <input type="text" name="txttb" class="form-control" placeholder="TB" />
                            </div>
                            <div class="col-sm-1">
                            <input type="text" name="txtlp" class="form-control" placeholder="LP" />
                            </div>
                            <div class="col-sm-1">
                            <input type="text" name="txtsuhu" class="form-control" placeholder="Suhu" />
                            </div>
                            <div class="col-sm-1">
                            <input type="text" name="txttd" class="form-control" placeholder="TD" />
                            </div>
                        </div>
                        <label for="">2. Alergi Obat ,Kolesterol ,Asam Urat ,Glukosa dan Hemoglobin</label>
                        <div class="row clearfix">
                            <div class="col-sm-1">
                            <input type="text" name="txtao" class="form-control" placeholder="AO" />
                            </div>
                            <div class="col-sm-1">
                            <input type="text" name="txtkol" class="form-control" placeholder="KOL" />
                            </div>
                            <div class="col-sm-1">
                            <input type="text" name="txtau" class="form-control" placeholder="AU" />
                            </div>
                            <div class="col-sm-1">
                            <input type="text" name="txtglu" class="form-control" placeholder="GLU" />
                            </div>
                            <div class="col-sm-1">
                            <input type="text" name="txthb" class="form-control" placeholder="HB" />
                            </div>
                            <div class="col-sm-1">
                            </div>
                        </div>
                        <label for="">3. Keluhan-Keluhan</label>
                        <div class="demo-checkbox">

                            <input type="checkbox" id="batuk" name="keluhan[]" value="batuk" class="chk-col-red"  />
                            <label for="batuk">BATUK</label>
                            <input type="checkbox" id="flu" name="keluhan[]" value="flu" class="chk-col-red"  />
                            <label for="flu">FLU</label>
                            <input type="checkbox" id="demam" name="keluhan[]" value="demam" class="chk-col-red"  />
                            <label for="demam">DEMAM</label>
                            <input type="checkbox" id="pusing" name="keluhan[]" value="pusing" class="chk-col-red"  />
                            <label for="pusing">PUSING</label>
                            <input type="checkbox" id="mual" name="keluhan[]" value="mual" class="chk-col-red"  />
                            <label for="mual">MUAL</label>
                            <input type="checkbox" id="muntah" name="keluhan[]" value="muntah" class="chk-col-red"  />
                            <label for="muntah">MUNTAH</label>
                            <br>
                            <input type="submit" name="simpanawal" value="simpan" class="btn btn-primary">
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_POST['simpanawal'])){
    $keluhan=implode(",",$_POST['keluhan']);
    $bb=$_POST['txt'];
    $tb=$_POST['txttb'];
    $lp=$_POST['txtlp'];
    $suhu=$_POST['txtsuhu'];
    $td=$_POST['txttd'];
    $ao=$_POST['txtao'];
    $kol=$_POST['txtkol'];
    $au=$_POST['txtau'];
    $glu=$_POST['txtglu'];
    $hb=$_POST['txthb'];
// keluhan ""
    $sql=$koneksi->query("insert into tb_rekam_medis_detail3(no_rm,bb,tb,lp,suhu,td,ao,kol,au,glu,hb,keluhan)values('$kode','$bb','$tb','$lp','$suhu','$td','$ao','$kol','$au','$glu','$hb','$keluhan')");
if($sql){
    ?>
    <script type="text/javascript">
    alert("Data berhasil di simpan");
    window.location.href="?page=rekam_medis";
</script>
<?php
}
}
?>

<!-- Awal Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                       
                         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h2 class="modal-title" id="myModalLabel">
                                DATA PASIEN
                            </h2>
                            
                        </div>
                        <div class="modal-body">
                            
                                <table id="lookup" class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <!--<th>No.</th>-->
                                            <th>Nomor Pasien</th>
                                            <th>Nama Pasien</th>
                                            <th>Kelamin</th>
                                            <th>Usia</th>
                                             <th>Alamat</th>
                                           
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                    
                                    $sql= $koneksi->query("select * from tb_pasien");
                                    while($data= $sql->fetch_assoc()){


                                    ?>
                                    
                                    <tr class="pilih" data-nopasien="<?php echo $data['no_pasien']; ?>">
                                        
                                        <td><?php echo $data['no_pasien']?></td>
                                        <td><?php echo $data['nm_pasien']?></td>
                                        <td><?php echo $data['j_kel']?></td>
                                        <td><?php echo $data['usia']?></td>
                                        <td><?php echo $data['alamat']?></td>
                                        
                                    </tr>
                                    <?php } ?>        
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                       
            </div>
        <script src="js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript">
                // jika dipilih, no_pasien akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("no_pasien").value = $(this).attr('data-nopasien');
                $('#myModal').modal('hide');
            });
            

// tabel lookup pasien
            $(function () {
                $("#lookup").dataTable();
            });
        
        </script>

<!--Akhir Modal-->