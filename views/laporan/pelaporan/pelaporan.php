<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

        <h1 class="welcome-text text-center mb-3">Laporan Pelaporan </h1>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title card-title-dash text-center">Laporan Per Tanggal</h5>
                                <form action="http://localhost/pengaduan-bpbd/?laporan=pelaporan" method="POST">
                                <table class="table">
                                    <tr>
                                        <td>
                                            Dari
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" name="tanggal_awal" id="" value="<?= date("Y-m-d") ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Sampai
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" name="tanggal_akhir" id="" value="<?= date("Y-m-d") ?>">
                                        </td>                                        
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <button type="submit" class="btn btn-primary">
                                            <i class="ti-shine"></i>
                                                Proses
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title card-title-dash text-center">Laporan Per Bulan</h5>
                                <form action="http://localhost/pengaduan-bpbd/?laporan=pelaporan" method="POST">
                                <table class="table">
                                    <tr>
                                        <td>
                                            Bulan
                                        </td>
                                        <td>
                                            <?php
                                            $bulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
                                            $bulan_ini = date("m");
                                            ?>
                                            <select class="form-control" name="bulan" id="bulan">
                                                <?php foreach ($bulan as $bul) { ?>
                                                    <option value="<?= $bul ?>"><?= $bul ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tahun
                                        </td>
                                        <td>

                                            <select class="form-control" name="tahun" id="tahun">
                                                <?php $mulai = date('Y') - 20;
                                                for ($i = $mulai; $i < $mulai + 21; $i++) {
                                                    $sel = $i == date('Y') ? 'selected="selected"' : '';
                                                    echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <button type="submit" class="btn btn-primary">
                                            <i class="ti-shine"></i>
                                                Proses
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title card-title-dash text-center">Laporan Per Tahun</h5>
                                <form action="http://localhost/pengaduan-bpbd/?laporan=pelaporan" method="POST">
                                <table class="table">
                                    <tr>
                                        <td>
                                            Tahun
                                        </td>
                                        <td>
                                            <select class="form-control" name="tahun" id="tahun">
                                                <?php $mulai = date('Y') - 20;
                                                for ($i = $mulai; $i < $mulai + 21; $i++) {
                                                    $sel = $i == date('Y') ? 'selected="selected"' : '';
                                                    echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <button type="submit" class="btn btn-primary">
                                            <i class="ti-shine"></i>
                                                Proses
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                if (  isset($_GET['tanggal_awal']) && isset($_GET['tanggal_akhir'])  ) {
                    $sql_pelaporan = "SELECT * FROM pelaporan WHERE tanggal_pelaporan BETWEEN '" . $_GET['tanggal_awal'] . "' AND '" . $_GET['tanggal_akhir'] . "' ";
                    $link = "&tanggal_awal=".$_GET['tanggal_awal']."&tanggal_akhir=".$_GET['tanggal_akhir']."";
                } elseif (isset($_GET['bulan']) && isset($_GET['tahun'])) {
                    $sql_pelaporan = "SELECT * FROM pelaporan WHERE MONTH(tanggal_pelaporan) = " . $_GET['bulan'] . " AND YEAR(tanggal_pelaporan) = '" . $_GET['tahun'] . "' ";
                    $link = "&bulan=".$_GET['bulan']."&tahun=".$_GET['tahun']."";
                } elseif (isset($_GET['tahun'])) {
                    $sql_pelaporan = "SELECT * FROM pelaporan WHERE  YEAR(tanggal_pelaporan) = '" . $_GET['tahun'] . "' ";
                    $link = "&tahun=".$_GET['tahun']."";
                } else {
                    $sql_pelaporan = "SELECT * FROM pelaporan";
                    $link = "";
                }
            ?>

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="card-title text-center">Data Pelaporan</h4>
                            </div>
                            <div class="col-lg-12">
                                <a target="_blank" href="http://localhost/pengaduan-bpbd/?laporan=pelaporan_cetak<?= $link ?>" class="btn btn-warning btn-sm">
                                    <i class="ti-printer"></i>
                                    &nbsp; 
                                    Cetak
                                </a>
                                &nbsp; 
                                <a href="http://localhost/pengaduan-bpbd/?laporan=pelaporan_pdf" class="btn btn-danger btn-sm">
                                    <i class="fa fa-file"></i>
                                    &nbsp; 
                                    PDF
                                </a>
                                &nbsp; 
                                <a href="http://localhost/pengaduan-bpbd/?laporan=pelaporan_excel<?= $link ?>" class="btn btn-success btn-sm">
                                    <i class="ti-file"></i>
                                    &nbsp; 
                                    EXCEL
                                </a>                                
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
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
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>

        </div>
    </div>