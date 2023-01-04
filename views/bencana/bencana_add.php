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
                    <form class="forms-sample" action="<?= $url ?>/?bencana=post" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="nama_bencana">Nama Bencana</label>
                          <input type="text" class="form-control p-input" id="nama_bencana"  name="nama_bencana" placeholder="nama_bencana">
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
