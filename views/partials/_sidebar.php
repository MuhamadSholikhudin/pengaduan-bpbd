      <!-- partial:<?= $url ?>/assets/partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item <?= isset($_GET['dashboard']) ? "active": "" ?>">
            <a class="nav-link" href="<?= $url ?>/?dashboard=dashboard">
              <i class="mdi mdi-grid-large menu-icon md-5x"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">MENUS</li>
          <?php 
            function sidemenu($menu){
              if(isset($_GET['laporan']) || isset($_GET['dashboard'])){
                return "";
              }
              if(!isset($_GET[$menu])){
                return "";
              }
              return "active";
            }
          ?>
          <li class="nav-item <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? "active": "" ?>">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-menu" aria-expanded="<?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? "true": "false" ?>" aria-controls="ui-menu">
              <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title">Menu</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? "show": "" ?>" id="ui-menu">
              <ul class="nav flex-column sub-menu">
                <?php if(isset($_SESSION['level'])){
                  switch ($_SESSION['level']){
                    case 'kepala_bpbd':
                    ?>              
                      <li class="nav-item <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? sidemenu("distribusi"): "" ?>"> <a class="nav-link" href="<?= $url ?>/?distribusi=distribusi">Distribusi</a></li>
                      <li class="nav-item <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? sidemenu("history"): "" ?>"> <a class="nav-link" href="<?= $url ?>/?history=history">historys</a></li>
                    
                    <?php
                    break;
                    case 'petugas_bpbd':
                    ?>
                      <li class="nav-item  <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? sidemenu("pelaporan"): "" ?>"><a class="nav-link" href="<?= $url ?>/?pelaporan=pelaporan">Pelapor</a></li>            
                      <li class="nav-item <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? sidemenu("peninjauan"): "" ?>"> <a class="nav-link" href="<?= $url ?>/?peninjauan=peninjauan">Peninjauan</a></li>
                      <li class="nav-item <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? sidemenu("posko"): "" ?>"> <a class="nav-link" href="<?= $url ?>/?posko=posko">Posko</a></li>
                      <li class="nav-item <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? sidemenu("distribusi"): "" ?>"> <a class="nav-link" href="<?= $url ?>/?distribusi=distribusi">Distribusi</a></li>
                      <li class="nav-item <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? sidemenu("publikasi"): "" ?>"> <a class="nav-link" href="<?= $url ?>/?publikasi=publikasi">Publikasi</a></li>
                      <li class="nav-item <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? sidemenu("bencana"): "" ?>"> <a class="nav-link" href="<?= $url ?>/?bencana=bencana">Bencana</a></li>
                      <li class="nav-item <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? sidemenu("wilayah"): "" ?>"> <a class="nav-link" href="<?= $url ?>/?wilayah=wilayah">Wilayah</a></li>
                      <li class="nav-item <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? sidemenu("user"): "" ?>"> <a class="nav-link" href="<?= $url ?>/?user=user">Users</a></li>
                      <li class="nav-item <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? sidemenu("history"): "" ?>"> <a class="nav-link" href="<?= $url ?>/?history=history">historys</a></li>
                    
                    <?php
                    break;
                    case 'petugas_logistik':
                    ?>
                      <li class="nav-item <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? sidemenu("peninjauan"): "" ?>"> <a class="nav-link" href="<?= $url ?>/?peninjauan=peninjauan">Peninjauan</a></li>
                      <li class="nav-item <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? sidemenu("distribusi"): "" ?>"> <a class="nav-link" href="<?= $url ?>/?distribusi=distribusi">Distribusi</a></li>
                      <li class="nav-item <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? sidemenu("bantuan"): "" ?>"> <a class="nav-link" href="<?= $url ?>/?bantuan=bantuan">Bantuan</a></li>
                      <li class="nav-item <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? sidemenu("stok_bantuan"): "" ?>"> <a class="nav-link" href="<?= $url ?>/?stok_bantuan=stok_bantuan">Stok Masuk Bantuan</a></li>
                      <li class="nav-item <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? sidemenu("stok_bantuan_keluar"): "" ?>"> <a class="nav-link" href="<?= $url ?>/?stok_bantuan_keluar=stok_bantuan_keluar">Stok Keluar Bantuan</a></li>
                      <li class="nav-item <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? sidemenu("history"): "" ?>"> <a class="nav-link" href="<?= $url ?>/?history=history">historys</a></li>
                    
                    <?php
                    break;
                    case 'petugas_kajian':
                    ?>
                      <li class="nav-item <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? sidemenu("pelaporan"): "" ?>"><a class="nav-link" href="<?= $url ?>/?pelaporan=pelaporan">Pelapor</a></li>            
                      <li class="nav-item <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? sidemenu("peninjauan"): "" ?>"> <a class="nav-link" href="<?= $url ?>/?peninjauan=peninjauan">Peninjauan</a></li>
                      <li class="nav-item <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? sidemenu("posko"): "" ?>"> <a class="nav-link" href="<?= $url ?>/?posko=posko">Posko</a></li>
                      <li class="nav-item <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? sidemenu("distribusi"): "" ?>"> <a class="nav-link" href="<?= $url ?>/?distribusi=distribusi">Distribusi</a></li>
                    <?php
                    break;
                    case 'pelapor':
                      ?>
                        <li class="nav-item <?= !isset($_GET['laporan']) && !isset($_GET['dashboard']) ? sidemenu("pelaporan_masyarakat"): "" ?>"><a class="nav-link" href="<?= $url ?>/?pelaporan_masyarakat=pelaporan">Pelapor</a></li>            
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
          <?php
            function sidelaporan($side){
              if($_GET['laporan'] == $side){
                return "active";
              }
              return "";
            }
          ?>
          <li class="nav-item nav-category">LAPORAN</li>
          <li class="nav-item <?= isset($_GET['laporan']) ? "active": "" ?> ">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-laporan" aria-expanded="<?= isset($_GET['laporan']) ? "true": "false" ?>" aria-controls="ui-laporan">
              <i class="menu-icon mdi mdi-file-document"></i>
              <span class="menu-title">LAPORAN</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse <?= isset($_GET['laporan']) ? "show": "" ?>" id="ui-laporan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item <?= isset($_GET['laporan']) ? sidelaporan("pelaporan")  : "" ?> "> <a class="nav-link " href="<?= $url ?>/?laporan=pelaporan">Pelaporan</a></li>
                <li class="nav-item <?= isset($_GET['laporan']) ? sidelaporan("peninjauan")  : "" ?> "> <a class="nav-link " href="<?= $url ?>/?laporan=peninjauan">Peninjauan</a></li>
                <li class="nav-item <?= isset($_GET['laporan']) ? sidelaporan("distribusi")  : "" ?> "> <a class="nav-link" href="<?= $url ?>/?laporan=distribusi">Pendistribusian </a></li>
                <li class="nav-item <?= isset($_GET['laporan']) ? sidelaporan("stok_bantuan")  : "" ?>"> <a class="nav-link" href="<?= $url ?>/?laporan=stok_bantuan">Persediaan </a></li>
              </ul>
            </div>
        </ul>
      </nav>
      <!-- partial -->