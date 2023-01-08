     <!-- partial -->
     <div class="main-panel">
       <div class="content-wrapper">
         <div class="row">
           <div class="col-lg-12 grid-margin stretch-card">
             <div class="card">
               <div class="card-body">
                 <div class="row">

                   <div class="col-lg-12 text-center">
                     <h2>Data Stok Bantuan Keluar </h2>
                   </div>
                 </div>
                 <div class="table-responsive">
                   <table class="table table-striped" >
                     <thead>
                       <tr>
                         <th>Nama Bantuan</th>
                         <th>Batch</th>
                         <th>Tanggal Masuk</th>
                         <th>Tanggal Kadaluarsa</th>
                         <th>Stok Keluar</th>
                         <th>Stok Tersedia</th>
                         <!-- <th>Action</th> -->
                       </tr>
                     </thead>
                     <tbody>
                       <?php
                        $stok_bantuans = Querybanyak("SELECT * FROM bantuan_distribusi  LEFT JOIN stok_bantuan ON stok_bantuan.id_stok_bantuan = bantuan_distribusi.id_stok_bantuan ");
                        foreach ($stok_bantuans as $stok_bantuan) {
                          $bantuan = Querysatudata("SELECT * FROM bantuan WHERE id_bantuan = ".$stok_bantuan['id_bantuan']."");
                          ?>
                         <tr>
                           <td>
                           <?= $bantuan['nama_bantuan'] ?>
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
                             <?= $stok_bantuan['jumlah'] ?>
                           </td>
                           <td>
                             <?= $stok_bantuan['stok_tersedia'] ?>
                           </td>
                           <td>
                             <!-- <a href="<?= $url ?>/?stok_bantuan=edit" class="btn btn-sm btn-sm btn-outline-secondary btn-icon-text">
                              <i class="ti-pencil-alt btn-icon-append"></i>
                               Edit
                             </a> -->
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