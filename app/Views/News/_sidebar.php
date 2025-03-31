<div class="padd-blog-left">
    <div
        id="secondary"
        class="col-md-4 col-sm-12 blog-side-shop pull-left news"
        role="complementary">

        <!-- 搜尋 -->
        <aside
            id="search-2"
            class="widget widget_search single-sidebar-widget">
            <form
                role="search"
                method="get"
                class="search-form search-form-sidebar">
                <div class="input-group">
                    <input
                        type="search"
                        value="<?= $keyword ?? '' ?>"
                        name="keyword"
                        class="form-control"
                        placeholder="請輸入關鍵字搜尋" />
                    <span class="input-group-addon">
                        <button type="submit">
                            <i class="icon icon-Search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </aside>

        <aside id="ind_posts-1" class="widget widget_ind_posts single-sidebar-widget">
            <h2 class="widget-title"><span>熱門訊息</span></h2>
            <div class="popular-post">
                <ul class="widget-posts-list">
                    <?php if (!empty($hotActivities)): ?>
                        <?php foreach ($hotActivities as $hotActivity): ?>
                            <li class="img-cap-effect">
                                <div class="img-box">
                                    <img
                                        width="110"
                                        height="84"
                                        src="/public/images/news/<?= $hotActivity['a_Img'] ?>"
                                        class="attachment-industrial_110x84 size-industrial_110x84 wp-post-image"
                                        alt=""
                                        decoding="async"
                                        loading="lazy"
                                        sizes="auto, (max-width: 110px) 100vw, 110px" />
                                </div>

                                <div class="content">
                                    <h4><?= $hotActivity['a_Title'] ?></h4>
                                    <a href="">閱讀更多</a>
                                </div>
                                <div class="clear"></div>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="no-posts">目前無熱門訊息</li>
                    <?php endif; ?>
                </ul>
            </div>
        </aside>
    </div>
</div>