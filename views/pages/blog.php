    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

          <?php
            
          //Tampilkan data publlikasi terbaru sejumlah 3
            $sql_publikasi = "SELECT * FROM publikasi";
            if(isset($_GET['search'])){
               $sql_publikasi = "SELECT * FROM publikasi WHERE judul LIKE '%".$_GET["search"]."%' OR kutipan LIKE '%".$_GET["search"]."%' OR  isi LIKE '%".$_GET["search"]."%' ";
            }

            $count_result = NumRows($sql_publikasi);
            $perpage = 3;
            
            $page = 1;
            $offset = 0;
            $prev_page = 1;
            $last_page = 1;
            $next_page = 1;
            
            $countpage = ceil($count_result / $perpage);
            
            if(isset($_GET['page'])){
                $page = $_GET['page'];
                 if($page >= $countpage AND $page != 1){
                    $prev_page = $countpage - 1;
                    $next_page = $countpage;
                }elseif($page > 1 AND $page < $countpage){
                    $prev_page = $page - 1;
                    $next_page = $page + 1;
                }elseif($page == 1 AND $countpage > 1){
                    $prev_page = 1;
                    $next_page = $page + 1;
                }
                $offset = (($page - 1)  * $perpage) ;
            }else{
                if($countpage > 1){
                    $prev_page = $countpage;
                    $next_page = 2;
                }
                $offset = 0;
            }
            $sql_result = $sql_publikasi." ORDER BY id_publikasi DESC LIMIT ".$perpage." OFFSET ".$offset."";

            
            $publikasis = Querybanyak($sql_result);
            foreach ($publikasis as $publikasi) {
        ?>
            <article class="entry">
              <div class="entry-img">
                <img src="<?= $url ?>/gambar/publikasi/<?= $publikasi["gambar"] ?>" alt="" style="width:100%;" class="img-fluid">
                <!-- <img src="<?= $url ?>/assets/pages/assets/img/blog/blog-2.jpg" alt="" class="img-fluid"> -->
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html"><?= $publikasi["judul"] ?></a>
              </h2>

              <!--
              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
                </ul>
              </div>
                -->

              <div class="entry-content">
                <p>
                <?= $publikasi["kutipan"] ?>
                </p>
                <div class="read-more">
                  <a href="<?= $url ?>/?pages=blog_post&id=<?= $publikasi['id_publikasi'] ?>">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->
        <?php
        }
        ?>
        <?php /*
            <article class="entry">

              <div class="entry-img">
                <img src="<?= $url ?>/assets/pages/assets/img/blog/blog-2.jpg" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html">Nisi magni odit consequatur autem nulla dolorem</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                  Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum voluptatum et. Quo libero rerum voluptatem pariatur nam.
                  Ad impedit qui officiis est in non aliquid veniam laborum. Id ipsum qui aut. Sit aliquam et quia molestias laboriosam. Tempora nam odit omnis eum corrupti qui aliquid excepturi molestiae. Facilis et sint quos sed voluptas. Maxime sed tempore enim omnis non alias odio quos distinctio.
                </p>
                <div class="read-more">
                  <a href="blog-single.html">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->

            <article class="entry">

              <div class="entry-img">
                <img src="<?= $url ?>/assets/pages/assets/img/blog/blog-3.jpg" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html">Possimus soluta ut id suscipit ea ut. In quo quia et soluta libero sit sint.</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                  Aut iste neque ut illum qui perspiciatis similique recusandae non. Fugit autem dolorem labore omnis et. Eum temporibus fugiat voluptate enim tenetur sunt omnis.
                  Doloremque est saepe laborum aut. Ipsa cupiditate ex harum at recusandae nesciunt. Ut dolores velit.
                </p>
                <div class="read-more">
                  <a href="blog-single.html">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->

            <article class="entry">

              <div class="entry-img">
                <img src="<?= $url ?>/assets/pages/assets/img/blog/blog-4.jpg" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html">Non rem rerum nam cum quo minus. Dolor distinctio deleniti explicabo eius exercitationem.</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                  Aspernatur rerum perferendis et sint. Voluptates cupiditate voluptas atque quae. Rem veritatis rerum enim et autem. Saepe atque cum eligendi eaque iste omnis a qui.
                  Quia sed sunt. Ea asperiores expedita et et delectus voluptates rerum. Id saepe ut itaque quod qui voluptas nobis porro rerum. Quam quia nesciunt qui aut est non omnis. Inventore occaecati et quaerat magni itaque nam voluptas. Voluptatem ducimus sint id earum ut nesciunt sed corrupti nemo.
                </p>
                <div class="read-more">
                  <a href="blog-single.html">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->
*/ ?>
            <?php if($count_result > 0){ ?>
                <div class="blog-pagination">
                    <ul class="justify-content-center">
                        <li ><a href="<?= $url ?>/?pages=blog<?= isset($_GET['search']) ? "&search=".$_GET['search']."" : "" ?><?= "&page=".$prev_page."" ?>"><<</a></li>
                        <li class="active"><a href="#"><?= $page ?></a></li>
                        <li><a href="<?= $url ?>/?pages=blog<?= isset($_GET['search']) ? "&search=".$_GET['search']."" : "" ?><?= "&page=".$next_page."" ?>">>></a></li>
                    </ul>
                </div>
            <?php } ?>

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="" method="GET">
                    <input type="hidden" name="pages" value="blog">
                  <input type="text" name="search">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">KATEGORI</h3>
              <div class="sidebar-item categories">
                <ul>
                <?php
                    //Tampilkan data publlikasi terbaru sejumlah 3
                    $new_publikasis = Querybanyak("SELECT * FROM publikasi GROUP BY kategori ORDER BY id_publikasi DESC");
                    foreach ($new_publikasis as $publikasi) {
                ?>
                    <li><a href="#"><?= $publikasi["kategori"] ?> 
                    <?php $num_kategori = NumRows("SELECT * FROM publikasi WHERE kategori = '".$publikasi['kategori']."'"); ?>
                    <span>(<?= $num_kategori ?>)</span></a></li>
                <?php 
                    }
                ?>
                  <!-- <li><a href="#">Lifestyle <span>(12)</span></a></li>
                  <li><a href="#">Travel <span>(5)</span></a></li>
                  <li><a href="#">Design <span>(22)</span></a></li>
                  <li><a href="#">Creative <span>(8)</span></a></li>
                  <li><a href="#">Educaion <span>(14)</span></a></li> -->
                </ul>
              </div><!-- End sidebar categories-->


              <?php /*
              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                <div class="post-item clearfix">
                  <img src="<?= $url ?>/assets/pages/assets/img/blog/blog-recent-1.jpg" alt="">
                  <h4><a href="blog-single.html">Nihil blanditiis at in nihil autem</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="<?= $url ?>/assets/pages/assets/img/blog/blog-recent-2.jpg" alt="">
                  <h4><a href="blog-single.html">Quidem autem et impedit</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="<?= $url ?>/assets/pages/assets/img/blog/blog-recent-3.jpg" alt="">
                  <h4><a href="blog-single.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="<?= $url ?>/assets/pages/assets/img/blog/blog-recent-4.jpg" alt="">
                  <h4><a href="blog-single.html">Laborum corporis quo dara net para</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="<?= $url ?>/assets/pages/assets/img/blog/blog-recent-5.jpg" alt="">
                  <h4><a href="blog-single.html">Et dolores corrupti quae illo quod dolor</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

              </div><!-- End sidebar recent posts-->

              
              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

            */ ?>

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->