        <?php
        $id = $_GET['id'];

        // Menampilkan data peninjauan berdasarkan id_peninjauan dari $_GET['id']
        $cari_peninjauan_berdasarkan_id_peninjauan = "SELECT * FROM peninjauan WHERE id_peninjauan = " . $_GET['id'] . "";
        $satu_peninjauan = Querysatudata($cari_peninjauan_berdasarkan_id_peninjauan);

        // Menampilkan data pelaporan berdasarkan id_pelaporan 
        $sql_pelaporan = "SELECT bencana.nama_bencana FROM pelaporan JOIN bencana ON pelaporan.id_bencana WHERE pelaporan.id_pelaporan = " . $satu_peninjauan['id_pelaporan'] . "";
        $pelaporan = Querysatudata($sql_pelaporan);

        //Menampilkan data petugas kajian berdasarkan session login id_user
        $sql_petugas_kajian = "SELECT * FROM petugas_kajian WHERE id_user = ".$_SESSION['id_user']."";
        $petugas_kajian = Querysatudata($sql_petugas_kajian);

        ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-header">
                    <h2><?= strtoupper("Lihat data " . array_keys($_GET)[0]) ?></h2>
                  </div>
                  <div class="card-body">
                    <div class="row">

                      <form class="forms-sample" action="<?= $url ?>/?peninjauan=update" method="POST" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="nama_pelapor">* Nama Peninjau</label>
                              <input type="hidden" class="form-control p-input" id="id_peninjauan" name="id_peninjauan" value="<?= $satu_peninjauan['id_peninjauan'] ?>">
                              <input type="hidden" class="form-control p-input" id="id_petugas_kajian" name="id_petugas_kajian" value="<?= $petugas_kajian['id_petugas_kajian'] ?>">
                              <input type="hidden" class="form-control p-input" name="id_pelaporan" id="id_pelaporan" value="<?= $satu_peninjauan['id_pelaporan'] ?>">
                              <?php 
                                $sql_kajian_old = "SELECT * FROM petugas_kajian  WHERE id_petugas_kajian = ".$satu_peninjauan['id_petugas_kajian']." ";
                                $kajian_old = Querysatudata($sql_kajian_old);
                              ?>
                              <input type="text" class="form-control p-input" value="<?= $kajian_old['nama'] ?>" disabled>
                            </div>

                            <div class="form-group">
                              <label for="tanggal_peninjauan">* Tanggal Peninjauan</label>
                              <input type="date" class="form-control p-input" id="tanggal_peninjauan" name="tanggal_peninjauan" value="<?= $satu_peninjauan['tanggal_peninjauan'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="id_bencana">* Bencana</label>
                              <select class="js-example-basic-single form-control" id="id_bencana" name="id_bencana">
                                <?php
                                $bencanas = Querybanyak("SELECT * FROM bencana");
                                foreach ($bencanas as $bencana) { ?>
                                  <?php if ($satu_peninjauan['id_bencana'] == $bencana['id_bencana']) { ?>
                                    <option value="<?= $bencana['id_bencana'] ?>" selected><?= $bencana['nama_bencana'] ?> </option>
                                  <?php } else { ?>
                                    <option value="<?= $bencana['id_bencana'] ?>"><?= $bencana['nama_bencana'] ?> </option>
                                  <?php } ?>
                                <?php
                                }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="id_wilayah">* Wilayah</label>
                              <select class="js-example-basic-single form-control" id="id_wilayah" name="id_wilayah">
                                <?php
                                $wilayahs = Querybanyak("SELECT * FROM wilayah");
                                foreach ($wilayahs as $wilayah) { ?>
                                  <?php if ($satu_peninjauan['id_wilayah'] == $wilayah['id_wilayah']) { ?>
                                    <option value="<?= $wilayah['id_wilayah'] ?>" selected><?= $wilayah['desa'] ?> / <?= $wilayah['kecamatan'] ?></option>
                                  <?php } else { ?>
                                    <option value="<?= $wilayah['id_wilayah'] ?>"><?= $wilayah['desa'] ?> / <?= $wilayah['kecamatan'] ?></option>
                                  <?php } ?>
                                <?php
                                }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="dusun">* Dusun</label>
                              <input type="text" class="form-control" id="dusun" name="dusun" value="<?= $satu_peninjauan['dusun'] ?>">
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="rt">* Rt</label>
                                  <input type="text" class="form-control" id="rt" name="rt" value="<?= $satu_peninjauan['rt'] ?>">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="rw">* Rw</label>
                                  <input type="text" class="form-control" id="rw" name="rw"  value="<?= $satu_peninjauan['rw'] ?>">
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
                                  <input type="number" class="form-control" id="jumlah_kk" name="jumlah_kk" value="<?= $satu_peninjauan['jumlah_kk'] ?>" min="0">
                                </div>
                              </div>
                              <div class="col-sm-4">
                                <div class="form-group">
                                  <label for="jumlah_korban">Jiwa</label>
                                  <input type="number" class="form-control" id="jumlah_korban" name="jumlah_korban" value="<?= $satu_peninjauan['jumlah_korban'] ?>" min="0">
                                </div>
                              </div>
                              <div class="col-sm-4">
                                <div class="form-group">
                                  <label for="jumlah_rumah">Rumah</label>
                                  <input type="number" class="form-control" id="jumlah_rumah" name="jumlah_rumah" value="<?= $satu_peninjauan['jumlah_rumah'] ?>" min="0">
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="kategori_bencana">* Kategori Bencana</label>
                              <select class="js-example-basic-single form-control" id="kategori_bencana" name="kategori_bencana">
                                <?php
                                $kategori_bencanas = ["Bencana Alam", "Bencana Non Alam"];
                                foreach ($kategori_bencanas as $kategori_bencana) { ?>
                                  <?php if ($satu_peninjauan['kategori_bencana'] == $kategori_bencana) { ?>
                                    <option value="<?= $kategori_bencana ?>" selected><?= $kategori_bencana ?></option>
                                  <?php } else { ?>
                                    <option value="<?= $kategori_bencana ?>"><?= $kategori_bencana ?></option>
                                  <?php } ?>
                                <?php
                                }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="level_bencana">* Level Bencana</label>
                              <select class="js-example-basic-single form-control" id="level_bencana" name="level_bencana">
                                <?php
                                $level_bencanas = [1 => "Ringan", 2 => "Waspada", 3 => "Siaga", 4 => "Awas", 0 => "Aman"];
                                foreach ($level_bencanas as $level_bencana => $val) { ?>
                                  <?php if ($satu_peninjauan['level_bencana'] == $level_bencana) { ?>
                                    <option value="<?= $level_bencana ?>" selected><?= $level_bencana ?> = <?= $val ?></option>
                                  <?php } else { ?>
                                    <option value="<?= $level_bencana ?>"><?= $level_bencana ?> = <?= $val ?></option>
                                  <?php } ?>
                                <?php
                                }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="peninjauan">* Keterangan peninjauan</label>
                              <textarea class="form-control" id="keterangan_peninjauan" name="keterangan_peninjauan" style="height: 150px;"><?= $satu_peninjauan['keterangan_peninjauan'] ?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="bukti_peninjauan">* Bukti Peninjauan</label>
                              <input type="file" class="form-control" id="bukti_peninjauan" name="bukti_peninjauan" onchange="loadFilebukti_peninjauan(event)" accept="image/png, image/gif, image/jpeg">
                              <br>
                              <div class="card " id="d_bukti_peninjauan">
                                <img src="<?= $url ?>/gambar/bukti_peninjauan/<?= $satu_peninjauan['bukti_peninjauan'] ?>" id="i_bukti_peninjauan">
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
                              <textarea class="form-control" id="sebab" name="sebab" style="height: 150px;"><?= $satu_peninjauan['sebab'] ?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="akibat">* Akibat</label>
                              <textarea class="form-control" id="akibat" name="akibat" style="height: 150px;"><?= $satu_peninjauan['akibat'] ?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="upaya_penanganan">* Upaya penanganan</label>
                              <textarea class="form-control" id="upaya_penanganan" name="upaya_penanganan" style="height: 150px;"><?= $satu_peninjauan['upaya_penanganan'] ?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="lain_lain">* Lain-lain</label>
                              <textarea class="form-control" id="lain_lain" name="lain_lain" style="height: 150px;"><?= $satu_peninjauan['lain_lain'] ?></textarea>
                            </div>

                          </div><!--col-sm-4 -->
                        </div>
                        <div class="col-12">
                          <a href="<?= $url ?>?peninjauan=peninjauan" class="badge badge-success"> <i class="ti-arrow"></i> Kembali</a>
                      
                        </div>
                      </form>

                      

                    </div>
                  </div>
                  <div class="card-footer">

                  </div>
                </div>
              </div>

            </div>
          </div>