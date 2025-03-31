<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>

<?php $controller = 'Support' ?>

<main class="container-wrap">
    <div class="container-main">
        <!-- tool -->
        <div class="tool-wrap">
            <div class="tool-search">
                <input type="text" name="keyword" placeholder="請輸入關鍵字搜尋" value="<?= $keyword ?? null; ?>">
                <button type="button" onclick="search();"></button>
            </div>

            <div class="tool-btn">
                <button class="btn-add" onClick="window.location.href='<?= url_to($controller . '::create_download'); ?>'">新增</button>
            </div>
        </div>

        <!-- list -->
        <div class="list-wrap">
            <div class="list-overflow">
                <div class="list-main">
                    <div class="list-title pr-2 pl-2">
                        <div class="f-1">名稱</div>
                        <div class="f-1">下載類別</div>
                        <div class="f-1">描述</div>
                        <div class="f-1">檔案名稱</div>
                        <div class="f-1">建立時間</div>
                        <div class="f-1">更新時間</div>
                        <div class="f-1">排序</div>
                        <div class="f-1">是否顯示</div>
                        <div class="f-1">操作</div>
                    </div>

                    <?php foreach ($datas as $data): ?>
                        <div class="list-row pr-2 pl-2">
                            <div class="f-1"><?= $data['d_Name'] ?></div>
                            <div class="f-1"><?= $data['dc_Name'] ?></div>
                            <div class="f-1"><?= $data['d_Description'] ?></div>
                            <div class="f-1"><?= $data['d_FileName'] ?></div>
                            <div class="f-1"><?= $data['d_CreateAt'] ?></div>
                            <div class="f-1"><?= $data['d_UpdateAt'] ?></div>
                            <div class="f-1"><?= $data['d_Sequence'] ?></div>
                            <div class="f-1">
                                <input type="checkbox" disabled <?= $data['d_IsShow'] == 1 ? 'checked' : '' ?>>
                            </div>
                            <div class="f-1">
                                <button class="btn-edit" onClick="location.href='<?= url_to($controller . '::edit_download', $data['d_Id']); ?>'"></button>
                                <button class="btn-del" data-sn="<?= $data['d_Id']; ?>"></button>
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
        location.href = '<?= url_to($controller . '::index_download'); ?>' + "?keyword=" + $('input[name="keyword"]').val()
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
            fetch('<?= site_url('backend/downloads/') ?>' + sn, {
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