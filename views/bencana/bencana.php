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
                    <table  id="myTable" class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            No
                          </th>
                          <th>
                            Nama Bencana
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        $bencanas = Querybanyak("SELECT * FROM bencana");
                        foreach ($bencanas as $bencana) { ?>
                          <tr>
                            <td>
                              <?= $no++; ?>
                            </td>

                            <td>
                              <?= $bencana['nama_bencana'] ?>
                            </td>
                         
                            <td>
                              <a href="<?= $url ?>/?bencana=edit&id=<?= $bencana['id_bencana'] ?>" class="btn btn-sm btn-sm btn-outline-secondary btn-icon-text">
                                <i class="ti-pencil-alt btn-icon-append"></i>
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