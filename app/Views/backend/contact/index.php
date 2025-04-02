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
                        <div class="f-2">電子郵件</div>
                        <div class="f-2">主旨</div>
                        <div class="f-3 ta-left">訊息摘要</div>
                        <div class="f-2">建立時間</div>
                        <div class="f-1">操作</div>
                    </div>

                    <?php if(empty($Datas)): ?>
                    <div class="list-row pr-2 pl-2">
                        <div class="f-12 ta-center">尚無聯絡我們資料</div>
                    </div>
                    <?php else: ?>
                        <?php foreach ($Datas as $data): ?>
                            <div class="list-row pr-2 pl-2">
                                <div class="f-1"><?= $data['co_name']; ?></div>
                                <div class="f-2"><?= $data['co_email']; ?></div>
                                <div class="f-2"><?= $data['co_subject']; ?></div>
                                <div class="f-3 ta-left"><?= mb_substr($data['co_message'], 0, 30) . (mb_strlen($data['co_message']) > 30 ? '...' : ''); ?></div>
                                <div class="f-2"><?= $data['co_create_at']; ?></div>
                                <div class="f-1">
                                    <button class="btn-view" onClick="location.href='<?= base_url('backend/contact/view/'.$data['co_id']); ?>'"></button>
                                    <button class="btn-del" data-sn="<?= $data['co_id']; ?>"></button>
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
                <p>是否確定刪除此聯絡我們項目？</p>
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
            location.href = '<?= base_url('backend/contact'); ?>' + "?keyword=" + $('input[name="keyword"]').val()
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
                location.href = '<?= base_url('backend/contact/delitem'); ?>' + '/' + sn;
            });
        });
    </script>
    
    <style>
        .btn-view {
            cursor: pointer;
            width: 19px;
            height: 19px;
            background: url(/image/backend/ico_view.svg) no-repeat center/contain;
            margin-right: 8px;
            position: relative;
            top: 1px;
        }
    </style>
</main>

<?php $this->endSection(); ?> 