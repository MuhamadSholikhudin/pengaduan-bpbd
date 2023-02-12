<?php 

// Mendefinisikan id_posko
$id_posko = 0;

//Jika session loginnya petugas_kajian 
if($_SESSION['level'] == "petugas_logistik"){

  //Menampilkan data posko 
  $posko = Querysatudata("SELECT * FROM posko ORDER BY id_posko DESC ");
  
  // Mensetting ulang id_posko
   $id_posko = $posko['id_posko'];
}
                        
?>
      
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                     <div class="col-lg-12">
                      <a href="<?= $url ?>?posko=add" class="btn btn-sm btn-outline-secondary">
                        <i class="mdi mdi-library-plus"></i>
                        Tambah
                      </a>
                    </div>
                    <div class="col-lg-12 text-center">
                      <h2><?= strtoupper("Data " . array_keys($_GET)[0]) ?></h2>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Peninjau
                          </th>
                          <th>
                            Tanggal Posko
                          </th>
                          <th>
                            Jumlah Jiwa
                          </th>
                          <th>
                            Wilayah
                          </th>
                          <th>
                            Bencana
                          </th>
                          <th>
                            Status Posko
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // Menampilkan looping data posko 
                        $poskos = Querybanyak("SELECT * FROM posko ORDER BY id_posko DESC");
                        foreach ($poskos as $posko) { // poskos di nama ulang as posko ?>
                          <tr>
                            <td>
                              <?php
                              $peninjauan = Querysatudata("SELECT petugas_kajian.nama as nama, peninjauan.id_bencana as id_bencana, peninjauan.id_wilayah as id_wilayah FROM peninjauan JOIN petugas_kajian ON peninjauan.id_petugas_kajian = petugas_kajian.id_petugas_kajian
                               WHERE peninjauan.id_peninjauan = " . $posko['id_peninjauan'] . "")
                              ?>
                              <?= $peninjauan['nama'] ?>
                            </td>
                            <td>
                              <?= $posko['tanggal_posko'] ?>
                            </td>
                            <td>
                              <?= $posko['tanggal_posko'] ?>
                            </td>
                            <td>
                              <?php
                              $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = " . $peninjauan['id_wilayah'] . "")
                              ?>
                              <?= $wilayah['kecamatan'] ?> / <?= $wilayah['desa'] ?>
                            </td>
                            <td>
                            <?php
                              $bencana = Querysatudata("SELECT * FROM bencana WHERE id_bencana = " . $peninjauan['id_bencana'] . "")
                              ?>
                              <?= $bencana['nama_bencana'] ?>
                            </td>
                            <td>
                            <?= $posko['status_posko'] ?>
                              <!-- Update status peninjauan -->
                              <?php if ($_SESSION['level'] == "petugas_kajian") { ?>
                                
                              <?php 
                              } ?>
                            </td>
                            <td>
                            <a href="<?= $url ?>/?posko=edit&id=<?= $posko['id_posko'] ?>" class="btn btn-warning btn-outline-white btn-sm text-white">
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

                  <!-- Modal Tambah Distribusi -->
                  <dsiv class="modal fade" id="modaldistribusi" tabindex="-1" role="dialog" aria-labelledby="modaldistribusiLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modaldistribusiLabel">Form Tambah Data Distribusi Bantuan </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!-- <form class="forms-sample" action="<?= $url ?>/?distribusi=post" method="POST" enctype="multipart/form-data"> -->
                          <input type="text" class="form-control p-input" id="id_peninjauan" style="display: none;">
                          <input type="text" class="form-control p-input" id="id_petugas_logistik" value="<?= $id_petugas_logistik ?>" style="display: none;">
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label for="bencana">Bencana</label>
                                <input type="text" class="form-control p-input" id="bencana" disabled readonly>
                              </div>
                              <div class="form-group">
                                <label for="keterangan_peninjauan">Keterangan Peninjauan</label>
                                <textarea class="form-control" style="height: 100px;" id="keterangan_peninjauan" readonly></textarea>
                              </div>
                              <div class="form-group">
                                <label for="tanggal_distribusi">* Tanggal distribusi</label>
                                <input type="date" class="form-control p-input" id="tanggal_distribusi" value="<?= date('Y-m-d') ?>">
                              </div>
                              <div class="table_result" id="table_result">
                                <div class="table-responsive">
                                  <table class="table table-striped" id="tablleresult">
                                  </table>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="keterangan_distribusi">* Keterangan distribusi</label>
                                <textarea class="form-control" style="height: 100px;" id="keterangan_distribusi"></textarea>
                              </div>
                              <button class="btn btn-primary" onclick="ProcessInsertLogistikStok()"> 
                                <i class="ti-marker"></i> SIMPAN
                              </button>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label for="search_distribusi">Cari Data Bantuan</label>
                                <!-- <input type="text" class="form-control p-input" id="search_distribusi"> -->
                                <input type="text" class="form-control p-input" id="search_distribusi_stok_bantuan">
                              </div>
                              <div class="table-responsive">
                                <table class="result_search table table-striped" id="result_search">
                                </table>
                              </div>
                            </div>
                          </div>
                          <div class="col-12">
                          </div>
                          <!-- </form> -->
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                      </div>
                    </div>
                </div>

                <!-- Modal Status Peninjauan -->
                <div class="modal fade" id="modaleditstatuspeninjauan" tabindex="-1" role="dialog" aria-labelledby="modaleditstatuspeninjauanLabel" aria-hidden="true">
                  <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modaleditstatuspeninjauanLabel">Form Edit Status Peninjauan </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="forms-sample" action="<?= $url ?>/?peninjauan=update_status" method="POST" enctype="multipart/form-data">
                          <input type="text" class="form-control p-input" id="id_user" value="<?= $_SESSION['id_user'] ?>" style="display: none;">
                          <input name="id_peninjauan" id="edit_id_peninjauan" style="display: none;" />
                          <div class="row">
                            <div class="col-12">
                              <div class="form-group">
                                <label for="status_peninjauan">* Status peninjauan</label>
                                <select class="form-control" id="status_peninjauan" name="status_peninjauan">
                                  <?php
                                  $status_penin = ['dalam proses', 'sudah meninjau',  'selesai'];
                                  foreach ($status_penin as $penin) { ?>
                                    <option value="<?= $penin ?>"><?= $penin ?></option>
                                  <?php
                                  }
                                  ?>
                                </select>
                              </div>
                              <div class="form-group text-center">
                                <button class="btn btn-success "> <i class="ti-pencil-alt"></i>Update</button>
                              </div>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="card-footer">

              </div>
            </div>
          </div>

        </div>
      </div>