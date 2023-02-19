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
                          <label for="kecamatan">Kecamatan</label>
                          <input type="hidden" class="form-control p-input" id="id_wilayah" aria-describedby="id_wilayah" name="id_wilayah" value="<?= $satu_wilayah['id_wilayah'] ?>">
                          <input type="text" class="form-control p-input" id="kecamatan" name="kecamatan" placeholder="Kecamatan" value="<?= $satu_wilayah['kecamatan'] ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="desa">Desa</label>
                          <input type="text" class="form-control p-input" id="desa" name="desa" placeholder="desa" value="<?= $satu_wilayah['desa'] ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="no_telp">Nomer Telepon</label>
                          <input type="text" class="form-control p-input" id="no_telp" name="no_telp" placeholder="no_telp" value="<?= $satu_wilayah['no_telp'] ?>" required>
                        </div>
                        <div class="col-12">
                          <button type="submit" class="btn btn-success"> <i class="ti-pencil-alt"></i> Update</button>
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