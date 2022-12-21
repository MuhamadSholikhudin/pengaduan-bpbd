      <!-- partial:<?= $url ?>/assets/partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= $url ?>/assets/index.html">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">MENUS</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-menu" aria-expanded="false" aria-controls="ui-menu">
              <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title">Menu</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-menu">
              <ul class="nav flex-column sub-menu">
                <?php if(isset($_SESSION['level'])){
                  switch ($_SESSION['level']){
                    case 'kepala_bpbd':
                    ?>
                    
                    <?php
                    break;
                    case 'petugas_bpbd':
                    ?>
                        <li class="nav-item"><a class="nav-link" href="<?= $url ?>/?pelaporan=pelaporan">Pelapor</a></li>            
                    <?php
                    break;
                    case 'petugas_logistik':
                    ?>
                    
                    <?php
                    break;
                    case 'petugas_kajian':
                    ?>
                      <li class="nav-item"><a class="nav-link" href="<?= $url ?>/?pelaporan=pelaporan">Pelapor</a></li>            
                      <li class="nav-item"> <a class="nav-link" href="<?= $url ?>/?peninjauan=peninjauan">Peninjauan</a></li>
                      <li class="nav-item"> <a class="nav-link" href="<?= $url ?>/?distribusi=distribusi">Distribusi</a></li>
                    
                    <?php
                    break;

                    case 'masyarakat':
                      ?>
                        <li class="nav-item"><a class="nav-link" href="<?= $url ?>/?pelaporan_masyarakat=pelaporan">Pelapor</a></li>            
                    <?php
                        break;

                  }

                }?>

              
                <!-- 
                <li class="nav-item"> <a class="nav-link" href="<?= $url ?>/?user=user">Users</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= $url ?>/?bantuan=bantuan">Bantuan</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= $url ?>/?bencana=bencana">Bencana</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= $url ?>/?wilayah=wilayah">Wilayah</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= $url ?>/?peninjauan=peninjauan">Peninjauan</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= $url ?>/?distribusi=distribusi">Distribusi</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= $url ?>/?pelaporan=pelaporan">Pelapor</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= $url ?>/?stok_bantuan=stok_bantuan">Stok Bantuan</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= $url ?>/?publikasi_berita=publikasi_berita">Publikasi Berita</a></li> 
                -->
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">LAPORAN</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-laporan" aria-expanded="false" aria-controls="ui-laporan">
              <i class="menu-icon mdi mdi-file-document"></i>
              <span class="menu-title">LAPORAN</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-laporan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= $url ?>/?laporan=pendistribusian">Laporan Pendistribusian</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= $url ?>/?laporan=persediaan">Laporan Persediaan</a></li>
              </ul>
            </div>
         
        </ul>
      </nav>
      <!-- partial -->