      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-header">
                  <h2><?= strtoupper("Tambah data ". array_keys($_GET)[0]) ?></h2>
                </div>
                <div class="card-body">
                  <div class="row">
                    <form class="forms-sample" action="<?= $url ?>/?wilayah=wilayah_post" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="nama_wilayah">Nama wilayah</label>
                          <input type="text" class="form-control p-input" id="nama_wilayah" aria-describedby="nama_wilayah" name="name_user" placeholder="Enter Nama Lengkap">
                      </div>
                      <div class="form-group">
                        <?php 
                          $status_wilayahs = ['Tanah Longsor', 'Banjir'];
                        ?>
                        <label for="status_wilayah">status</label>
                        <select class="form-control " name="status_wilayah" id="status_wilayah">
                          <?php foreach($status_wilayahs as $status_wilayah){?>
                            <option value="<?= $status_wilayah ?>"><?= $status_wilayah ?></option>
                          <?php } ?> 
                        </select>
                      </div>
                      <div class="form-group">
                          <label for="ket_wilayah">Keterangan wilayah</label>
                          <input type="text" class="form-control p-input" id="ket_wilayah" aria-describedby="ket_wilayah" name="name_user" placeholder="Enter Nama Lengkap">
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
