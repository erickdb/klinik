<?php
    $koneksi=new mysqli("localhost","root","","db_abc");
    $query = mysqli_query($koneksi, "SELECT max(id) as idTerakhir FROM tb_pengguna");
    $data = mysqli_fetch_array($query);
    $id = $data['idTerakhir'];
    $urutan = (int) $id;
    $urutan++;
?>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAH DATA PENGGUNA
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST" enctype="multipart/form-data">
                        <label for="">Username</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="username" class="form-control" />
                            </div>
                        </div>

                        <label for="">Nama Pengguna</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama"class="form-control" />
                            </div>
                        </div>

                        <label for="">Password</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="password" name="pwd"class="form-control" />
                            </div>
                        </div>

                        <label for="">Level</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="level" class="form-control show-tick" id="">
                                    <option value="">--Pilih level--</option>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                    <option value="dokter">dokter</option>
                                    <option value="apoteker">Apoteker</option>
                                </select>
                            </div>
                        </div>

                        <label for="">Foto</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="foto"class="form-control" />
                            </div>
                        </div>

                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>

<?php 
if (isset($_POST['simpan']))
{
    $username=$_POST['username'];
    $nama=$_POST['nama'];
    $password=$_POST['pwd'];
    $level=$_POST['level'];
    $foto=$_FILES['foto'] ['name'];
    $lokasi=$_FILES['foto']['tmp_name'];
    $upload=move_uploaded_file($lokasi, "images/".$foto);

        if ($upload)
        {
            $sql=$koneksi->query("insert into tb_pengguna (id, username,nama,password,level,foto)
                                values('$urutan', '$username','$nama','$password','$level','$foto')");
            if ($sql)
            {
                ?>
                <script type="text/javascript">
                alert ("Data Berhasil di Simpan");
                window.location.href="?page=pengguna";
                </script>
                <?php
            }
        }
}

?>