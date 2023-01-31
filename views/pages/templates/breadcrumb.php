<section id="breadcrumbs" class="breadcrumbs bg-danger">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center ">
          <h2><?php
                if(isset($_GET[array_keys($_GET)[0]]) ){
                    echo $_GET[array_keys($_GET)[0]];
                }else{
                    echo "Home";
                }
             ?></h2>
          <ol>
            <li>Page</li>
            <li>
            <a href="http://localhost/pengaduan-bpbd/?pages=<?= $_GET[array_keys($_GET)[0]] ?>">
              <?php
                if(isset($_GET[array_keys($_GET)[0]])){
                    echo $_GET[array_keys($_GET)[0]];
                }else{
                    echo "Home";
                }
             ?></a>
             </li>
          </ol>
        </div>

      </div>
    </section>