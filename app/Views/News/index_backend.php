<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>

<?php $controller = 'News' ?>

<main class="container-wrap">
    <div class="container-main">
        <!-- tool -->
        <div class="tool-wrap">
            <div class="tool-search">
                <input type="text" name="keyword" placeholder="請輸入關鍵字搜尋" value="<?= $keyword ?? null; ?>">
                <button type="button" onclick="search();"></button>
            </div>

            <div class="tool-btn">
                <button class="btn-add" onClick="window.location.href='<?= url_to($controller . '::create'); ?>'">新增</button>
            </div>
        </div>

        <!-- list -->
        <div class="list-wrap">
            <div class="list-overflow">
                <div class="list-main">
                    <div class="list-title pr-2 pl-2">
                        <div class="f-2">圖</div>
                        <div class="f-1">標題</div>
                        <div class="f-1">內容</div>
                        <div class="f-1">開始日期</div>
                        <div class="f-1">結束日期</div>
                        <div class="f-1">建立時間</div>
                        <div class="f-1">更新時間</div>
                        <div class="f-1">是否顯示</div>
                        <div class="f-1">是否置頂</div>
                        <div class="f-1">操作</div>
                    </div>

                    <?php foreach ($datas as $data): ?>
                        <div class="list-row pr-2 pl-2">
                            <div class="f-2">
                                <figure class="prod-img" style="background-image: url('<?= "/public/images/news/" . $data['a_Img'] ?>');"></figure>
                            </div>
                            <div class="f-1"><?= $data['a_Title'] ?></div>
                            <div class="f-1"><?= $data['a_Content'] ?></div>
                            <div class="f-1"><?= $data['a_StartDate'] ?></div>
                            <div class="f-1"><?= $data['a_EndDate'] ?></div>
                            <div class="f-1"><?= $data['a_CreateAt'] ?></div>
                            <div class="f-1"><?= $data['a_UpdateAt'] ?></div>
                            <div class="f-1">
                                <input type="checkbox" disabled <?= $data['a_IsShow'] == 1 ? 'checked' : '' ?>>
                            </div>
                            <div class="f-1">
                                <input type="checkbox" disabled <?= $data['a_IsPinned'] == 1 ? 'checked' : '' ?>>
                            </div>
                            <div class="f-1">
                                <button class="btn-edit" onClick="location.href='<?= url_to($controller . '::edit', $data['a_Id']); ?>'"></button>
                                <button class="btn-del" data-sn="<?= $data['a_Id']; ?>"></button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- pages -->
        <?= $pager_links; ?>
    </div>

    <div class="popup-wrap js-del-popup">
        <div class="popup-main">
            <div class="popup-content">
                <p>是否確定刪除</p>
                <div class="popup-btn">
                    <button class="btn-cancel">取消</button>
                    <button class="btn-submit">確定</button>
                </div>
            </div>
        </div>
    </div>

    <div class="popup-overlay"></div>
</main>

<!-- JS -->

<script>
    function search() {
        location.href = '<?= url_to($controller . '::index_backend'); ?>' + "?keyword=" + $('input[name="keyword"]').val()
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
            fetch('<?= site_url('backend/news/') ?>' + sn, {
                    method: 'delete'
                })
                .then(response => {
                    if (response.ok) {
                        location.reload();
                    }
                });
        })
    });
</script>

<?php $this->endSection(); ?>