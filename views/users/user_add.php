      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <form class="forms-sample" action="<?= $url ?>/?user=post" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="nama">Nama Lengkap</label>
                          <input type="text" class="form-control p-input" id="nama" aria-describedby="nama" name="nama" placeholder="Enter Nama Lengkap">
                      </div>
                      <div class="form-group">
                          <label for="alamat">Alamat Lengkap</label>
                          <textarea class="form-control p-input" id="alamat" name="alamat" ></textarea>
                        </div>
                      <div class="form-group">
                          <label for="no_telp">No telp User</label>
                          <input type="text" class="form-control p-input" id="no_telp" aria-describedby="no_telp" name="no_telp" placeholder="8987667878">
                      </div>
                      <div class="form-group">
                          <label for="username">Usermame</label>
                          <input type="text" class="form-control p-input" id="username" name="username" placeholder="username">
                      </div>
                      <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control p-input" id="password" name="password" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <?php 
                          $levels = ['kepala_bpbd', 'petugas_bpbd', 'petugas_kajian', 'petugas_logistik'];
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
