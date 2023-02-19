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
                              $petugas_kajian = Querysatudata("SELECT nama FROM petugas_kajian WHERE id_petugas_kajian = " . $peninjauan['id_petugas_kajian'] . " ");
                              ?>
                              <?= $petugas_kajian['nama'] ?> , <?= $peninjauan['tanggal_peninjauan'] ?>
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
                              <!-- STATUS DISTRIBUSI -->
                              <?php
                              // Colomn status_distribusi
                              if ($_SESSION['level'] == "petugas_logistik" ) { // petugas logistik 
                                if($distribusi['status_distribusi'] == "Setujui" || $distribusi['status_distribusi'] == "Sedang di proses" || $distribusi['status_distribusi'] == "Sedang dalam perjalanan" || $distribusi['status_distribusi'] == "Sudah sampai" || $distribusi['status_distribusi'] == "Selesai" ){
                                  ?>
                                  <a href="#" data-id="<?= $distribusi['id_distribusi'] ?>" data-status="<?= $distribusi['status_distribusi'] ?>" class="status_distribusi badge bg-primary btn-outline-danger text-white" data-toggle="modal" data-target="#modaleditstatusdistribusi">
                                    <?= $distribusi['status_distribusi'] ?>
                                  </a>
                                <?php
                                }else{
                                  echo $distribusi['status_distribusi'];
                                }
                              } 
                              
                              
                              elseif ($_SESSION['level'] == "petugas_kajian") { // Petugas kajian
                                if($distribusi['status_distribusi'] == "Sedang dalam perjalanan" || $distribusi['status_distribusi'] == "Sudah sampai" || $distribusi['status_distribusi'] == "Selesai"){
                              ?>
                                <a href="#" data-id="<?= $distribusi['id_distribusi'] ?>" data-status="<?= $distribusi['status_distribusi'] ?>" class="status_distribusi badge bg-primary btn-outline-danger text-white" data-toggle="modal" data-target="#modaleditstatusdistribusi">
                                  <?= $distribusi['status_distribusi'] ?>
                                </a>
                              <?php
                                }else{
                                  echo $distribusi['status_distribusi'];
                                }
                              } 
                              
                              // session level selain petugas kajian dan petugas logistik
                              else {
                                echo $distribusi['status_distribusi'];
                              }                              
                              ?>
                              <!-- STATUS DISTRIBUSI -->
                            </td>
                            <td>
                              <img src="<?= $url ?>/gambar/bukti_distribusi/<?= $distribusi['bukti_distribusi'] ?>" alt="">
                            </td>
                            <td>
                              <!-- ACTION DISTRIBUSI -->
                              <a href="<?= $url ?>/?distribusi=lihat&id=<?= $distribusi['id_distribusi'] ?>" class="btn btn-sm btn-sm btn-outline-warning btn-icon-text">
                                <i class="ti-eye btn-icon-append"></i>
                                Lihat
                              </a>

                              <?php if ($_SESSION['level'] == "petugas_logistik") { // jika level nya petugas logistik 
                                if( $distribusi['status_distribusi'] == "Setujui" ||  $distribusi['status_distribusi'] == "Persiapan di kendaraan" || $distribusi['status_distribusi'] == "Sedang di proses"){
                                  ?>
                                  <a href="<?= $url ?>/?distribusi=edit&id=<?= $distribusi['id_distribusi'] ?>" class="btn btn-sm btn-sm btn-outline-secondary btn-icon-text">
                                    <i class="ti-pencil-alt btn-icon-append"></i>
                                    Edit
                                  </a>
                                  <?php
                                }
                                // Check jumlah data publikasi berdasarkan distribusi sudah ada
                                $cekcountpublikasi = NumRows("SELECT * FROM publikasi WHERE id_distribusi = " . $distribusi['id_distribusi'] . "");
                                if ($cekcountpublikasi == 0) { // Jika belum di publikasikan
                                ?>
                                  <a href="<?= $url ?>/?distribusi=add_publikasi&id=<?= $distribusi['id_distribusi'] ?>" class="btn btn-sm btn-sm btn-outline-success btn-icon-text">
                                    + Publikasi
                                  </a>
                                <?php
                                }else{
                                  $publikasi = Querysatudata("SELECT * FROM publikasi WHERE id_distribusi = " . $distribusi['id_distribusi'] . "");

                                  ?>
                                  <a href="<?= $url ?>/?publikasi=lihat&id=<?= $publikasi['id_publikasi'] ?>" class="btn btn-sm btn-sm btn-outline-success btn-icon-text">
                                    lihat Publikasi
                                  </a>
                                <?php
                                }
                                ?>
                                <?php
                                

                              } elseif ($_SESSION['level'] == "petugas_kajian") { //Level petugas kajian
                                if ($distribusi['status_distribusi'] == "" || $distribusi['status_distribusi'] == NULL || $distribusi['status_distribusi'] == "tidak setujui") {
                                ?>
                                <a href="<?= $url ?>/?distribusi=kirim&id=<?= $distribusi['id_distribusi'] ?>" class="btn btn-sm btn-sm btn-outline-primary btn-icon-text">
                                  <i class="ti-arrow-top-right"></i>
                                  Kirim
                                </a>
                                <a href="<?= $url ?>/?distribusi=edit&id=<?= $distribusi['id_distribusi'] ?>" class="btn btn-sm btn-sm btn-outline-secondary btn-icon-text">
                                  <i class="ti-pencil-alt btn-icon-append"></i>
                                  Edit
                                </a>
                              <?php
                                } elseif ($distribusi['status_distribusi'] == "kirim") {
                                ?>
                                  <a href="<?= $url ?>/?pelaporan_masyarakat=batal_kirim&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-secondary btn-outline-white btn-sm text-dark">
                                    <i class="ti-back-left"></i>
                                    Batalkan
                                  </a>
                                <?php
                                }
                              }

                              elseif($_SESSION['level'] == "kepala_bpbd"){ // Level kepala BPBD ?>
                                <a href="<?= $url ?>/?distribusi=persetujuan&id=<?= $distribusi['id_distribusi'] ?>" class="btn btn-sm btn-sm btn-outline-success btn-icon-text">
                                  <i class="ti-check btn-icon-append"></i>
                                    Persetujuan
                                </a>
                              <?php 
                              }
                              ?>
                            </td>
                            <!-- ACTION DISTRIBUSI -->

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
                                    $status_diss = ['Persiapan di kendaraan', 'Sedang di proses', 'Setujui', 'Sedang dalam perjalanan', 'Sudah sampai', 'Selesai'];
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