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
<?php
if (isset($_GET['tanggal_awal']) && isset($_GET['tanggal_akhir'])) { // jika terdapat GET tanggal_awak dan tanggal_akhir

    // Query data peninjauan berdasarkan tanggal peninjauan BETWEEN
    $sql_peninjauan = "SELECT * FROM peninjauan WHERE tanggal_peninjauan BETWEEN '" . $_GET['tanggal_awal'] . "' AND '" . $_GET['tanggal_akhir'] . "' ";
    
    // Query data distribusi berdasarkan tanggal distribusi BETWEEN
    $sql_distribusi = "SELECT * FROM distribusi WHERE tanggal_distribusi BETWEEN '" . $_GET['tanggal_awal'] . "' AND '" . $_GET['tanggal_akhir'] . "' ";
    
    // Membuat perihal dengan memasukkan tanggal awal dan tanggal_akhir
    $hal = "dari tanggal ". $_GET['tanggal_awal']. " Sampai ".$_GET['tanggal_akhir'];

} elseif (isset($_GET['bulan']) && isset($_GET['tahun'])) { //Jika terdapat GET bulan dan tahun

    // Query data peninjauan berdasarkan bulan dan tahun pada tanggal peninjauan
    $sql_peninjauan = "SELECT * FROM peninjauan WHERE MONTH(tanggal_peninjauan) = " . $_GET['bulan'] . " AND YEAR(tanggal_peninjauan) = '" . $_GET['tahun'] . "' ";
    
    // Query data distribusi berdasarkan bulan dan tahun tanggal distribusi 
    $sql_distribusi = "SELECT * FROM distribusi WHERE MONTH(tanggal_distribusi) = " . $_GET['bulan'] . " AND YEAR(tanggal_distribusi) = '" . $_GET['tahun'] . "' ";
    
    // Membuat perihal dengan memasukkan bulan dan tahun tanggal distribusi 
    $hal = " bulan ". BulanIndonesia($_GET['bulan'])." Tahun ". $_GET['tahun'];

} elseif (isset($_GET['tahun'])) { // Jika hanya GET tahun

    // Query data peninjauan berdasarkan tahun pada tanggal peninjauan
    $sql_peninjauan = "SELECT * FROM peninjauan WHERE  YEAR(tanggal_peninjauan) = '" . $_GET['tahun'] . "' ";

    // Query data distribusi berdasarkan tahun tanggal distribusi 
    $sql_distribusi = "SELECT * FROM distribusi WHERE  YEAR(tanggal_distribusi) = '" . $_GET['tahun'] . "' ";

    // Membuat perihal dengan memasukkan  tahun tanggal distribusi 
    $hal = " Tahun ". $_GET['tahun'];
} else { // Jika tidak memenuhi GET diatas maka 
    $sql_peninjauan = "SELECT * FROM peninjauan ORDER BY id_peninjauan LIMIT 100";
    $sql_distribusi = "SELECT * FROM distribusi ORDER BY id_distribusi LIMIT 100";
    $hal = "";
}

$Penanganan_kedaruratan = NumRows($sql_peninjauan);
$Bantuan_logistik = NumRows($sql_distribusi);

?>

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
                <td colspan="2" r>
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
                <td>Laporan Distribusi Kejadian Benca dan Kedaruratan di Kab. Kudus <?= $hal ?></td>
            </tr>
        </table>
        <br>

        <p style="text-align:justify; ">KEMAJUAN/PROGRESS PENDISTRIBUSIAN BANTUAN KEDARURATAN  BANTUAN TERDAMPAK.</p>
        <table style="text-align: left;">
            <tr>
                <td>a.</td>
                <td>Penanganan kedaruratan  berjumlah <?= $Penanganan_kedaruratan ?> Kejadian</td>
            </tr>
            <tr>
                <td>b.</td>
                <td>Bantuan logistik kepada terdampak : <?= $Bantuan_logistik ?> kegiatan</td>
            </tr>
        </table>
        <p style="text-align: justify;">Adapun progress penanganan pendistribusian bantuan sebagai berikut : <p>
        <div style="align-content: center;">
            <table class="table table-striped" id="table_data">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengatur Distribusi</th>
                        <th>Tanggal</th>
                        <th>Bencana</th>
                        <th>Wilayah</th>
                        <th>Status Distribusi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $distribusis = Querybanyak($sql_distribusi);
                    foreach ($distribusis as $distribusi) {
                        $petugas_logistik = Querysatudata("SELECT * FROM petugas_logistik WHERE id_petugas_logistik = " . $distribusi['id_petugas_logistik'] . " ");
                        $peninjauan = Querysatudata("SELECT * FROM peninjauan WHERE id_peninjauan = " . $distribusi['id_peninjauan'] . "");
                        $bencana = Querysatudata("SELECT * FROM bencana WHERE id_bencana = " . $peninjauan['id_bencana'] . " ");
                        $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = " . $peninjauan['id_wilayah'] . " ");
                    ?>
                        <tr>
                            <td class="py-1">
                                <?= $no++ ?>
                            </td>
                            <td class="py-1">
                                <?= $petugas_logistik['nama'] ?>
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