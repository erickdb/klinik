<?php
 
 $kd_diagnosa = $_GET['kd_diagnosa'];
 $sql = $koneksi->query("select * from tb_diagnosa where kd_diagnosa='$kd_diagnosa'");
 $tampil = $sql->fetch_assoc();

?>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH DATA DIAGNOSA
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST">
                        <label for="">Kode Diagnosa</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="kode" value="<?php echo $tampil['kd_diagnosa'];?>" class="form-control" readonly />
                            </div>
                        </div>

                        <label for="">Nama diagnosa</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama" value="<?php echo $tampil['nm_diagnosa'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Diagnosa ICD10</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="diagnosaicd10" value="<?php echo $tampil['diagnosaicd10'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Jenis</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="jenis" class="form-control show-tick" id="">
                                    <option value="">--Pilih Jenis--</option>
                                    <option value="LARING FARING" <?php if($tampil['jenis']=='LARING FARING') echo "selected";?>>LARING FARING</option>
                                    <option value="TELINGA" <?php if($tampil['jenis']=='TELINGA') echo "selected";?>>TELINGA</option>
                                    <option value="TUMOR" <?php if($tampil['jenis']=='TUMOR') echo "selected";?>>TUMOR</option>
                                    <option value="LAIN-LAIN" <?php if($tampil['jenis']=='LAIN-LAIN') echo "selected";?>>LAIN-LAIN</option>
                                </select>
                            </div>
                        </div>

                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>

<?php 
if (isset($_POST['simpan'])){
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$diagnosaicd10=$_POST['diagnosaicd10'];
$jenis=$_POST['jenis'];

    $sql=$koneksi->query("update tb_diagnosa set nm_diagnosa='$nama',diagnosaicd10='$diagnosaicd10',jenis='$jenis' where kd_diagnosa='$kode'");
    if ($sql){
        ?>
        <script type="text/javascript">
        alert ("Data Berhasil di Simpan");
        window.location.href="?page=diagnosa";
        </script>
        <?php
    }
}

?>