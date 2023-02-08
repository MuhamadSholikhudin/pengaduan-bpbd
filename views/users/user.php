      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <a href="<?= $url ?>?user=add" class="btn btn-sm btn-outline-secondary">
                          <i class="mdi mdi-library-plus"></i>
                          Tambah
                        </a>
                    </div>
                    <div class="col-lg-12 text-center">
                      <h2>DATA USER</h2>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table id="myTable" class=" display">
                      <thead>
                        <tr>
                          <th>
                            Nama Lengkap
                          </th>
                          <th>
                            Alamat
                          </th>
                          <th>
                            username
                          </th>
                          <th>
                            level
                          </th>
                          <th>
                            No Telp
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $users = Querybanyak("SELECT * FROM user");
                            foreach($users as $user){ 
                        ?>
                        <tr>
                          <td class="py-1">
                            <?php
                              $nama = "";
                              $no_telp = "";
                              $alamat = "";
                              switch ($user['level']){
                                case "petugas_bpbd":
                                    $petugas_bpbd = Querysatudata("SELECT * FROM petugas_bpbd WHERE id_user = ".$user['id_user']." ");
                                    $nama = $petugas_bpbd['nama'];
                                    $no_telp = $petugas_bpbd['no_telp'];
                                    $alamat = $petugas_bpbd['alamat'];

                                  break;
                                case "petugas_kajian":
                                    $petugas_kajian = Querysatudata("SELECT * FROM petugas_kajian WHERE id_user = ".$user['id_user']." ");
                                    $nama = $petugas_kajian['nama'];
                                    $no_telp = $petugas_kajian['no_telp'];
                                    $alamat = $petugas_kajian['alamat'];

                                  break;
                                case "petugas_logistik":
                                    $petugas_logistik = Querysatudata("SELECT * FROM petugas_logistik WHERE id_user = ".$user['id_user']." ");
                                    $nama = $petugas_logistik['nama'];
                                    $no_telp = $petugas_logistik['no_telp'];
                                    $alamat = $petugas_logistik['alamat'];

                                  break;
                                case "kepala_bpbd":
                                    $kepala_bpbd = Querysatudata("SELECT * FROM kepala_bpbd WHERE id_user = ".$user['id_user']." ");
                                    $nama = $kepala_bpbd['nama'];
                                    $no_telp = $kepala_bpbd['no_telp'];
                                    $alamat = $kepala_bpbd['alamat'];

                                  break;
                                case "pelapor":
                                    $pelapor = Querysatudata("SELECT * FROM pelapor WHERE id_user = ".$user['id_user']." ");
                                    $nama = $pelapor['nama_pelapor'];
                                    $no_telp = $pelapor['no_telp_pelapor'];
                                    $alamat = $pelapor['alamat_pelapor'];
                                  break;
                              }
                            ?>
                            <?= $nama ?>
                          </td>
                          <td> <?= $alamat ?>
                          </td>
                          <td>
                            <?= $user['username']; ?>
                          </td>
                          <td>
                            <?= $user['level']; ?>
                          </td>
                          <td>
                            <?= $no_telp ?>
                          </td>
                          <td>
                            <a href="<?= $url ?>/?user=edit&id=<?= $user['id_user']; ?>" class="btn btn-lg btn-outline-warning btn-icon-text">
                              <i class="ti-pencil-alt"></i>                          
                              Edit
                            </a>                          
                          </td>
                        </tr>
                        <?php
                            }
                        ?>                      
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer">

                </div>
              </div>
            </div>

          </div>
        </div>
