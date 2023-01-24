      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <!-- 
                        <a href="<?= $url ?>?distribusi=add" class="btn btn-sm btn-outline-secondary">
                          <i class="mdi mdi-library-plus"></i>
                          Tambah
                        </a> 
                    -->
                    </div>
                    <div class="col-lg-12 text-center">
                      <h2><?= strtoupper("Data " . array_keys($_GET)[0]) ?></h2>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            No
                          </th>
                          <th>
                            Peninjauan
                          </th>
                          <th>
                            Bencana
                          </th>
                          <th>
                            Wilayah
                          </th>
                          <th>
                            Tanggal Distribusi
                          </th>
                          <th>
                            Status Distribusi
                          </th>
                          <th>
                            Bukti Distribusi
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <!--
                        <?php
                        $peninjauans = Querybanyak("SELECT * FROM peninjauan WHERE status_peninjauan != 'selesai' ");
                        foreach ($peninjauans as $peninjauan) { ?>
                          <tr class="bg-danger">
                            <td>
                              <?php
                              $benwil = Querysatudata("SELECT * FROM peninjauan LEFT JOIN bencana ON peninjauan.id_bencana = bencana.id_bencana JOIN wilayah ON peninjauan.id_wilayah = wilayah.id_wilayah WHERE peninjauan.id_peninjauan = " . $peninjauan['id_peninjauan'] . " ");
                              $bencana = Querysatudata("SELECT bencana.nama_bencana FROM pelaporan JOIN bencana ON pelaporan.id_bencana = bencana.id_bencana WHERE pelaporan.id_pelaporan = " . $peninjauan['id_pelaporan'] . "");
                              $user_tinjau = Querysatudata("SELECT * FROM user  WHERE id_user = " . $peninjauan['id_user'] . "");
                              ?>
                              <?= $user_tinjau['nama_user'] ?>, <?= $peninjauan['tanggal_peninjauan'] ?>
                            </td>
                            <td>
                              <?= $benwil['nama_bencana'] ?> / <?= $peninjauan['kategori_bencana'] ?> / <?= $peninjauan['level_bencana'] ?>
                            </td>
                            <td>
                              <?= $benwil['kecamatan'] ?> / <?= $benwil['desa'] ?>
                            </td>
                            <td>

                            </td>
                            <td>
                              Belum di Proses
                            </td>
                            <td>
                              <button class="btn btn-sm btn-sm btn-outline-primary btn-icon-text addpeninjauan" data-toggle="modal" data-id="<?= $peninjauan['id_peninjauan'] ?>" data-target="#modaldistribusi">
                                <i class="ti-plus"></i>
                                Tambah
                              </button>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                        -->
                        <?php
                        $no = 1;
                        $distribusis = Querybanyak("SELECT * FROM distribusi ORDER BY id_distribusi DESC");
                        foreach ($distribusis as $distribusi) { ?>
                          <tr>
                            <td>
                              <?= $no++; ?>
                            </td>
                            <td>
                              <?php
                              $peninjauan = Querysatudata("SELECT * FROM peninjauan LEFT JOIN bencana ON peninjauan.id_bencana = bencana.id_bencana JOIN wilayah ON peninjauan.id_wilayah = wilayah.id_wilayah WHERE peninjauan.id_peninjauan = " . $distribusi['id_peninjauan'] . " ");
                              $user_tinjau = Querysatudata("SELECT nama_user FROM user WHERE id_user = " . $peninjauan['id_user'] . " ");
                              ?>
                              <?= $user_tinjau['nama_user'] ?> , <?= $peninjauan['tanggal_peninjauan'] ?>
                            </td>
                            <td>
                              <?= $peninjauan['nama_bencana'] ?>
                            </td>
                            <td>
                              <?= $peninjauan['kecamatan'] ?> / <?= $peninjauan['desa'] ?>
                            </td>
                            <td>
                              <?= $distribusi['tanggal_distribusi'] ?>
                            </td>
                            <td>
                              <?php
                              if ($_SESSION['level'] == "petugas_logistik") { ?>
                                <a href="#" data-id="<?= $distribusi['id_distribusi'] ?>" data-status="<?= $distribusi['status_distribusi'] ?>" class="status_distribusi badge bg-primary btn-outline-danger text-white" data-toggle="modal" data-target="#modaleditstatusdistribusi">
                                  <?= $distribusi['status_distribusi'] ?>
                                </a>
                              <?php
                              } elseif ($_SESSION['level'] == "petugas_kajian" and $distribusi['status_distribusi'] != "Persiapan di kendaraan" and $distribusi['status_distribusi'] != "Sedang di proses") {
                              ?>
                                <a href="#" data-id="<?= $distribusi['id_distribusi'] ?>" data-status="<?= $distribusi['status_distribusi'] ?>" class="status_distribusi badge bg-primary btn-outline-danger text-white" data-toggle="modal" data-target="#modaleditstatusdistribusi">
                                  <?= $distribusi['status_distribusi'] ?>
                                </a>
                              <?php
                              } else {
                                echo $distribusi['status_distribusi'];
                              }
                              ?>
                            </td>
                            <td>
                              <img src="<?= $url ?>/gambar/bukti_distribusi/<?= $distribusi['bukti_distribusi'] ?>" alt="">
                            </td>
                            <td>
                              <a href="<?= $url ?>/?distribusi=lihat&id=<?= $distribusi['id_distribusi'] ?>" class="btn btn-sm btn-sm btn-outline-warning btn-icon-text">
                                <i class="ti-eye btn-icon-append"></i>
                                Lihat
                              </a>
                              <?php if ($_SESSION['level'] == "petugas_logistik") { ?>
                                <a href="<?= $url ?>/?distribusi=edit&id=<?= $distribusi['id_distribusi'] ?>" class="btn btn-sm btn-sm btn-outline-secondary btn-icon-text">
                                  <i class="ti-pencil-alt btn-icon-append"></i>
                                  Edit
                                </a>
                              <?php
                              }
                              ?>


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
                              <button class="btn btn-primary" onclick="ProcessInsertLogistikStok()">SIMPAN</button>
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
                  <!-- Modal Distribusi -->
                  <div class="modal fade" id="modaleditstatusdistribusi" tabindex="-1" role="dialog" aria-labelledby="modaleditstatusdistribusiLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modaleditstatusdistribusiLabel">Form Edit Status Distribusi </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="forms-sample" action="<?= $url ?>/?distribusi=update_status" method="POST" enctype="multipart/form-data">
                            <input type="text" class="form-control p-input" id="id_user" value="<?= $_SESSION['id_user'] ?>" style="display: none;">
                            <input name="id_distribusi" id="edit_id_distribusi" style="display: none;" />
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group" id="form-distribusi">
                                  <label for="bukti_distribusi">* Bukti distribusi</label>
                                  <input type="file" class="form-control" name="bukti_distribusi">
                                </div>
                                <div class="form-group">
                                  <label for="status_distribusi">* Status Distribusi</label>
                                  <select class="form-control" id="status_distribusi" name="status_distribusi">
                                    <?php
                                    $status_diss = ['Persiapan di kendaraan', 'Sedang di proses', 'Sedang dalam perjalanan', 'Sudah sampai', 'Selesai'];
                                    if ($_SESSION['level'] == "petugas_kajian") {
                                      $status_diss = ['Sedang dalam perjalanan', 'Sudah sampai', 'Selesai'];
                                    }
                                    foreach ($status_diss as $status_dis) { ?>
                                      <option value="<?= $status_dis ?>"><?= $status_dis ?></option>
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