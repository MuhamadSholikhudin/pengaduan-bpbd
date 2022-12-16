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
                    <form class="forms-sample" action="<?= $url ?>/?pelaporan=post" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="nama_pelapor">Nama pelapor</label>
                          <input type="text" class="form-control p-input" id="id_user" name="id_user" value="1">
                      </div>
                      <div class="form-group">
                          <label for="tanggal_pelaporan">Tanggal pelaporan</label>
                          <input type="date" class="form-control " id="tanggal_pelaporan"  name="tanggal_pelaporan" >
                      </div> 
                      <div class="form-group">
                          <label for="pelaporan">Keterangan pelaporan</label>
                          <textarea class="form-control" id="pelaporan" name="pelaporan" style="height: 100px;"></textarea>
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
