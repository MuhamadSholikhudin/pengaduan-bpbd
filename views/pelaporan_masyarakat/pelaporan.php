      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-12 grid-margin stretch-card pelaporaninfo" id="pelaporaninfo">
              <div class="card">
                <div class="card-body" style="padding-top: 0%;">
                <div class="text-left" style="text-align: right;">
                    <button class="btn " onclick="Closepelaporaninfo();">
                       <i class="mdi mdi-close"></i> 
                    </button>
                  </div>
                <div class="row ">
                  <p  style="padding-left: 5px; padding-right:5px;">
                  <span class="text-primary">! INFO :</span>  
                   Tampilan ini menampilkan data pelaporan masyarakat yang di tambahkan sesuai user yang di pakai oleh masyarakat
                   data akan untuk menambahkan data pelaporan anda dapat memimilih tombol tambah setelah itu lakukan penginputan 
                   pelaporan bencana sesuai dengan data yang berada di lokasi kejadian. 
                  </p>
                </div>
                </div>
              </div>
            </div>
            <script>
              function Closepelaporaninfo(){
                document.getElementById("pelaporaninfo").style.display = "none";
              }
            </script>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <a href="<?= $url ?>?pelaporan_masyarakat=add" class="btn btn-sm btn-outline-secondary">
                        <i class="mdi mdi-library-plus"></i>
                        Tambah
                      </a>
                    </div>
                    <div class="col-lg-12 text-center">
                      <h2><?= strtoupper("Data " . str_replace("_", " ", array_keys($_GET)[0])) ?></h2>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Pelapor
                          </th>
                          <th>
                            Tanggal Pelaporan
                          </th>
                          <th>
                            Bencana
                          </th>
                          <th>
                            Wilayah
                          </th>
                          <th>
                            Status Pelaporan
                          </th>
                          <th>
                            Review Pelaporan
                          </th>
                          <th>
                            Peninjauan
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        // Menampilkan data pelapor

                        //Menampilkan looping data pelaporan 
                        $pelaporans = Querybanyak("SELECT * FROM pelaporan LEFT JOIN pelapor ON pelaporan.id_pelapor = pelapor.id_pelapor WHERE pelapor.id_user = ".$_SESSION['id_user']." ORDER BY pelaporan.id_pelaporan DESC");
                        foreach ($pelaporans as $pelaporan) { ?>
                          <tr>
                            <td>
                              <?php
                              // $user = Querysatudata("SELECT nama_user FROM user WHERE id_user = " . $pelaporan['id_user'] . "")
                              ?>
                              <?= $pelaporan['nama_pelapor'] ?>
                            </td>
                            <td>
                              <?= $pelaporan['tanggal_pelaporan'] ?>
                            </td>
                            <td>
                              <?php
                              $bencana = Querysatudata("SELECT * FROM bencana WHERE id_bencana = " . $pelaporan['id_bencana'] . "")
                              ?>
                              <?= $bencana['nama_bencana'] ?>
                            </td>
                            <td>
                              <?php
                              $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = " . $pelaporan['id_wilayah'] . "")
                              ?>
                              <?= $wilayah['kecamatan'] ?> / <?= $wilayah['desa'] ?>
                            </td>
                            <td>                             
                              <?= $pelaporan['status_pelaporan'] ?>
                              
                            </td>
                            <td style="width: 40px; ">
                                <!-- Review Pelaporan -->
                                <?= $pelaporan["review_pelaporan"] ?>                             
                            </td>
                            <td>
                              <?php 
                              // Check data peninjaun berdasarkan id_pelaporan
                              $checkp = NumRows("SELECT * FROM peninjauan WHERE id_pelaporan = ".$pelaporan['id_pelaporan']."");
                              if($checkp > 0){ // jika peninjauan pelaporan sudah ada 
                                
                                // Query menampilkan satu data peninjauan 
                                $peninjauan = Querysatudata("SELECT * FROM peninjauan WHERE id_pelaporan = ".$pelaporan['id_pelaporan']." ");
                                
                                // Query menampilkan satu data user 
                                $user = Querysatudata("SELECT * FROM user WHERE id_user = ".$pelaporan['id_user']." ");
                                echo "(".$user['nama_user']."), ".$peninjauan['status_peninjauan'];
                              }else{ // Jika peninjauan tidak ada maka tampilkan
                                echo "Belum di tinjau";

                              }            
                              ?>
                            </td>
                            <td>
                              <!-- Action -->
                              <?php
                              if ($pelaporan['status_pelaporan'] == "belum dikirim") { // Jika status pelaporan belum di kirim
                              ?>
                                <a href="<?= $url ?>/?pelaporan_masyarakat=kirim&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-primary btn-outline-white btn-sm text-white">
                                  <i class="ti-arrow-top-right"></i>
                                  Kirim
                                </a>
                                <a href="<?= $url ?>/?pelaporan_masyarakat=edit&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-warning btn-outline-white btn-sm text-white">
                                  <i class="ti-pencil-alt"></i>
                                  Edit
                                </a>
                              <?php
                              } elseif ($pelaporan['status_pelaporan'] == "batal kirim") { // Jika status_pelaporan batal dikirim
                              ?>
                                <a href="<?= $url ?>/?pelaporan_masyarakat=kirim&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-primary btn-outline-white btn-sm text-white">
                                  <i class="ti-arrow-top-right"></i>
                                  Kirim
                                </a>
                                <a href="<?= $url ?>/?pelaporan_masyarakat=edit&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-warning btn-outline-white btn-sm text-white">
                                  <i class="ti-pencil-alt"></i>
                                  Edit
                                </a>
                              <?php
                              } elseif ($pelaporan['status_pelaporan'] == "terkirim") { // Jika status_pelaporan terkirim
                              ?>
                                <a href="<?= $url ?>/?pelaporan_masyarakat=batal_kirim&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-secondary btn-outline-white btn-sm text-dark">
                                  <i class="ti-back-left"></i>
                                  Batalkan
                                </a>
                              <?php
                              } elseif ($pelaporan['status_pelaporan'] == "tidak valid") { // Jika status_pelaporan tidak valid
                              ?>
                                <a href="<?= $url ?>/?pelaporan_masyarakat=kirim&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-primary btn-outline-white btn-sm text-white">
                                  <i class="ti-arrow-top-right"></i>
                                  Kirim
                                </a>
                                <a href="<?= $url ?>/?pelaporan_masyarakat=edit&id=<?= $pelaporan['id_pelaporan'] ?>" class="btn btn-warning btn-outline-white btn-sm text-white">
                                  <i class="ti-pencil-alt"></i>
                                  Edit
                                </a>
                              <?php
                              } elseif ($pelaporan['status_pelaporan'] == "tervalidasi") { // Jika status_pelaporan tervalidasi
                              ?>
                                <a href="#" class="btn btn-success btn-outline-white btn-sm text-white">
                                  <i class="ti-check-box"></i>
                                  valid
                                </a>
                              <?php
                              }
                              ?>


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