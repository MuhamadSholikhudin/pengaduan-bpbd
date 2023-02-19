        <?php
        $id = $_GET['id'];


        //Menampilkan data user
        $cari_user_berdasarkan_id_user = "SELECT * FROM user WHERE id_user = " . $_GET['id'] . "";
        $satu_user = Querysatudata($cari_user_berdasarkan_id_user);

        $nama = "";
        $no_telp = "";
        $alamat = "";
        switch ($satu_user['level']) {
          case "petugas_bpbd":
            $petugas_bpbd = Querysatudata("SELECT * FROM petugas_bpbd WHERE id_user = " . $satu_user['id_user'] . " ");
            $nama = $petugas_bpbd['nama'];
            $no_telp = $petugas_bpbd['no_telp'];
            $alamat = $petugas_bpbd['alamat'];
            break;
          case "petugas_kajian":
            $petugas_kajian = Querysatudata("SELECT * FROM petugas_kajian WHERE id_user = " . $satu_user['id_user'] . " ");
            $nama = $petugas_kajian['nama'];
            $no_telp = $petugas_kajian['no_telp'];
            $alamat = $petugas_kajian['alamat'];

            break;
          case "petugas_logistik":
            $petugas_logistik = Querysatudata("SELECT * FROM petugas_logistik WHERE id_user = " . $satu_user['id_user'] . " ");
            $nama = $petugas_logistik['nama'];
            $no_telp = $petugas_logistik['no_telp'];
            $alamat = $petugas_logistik['alamat'];

            break;
          case "kepala_bpbd":
            $kepala_bpbd = Querysatudata("SELECT * FROM kepala_bpbd WHERE id_user = " . $satu_user['id_user'] . " ");
            $nama = $kepala_bpbd['nama'];
            $no_telp = $kepala_bpbd['no_telp'];
            $alamat = $kepala_bpbd['alamat'];

            break;
          case "pelapor":
            $pelapor = Querysatudata("SELECT * FROM pelapor WHERE id_user = " . $satu_user['id_user'] . " ");
            $nama = $pelapor['nama_pelapor'];
            $no_telp = $pelapor['no_telp_pelapor'];
            $alamat = $pelapor['alamat_pelapor'];
            break;
        }

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
                          <input type="hidden" class="form-control p-input" id="id_user" name="id_user" value="<?= $satu_user['id_user'] ?>">
                          <input type="text" class="form-control p-input" id="nama" aria-describedby="nama" name="nama" value="<?= $nama ?>" placeholder="Enter Nama Lengkap">
                        </div>
                        <div class="form-group">
                          <label for="alamat_user">Alamat Lengkap</label>
                          <textarea class="form-control p-input" id="alamat" style="height:70px;" name="alamat"><?= $alamat ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="no_telp">No Telp </label>
                          <input type="text" class="form-control p-input" id="no_telp" aria-describedby="no_telp" name="no_telp" value="<?= $no_telp ?>" placeholder="867676557634">
                        </div>
                        <div class="form-group">
                          <label for="username">username</label>
                          <input type="text" class="form-control p-input" id="username" placeholder="username" name="username" value="<?= $satu_user['username'] ?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control p-input" id="exampleInputPassword1" placeholder="Password" name="password" value="<?= $satu_user['password'] ?>">
                        </div>

                        <div class="form-group d-none">
                          <?php
                          $levels = ['kepala_bpbd', 'pelapor', 'masyarakat', 'petugas_bpbd', 'petugas_kajian', 'petugas_logistik'];
                          ?>
                          <label for="level">Level</label>
                          <select class="form-control " name="level" id="level">
                            <?php foreach ($levels as $level) { ?>
                              <?php if ($level == $satu_user['level']) { ?>
                                <option value="<?= $level ?>" selected><?= $level ?></option>
                              <?php } else { ?>
                                <option value="<?= $level ?>"><?= $level ?></option>
                              <?php } ?>
                            <?php } ?>
                          </select>
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