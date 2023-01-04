<?php 
          $id = $_GET['id'];
          $cari_peninjauan_berdasarkan_id_peninjauan = "SELECT * FROM peninjauan WHERE id_peninjauan = " . $_GET['id'] . "";
          $satu_peninjauan = Querysatudata($cari_peninjauan_berdasarkan_id_peninjauan);
        ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

          <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-header">
                  <h2><?= strtoupper("Edit data ". array_keys($_GET)[0]) ?></h2>
                </div>
                <div class="card-body">
                  <div class="row">
                    <form class="forms-sample" action="<?= $url ?>/?peninjauan=update" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="nama_pelapor">* Nama Peninjau</label>
                        <input type="hidden" class="form-control p-input" id="id_peninjauan" name="id_peninjauan" value="<?= $satu_peninjauan['id_peninjauan'] ?>" >
                        <input type="hidden" class="form-control p-input" id="id_user" name="id_user" value="<?= $_SESSION['id_user'] ?>" >
                        <input type="hidden" class="form-control p-input" name="id_pelaporan" id="id_pelaporan">
                        <input type="text" class="form-control p-input"  value="<?= $_SESSION['nama_user'] ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="tanggal_peninjauan">* Tanggal Peninjauan</label>
                        <input type="date" class="form-control p-input" id="tanggal_peninjauan"  name="tanggal_peninjauan" value="<?= $satu_peninjauan['tanggal_peninjauan'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="id_bencana">* bencana</label>
                        <select class="js-example-basic-single form-control" id="id_bencana" name="id_bencana">
                          <?php
                          $bencanas = Querybanyak("SELECT * FROM bencana");
                          foreach ($bencanas as $bencana) { ?>
                            <?php if( $satu_peninjauan['id_bencana'] == $bencana['id_bencana']){ ?>
                              <option value="<?= $bencana['id_bencana'] ?>" selected><?= $bencana['nama_bencana'] ?> / <?= $bencana['kategori_bencana'] ?></option>
                            <?php }else{ ?>
                              <option value="<?= $bencana['id_bencana'] ?>"><?= $bencana['nama_bencana'] ?> / <?= $bencana['kategori_bencana'] ?></option>
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
                            <?php if( $satu_peninjauan['id_wilayah'] == $wilayah['id_wilayah']){ ?>
                              <option value="<?= $wilayah['id_wilayah'] ?>" selected><?= $wilayah['desa'] ?> / <?= $wilayah['kecamatan'] ?></option>
                            <?php }else{ ?>
                              <option value="<?= $wilayah['id_wilayah'] ?>"><?= $wilayah['desa'] ?> / <?= $wilayah['kecamatan'] ?></option>
                            <?php } ?>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="jumlah_korban">* Korban</label>
                        <input type="number" class="form-control" id="jumlah_korban" value="<?= $satu_peninjauan['jumlah_korban'] ?>" name="jumlah_korban">
                      </div>
                      <div class="form-group">
                        <label for="kategori_bencana">* Kategori Bencana</label>
                        <select class="js-example-basic-single form-control" id="kategori_bencana" name="kategori_bencana">
                          <?php
                          $kategori_bencanas = ["Bencana Alam", "Bencana Non Alam"];
                          foreach ($kategori_bencanas as $kategori_bencana) { ?>
                            <?php if( $satu_peninjauan['kategori_bencana'] == $kategori_bencana){ ?>
                              <option value="<?= $kategori_bencana ?>" selected><?= $kategori_bencana ?></option>
                            <?php }else{ ?>
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
                          $level_bencanas = [1, 2, 3, 4, 0];
                          foreach ($level_bencanas as $level_bencana) { ?>
                            <?php if( $satu_peninjauan['level_bencana'] == $level_bencana){ ?>
                              <option value="<?= $level_bencana ?>" selected><?= $level_bencana ?></option>
                            <?php }else{ ?>
                              <option value="<?= $level_bencana ?>"><?= $level_bencana ?></option>
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
                        <input type="file" class="form-control" id="bukti_peninjauan" name="bukti_peninjauan" accept="image/png, image/gif, image/jpeg" >
                          <div class="card-img">
                            <img src="<?= $url ?>/gambar/bukti_peninjauan/<?= $satu_peninjauan['bukti_peninjauan'] ?>" style="width:100%;" alt="" srcset="">
                          </div>
                      </div>
                      <div class="col-12">
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
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
