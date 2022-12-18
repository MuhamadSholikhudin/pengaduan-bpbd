      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <a href="<?= $url ?>?pelaporan=add" class="btn btn-sm btn-outline-secondary">
                        <i class="mdi mdi-library-plus"></i>
                        Tambah
                      </a>
                    </div>
                    <div class="col-lg-12 text-center">
                      <h2><?= strtoupper("Data " . array_keys($_GET)[0]) ?></h2>
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
                            Tanggal Pelaporan
                          </th>
                          <th>
                            Wilayah
                          </th>
                          <th>
                            Status Pelaporan
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $pelaporans = Querybanyak("SELECT * FROM pelaporan WHERE id_user = ".$_SESSION['id_user']."");
                        foreach ($pelaporans as $pelaporan) { ?>
                          <tr>
                            <td>
                              <?php
                              $user = Querysatudata("SELECT nama_user FROM user WHERE id_user = " . $pelaporan['id_user'] . "")
                              ?>
                              <?= $user['nama_user'] ?>
                            </td>
                            <td>
                              <?= $pelaporan['tanggal_pelaporan'] ?>
                            </td>
                            <td>
                              <?php
                              $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = " . $pelaporan['id_wilayah'] . "")
                              ?>
                              <?= $wilayah['kecamatan'] ?> / <?= $wilayah['desa'] ?>
                            </td>
                            <td>
                              <?= $pelaporan['status_pelaporan'] ?>
                            </td>
                            <td>
                            <a href="<?= $url ?>/?pelaporan=kirim&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-primary btn-outline-dark btn-sm text-white">
                                <i class="ti-arrow-top-right"></i>
                                Kirim
                              </a>
                              <a href="<?= $url ?>/?pelaporan=edit&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-warning btn-outline-dark btn-sm text-white">
                                <i class="ti-pencil"></i>
                                Edit
                              </a>
                              
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