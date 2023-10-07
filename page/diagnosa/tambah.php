
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAH DATA DIAGNOSA
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST">
                        <label for="">Kode Diagnosa</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="kode" value="" class="form-control" />
                            </div>
                        </div>

                        <label for="">Nama Diagnosa</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama"class="form-control" />
                            </div>
                        </div>

                        <label for="">Diagnosa ICD10</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="diagnosaicd10"class="form-control" />
                            </div>
                        </div>

                        <label for="">Jenis</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="Jenis" class="form-control show-tick" id="">
                                    <option value="">--Pilih Jenis--</option>
                                    <option value="LARING FARING">LARING FARING</option>
                                    <option value="TELINGA">TELINGA</option>
                                    <option value="TUMOR">TUMOR</option>
                                    <option value="LAIN-LAIN">LAIN-LAIN</option>
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

    $sql=$koneksi->query("insert into tb_diagnosa values('$kode','$nama','$diagnosaicd10','$jenis')");
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