      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <a href="<?= $url ?>?bantuan=add" class="btn btn-sm btn-outline-secondary">
                        <i class="mdi mdi-library-plus"></i>
                        Tambah
                      </a>
                    </div>
                    <div class="col-lg-12 text-center">
                      <h2>DATA BANTUAN</h2>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table id="myTable" class="disply table table-striped ">
                      <thead>
                        <tr>
                          <th>
                            Nama Bantuan
                          </th>
                          <th>
                            Kategori
                          </th>
                          <th>
                            Satuan
                          </th>
                          <th>
                            Batch
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $bantuans = Querybanyak("SELECT * FROM bantuan");
                        foreach ($bantuans as $bantuan) { ?>
                          <tr>

                            <td>
                              <?= $bantuan['nama_bantuan'] ?>
                            </td>
                            <td>
                                <?= $bantuan['kategori'] ?>
                            </td>
                            <td>
                            <?= $bantuan['satuan'] ?>
                            </td>
                            <td>
                            <?= $bantuan['batch'] ?>
                            </td>
                            <td>
                              <a href="<?= $url ?>/?bantuan=edit&id=<?= $bantuan['id_bantuan'] ?>" class="btn btn-success">
                                <i class="ti-pencil"></i>
                                Edit
                              </a>
                              <a href="<?= $url ?>/?bantuan=stok&id=<?= $bantuan['id_bantuan'] ?>" class="btn btn-primary">
                                <i class="ti-pencil"></i>
                                Stok
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