      <?php 
          $id = $_GET['id'];
          $cari_pelaporan_berdasarkan_id_pelaporan = "SELECT * FROM pelaporan WHERE id_pelaporan = " . $_GET['id'] . "";
          $satu_pelaporan = Querysatudata($cari_pelaporan_berdasarkan_id_pelaporan);
        ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-header">
                  <h2><?= strtoupper("Edit data " . array_keys($_GET)[0]) ?></h2>
                </div>
                <div class="card-body">
                  <div class="row">
                    <form class="forms-sample" action="<?= $url ?>/?pelaporan=update" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="nama_pelapor">* Nama pelapor</label>
                        <input type="hidden" class="form-control p-input" id="id_pelaporan" name="id_pelaporan" value="<?= $satu_pelaporan['id_pelaporan'] ?>">
                        <input type="hidden" class="form-control p-input" id="id_user" name="id_user" value="<?= $_SESSION['id_user'] ?>">
                        <input type="hidden" class="form-control p-input" name="status_pelaporan" value="<?= $satu_pelaporan['status_pelaporan'] ?>">
                        <input type="text" class="form-control p-input" value="<?= $_SESSION['nama_user'] ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="tanggal_pelaporan">* Tanggal pelaporan</label>
                        <input type="date" class="form-control p-input" id="tanggal_pelaporan" name="tanggal_pelaporan" value="<?= $satu_pelaporan['tanggal_pelaporan'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="pelaporan">* Wilayah</label>
                        <select class="js-example-basic-single form-control" name="id_wilayah">
                          <?php
                          $wilayahs = Querybanyak("SELECT * FROM wilayah");
                          foreach ($wilayahs as $wilayah) { ?>
                          <?php if($wilayah['id_wilayah'] == $satu_pelaporan['id_wilayah']) { ?>
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
                        <label for="pelaporan">* Bencana</label>
                        <select class="js-example-basic-single form-control" name="id_bencana">
                          <?php
                          $bencanas = Querybanyak("SELECT * FROM bencana");
                          foreach ($bencanas as $bencana) { ?>
                          <?php if($bencana['id_bencana'] == $satu_pelaporan['id_bencana']) { ?>
                              <option value="<?= $bencana['id_bencana'] ?>" selected><?= $bencana['nama_bencana'] ?></option>
                            <?php }else{ ?>
                              <option value="<?= $bencana['id_bencana'] ?>"><?= $bencana['nama_bencana'] ?></option>
                            <?php } ?>                         
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="pelaporan">* Keterangan pelaporan</label>
                        <textarea class="form-control" id="pelaporan" name="pelaporan" style="height: 300px;"><?= $satu_pelaporan['pelaporan'] ?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="link_maps">Link Maps (Opsional)</label>
                        <input type="url" class="form-control p-input" id="link_maps" name="link_maps" value="<?= $satu_pelaporan['link_maps'] ?>">
                      </div>
                      <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
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