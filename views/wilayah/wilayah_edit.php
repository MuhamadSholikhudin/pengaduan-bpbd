        <?php
        $id = $_GET['id'];
        $cari_wilayah_berdasarkan_id_wilayah = "SELECT * FROM wilayah WHERE id_wilayah = " . $_GET['id'] . "";
        $satu_wilayah = Querysatudata($cari_wilayah_berdasarkan_id_wilayah);
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
                      <form class="forms-sample" action="<?= $url ?>/?wilayah=update" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="nama_wilayah">Nama wilayah</label>
                          <input type="hidden" class="form-control p-input" id="id_wilayah" aria-describedby="id_wilayah" name="id_wilayah" value="<?= $satu_wilayah['id_wilayah'] ?>">
                          <input type="text" class="form-control p-input" id="nama_wilayah" aria-describedby="nama_wilayah" name="nama_wilayah" value="<?= $satu_wilayah['nama_wilayah'] ?>">
                        </div>
                        <div class="form-group">
                          <?php
                          $status_wilayahs = ['Tanah Longsor', 'Banjir'];
                          ?>
                          <label for="status_wilayah">status</label>
                          <select class="form-control " name="status_wilayah" id="status_wilayah">
                            <?php foreach ($status_wilayahs as $status_wilayah) { ?>
                              <?php if ($status_wilayah == $satu_user['status_wilayah']) { ?>
                                <option value="<?= $status_wilayah ?>" selected><?= $status_wilayah ?></option>
                              <?php } else { ?>
                                <option value="<?= $status_wilayah ?>"><?= $status_wilayah ?></option>
                              <?php } ?>
                            <?php } ?>

                          </select>
                        </div>
                        <div class="form-group">
                          <label for="ket_wilayah">Keterangan wilayah</label>
                          <textarea class="form-control p-input" id="ket_wilayah" aria-describedby="ket_wilayah" name="ket_wilayah"><?= $satu_wilayah['ket_wilayah'] ?></textarea>
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