        <?php 
          $cari_bantuan_berdasarkan_id_bantuan = "SELECT * FROM bantuan WHERE id_bantuan = " . $_GET['id'] . "";
          $satu_bantuan = Querysatudata($cari_bantuan_berdasarkan_id_bantuan);
        ?>
      
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

          <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-header">
                  <h2>Edit Data Bantuan</h2>
                </div>
                <div class="card-body">
                  <div class="row">
                    <form class="forms-sample" action="<?= $url ?>/?bantuan=update" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="nama_bantuan">Nama Bantuan</label>
                          <input type="hidden" class="form-control p-input" id="id_bantuan"  name="id_bantuan" value="<?= $satu_bantuan['id_bantuan'] ?>">
                          <input type="text" class="form-control p-input" id="nama_bantuan" aria-describedby="nama_bantuan" name="nama_bantuan" value="<?= $satu_bantuan['nama_bantuan'] ?>">
                      </div>
                      <div class="form-group">
                          <label for="satuan">Satuan</label>
                          <input type="text" class="form-control p-input" id="satuan" aria-describedby="satuan" name="satuan" value="<?= $satu_bantuan['satuan'] ?>" placeholder="Enter Nama Lengkap">
                        </div>
                      <div class="form-group">
                          <label for="kategori">kategori</label>
                          <input type="text" class="form-control p-input" id="kategori" aria-describedby="kategori" name="kategori" value="<?= $satu_bantuan['kategori'] ?>" placeholder="Enter Nama Lengkap">
                        </div>
                      <div class="form-group">
                          <label for="stok">stok</label>
                          <input type="text" class="form-control p-input" id="stok" aria-describedby="stok" name="stok" value="<?= $satu_bantuan['stok'] ?>" placeholder="Enter Nama Lengkap">
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
