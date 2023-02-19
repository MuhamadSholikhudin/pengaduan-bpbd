      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <!-- <a href="<?= $url ?>?wilayah=add" class="btn btn-sm btn-outline-secondary">
                        <i class="mdi mdi-library-plus"></i>
                        Tambah
                      </a> -->
                    </div>
                    <div class="col-lg-12 text-center">
                      <h2><?= strtoupper("Data " . array_keys($_GET)[0]) ?></h2>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table  id="myTable" class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            No
                          </th>
                          <th>
                            Action
                          </th>
                          <th>
                            Tanggal History
                          </th>
                          <th>
                            Created At
                          </th>
                          <th>
                            Updated At
                          </th>
                          <th>
                            Tabel
                          </th>
                          <th>
                            Status History
                          </th>
                          <th>
                            Keterangan
                          </th>
                          <th>
                            User
                          </th>
                          <!-- <th>
                            Action
                          </th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        $historys = Querybanyak("SELECT * FROM history");
                        foreach ($historys as $history) { ?>
                          <tr>
                            <td><?= $no++; ?></td>
                            <td>
                              <?= $history['action'] ?>
                            </td>
                            <td>
                              <?= $history['tanggal_history'] ?>
                            </td>
                            <td>
                              <?= $history['created_at'] ?>
                            </td>
                            <td>
                              <?= $history['updated_at'] ?>
                            </td>
                            <td>
                              <?= $history['tabel'] ?>
                            </td>
                            <td>
                              <?= $history['status_history'] ?>
                            </td>
                            <td>
                              <?= $history['keterangan'] ?>
                            </td>
                            <td>
                              <?php 
                                $user = Querysatudata("SELECT username FROM user WHERE id_user = ".$history['id_user']."");
                              ?>
                              <?= $user['username'] ?>
                            </td>

                            <!-- <td>
                              <a href="<?= $url ?>/?wilayah=edit&id=<?= $history['id_history'] ?>" class="btn btn-sm btn-sm btn-outline-secondary btn-icon-text">
                                <i class="ti-pencil-alt btn-icon-append"></i>
                                Edit
                              </a> -->
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