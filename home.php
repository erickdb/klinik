<?php
    $tgl=date("Y-m-d");

    $sql2=$koneksi->query("select * from tb_dokter");

    while ($tampil2=$sql2->fetch_assoc()) {
        $jumlah_dokter=$sql2->num_rows;
    }
    $sql3=$koneksi->query("select * from tb_obat");

    while ($tampil3=$sql3->fetch_assoc()) {
        $jumlah_obat=$sql3->num_rows;
    }
    $sql4=$koneksi->query("select * from tb_pasien");

    while ($tampil4=$sql4->fetch_assoc()) {
        $jumlah_pasien=$sql4->num_rows;
    }
    $sql5=$koneksi->query("select * from tb_pengguna");

    while ($tampil5=$sql5->fetch_assoc()) {
        $jumlah_pengguna=$sql5->num_rows;
    }
?>
<p align="center"> <img src="images/logoabc.png" alt=""></p>
<marquee behavior="alternate" direction="" bgcolor="">
    <font size="5" color=""> SELAMAT DATANG , SEMOGA HARIMU SENIN TERUS </font>
</marquee>
<div class="container-fluid">
        <div class="block-header"
            <h6><font size="3" color="black">D A S H B O A R D</font></h6>
        </div>

        <!-- widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <a href="?page=dokter"><img src="images/Table-Tick.ico" width="50" height="70"></a>
                    </div>
                    <div class="content">
                        <div class="text">Data Dokter</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
                            <?php
                            echo $jumlah_dokter;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-green hover-expand-effect">
                    <div class="icon">
                        <a href="?page=obat"><img src="images/Table-Tick.ico" width="50" height="70"></a>
                    </div>
                    <div class="content">
                        <div class="text">Data Obat</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
                            <?php
                            echo $jumlah_obat;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <a href="?page=pengguna"><img src="images/Table-Tick.ico" width="50" height="70"></a>
                    </div>
                    <div class="content">
                        <div class="text">Data Pengguna</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
                            <?php
                            echo $jumlah_pengguna;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-blue hover-expand-effect">
                    <div class="icon">
                        <a href="?page=pasien"><img src="images/Table-Tick.ico" width="50" height="70"></a>
                    </div>
                    <div class="content">
                        <div class="text">Jumlah Pasien</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
                            <?php
                            echo $jumlah_pasien;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>