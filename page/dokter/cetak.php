<?php

$koneksi=new mysqli("localhost","root","","db_abc");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PMB UBJ</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
	
	<!-- Agar Ketika Di Load Langsung print -->
	<script>
		window.print();
	</script>
</head>
<body>
    <!-- bagian bukti pendaftaran -->
	<table class="table" border="1">
                    <thead>   
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Telpon</th>
                            <th>Alamat</th>
                        </tr>
                    </thead> 
                    <tbody>
					<?php 
						$no = 1;
						$list_peserta = mysqli_query($koneksi, "SELECT * FROM tb_dokter");
						while($row = mysqli_fetch_array($list_peserta)){
					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $row['kd_dokter'] ?></td>
						<td><?php echo $row['nm_dokter'] ?></td>
						<td><?php echo $row['tmp_lhr'] ?></td>
						<td><?php echo $row['tlp'] ?></td>
						<td><?php echo $row['alamat']?></td>
					</tr>
					<?php } ?>
				</tbody>
    </table>

</body>
</html>