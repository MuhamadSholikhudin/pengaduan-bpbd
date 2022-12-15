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
                    <form class="forms-sample" action="<?= $url ?>/?stok_bantuan=stok_bantuan_post" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <?php 
                          $id_bantuans = ['Sarimi', 'Indomie'];
                        ?>
                        <label for="id_bantuan">ID Bantuan</label>
                        <select class="form-control " name="id_bantuan" id="id_bantuan">
                          <?php foreach($id_bantuans as $id_bantuan){?>
                            <option value="<?= $id_bantuan ?>"><?= $id_bantuan ?></option>
                          <?php } ?> 
                        </select>
                      </div>
                      <div class="form-group">
                          <label for="batch">Batch</label>
                          <input type="text" class="form-control p-input" id="batch" name="batch" aria-describedby="batch"  placeholder="Enter Nama Lengkap">
                      </div>
                      <div class="form-group">
                          <label for="tanggal_masuk">Tanggal masuk</label>
                          <input type="text" class="form-control p-input" id="tanggal_masuk" aria-describedby="tanggal_masuk" name="tanggal_masuk" placeholder="Enter Nama Lengkap">
                      </div> 
                      <div class="form-group">
                          <label for="tanggal_kadaluarsa">Keterangan stok_bantuan</label>
                          <input type="date" class="form-control" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" >
                      </div>     
                      <div class="form-group">
                          <label for="stok">Stok</label>
                          <input type="number" class="form-control" id="stok" name="stok" >
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
