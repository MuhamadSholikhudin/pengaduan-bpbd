      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
            

                    <form class="forms-sample">
                      <div class="form-group">
                          <label for="nama_user">Nama Lengkap</label>
                          <input type="text" class="form-control p-input" id="nama_user" aria-describedby="nama_user" name="name_user" placeholder="Enter Nama Lengkap">
                      </div>
                      <div class="form-group">
                          <label for="alamat_user">Alamat Lengkap</label>
                          <textarea class="form-control p-input" id="alamat_user" name="alamat_user" rows="3"></textarea>
                        </div>
                      <div class="form-group">
                          <label for="no_telp_user">No telp User</label>
                          <input type="text" class="form-control p-input" id="no_telp_user" aria-describedby="no_telp_user" name="name_user" placeholder="Enter Nama Lengkap">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control p-input" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <?php 
                          $levels = ['kepala_bpbd', 'masyarakat', 'petugas_bpbd', 'petugas_kajian', 'petugas_logistik'];
                        ?>
                        <label for="level">Level</label>
                        <select class="form-control " name="level" id="level">
                          <?php foreach($levels as $level){?>
                            <option value="<?= $level ?>"><?= $level ?></option>
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
