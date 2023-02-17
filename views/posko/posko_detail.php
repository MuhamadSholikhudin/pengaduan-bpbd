      
<?php
//definisikan parameter get['id']
$id = $_GET['id'];

//Menampilkan data posko berdasarkan id
$posko = Querysatudata('SELECT * FROM posko WHERE id_posko = ' . $id . ' ');
?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-header">
                  <h2><?= strtoupper(
                      'Edit data ' . array_keys($_GET)[0]
                  ) ?></h2>
                </div>
                <div class="card-body">
                  <div class="row">
                    <form class="forms-sample" action="<?= $url ?>/?posko=update" method="POST" enctype="multipart/form-data">
                      <!-- Hidden id_posko -->
                      <input type="hidden" name="id_posko" value="<?= $id ?>">
                      <div class="form-group">
                        <label for="id_peninjauan">* Peninjauan</label>
                        <select class=" form-control" id="id_peninjauan" name="id_peninjauan" required>
                          <?php
                          //Menampilkan data looping peninjauan
                          $peninjauans = Querybanyak(
                              'SELECT * FROM peninjauan WHERE id_peninjauan = ' .
                                  $posko['id_peninjauan'] .
                                  ' '
                          );
                          foreach ($peninjauans as $peninjauan) {
                              //Menamplkan data bencana dan wilyah bersadarkan peninjauan berdasarkan id_peninjauan
                              $bencanawil = Querysatudata(
                                  "SELECT wilayah.kecamatan, wilayah.desa, bencana.nama_bencana FROM peninjauan 
                            LEFT JOIN wilayah ON peninjauan.id_wilayah = wilayah.id_wilayah
                            JOIN bencana ON peninjauan.id_bencana = bencana.id_bencana 
                            WHERE peninjauan.id_peninjauan = " .
                                      $peninjauan['id_peninjauan'] .
                                      '  '
                              );

                              if (
                                  $peninjauan['id_peninjauan'] ==
                                  $posko['id_peninjauan']
                              ) { ?>
                              <option value="<?= $peninjauan[
                                  'id_peninjauan'
                              ] ?>" selected><?= $bencanawil[
    'nama_bencana'
] ?>/ <?= $bencanawil['kecamatan'] ?>, <?= $bencanawil[
    'desa'
] ?> Jumlah Korban <?= $peninjauan['jumlah_korban'] ?></option>
                            <?php } else { ?>
                              <option value="<?= $peninjauan[
                                  'id_peninjauan'
                              ] ?>"><?= $bencanawil[
    'nama_bencana'
] ?>/ <?= $bencanawil['kecamatan'] ?>, <?= $bencanawil[
    'desa'
] ?> Jumlah Korban <?= $peninjauan['jumlah_korban'] ?></option>
                            <?php }
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="nama_posko">* Nama Posko</label>
                        <input type="text" class="form-control p-input" id="nama_posko" name="nama_posko" aria-describedby="nama_posko" value="<?= $posko[
                            'nama_posko'
                        ] ?>" placeholder="Isi nama posko" required>
                      </div>
                      <div class="form-group">
                        <label for="status_posko">* Status posko</label>
                        <select class=" form-control" id="status_posko" name="status_posko" required>
                          <?php
                          //Membuat array data status posko
                          $status_posko = [
                              'Keadaan Darurat Bencana',
                              'Siaga Darurat',
                              'Tanggap Darurat',
                              'Transisi Darurat ke Pemulihan',
                          ];
                          foreach ($status_posko as $status) {
                              if ($status == $posko['status_posko']) { ?>
                              <option value="<?= $status ?>" selected><?= $status ?></option>
                            <?php } else { ?>
                              <option value="<?= $status ?>"><?= $status ?></option>
                            <?php }
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="jumlah_jiwa">* Jumlah Jiwa</label>
                        <input type="number" class="form-control p-input" id="jumlah_jiwa" name="jumlah_jiwa" aria-describedby="jumlah_jiwa" min="0" value="<?= $posko[
                            'jumlah_jiwa'
                        ] ?>" placeholder="Jumlah jiwa" required>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="balita">Balita</label>
                            <input type="number" class="form-control p-input" id="balita" name="balita" aria-describedby="balita" min="0" value="<?= $posko[
                                'balita'
                            ] ?>" placeholder="Jumlah jiwa">
                          </div>
                          <div class="form-group">
                            <label for="remaja">Remaja</label>
                            <input type="number" class="form-control p-input" id="remaja" name="remaja" aria-describedby="remaja" min="0" value="<?= $posko[
                                'remaja'
                            ] ?>" placeholder="Jumlah jiwa">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="dewasa">Dewasa</label>
                            <input type="number" class="form-control p-input" id="dewasa" name="dewasa" aria-describedby="dewasa" min="0" value="<?= $posko[
                                'dewasa'
                            ] ?>" placeholder="Jumlah jiwa">
                          </div>
                          <div class="form-group">
                            <label for="lanjut_usia">Lanjut Usia</label>
                            <input type="number" class="form-control p-input" id="lanjut_usia" name="lanjut_usia" aria-describedby="lanjut_usia" min="0" value="<?= $posko[
                                'lanjut_usia'
                            ] ?>" placeholder="Jumlah jiwa">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="tanggal_posko">* Tanggal Posko</label>
                          <input type="date" class="form-control p-input" id="tanggal_posko" aria-describedby="tanggal_posko" name="tanggal_posko" value="<?= $posko[
                              'tanggal_posko'
                          ] ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="tanggal_selesai">Tanggal Selesai</label>
                          <input type="date" class="form-control p-input" id="tanggal_selesai" aria-describedby="tanggal_selesai" name="tanggal_selesai" value="<?= $posko[
                              'tanggal_selesai'
                          ] ?>">
                        </div>
                        <div class="form-group">
                          <label for="gambar_posko">* Bukti Peninjauan</label>
                          <input type="file" class="form-control" id="gambar_posko" name="gambar_posko" onchange="loadFilegambar_posko(event)" accept="image/png, image/gif, image/jpeg">
                          <br>
                          <div class="card" id="d_gambar_posko">
                            <img id="i_gambar_posko" src="<?= $url ?>/gambar/posko/<?= $posko['gambar_posko'] ?>">
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
                          <textarea class="form-control" id="keterangan" style="height:100px;" name="keterangan"><?= $posko[
                              'keterangan'
                          ] ?></textarea>
                        </div>
                        <div class="col-12">
                          <button type="submit" id="submit_posko" class="btn btn-success d-none"> <i class="ti-pencil-alt"></i> Update</button>
                          <span id="process_history" class="btn btn-success "><i class="ti-pencil-alt"></i> Update</span>
                        
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="card-footer">

                </div>
              </div>
            </div>

            <div class="col-lg-6">

            <div class="card">
              <div class="card-header">
                <h2>Update Posko</h2>
              </div>
              <div class="card-body">



            <!-- Percobaan Insert hitoris -->
              <span id="add_history" class="btn btn-sm btn-primary  ">+ Add</span>
              <div class="content_history table-responsive" id="content_history">
                <input type="hidden" name="" id="url_id" value="<?= $_GET['id'] ?>">
                <input type="hidden" name="" id="id_user" value="<?= $_SESSION['id_user'] ?>">
                <table class="" style="width:100%;">
                <tr>
                    <th>Parameter</th>
                    <th>Keterangan</th>
                    <th>Hapus</th>
                  </tr>
                  <tbody id="body_history">


                  <?php 
                  $historys = Querybanyak("SELECT * FROM history WHERE tabel ='posko' AND id_tabel = ".$_GET['id']." ORDER BY id_history DESC LIMIT 1  ");
                  foreach($historys as $history){

                    // Memecah string menjadi array
                    $exp_arr = explode(";", $history['keterangan']);

                      // Membuat penampungan array
                      $arr_key = [];
                      $arr_val = [];

                      // Loping data array yang di explode
                      for ($ie = 0; $ie < count($exp_arr); $ie++) {

                        //memecah explotan array key val menjadi array satu
                        $exp_ie = explode("=>", $exp_arr[$ie]);
                      ?>
                        <tr>
                          <td><input type="text" name="key_history[]" class="key_history" id="key_history" value="<?= $exp_ie[0] ?>"></td>
                          <td><input type="text" name="value_history[]" class="value_history" id="value_history" value="<?= $exp_ie[1] ?>"></td>
                          <td> <a id="trash" class="badge btn-danger"><i class="ti-trash"></i></a> </td>
                        </tr>

                      <?php
                        }         
                      }
                        ?>

                  </tbody>
                </table>

              </div>
            <script>

            $("#add_history").on('click', function(){
              var input = '<tr><td><input type="text" name="key_history[]" class="key_history" id="key_history" ></td><td><input type="text" name="value_history[]" class="value_history" id="value_history" ></td><td> <a id="trash" class="badge btn-danger"><i class="ti-trash"></i></a> </td>                 </tr>'
              $("#body_history").append(input);
            });

            // HAPUS Keterangan history
            $("#body_history").on("click", "#trash", function () {
              $(this).closest("tr").remove();
            });

            $("#process_history").on('click', function(){
              var id = document.getElementById("url_id").value;
              var id_user = document.getElementById("id_user").value;
              var key_history = document.getElementsByName("key_history[]");
              var value_history = document.getElementsByName("value_history[]");

              var arr_key = [];
              var arr_val = [];
              for (var i = 0; i < value_history.length; i++) {
                arr_key.push(key_history[i].value);
                arr_val.push(value_history[i].value);
              }

              $.ajax({
                type: "POST",
                url: "http://localhost/pengaduan-bpbd/?posko=ajax_post_posko",
                dataType: "json",
                data: {
                  id: id,
                  id_user: id_user,
                  arr_key: arr_key,
                  arr_val: arr_val
                },
                success: function (data) {
                  // location.replace("http://localhost/pengaduan-bpbd/?posko=detail&id="+id);
                  document.getElementById("submit_posko").click();
                },
                error() {
                  console.log("Error");
                },
              });
            });
            </script>
            <br>

            <div class="table-responsive">

              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $historys = Querybanyak("SELECT * FROM history WHERE tabel = 'posko' AND id_tabel = " .$_GET['id'] ."");
                  foreach ($historys as $history) { ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $history['created_at'] ?></td>
                      <td><?= $history['keterangan'] ?></td>
                      <td>
                        <a href="http://localhost/pengaduan-bpbd/?posko=detail_edit&id=<?= $history[
                            'id_history'
                        ] ?>">
                      Edit</a>
                      </td>
                    </tr>
                  <?php }
                  ?>
                </tbody>
              </table>

              </div>
 
              </div>

            </div>

          </div>
        </div>