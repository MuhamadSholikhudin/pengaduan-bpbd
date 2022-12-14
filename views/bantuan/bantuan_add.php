      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-header">
                  <h2>Tambah Data Bantuan</h2>
                </div>
                <div class="card-body">
                  <div class="row">
                    <form class="forms-sample" action="<?= $url ?>/?kepala_bpbd=user_post" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="nama_bantuan">Nama Bantuan</label>
                          <input type="text" class="form-control p-input" id="nama_user" aria-describedby="nama_user" name="name_user" placeholder="Enter Nama Lengkap">
                      </div>
                      <div class="form-group">
                        <?php 
                          $levels = ['langsung', 'atm'];
                        ?>
                        <label for="level">Kategori</label>
                        <select class="form-control " name="level" id="level">
                          <?php foreach($levels as $level){?>
                            <option value="<?= $level ?>"><?= $level ?></option>
                          <?php } ?> 
                        </select>
                      </div>
                      <div class="form-group">
                          <label for="satuan">Satuan</label>
                          <textarea class="form-control p-input" id="satuan" name="satuan" rows="3"></textarea>
                        </div>
                      <div class="form-group">
                          <label for="batch">Batch</label>
                          <input type="text" class="form-control p-input" id="batch" aria-describedby="batch" name="no_telp_user" placeholder="Enter Nama Lengkap">
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
