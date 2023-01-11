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

    table,
    th,
    td {
        border: 1px solid;
    }

    #imglogo {
        height: 50px;
    }
</style>

<body>

    <div style="text-align:center;">
        <tr style="border: 1px solid;">
            <td>
                <img src="<?= $url ?>/assets/images/bpbdkudus.png" alt="" id="imglogo">
            </td>
            <td>
                Data Persediaan bantuan Masyarakat <br>
                Badan Penanggulangan Bencana Daerah KUDUS <br>
                Persediaan bantuan Mulai dari tanggal <br>
            </td>
        </tr>
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