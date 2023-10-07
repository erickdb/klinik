<?php

    $id = $_GET['id'];
    $sql = $koneksi->query("select * from tb_pengguna where id='$id'");
    $tampil = $sql->fetch_assoc();

?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH DATA PENGGUNA
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST" enctype="multipart/form-data">
                        <label for="">Username</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="username"  value="<?php echo $tampil['username'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Nama Pengguna</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama"  value="<?php echo $tampil['nama'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Password</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="password" name="pwd"  value="<?php echo $tampil['password'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Level</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="level" class="form-control show-tick" id="">
                                    <option value="">--Pilih level--</option>
                                    <option value="admin" <?php if($tampil['level']=='admin') echo "selected";?> >Admin</option>
                                    <option value="petugas" <?php if($tampil['level']=='petugas') echo "selected";?> >Petugas</option>
                                    <option value="dokter" <?php if($tampil['level']=='dokter') echo "selected";?> >dokter</option>
                                    <option value="apoteker" <?php if($tampil['level']=='apoteker') echo "selected";?> >Apoteker</option>
                                </select>
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

    if (!empty($lokasi))
    {

        $upload=move_uploaded_file($lokasi, "images/".$foto);

        $sql=$koneksi->query("update tb_pengguna set username='$username',nama='$nama', password='$password',level='$level', foto='$foto' where id='$id'");
        if ($sql)
        {
            ?>
            <script type="text/javascript">
            alert ("Data Berhasil di Simpan");
            window.location.href="?page=pengguna";
            </script>
            <?php
        }
        else
        {
            $sql=$koneksi->query("update tb_pengguna set username='$username',nama='$nama', password='$password',level='$level' where id='$id'");
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
}

?>