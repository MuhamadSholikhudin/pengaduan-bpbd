        <?php 
          $id = $_GET['id'];
          $cari_user_berdasarkan_id_user = "SELECT * FROM user WHERE id_user = " . $_GET['id'] . "";
          $satu_user = Querysatudata($cari_user_berdasarkan_id_user);
        ?>        
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
          
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">          
                      <form class="forms-sample" action="<?= $url ?>/?user=update" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_user">Nama Lengkap </label>
                            <input type="hidden" class="form-control p-input" id="id_user" name="id_user" value="<?= $satu_user['id_user'] ?>" >
                            <input type="text" class="form-control p-input" id="nama_user" aria-describedby="nama_user" name="nama_user" value="<?= $satu_user['nama_user'] ?>" placeholder="Enter Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label for="alamat_user">Alamat Lengkap</label>
                            <textarea class="form-control p-input" id="alamat_user" name="alamat_user"><?= $satu_user['alamat_user'] ?></textarea>
                          </div>
                        <div class="form-group">
                            <label for="no_telp_user">No telp User</label>
                            <input type="text" class="form-control p-input" id="no_telp_user" aria-describedby="no_telp_user" name="no_telp_user" value="<?= $satu_user['no_telp_user'] ?>" placeholder="Enter Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label for="username">username</label>
                            <input type="text" class="form-control p-input" id="username" placeholder="username" name="username" value="<?= $satu_user['username'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control p-input" id="exampleInputPassword1" placeholder="Password" name="password" value="<?= $satu_user['password'] ?>">
                        </div>
                        <div class="form-group">
                          <?php 
                            $levels = ['kepala_bpbd', 'masyarakat', 'petugas_bpbd', 'petugas_kajian', 'petugas_logistik'];
                          ?>                        
                          <label for="level">Level</label>
                          <select class="form-control " name="level" id="level">
                            <?php foreach($levels as $level){?>
                              <?php if($level == $satu_user['level']){ ?>
                                <option value="<?= $level ?>" selected><?= $level ?></option>
                              <?php }else{ ?>
                                <option value="<?= $level ?>"><?= $level ?></option>
                              <?php } ?>
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
