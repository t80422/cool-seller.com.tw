<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>

<main class="container-wrap">
    <div class="container-main">
        <div class="detail-wrap">
            <div class="detail-top">
                <h1 class="detail-title">聯絡我們詳細資訊</h1>
                <button class="btn-back" onClick="location.href='<?= base_url('backend/contact'); ?>'">返回列表</button>
            </div>
            
            <div class="detail-content">
                <div class="detail-row">
                    <div class="detail-label">姓名</div>
                    <div class="detail-text"><?= $contact['co_name']; ?></div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">電子郵件</div>
                    <div class="detail-text"><?= $contact['co_email']; ?></div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">主旨</div>
                    <div class="detail-text"><?= $contact['co_subject']; ?></div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">建立時間</div>
                    <div class="detail-text"><?= $contact['co_create_at']; ?></div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">訊息內容</div>
                    <div class="detail-text message-box">
                        <?= nl2br(htmlspecialchars($contact['co_message'])); ?>
                    </div>
                </div>
            </div>
            
            <div class="detail-btns">
                <button class="btn-del" data-sn="<?= $contact['co_id']; ?>">刪除</button>
                <button class="btn-back" onClick="location.href='<?= base_url('backend/contact'); ?>'">返回列表</button>
            </div>
        </div>
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
    
    <script>
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
        .detail-wrap {
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .detail-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
            margin-bottom: 15px;
        }
        
        .detail-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        
        .detail-row {
            padding: 10px 0;
            border-bottom: 1px solid #f5f5f5;
            display: flex;
        }
        
        .detail-label {
            width: 100px;
            font-weight: bold;
            color: #555;
        }
        
        .detail-text {
            flex: 1;
        }
        
        .message-box {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-top: 5px;
            margin-bottom: 15px;
            line-height: 1.6;
            max-height: 300px;
            overflow-y: auto;
        }
        
        .detail-btns {
            margin-top: 20px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
        
        .btn-back {
            background: #f5f5f5;
            border: none;
            padding: 8px 15px;
            border-radius: 3px;
            cursor: pointer;
        }
        
        .btn-back:hover {
            background: #e5e5e5;
        }
        
        .btn-del {
            background: #ff3b30;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 3px;
            cursor: pointer;
        }
        
        .btn-del:hover {
            background: #e62e25;
        }
    </style>
</main>

<?php $this->endSection(); ?> 