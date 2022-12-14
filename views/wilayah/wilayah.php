      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <a href="<?= $url ?>?wilayah=add" class="btn btn-sm btn-outline-secondary">
                          <i class="mdi mdi-library-plus"></i>
                          Tambah
                        </a>
                    </div>
                    <div class="col-lg-12 text-center">
                      <h2><?= strtoupper("Data ". array_keys($_GET)[0]) ?></h2>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Nama wilayah
                          </th>
                          <th>
                            Status wilayah
                          </th>
                          <th>
                            Ket Bencana
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>

                          <td>
                            Herman Beck
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 77.99
                          </td>
                          <td>
                            <a href="<?= $url ?>/?wilayah=edit" class="btn btn-sm btn-sm btn-outline-secondary btn-icon-text">
                              Edit
                              <i class="ti-file btn-icon-append"></i>                          
                            </a>                          
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Messsy Adam
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $245.30
                          </td>
                          <td>
                            <a href="<?= $url ?>/?wilayah=edit" class="btn btn-sm btn-outline-secondary btn-icon-text">
                              Edit
                              <i class="ti-file btn-icon-append"></i>                          
                            </a>                          
                          </td>
                        </tr>
                        <tr>
 
                          <td>
                            John Richards
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $138.00
                          </td>
                          <td>
                            <a href="<?= $url ?>/?wilayah=edit" class="btn btn-sm btn-outline-secondary btn-icon-text">
                              Edit
                              <i class="ti-file btn-icon-append"></i>                          
                            </a>                          
                          </td>
                        </tr>
                       
                        
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer">

                </div>
              </div>
            </div>

          </div>
        </div>
