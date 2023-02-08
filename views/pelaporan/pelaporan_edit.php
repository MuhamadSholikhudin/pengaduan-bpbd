    <?php

    // Menampilkan data pelaporan berdasarkan id_pelaporan
    $id = $_GET['id'];
    $cari_pelaporan_berdasarkan_id_pelaporan =
      'SELECT * FROM pelaporan WHERE id_pelaporan = ' . $_GET['id'] . '';
    $satu_pelaporan = Querysatudata($cari_pelaporan_berdasarkan_id_pelaporan);
    
    // Menampilkan data petugas bpbd berdasarkan id_user dengan session login id_user
    $petugas_bpbd = Querysatudata("SELECT * FROM petugas_bpbd WHERE id_user = ".$_SESSION['id_user']." ");

    ?>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-header">
                <h2><?= strtoupper(
                      'Edit data ' . array_keys($_GET)[0]
                    ) ?></h2>
              </div>
              <div class="card-body">
                <div class="row">
                  <!-- <form class="forms-sample" action="<?= $url ?>/?pelaporan=update" method="POST" enctype="multipart/form-data"> -->
                    <div class="form-group">
                      <label for="nama_pelapor">* Nama pelapor</label>
                      <input type="hidden" class="form-control p-input" id="id_pelaporan" name="id_pelaporan" value="<?= $satu_pelaporan['id_pelaporan'] ?>">
                      <input type="hidden" class="form-control p-input" name="status_pelaporan" value="<?= $satu_pelaporan['status_pelaporan'] ?>">
                      <input type="text" class="form-control p-input" value="<?= $petugas_bpbd['nama'] ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="tanggal_pelaporan">* Tanggal pelaporan</label>
                      <input type="date" class="form-control p-input" id="tanggal_pelaporan" name="tanggal_pelaporan" value="<?= $satu_pelaporan['tanggal_pelaporan'] ?>" <?php echo $_GET['pelaporan'] == 'edit' ? '' : 'disabled'; ?>>
                    </div>
                    <div class="form-group">
                      <label for="pelaporan">* Wilayah</label>
                      <select class="js-example-basic-single form-control" name="id_wilayah" <?php echo $_GET['pelaporan'] == 'edit' ? '' : 'disabled'; ?>>
                        <?php
                        $wilayahs = Querybanyak('SELECT * FROM wilayah');
                        foreach ($wilayahs as $wilayah) { ?>
                          <?php if (
                            $wilayah['id_wilayah'] ==
                            $satu_pelaporan['id_wilayah']
                          ) { ?>
                            <option value="<?= $wilayah['id_wilayah'] ?>" selected><?= $wilayah['desa'] ?> / <?= $wilayah['kecamatan'] ?></option>
                          <?php } else { ?>
                            <option value="<?= $wilayah['id_wilayah'] ?>"><?= $wilayah['desa'] ?> / <?= $wilayah['kecamatan'] ?></option>
                          <?php } ?>
                        <?php }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="pelaporan">* Bencana</label>
                      <select class="js-example-basic-single form-control" name="id_bencana" <?php echo $_GET['pelaporan'] == 'edit' ? '' : 'disabled'; ?>>
                        <?php
                        $bencanas = Querybanyak('SELECT * FROM bencana');
                        foreach ($bencanas as $bencana) { ?>
                          <?php if (
                            $bencana['id_bencana'] ==
                            $satu_pelaporan['id_bencana']
                          ) { ?>
                            <option value="<?= $bencana['id_bencana'] ?>" selected><?= $bencana['nama_bencana'] ?></option>
                          <?php } else { ?>
                            <option value="<?= $bencana['id_bencana'] ?>"><?= $bencana['nama_bencana'] ?></option>
                          <?php } ?>
                        <?php }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="pelaporan">* Keterangan pelaporan</label>
                      <textarea class="form-control" id="pelaporan" name="pelaporan" style="height: 300px;" <?php echo $_GET['pelaporan'] == 'edit' ? ''  : 'disabled'; ?>><?= $satu_pelaporan['pelaporan'] ?></textarea>
                    </div>
                    <!-- Jika Ada Mapsnya -->
                    <?php if ($satu_pelaporan['link_maps'] != null && $satu_pelaporan['link_maps'] != "") { ?>
                      <div class="form-group">
                        <label for="link_maps">Link Maps</label>
                        <a href="<?= $satu_pelaporan['link_maps'] ?>">Klik Link Ini</a>
                      </div>
                    <?php } ?>

                    <h3 class="text-center">Hubungi Penanggung Jawab : <a href="tel:+<?= $wilayah['no_telp'] ?>"><?= $wilayah['no_telp'] ?></a></h3>
                    <br>
                    <div class="col-12 text-center">
                      <!-- Buat form untuk memproses data pelaporan -->
                      <div style="padding: 20px;  border:blueviolet; border: radius 10px; ">
                        <form action="<?= $url ?>/?pelaporan=checkvalidasi" method="post">
                          <input type="hidden" class="form-control p-input" id="id_pelaporan" name="id_pelaporan" value="<?= $satu_pelaporan['id_pelaporan'] ?>">
                          <input type="hidden" class="form-control p-input" id="id_petugas_bpbd" name="id_petugas_bpbd" value="<?= $petugas_bpbd['id_petugas_bpbd'] ?>">
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm-4">
                                <label  for="status_pelaporan">
                                  <h4>* Status Pelaporan</h4>
                                </label>                                
                              </div>
                              <div class="col-sm-8">                             
                              <select class=" form-control" name="status_pelaporan" required>
                                <?php
                                $status_validasis = ["tervalidasi", "tidak valid"]; // buat array status validasi 
                                foreach ($status_validasis as $status_validasi) { ?>
                                  <?php if($status_validasi == $satu_pelaporan['status_pelaporan']){ ?>
                                    <option value="<?= $status_validasi ?>"><?= $status_validasi ?></option>
                                  <?php }else{?>
                                  <option value="<?= $status_validasi ?>"><?= $status_validasi ?></option>
                                <?php }
                                }
                                ?>
                              </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="review_pelaporan">
                              <h4>* Review pelaporan</h4>
                            </label>
                            <textarea class="form-control" id="review_pelaporan" name="review_pelaporan" style="height: 300px;" required><?= $satu_pelaporan['review_pelaporan'] ?></textarea>
                          
                          </div>
                          <button type="submit" class="btn btn-primary">Process</button>
                        </form>
                      </div>

                    </div>
                    <div class="col-12">
                      <a href="<?= $url ?>?pelaporan=pelaporan" class="badge badge-success"> <i class="ti-arrow"></i> Kembali</a>
                    </div>
                </div>
              </div>
              <div class="card-footer">

              </div>
            </div>
          </div>

          <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-header">
                <h2>GAMBAR TERKAIT PELAPORAN</h2>
              </div>
              <div class="card-body">
                <div class="row">

                  <div class="form-group">
                    <label for="gambar_bencana">* Gambar Bencana</label>
                    <?php if ($_GET['pelaporan'] == 'edit') { ?>
                      <input type="file" class="form-control mb-2" id="gambar_bencana" name="gambar_bencana" onchange="loadFilegambar_bencana(event)">
                    <?php } ?>
                    <div class="card " id="d_gambar_bencana">
                      <img src="<?= $url ?>/gambar/pelaporan/<?= $satu_pelaporan['gambar_bencana'] ?>" id="i_gambar_bencana">
                    </div>
                    <script>
                      var loadFilegambar_bencana = function(event) {
                        var output = document.getElementById('i_gambar_bencana');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                          URL.revokeObjectURL(output.src) // free memory
                        }
                      };
                    </script>
                  </div>
                  <div class="form-group">
                    <label for="gambar_lokasi_bencana">* Gambar lokasi Bencana</label>
                    <?php if ($_GET['pelaporan'] == 'edit') { ?>
                      <input type="file" class="form-control  mb-2" id="gambar_lokasi_bencana" name="gambar_lokasi_bencana" onchange="loadFilegambar_lokasi_bencana(event)">
                    <?php } ?>
                    <div class="card " id="d_gambar_lokasi_bencana">
                      <img src="<?= $url ?>/gambar/pelaporan/<?= $satu_pelaporan['gambar_lokasi_bencana'] ?>" id="i_gambar_lokasi_bencana">
                    </div>
                    <script>
                      var loadFilegambar_lokasi_bencana = function(event) {
                        var output = document.getElementById('i_gambar_lokasi_bencana');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                          URL.revokeObjectURL(output.src) // free memory
                        }
                      };
                    </script>
                  </div>

                  <div class="form-group">
                    <label for="gambar_pelapor">* Gambar Pelapor</label>
                    <?php if ($_GET['pelaporan'] == 'edit') { ?>
                      <input type="file" class="form-control  mb-2" id="gambar_pelapor" name="gambar_pelapor" onchange="loadFilegambar_pelapor(event)">
                    <?php } ?>
                    <div class="card " id="d_gambar_pelaporan">
                      <img src="<?= $url ?>/gambar/pelaporan/<?= $satu_pelaporan['gambar_pelapor'] ?>" id="i_gambar_pelaporan" />
                    </div>
                    <script>
                      var loadFilegambar_pelaporan = function(event) {
                        var output = document.getElementById('i_gambar_pelapor');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                          URL.revokeObjectURL(output.src) // free memory
                        }
                      };
                    </script>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>