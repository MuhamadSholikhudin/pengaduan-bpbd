      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-header">
                  <h2><?= strtoupper("Tambah data " . array_keys($_GET)[0]) ?></h2>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="modal-body">
                      <form class="forms-sample" action="<?= $url ?>/?distribusi=post" method="POST" enctype="multipart/form-data">
                        <input type="text" class="form-control p-input" id="id_peninjauan" style="display: none;">
                        <input type="text" class="form-control p-input" id="id_petugas_logistik" value="<?= $id_petugas_logistik ?>" style="display: none;">
                        <div class="row">
                          <div class="col-lg-6">

                            <div class="form-group">
                              <label for="peninjauan">Peninjauan</label>
                              <select class=" form-control" id="add_id_peninjauan" name="id_peninjauan" required>

                              <option value="" >#</option>

                                <?php

                                //Menampilkan data looping peninjauan
                                $peninjauans = Querybanyak("SELECT * FROM peninjauan WHERE status_peninjauan != 'selesai' ");
                                foreach ($peninjauans as $peninjauan) {

                                  //Menamplkan data bencana dan wilyah bersadarkan peninjauan berdasarkan id_peninjauan
                                  $bencanawil = Querysatudata("SELECT wilayah.kecamatan, wilayah.desa, bencana.nama_bencana FROM peninjauan 
                                  LEFT JOIN wilayah ON peninjauan.id_wilayah = wilayah.id_wilayah
                                  JOIN bencana ON peninjauan.id_bencana = bencana.id_bencana WHERE peninjauan.id_peninjauan = " . $peninjauan['id_peninjauan'] . "  ")
                                ?>
                                  <option value="<?= $peninjauan['id_peninjauan'] ?>" data-id="<?= $peninjauan['id_peninjauan'] ?>"><?= $peninjauan['tanggal_peninjauan']. ", ". $bencanawil['nama_bencana'] ?>/ <?= $bencanawil['kecamatan'] ?>, <?= $bencanawil['desa'] ?> Jumlah Korban <?= $peninjauan['jumlah_korban'] ?></option>
                                <?php
                                }
                                ?>
                              </select>

                            </div>

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
                              <input type="date" class="form-control p-input" id="tanggal_distribusi" name="tanggal_distribusi" value="<?= date('Y-m-d') ?>" required>
                            </div>
                            <div class="table_result" id="table_result">
                              <div class="table-responsive">
                                <table class="table table-striped" id="tablleresult">
                                </table>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="keterangan_distribusi">* Keterangan distribusi</label>
                              <textarea class="form-control" style="height: 100px;" id="keterangan_distribusi" name="keterangan_distribusi"></textarea>
                            </div>
                            <button class="btn btn-primary" onclick="ProcessInsertLogistikStok()">
                              <i class="ti-marker"></i> SIMPAN
                            </button>
                            
                          </div>
                        </form>
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
                    </div>

                  </div>




                </div>
                <div class="card-footer">

                </div>
              </div>
            </div>

          </div>
        </div>