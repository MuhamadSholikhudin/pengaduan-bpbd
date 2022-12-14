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
                    <form class="forms-sample" action="<?= $url ?>/?pelaporan=pelaporan_post" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="nama_pelapor">Nama pelapor</label>
                          <input type="text" class="form-control p-input" id="nama_pelapor" name="nama_pelapor" aria-describedby="nama_pelapor"  placeholder="Enter Nama Lengkap">
                      </div>
                      <div class="form-group">
                          <label for="tanggal_pelaporan">Tanggal pelaporan</label>
                          <input type="text" class="form-control p-input" id="tanggal_pelaporan" aria-describedby="tanggal_pelaporan" name="name_user" placeholder="Enter Nama Lengkap">
                      </div> 
                      <div class="form-group">
                          <label for="pelaporan">Keterangan pelaporan</label>
                          <textarea class="form-control" id="pelaporan" name="pelaporan" ></textarea>
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
