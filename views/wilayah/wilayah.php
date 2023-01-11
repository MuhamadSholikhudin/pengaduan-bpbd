      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <a href="<?= $url ?>?wilayah=add" class="btn btn-sm btn-outline-secondary">
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
                            Kecamatan
                          </th>
                          <th>
                            Desa
                          </th>
                          <th>
                            No Telp
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $wilayahs = Querybanyak("SELECT * FROM wilayah");
                        foreach ($wilayahs as $wilyah) { ?>
                          <tr>
                            <td>
                              <?= $wilyah['kecamatan'] ?>
                            </td>
                            <td>
                              <?= $wilyah['desa'] ?>
                            </td>
                            <td>
                              <?= $wilyah['no_telp'] ?>
                            </td>
                            <td>
                              <a href="<?= $url ?>/?wilayah=edit&id=<?= $wilyah['id_wilayah'] ?>" class="btn btn-sm btn-sm btn-outline-secondary btn-icon-text">
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