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
        header('Content-Disposition: attachment; filename=Data_Distribusi.xls');
    ?>
 	<table style="width:100%; border: none;">
        <tr >
            <td rowspan="4">
                <img src="<?= $url ?>/assets/images/bpbdkudus.png" alt="" id="imglogo">
            </td>
            <td>
                PEMERINTAH KABUPATEN KUDUS 
            </td>
        </tr>
        <tr><td>Jl. PG. Rendeng, Mlatinorowito Telp / Faxs. (0291) 4250022 Kudus 59313</td></tr>
        <tr><td>BADAN PENANGGULANGAN BENCANA DAERAH</td></tr>
        <tr><td>E-mail : bpbdkudus_jateng@yahoo.com </td></tr>
        <table>
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
                    $sql_distribusi = "SELECT * FROM distribusi WHERE tanggal_distribusi BETWEEN '".$_GET['tanggal_awal']."' AND '".$_GET['tanggal_akhir'] ."' ";
                } elseif (isset($_GET['bulan']) && isset($_GET['tahun'])) {
                    $sql_distribusi = 'SELECT * FROM distribusi WHERE MONTH(tanggal_distribusi) = '.$_GET['bulan']." AND YEAR(tanggal_distribusi) = '" .$_GET['tahun']."' ";
                } elseif (isset($_GET['tahun'])) {
                    $sql_distribusi = "SELECT * FROM distribusi WHERE  YEAR(tanggal_distribusi) = '".$_GET['tahun']."' ";
                } else {
                    $sql_distribusi = 'SELECT * FROM distribusi';
                }

                $distribusis = Querybanyak($sql_distribusi);
                foreach ($distribusis as $distribusi) {

                $user = Querysatudata("SELECT * FROM user WHERE id_user = ".$distribusi['id_user']."");
                $peninjauan = Querysatudata("SELECT * FROM peninjauan WHERE id_peninjauan = ".$distribusi['id_peninjauan']."");                                        

                $bencana = Querysatudata("SELECT * FROM bencana WHERE id_bencana = ".$peninjauan['id_bencana']. "");
                $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = ".$peninjauan['id_wilayah']. "");
                ?>
                <tr>
                    <td class="py-1">
                        <?= $user['nama_user'] ?>
                    </td>
                    <td>
                        <?= $distribusi['tanggal_distribusi'] ?>
                    </td>
                    <td>
                        <?= $bencana['nama_bencana'] ?>
                    </td>
                    <td>
                        <?= $wilayah['kecamatan'] ?> / <?= $wilayah['desa'] ?>
                    </td>
                    <td>
                        <?= $distribusi[
                            'status_distribusi'
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