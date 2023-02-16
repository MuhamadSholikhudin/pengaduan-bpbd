      <?php

      //definisikan parameter get['id']
      $id = $_GET['id'];

      //Menampilkan data history berdasarkan id
      $history = Querysatudata("SELECT * FROM history WHERE id_history = " . $id . " ");

      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-header">
                  <h2><?= strtoupper("Edit data detail " . array_keys($_GET)[0]) ?></h2>
                </div>
                <div class="card-body">
                  <div class="row">
                    <form class="forms-sample" action="<?= $url ?>/?posko=update" method="POST" enctype="multipart/form-data">
                      <!-- Hidden id_posko -->
                      <input type="hidden" name="id_history" id="id_history" value="<?= $id ?>">
                      <div class="form-group">
                        <span id="add_history" class="btn btn-primary badge">Add</span>
                        <script>
                          $("#add_history").on('click', function() {
                            var input = '<tr><td><input type="text" name="key_history[]" class="key_history" id="key_history" ></td><td><input type="text" name="value_history[]" class="value_history" id="value_history" ></td><td> <a class="badge btn-danger"><i class="ti-trash"></i></a> </td></tr>'
                            $("#body_history").append(input);
                          });
                        </script>
                        <br>
                        <input type="text" name="" id="url_id" value="<?= $_GET['id'] ?>">
                        <input type="text" name="" id="id_user" value="<?= $_SESSION['id_user'] ?>">
                        <table>
                          <thead>
                            <th>Parameter</th>
                            <th>Nilai</th>
                            <th>Hapus</th>
                          </thead>
                          <tbody id="body_history">

                            <?php
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
                                <td> <a class="badge btn-danger"><i class="ti-trash"></i></a> </td>
                              </tr>

                            <?php
                            }
                            ?>
                          </tbody>
                        </table>

                      </div>

                      <div class="form-group">
                        <label for="tanggal_history">* Tanggal History</label>
                        <input type="date" class="form-control p-input" id="tanggal_history" name="tanggal_history" value="<?= $history['tanggal_history'] ?>" required>
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
      </div>