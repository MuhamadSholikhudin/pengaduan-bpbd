      <?php 
        $id = $_GET['id'];
        $cari_pelaporan_berdasarkan_id_pelaporan = "SELECT * FROM pelaporan WHERE id_pelaporan = " . $_GET['id'] . "";
        $satu_pelaporan = Querysatudata($cari_pelaporan_berdasarkan_id_pelaporan);
      ?>  
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
                    <form class="forms-sample" action="<?= $url ?>/?pelaporan=update" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="nama_pelapor">Nama pelapor</label>
                          <input type="hidden" class="form-control p-input" id="id_pelaporan" name="id_pelaporan" value="<?= $satu_pelaporan['id_pelaporan'] ?>">
                          <input type="text" class="form-control p-input" id="id_user" name="id_user" value="<?= $satu_pelaporan['id_user'] ?>">
                      </div>
                      <div class="form-group">
                          <label for="tanggal_pelaporan">Tanggal pelaporan</label>
                          <input type="text" class="form-control p-input" id="tanggal_pelaporan" name="tanggal_pelaporan" value="<?= $satu_pelaporan['tanggal_pelaporan'] ?>">
                      </div> 
                      <div class="form-group">
                          <label for="pelaporan">Keterangan pelaporan</label>
                          <textarea class="form-control" id="pelaporan" name="pelaporan" ><?= $satu_pelaporan['pelaporan'] ?></textarea>
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
