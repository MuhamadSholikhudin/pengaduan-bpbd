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
                    <form class="forms-sample" action="<?= $url ?>/?wilayah=post" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="kecamatan">Kecamatan</label>
                          <input type="text" class="form-control p-input" id="kecamatan"  name="kecamatan" placeholder="Kecamatan" required>
                      </div>
                      <div class="form-group">
                          <label for="desa">Desa</label>
                          <input type="text" class="form-control p-input" id="desa"  name="desa" placeholder="desa" required>
                      </div>
                      <div class="form-group">
                          <label for="no_telp">Nomer Telepon</label>
                          <input type="text" class="form-control p-input" id="no_telp"  name="no_telp" placeholder="no_telp" required>
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
