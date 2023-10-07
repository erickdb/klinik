<?php

    $no_pasien = $_GET['no_pasien'];
    $sql = $koneksi->query("select * from tb_pasien where no_pasien='$no_pasien'");
    $tampil = $sql->fetch_assoc();

?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH DATA PASIEN
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST" enctype="multipart/form-data">
                        <label for="">No Pasien</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nomor"  value="<?php echo $tampil['no_pasien'];?>" class="form-control" readonly />
                            </div>
                        </div>

                        <label for="">Nama Pasien</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama"  value="<?php echo $tampil['nm_pasien'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Jenis Kelamin</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="jkel" class="form-control show-tick" id="">
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    <option value="L" <?php if($tampil['j_kel']=='L') echo "selected";?> >Laki-Laki</option>
                                    <option value="P" <?php if($tampil['j_kel']=='P') echo "selected";?> >Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <label for="">Pekerjaan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="kerjaan"  value="<?php echo $tampil['pekerjaan'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Agama</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="agama" class="form-control show-tick" id="">
                                    <option value="">--Pilih Agama--</option>
                                    <option value="Islam" <?php if($tampil['agama']=='Islam') echo "selected";?> >Islam</option>
                                    <option value="Kristen" <?php if($tampil['agama']=='Kristen') echo "selected";?> >Kristen</option>
                                    <option value="Katolik" <?php if($tampil['agama']=='Katolik') echo "selected";?> >Katolik</option>
                                    <option value="Hindu" <?php if($tampil['agama']=='Hindu') echo "selected";?> >Hindu</option>
                                    <option value="Budha" <?php if($tampil['agama']=='Budha') echo "selected";?> >Budha</option>
                                    <option value="Konghucu" <?php if($tampil['agama']=='Konghucu') echo "selected";?> >Konghucu</option>
                                </select>
                            </div>
                        </div>

                        <label for="">Alamat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="alamat"  value="<?php echo $tampil['alamat'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Tanggal Lahir</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" name="tanggal"  value="<?php echo $tampil['tgl_lhr'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Usia</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="usia"  value="<?php echo $tampil['usia'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">No Telpon</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="telpon"  value="<?php echo $tampil['no_tlp'];?>" class="form-control" />
                            </div>
                        </div>


                        <label for="">Foto</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="foto"  value="<?php echo $tampil['foto'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Ganti Foto</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="foto"  value="<?php echo $tampil['foto'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Status</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="status" class="form-control show-tick" id="">
                                    <option value="">--Pilih Status--</option>
                                    <option value="A" <?php if($tampil['status']=='A') echo "selected";?> >Aktif</option>
                                    <option value="TA" <?php if($tampil['status']=='TA') echo "selected";?> >Tidak Aktif</option>
                                </select>
                            </div>
                        </div>

                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>

<?php 
if (isset($_POST['simpan']))
{
   
    date_default_timezone_set('Asia/Jakarta');
    $date=date("Y-m-d H:i:s");
    $nomor=$_POST['nomor'];
    $nama=$_POST['nama'];
    $kelamin=$_POST['jkel'];
    $kerja=$_POST['kerjaan'];
    $agama=$_POST['agama'];
    $alamat=$_POST['alamat'];
    $tgl=$_POST['tanggal'];
    $usia=$_POST['usia'];
    $telpon=$_POST['telpon'];
    $status=$_POST['status'];
    $foto=$_FILES['foto'] ['name']; //data foto
    $lokasi=$_FILES['foto']['tmp_name']; //lokasi foto
    $upload=move_uploaded_file($lokasi, "images/".$foto);

    if (!empty($lokasi)) //lokasi foto ada
    {
        $upload=move_uploaded_file($lokasi, "images/".$foto);

        $sql=$koneksi->query("update tb_pasien set nm_pasien='$nama' , j_kel='$kelamin' ,pekerjaan='$kerja' ,agama='$agama' ,alamat='$alamat' ,tgl_lhr='$tgl' ,usia='$usia' ,no_tlp='$telpon' ,status='$status' , foto='$foto' where no_pasien='$nomor'");
        if ($sql)
        {
            ?>
            <script type="text/javascript">
            alert ("Data Berhasil di Simpan");
            window.location.href="?page=pasien";
            </script>
            <?php
        }
    }
    else //lokasi foto ga ada
    {        
        $sql=$koneksi->query("update tb_pasien set nm_pasien='$nama' , j_kel='$kelamin' ,pekerjaan='$kerja' ,agama='$agama' ,alamat='$alamat' ,tgl_lhr='$tgl' ,usia='$usia' ,no_tlp='$telpon' ,status='$status' where no_pasien='$nomor'");
        if ($sql)
        {
            ?>
            <script type="text/javascript">
                alert ("Data Berhasil di Simpan");
                window.location.href="?page=pasien";
            </script>
            <?php
        }
    }
}

?>