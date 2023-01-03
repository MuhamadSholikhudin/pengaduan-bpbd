      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <a href="<?= $url ?>?bencana=add" class="btn btn-sm btn-outline-secondary">
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
                            Nama Bencana
                          </th>
                          <th>
                            Kategori bencana
                          </th>
                          <th>
                            level
                          </th>
                          <!-- <th>
                            Wilayah bencana
                          </th> -->
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $bencanas = Querybanyak("SELECT * FROM bencana");
                        foreach ($bencanas as $bencana) { ?>
                          <tr>

                            <td>
                              <?= $bencana['nama_bencana'] ?>
                            </td>
                            <td>
                              <?= $bencana['kategori_bencana'] ?>
                            </td>
                            <td>
                              <?= $bencana['level'] ?>
                            </td>
                            <!-- <td>
                              <?= $bencana['wilayah'] ?>
                            </td> -->
                            <td>
                              <a href="<?= $url ?>/?bencana=edit&id=<?= $bencana['id_bencana'] ?>" class="btn btn-sm btn-sm btn-outline-secondary btn-icon-text">
                                Edit
                                <i class="ti-file btn-icon-append"></i>
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