     <!-- partial -->
     <div class="main-panel">
       <div class="content-wrapper">
         <div class="row">
           <div class="col-lg-12 grid-margin stretch-card">
             <div class="card">
               <div class="card-body">
                 <div class="row">
                   <div class="col-lg-12">
                     <a href="<?= $url ?>?stok_bantuan=add" class="btn btn-sm btn-outline-secondary">
                          <i class="mdi mdi-library-plus"></i>
                          Tambah
                        </a>
                     <!-- <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#modalSaya">
                       <i class="mdi mdi-library-plus"></i>
                       Tambah
                     </button> -->
                     <!-- Modal Stok Dana -->
                     <div class="modal fade" id="modalSaya" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title" id="modalSayaLabel">Form Tambah Data Bantuan </h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <div class="modal-body">
                             <form class="forms-sample" action="<?= $url ?>/?stok_bantuan=post" method="POST" enctype="multipart/form-data">
                               <div class="form-group">
                                 <label for="pelaporan">* Nama Bantuan</label>
                                 <select class="form-control" name="id_bantuan">
                                   <?php
                                    $bantuans = Querybanyak("SELECT * FROM bantuan");
                                    foreach ($bantuans as $bantuan) { ?>
                                     <option value="<?= $bantuan['id_bantuan'] ?>"> <?= $bantuan['nama_bantuan'] ?></option>
                                   <?php
                                    }
                                    ?>
                                 </select>
                               </div>
                               <div class="form-group">
                                 <label for="tanggal_masuk">* Tanggal Masuk</label>
                                 <input type="date" class="form-control p-input" id="tanggal_masuk" name="tanggal_masuk" value="<?= date('Y-m-d') ?>" required>
                               </div>
                               <div class="form-group">
                                 <label for="tanggal_kadaluarsa">* Tanggal Kadaluarsa</label>
                                 <input type="date" class="form-control p-input" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" value="<?= date('Y-m-d') ?>" required>
                               </div>
                               <div class="form-group">
                                 <label for="stok_masuk">* Stok Masuk</label>
                                 <input type="number" class="form-control" id="stok_masuk" name="stok_masuk" min="1" value="1">
                               </div>
                               <div class="form-group">
                                 <label for="batch">* Batch</label>
                                 <input type="text" class="form-control" id="batch" name="batch" value="<?= date("Y-m-d") ?>">
                               </div>
                               <div class="form-group">
                                 <label for="satuan">* Satuan</label>
                                 <input type="text" class="form-control" id="satuan" name="satuan">
                               </div>

                               <div class="col-12">
                                 <button type="submit" class="btn btn-primary">SIMPAN</button>
                               </div>
                             </form>
                           </div>
                           <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                             <!-- <button type="button" class="btn btn-primary">Oke</button> -->
                           </div>
                         </div>
                       </div>
                     </div>

                   </div>
                   <div class="col-lg-12 text-center">
                     <h2>Data Stok Masuk Bantuan </h2>
                   </div>
                 </div>
                 <div class="table-responsive">
                   <table id="myTable" class="table table-striped" >
                     <thead>
                       <tr>
                         <th>Nama Bantuan</th>
                         <th>Batch</th>
                         <th>Tanggal Masuk</th>
                         <th>Tanggal Kadaluarsa</th>
                         <th>Stok Masuk</th>
                         <th>Stok Tersedia</th>
                         <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php
                        $stok_bantuans = Querybanyak("SELECT * FROM stok_bantuan LEFT JOIN bantuan ON stok_bantuan.id_bantuan = bantuan.id_bantuan ");
                        foreach ($stok_bantuans as $stok_bantuan) { ?>
                         <tr>
                           <td>
                             <?= $stok_bantuan['nama_bantuan'] ?>
                           </td>
                           <td>
                             <?= $stok_bantuan['batch'] ?>
                           </td>
                           <td>
                             <?= $stok_bantuan['tanggal_masuk'] ?>
                           </td>
                           <td>
                             <?= $stok_bantuan['tanggal_kadaluarsa'] ?>
                           </td>
                           <td>
                             <?= $stok_bantuan['stok_masuk'] ?>
                           </td>
                           <td>
                             <?= $stok_bantuan['stok_tersedia'] ?>
                           </td>
                           <td>
                             <a href="<?= $url ?>/?stok_bantuan=edit&id=<?= $stok_bantuan['id_stok_bantuan'] ?>" class="btn btn-sm btn-sm btn-outline-secondary btn-icon-text">
                              <i class="ti-pencil-alt btn-icon-append"></i>
                               Edit
                             </a>
                           </td>
                         </tr>
                       <?php }
                        ?>

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