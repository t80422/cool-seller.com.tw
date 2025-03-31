<!-- 前台列表 -->
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<div id="content" class="site-content site">
  <div class="page-header-wrap clearfix ind_row_parallax" style="background-color: #13314c; color: #ffffff">
    <div class="inner-banner2 clearfix" style="background-image: url('/public/images/about/bg.png');">
      <div class="container clearfix">
        <h2 class="page-title" style="color: #ffffff">活動訊息</h2>
      </div>
    </div>
  </div>

  <div class="breadcumb-wrapper">
    <div class="container clearfix">
      <span property="itemListElement" typeof="ListItem">
        <a property="item" typeof="WebPage" href="/" class="home">
          <span property="name">首頁</span>
        </a>
        <meta property="position" content="1" />
      </span>

      <span class="font-awe">&#xF105;</span>

      <span property="itemListElement" typeof="ListItem">
        <a property="item" typeof="WebPage" href="news" class="post post-page current-item" aria-current="page">
          <span property="name">活動訊息</span>
        </a>
        <meta property="position" content="2" />
      </span>
    </div>
  </div>

  <div class="row_inner_wrapper clearfix">
    <div id="content-wrap" class="container inner_page_space">
      <div id="primary" class="col-md-8 col-sm-12 tab-content left-sidebar">
        <main id="main" class="site-main">
          <!-- 列表 -->
          <?php if (!empty($activities)): ?>
            <?php foreach ($activities as $activity): ?>
              <article
                id="post-9"
                class="post-9 post type-post status-publish format-standard has-post-thumbnail hentry category-alluminium-strength-depends category-construction-and-architecture category-solar-panel-working-process tag-cost-shipment">
                <div class="single-blog-post img-cap-effect padd-blog-rgt">
                  <div class="post-thumbnail news-image">
                    <img
                      width="790"
                      height="350"
                      src="/public/images/news/<?= $activity['a_Img'] ?>"
                      class="attachment-industrial_blog-large size-industrial_blog-large wp-post-image"
                      alt=""
                      decoding="async"
                      fetchpriority="high"
                      sizes="(max-width: 790px) 100vw, 790px" />
                  </div>
                  <h6 class="post-date"><?= $activity['a_StartDate'] ?></h6>
                  <h3 class="entry-title">
                    <?= $activity['a_Title'] ?>
                  </h3>
                  <div class="entry-content core-projects">
                    <p><?= esc(mb_substr($activity['a_Content'], 0, 50)) . '...' ?></p>
                    <div class="none-margin">
                      <a
                        href="/news/detail/<?= $activity['a_Id'] ?>"
                        class="more-link">查看更多</a>
                    </div>
                  </div>
                </div>
              </article>
            <?php endforeach; ?>
          <?php else: ?>
            <p>目前沒有活動訊息</p>
          <?php endif; ?>
          <!-- 分頁 -->
          <?php if ($pager): ?>
            <nav class="navigation page-navigation" role="navigation">
              <h1 class="screen-reader-text"></h1>
              <div class="pagination loop-pagination" style="display: flex; justify-content: center;">
                <?= $pager->links() ?>
              </div>
            </nav>
          <?php endif; ?>
        </main>
      </div>

      <?= $this->include('news/_sidebar') ?>
    </div>
  </div>
</div>

<?= $this->endSection() ?>