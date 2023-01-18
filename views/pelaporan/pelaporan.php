      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12 text-center">
                      <h2><?= strtoupper("Data " . array_keys($_GET)[0]) ?></h2>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table  id="myTable" class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Pelapor
                          </th>
                          <th>
                            Tanggal Pelaporan
                          </th>
                          <th>
                            Bencana
                          </th>
                          <th>
                            Wilayah
                          </th>
                          <th>
                            No Telp
                          </th>
                          <th>
                            Status Pelaporan
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        switch ($_SESSION['level']) {
                          case "petugas_bpbd":
                            $query_pelapolaran = "SELECT * FROM pelaporan WHERE status_pelaporan != 'belum dikirim' ORDER BY id_pelaporan DESC";
                            break;
                          case "petugas_kajian":
                            $query_pelapolaran = "SELECT * FROM pelaporan WHERE status_pelaporan = 'tervalidasi'  ORDER BY id_pelaporan DESC";
                            break;
                        }
                        $pelaporans = Querybanyak($query_pelapolaran);
                        foreach ($pelaporans as $pelaporan) { ?>
                          <tr>
                            <td>
                              <?php
                              $user = Querysatudata("SELECT nama_user FROM user WHERE id_user = " . $pelaporan['id_user'] . "")
                              ?>
                              <?= $user['nama_user'] ?>
                            </td>
                            <td>
                              <?= $pelaporan['tanggal_pelaporan'] ?>
                            </td>
                            <td>
                            <?php
                              $bencana = Querysatudata("SELECT nama_bencana FROM bencana WHERE id_bencana = " . $pelaporan['id_bencana'] . "")
                              ?>
                              <?= $bencana['nama_bencana'] ?>  
                            </td>
                            <td>
                              <?php
                              $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = " . $pelaporan['id_wilayah'] . "")
                              ?>
                              <?= $wilayah['kecamatan'] ?> / <?= $wilayah['desa'] ?>
                            </td>
                            <td><?= $wilayah['no_telp'] ?></td>
                            <td>
                              <?= $pelaporan['status_pelaporan'] ?>
                            </td>
                            <td>
                              <a href="<?= $url ?>/?pelaporan=lihat&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-danger btn-outline-white btn-sm text-white">
                                <i class="ti-eye"></i>
                                Lihat
                              </a>
                              <?php
                              switch ($_SESSION['level']) {
                                case "petugas_bpbd":
                                  if ($pelaporan['status_pelaporan'] == 'terkirim') { ?>
                                    <a href="<?= $url ?>/?pelaporan=validasi&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-primary btn-outline-white btn-sm text-white">
                                      <i class="ti-check"></i>
                                      Validasi
                                    </a>
                                    <a href="<?= $url ?>/?pelaporan=tidak_valid&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-danger btn-outline-white btn-sm text-white">
                                      <i class="ti-reload"></i>
                                      Tidak Valid
                                    </a>
                                  <?php } elseif ($pelaporan['status_pelaporan'] == 'tervalidasi') { ?>
                                    <a href="#" class="btn btn-success btn-outline-white btn-sm text-white">
                                      <i class="ti-check-box"></i>
                                      valid
                                    </a>
                                    
                                  <?php }
                                  break;
                                case "petugas_kajian":
                                  $cek_peninjauan = Querysatudata("SELECT COUNT(*) as count FROM peninjauan WHERE id_pelaporan = " . $pelaporan['id_pelaporan'] . "");
                                  if ($cek_peninjauan['count'] < 1) {
                                  ?>
                                    <a href="#" id="<?= $pelaporan['id_pelaporan'] ?>" data-id="<?= $pelaporan['id_pelaporan'] ?>" data-idbencana="<?= $pelaporan['id_bencana'] ?>" data-idwilayah="<?= $pelaporan['id_wilayah'] ?>" class="tambahpeninjauan btn btn-primary btn-outline-dark btn-sm text-white" data-toggle="modal" data-target="#modalSaya">
                                      <i class="ti-plus"></i>
                                      Tambah Peninjauan
                                    </a>
                              <?php
                                  }
                                  break;
                              }
                              ?>
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
                  <!-- Contoh Modal -->
                  <div class="modal  fade" id="modalSaya" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalSayaLabel">Form Data Peninjauan Bencana</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="forms-sample" action="<?= $url ?>/?peninjauan=post" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="nama_pelapor">* Nama Peninjau</label>
                              <input type="hidden" class="form-control p-input" id="id_user" name="id_user" value="<?= $_SESSION['id_user'] ?>">
                              <input type="hidden" class="form-control p-input" name="id_pelaporan" id="id_pelaporan">
                              <input type="text" class="form-control p-input" value="<?= $_SESSION['nama_user'] ?>" disabled>
                            </div>
                            <div class="form-group">
                              <label for="tanggal_peninjauan">* Tanggal Peninjauan</label>
                              <input type="date" class="form-control p-input" id="tanggal_peninjauan" name="tanggal_peninjauan" value="<?= date("Y-m-d") ?>">
                            </div>
                            <div class="form-group">
                              <label for="id_wilayah">* Wilayah</label>
                              <select class=" form-control" id="id_wilayah" name="id_wilayah">
                                <?php
                                $wilayahs = Querybanyak("SELECT * FROM wilayah");
                                foreach ($wilayahs as $wilayah) { ?>
                                  <option value="<?= $wilayah['id_wilayah'] ?>"><?= $wilayah['desa'] ?> / <?= $wilayah['kecamatan'] ?></option>
                                <?php
                                }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="id_bencana">* Bencana</label>
                              <select class=" form-control" id="id_bencana" name="id_bencana">
                                <?php
                                $bencanas = Querybanyak("SELECT * FROM bencana");
                                foreach ($bencanas as $bencana) { ?>
                                  <option value="<?= $bencana['id_bencana'] ?>"><?= $bencana['nama_bencana'] ?></option>
                                <?php
                                }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="jumlah_korban">* Korban</label>
                              <input type="number" class="form-control" id="jumlah_korban" name="jumlah_korban">
                            </div>
                            <div class="form-group">
                              <label for="kategori_bencana">* Kategori Bencana</label>
                              <select class=" form-control" id="kategori_bencana" name="kategori_bencana" required>
                                <?php
                                $kategori_bencanas = ["Bencana Alam", "Bencana Non Alam"];
                                foreach ($kategori_bencanas as $kategori_bencana) { ?>
                                  <option value="<?= $kategori_bencana ?>"><?= $kategori_bencana ?></option>
                                <?php
                                }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="level_bencana">* Level Bencana</label>
                              <select class=" form-control" id="level_bencana" name="level_bencana" required>
                                <?php
                                $level_bencanas = [1, 2, 3, 4, 0];
                                foreach ($level_bencanas as $level_bencana) { ?>
                                  <option value="<?= $level_bencana ?>"><?= $level_bencana ?></option>
                                <?php
                                }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="peninjauan">* Keterangan peninjauan</label>
                              <textarea class="form-control" id="keterangan_peninjauan" name="keterangan_peninjauan" style="height: 150px;"></textarea>
                            </div>
                            <div class="form-group">
                              <label for="bukti_peninjauan">* Bukti Peninjauan</label>
                              <input type="file" class="form-control" id="bukti_peninjauan" name="bukti_peninjauan" accept="image/png, image/gif, image/jpeg">
                            </div>
                            <div class="col-12">
                              <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>