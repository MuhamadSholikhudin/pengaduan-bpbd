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
        header('Content-Disposition: attachment; filename=Data_Pegawai.xls');
    ?>
 	<center>
		<h1>Laporan Data Pelaporan <br/> Badan penanggulangan Bencana</h1>
	</center>
 	<table border="1">
        <thead>
            <tr>
                <th>
                    Pelapor
                </th>
                <th>
                    Tanggal
                </th>
                <th>
                    Bencana
                </th>
                <th>
                    Wilayah
                </th>
                <th>
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (isset($_GET['tanggal_awal']) && isset($_GET['tanggal_akhir'])) {
                    $sql_pelaporan = "SELECT * FROM pelaporan WHERE tanggal_pelaporan BETWEEN '".$_GET['tanggal_awal']."' AND '".$_GET['tanggal_akhir'] ."' ";
                } elseif (isset($_GET['bulan']) && isset($_GET['tahun'])) {
                    $sql_pelaporan = 'SELECT * FROM pelaporan WHERE MONTH(tanggal_pelaporan) = '.$_GET['bulan']." AND YEAR(tanggal_pelaporan) = '" .$_GET['tahun']."' ";
                } elseif (isset($_GET['tahun'])) {
                    $sql_pelaporan = "SELECT * FROM pelaporan WHERE  YEAR(tanggal_pelaporan) = '".$_GET['tahun']."' ";
                } else {
                    $sql_pelaporan = 'SELECT * FROM pelaporan';
                }

                $pelaporans = Querybanyak($sql_pelaporan);
                foreach ($pelaporans as $pelaporan) {

                $user = Querysatudata("SELECT * FROM user WHERE id_user = ".$pelaporan['id_user']."");
                $bencana = Querysatudata("SELECT * FROM bencana WHERE id_bencana = ".$pelaporan['id_bencana']. "");
                $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = ".$pelaporan['id_wilayah']. "");
                ?>
                <tr>
                    <td class="py-1">
                        <?= $user['nama_user'] ?>
                    </td>
                    <td>
                        <?= $pelaporan['tanggal_pelaporan'] ?>
                    </td>
                    <td>
                        <?= $bencana['nama_bencana'] ?>
                    </td>
                    <td>
                        <?= $wilayah['kecamatan'] ?> / <?= $wilayah['desa'] ?>
                    </td>
                    <td>
                        <?= $pelaporan[
                            'status_pelaporan'
                        ] ?>
                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>
	</table>
</body>
</html>