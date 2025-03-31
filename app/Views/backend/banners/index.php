<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>

    <main class="container-wrap">
        <div class="container-main">
            <!-- tool -->
            <div class="tool-wrap">
                <!--<div class="tool-search">
                    <input type="text" name="keyword" placeholder="請輸入關鍵字搜尋" value="<?php echo $keyword ?? null; ?>">
                    <button type="button" onclick="search();"></button>
                </div>-->
                <div class="tool-btn">
                    <button class="btn-add" onClick="window.location.href='<?php echo url_to('Backend\Banners::create'); ?>'">新增</button>
                </div>
            </div>
            <!-- list -->
            <div class="list-wrap">
                <div class="list-overflow">
                    <div class="list-main">
                        <div class="list-title pr-2 pl-2">
							<div class="f-2">圖示</div>
                            <div class="f-1">名稱</div>
                            <div class="f-1 ta-left ml-6">說明</div>
							<div class="f-1 ta-left ml-6">連結</div>
                            <div class="f-1 ta-left">排序</div>
                            <div class="f-1 ta-left">顯示</div>
                            <div class="f-1">建檔日期</div>
                            <div class="f-1">操作</div>
                        </div>
                        <?php foreach($Datas as $data): ?>
                            <div class="list-row pr-2 pl-2">
								<div class="f-2">
                                    <figure class="prod-img" style="background-image: url('<?php echo "/public/images/banners/".$data['b_FileName'] ?? "/image/backend/imgfile.png"; ?>');"></figure>
                                </div>
                                <div class="f-1"><?php echo $data['b_Name']; ?></div>
                                <div class="f-1 ta-left ml-6"><?php echo $data['b_Description']; ?></div>
                                <div class="f-1 ta-left"><?php echo $data['b_Link']; ?></div>
                                <div class="f-1 ta-left"><?php echo $data['b_Sequence']; ?></div>
                                <div class="f-1 ta-left"><?php echo $data['b_IsShow']==1 ? "顯示":"不顯示"; ?></div>
								<div class="f-1 ta-left"><?php echo $data['b_CreateAt']; ?></div>
                                <div class="f-1">
                                    <button class="btn-edit" onClick="location.href='<?php echo url_to('Backend\Banners::edit',$data['b_Id']);?>'"></button>
                                    <button class="btn-del" data-sn="<?php echo $data['b_Id']; ?>"></button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- <div class="list-row pr-2 pl-2">
                            <div class="f-1">名稱A</div>
                            <div class="f-1 ta-left ml-6">000***</div>
                            <div class="f-1 ta-left">123***</div>
                            <div class="f-1 ta-left">123***@gmail.com</div>
                            <div class="f-1">2023-03-21 15:36</div>
                            <div class="f-1">
                                <button class="btn-edit" onClick="window.location.href='account_edit.html'"></button>
                                <button class="btn-del"></button>
                            </div>
                        </div> -->
                        <!-- example start -->                        
                        <!-- example end -->
                    </div>
                </div>
            </div>
            <!-- pages -->
            <?php echo $pager_links; ?>
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
            function search(){
                location.href='<?php echo url_to('Backend\Banners::index');?>'+"?keyword="+$('input[name="keyword"]').val()
            }

            $(function() {
                var sn ;
                $(document).on('click', '.btn-del', function(){                    
                    $(".popup-overlay, .js-del-popup").fadeIn();
                    sn = $(this).data('sn');
                });

                $(".popup-overlay, .popup-btn .btn-cancel").on('click', function() {
                    $(".popup-overlay, .popup-wrap").fadeOut();                                        
                });

                $(".popup-btn .btn-submit").on('click',function(){
                    location.href='<?php echo url_to('Backend\Banners::index'); ?>' + '/delitem/' + sn;
                })
            });

        </script>
    </main>

<?php $this->endSection();?>