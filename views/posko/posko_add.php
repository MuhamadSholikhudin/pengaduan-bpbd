      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-header">
                  <h2><?= strtoupper("Tambah data " . array_keys($_GET)[0]) ?></h2>
                </div>
                <div class="card-body">
                  <div class="row">
                    <form class="forms-sample" action="<?= $url ?>/?posko=post" method="POST" enctype="multipart/form-data">

                      <div class="form-group">
                        <label for="id_peninjauan">* Peninjauan</label>
                        <select class=" form-control" id="id_peninjauan" name="id_peninjauan" required>
                          <?php

                          //Menampilkan data looping peninjauan
                          $peninjauans = Querybanyak("SELECT * FROM peninjauan WHERE status_peninjauan != 'selesai' ");
                          foreach ($peninjauans as $peninjauan) {

                            //Menamplkan data bencana dan wilyah bersadarkan peninjauan berdasarkan id_peninjauan
                            $bencanawil = Querysatudata("SELECT wilayah.kecamatan, wilayah.desa, bencana.nama_bencana FROM peninjauan 
                            LEFT JOIN wilayah ON peninjauan.id_wilayah = wilayah.id_wilayah
                            JOIN bencana ON peninjauan.id_bencana = bencana.id_bencana WHERE peninjauan.id_peninjauan = " . $peninjauan['id_peninjauan'] . "  ")
                          ?>
                            <option value="<?= $peninjauan['id_peninjauan'] ?>"><?= $bencanawil['nama_bencana'] ?>/ <?= $bencanawil['kecamatan'] ?>, <?= $bencanawil['desa'] ?> Jumlah Korban <?= $peninjauan['jumlah_korban'] ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="nama_posko">* Nama Posko</label>
                        <input type="text" class="form-control p-input" id="nama_posko" name="nama_posko" aria-describedby="nama_posko" placeholder="Isi nama posko" required>
                      </div>
                      <div class="form-group">
                        <label for="status_posko">* Status posko</label>
                        <select class=" form-control" id="status_posko" name="status_posko" required>
                          <?php
                          //Membuat array data status posko 
                          $status_posko = ["Keadaan Darurat Bencana", "Siaga Darurat", "Tanggap Darurat", "Transisi Darurat ke Pemulihan"];
                          foreach ($status_posko as $status) {
                          ?>
                            <option value="<?= $status ?>"><?= $status ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="jumlah_jiwa">* Jumlah Jiwa</label>
                        <input type="number" class="form-control p-input" id="jumlah_jiwa" name="jumlah_jiwa" aria-describedby="jumlah_jiwa" min="0" value="0" placeholder="Jumlah jiwa" required>
                      </div>

                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="balita">Balita</label>
                            <input type="number" class="form-control p-input" id="balita" name="balita" aria-describedby="balita" min="0" value="0" placeholder="Jumlah jiwa">
                          </div>
                          <div class="form-group">
                            <label for="remaja">Remaja</label>
                            <input type="number" class="form-control p-input" id="remaja" name="remaja" aria-describedby="remaja" min="0" value="0" placeholder="Jumlah jiwa">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="dewasa">Dewasa</label>
                            <input type="number" class="form-control p-input" id="dewasa" name="dewasa" aria-describedby="dewasa" min="0" value="0" placeholder="Jumlah jiwa">
                          </div>
                          <div class="form-group">
                            <label for="lanjut_usia">Lanjut Usia</label>
                            <input type="number" class="form-control p-input" id="lanjut_usia" name="lanjut_usia" aria-describedby="lanjut_usia" min="0" value="0" placeholder="Jumlah jiwa">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="tanggal_posko">* Tanggal Posko</label>
                          <input type="date" class="form-control p-input" id="tanggal_posko" aria-describedby="tanggal_posko" name="tanggal_posko" required>
                        </div>
                        <div class="form-group">
                          <label for="tanggal_selesai">Tanggal Selesai</label>
                          <input type="date" class="form-control p-input" id="tanggal_selesai" aria-describedby="tanggal_selesai" name="tanggal_selesai">
                        </div>
                        <div class="form-group">
                          <label for="gambar_posko">* Bukti Peninjauan</label>
                          <input type="file" class="form-control" id="gambar_posko" name="gambar_posko" onchange="loadFilegambar_posko(event)" accept="image/png, image/gif, image/jpeg">
                          <br>
                          <div class="card" id="d_gambar_posko">
                            <img id="i_gambar_posko">
                          </div>
                        </div>
                        <script>
                          var loadFilegambar_posko = function(event) {
                            var output = document.getElementById('i_gambar_posko');
                            output.src = URL.createObjectURL(event.target.files[0]);
                            output.onload = function() {
                              URL.revokeObjectURL(output.src) // free memory
                            }
                          };
                        </script>

                        <div class="form-group">
                          <label for="keterangan">Keterangan</label>
                          <textarea class="form-control" id="keterangan" style="height:100px;" name="keterangan"></textarea>
                        </div>
                        <div class="col-12">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
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