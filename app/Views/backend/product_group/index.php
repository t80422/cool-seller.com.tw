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
                <button class="btn-add" onClick="window.location.href='<?= base_url('backend/product_group/create'); ?>'">新增</button>
            </div>
        </div>
        <!-- list -->
        <div class="list-wrap">
            <div class="list-overflow">
                <div class="list-main">
                    <div class="list-title pr-2 pl-2">
                        <div class="f-1">名稱</div>
                        <div class="f-1">排序</div>
                        <div class="f-1">啟用</div>
                        <div class="f-1">建立時間</div>
                        <div class="f-1">修改時間</div>
                        <div class="f-1">操作</div>
                    </div>

                    <?php if (empty($Datas)): ?>
                        <div class="list-row pr-2 pl-2">
                            <div class="f-10 ta-center">尚無作品分類資料</div>
                        </div>
                    <?php else: ?>
                        <?php foreach ($Datas as $data): ?>
                            <div class="list-row pr-2 pl-2">
                                <div class="f-1"><?= $data['pg_name']; ?></div>
                                <div class="f-1"><?= $data['pg_sort']; ?></div>
                                <div class="f-1">
                                    <input type="checkbox" <?= $data['pg_enabled'] == 1 ? "checked" : ""; ?> disabled>
                                </div>
                                <div class="f-1"><?= $data['pg_create_at']; ?></div>
                                <div class="f-1"><?= $data['pg_update_at']; ?></div>
                                <div class="f-1">
                                    <button class="btn-edit" onClick="location.href='<?= base_url('backend/product_group/edit/' . $data['pg_id']); ?>'"></button>
                                    <button class="btn-del" data-sn="<?= $data['pg_id']; ?>"></button>
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
                <p>是否確定刪除此作品分類？</p>
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
            location.href = '<?= base_url('backend/product_group'); ?>' + "?keyword=" + $('input[name="keyword"]').val()
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
                location.href = '<?= base_url('backend/product_group/delitem'); ?>' + '/' + sn;
            });
        });
    </script>
</main>

<?php $this->endSection(); ?>