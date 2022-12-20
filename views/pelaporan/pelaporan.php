      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
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
                        switch ($_SESSION['level']) {
                          case "petugas_bpbd":
                            $pelaporans = Querybanyak("SELECT * FROM pelaporan WHERE status_pelaporan != 'belum dikirim' ");
                            break;
                          case "petugas_kajian":
                            $pelaporans = Querybanyak("SELECT * FROM pelaporan WHERE status_pelaporan = 'tervalidasi' ");
                            break;
                        }
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
                              <?php
                              switch ($_SESSION['level']) {
                                case "petugas_bpbd":
                                  if ($pelaporan['status_pelaporan'] == 'terkirim') { ?>
                                    <a href="<?= $url ?>/?pelaporan=validasi&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-primary btn-outline-white btn-sm text-white">
                                      <i class="ti-check"></i>
                                      Validasi
                                    </a>
                                    <a href="<?= $url ?>/?pelaporan=tidak_valid&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-danger btn-outline-white btn-sm text-white">
                                      <i class="ti-reload"></i>
                                      Tidak Valid
                                    </a>
                                  <?php } elseif ($pelaporan['status_pelaporan'] == 'tervalidasi') { ?>
                                    <a href="#" class="btn btn-success btn-outline-white btn-sm text-white">
                                      <i class="ti-check-box"></i>
                                      valid
                                    </a>

                                  <?php }
                                  break;
                                case "petugas_kajian":

                                  ?>
                                  <a href="#" id="<?= $pelaporan['id_pelaporan'] ?>" data-id="<?= $pelaporan['id_pelaporan'] ?>" class="tambahpeninjauan btn btn-primary btn-outline-dark btn-sm text-white">
                                    <i class="ti-plus"></i>
                                    Tambah Peninjauan
                                  </a>
                              <?php
                                  break;
                              }
                              ?>
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

    