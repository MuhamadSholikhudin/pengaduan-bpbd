      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <!-- <div class="col-lg-12">
                      <a href="<?= $url ?>?peninjauan=add" class="btn btn-sm btn-outline-secondary">
                        <i class="mdi mdi-library-plus"></i>
                        Tambah
                      </a>
                    </div> -->
                    <div class="col-lg-12 text-center">
                      <h2><?= strtoupper("Data " . array_keys($_GET)[0]) ?></h2>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table  id="myTable" class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Pelapor
                          </th>
                          <th>
                            Tanggal peninjauan
                          </th>
                          <th>
                            Bencana
                          </th>
                          <th>
                            Wilayah
                          </th>
                          <th>
                            Korban
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $peninjauans = Querybanyak("SELECT * FROM peninjauan ORDER BY id_peninjauan DESC");
                        foreach ($peninjauans as $peninjauan) { ?>
                        <tr>
                          <td>
                          <?php
                              $pelaporanuser = Querysatudata("SELECT user.nama_user as nama_user, pelaporan.id_bencana as id_bencana FROM pelaporan JOIN user ON pelaporan.id_user = user.id_user
                               WHERE pelaporan.id_pelaporan = " . $peninjauan['id_pelaporan'] . "")
                              ?>
                              <?= $pelaporanuser['nama_user'] ?> 
                              
                          </td>
                          <td>
                            <?= $peninjauan['tanggal_peninjauan'] ?>
                          </td>
                          <td>
                          <?php
                              $bencana = Querysatudata("SELECT nama_bencana FROM  bencana WHERE id_bencana = " . $pelaporanuser['id_bencana'] . " ");
                              ?>
                              <?= $bencana['nama_bencana'] ?> / <?= $peninjauan['kategori_bencana'] ?>  
                          </td>
                          <td>
                          <?php
                              $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = " . $peninjauan['id_wilayah'] . "")
                              ?>
                              <?= $wilayah['kecamatan'] ?> / <?= $wilayah['desa'] ?>  
                          </td>
                          <td>
                            <?= $peninjauan['jumlah_korban'] ?>
                          </td>
                          <td>
<?php if($_SESSION['level'] == "petugas_kajian"){ 
echo $peninjauan['id_peninjauan'];
} ?>
                            <?= $peninjauan['status_peninjauan'] ?>
                          </td>
                          <td>
<?php if($_SESSION['level'] == "petugas_logistik"){ ?>
   <a class="btn btn-sm btn-sm btn-primary btn- btn-icon-text">
                              <i class="ti-plus"></i>
                              Tambah distribusi 
                            </a>
<?php }elseif($_SESSION['level'] == "petugas_kajian"){ ?>
                            <a class="btn btn-sm btn-sm btn-outline-warning btn-icon-text">
                              <i class="ti-alert"></i>
                              Beritahu
                            </a>
                            <a href="<?= $url ?>/?peninjauan=edit&id=<?= $peninjauan['id_peninjauan'] ?>" class="btn btn-sm btn-sm btn-outline-secondary btn-icon-text">
                              <i class="ti-pencil-alt"></i>
                              Edit
                            </a>
<?php } ?>

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
