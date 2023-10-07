<?php

	$kd_obat = $_GET['kd_obat'];
    $sql = $koneksi->query("delete from tb_obat where kd_obat='$kd_obat'");

?>

<script type="text/javascript">
		alert ("Data Berhasil di Hapus");
		window.location.href="?page=obat";
</script>