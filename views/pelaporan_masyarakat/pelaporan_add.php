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
              <p style="padding-left: 5px; padding-right:5px;">
              <?php 

              //Menampilkan data pelaporan yang dudah login
              $pelapor = Querysatudata("SELECT * FROM pelapor WHERE id_user = ".$_SESSION['id_user']." ");

              // Menampilkan data satu bpbp
              $sql_user = "SELECT * FROM user WHERE level = 'petugas_bpbd' LIMIT 1 " ;
              $numAdmn = NumRows($sql_user);

              $user_admin = Querysatudata($sql_user);
              $sql_petugas = "SELECT * FROM petugas_bpbd WHERE id_user = ".$user_admin['id_user']." LIMIT 1 ";
              $numpetugas = NumRows($sql_petugas);
              $no_hp = "";

            
              if($numpetugas  > 0){
                $petugas_bpbd = Querysatudata($sql_petugas);
                $no_hp = $petugas_bpbd['no_telp'];
              }
              ?>
                <span class="text-primary">! INFO :</span>
                Halaman ini digunakan untuk menambahkan data pelaporan bencana data yang di tambahkan akan di prosess 1 X 24 jam 
                atau jika dalam keadaan mendesak anda dapat langsung hubungi <a href="tel:+"> <?= $no_hp ?></a>
              </p>
            </div>
          </div>
        </div>
      </div>
      <script>
        function Closepelaporaninfo() {
          document.getElementById("pelaporaninfo").style.display = "none";
        }
      </script>
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
                  <input type="hidden" class="form-control p-input" id="id_pelapor" name="id_pelapor" value="<?= $pelapor['id_pelapor'] ?>">
                  <input type="hidden" class="form-control p-input" name="status_pelaporan" value="belum dikirim">
                  <input type="text" class="form-control p-input" value="<?= $pelapor['nama_pelapor'] ?>" disabled>
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
                  <label for="link_maps">Link Maps (Opsional)</label>
                  <input type="url" class="form-control p-input" id="link_maps" name="link_maps">
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-header">
            <h2><?= strtoupper("Tambah data gambar bencana") ?></h2>
          </div>
          <div class="card-body">
            <div class="row">
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
                <label for="gambar_pelapor">* Gambar Pelapor</label>
                <input type="file" class="form-control  mb-2" id="gambar_pelapor" name="gambar_pelapor" onchange="loadFilegambar_pelapor(event)" required>
                <div class="card " id="d_i_gambar_pelapor">
                  <img id="i_gambar_pelapor" />
                </div>
                <script>
                  var loadFilegambar_pelapor = function(event) {
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
              <!-- </form> -->
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>

</div>
</div>