<?php

	$kd_diagnosa = $_GET['kd_diagnosa'];
    $sql = $koneksi->query("delete from tb_diagnosa where kd_diagnosa='$kd_diagnosa'");

?>

<script type="text/javascript">
		alert ("Data Berhasil di Hapus");
		window.location.href="?page=diagnosa";
</script>