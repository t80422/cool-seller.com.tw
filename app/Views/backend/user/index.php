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

            <?php if ($isAdmin): ?>
            <div class="tool-btn">
                <button class="btn-add" onClick="window.location.href='<?= url_to('User::create'); ?>'">新增</button>
            </div>
            <?php endif; ?>
        </div>

        <!-- list -->
        <div class="list-wrap">
            <div class="list-overflow">
                <div class="list-main">
                    <div class="list-title pr-2 pl-2">
                        <div class="f-1">名稱</div>
                        <div class="f-1">帳號</div>
                        <div class="f-1">權限</div>
                        <div class="f-1">建立時間</div>
                        <div class="f-1">修改時間</div>
                        <div class="f-1">最後登入時間</div>
                        <div class="f-1">啟用</div>
                        <div class="f-1">操作</div>
                    </div>

                    <?php foreach ($datas as $user): ?>
                        <div class="list-row pr-2 pl-2">
                            <div class="f-1"><?= $user['u_name']; ?></div>
                            <div class="f-1"><?= $user['u_account']; ?></div>
                            <div class="f-1"><?= $user['u_power'] == 99 ? '管理者' : '一般使用者'; ?></div>
                            <div class="f-1"><?= $user['u_create_time']; ?></div>
                            <div class="f-1"><?= $user['u_update_time']; ?></div>
                            <div class="f-1"><?= $user['u_last_login']; ?></div>
                            <div class="f-1">
                                <input type="checkbox" <?= $user['u_enabled'] ? 'checked' : ''; ?> disabled>
                            </div>
                            <div class="f-1">
                                <button class="btn-edit" onClick="location.href='<?= url_to('User::edit', $user['u_id']); ?>'"></button>
                                <?php if ($isAdmin): ?>
                                <button class="btn-del" data-sn="<?= $user['u_id']; ?>"></button>
                                <?php endif; ?>
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
                <p>是否確定刪除帳號</p>
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
        location.href = '<?php echo url_to('User::index'); ?>' + "?keyword=" + $('input[name="keyword"]').val()
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
            location.href = '<?php echo url_to('User::index'); ?>' + '/delitem/' + sn;
        })
    });
</script>

<?php $this->endSection(); ?>