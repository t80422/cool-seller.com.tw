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
        </div>

        <!-- list -->
        <div class="list-wrap">
            <div class="list-overflow">
                <div class="list-main">
                    <div class="list-title pr-2 pl-2">
                        <div class="f-1">姓名</div>
                        <div class="f-1">信箱</div>
                        <div class="f-1">標題</div>
                        <div class="f-1">訊息</div>
                        <div class="f-1">建立時間</div>
                        <div class="f-1">操作</div>
                    </div>

                    <?php foreach ($datas as $data): ?>
                        <div class="list-row pr-2 pl-2">
                            <div class="f-1"><?= $data['co_Name']; ?></div>
                            <div class="f-1"><?= $data['co_Email']; ?></div>
                            <div class="f-1"><?= $data['co_Subject']; ?></div>
                            <div class="f-1"><?= $data['co_Message']; ?></div>
                            <div class="f-1"><?= $data['co_CreateAt']; ?></div>
                            <div class="f-1">
                                <button class="btn-del" data-sn="<?= $data['co_Id']; ?>"></button>
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
        location.href = '<?= url_to('Contact::index'); ?>' + "?keyword=" + $('input[name="keyword"]').val()
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
            fetch('<?= site_url('backend/contact/') ?>' + sn, {
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