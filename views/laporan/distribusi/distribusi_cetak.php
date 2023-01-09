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
                Data Pendistribusian Masyarakat <br>
                Badan Penanggulangan Bencana Daerah KUDUS <br>
                Pendistribusian Mulai dari tanggal <br>
            </td>
        </tr>
    </div>

    <div style="align-content: center;">
        <table class="table table-striped" id="table_data">
            <thead>
                <tr>
                    <th>
                        Pengatur Distribusi
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
                    $sql_pelaporan = "SELECT * FROM distribusi WHERE tanggal_distribusi BETWEEN '" . $_GET['tanggal_awal'] . "' AND '" . $_GET['tanggal_akhir'] . "' ";
                } elseif (isset($_GET['bulan']) && isset($_GET['tahun'])) {
                    $sql_distribusi = "SELECT * FROM distribusi WHERE MONTH(tanggal_distribusi) = " . $_GET['bulan'] . " AND YEAR(tanggal_distribusi) = '" . $_GET['tahun'] . "' ";
                } elseif (isset($_GET['tahun'])) {
                    $sql_distribusi = "SELECT * FROM distribusi WHERE  YEAR(tanggal_distribusi) = '" . $_GET['tahun'] . "' ";
                } else {
                    $sql_distribusi = "SELECT * FROM distribusi";
                }

                $distribusis = Querybanyak($sql_distribusi);
                foreach ($distribusis as $distribusi) {
                    $user = Querysatudata("SELECT * FROM user WHERE id_user = " . $distribusi['id_user'] . " ");
                    $peninjauan = Querysatudata("SELECT * FROM peninjauan WHERE id_peninjauan = " . $distribusi['id_peninjauan'] . "");

                    $bencana = Querysatudata("SELECT * FROM bencana WHERE id_bencana = " . $peninjauan['id_bencana'] . " ");
                    $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = " . $peninjauan['id_wilayah'] . " ");
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
                            <?= $distribusi['status_distribusi'] ?>
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