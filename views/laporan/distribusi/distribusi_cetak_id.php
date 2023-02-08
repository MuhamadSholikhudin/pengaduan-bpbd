<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelaporan Distribusi</title>
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

// Query data distribusi berdasarkan id_distribusi
$sql_distribusi = "SELECT * FROM distribusi WHERE id_distribusi = ".$_GET['id_distribusi']." ";

// Query data bantuan_distribusi berdasarkan id_distribusi
$sql_bantuan_distribusi = "SELECT * FROM bantuan_distribusi WHERE id_distribusi = ".$_GET['id_distribusi']." ";

// Menampilkan data distribusi berdasarkan id_distribusi
$datu_data_distribusi = Querysatudata($sql_distribusi);
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
                <td valign="top">Hal</td>
                <td valign="top"> : </td>
                <td valign="top">Laporan Distribusi Kejadian Benca dan Kedaruratan di Kab. Kudus pada tanggal <?= TanggalIndonesia($datu_data_distribusi['tanggal_distribusi']) ?></td>
            </tr>
        </table>
        <br>
        <p style="text-align: justify;">Adapun progress penanganan pendistribusian bantuan sebagai berikut : <p>
        <div style="align-content: center;">
            <table class="table table-striped" id="table_data">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Bantuan</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    // Execute Query bantuan distribusi
                    $bantuan_distribusis = Querybanyak($sql_bantuan_distribusi);
                    foreach ($bantuan_distribusis as $bantuan_distribusi) {

                        // Menampilkan data stok_bantuan berdasarkan id_stok_bantuan
                        $stok_bantuan = Querysatudata("SELECT * FROM stok_bantuan WHERE id_stok_bantuan = " . $bantuan_distribusi['id_stok_bantuan'] . " ");
                        
                        // Menampilkan data bantuan berdasarkan id_bantuan
                        $bantuan = Querysatudata("SELECT * FROM bantuan WHERE id_bantuan = " . $stok_bantuan['id_bantuan'] . "");
                        
                        // Menampilkan data peninjauan berdasarkan id_peninjauan
                        $peninjauan = Querysatudata("SELECT * FROM peninjauan WHERE id_peninjauan = " . $datu_data_distribusi['id_peninjauan'] . "");
                        
                        // Menampilkan data bencana berdasarkan id_bencana
                        $bencana = Querysatudata("SELECT * FROM bencana WHERE id_bencana = " . $peninjauan['id_bencana'] . "");
                        
                        // Menampilkan data wilayah berdasarkan id_wilayah
                        $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = " . $peninjauan['id_wilayah'] . "");
                    ?>
                        <tr>
                            <td class="py-1">
                                <?= $no++ ?>
                            </td>
                            <td class="py-1">
                                <?= $bantuan['nama_bantuan'] ?>
                            </td>
                            <td>
                                <?= $bantuan_distribusi['jumlah'] ?>
                            </td>
                            <td>
                                <?= $datu_data_distribusi['tanggal_distribusi'] ?>
                            </td>
                            <td>
                                <?= $bencana['nama_bencana']. ", ". $wilayah['kecamatan']. " ".$wilayah['desa'] ?>                                                                
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