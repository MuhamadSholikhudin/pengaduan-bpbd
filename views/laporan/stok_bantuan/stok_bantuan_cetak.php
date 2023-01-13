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
         <h4 class="text-center  ">LAPORAN DATA PERSEDIAAN</h4>

    </div>

    <div style="align-content: center;">
        <table class="table table-striped" id="table_data">
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
    </div>


    <script>
        window.print();
    </script>
</body>

</html>