      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <!--
              <div class="col-lg-12 d-flex flex-column">
                <div class="statistics-details d-flex align-items-center justify-content-between">
                    <div>
                      <p class="statistics-title">Bounce Rate</p>
                      <h3 class="rate-percentage">32.53%</h3>
                      <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                    </div>
                    <div>
                      <p class="statistics-title">Page Views</p>
                      <h3 class="rate-percentage">7,682</h3>
                      <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
                    </div>
                    <div>
                      <p class="statistics-title">New Sessions</p>
                      <h3 class="rate-percentage">68.8</h3>
                      <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                    </div>
                    <div class="d-none d-md-block">
                      <p class="statistics-title">Avg. Time on Site</p>
                      <h3 class="rate-percentage">2m:35s</h3>
                      <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                    </div>
                    <div class="d-none d-md-block">
                      <p class="statistics-title">New Sessions</p>
                      <h3 class="rate-percentage">68.8</h3>
                      <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                    </div>
                    <div class="d-none d-md-block">
                      <p class="statistics-title">Avg. Time on Site</p>
                      <h3 class="rate-percentage">2m:35s</h3>
                      <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                    </div>
                  </div>

                </div>
              </div> 
              -->
            <?php
            $user_dashboard =
              [
                "kepala_bpbd" => ["wilayah", "user", "pelaporan", "peninjauan", "distribusi", "bantuan", "stok_bantuan"],
                "petugas_bpbd" => ["wilayah", "user", "pelaporan", "peninjauan", "distribusi", "bantuan", "stok_bantuan"],
                "masyarakat" => ["pelaporan"],
                "petugas_kajian" => ["pelaporan", "peninjauan",],
                "petugas_logistik" => ["peninjauan", "distribusi", "bantuan", "stok_bantuan"]
              ];
            ?>
            <div class="col-lg-12">

              <div class="row">
                <?php
                if (in_array("user", $user_dashboard[$_SESSION['level']])) {
                ?>
                  <div class="col-md-3 mb-3">
                    <div class="card card-rounded shadow">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center ">
                          <div class="circle-progress-width">
                            <i class="fa fa-user fa-5x"></i>
                          </div>
                          <div>
                            <p class="text-small mb-2">Total User</p>
                            <?php
                            $user = NumRows("SELECT * FROM user");
                            ?>
                            <h3 class="mb-0 fw-bold"><?= $user ?></h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                }
                ?>

                <?php
                if (in_array("pelaporan", $user_dashboard[$_SESSION['level']])) {
                ?>
                  <div class="col-md-3 mb-3">
                    <div class="card card-rounded shadow">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center ">
                          <div class="circle-progress-width">
                            <i class="fa fa-phone fa-5x"></i>
                          </div>
                          <div>
                            <p class="text-small mb-2">Total Pelaporan</p>
                            <?php
                              $pelaporan = NumRows("SELECT * FROM pelaporan");
                              if($_SESSION['level'] == "masyarakat"){
                                $pelaporan = NumRows("SELECT * FROM pelaporan WHERE id_user = ".$_SESSION['id_user']." ");
                               }
                            ?>
                            <h3 class="mb-0 fw-bold"><?= $pelaporan ?></h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                }
                ?>

                <?php
                if (in_array("peninjauan", $user_dashboard[$_SESSION['level']])) {
                ?>
                  <div class="col-md-3 mb-3">
                    <div class="card card-rounded shadow">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center ">
                          <div class="circle-progress-width">
                            <!-- <i class="fa fa-phone fa-5x"></i> -->
                            <!-- <i class="fa fa-phone"></i> -->
                            <i class="fa fa-list-alt  fa-5x"></i>
                          </div>
                          <div>
                            <p class="text-small mb-2">Total peninjauan</p>
                            <?php
                            $peninjauan = NumRows("SELECT * FROM peninjauan");
                            ?>
                            <h3 class="mb-0 fw-bold"><?= $peninjauan ?></h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                }
                ?>
                
                <?php
                if (in_array("distribusi", $user_dashboard[$_SESSION['level']])) {
                ?>
                  <div class="col-md-3 mb-3">
                    <div class="card card-rounded shadow">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center ">
                          <div class="circle-progress-width">
                            <!-- <i class="fa fa-phone fa-5x"></i> -->
                            <!-- <i class="fa fa-phone"></i> -->
                            <i class="fa fa-truck  fa-5x"></i>
                          </div>
                          <div>
                            <p class="text-small mb-2">Total distribusi</p>
                            <?php
                            $distribusi = NumRows("SELECT * FROM distribusi");
                            ?>
                            <h3 class="mb-0 fw-bold"><?= $distribusi ?></h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                }
                ?>

                <?php
                if (in_array("bantuan", $user_dashboard[$_SESSION['level']])) {
                ?>
                  <div class="col-md-3 mb-3">
                    <div class="card card-rounded shadow">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center ">
                          <div class="circle-progress-width">
                            <!-- <i class="fa fa-phone fa-5x"></i> -->
                            <!-- <i class="fa fa-phone"></i> -->
                            <i class="fa fa-renren fa-5x"></i>
                          </div>
                          <div>
                            <p class="text-small mb-2">Total bantuan</p>
                            <?php
                            $bantuan = NumRows("SELECT * FROM bantuan");
                            ?>
                            <h3 class="mb-0 fw-bold"><?= $bantuan ?></h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                }
                ?>

                <?php
                if (in_array("stok_bantuan", $user_dashboard[$_SESSION['level']])) {
                ?>
                  <div class="col-md-3 mb-3">
                    <div class="card card-rounded shadow">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center ">
                          <div class="circle-progress-width">
                            <!-- <i class="fa fa-phone fa-5x"></i> -->
                            <!-- <i class="fa fa-phone"></i> -->
                            <i class="fa fa-file-text fa-5x"></i>
                          </div>
                          <div>
                            <p class="text-small mb-2">Total stok_bantuan</p>
                            <?php
                            $stok_bantuan = NumRows("SELECT * FROM stok_bantuan");
                            ?>
                            <h3 class="mb-0 fw-bold"><?= $stok_bantuan ?></h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                }
                ?>


              </div>
            </div>
          </div>


        </div>
      </div>
      </div>
      </div>