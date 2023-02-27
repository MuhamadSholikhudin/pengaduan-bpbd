<?php 
    if (isset($_GET['tanggal_awal']) && isset($_GET['tanggal_akhir'])) {
        $sql_posko = "SELECT * FROM posko WHERE tanggal_posko BETWEEN '" . $_GET['tanggal_awal'] . "' AND '" . $_GET['tanggal_akhir'] . "' AND status_posko != 'belum dikirim' ";
        $hal = "dari tanggal ". TanggalIndonesia($_GET['tanggal_awal']). " Sampai ".TanggalIndonesia($_GET['tanggal_akhir']);
    } elseif (isset($_GET['bulan']) && isset($_GET['tahun'])) {
        $sql_posko = "SELECT * FROM posko WHERE MONTH(tanggal_posko) = " . $_GET['bulan'] . " AND YEAR(tanggal_posko) = '" . $_GET['tahun'] . "' AND  status_posko != 'belum dikirim' ";
        $hal = " bulan ". BulanIndonesia($_GET['bulan'])." Tahun ". $_GET['tahun'];
    } elseif (isset($_GET['tahun'])) {
        $sql_posko = "SELECT * FROM posko WHERE  YEAR(tanggal_posko) = '" . $_GET['tahun'] . "' AND  status_posko != 'belum dikirim' ";
        $hal = " Tahun ". $_GET['tahun'];
    } else {
        $sql_posko = "SELECT * FROM posko WHERE status_posko != 'belum dikirim' ";
        $hal = "";
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data posko</title>
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
                <td valign="top">Kepada Yth</td>
                <td valign="top"> : </td>
                <td valign="top">BUPATI KUDUS</td>
            </tr>
            <tr>
                <td valign="top">Dari</td>
                <td valign="top"> : </td>
                <td valign="top">Kepala Badan Penanggulangan Bencana Daerah Kab. Kudus</td>
            </tr>
            <tr>
                <td valign="top">Tanggal</td>
                <td valign="top"> : </td>
                <td valign="top"> <?= TanggalIndonesia(date("Y-m-d")) ?></td>
            </tr>
            <tr>
                <td valign="top">Hal</td>
                <td valign="top"> : </td>
                <td valign="top">Laporan posko Data Bencana Kab. Kudus <?= $hal ?></td>
            </tr>
        </table>
        <br>


    <div style="align-content: center;">
        <table class="table table-striped" id="table_data" >
            <thead>
                <tr>
                    <th>
                        Peninjau
                    </th>
                    <th>
                        Nama Posko
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
                        Kategori Bencana
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Jumlah Jiwa
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                 $poskos = Querybanyak($sql_posko);
                 foreach ($poskos as $posko) {
                     $peninjauan =  Querysatudata("SELECT * FROM peninjauan WHERE id_peninjauan = " . $posko['id_peninjauan'] . " ");
                     $petugas_kajian = Querysatudata("SELECT * FROM petugas_kajian WHERE id_petugas_kajian = " . $peninjauan['id_petugas_kajian'] . " ");
                     $bencana = Querysatudata("SELECT * FROM bencana WHERE id_bencana = " . $peninjauan['id_bencana'] . " ");
                     $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = " . $peninjauan['id_wilayah'] . " ");
                 ?>
                   <tr>
                        <td class="py-1">
                            <?= $petugas_kajian['nama'] ?>
                        </td>
                        <td>
                            <?= $posko['nama_posko'] ?>
                        </td>
                        <td>
                            <?= TanggalIndonesia($posko['tanggal_posko']) ?>
                        </td>
                        <td>
                            <?= $bencana['nama_bencana'] ?>
                        </td>
                        <td>
                            <?= $wilayah['kecamatan'] ?> / <?= $wilayah['desa'] ?>
                        </td>
                        <td>
                            <?= $peninjauan['kategori_bencana'] ?>
                        </td>
                        <td>
                            <?= $posko['status_posko'] ?>
                        </td>
                        <td>
                            <?= $posko['jumlah_jiwa'] ?>
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