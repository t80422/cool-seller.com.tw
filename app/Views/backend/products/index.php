<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>

<style>
.tag-list {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
}

.tag-badge {
    display: inline-block;
    background-color: #e1f0ff;
    color: #4a90e2;
    border-radius: 12px;
    padding: 2px 8px;
    font-size: 12px;
    white-space: nowrap;
}

.no-tag {
    color: #999;
    font-style: italic;
    font-size: 12px;
}

.product-link {
    display: inline-block;
    background-color: #4a90e2;
    color: white;
    border-radius: 12px;
    padding: 2px 10px;
    font-size: 12px;
    text-decoration: none;
    transition: background-color 0.2s;
}

.product-link:hover {
    background-color: #3a7bc8;
    text-decoration: none;
}

.no-link {
    color: #999;
    font-style: italic;
    font-size: 12px;
}
</style>

<main class="container-wrap">
    <div class="container-main">
        <!-- tool -->
        <div class="tool-wrap">
            <div class="tool-search">
                <input type="text" name="keyword" placeholder="搜尋名稱、描述或標籤" value="<?= $keyword ?? null; ?>">
                <button type="button" onclick="search();"></button>
            </div>

            <div class="tool-select">
                <select name="category" onchange="filterByCategory(this.value)">
                    <option value="">全部分類</option>
                    <?php foreach ($categories as $id => $name): ?>
                        <option value="<?= $id ?>" <?= $selectedCategory == $id ? 'selected' : '' ?>><?= $name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="tool-btn">
                <button class="btn-add" onClick="window.location.href='<?= base_url('backend/products/create'); ?>'">新增</button>
            </div>
        </div>
        <!-- list -->
        <div class="list-wrap">
            <div class="list-overflow">
                <div class="list-main">
                    <div class="list-title pr-2 pl-2">
                        <div class="f-2">名稱</div>
                        <div class="f-2">描述</div>
                        <div class="f-1">分類</div>
                        <div class="f-1">標籤</div>
                        <div class="f-1">排序</div>
                        <div class="f-1">連結</div>
                        <div class="f-1">建立時間</div>
                        <div class="f-1">更新時間</div>
                        <div class="f-1">操作</div>
                    </div>

                    <?php if (empty($Datas)): ?>
                        <div class="list-row pr-2 pl-2">
                            <div class="f-12 ta-center">尚無作品資料</div>
                        </div>
                    <?php else: ?>
                        <?php foreach ($Datas as $data): ?>
                            <div class="list-row pr-2 pl-2">
                                <div class="f-2"><?= $data['p_name']; ?></div>
                                <div class="f-2"><?= mb_substr($data['p_description'], 0, 30) . (mb_strlen($data['p_description']) > 30 ? '...' : ''); ?></div>
                                <div class="f-1"><?= $data['category_name'] ?? '無分類'; ?></div>
                                <div class="f-1">
                                    <?php if (!empty($data['tags'])): ?>
                                        <div class="tag-list">
                                            <?php foreach ($data['tags'] as $tag): ?>
                                                <span class="tag-badge"><?= $tag['t_name']; ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php else: ?>
                                        <span class="no-tag">無標籤</span>
                                    <?php endif; ?>
                                </div>
                                <div class="f-1"><?= $data['p_sort']; ?></div>
                                <div class="f-1">
                                    <?php if (!empty($data['p_link'])): ?>
                                        <a href="<?= (strpos($data['p_link'], 'http') === 0) ? $data['p_link'] : 'http://' . $data['p_link']; ?>" target="_blank" class="product-link">查看</a>
                                    <?php else: ?>
                                        <span class="no-link">無連結</span>
                                    <?php endif; ?>
                                </div>
                                <div class="f-1"><?= substr($data['p_created_at'], 0, 10); ?></div>
                                <div class="f-1"><?= substr($data['p_updated_at'], 0, 10); ?></div>
                                <div class="f-1">
                                    <button class="btn-edit" onClick="location.href='<?= base_url('backend/products/edit/' . $data['p_id']); ?>'"></button>
                                    <button class="btn-del" data-sn="<?= $data['p_id']; ?>"></button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- pages -->
        <?= $pager_links; ?>
    </div>

    <div class="popup-wrap js-del-popup">
        <div class="popup-main">
            <div class="popup-content">
                <p>是否確定刪除此作品？</p>
                <div class="popup-btn">
                    <button class="btn-cancel">取消</button>
                    <button class="btn-submit">確定</button>
                </div>
            </div>
        </div>
    </div>

    <div class="popup-overlay"></div>
    <!-- JS -->

    <script>
        function search() {
            var url = '<?= base_url('backend/products'); ?>';
            var params = [];

            var keyword = $('input[name="keyword"]').val();
            if (keyword) {
                params.push('keyword=' + encodeURIComponent(keyword));
            }

            var category = $('select[name="category"]').val();
            if (category) {
                params.push('category=' + category);
            }

            if (params.length > 0) {
                url += '?' + params.join('&');
            }

            location.href = url;
        }

        function filterByCategory(categoryId) {
            var url = '<?= base_url('backend/products'); ?>';
            var params = [];

            var keyword = $('input[name="keyword"]').val();
            if (keyword) {
                params.push('keyword=' + encodeURIComponent(keyword));
            }

            if (categoryId) {
                params.push('category=' + categoryId);
            }

            if (params.length > 0) {
                url += '?' + params.join('&');
            }

            location.href = url;
        }

        $(function() {
            var sn;
            $(document).on('click', '.btn-del', function() {
                $(".popup-overlay, .js-del-popup").fadeIn();
                sn = $(this).data('sn');
            });

            $(".popup-overlay, .popup-btn .btn-cancel").on('click', function() {
                $(".popup-overlay, .popup-wrap").fadeOut();
            });

            $(".popup-btn .btn-submit").on('click', function() {
                location.href = '<?= base_url('backend/products/delitem'); ?>' + '/' + sn;
            });
        });
    </script>
</main>

<?php $this->endSection(); ?>