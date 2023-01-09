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
        margin-left:auto; 
        margin-right:auto;
        border:1px solid;
        text-align:center;
        width: 100%;
    }

    tr {
        padding-left: 30px;
    }
    img{
        height: 100px;
    }
</style>

<body>

    <h3 style="text-align:center;"> <img src="<?= $url ?>/assets/images/bpbdkudus.png" alt=""> Data Pelaporan Masyarakat</h3>
    <h4 style="text-align:center;">Badan Penaggulangan Bencana Daerah KUDUS</h4>
    <h4 style="text-align:center;">Pelaporan Mulai dari tanggal</h4>

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
                if (isset($_GET['tanggal_awal']) && isset($_GET['tanggal_akhir'])) {
                    $sql_pelaporan = "SELECT * FROM pelaporan WHERE tanggal_pelaporan BETWEEN '" . $_GET['tanggal_awal'] . "' AND '" . $_GET['tanggal_akhir'] . "' ";
                } elseif (isset($_GET['bulan']) && isset($_GET['tahun'])) {
                    $sql_pelaporan = "SELECT * FROM pelaporan WHERE MONTH(tanggal_pelaporan) = " . $_GET['bulan'] . " AND YEAR(tanggal_pelaporan) = '" . $_GET['tahun'] . "' ";
                } elseif (isset($_GET['tahun'])) {
                    $sql_pelaporan = "SELECT * FROM pelaporan WHERE  YEAR(tanggal_pelaporan) = '" . $_GET['tahun'] . "' ";
                } else {
                    $sql_pelaporan = "SELECT * FROM pelaporan";
                }

                $pelaporans = Querybanyak($sql_pelaporan);
                foreach ($pelaporans as $pelaporan) {
                    $user = Querysatudata("SELECT * FROM user WHERE id_user = " . $pelaporan['id_user'] . " ");
                    $bencana = Querysatudata("SELECT * FROM bencana WHERE id_bencana = " . $pelaporan['id_bencana'] . " ");
                    $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = " . $pelaporan['id_wilayah'] . " ");
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
                            <?= $pelaporan['status_pelaporan'] ?>
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