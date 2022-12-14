      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

          <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-header">
                  <h2><?= strtoupper("Edit data ". array_keys($_GET)[0]) ?></h2>
                </div>
                <div class="card-body">
                  <div class="row">
                    <form class="forms-sample" action="<?= $url ?>/?bencana=bencana_post" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="nama_bencana">Nama Bencana</label>
                          <input type="text" class="form-control p-input" id="nama_bencana" aria-describedby="nama_bencana" name="name_user" placeholder="Enter Nama Lengkap">
                      </div>
                      <div class="form-group">
                        <?php 
                          $kategori_bencanas = ['Tanah Longsor', 'Banjir'];
                        ?>
                        <label for="kategori_bencana">Kategori</label>
                        <select class="form-control " name="kategori_bencana" id="kategori_bencana">
                          <?php foreach($kategori_bencanas as $kategori_bencana){?>
                            <option value="<?= $kategori_bencana ?>"><?= $kategori_bencana ?></option>
                          <?php } ?> 
                        </select>
                      </div>
                      <div class="form-group">
                        <?php 
                          $levels = [1, 2];
                        ?>
                        <label for="level">Level</label>
                        <select class="form-control " name="level" id="level">
                          <?php foreach($levels as $level){?>
                            <option value="<?= $level ?>"><?= $level ?></option>
                          <?php } ?> 
                        </select>
                      </div>

                      <div class="form-group">
                        <?php 
                          $wilayahs = ["Kota", "Winong"];
                        ?>
                        <label for="wilayah">wilayah</label>
                        <select class="form-control " name="wilayah" id="wilayah">
                          <?php foreach($wilayahs as $wilayah){?>
                            <option value="<?= $wilayah ?>"><?= $wilayah ?></option>
                          <?php } ?> 
                        </select>
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
