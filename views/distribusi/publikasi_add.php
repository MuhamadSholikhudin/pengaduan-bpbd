    <?php
      $id = $_GET['id'];

      // Query menampilkan data distribusi berdasarkan id_distribusi dari GET['id']
      $cari_distribusi_berdasarkan_id_distribusi = "SELECT * FROM distribusi WHERE id_distribusi = " . $_GET['id'] . "";
      
      // Execute Query data distribusi
      $satu_distribusi = Querysatudata($cari_distribusi_berdasarkan_id_distribusi);

      // Query menampilkan data peninjauan berdasarkan id_peninjauan dari distribusis
      $sql_peninjauan = "SELECT * FROM peninjauan LEFT JOIN bencana ON peninjauan.id_bencana = bencana.id_bencana JOIN wilayah ON peninjauan.id_wilayah = wilayah.id_wilayah WHERE peninjauan.id_peninjauan = " . $satu_distribusi['id_peninjauan'] . " ";
      
      // Execute Query data peninjauan
      $peninjauan = Querysatudata($sql_peninjauan);
      ?>
      
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
                <div class="card-header">
                  <h2><?= strtoupper('Lihat data ' . array_keys($_GET)[0]) ?></h2>
                </div>
                <div class="card-body">
                  <div class="row">
                    <!-- <form class="forms-sample" action="<?= $url ?>/?stok_bantuan=stok_bantuan_post" method="POST" enctype="multipart/form-data"> -->
                    <input type="hidden" class="form-control p-input" id="id_distribusi" aria-describedby="id_distribusi" name="id_distribusi" value="<?= $_GET['id'] ?>">
                    <input type="hidden" class="form-control p-input" id="id_user" aria-describedby="id_user" name="id_user" value="<?= $_SESSION['id_user'] ?>">
                    <input type="hidden" class="form-control p-input" id="id_peninjauan" aria-describedby="id_peninjauan" name="id_peninjauan" value="<?= $satu_distribusi['id_peninjauan'] ?>">
                    <div class="form-group">
                      <label for="info_peninjauan">Info Peninjauan</label>
                      <textarea class="form-control" style="height: 100px;" disabled>Terjadi <?= $peninjauan['kategori_bencana'] ?> <?= $peninjauan['nama_bencana'] ?> dengan level <?= $peninjauan['level_bencana'] ?>   pada wilayah <?= $peninjauan['kecamatan'] ?> <?= $peninjauan['desa'] ?> dengan jumlah korban <?= $peninjauan['jumlah_korban'] ?> keterangan : <?= $peninjauan['keterangan_peninjauan'] ?>
                      </textarea>
                    </div>
                    <div class="form-group">
                      <label for="tanggal_distribusi">Tanggal distribusi</label>
                      <input type="date" class="form-control p-input" id="tanggal_distribusi" aria-describedby="tanggal_distribusi" name="tanggal_distribusi" value="<?= $satu_distribusi['tanggal_distribusi'] ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="keterangan_distribusi">Keterangan distribusi</label>
                      <textarea class="form-control" id="keterangan_distribusi" name="keterangan_distribusi" style="height: 100px;" disabled><?= $satu_distribusi['keterangan_distribusi'] ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="bukti_distribusi">Bukti distribusi</label>
                      <img class="card-img" src="<?= $url ?>/gambar/bukti_distribusi/<?= $satu_distribusi['bukti_distribusi'] ?>" alt="">
                    </div>

                    <div class="table-responsive">
                      <table class="table table-striped" id="">
                        <thead>
                          <tr>
                            <td>NO</td>
                            <td>Nama</td>
                            <td>Jumlah</td>
                            <td>Satuan</td>
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
                                <input class="form-control" type="number" name="jumlah_bantuan[]" min="0" value="<?= $bantuan_distribusi['jumlah']; ?>" disabled>
                              </td>
                              <td>
                                <?= $bantuan['satuan']; ?>
                              </td>

                            </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>


                  </div>
                </div>
                <div class="card-footer">
                </div>
              </div>





          </div>

            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
              <div class="card-header">
              <h3>Form Tambah Publikasi </h3>
              </div>
                <div class="card-body">
                  <div class="row">
                    <form class="forms-sample" action="<?= $url ?>/?publikasi=post" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="judul">* Judul</label>
                        <input type="hidden" class="form-control p-input" id="id_distribusi" aria-describedby="id_distribusi" name="id_distribusi" value="<?= $_GET["id"] ?>" required>
                        <input type="text" class="form-control p-input" id="judul" aria-describedby="judul" name="judul" placeholder="Judul" required>
                      </div>
                      <div class="form-group">
                        <label for="kutipan">* Kutipan</label>
                        <textarea class="form-control p-input" id="kutipan" name="kutipan" style="height: auto;"></textarea>
                      </div>
                      <div class="form-group">
                        <?php
                        $kategoris = ['Distribusi', 'Peninjauan', 'Pelaporan', 'Stok Bantuan'];
                        ?>
                        <label for="kategori">Kategori</label>
                        <select class="form-control " name="kategori" id="kategori">
                          <?php foreach ($kategoris as $kategori) { ?>
                            <option value="<?= $kategori ?>"><?= $kategori ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="tanggal_publikasi">* Tanggal Publikasi</label>
                        <input type="date" class="form-control p-input" id="tanggal_publikasi" name="tanggal_publikasi" required>
                      </div>
                      <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control p-input" id="gambar" name="gambar" onchange="loadFilegambar(event)" accept="image/png, image/gif, image/jpeg" required>
                        <br>
                        <div class="card" id="d_gambar">
                          <img id="i_gambar">
                        </div>
                      </div>
                      <script>
                        var loadFilegambar = function(event) {
                          var output = document.getElementById('i_gambar');
                          output.src = URL.createObjectURL(event.target.files[0]);
                          output.onload = function() {
                            URL.revokeObjectURL(output.src) // free memory
                          }
                        };
                      </script>
                      <div class="form-group">
                        <label for="isi">* Isi publikasi</label>
                        <textarea class="form-control" id="isi" name="isi" style="height: 500px;" required></textarea>
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