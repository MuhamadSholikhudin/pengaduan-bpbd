<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

        <h1 class="welcome-text text-center mb-3">Laporan Peninjauan </h1>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title card-title-dash text-center">Laporan Per Tanggal</h5>
                                <form action="http://localhost/pengaduan-bpbd/?laporan=peninjauan" method="POST">
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
                                <form action="http://localhost/pengaduan-bpbd/?laporan=peninjauan" method="POST">
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
                                <form action="http://localhost/pengaduan-bpbd/?laporan=peninjauan" method="POST">
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
                    $sql_peninjauan = "SELECT * FROM peninjauan WHERE tanggal_peninjauan BETWEEN '" . $_GET['tanggal_awal'] . "' AND '" . $_GET['tanggal_akhir'] . "' ";
                    $link = "&tanggal_awal=".$_GET['tanggal_awal']."&tanggal_akhir=".$_GET['tanggal_akhir']."";
                } elseif (isset($_GET['bulan']) && isset($_GET['tahun'])) {
                    $sql_peninjauan = "SELECT * FROM peninjauan WHERE MONTH(tanggal_peninjauan) = " . $_GET['bulan'] . " AND YEAR(tanggal_peninjauan) = '" . $_GET['tahun'] . "' ";
                    $link = "&bulan=".$_GET['bulan']."&tahun=".$_GET['tahun']."";
                } elseif (isset($_GET['tahun'])) {
                    $sql_peninjauan = "SELECT * FROM peninjauan WHERE  YEAR(tanggal_peninjauan) = '" . $_GET['tahun'] . "' ";
                    $link = "&tahun=".$_GET['tahun']."";
                } else {
                    $sql_peninjauan = "SELECT * FROM peninjauan";
                    $link = "";
                }
            ?>

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="card-title text-center">Data peninjauan</h4>
                            </div>
                            <div class="col-lg-12">
                                <a target="_blank" href="http://localhost/pengaduan-bpbd/?laporan=peninjauan_cetak<?= $link ?>" class="btn btn-warning btn-sm">
                                    <i class="ti-printer"></i>
                                    &nbsp; 
                                    Cetak
                                </a>
                                &nbsp; 
                                <!-- <a href="http://localhost/pengaduan-bpbd/?laporan=peninjauan_pdf" class="btn btn-danger btn-sm">
                                    <i class="fa fa-file"></i>
                                    &nbsp; 
                                    PDF
                                </a> -->
                                &nbsp; 
                                <!-- <a href="http://localhost/pengaduan-bpbd/?laporan=peninjauan_excel<?= $link ?>" class="btn btn-success btn-sm">
                                    <i class="ti-file"></i>
                                    &nbsp; 
                                    EXCEL
                                </a>                                 -->
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            Peninjau
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $peninjauans = Querybanyak($sql_peninjauan);
                                    foreach ($peninjauans as $peninjauan) {
                                        $petugas_kajian = Querysatudata("SELECT * FROM petugas_kajian WHERE id_petugas_kajian = " . $peninjauan['id_petugas_kajian'] . " ");
                                        $bencana = Querysatudata("SELECT * FROM bencana WHERE id_bencana = " . $peninjauan['id_bencana'] . " ");
                                        $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = " . $peninjauan['id_wilayah'] . " ");
                                    ?>
                                        <tr>
                                            <td class="py-1">
                                                <?= $petugas_kajian['nama'] ?>
                                            </td>
                                            <td>
                                                <?= TanggalIndonesia($peninjauan['tanggal_peninjauan']) ?>
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
                                                <?= $peninjauan['status_peninjauan'] ?>
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