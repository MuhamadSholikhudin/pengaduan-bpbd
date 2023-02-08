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
                    <table id="myTable" class="table table-striped">
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
                            No Telp Penangung jawab
                          </th>
                          <th>
                            Status Pelaporan
                          </th>
                          <th>
                            Review Pelaporan
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        // Mendefinisikan untuk di pakai petugas kajian
                        $id_petugas_kajian = 0;
                        $nama_petugas_kajian = "NULL";

                        // Memilih menampilkan data looping pelaporan berdasarkan session login
                        switch ($_SESSION['level']) {
                          case "petugas_bpbd": // jika session levelnya petugas bpbd

                            //Query Menampilkan data pelaporan berdasarkan kriteria  status_pelaporan yang tidak belum dikirim dan batal kirim
                            $query_pelapolaran = "SELECT * FROM pelaporan WHERE status_pelaporan != 'belum dikirim' AND status_pelaporan != 'batal kirim' ORDER BY id_pelaporan, tanggal_pelaporan DESC";
                            break;

                          case "petugas_kajian": // jika session levelnya petugas kajian

                            // Query Menampilkan data pelaporan berdasarkan kriteria yang status_pelaporan tervalidasi
                            $query_pelapolaran = "SELECT * FROM pelaporan WHERE status_pelaporan = 'tervalidasi'  ORDER BY id_pelaporan, tanggal_pelaporan DESC";
                            
                            // Menampilkan data petugas_kajian yang session levelnya petugas kajian
                            $petugas_peninjaun = Querysatudata("SELECT * FROM petugas_kajian WHERE id_user = ".$_SESSION['id_user']." "); 
                            
                            // Merubah data id_petugas_kajian dan nama_petugas_kajian
                            $id_petugas_kajian = $petugas_peninjaun['id_petugas_kajian'];
                            $nama_petugas_kajian = $petugas_peninjaun['nama'];
                            break;
                        }
                        $pelaporans = Querybanyak($query_pelapolaran);
                        foreach ($pelaporans as $pelaporan) { ?>
                          <tr>
                            <td>
                              <?php

                              // Menampilkan nama pelapor dari tabel pelapor berdasarkan id_pelapor dari pelaporan
                              $pelapor = Querysatudata("SELECT nama_pelapor FROM pelapor WHERE id_pelapor = " . $pelaporan['id_pelapor'] . "")
                              ?>
                              <?= $pelapor['nama_pelapor'] ?>
                            </td>
                            <td>
                              <?= $pelaporan['tanggal_pelaporan'] ?>
                            </td>
                            <td>
                              <?php

                              // Menampilkan data tabel bencana berdasarkan id_bencana dari pelaporan
                              $bencana = Querysatudata("SELECT nama_bencana FROM bencana WHERE id_bencana = " . $pelaporan['id_bencana'] . "")
                              ?>
                              <?= $bencana['nama_bencana'] ?>
                            </td>
                            <td>
                              <?php
                              // Menampilkan data tabel wilayah berdasarkan id_wilayah dari pelaporan
                              $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = " . $pelaporan['id_wilayah'] . "")
                              ?>
                              <?= $wilayah['kecamatan'] ?> / <?= $wilayah['desa'] ?>
                            </td>
                            <td><a href="tel:+<?= $wilayah['no_telp'] ?>"><?= $wilayah['no_telp'] ?></a></td>

                            <td class="text-center">
                              <!-- Swith tampilan status pelaporan pada admin -->
                              <?php
                              // Check data peninjauan berdasarkan pelaporan
                              $cek_peninjauan = NumRows("SELECT * FROM peninjauan WHERE id_pelaporan = " . $pelaporan['id_pelaporan'] . "");

                              switch ($pelaporan['status_pelaporan']) {

                                case "terkirim": // status_pelaporan datanya terkirim
                                  // Tampilkan  
                                  echo '<button class="btn badge-danger text">data pelaporan belum di proses</button>';
                                  break;

                                case "tervalidasi": // status_pelaporan datanya tervalidasi
                                  if ($_SESSION['level'] == "petugas_kajian") {
                                    echo $pelaporan['status_pelaporan'] . ", belum di tinjau";
                                  } else {
                                    echo $pelaporan['status_pelaporan'];
                                  }
                                  break;

                                default: // default status_pelaporan atau jika tidak ada yang memenuhi
                                  echo $pelaporan['status_pelaporan'];
                                  break;
                              }
                              ?>

                            </td>

                            <td>
                              <?= $pelaporan['review_pelaporan'] ?>
                            </td>

                            <td>

                              <?php
                              switch ($_SESSION['level']) { /// Check yang level user
                                case "petugas_bpbd": // Jika levelnya petugas_bpbd
                                  if ($pelaporan['status_pelaporan'] == 'terkirim') { ?>
                                    <a href="<?= $url ?>/?pelaporan=lihat&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-danger btn-outline-white btn-sm text-white">
                                      <i class="ti-eye"></i>
                                      Lihat
                                    </a>
                                    <a href="<?= $url ?>/?pelaporan=validasi&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-primary btn-outline-white btn-sm text-white">
                                      <i class="ti-check"></i>
                                      Validasi
                                    </a>
                                    <a href="<?= $url ?>/?pelaporan=tidak_valid&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-danger btn-outline-white btn-sm text-white">
                                      <i class="ti-reload"></i>
                                      Tidak Valid
                                    </a>
                                  <?php } elseif ($pelaporan['status_pelaporan'] == 'tervalidasi') { ?>
                                    <a href="<?= $url ?>/?pelaporan=lihat&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-danger btn-outline-white btn-sm text-white">
                                      <i class="ti-eye"></i>
                                      Lihat
                                    </a>
                                    <a href="#" class="btn btn-success btn-outline-white btn-sm text-white">
                                      <i class="ti-check-box"></i>
                                      valid
                                    </a>
                                  <?php }
                                  break;

                                case "petugas_kajian": // Jika levelnya petugas_kajian
                                  if ($cek_peninjauan < 1) {
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
                  <!-- Modal Add Peninjauan -->
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
                            <div class="row">
                              <div class="col-sm-4">
                                <div class="form-group">
                                  <label for="nama_pelapor">* Nama Peninjau</label>
                                  <?php
                                  //Peninjauan
                                  ?>
                                  <input type="text" class="form-control p-input" id="id_petugas_kajian" name="id_petugas_kajian" value="<?= $id_petugas_kajian ?>">
                                  <input type="text" class="form-control p-input" name="id_pelaporan" id="id_pelaporan">
                                  <input type="text" class="form-control p-input" value="<?= $nama_petugas_kajian ?>" disabled>
                                </div>

                                <div class="form-group">
                                  <label for="tanggal_peninjauan">* Tanggal Peninjauan</label>
                                  <input type="date" class="form-control p-input" id="tanggal_peninjauan" name="tanggal_peninjauan" value="<?= date("Y-m-d") ?>">
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
                                  <label for="dusun">* Dusun</label>
                                  <input type="text" class="form-control" id="dusun" name="dusun">
                                </div>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label for="rt">* Rt</label>
                                      <input type="text" class="form-control" id="rt" name="rt">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label for="rw">* Rw</label>
                                      <input type="text" class="form-control" id="rw" name="rw">
                                    </div>
                                  </div>
                                </div>
                              </div><!--col-sm-4 -->
                              <div class="col-sm-4">

                                <div class="row">
                                  <div class="text-center">
                                    <label for="Jumlah_terdampak">* Jumlah Korban Terdampak</label>
                                  </div>

                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label for="jumlah_kk">KK</label>
                                      <input type="number" class="form-control" id="jumlah_kk" name="jumlah_kk" min="0" value="0">
                                    </div>

                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label for="jumlah_korban">Jiwa</label>
                                      <input type="number" class="form-control" id="jumlah_korban" name="jumlah_korban" min="0" value="0">
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label for="jumlah_rumah">Rumah</label>
                                      <input type="number" class="form-control" id="jumlah_rumah" name="jumlah_rumah" min="0" value="0">
                                    </div>
                                  </div>
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
                                    $level_bencanas = [1 => "Ringan", 2 => "Waspada", 3 => "Siaga", 4 => "Awas", 0 => "Aman"];
                                    foreach ($level_bencanas as $level_bencana => $val) { ?>
                                      <option value="<?= $level_bencana ?>"><?= $level_bencana ?> = <?= $val ?></option>
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
                                  <input type="file" class="form-control" id="bukti_peninjauan" name="bukti_peninjauan" onchange="loadFilebukti_peninjauan(event)" accept="image/png, image/gif, image/jpeg">
                                  <br>
                                  <div class="card " id="d_bukti_peninjauan">
                                    <img id="i_bukti_peninjauan">
                                  </div>
                                </div>
                                <script>
                                  var loadFilebukti_peninjauan = function(event) {
                                    var output = document.getElementById('i_bukti_peninjauan');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                    output.onload = function() {
                                      URL.revokeObjectURL(output.src) // free memory
                                    }
                                  };
                                </script>
                              </div><!--col-sm-4 -->

                              <div class="col-sm-4">
                                <div class="form-group">
                                  <label for="sebab">* Sebab</label>
                                  <textarea class="form-control" id="sebab" name="sebab" style="height: 150px;"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="akibat">* Akibat</label>
                                  <textarea class="form-control" id="akibat" name="akibat" style="height: 150px;"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="upaya_penanganan">* Upaya penanganan</label>
                                  <textarea class="form-control" id="upaya_penanganan" name="upaya_penanganan" style="height: 150px;"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="lain_lain">* Lain-lain</label>
                                  <textarea class="form-control" id="lain_lain" name="lain_lain" style="height: 150px;"></textarea>
                                </div>

                              </div><!--col-sm-4 -->
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
