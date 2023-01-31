<section id="breadcrumbs" class="breadcrumbs bg-danger">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center ">
          <h2><?php
                $page_beadcrambs =  "Home";
                if(isset($_GET[array_keys($_GET)[0]]) ){
                    $page_beadcrambs = $_GET[array_keys($_GET)[0]];
                    if($page_beadcrambs == "blog_post"){
                      $page_beadcrambs = "blog";
                    }
                }
                echo $page_beadcrambs; 
             ?></h2>
          <ol>
            <li>Page</li>
            <li>
            <a href="http://localhost/pengaduan-bpbd/?pages=<?= $page_beadcrambs ?>">
              <?php
                echo $page_beadcrambs;
             ?></a>
             </li>
          </ol>
        </div>

      </div>
    </section>