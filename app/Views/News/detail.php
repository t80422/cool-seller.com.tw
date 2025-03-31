<!-- 前台詳細 -->
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<div id="content" class="site-content site">
  <?= $this->include('news/_header') ?>

  <!-- 麵包屑 -->
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
        <a property="item" typeof="WebPage" href="/news" class="post-root post post-post current-item" aria-current="page">
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
                <p><?= $activity['a_Content'] ?></p>
              </div>
            </div>
          </article>
        </main>
      </div>

      <?= $this->include('news/_sidebar') ?>
    </div>
  </div>
</div>

<?= $this->endSection() ?>