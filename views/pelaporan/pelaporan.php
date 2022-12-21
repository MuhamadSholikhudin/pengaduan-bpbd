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
                            Wilayah
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
                            $query_pelapolaran = "SELECT * FROM pelaporan WHERE status_pelaporan != 'belum dikirim' ";
                            break;
                          case "petugas_kajian":
                            $query_pelapolaran = "SELECT * FROM pelaporan WHERE status_pelaporan = 'tervalidasi' ";
                            break;
                        }
                        // $query_pelapolaran = "SELECT * FROM pelaporan ";
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
                              $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = " . $pelaporan['id_wilayah'] . "")
                              ?>
                              <?= $wilayah['kecamatan'] ?> / <?= $wilayah['desa'] ?>
                              <?= $pelaporan['id_wilayah'] ?>
                            </td>
                            <td>
                              <?= $pelaporan['status_pelaporan'] ?>
                            </td>
                            <td>
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

                                  ?>
                                  <a href="#" id="<?= $pelaporan['id_pelaporan'] ?>" data-id="<?= $pelaporan['id_pelaporan'] ?>" class="tambahpeninjauan btn btn-primary btn-outline-dark btn-sm text-white" data-toggle="modal" data-target="#modalSaya">
                                    <i class="ti-plus"></i>
                                    Tambah Peninjauan
                                </a>
                              <?php
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
                          <h5 class="modal-title" id="modalSayaLabel">Form Peninjauan Data Bencana</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="forms-sample" action="<?= $url ?>/?peninjauan=post" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="nama_pelapor">* Nama pelapor</label>
                              <input type="hidden" class="form-control p-input" id="id_user" name="id_user" value="<?= $_SESSION['id_user'] ?>" >
                              <input type="hidden" class="form-control p-input" name="id_pelaporan" id="id_pelaporan">
                              <input type="text" class="form-control p-input"  value="<?= $_SESSION['nama_user'] ?>" disabled>
                            </div>
                            <div class="form-group">
                              <label for="tanggal_peninjauan">* Tanggal Peninjauan</label>
                              <input type="date" class="form-control p-input" id="tanggal_peninjauan"  name="tanggal_peninjauan" value="<?= date("Y-m-d") ?>">
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
                              <label for="jumlah_korban">* Korban</label>
                              <input type="number" class="form-control" id="jumlah_korban" name="jumlah_korban">
                            </div>
                            <div class="form-group">
                              <label for="peninjauan">* Keterangan peninjauan</label>
                              <textarea class="form-control" id="keterangan_peninjauan" name="keterangan_peninjauan" style="height: 150px;"></textarea>
                            </div>
                            <div class="form-group">
                              <label for="bukti_peninjauan">* Bukti Peninjauan</label>
                              <input type="file" class="form-control" id="bukti_peninjauan" name="bukti_peninjauan" accept="image/png, image/gif, image/jpeg" >
                            </div>
                            <div class="col-12">
                              <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                          <!-- <button type="button" class="btn btn-primary">Oke</button> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

    