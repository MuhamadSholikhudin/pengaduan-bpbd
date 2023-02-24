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
    <?php
    if (isset($_GET['tanggal_awal']) && isset($_GET['tanggal_akhir'])) {
        $sql_stok_bantuan = "SELECT * FROM stok_bantuan  WHERE tanggal_masuk BETWEEN '" . $_GET['tanggal_awal'] . "' AND '" . $_GET['tanggal_akhir'] . "' ";
        $hal = "dari tanggal " . $_GET['tanggal_awal'] . " Sampai " . $_GET['tanggal_akhir'];
    } elseif (isset($_GET['bulan']) && isset($_GET['tahun'])) {
        $sql_stok_bantuan = "SELECT * FROM stok_bantuan WHERE MONTH(tanggal_masuk) = " . $_GET['bulan'] . " AND YEAR(tanggal_masuk) = '" . $_GET['tahun'] . "' ";
        $hal = " bulan " . BulanIndonesia($_GET['bulan']) . " Tahun " . $_GET['tahun'];
    } elseif (isset($_GET['tahun'])) {
        $sql_stok_bantuan = "SELECT * FROM stok_bantuan WHERE  YEAR(tanggal_masuk) = '" . $_GET['tahun'] . "' ";
        $hal = " Tahun " . $_GET['tahun'];
    } else {
        $sql_stok_bantuan = "SELECT * FROM stok_bantuan";
        $hal = "";
    }
    $stok_bantuans = Querybanyak($sql_stok_bantuan);
    ?>
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
                <td colspan="2" r>
                    <hr style="position: relative;  top: 20px; height: 3px; background: black; border: 1px solid black;  ">
                </td>
            </tr>
            <table>
    </div>
    <br>

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
            <td>Laporan Data Stok Bantuan BPBD Kab. Kudus <?= $hal ?></td>
        </tr>
    </table>
    <br>


    <p></p>

    <div style="align-content: center;">
        <table class="table table-striped" id="table_data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Bantuan</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Kadaluarsa</th>
                    <th>Stok Masuk</th>
                    <th>Stok Tersedia</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($stok_bantuans as $stok_bantuan) {
                    $bantuan = Querysatudata("SELECT * FROM bantuan WHERE id_bantuan = " . $stok_bantuan['id_bantuan'] . "");
                ?>
                    <tr>
                        <td class="py-1">
                            <?= $no++ ?>
                        </td>
                        <td style="text-align:left;">
                            <?= $bantuan['nama_bantuan'] ?>
                        </td>
                        <td>
                            <?= TanggalIndonesia($stok_bantuan['tanggal_masuk']) ?>
                        </td>
                        <td>
                            <?= TanggalIndonesia($stok_bantuan['tanggal_kadaluarsa']) ?>
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