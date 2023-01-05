      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <a href="<?= $url ?>?distribusi=add" class="btn btn-sm btn-outline-secondary">
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
                            ID Peninjauan
                          </th>
                          <th>
                            ID Wilayah
                          </th>
                          <th>
                            ID Stok Bantuan
                          </th>
                          <th>
                            Tanggal Distribusi
                          </th>
                          <th>
                            Status Distribusi
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $peninjauans = Querybanyak("SELECT * FROM peninjauan WHERE status_peninjauan != 'selesai' ");
                        foreach ($peninjauans as $peninjauan) { ?>
                          <tr class="bg-danger">
                            <td>
                              <?php
                              $user = Querysatudata("SELECT nama_user FROM pelaporan JOIN user ON pelaporan.id_user = user.id_user
                               WHERE pelaporan.id_pelaporan = " . $peninjauan['id_pelaporan'] . "")
                              ?>
                              <?= $user['nama_user'] ?>
                            </td>
                            <td>
                              <?= $peninjauan['tanggal_peninjauan'] ?>
                            </td>
                            <td>
                              <?php
                              $bencana = Querysatudata("SELECT bencana.nama_bencana FROM pelaporan JOIN bencana ON pelaporan.id_bencana = bencana.id_bencana WHERE pelaporan.id_pelaporan = " . $peninjauan['id_pelaporan'] . "")
                              ?>
                              <?= $bencana['nama_bencana'] ?> / <?= $peninjauan['kategori_bencana'] ?> / <?= $peninjauan['level_bencana'] ?>
                            </td>
                            <td>
                              <?php
                              $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = " . $peninjauan['id_wilayah'] . "")
                              ?>
                              <?= $wilayah['kecamatan'] ?> / <?= $wilayah['desa'] ?>
                            </td>
                            <td>
                              <?= $peninjauan['id_user'] ?>
                            </td>
                            <td>
                              <button class="btn btn-sm btn-sm btn-outline-primary btn-icon-text addpeninjauan" data-toggle="modal" data-id="<?= $peninjauan['id_pelaporan'] ?>" data-target="#modaldistribusi">
                                <i class="ti-plus"></i>
                                Tambah
                              </button>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                        <?php
                        $distribusis = Querybanyak("SELECT * FROM distribusi");
                        foreach ($distribusis as $distribusi) { ?>
                          <tr>
                            <td>
                              <?= $distribusi['id_peninjauan'] ?>
                            </td>
                            <td>
                              <?= $distribusi['id_peninjauan'] ?>
                            </td>
                            <td>
                              <?= $distribusi['tanggal_distribusi'] ?>
                            </td>
                            <td>
                              <?= $distribusi['status_distribusi'] ?>
                            </td>
                            <td>
                              <?= $distribusi['id_user'] ?>
                            </td>
                            <td>
                              <a href="<?= $url ?>/?distribusi=edit&id=<?= $distribusi['id_distribusi'] ?>" class="btn btn-sm btn-sm btn-outline-secondary btn-icon-text">
                                <i class="ti-pencil btn-icon-append"></i>
                                Edit
                              </a>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>

                                            <!-- Modal Distribusi -->
                                            <div class="modal fade" id="modaldistribusi" tabindex="-1" role="dialog" aria-labelledby="modaldistribusiLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="modaldistribusiLabel">Form Tambah Data Distribusi Bantuan </h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <!-- <form class="forms-sample" action="<?= $url ?>/?distribusi=post" method="POST" enctype="multipart/form-data"> -->
                                  <input type="text" class="form-control p-input" id="id_peninjauan" style="display: none;">
                                  <input type="text" class="form-control p-input" id="id_user" value="<?= $_SESSION['id_user'] ?>" style="display: none;">
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label for="tanggal_distribusi">* Tanggal distribusi</label>
                                        <input type="date" class="form-control p-input" id="tanggal_distribusi" value="<?= date('Y-m-d') ?>">
                                      </div>
                                      <div class="table_result" id="table_result">
                                        <ul id="table_result_ul">
                                        </ul>
                                      </div>
                                      <div class="form-group">
                                        <label for="keterangan_distribusi">* Keterangan distribusi</label>
                                        <textarea class="form-control" style="height: 100px;" id="keterangan_distribusi"></textarea>
                                      </div>
                                      <button class="btn btn-primary" onclick="ProcessInsertLogistik()">SIMPAN</button>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label for="search_distribusi">Cari Data Bantuan</label>
                                        <input type="text" class="form-control p-input" id="search_distribusi">
                                      </div>
                                      <div class="result_search" id="result_search">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-12">                                    
                                  </div>
                                  <!-- </form> -->
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                              </div>
                            </div>
                          </div>
                </div>
                <div class="card-footer">

                </div>
              </div>
            </div>

          </div>
        </div>