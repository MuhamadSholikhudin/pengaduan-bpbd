      
        <?php 
          $cari_bencana_berdasarkan_id_bencana = "SELECT * FROM bencana WHERE id_bencana = " . $_GET['id'] . "";
          $satu_bencana = Querysatudata($cari_bencana_berdasarkan_id_bencana);
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
                    <form class="forms-sample" action="<?= $url ?>/?bencana=update" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="nama_bencana">Nama Bencana</label>
                          <input type="hidden" class="form-control p-input" id="id_bencana" name="id_bencana" value="<?= $satu_bencana['id_bencana'] ?>" placeholder="nama_bencana">
                          <input type="text" class="form-control p-input" id="nama_bencana" name="nama_bencana" value="<?= $satu_bencana['nama_bencana'] ?>" placeholder="nama_bencana">
                      </div>                    
                      <div class="col-12">
                        <button type="submit" class="btn btn-success"> <i class="ti-pencil-alt"></i> Update</button>
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
