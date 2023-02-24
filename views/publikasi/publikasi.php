      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <!-- <a href="<?= $url ?>?publikasi=add" class="btn btn-sm btn-outline-secondary">
                        <i class="mdi mdi-library-plus"></i>
                        Tambah
                      </a> -->
                    </div>
                    <div class="col-lg-12 text-center">
                      <h2>DATA PUBLIKASI</h2>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table id="myTable" class=" display">
                      <thead>
                        <tr>
                          <th>
                            No
                          </th>
                          <th>
                            Judul
                          </th>
                          <th>
                            Kategori
                          </th>
                          <th>
                            Tanggal Publikasi
                          </th>
                          <th>
                            Gambar
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        $publikasis = Querybanyak("SELECT * FROM publikasi ORDER BY id_publikasi DESC");
                        foreach ($publikasis as $publikasi) {
                        ?>
                          <tr>
                            <td class="py-1">
                              <?= $no++; ?>
                            </td>
                            <td>
                              <?= $publikasi['judul']; ?>
                            </td>
                            <td>
                              <?= $publikasi['kategori']; ?>
                            </td>
                            <td>
                              <?= TanggalIndonesia($publikasi['tanggal_publikasi']) ?>
                            </td>
                            <td>
                              <img class="img" height="50" src="<?= $url ?>/gambar/publikasi/<?= $publikasi['gambar'] ?>" alt="">
                            </td>
                            <td>
                              <a href="<?= $url ?>/?publikasi=edit&id=<?= $publikasi['id_publikasi']; ?>" class="btn btn-lg btn-outline-warning btn-icon-text">
                                <i class="ti-pencil-alt"></i>
                                Edit
                              </a>
                              <a href="<?= $url ?>/?publikasi=lihat&id=<?= $publikasi['id_publikasi'] ?>" class="btn btn-sm btn-sm btn-outline-success btn-icon-text">
                              <i class="ti-eye"></i>      
                              lihat
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