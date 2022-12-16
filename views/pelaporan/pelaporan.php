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
                      <h2><?= strtoupper("Data ". array_keys($_GET)[0]) ?></h2>
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
                            Pelaporan
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $pelaporans = Querybanyak("SELECT * FROM pelaporan");
                          foreach($pelaporans as $pelaporan){?>
                                                  <tr>
                          <td>
                            <?= $pelaporan['id_user'] ?>
                          </td>
                          <td>
                            <?= $pelaporan['tanggal_pelaporan'] ?>
                          </td>
                          <td>
                            <?= $pelaporan['pelaporan'] ?>
                          </td>
                          <td>
                            <a href="<?= $url ?>/?pelaporan=edit&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-sm btn-sm btn-outline-secondary btn-icon-text">
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
