<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>

<main class="container-wrap">
    <div class="container-main">
        <!-- tool -->
        <div class="tool-wrap">
            <div class="tool-search">
                <input type="text" name="keyword" placeholder="請輸入關鍵字搜尋" value="<?= $keyword ?? null; ?>">
                <button type="button" onclick="search();"></button>
            </div>

            <div class="tool-btn">
                <button class="btn-add" onClick="window.location.href='<?= url_to('Videos::create'); ?>'">新增</button>
            </div>
        </div>
        <!-- list -->
        <div class="list-wrap">
            <div class="list-overflow">
                <div class="list-main">
                    <div class="list-title pr-2 pl-2">
                        <div class="f-1">標題</div>
                        <div class="f-1">內容</div>
                        <div class="f-1">影片連結</div>
                        <div class="f-1">排序</div>
                        <div class="f-1">顯示</div>
                        <div class="f-1">建立時間</div>
                        <div class="f-1">修改時間</div>
                        <div class="f-1">操作</div>
                    </div>

                    <?php foreach ($Datas as $data): ?>
                        <div class="list-row pr-2 pl-2">
                            <div class="f-1"><?= $data['v_title']; ?></div>
                            <div class="f-1"><?= $data['v_content']; ?></div>
                            <div class="f-1"><a href="<?= $data['v_url']; ?>" target="_blank"><i class="fas fa-link"></i> 影片連結</a></div>
                            <div class="f-1"><?= $data['v_sort']; ?></div>
                            <div class="f-1"><input type="checkbox" <?= $data['v_display'] == 1 ? "checked" : ""; ?> disabled></div>
                            <div class="f-1"><?= $data['v_create_at']; ?></div>
                            <div class="f-1"><?= $data['v_update_at']; ?></div>
                            <div class="f-1">
                                <button class="btn-edit" onClick="location.href='<?= url_to('Videos::edit', $data['v_id']); ?>'"></button>
                                <button class="btn-del" data-sn="<?= $data['v_id']; ?>"></button>
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
    <!-- JS -->

    <script>
        function search() {
            location.href = '<?= url_to('Videos::index'); ?>' + "?keyword=" + $('input[name="keyword"]').val()
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
                location.href = '<?= url_to('Videos::index'); ?>' + '/delitem/' + sn;
            });
        });
    </script>
</main>

<?php $this->endSection(); ?>