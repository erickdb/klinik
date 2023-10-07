<?php
$kode=$_GET['no_rm'];
$no_pasien=$_GET['no_pasien'];

$koneksi_delete_rekam_medis = new mysqli("localhost", "root", "", "db_abc");
$result=$koneksi_delete_rekam_medis->query("delete from tb_rekam_medis where no_pasien='$no_pasien'");
$result1=$koneksi_delete_rekam_medis->query("update tb_pasien set status='0' where no_pasien='$no_pasien'");
if($result && $result1)
{
    ?>
    <script type="text/javascript">
    alert("berhasil hapus");
    window.location.href="?page=rekam_medis&koderm=<?php echo $kode; ?>";
    </script>
    <?php
}
?>