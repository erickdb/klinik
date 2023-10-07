<?php
 
// menghubungkan dengan koneksi database
$koneksi=new mysqli("localhost","root","","db_abc");
 
// mengambil data obat dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(no_pasien) as kodeTerbesar FROM tb_pasien");
$data = mysqli_fetch_array($query);
$nopasien = $data['kodeTerbesar'];
 
// mengambil angka dari nmor obat terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($nopasien, 3, 5);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
 
// membentuk nomor pasien baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "PSN";
$nopasien = $huruf . sprintf("%05s", $urutan);
?>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAH DATA PASIEN
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST" enctype="multipart/form-data">
                        <label for="">Nomor</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nomor" value="<?php echo $nopasien; ?> " class="form-control" readonly />
                            </div>
                        </div>

                        <label for="">Nama Pasien</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama"class="form-control" />
                            </div>
                        </div>

                        <label for="">Jenis Kelamin</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="jkel" class="form-control show-tick" id="">
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="p">Perempuan</option>
                                </select>
                            </div>
                        </div>


                        <label for="">Pekerjaan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="kerjaan"class="form-control" />
                            </div>
                        </div>

                        <label for="">Agama</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="agama" class="form-control show-tick" id="">
                                    <option value="">--Pilih Agama--</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                        </div>

                        <label for="">Alamat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="alamat"class="form-control" />
                            </div>
                        </div>

                        <label for="">Tanggal Lahir</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" name="tanggal"class="form-control" />
                            </div>
                        </div>

                        <label for="">Usia</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="usia"class="form-control" />
                            </div>
                        </div>

                        <label for="">No Telpon</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="telpon"class="form-control" />
                            </div>
                        </div>

                        <label for="">Foto</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="foto"class="form-control" />
                            </div>
                        </div>

                        <label for="">Status</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="status" class="form-control show-tick" id="">
                                    <option value="">--Pilih Status--</option>
                                    <option value="A">Aktif</option>
                                    <option value="TA">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>

                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>

<?php 
if (isset($_POST['simpan'])){

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
$foto=$_FILES['foto'] ['name'];
$lokasi=$_FILES['foto']['tmp_name'];
$upload=move_uploaded_file($lokasi, "images/".$foto);

    if ($upload){

    $sql=$koneksi->query("insert into tb_pasien (no_pasien,nm_pasien,j_kel,pekerjaan,agama,alamat,tgl_lhr,usia,no_tlp,foto,status,tgldaftar)
                          values('$nomor','$nama','$kelamin','$kerja','$agama','$alamat','$tgl','$usia','$telpon','$foto','$status','$date')");
        if ($sql){
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