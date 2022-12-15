      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-header">
                  <h2>Tambah Data Bantuan</h2>
                </div>
                <div class="card-body">
                  <div class="row">
                    <form class="forms-sample" action="<?= $url ?>/?bantuan=post" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="nama_bantuan">Nama Bantuan</label>
                          <input type="text" class="form-control p-input" id="nama_bantuan"  name="nama_bantuan" placeholder="Nama Bantuan">
                      </div>
                      <div class="form-group">
                        <?php 
                          $kategoris = ['cash', 'atm'];
                        ?>
                        <label for="kategori">Kategori</label>
                        <select class="form-control " name="kategori" id="kategori">
                          <?php foreach($kategoris as $kategori){?>
                            <option value="<?= $kategori ?>"><?= $kategori ?></option>
                          <?php } ?> 
                        </select>
                      </div>
                      <div class="form-group">
                          <label for="satuan">Satuan</label>
                          <input type="text" class="form-control p-input" id="satuan" aria-describedby="satuan" name="satuan" placeholder="Satuan">

                        </div>
                      <div class="form-group">
                          <label for="batch">Batch</label>
                          <input type="text" class="form-control p-input" id="batch" aria-describedby="batch" name="batch" placeholder="Batch">
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
