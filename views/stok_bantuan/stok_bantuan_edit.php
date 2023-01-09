      <?php 
        $stok_bantuan =  Querysatudata("SELECT * FROM stok_bantuan WHERE id_stok_bantuan = ".$_GET['id']."  ");
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-header">
                  <h2><?= strtoupper("Edit data " . str_replace("_", " ", array_keys($_GET)[0])) ?></h2>
                </div>
                <div class="card-body">
                  <div class="row">
                    <form class="forms-sample" action="<?= $url ?>/?stok_bantuan=update" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_stok_bantuan" value="<?= $_GET['id'] ?>">  
                    <div class="form-group">
                        <label for="pelaporan">* Nama Bantuan</label>
                        <select class="form-control js-example-basic-single" name="id_bantuan" required>
                          <?php
                          $bantuans = Querybanyak("SELECT * FROM bantuan");
                          foreach ($bantuans as $bantuan) { 
                            if($bantuan['id_bantuan'] == $stok_bantuan['id_bantuan']){
                              ?>
                                <option value="<?= $bantuan['id_bantuan'] ?>" selected> <?= $bantuan['nama_bantuan'] ?></option>
                              <?php
                            }else{
                            ?>
                              <option value="<?= $bantuan['id_bantuan'] ?>"> <?= $bantuan['nama_bantuan'] ?></option>
                            <?php
                          }
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="tanggal_masuk">* Tanggal Masuk</label>
                        <input type="date" class="form-control p-input" id="tanggal_masuk" name="tanggal_masuk" value="<?= $stok_bantuan['tanggal_masuk'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="tanggal_kadaluarsa">* Tanggal Kadaluarsa</label>
                        <input type="date" class="form-control p-input" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" value="<?= $stok_bantuan['tanggal_kadaluarsa'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="stok_masuk">* Stok Masuk</label>
                        <input type="number" class="form-control" id="stok_masuk" name="stok_masuk" min="0" value="<?= $stok_bantuan['stok_masuk'] ?>"  required>
                      </div>
                      <div class="form-group">
                        <label for="batch">* Batch</label>
                        <input type="date" class="form-control" id="batch" name="batch" value="<?= $stok_bantuan['batch'] ?>" required>
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