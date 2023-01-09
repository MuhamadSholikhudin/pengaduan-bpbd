      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <a href="<?= $url ?>?pelaporan_masyarakat=add" class="btn btn-sm btn-outline-secondary">
                        <i class="mdi mdi-library-plus"></i>
                        Tambah
                      </a>
                    </div>
                    <div class="col-lg-12 text-center">
                      <h2><?= strtoupper("Data " . str_replace("_"," ", array_keys($_GET)[0])) ?></h2>
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
                            Bencana
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
                        $pelaporans = Querybanyak("SELECT * FROM pelaporan WHERE id_user = " . $_SESSION['id_user'] . "");
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
                              $bencana = Querysatudata("SELECT * FROM bencana WHERE id_bencana = " . $pelaporan['id_bencana'] . "")
                              ?>
                              <?= $bencana['nama_bencana'] ?>
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
                              if ($pelaporan['status_pelaporan'] == "belum dikirim") {
                              ?>
                                <a href="<?= $url ?>/?pelaporan_masyarakat=kirim&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-primary btn-outline-white btn-sm text-white">
                                  <i class="ti-arrow-top-right"></i>
                                  Kirim
                                </a>
                                <a href="<?= $url ?>/?pelaporan_masyarakat=edit&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-warning btn-outline-white btn-sm text-white">
                                  <i class="ti-pencil-alt"></i>
                                  Edit
                                </a>
                              <?php
                              } elseif ($pelaporan['status_pelaporan'] == "batal kirim") {
                              ?>
                                <a href="<?= $url ?>/?pelaporan_masyarakat=kirim&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-primary btn-outline-white btn-sm text-white">
                                  <i class="ti-arrow-top-right"></i>
                                  Kirim
                                </a>
                              <?php
                              } elseif ($pelaporan['status_pelaporan'] == "terkirim") {
                              ?>
                              <a href="<?= $url ?>/?pelaporan_masyarakat=batal_kirim&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-secondary btn-outline-white btn-sm text-dark">
                                <i class="ti-back-left"></i>
                                Batalkan
                              </a>
                              <?php
                              } elseif ($pelaporan['status_pelaporan'] == "tidak valid") {
                              ?>
                                <a href="<?= $url ?>/?pelaporan_masyarakat=kirim&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-primary btn-outline-white btn-sm text-white">
                                  <i class="ti-arrow-top-right"></i>
                                  Kirim
                                </a>
                              <?php
                              } elseif ($pelaporan['status_pelaporan'] == "tervalidasi") {
                              ?>
                              <a href="#" class="btn btn-success btn-outline-white btn-sm text-white">
                                <i class="ti-check-box"></i>
                                valid
                              </a>
                              <?php
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