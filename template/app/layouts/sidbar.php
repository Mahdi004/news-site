<div class="col-lg-4">
    <div class="sidebars-area">
        <div class="single-sidebar-widget editors-pick-widget">
            <h6 class="title">انتخاب سردبیر</h6>
            <?PHP if (!empty($sideBarSelected[0])) { ?>
                <div class="editors-pick-post">
                    <div class="feature-img-wrap relative">
                        <div class="feature-img relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="<?= asset($sideBarSelected[0]['image']) ?>" alt="">
                        </div>
                        <ul class="tags">
                            <li><a href="#"><?= $sideBarSelected[0]['category'] ?></a></li>
                        </ul>
                    </div>
                    <div class="details">
                        <a href="image-post.html">
                            <h4 class="mt-20"><?= $sideBarSelected[0]['title'] ?></h4>
                        </a>
                        <ul class="meta">
                            <li><a href="#"><span class="lnr lnr-user"></span><?= $sideBarSelected[0]['username'] ?></a>
                            </li>
                            <li><a href="#"><?= jalaliData($sideBarSelected[0]['created_at']) ?><span
                                        class="lnr lnr-calendar-full"></span></a></li>
                            <li><a href="#"><?= $sideBarSelected[0]['comment_count'] ?><span
                                        class="lnr lnr-bubble"></span></a></li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php if (!empty($sideBarBanner)) { ?>
            <div class="single-sidebar-widget ads-widget">
                <a href="<?= $sideBarBanner['url'] ?>" target="_blank">
                    <img class="img-fluid" src="<?= asset($sideBarBanner['image']) ?>" alt="">
                </a>
            </div>
        <?php } ?>

        <div class="single-sidebar-widget most-popular-widget">
            <h6 class="title">پر بحث ترین ها</h6>
            <?php foreach ($mostCommentPosts as $mostCommentPost) { ?>
                <div class="single-list flex-row d-flex">
                    <div class="thumb">
                        <img class="mostComment" src="<?= asset($mostCommentPost['image']) ?>" alt="" >
                    </div>
                    <div class="details">
                        <a href="image-post.html">
                            <h6><?= $mostCommentPost['title']?></h6>
                        </a>
                        <ul class="meta">
                            <li><a href="#"><?= jalaliData($mostCommentPost['created_at'])?><span class="lnr lnr-calendar-full"></span></a></li>
                            <li><a href="#"><?= $mostCommentPost['comment_count']?><span class="lnr lnr-bubble"></span></a></li>
                        </ul>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>