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
                            <?= $user['nama_user']; ?>
                          </td>
                          <td>
                            <?= $user['alamat_user']; ?>
                          </td>
                          <td>
                            <?= $user['username']; ?>
                          </td>
                          <td>
                            <?= $user['level']; ?>
                          </td>
                          <td>
                            <?= $user['no_telp_user']; ?>
                          </td>
                          <td>
                            <a href="<?= $url ?>/?user=edit&id=<?= $user['id_user']; ?>" class="btn btn-lg btn-outline-warning btn-icon-text">
                              <i class="ti-pencil"></i>                          
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
