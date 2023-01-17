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
              <form class="forms-sample" action="<?= $url ?>/?pelaporan=post" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="nama_pelapor">* Nama pelapor</label>
                  <input type="hidden" class="form-control p-input" id="id_user" name="id_user" value="<?= $_SESSION['id_user'] ?>">
                  <input type="hidden" class="form-control p-input" name="status_pelaporan" value="belum dikirim">
                  <input type="text" class="form-control p-input" value="<?= $_SESSION['nama_user'] ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="tanggal_pelaporan">* Tanggal pelaporan</label>
                  <input type="date" class="form-control p-input" id="tanggal_pelaporan" name="tanggal_pelaporan" value="<?= date("Y-m-d") ?>">
                </div>
                <div class="form-group">
                  <label for="pelaporan">* Wilayah</label>
                  <select class="js-example-basic-single form-control" name="id_wilayah" required>
                    <?php
                    $wilayahs = Querybanyak("SELECT * FROM wilayah");
                    foreach ($wilayahs as $wilayah) { ?>
                      <option value="<?= $wilayah['id_wilayah'] ?>"><?= $wilayah['desa'] ?> / <?= $wilayah['kecamatan'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="id_bencana">* Bencana</label>
                  <select class="js-example-basic-single form-control" id="id_bencana" name="id_bencana" required>
                    <?php
                    $bencanas = Querybanyak("SELECT * FROM bencana");
                    foreach ($bencanas as $bencana) { ?>
                      <option value="<?= $bencana['id_bencana'] ?>"><?= $bencana['nama_bencana'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="pelaporan">* Keterangan pelaporan</label>
                  <textarea class="form-control" id="pelaporan" name="pelaporan" style="height: 300px;" required></textarea>
                </div>
                <div class="form-group">
                  <label for="gambar_bencana">* Gambar Bencana</label>
                  <input type="file" class="form-control mb-2" id="gambar_bencana" name="gambar_bencana" onchange="loadFilegambar_bencana(event)" required>                  
                  <div class="card " id="d_gambar_bencana">
                      <img id="i_gambar_bencana">
                  </div>
                  <script>
                    var loadFilegambar_bencana = function(event) {
                      var output = document.getElementById('i_gambar_bencana');
                      output.src = URL.createObjectURL(event.target.files[0]);
                      output.onload = function() {
                        URL.revokeObjectURL(output.src) // free memory
                      }
                    };
                  </script>
                </div>
                <div class="form-group">
                  <label for="gambar_lokasi_bencana">* Gambar lokasi Bencana</label>
                  <input type="file" class="form-control  mb-2" id="gambar_lokasi_bencana" name="gambar_lokasi_bencana" onchange="loadFilegambar_lokasi_bencana(event)" required>
                  <div class="card " id="d_gambar_lokasi_bencana">
                      <img id="i_gambar_lokasi_bencana">
                  </div>
                  <script>
                    var loadFilegambar_lokasi_bencana = function(event) {
                      var output = document.getElementById('i_gambar_lokasi_bencana');
                      output.src = URL.createObjectURL(event.target.files[0]);
                      output.onload = function() {
                        URL.revokeObjectURL(output.src) // free memory
                      }
                    };
                  </script>
                </div>
                <div class="form-group">
                  <label for="link_maps">Link Maps (Opsional)</label>
                  <input type="url" class="form-control p-input" id="link_maps" name="link_maps">
                </div>
                <div class="form-group">
                  <label for="gambar_pelapor">* Gambar Pelapor</label>
                  <input type="file" class="form-control  mb-2" id="gambar_pelapor" name="gambar_pelapor" onchange="loadFilegambar_pelapor(event)" required>
                  <div class="card " id="d_gambar_pelaporan">
                      <img id="i_gambar_pelaporan" />
                  </div>
                  <script>
                    var loadFilegambar_pelaporan = function(event) {
                      var output = document.getElementById('i_gambar_pelapor');
                      output.src = URL.createObjectURL(event.target.files[0]);
                      output.onload = function() {
                        URL.revokeObjectURL(output.src) // free memory
                      }
                    };
                  </script>
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