<!DOCTYPE html>
<html>
<head>
	<title>Data Pelaporan</title>
</head>
<body>
	<style type="text/css">
        body{
            font-family: sans-serif;
        }
        table{
            margin: 20px auto;
            border-collapse: collapse;
        }
        table th,
        table td{
            border: 1px solid #3c3c3c;
            padding: 3px 8px;
    
        }
        a{
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
	</style>
 	<?php
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename=Data_Persedian.xls');
    ?>
 	<center>
		<h1>Laporan Data Persediaan <br/> Badan penanggulangan Bencana</h1>
	</center>
 	<table border="1">
        <thead>
            <tr>
            <th>Nama Bantuan</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Kadaluarsa</th>
                    <th>Stok Masuk</th>
                    <th>Stok Tersedia</th> 
            </tr>
        </thead>
        <tbody>
            <?php
                if (  isset($_GET['tanggal_awal']) && isset($_GET['tanggal_akhir'])  ) {
                    $sql_stok_bantuan = "SELECT * FROM stok_bantuan  WHERE tanggal_masuk BETWEEN '" . $_GET['tanggal_awal'] . "' AND '" . $_GET['tanggal_akhir'] . "' ";
                } elseif (isset($_GET['bulan']) && isset($_GET['tahun'])) {
                    $sql_stok_bantuan = "SELECT * FROM stok_bantuan WHERE MONTH(tanggal_masuk) = " . $_GET['bulan'] . " AND YEAR(tanggal_masuk) = '" . $_GET['tahun'] . "' ";
                } elseif (isset($_GET['tahun'])) {
                    $sql_stok_bantuan = "SELECT * FROM stok_bantuan WHERE  YEAR(tanggal_masuk) = '" . $_GET['tahun'] . "' ";
                } else {
                    $sql_stok_bantuan = "SELECT * FROM stok_bantuan";
                }
                   

                $stok_bantuans = Querybanyak($sql_stok_bantuan);
                foreach ($stok_bantuans as $stok_bantuan) {
                    $bantuan = Querysatudata("SELECT * FROM bantuan WHERE id_bantuan = ".$stok_bantuan['id_bantuan']."");                                        
                ?>
                    <tr>
                        <td class="py-1">
                            <?= $bantuan['nama_bantuan'] ?>
                        </td>
                        <td>
                            <?= $stok_bantuan['tanggal_masuk'] ?>
                        </td>
                        <td>
                            <?= $stok_bantuan['tanggal_kadaluarsa'] ?>
                        </td>
                        <td>
                            <?= $stok_bantuan['stok_masuk'] ?>
                        </td>
                        <td>
                            <?= $stok_bantuan['stok_tersedia'] ?>
                        </td>
                    </tr>
                <?php
                }
                ?>

        </tbody>
	</table>
</body>
</html>