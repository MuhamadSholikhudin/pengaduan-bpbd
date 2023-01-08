      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-header">
                  <h2><?= strtoupper("Tambah data " . str_replace("_", " ", array_keys($_GET)[0])) ?></h2>
                </div>
                <div class="card-body">
                  <div class="row">
                    <form class="forms-sample" action="<?= $url ?>/?stok_bantuan=post" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="pelaporan">* Nama Bantuan</label>
                        <select class="form-control js-example-basic-single" name="id_bantuan" required>
                          <?php
                          $bantuans = Querybanyak("SELECT * FROM bantuan");
                          foreach ($bantuans as $bantuan) { ?>
                            <option value="<?= $bantuan['id_bantuan'] ?>"> <?= $bantuan['nama_bantuan'] ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="tanggal_masuk">* Tanggal Masuk</label>
                        <input type="date" class="form-control p-input" id="tanggal_masuk" name="tanggal_masuk" value="<?= date('Y-m-d') ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="tanggal_kadaluarsa">* Tanggal Kadaluarsa</label>
                        <input type="date" class="form-control p-input" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" value="<?= date('Y-m-d') ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="stok_masuk">* Stok Masuk</label>
                        <input type="number" class="form-control" id="stok_masuk" name="stok_masuk" min="1" value="1" required>
                      </div>
                      <div class="form-group">
                        <label for="batch">* Batch</label>
                        <input type="date" class="form-control" id="batch" name="batch" value="<?= date("Y-m-d") ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="satuan">* Satuan</label>
                        <input type="text" class="form-control" id="satuan" name="satuan">
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