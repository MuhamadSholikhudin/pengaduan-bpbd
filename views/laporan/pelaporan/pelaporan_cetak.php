<?php 
    if (isset($_GET['tanggal_awal']) && isset($_GET['tanggal_akhir'])) {
        $sql_pelaporan = "SELECT * FROM pelaporan WHERE tanggal_pelaporan BETWEEN '" . $_GET['tanggal_awal'] . "' AND '" . $_GET['tanggal_akhir'] . "' AND status_pelaporan != 'belum dikirim' ";
        $hal = "dari tanggal ". $_GET['tanggal_awal']. " Sampai ".$_GET['tanggal_akhir'];
    } elseif (isset($_GET['bulan']) && isset($_GET['tahun'])) {
        $sql_pelaporan = "SELECT * FROM pelaporan WHERE MONTH(tanggal_pelaporan) = " . $_GET['bulan'] . " AND YEAR(tanggal_pelaporan) = '" . $_GET['tahun'] . "' AND  status_pelaporan != 'belum dikirim' ";
        $hal = " bulan ". BulanIndonesia($_GET['bulan'])." Tahun ". $_GET['tahun'];
    } elseif (isset($_GET['tahun'])) {
        $sql_pelaporan = "SELECT * FROM pelaporan WHERE  YEAR(tanggal_pelaporan) = '" . $_GET['tahun'] . "' AND  status_pelaporan != 'belum dikirim' ";
        $hal = " Tahun ". $_GET['tahun'];
    } else {
        $sql_pelaporan = "SELECT * FROM pelaporan WHERE status_pelaporan != 'belum dikirim' ";
        $hal = "";
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelaporan</title>
</head>

<style>
    #table_data {
        margin-left: auto;
        margin-right: auto;
        border: 1px solid black;
        text-align: center;
        width: 100%;
        border-collapse: collapse;
    }

    #table_data thead tr th {
        border: 1px solid black;
    }

    #table_data tbody tr td {
        border: 1px solid black;
    }

    #imglogo {
        height: 90px;
    }
</style>

<body>
    <div style="text-align:center;">
        <table style="width:100%; border: none;">
            <tr>
                <td rowspan="4">
                    <img src="<?= $url ?>/assets/images/logo-kab-kudus.png" alt="" id="imglogo">
                </td>
                <td>
                    PEMERINTAH KABUPATEN KUDUS
                </td>
            </tr>
            <tr>
                <td>
                    <span style="font-size: 23px;">
                        BADAN PENANGGULANGAN BENCANA DAERAH
                    </span>
                </td>
            </tr>
            <tr>
                <td>Jl. PG. Rendeng, Mlatinorowito Kudus 59313 Telp./Faxs. (0291) 4250022 </td>
            </tr>
            <tr style="margin: 0%;">
                <td>E-mail: bpbdkudus_jateng@yahoo.com</td>
            </tr>
            <tr style="margin: 0%;">
                <td colspan="2" >
                    <hr style="position: relative;  top: 20px; height: 3px; background: black; border: 1px solid black;  ">
                </td>
            </tr>
        <table>
    </div>
    <br>

    <span class="text-center" style="font-size: 16xpx; font-weight:700;">NOTA DINAS</span>
        <table style="text-align: left;">
            <tr>
                <td>Kepada Yth</td>
                <td> : </td>
                <td>BUPATI KUDUS</td>
            </tr>
            <tr>
                <td>Dari</td>
                <td> : </td>
                <td>Kepala Badan Penanggukangan Bencana Daerah Kab. Kudus</td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td> : </td>
                <td> <?= TanggalIndonesia(date("Y-m-d")) ?></td>
            </tr>
            <tr>
                <td>Hal</td>
                <td> : </td>
                <td>Laporan Pelaporan Data Bencana Kab. Kudus <?= $hal ?></td>
            </tr>
        </table>
        <br>


    <div style="align-content: center;">
        <table class="table table-striped" id="table_data" >
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
                $pelaporans = Querybanyak($sql_pelaporan);
                foreach ($pelaporans as $pelaporan) {
                    $pelapor = Querysatudata("SELECT * FROM pelapor WHERE id_pelapor = " . $pelaporan['id_pelapor'] . " ");
                    $bencana = Querysatudata("SELECT * FROM bencana WHERE id_bencana = " . $pelaporan['id_bencana'] . " ");
                    $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = " . $pelaporan['id_wilayah'] . " ");
                ?>
                    <tr>
                        <td class="py-1">
                            <?= $pelapor['nama_pelapor'] ?>
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
                            <?= $pelaporan['status_pelaporan'] ?>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>

    <br>
        <br>
        <div style="display: flex; justify-content: space-around">
            <div></div>
            <div>
                <table style="text-align:center;">
                    <tr>
                        <td style="width: 400px;"></td>
                        <td>Kepala Pelaksana</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Badan Penanggulangan daerah</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Kabupaten Kudus</td>
                    </tr>
                    <tr>
                        <td>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </td>
                        <td></td>
                    </tr>                 
                    <tr>
                        <td></td>
                        <td>Drs. RINARDI BUDIYANTO</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Pembina Tk. I</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>NIP. 19690325 198803 1 001</td>
                    </tr>

                </table>
            </div>
        </div>


    <script>
        window.print();
    </script>
</body>

</html>