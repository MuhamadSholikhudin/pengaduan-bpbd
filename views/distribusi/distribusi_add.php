      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-header">
                  <h2><?= strtoupper("Tambah data ". array_keys($_GET)[0]) ?></h2>
                </div>
                <div class="card-body">
                  <div class="row">
                    <form class="forms-sample" action="<?= $url ?>/?stok_bantuan=stok_bantuan_post" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <?php 
                          $id_peninjauans = ['Parah', 'Selesai'];
                        ?>
                        <label for="id_peninjauan">ID peninjauan</label>
                        <select class="form-control " name="id_peninjauan" id="id_peninjauan">
                          <?php foreach($id_peninjauans as $id_peninjauan){?>
                            <option value="<?= $id_peninjauan ?>"><?= $id_peninjauan ?></option>
                          <?php } ?> 
                        </select>
                      </div>
                      <div class="form-group">
                        <?php 
                          $id_wilayahs = ['Winong', 'Dukuh Seti'];
                        ?>
                        <label for="id_wilayah">ID wilayah</label>
                        <select class="form-control " name="id_wilayah" id="id_wilayah">
                          <?php foreach($id_wilayahs as $id_wilayah){?>
                            <option value="<?= $id_wilayah ?>"><?= $id_wilayah ?></option>
                          <?php } ?> 
                        </select>
                      </div>
                      <div class="form-group">
                        <?php 
                          $id_stok_bantuans = ['Sarimi', 'Indomie'];
                        ?>
                        <label for="id_stok_bantuan">ID stok_bantuan</label>
                        <select class="form-control " name="id_stok_bantuan" id="id_stok_bantuan">
                          <?php foreach($id_stok_bantuans as $id_stok_bantuan){?>
                            <option value="<?= $id_stok_bantuan ?>"><?= $id_stok_bantuan ?></option>
                          <?php } ?> 
                        </select>
                      </div>
                      <div class="form-group">
                          <label for="tanggal_distribusi">Tanggal Distribusi</label>
                          <input type="date" class="form-control p-input" id="tanggal_distribusi" aria-describedby="tanggal_distribusi" name="tanggal_distribusi" >
                      </div>
                      <div class="form-group">
                        <?php 
                          $status_distribusis = ['mulai', 'Selesai'];
                        ?>
                        <label for="status_distribusi">Status Distribusi</label>
                        <select class="form-control " name="status_distribusi" id="status_distribusi">
                          <?php foreach($status_distribusis as $status_distribusi){?>
                            <option value="<?= $status_distribusi ?>"><?= $status_distribusi ?></option>
                          <?php } ?> 
                        </select>
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
