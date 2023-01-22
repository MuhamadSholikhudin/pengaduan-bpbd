      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <!-- <div class="col-lg-12">
                      <a href="<?= $url ?>?peninjauan=add" class="btn btn-sm btn-outline-secondary">
                        <i class="mdi mdi-library-plus"></i>
                        Tambah
                      </a>
                    </div> -->
                    <div class="col-lg-12 text-center">
                      <h2><?= strtoupper("Data " . array_keys($_GET)[0]) ?></h2>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Pelapor
                          </th>
                          <th>
                            Tanggal peninjauan
                          </th>
                          <th>
                            Bencana
                          </th>
                          <th>
                            Wilayah
                          </th>
                          <th>
                            Korban
                          </th>
                          <th>
                            Status Peninjauan
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $peninjauans = Querybanyak("SELECT * FROM peninjauan ORDER BY id_peninjauan DESC");
                        foreach ($peninjauans as $peninjauan) { ?>
                          <tr>
                            <td>
                              <?php
                              $pelaporanuser = Querysatudata("SELECT user.nama_user as nama_user, pelaporan.id_bencana as id_bencana FROM pelaporan JOIN user ON pelaporan.id_user = user.id_user
                               WHERE pelaporan.id_pelaporan = " . $peninjauan['id_pelaporan'] . "")
                              ?>
                              <?= $pelaporanuser['nama_user'] ?>
                            </td>
                            <td>
                              <?= $peninjauan['tanggal_peninjauan'] ?>
                            </td>
                            <td>
                              <?php
                              $bencana = Querysatudata("SELECT nama_bencana FROM  bencana WHERE id_bencana = " . $pelaporanuser['id_bencana'] . " ");
                              ?>
                              <?= $bencana['nama_bencana'] ?> / <?= $peninjauan['kategori_bencana'] ?>
                            </td>
                            <td>
                              <?php
                              $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = " . $peninjauan['id_wilayah'] . "")
                              ?>
                              <?= $wilayah['kecamatan'] ?> / <?= $wilayah['desa'] ?>
                            </td>
                            <td>
                              <?= $peninjauan['jumlah_korban'] ?>
                            </td>
                            <td>
                              <!-- Update status peninjauan -->
                              <?php if ($_SESSION['level'] == "petugas_kajian") { ?>
                                <a href="#" data-id="<?= $peninjauan['id_peninjauan'] ?>" data-status="<?= $peninjauan['status_peninjauan'] ?>" class="status_peninjauan badge bg-primary btn-outline-danger text-white" data-toggle="modal" data-target="#modaleditstatuspeninjauan">
                                  <?= $peninjauan['status_peninjauan'] ?>
                                </a>
                              <?php } else {
                                echo  $peninjauan['status_peninjauan'];
                              } ?>
                            </td>
                            <td>
                              <?php if ($_SESSION['level'] == "petugas_logistik" && $peninjauan['status_peninjauan'] != "selesai") { ?>
                                <button class="btn btn-sm btn-sm btn-outline-primary btn-icon-text addpeninjauan" data-toggle="modal" data-id="<?= $peninjauan['id_peninjauan'] ?>" data-target="#modaldistribusi">
                                  <i class="ti-plus"></i>
                                  Tambah Distribusi
                                </button>
                              <?php } elseif ($_SESSION['level'] == "petugas_logistik" && $peninjauan['status_peninjauan'] == "selesai") { 
                                
                              }elseif ($_SESSION['level'] == "petugas_kajian") { ?>
                                <a class="btn btn-sm btn-sm btn-outline-warning btn-icon-text">
                                  <i class="ti-alert"></i>
                                  Beritahu
                                </a>
                                <a href="<?= $url ?>/?peninjauan=edit&id=<?= $peninjauan['id_peninjauan'] ?>" class="btn btn-sm btn-sm btn-outline-secondary btn-icon-text">
                                  <i class="ti-pencil-alt"></i>
                                  Edit
                                </a>
                              <?php } ?>

                            </td>
                          </tr>
                        <?php
                        }
                        ?>

                      </tbody>
                    </table>
                  </div>

                  <!-- Modal Distribusi -->
                  <dsiv class="modal fade" id="modaldistribusi" tabindex="-1" role="dialog" aria-labelledby="modaldistribusiLabel" aria-hidden="true">
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
                                <label for="bencana">Bencana</label>
                                <input type="text" class="form-control p-input" id="bencana" disabled readonly>
                              </div>
                              <div class="form-group">
                                <label for="keterangan_peninjauan">Keterangan Peninjauan</label>
                                <textarea class="form-control" style="height: 100px;" id="keterangan_peninjauan" readonly></textarea>
                              </div>
                              <div class="form-group">
                                <label for="tanggal_distribusi">* Tanggal distribusi</label>
                                <input type="date" class="form-control p-input" id="tanggal_distribusi" value="<?= date('Y-m-d') ?>">
                              </div>
                              <div class="table_result" id="table_result">
                                <div class="table-responsive">
                                  <table class="table table-striped" id="tablleresult">
                                  </table>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="keterangan_distribusi">* Keterangan distribusi</label>
                                <textarea class="form-control" style="height: 100px;" id="keterangan_distribusi"></textarea>
                              </div>
                              <button class="btn btn-primary" onclick="ProcessInsertLogistikStok()"> <i class="ti-marker"></i> SIMPAN</button>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label for="search_distribusi">Cari Data Bantuan</label>
                                <!-- <input type="text" class="form-control p-input" id="search_distribusi"> -->
                                <input type="text" class="form-control p-input" id="search_distribusi_stok_bantuan">
                              </div>
                              <div class="table-responsive">
                                <table class="result_search table table-striped" id="result_search">
                                </table>
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

                <!-- Modal Status Peninjauan -->
                <div class="modal fade" id="modaleditstatuspeninjauan" tabindex="-1" role="dialog" aria-labelledby="modaleditstatuspeninjauanLabel" aria-hidden="true">
                  <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modaleditstatuspeninjauanLabel">Form Edit Status Peninjauan </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="forms-sample" action="<?= $url ?>/?peninjauan=update_status" method="POST" enctype="multipart/form-data">
                          <input type="text" class="form-control p-input" id="id_user" value="<?= $_SESSION['id_user'] ?>" style="display: none;">
                          <input name="id_peninjauan" id="edit_id_peninjauan" style="display: none;" />
                          <div class="row">
                            <div class="col-12">
                              <div class="form-group">
                                <label for="status_peninjauan">* Status peninjauan</label>
                                <select class="form-control" id="status_peninjauan" name="status_peninjauan">
                                  <?php
                                  $status_penin = ['dalam proses', 'sudah meninjau',  'selesai'];
                                  foreach ($status_penin as $penin) { ?>
                                    <option value="<?= $penin ?>"><?= $penin ?></option>
                                  <?php
                                  }
                                  ?>
                                </select>
                              </div>
                              <div class="form-group text-center">
                                <button class="btn btn-success "> <i class="ti-pencil-alt"></i>Update</button>
                              </div>
                            </div>
                        </form>
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