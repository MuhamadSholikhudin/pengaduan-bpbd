        <?php
        $cari_bantuan_berdasarkan_id_bantuan =
            "SELECT * FROM bantuan WHERE id_bantuan = " . $_GET['id'] . " ORDER BY id_bantuan DESC";
        $satu_bantuan = Querysatudata($cari_bantuan_berdasarkan_id_bantuan);
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
                      <!-- <a href="<?= $url ?>?stok_bantuan=add" class="btn btn-sm btn-outline-secondary">
                          <i class="mdi mdi-library-plus"></i>
                          Tambah
                        </a> -->
                        <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#modalSaya">
                          <i class="mdi mdi-library-plus"></i>
                            Tambah
                        </button>
                        <!-- Modal Stok Dana -->
                        <div class="modal fade" id="modalSaya" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalSayaLabel">Form Tambah Data Bantuan <?= $satu_bantuan['nama_bantuan'] ?> </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form class="forms-sample" action="<?= $url ?>/?stok_bantuan=post" method="POST" enctype="multipart/form-data">
                                  <input type="hidden" class="form-control p-input" id="id_bantuan" name="id_bantuan" value="<?= $satu_bantuan['id_bantuan'] ?>">
                                  <div class="form-group">
                                    <label for="tanggal_masuk">* Tanggal Masuk</label>
                                    <input type="date" class="form-control p-input" id="tanggal_masuk" name="tanggal_masuk" value="<?= date('Y-m-d') ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="tanggal_kadaluarsa">* Tanggal Kadaluarsa</label>
                                    <input type="date" class="form-control p-input" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" value="<?= date('Y-m-d') ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="stok">* Stok</label>
                                    <input type="text" class="form-control" id="stok" name="stok">
                                  </div>
                                  <div class="form-group">
                                    <label for="batch">* Batch</label>
                                    <input type="text" class="form-control" id="batch" name="batch">
                                  </div>
                                  <div class="form-group">
                                    <label for="satuan">* Satuan</label>
                                    <input type="text" class="form-control" id="satuan" name="satuan">
                                  </div>

                                  <div class="col-12">
                                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <!-- <button type="button" class="btn btn-primary">Oke</button> -->
                              </div>
                            </div>
                          </div>
                        </div>

                    </div>
                    <div class="col-lg-12 text-center">
                      <h2>Data Bantuan <?= $satu_bantuan['nama_bantuan'] ?></h2>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            ID Bantuan
                          </th>
                          <th>
                            Batch
                          </th>
                          <th>
                            Tanggal Masuk
                          </th>
                          <th>
                            Tanggal Kadaluarsa
                          </th>
                          <th>
                            Stok
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $stok_bantuans = Querybanyak("SELECT * FROM stok_bantuan WHERE id_bantuan = ".$_GET['id']."");
                        foreach ($stok_bantuans as $stok_bantuan) { ?>
                        <tr>
                          <td>
                            Herman Beck
                          </td>
                          <td>
                            <?= $stok_bantuan['batch'] ?>
                          </td>
                          <td>
                            <?= $stok_bantuan['tanggal_masuk'] ?>
                          </td>
                          <td>
                            <?= $stok_bantuan['tanggal_kadaluarsa'] ?>
                          </td>
                          <td>
                            <?= $stok_bantuan['stok'] ?>
                          </td>
                          <td>
                            <a href="<?= $url ?>/?stok_bantuan=edit" class="btn btn-sm btn-sm btn-outline-secondary btn-icon-text">
                              Edit
                              <i class="ti-file btn-icon-append"></i>                          
                            </a>                          
                          </td>
                        </tr>
                        <?php }
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
