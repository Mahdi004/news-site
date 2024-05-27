<?php
require_once (BASE_PATH . "/template/app/layouts/header.php");
?>
<div class="site-main-container">
  <!-- Start top-post Area -->
  <section class="top-post-area pt-10">
    <div class="container no-padding">
      <div class="row small-gutters">
        <?php if (isset($topSelectedPost[0])) { ?>
          <div class="col-lg-8 top-post-left">
            <div class="feature-image-thumb relative">
              <div class="overlay overlay-bg"></div>
              <img class="img-fluid" src="<?= asset($topSelectedPost[0]['image']) ?>" alt="">
            </div>
            <div class="top-post-details">
              <ul class="tags">
                <li><a href="#"><?= $topSelectedPost[0]['category'] ?></a></li>
              </ul>
              <a href="image-post.html">
                <h3><?= $topSelectedPost[0]['title'] ?></h3>
              </a>
              <ul class="meta">
                <li><a href="#"><span class="lnr lnr-user"><?= $topSelectedPost[0]['username'] ?></span></a></li>
                <li><a href="#"><?= jalaliData($topSelectedPost[0]['created_at']) ?><span
                      class="lnr lnr-calendar-full"></span></a></li>
                <li><a href="#"><?= $topSelectedPost[0]['comment_count'] ?><span class="lnr lnr-bubble"></span></a></li>
              </ul>
            </div>
          </div>
        <?php } ?>
        <div class="col-lg-4 top-post-right">
          <?php if (isset($topSelectedPost[1])) { ?>
            <div class="single-top-post">
              <div class="feature-image-thumb relative">
                <div class="overlay overlay-bg"></div>
                <img class="img-fluid" src="<?= asset($topSelectedPost[1]['image']) ?>" alt="">
              </div>
              <div class="top-post-details">
                <ul class="tags">
                  <li><a href="#"><?= $topSelectedPost[1]['category'] ?></a></li>
                </ul>
                <a href="image-post.html">
                  <h4><?= $topSelectedPost[1]['title'] ?></h4>
                </a>
                <ul class="meta">
                  <li><a href="#"><span class="lnr lnr-user"></span><?= $topSelectedPost[1]['username'] ?></a></li>
                  <li><a href="#"><?= jalaliData($topSelectedPost[1]['created_at']) ?><span
                        class="lnr lnr-calendar-full"></span></a></li>
                  <li><a href="#"><?= $topSelectedPost[1]['comment_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                </ul>
              </div>
            </div>
          <?php }
          if (isset($topSelectedPost[2])) {
            ?>
            <div class="single-top-post mt-10">
              <div class="feature-image-thumb relative">
                <div class="overlay overlay-bg"></div>
                <img class="img-fluid" src="<?= $topSelectedPost[2]['image'] ?>" alt="">
              </div>
              <div class="top-post-details">
                <ul class="tags">
                  <li><a href="#"><?= $topSelectedPost[2]['category'] ?></a></li>
                </ul>
                <a href="image-post.html">
                  <h4><?= $topSelectedPost[2]['title'] ?></h4>
                </a>
                <ul class="meta">
                  <li><a href="#"><span class="lnr lnr-user"></span><?= $topSelectedPost[2]['username'] ?></a></li>
                  <li><a href="#"><?= jalaliData($topSelectedPost[2]['created_at']) ?><span
                        class="lnr lnr-calendar-full"></span></a></li>
                  <li><a href="#"><?= $topSelectedPost[2]['comment_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                </ul>
              </div>
            </div>
          <?php } ?>
        </div>
        <?php if (!empty($breakingNews)) { ?>
          <div class="col-lg-12">
            <div class="news-tracker-wrap">
              <h6><span>خبر فوری:</span> <a href="#"><?= $breakingNews['title'] ?></a></h6>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <!-- End top-post Area -->
  <!-- Start latest-post Area -->
  <section class="latest-post-area pb-120">
    <div class="container no-padding">
      <div class="row">
        <div class="col-lg-8 post-list">
          <!-- Start latest-post Area -->
          <div class="latest-post-wrap">
            <h4 class="cat-title">آخرین اخبار</h4>
            <?php foreach ($lastPosts as $lastPost) { ?>
              <div class="single-latest-post row align-items-center">
                <div class="col-lg-5 post-left">
                  <div class="feature-img relative">
                    <div class="overlay overlay-bg"></div>
                    <img class="img-fluid" src="<?= $lastPost['image'] ?>" alt="">
                  </div>
                  <ul class="tags">
                    <li><a href="#"><?= $lastPost['category'] ?></a></li>
                  </ul>
                </div>
                <div class="col-lg-7 post-right">
                  <a href="image-post.html">
                    <h4><?= $lastPost['title'] ?></h4>
                  </a>
                  <ul class="meta">
                    <li><a href="#"><span class="lnr lnr-user"></span><?= $lastPost['username'] ?></a></li>
                    <li><a href="#"><?= jalaliData($lastPost['created_at']) ?><span
                          class="lnr lnr-calendar-full"></span></a></li>
                    <li><a href="#"><?= $lastPost['comment_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                  </ul>
                </div>
              </div>
            <?php } ?>
          </div>
          <!-- End latest-post Area -->
          <!-- Start banner-ads Area -->
          <?php if (!empty($bodyBaner)) { ?>
            <div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
              <a href="<?= $bodyBaner['url'] ?>" target="_blank">
                <img class="img-fluid" src="<?= asset($bodyBaner['image']) ?>" alt="">
              </a>
            </div>
          <?php } ?>
          <!-- End banner-ads Area -->
          <!-- Start popular-post Area -->
          <div class="popular-post-wrap">
            <h4 class="title">اخبار پربازدید</h4>
            <?php if (!empty($populPosts[0])) { ?>
              <div class="feature-post relative">
                <div class="feature-img relative">
                  <div class="overlay overlay-bg"></div>
                  <img class="img-fluid" src="<?= asset($populPosts[0]['image']) ?>" alt="">
                </div>
                <div class="details">
                  <ul class="tags">
                    <li><a href="#"><?= $populPosts[0]['category'] ?></a></li>
                  </ul>
                  <a href="image-post.html">
                    <h3><?= $populPosts[0]['title'] ?></h3>
                  </a>
                  <ul class="meta">
                    <li><a href="#"><span class="lnr lnr-user"></span><?= $populPosts[0]['username'] ?></a></li>
                    <li><a href="#"><?= jalaliData($populPosts[0]['created_at']) ?><span
                          class="lnr lnr-calendar-full"></span></a></li>
                    <li><a href="#"><?= $populPosts[0]['comment_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                  </ul>
                </div>
              </div>
            <?php } ?>
            <div class="row mt-20 medium-gutters">
              <?php if (!empty($populPosts[1])) { ?>
                <div class="col-lg-6 single-popular-post">
                  <div class="feature-img-wrap relative">
                    <div class="feature-img relative">
                      <div class="overlay overlay-bg"></div>
                      <img class="img-fluid" src="<?= asset($populPosts[1]['image']) ?>" alt="">
                    </div>
                    <ul class="tags">
                      <li><a href="#"><?= $populPosts[1]['category'] ?></a></li>
                    </ul>
                  </div>
                  <div class="details">
                    <a href="image-post.html">
                      <h4><?= $populPosts[1]['title'] ?></h4>
                    </a>
                    <ul class="meta">
                      <li><a href="#"><span class="lnr lnr-user"></span><?= $populPosts[1]['username'] ?></a></li>
                      <li><a href="#"><?= jalaliData($populPosts[1]['created_at']) ?><span
                            class="lnr lnr-calendar-full"></span></a></li>
                      <li><a href="#"><?= $populPosts[1]['comment_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                    </ul>
                  </div>
                </div>
              <?php }
              if (!empty($populPosts[2])) {
                ?>
                <div class="col-lg-6 single-popular-post">
                  <div class="feature-img-wrap relative">
                    <div class="feature-img relative">
                      <div class="overlay overlay-bg"></div>
                      <img class="img-fluid" src="<?= asset($populPosts[2]['image']) ?>" alt="">
                    </div>
                    <ul class="tags">
                      <li><a href="#"><?= $populPosts[2]['category'] ?></a></li>
                    </ul>
                  </div>
                  <div class="details">
                    <a href="image-post.html">
                      <h4><?= $populPosts[2]['title'] ?></h4>
                    </a>
                    <ul class="meta">
                      <li><a href="#"><span class="lnr lnr-user"></span><?= $populPosts[2]['username'] ?></a></li>
                      <li><a href="#"><?= jalaliData($populPosts[2]['created_at']) ?><span
                            class="lnr lnr-calendar-full"></span></a></li>
                      <li><a href="#"><?= $populPosts[2]['comment_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                    </ul>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
          <!-- End popular-post Area -->
        </div>
        <?php
        require_once (BASE_PATH . "/template/app/layouts/sidbar.php");
        ?>
      </div>
  </section>
  <!-- End latest-post Area -->
</div>
<?php
require_once (BASE_PATH . "/template/app/layouts/footer.php");
?>