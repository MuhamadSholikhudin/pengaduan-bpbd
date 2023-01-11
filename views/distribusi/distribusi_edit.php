      <?php
      $id = $_GET['id'];
      $cari_distribusi_berdasarkan_id_distribusi = "SELECT * FROM distribusi WHERE id_distribusi = ". $_GET['id'] ."";
      $satu_distribusi = Querysatudata($cari_distribusi_berdasarkan_id_distribusi);
      $sql_peninjauan = "SELECT * FROM peninjauan LEFT JOIN bencana ON peninjauan.id_bencana = bencana.id_bencana JOIN wilayah ON peninjauan.id_wilayah = wilayah.id_wilayah WHERE peninjauan.id_peninjauan = ".$satu_distribusi['id_peninjauan']." ";
      $peninjauan = Querysatudata($sql_peninjauan);
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-header">
                  <h2><?= strtoupper('Edit data ' . array_keys($_GET)[0]) ?></h2>
                </div>
                <div class="card-body">
                  <div class="row">
                    <!-- <form class="forms-sample" action="<?= $url ?>/?stok_bantuan=stok_bantuan_post" method="POST" enctype="multipart/form-data"> -->
                    <input type="hidden" class="form-control p-input" id="id_distribusi" aria-describedby="id_distribusi" name="id_distribusi" value="<?= $_GET['id'] ?>">
                    <input type="hidden" class="form-control p-input" id="id_user" aria-describedby="id_user" name="id_user" value="<?= $_SESSION['id_user'] ?>">
                    <input type="hidden" class="form-control p-input" id="id_peninjauan" aria-describedby="id_peninjauan" name="id_peninjauan" value="<?= $satu_distribusi['id_peninjauan'] ?>">
                    <div class="form-group">
                      <label for="info_peninjauan">Info Peninjauan</label>
                      <textarea class="form-control"  style="height: 100px;" disabled>Terjadi <?= $peninjauan['kategori_bencana'] ?> <?= $peninjauan['nama_bencana'] ?> dengan level <?= $peninjauan['level_bencana'] ?>   pada wilayah <?= $peninjauan['kecamatan'] ?> <?= $peninjauan['desa'] ?> dengan jumlah korban <?= $peninjauan['jumlah_korban'] ?> keterangan : <?= $peninjauan['keterangan_peninjauan'] ?>
                      </textarea>
                    </div>                   

                    <div class="form-group">
                      <label for="tanggal_distribusi">Tanggal distribusi</label>
                      <input type="date" class="form-control p-input" id="tanggal_distribusi" aria-describedby="tanggal_distribusi" name="tanggal_distribusi" value="<?= $satu_distribusi['tanggal_distribusi'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="keterangan_distribusi">Keterangan distribusi</label>
                      <textarea class="form-control" id="keterangan_distribusi" name="keterangan_distribusi" style="height: 100px;"><?= $satu_distribusi['keterangan_distribusi'] ?></textarea>
                    </div>
                    <div class="form-group mt-3">
                      <label for="search_distribusi">Cari Data Bantuan</label>
                      <!-- <input type="text" class="form-control p-input" id="search_edit_distribusi"> -->
                      <input type="text" class="form-control p-input" id="search_editdistribusi_stok_bantuan">
                    </div>

                    <!-- <div class="result_search" id="result_search">
                    </div> -->

                    <div class="table-responsive">
                      <table class="table table-striped" id="result_search">

                      </table>
                    </div>

                    <!-- </form> -->
                  </div>
                </div>
                <div class="card-footer">
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-header">
                  <h2>Edit Data Bantuan Distribusi</h2>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="table-responsive">
                      <table class="table table-striped" id="">
                        <thead>
                          <tr>
                            <td>NO</td>
                            <td>Nama</td>
                            <td>Jumlah</td>
                            <td>Satuan</td>
                            <td>Action</td>
                          </tr>
                        </thead>
                        <tbody id="editbodydistribusi">
                          <?php
                          $no = 1;
                          $bantuan_distribusis = Querybanyak("SELECT * FROM bantuan_distribusi LEFT JOIN stok_bantuan ON bantuan_distribusi.id_stok_bantuan = stok_bantuan.id_stok_bantuan WHERE bantuan_distribusi.id_distribusi = " . $_GET['id'] . "");
                          foreach ($bantuan_distribusis as $bantuan_distribusi) {
                            $bantuan = Querysatudata("SELECT * FROM bantuan WHERE id_bantuan = " . $bantuan_distribusi['id_bantuan'] . "")
                          ?>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $bantuan['nama_bantuan']; ?></td>
                              <td>
                                <input class="form-control" type="hidden" name="stok_bantuan_id[]" min="0" value="<?= $bantuan_distribusi['id_stok_bantuan']; ?>">
                                <input class="form-control" type="number" name="jumlah_bantuan[]" min="0" value="<?= $bantuan_distribusi['jumlah']; ?>">
                              </td>
                              <td>
                                <?= $bantuan['satuan']; ?>
                              </td>
                              <td class="">
                                <a href="#" class="text-decoration-none text-danger" id="trash_stok_bantuan_edit">
                                  <i id="removebant" class="ti-trash"></i>
                                  Delete
                                </a>
                              </td>
                            </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                        <?php 
                        /*
                        <tbody id="editbodydistribusi">
                          <?php
                          $no = 1;
                          $bantuan_distribusis = Querybanyak("SELECT * FROM bantuan_distribusi LEFT JOIN stok_bantuan ON bantuan_distribusi.id_stok_bantuan = stok_bantuan.id_stok_bantuan WHERE bantuan_distribusi.id_distribusi = " . $_GET['id'] . "");
                          foreach ($bantuan_distribusis as $bantuan_distribusi) {
                            $bantuan = Querysatudata("SELECT * FROM bantuan WHERE id_bantuan = " . $bantuan_distribusi['id_bantuan'] . "")
                          ?>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $bantuan['nama_bantuan']; ?></td>
                              <td>
                                <input class="form-control" type="hidden" name="stok_bantuan_id[]" min="0" value="<?= $bantuan_distribusi['id_stok_bantuan']; ?>">
                                <input class="form-control" type="number" name="jumlah_bantuan[]" min="0" value="<?= $bantuan_distribusi['jumlah']; ?>">
                              </td>
                              <td>
                                <?= $bantuan['satuan']; ?>
                              </td>
                              <td class="">
                                <a href="#" class="text-decoration-none text-danger" id="trash_bantuan_edit">
                                  <i id="removebant" class="ti-trash"></i>
                                  Delete
                                </a>
                              </td>
                            </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                            */
                        ?>
                      </table>
                      <?php 
                      /*
                       <!-- List Data bantuan distribusi lama -->
                        <!--
                        <tbody id="editbodydistribusi">
                        <?php
                          $no = 1;
                          $bantuan_distribusis = Querybanyak("SELECT * FROM bantuan_distribusi WHERE id_distribusi = " . $_GET['id'] . "");
                          foreach ($bantuan_distribusis as $bantuan_distribusi) {
                            $bantuan = Querysatudata("SELECT * FROM bantuan WHERE id_bantuan = " . $bantuan_distribusi['id_bantuan'] . "")
                          ?>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $bantuan['nama_bantuan']; ?></td>
                              <td>
                                <input class="form-control" type="hidden" name="bantuan_id[]" min="0" value="<?= $bantuan_distribusi['id_bantuan']; ?>">
                                <input class="form-control" type="number" name="jumlah_bantuan[]" min="0" value="<?= $bantuan_distribusi['jumlah']; ?>">
                              </td>
                              <td>
                                <?= $bantuan['satuan']; ?>
                              </td>
                              <td class="">
                                <a href="#" class="text-decoration-none text-danger" id="trash_bantuan_edit">
                                  <i id="removebant" class="ti-trash"></i>
                                  Delete
                                </a>
                              </td>
                            </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                        -->
                        */
                        ?>
                    </div>
                    <div class="col-12 mt-3 text-center">
                      <!-- <button type="submit" class="btn btn-success" onclick="ProcessUpdateLogistik();"> -->
                      <button type="submit" class="btn btn-success" onclick="ProcessUpdateLogistikStokbantuan();">
                        <i class="ti-pencil-alt"></i>
                        Update
                      </button>

                    </div>
                  </div>

                </div>
                <div class="card-footer">
                </div>
              </div>
            </div>

          </div>
        </div>