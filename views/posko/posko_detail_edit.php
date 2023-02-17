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

            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-header">
                  <h2><?= strtoupper("Edit data detail " . array_keys($_GET)[0]) ?></h2>
                </div>
                <div class="card-body">
                  <div class="row">
                    <form class="forms-sample" action="<?= $url ?>/?posko=update" method="POST" enctype="multipart/form-data">
                      <!-- Hidden id_posko -->
                      <input type="hidden" name="id_history" id="id_history" value="<?= $id ?>">
                      <div class="form-group border border-radius p-2">
                        <h2>Keterangan</h2>
                        <span id="add_history" class="btn btn-primary badge">Add</span>
                        <script>
                          $("#add_history").on('click', function() {
                            var input = '<tr><td><input type="text" name="key_history[]" class="key_history" id="key_history" ></td><td><input type="text" name="value_history[]" class="value_history" id="value_history" ></td><td> <a id="trash" class="badge btn-danger"><i class="ti-trash"></i></a> </td></tr>'
                            $("#body_history").append(input);
                          });
                        </script>
                        <br>
                        <input type="hidden" name="" id="url_id" value="<?= $_GET['id'] ?>">
                        <input type="hidden" name="" id="id_user" value="<?= $_SESSION['id_user'] ?>">
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
                                <td> <a id="trash" class="badge btn-danger"><i class="ti-trash"></i></a> </td>
                              </tr>

                            <?php
                            }
                            ?>
                          </tbody>
                        </table>

                        <script>
                          // HAPUS Keterangan history
                          $("#body_history").on("click", "#trash", function () {
                            $(this).closest("tr").remove();
                          });
                        </script>
                      </div>

                      <div class="form-group">
                        <label for="action">* Aksi</label>
                        <input type="text" class="form-control p-input" id="action" name="action" value="<?= $history['action'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="status_history">* Status History</label>
                        <input type="text" class="form-control p-input" id="status_history" name="status_history" value="<?= $history['status_history'] ?>" required>
                      </div>
  
                      <div class="form-group">
                        <label for="tanggal_history">* Tanggal History</label>
                        <input type="date" class="form-control p-input" id="tanggal_history" name="tanggal_history" value="<?= $history['tanggal_history'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="created_at">* Waktu di buat </label>
                        <input type="datetime-local" class="form-control p-input" id="created_at" name="created_at" value="<?= $history['created_at'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="updated_at">* Waktu di Update </label>
                        <input type="datetime-local" class="form-control p-input" id="updated_at" name="updated_at" value="<?= date("Y-m-d H:i:s") ?>" required>
                      </div>

                      <div class="col-12">
                      <span id="process_history" class="btn btn-success "><i class="ti-pencil-alt"></i> Update</span>
                      <script>
                          $("#process_history").on('click', function(){
                            var id = document.getElementById("url_id").value;
                            var id_user = document.getElementById("id_user").value;
                            var key_history = document.getElementsByName("key_history[]");
                            var value_history = document.getElementsByName("value_history[]");
                            var action = document.getElementById("action").value;
                            var tanggal_history = document.getElementById("tanggal_history").value;
                            var updated_at = document.getElementById("updated_at").value;
                            var status_history = document.getElementById("status_history").value;

                            var arr_key = [];
                            var arr_val = [];
                            for (var i = 0; i < value_history.length; i++) {
                              arr_key.push(key_history[i].value);
                              arr_val.push(value_history[i].value);
                            }

                            $.ajax({
                              type: "POST",
                              url: "http://localhost/pengaduan-bpbd/?posko=ajax_update_history_posko",
                              dataType: "json",
                              data: {
                                id: id,
                                id_user: id_user,
                                arr_key: arr_key,
                                arr_val: arr_val,
                                action : action,
                                tanggal_history : tanggal_history,
                                updated_at : updated_at,
                                status_history : status_history

                              },
                              success: function (data) {
                                alert("Data berhasil di update");
                                location.replace("http://localhost/pengaduan-bpbd/?posko=detail_edit&id="+id);
                              },
                              error() {
                                console.log("Error");
                              },
                            });
                          });
                      </script>

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