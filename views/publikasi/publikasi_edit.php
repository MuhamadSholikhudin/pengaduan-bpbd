        <?php
        $id = $_GET['id'];
        $cari_publikasi_berdasarkan_id_publikasi = "SELECT * FROM publikasi WHERE id_publikasi = " . $_GET['id'] . "";
        $satu_publikasi = Querysatudata($cari_publikasi_berdasarkan_id_publikasi);
        ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">

              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <form class="forms-sample" action="<?= $url ?>/?publikasi=update" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="judul">* Judul</label>
                          <input type="hidden" class="form-control p-input" id="id_publikasi" aria-describedby="id_publikasi" name="id_publikasi" placeholder="id_publikasi" value="<?= $satu_publikasi['id_publikasi'] ?>" required>
                          <input type="text" class="form-control p-input" id="judul" aria-describedby="judul" name="judul" value="<?= $satu_publikasi['judul'] ?>" placeholder="Judul" required>
                        </div>
                        <div class="form-group">
                          <label for="kutipan">* Kutipan</label>
                          <textarea class="form-control p-input" id="kutipan" name="kutipan" style="height: auto;"><?= $satu_publikasi['kutipan'] ?></textarea>
                        </div>
                        <div class="form-group">
                          <?php
                          $kategoris = ['Distribusi', 'Peninjauan', 'Pelaporan', 'Stok Bantuan'];
                          ?>
                          <label for="kategori">Kategori</label>
                          <select class="form-control " name="kategori" id="kategori">
                            <?php foreach ($kategoris as $kategori) { ?>
                              <?php if ($kategori ==  $satu_publikasi['id_publikasi']) { ?>
                                <option value="<?= $kategori ?>" selected><?= $kategori ?></option>
                              <?php } else { ?>
                                <option value="<?= $kategori ?>"><?= $kategori ?></option>
                            <?php
                              }
                            } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="tanggal_publikasi">* Tanggal Publikasi</label>
                          <input type="date" class="form-control p-input" id="tanggal_publikasi" name="tanggal_publikasi" value="<?= $satu_publikasi['tanggal_publikasi'] ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="gambar">Gambar</label>
                          <input type="file" class="form-control p-input" id="gambar" name="gambar" onchange="loadFilegambar(event)" accept="image/png, image/gif, image/jpeg" >
                          <br>
                          <div class="card" id="d_gambar">
                            <img src="<?=  $url ?>/gambar/publikasi/<?= $satu_publikasi['gambar'] ?>" id="i_gambar">
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
                          <textarea class="form-control" id="isi" name="isi" style="height: 500px;" required><?= $satu_publikasi['isi'] ?></textarea>
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